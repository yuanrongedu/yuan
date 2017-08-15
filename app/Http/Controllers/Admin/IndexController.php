<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //这里是后台首页的控制器方法
    public function index(){
        $data = [];
        $data['title'] = '圆融教育中心后台首页';
        return view('admin/index', $data);
    }
    //这里是显示 我的桌面 的方法
    public function welcome(){
        return view('admin/welcome');
    }
}
