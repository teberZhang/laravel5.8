<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_info', function (Blueprint $table) {
            $table->bigIncrements('brand_id')->unsigned()->comment('品牌ID');
            $table->string('brand_name',50)->comment('品牌名称');
            $table->string('brand_desc',150)->comment('品牌描述');
            $table->tinyInteger('brand_status')->default(0)->comment('品牌状态,0禁用,1启用');
            $table->tinyInteger('brand_order')->default(0)->comment('排序');
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
        Schema::dropIfExists('brand_info');
    }
}
