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
        Schema::create('account_user_admin', function (Blueprint $table) {
            $table->id()->comment('员工id');
            $table->unsignedBigInteger('uid')->comment('账号id');
            $table->string('email', 30)->comment('员工邮箱');
            $table->string('phone', 11)->comment('员工手机号');
            $table->string('nickname', 30)->default('')->comment('员工昵称');
            $table->string('name', 30)->default('')->comment('员工姓名');
            $table->string('avatar', 200)->default('')->comment('员工头像(相对路径)');
            $table->enum('gender', ['male', 'female', 'unknow'])->default('unknow')->comment('员工性别');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('uid');
            $table->index('phone');
            $table->index('email');
            $table->comment('管理员工信息(这里列了大概的信息，多的可以垂直拆表)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_user_admin');
    }
};
