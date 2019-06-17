<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 商品图片信息表
 * Class CreateProductPicInfoTable
 */
class CreateProductPicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_pic_info', function (Blueprint $table) {
            $table->bigIncrements('product_pic_id')->unsigned()->comment('商品图片ID');
            $table->integer('product_id')->default(0)->unsigned()->comment('商品ID');
            $table->string('pic_desc',50)->comment('图片描述');
            $table->string('pic_url',200)->comment('图片URL');
            $table->tinyInteger('is_master')->default(0)->comment('是否主图：0.非主图1.主图');
            $table->tinyInteger('pic_order')->default(0)->comment('图片排序');
            $table->tinyInteger('pic_status')->default(0)->comment('图片是否有效：0无效 1有效');
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
        Schema::dropIfExists('product_pic_info');
    }
}
