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
        Schema::create('oa_module_role_admin', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->unsignedBigInteger('admin_id')->default(0)->comment('员工id');
            $table->text('role_item')->comment('角色集合 多个值,号隔开');
            $table->unsignedBigInteger('create_by')->default(0)->comment('创建人账号 account_user_admin id');
            $table->unsignedBigInteger('update_by')->default(0)->comment('修改人账号 account_user_admin id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('admin_id');
            $table->comment('权限角色与员工关系');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_module_role_admin');
    }
};
