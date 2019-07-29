<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 订单详情表（order_detail）
 * Class CreateOrderDetailTable
 */
class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('order_detail_id')->unsigned()->comment('订单详情表ID');
            $table->integer('order_id')->default(0)->unsigned()->comment('订单表ID');
            $table->integer('product_id')->default(0)->unsigned()->comment('订单商品ID');
            $table->string('product_name',50)->comment('商品名称');
            $table->integer('product_cnt')->default(0)->unsigned()->comment('购买商品数量');
            $table->decimal('product_price',8,2)->default(0.00)->comment('购买商品单价');
            $table->decimal('average_cost',8,2)->default(0.00)->comment('平均成本价格');
            $table->decimal('weight',8,2)->default(0.00)->comment('商品重量');
            $table->decimal('fee_money',8,2)->default(0.00)->comment('优惠分摊金额');
            $table->integer('w_id')->default(0)->unsigned()->comment('仓库ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail');
    }
}
