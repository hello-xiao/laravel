<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //登录
    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:16'
        ]);
        if(\Auth::attempt($data)){
            session()->flash('success','登录成功');
            return redirect('/');
        }
        session()->flash('danger','账号或密码错误');
        return back();
    }
    //退出
    public function logout()
    {
        \Auth::logout();
        session()->flash('success','退出成功');
        return redirect('/');
    }
}
