<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 管理员表
 * Class CreateAdminsTable
 */
class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('管理员ID');
            $table->string('name',50)->comment('用户名');
            $table->string('email',60)->comment('邮箱');
            $table->string('password',60)->comment('密码');
            $table->string('remember_token',60)->nullable()->comment('记住密码');
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
        Schema::dropIfExists('admins');
    }
}
