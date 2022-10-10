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
        Schema::create('account_user_platform', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->unsignedBigInteger('uid')->comment('平台id');
            $table->string('platform_id', 60)->default('')->comment('平台id');
            $table->string('platform_token', 200)->default('')->default('')->comment('平台access_token');
            $table->unsignedTinyInteger('type')->default(0)->comment('平台类型 0:未知,1:微信,2:,3:wechat,4:qq,5:weibo,6:twitter');
            $table->binary('nickname')->comment('昵称');
            $table->string('avatar', 200)->default('')->comment('创建ip');
            $table->timestamps();
            $table->index('platform_id');
            $table->index('uid');
            $table->comment('第三方用户信息');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_user_platform');
    }
};
