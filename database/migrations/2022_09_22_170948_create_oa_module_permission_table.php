<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oa_module_permission', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->unsignedBigInteger('ms_id')->default(0)->comment('系统id');
            $table->unsignedBigInteger('menu_id')->default(0)->comment('menu_id');
            $table->string('permission_desc', 200)->default('')->comment('权限名称');
            $table->unsignedBigInteger('create_by')->default(0)->comment('创建人账号 account_user_admin id');
            $table->unsignedBigInteger('update_by')->default(0)->comment('修改人账号 account_user_admin id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();

            $table->index(['ms_id', 'menu_id']);
            $table->comment('系统权限');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_module_permission');
    }
};
