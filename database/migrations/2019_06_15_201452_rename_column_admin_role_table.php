<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/***
 * Table-admin_role列 user_id 修改为 admin_id
 * Class RenameColumnAdminRoleTable
 */
class RenameColumnAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_role', function (Blueprint $table) {
            $table->renameColumn('user_id', 'admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_role', function (Blueprint $table) {
            $table->renameColumn('admin_id', 'user_id');
        });
    }
}
