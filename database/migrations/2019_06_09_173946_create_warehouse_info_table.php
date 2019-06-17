<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 仓库信息表（warehouse_info）
 * Class CreateWarehouseInfoTable
 */
class CreateWarehouseInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_info', function (Blueprint $table) {
            $table->bigIncrements('w_id')->unsigned()->comment('仓库ID');
            $table->string('warehouse_sn',5)->comment('仓库编码');
            $table->string('warehoust_name',10)->comment('仓库名称');
            $table->string('warehouse_phone',20)->comment('仓库电话');
            $table->string('contact',10)->comment('仓库联系人');
            $table->string('province',15)->comment('省');
            $table->string('city',15)->comment('市');
            $table->string('district',30)->comment('区');
            $table->string('address',60)->comment('地址');
            $table->tinyInteger('warehouse_status')->default(1)->comment('仓库状态：0禁用，1启用');
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
        Schema::dropIfExists('warehouse_info');
    }
}
