<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 评论表 comments
 * Class CreateCommentsTable
 */
class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('评论ID');
            $table->text('body')->comment('评论内容');
            $table->integer('commentable_id')->default(0)
                ->unsigned()->comment('评论内容表ID');
            $table->string('commentable_type',30)->comment('评论类型');
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
        Schema::dropIfExists('comments');
    }
}
