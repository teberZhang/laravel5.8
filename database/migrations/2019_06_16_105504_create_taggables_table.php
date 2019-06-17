<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 新增 标签管理表 taggables
 * Class CreateTaggablesTable
 */
class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->integer('tag_id')->default(0)->unsigned()->comment('tags表ID');
            $table->integer('taggable_id')->default(0)->unsigned()->comment('关联表ID');
            $table->string('taggable_type',30)->comment('关联表对应类型');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
}
