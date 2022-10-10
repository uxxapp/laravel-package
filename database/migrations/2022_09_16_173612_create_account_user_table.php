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
        Schema::create('account_users', function (Blueprint $table) {
            $table->id()->comment('账号id');
            $table->string('email', 30)->unique()->nullable()->comment('邮箱');
            $table->string('phone', 11)->unique()->nullable()->comment('电话');
            $table->string('username', 30)->unique()->comment('用户名');
            $table->string('password', 32)->default('')->comment('密码');
            $table->string('create_ip_at', 12)->default('')->comment('创建ip');
            $table->timestamp('last_login_at')->nullable()->comment('最后一次登录时间');
            $table->string('last_login_ip_at', 12)->default('')->comment('最后一次登录ip');
            $table->unsignedInteger('login_times')->default(0)->comment('登录次数');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('email');
            $table->index('phone');
            $table->index('username');
            $table->comment('账户');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_users');
    }
};
