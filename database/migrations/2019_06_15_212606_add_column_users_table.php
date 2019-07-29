<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * users 表添加 country_id 列 放在 remember_token 之后
 * Class AddColumnUsersTable
 */
class AddColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('country_id')
                ->default(0)->unsigned()
                ->after('remember_token')
                ->comment('国家编号ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //要安装doctrine/dbal 依赖
            $table->dropColumn('country_id');
        });
    }
}
