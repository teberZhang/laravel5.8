<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

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
        /*$orders = Order::where('payment_method',2)->orderBy('order_id','desc')->take(3)->get();
        foreach ($orders as $order) {
            echo $order->shipping_user;
        }*/
        // 组块结果集
        /*Order::chunk(3, function ($orders) {
            foreach ($orders as $order) {
                echo $order->shipping_user;
            }
        });*/

        // 通过主键获取模型...
        $order = Order::find(1);
        dd($order);

        // 获取匹配查询条件的第一个模型...
        //$order = Order::where('order_status', 1)->first();

        // 如果不存在创建
        /*$flight = Order::firstOrCreate(
            ['order_sn' => '2019052514041715790'], ['user_id' => 9]
        );*/

        // 记录存在修改order_status=2,记录不存在创建
        /*$flight = Order::updateOrCreate(
            ['order_sn' => '2019052514041715790', 'user_id' => 9],
            ['order_status' => 2]
        );*/

        // 查询支付宝付款的订单
        //$order = Order::alipay()->get();

        // 只查询圆通的快递
        //$order = Order::shippingName('圆通')->get();
        //dd($order);

        // 模型修改,有模型修改事件
        /*$order = Order::find(1);
        $order->invoice_time = '杭州快乐赚';
        $order->save();*/

        //模型删除有观察者事件
        /*$order = Order::find(2);
        $order->delete();*/

    }
}
