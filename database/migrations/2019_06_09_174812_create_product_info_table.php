<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->bigIncrements('product_id')->unsigned()->comment('商品ID');
            $table->string('product_core',16)->comment('商品编码');
            $table->string('product_name',20)->comment('商品名称');
            $table->string('bar_code',50)->comment('国条码');
            $table->integer('brand_id')->default(0)->unsigned()->comment('品牌表的ID');
            $table->integer('one_category_id')->default(0)->unsigned()->comment('一级分类ID');
            $table->integer('two_category_id')->default(0)->unsigned()->comment('二级分类ID');
            $table->integer('three_category_id')->default(0)->unsigned()->comment('三级分类ID');
            $table->integer('supplier_id')->default(0)->unsigned()->comment('商品的供应商ID');
            $table->decimal('price',8,2)->default(0.00)->comment('商品销售价格');
            $table->decimal('average_cost',8,2)->default(0.00)->comment('商品加权平均成本');
            $table->tinyInteger('publish_status')->default(0)->comment('上下架状态：0下架1上架');
            $table->tinyInteger('audit_status')->default(0)->comment('审核状态：0未审核，1已审核');
            $table->decimal('weight',8,2)->default(0.00)->comment('商品重量');
            $table->decimal('length',8,2)->default(0.00)->comment('商品长度');
            $table->decimal('height',8,2)->default(0.00)->comment('商品高度');
            $table->decimal('width',8,2)->default(0.00)->comment('商品宽度');
            $table->text('descript')->comment('商品描述');
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
        Schema::dropIfExists('product_info');
    }
}
