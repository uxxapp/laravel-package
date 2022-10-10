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
        Schema::create('oa_module_roles', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->string('name', 200)->default('')->comment('角色名称');
            $table->string('desc', 200)->default('')->comment('角描述');
            $table->text('permission_item')->comment('权限集合 多个值,号隔开');
            $table->unsignedBigInteger('create_by')->default(0)->comment('创建人账号 account_user_admin id');
            $table->unsignedBigInteger('update_by')->default(0)->comment('修改人账号 account_user_admin id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->comment('员工角色');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_module_roles');
    }
};
