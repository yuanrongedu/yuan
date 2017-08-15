<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

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
    
    //这里是登录方法
    public function login(Request $request,Admin $admin){
        if( $request->isMethod('post')){
            //接受数据
            $data = $request->only('username', 'password', 'captcha');
            //验证会规则
            $rules = [
                'captcha' => 'required|captcha',
                'username'=> 'required',
                'password'=> 'required',
            ];
            $message = [
                'username.required' =>  '用户名不能为空!',
                'password.required' =>  '密码不能为空!',
                'captcha.required'   =>  '验证码不能为空!',
                'captcha.captcha'    =>  '验证码不正确!',
            ];
            $validator = Validator::make($data, $rules, $message);
            
            if ($validator->fails())
            {
                //把提交过来的数据存储到一次性session
                $request->flash();
                return redirect()->back()->withErrors($validator, 'LoginError');
            }
            //根据用户登录信息查询数据库
            $info = $admin->where('username', $data['username'])->first();
            //验证密码
            if(Hash::check($data['password'], $info->password)){
                $data = [
                    'login_time'   =>  time(),
                    'username'     =>  $info->username,
                    'role_id'      =>  $info->role_id,
                ];
                //保存到session中
                session($data);//保存多个session数据使用数组
                return redirect()->to('admin/index');
            }else{
                $request->flash();
                return redirect()->back()->withInput('登录失败!');
            }
            
        }
        return view('admin/login');
    }
    
    public function logout(){
        session()->flush();
        //跳转到登录页面
        return redirect()->to('admin/login');
    }
}
