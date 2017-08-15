<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //当前是后台管理员模型
    //定义表
    protected  $table = 'admin';
    //定义表id
    protected  $primaryKey = 'admin_id';
}
