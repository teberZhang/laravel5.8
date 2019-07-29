<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippingUser = ['宋小宝','李湘','陈鹏','燕双鹰','杜大鹏','铁柱','齐飞'];
        $province = ['河北省','山西省','内蒙古自治区','黑龙江省','吉林省','辽宁省'
        ,'陕西省','甘肃省','青海省','新疆维吾尔自治区','宁夏回族自治区','山东省',
        '河南省','江苏省','浙江省','安徽省','江西省','福建省','台湾省','湖北省',
        '湖南省','广东省','广西壮族自治区','海南省','四川省','云南省','贵州省','西藏自治区'];
        $address = [
            '马家街道36号',
            '高新区473号',
            '梦想小镇23号',
            '秋实路4号',
            '高级街46号',
            '波涛路12号',
            '龙翔桥22号',
        ];
        $order_money = rand(20,500);
        $district_money = rand(0,19);
        $shipping_money = rand(6,30);
        $shipping_comp_name = [
            '圆通',
            '申通',
            '韵达',
            '顺丰',
            '中通',
            '邮政',
        ];
        $nowTime = time();

        DB::table("order")->insert([
            'order_sn' => date("YmdHis",$nowTime).rand(10000,99999),
            'user_id' => rand(1,27),
            'shipping_user' => $shippingUser[rand(0,count($shippingUser)-1)],
            'province' => $province[rand(0,count($province)-1)],
            'city' => rand(1,34).'市',
            'district' => rand(1,34).'区',
            'address' => $address[rand(0,count($address)-1)].rand(1,45).'幢',
            'payment_method' => rand(1,5),
            'order_money' => $order_money+$shipping_money,
            'district_money' => $district_money,
            'shipping_money' => $shipping_money,
            'payment_money' => $order_money+$shipping_money-$district_money,
            'shipping_comp_name' => $shipping_comp_name[rand(0,count($shipping_comp_name)-1)],
            'shipping_sn' => date('ymd').substr(time(),-5).substr(microtime(),2,5),
            'created_at' => date("Y-m-d H:i:s",$nowTime),
            'shipping_time' => date("Y-m-d H:i:s",$nowTime+rand(10,60)),
            'pay_time' => date("Y-m-d H:i:s",$nowTime+rand(60,1800)),
            'receive_time' => date("Y-m-d H:i:s",$nowTime+rand(10000,86400)),
            'order_status' => rand(1,4),
            'order_point' => rand(5,40),
            'invoice_time' => '杭州同花顺',
            'updated_at' => date("Y-m-d H:i:s",$nowTime),
        ]);
    }
}
