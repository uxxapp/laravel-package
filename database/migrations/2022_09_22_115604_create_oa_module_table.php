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
        Schema::create('oa_modules', function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->string('ms_name', 200)->default('')->comment('系统名称');
            $table->string('ms_desc', 200)->default('')->comment('系描述');
            $table->string('ms_domain', 200)->default('')->comment('系统域名');
            $table->unsignedBigInteger('create_by')->default(0)->comment('创建人账号 account_user_admin id');
            $table->unsignedBigInteger('update_by')->default(0)->comment('修改人账号 account_user_admin id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态 1:enable, 0:disable, -1:deleted');
            $table->timestamps();
            $table->index('ms_domain');
            $table->comment('系统map(登记目前存在的后台系统信息)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oa_modules');
    }
};
