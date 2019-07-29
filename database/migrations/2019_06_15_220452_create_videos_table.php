<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 视频表 videos
 * Class CreateVideosTable
 */
class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('视频ID');
            $table->integer('user_id')->default(0)->unsigned()->comment('用户ID');
            $table->string('title',50)->comment('视频标题');
            $table->string('url',255)->comment('视频链接');
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
        Schema::dropIfExists('videos');
    }
}
