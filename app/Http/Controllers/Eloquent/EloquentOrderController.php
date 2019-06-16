<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/***
 * Eloquent ORM —— 快速入门
 * Class EloquentOrderController
 * @package App\Http\Controllers
 */
class EloquentOrderController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        /*$orders = \App\Models\Order::where('payment_method',2)->orderBy('order_id','desc')->take(3)->get();
        foreach ($orders as $order) {
            echo $order->shipping_user;
        }*/
        // 组块结果集
        /*\App\Models\Order::chunk(3, function ($orders) {
            foreach ($orders as $order) {
                echo $order->shipping_user;
            }
        });*/

        // 通过主键获取模型...
        $order = \App\Models\Order::find(1);
        dd($order);

        // 获取匹配查询条件的第一个模型...
        //$order = \App\Models\Order::where('order_status', 1)->first();

        // 如果不存在创建
        /*$flight = \App\Models\Order::firstOrCreate(
            ['order_sn' => '2019052514041715790'], ['user_id' => 9]
        );*/

        // 记录存在修改order_status=2,记录不存在创建
        /*$flight = \App\Models\Order::updateOrCreate(
            ['order_sn' => '2019052514041715790', 'user_id' => 9],
            ['order_status' => 2]
        );*/

        // 查询支付宝付款的订单
        //$order = \App\Models\Order::alipay()->get();

        // 只查询圆通的快递
        //$order = \App\Models\Order::shippingName('圆通')->get();
        //dd($order);

        // 模型修改,有模型修改事件
        /*$order = \App\Models\Order::find(1);
        $order->invoice_time = '杭州快乐赚';
        $order->save();*/

        //模型删除有观察者事件
        /*$order = \App\Models\Order::find(2);
        $order->delete();*/

    }
}
