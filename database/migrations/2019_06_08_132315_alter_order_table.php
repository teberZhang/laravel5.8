<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * 修改order表
 * Class AlterOrderTable
 */
class AlterOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create_time 更名为 created_at
        if(Schema::hasColumn('order', 'create_time')) {
            Schema::table('order', function (Blueprint $table) {
                $table->renameColumn('create_time', 'created_at');
            });
        }
        // modified_time 更名为 created_at
        if(Schema::hasColumn('order', 'modified_time')) {
            Schema::table('order', function (Blueprint $table) {
                $table->renameColumn('modified_time', 'updated_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
