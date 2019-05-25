<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id')->unsigned()->comment('编号id');
            $table->string('order_sn',30)->comment('订单编号 yyyymmddnnnnnnnn');
            $table->bigInteger('user_id')->unsigned()->comment('用户id');
            $table->string('shipping_user',10)->comment('收货人姓名');
            $table->string('province',15)->comment('省');
            $table->string('city',15)->comment('市');
            $table->string('district',30)->comment('区');
            $table->string('address',60)->comment('地址');
            $table->tinyInteger('payment_method')->unsigned()->comment('支付方式：1现金，2余额，3网银，4支付宝，5微信');
            $table->decimal('order_money',8,2)->default(0.00)->comment('订单金额');
            $table->decimal('district_money',8,2)->default(0.00)->comment('优惠金额');
            $table->decimal('shipping_money',8,2)->default(0.00)->comment('运费金额');
            $table->decimal('payment_money',8,2)->default(0.00)->comment('支付金额');
            $table->string('shipping_comp_name',15)->nullable()->comment('快递公司名称');
            $table->string('shipping_sn',50)->nullable()->comment('快递单号');
            $table->dateTime('create_time')->nullable()->comment('下单时间');
            $table->dateTime('shipping_time')->nullable()->comment('发货时间');
            $table->dateTime('pay_time')->nullable()->comment('支付时间');
            $table->dateTime('receive_time')->nullable()->comment('收货时间');
            $table->tinyInteger('order_status')->default(0)->comment('订单状态');
            $table->integer('order_point')->default(0)->unsigned()->comment('订单积分');
            $table->string('invoice_time',100)->nullable()->comment('发票抬头');
            $table->dateTime('modified_time')->comment('最后修改时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
