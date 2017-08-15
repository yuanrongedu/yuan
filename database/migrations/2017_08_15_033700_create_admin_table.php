<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建admin表的数据表结构
        Schema::create('admin', function(Blueprint $table){
            $table->increments('admin_id')->unsigned()->comment('主键ID');
            $table->string('username', 100)->unique()->comment('用户名');
            $table->string('password', 150)->comment('密码');
            $table->string('avator', 150)->nullable()->comment('头像');
            $table->string('mobile', 50)->nullable()->comment('手机号码');
            $table->string('email', 150)->unique()->nullable()->comment('邮箱');
            $table->unsignedSmallInteger('role_id')->commnet('角色ID');
            $table->timestamps();//自动创建两个字段
            $table->timestamp('disabled_at')->nullable()->comment('是否禁用');
            $table->string('note', 255)->comment('备注');
            $table->softDeletes();
            $table->timestamp('delete_at')->nullable()->comment('删除时间');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //数据表删除
        Schema::dropIfExists('admin');
    }
}
