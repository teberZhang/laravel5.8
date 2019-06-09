<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'order';
    /**
     * 表主键
     *
     * @var integer
     */
    protected $primaryKey = 'order_id';

    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = ['updated_at','payment_method','order_money',
        'shipping_comp_name','shipping_sn','shipping_time','pay_time',
        'order_status','order_point'];

    /**
     * 模型事件
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => 'App\Events\OrderSavedEvent',
    ];

    /**
     * 查询支付宝付款的订单
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAlipay($query)
    {
        return $query->where('payment_method', '=', 4);
    }

    /**
     * 根据快递名查询订单
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShippingName($query,$shippingName)
    {
        return $query->where('shipping_comp_name', '=', $shippingName);
    }

    /**
     * 匿名的全局作用域任何查询sql都会加上order_money > 0 的条件
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order_money', function(Builder $builder) {
            $builder->where('order_money', '>', 0);
        });
    }
}
