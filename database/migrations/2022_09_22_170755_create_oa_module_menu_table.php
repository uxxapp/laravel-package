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
        Schema::create('oa_module_menu', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->unsignedBigInteger('ms_id')->default(0)->comment('系统id');
            $table->unsignedBigInteger('parent_id')->default(0)->comment('父菜单id');
            $table->string('menu_name', 200)->default('')->comment('菜单名称');
            $table->string('menu_desc', 200)->default('')->comment('菜描述');
            $table->string('menu_uri', 200)->default('')->comment('菜单uri');
            $table->unsignedBigInteger('create_by')->default(0)->comment('创建人账号 account_user_admin id');
            $table->unsignedBigInteger('update_by')->default(0)->comment('修改人账号 account_user_admin id');
            $table->enum('is_show', ['yes', 'no'])->default('no')->comment('是否展示菜单');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('ms_id');
            $table->index('parent_id');
            $table->comment('系统menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_module_menu');
    }
};
