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
        Schema::create('account_user_member', function (Blueprint $table) {
            $table->id()->comment('用户id');
            $table->unsignedBigInteger('uid')->comment('账号id');
            $table->string('nickname', 30)->default('')->comment('昵称');
            $table->string('avatar', 200)->default('')->comment('头像(相对路径)');
            $table->enum('gender', ['male', 'female', 'unknow'])->default('unknow')->comment('性别');
            $table->unsignedTinyInteger('role')->default(0)->comment('角色 0:普通用户 1:vip ');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('uid');
            $table->comment('账户信息');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_user_member');
    }
};
