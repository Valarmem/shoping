<?php

use Illuminate\Database\Seeder;
use App\Models as M;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new M\Product([
        	'imagePath' => 'https://ss1.bdstatic.com/70cFvXSh_Q1YnxGkpoWK1HF6hhy/it/u=147191197,2063307816&fm=23&gp=0.jpg',
        	'title' => 'Harry Potter',
        	'description' => 'Super Cool - at least as a Child',
        	'price' => 10,
        ]);
        $product->save();

        $product = new M\Product([
        	'imagePath' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1488351801111&di=4ae595f18509eac38cb4f7a30c7c1df1&imgtype=0&src=http%3A%2F%2Fimg.taopic.com%2Fuploads%2Fallimg%2F140623%2F267857-1406230KS063.jpg',
        	'title' => 'Boat',
        	'description' => 'This is a only world,I know',
        	'price' => 100,
        ]);
        $product->save();

        $product = new M\Product([
        	'imagePath' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1488356528144&di=cb2bcd79d882aa8fad2b4f376efb19c3&imgtype=0&src=http%3A%2F%2Fwww.ljzfin.com%2Fuploads%2F1%2Fimage%2Fpublic%2F201501%2F20150115090701_jp31qtfae0.jpg',
        	'title' => '肥沃土地',
        	'description' => '同时，开发者可选择消息加解密方式：明文模式、兼容模式和安全模式。模式的选择与服务器配置在提交后都会立即生效，请开发者谨慎填写及选择。加解密方式的默认状态为明文模式，选择兼容模式和安全模式需要提前配置好相关加解密代码',
        	'price' => 900,
        ]);
        $product->save();

        $product = new M\Product([
        	'imagePath' => 'https://ss0.bdstatic.com/70cFvHSh_Q1YnxGkpoWK1HF6hhy/it/u=2686897369,1625036127&fm=23&gp=0.jpg',
        	'title' => 'FarmLand',
        	'description' => 'Super Cool Land',
        	'price' => 210,
        ]);
        $product->save();

        $product = new M\Product([
        	'imagePath' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1488356528143&di=c93cd630cc48fb1f64cca652d65e178e&imgtype=0&src=http%3A%2F%2Fm2.quanjing.com%2F2m%2Fage_foto56%2Fxg4-1282873.jpg',
            'title' => 'This is a test',
        	'description' => '登录微信公众平台官网后，在公众平台官网的开发-基本设置页面，勾选协议成为开发者，点击“修改配置”按钮，填写服务器地址（URL）、Token和EncodingAESKey',
        	'price' => 15,
        ]);
        $product->save();
    }
}
