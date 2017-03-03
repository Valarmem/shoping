<?php

namespace App\Http\Controllers;

use App\Models as M;
use Illuminate\Http\Request;

// use App\Http\Request;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function getIndex(){
    	$products = M\Product::all();
    	return view('shop.index')->withProducts($products);
    }

    public function getAddToCart(Request $request,$id) {
    	$product = M\Product::find($id);
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new M\Cart($oldCart);
    	$cart->add($product,$product->id);

    	$request->session()->put('cart',$cart);
    	return redirect()->route('product.index');
    }

    public function getReduceByOne($id) {
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new M\Cart($oldCart);
    	$cart->reducebyOne($id);

        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
    	return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
    	$oldCart = Session::has('cart')?Session::get('cart'):null;
    	$cart = new M\Cart($oldCart);
    	$cart->removeItem($id);

        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

    	return redirect()->route('product.shoppingCart');
    }

    public function getCart() {
    	if (!Session::has('cart')) {
    		return view('shop.shopping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new M\Cart($oldCart);
    	return view('shop.shopping-cart',[
    		'products'=>$cart->items,
    		'totalPrice'=>$cart->totalPrice,
    	]);
    }

    public function getCheckout(){
    	if (!Session::has('cart')) {
    		return view('shop.shoping-cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new M\Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout',['total'=>$total]);
    }

    public function postCheckout(Request $request) {
    	if (!Session::has('cart')) {
    		return redirect()->route('shop.shopingCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new M\Cart($oldCart);

    	Stripe::setApiKey('sk_test_LgYL5kl0cFXkY0SNGm0AjiHx');
    	try{
    		$charge = Charge::create(array(
				"amount" => $cart->totalPrice*100,
				"currency" => "usd",
				"source" => $request->input('stripeToken'), // obtained with Stripe.js
				"description" => "Charge for Test"
			));
    		$order = new M\Order();
    		$order->cart = serialize($cart);
    		$order->address = $request->input('address');
    		$order->name = $request->input('name');
    		$order->payment_id = $charge->id;
    		Auth::user()->orders()->save($order);
    	}catch (\Exception $e) {
    		return redirect()->route('checkout')->with('error',$e->getMessage());
    	}

    	Session::forget('cart');
    	return redirect()->route('product.index')->with('success','Successfully purchased products!');

    }
}
