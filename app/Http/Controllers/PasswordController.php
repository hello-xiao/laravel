<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FindPasswordNotify;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    //输入密码
    public function email()
    {
        return view('password.email');
    }
    //发送密码
    public function send(Request $request)
    {
       $user = User::where('email',$request->email)->first();
       \Notification::send($user,new FindPasswordNotify($user->email_token));
        return view('password.send');
    }
    //修改密码
    public function edit($token)
    {
        $user = $this->getUserByToken($token);
        return view('password.edit',compact('user'));
    }
    //更新密码
    public function update(Request $request)
    {
        $this->validate($request,[
            'password'=>'required|min:6|max:16|confirmed'
        ]);
        $user = $this->getUserByToken($request->token);
        $user->password = bcrypt($request->password);
        $user->save();
        session()->flash('success','修改密码成功');
        return redirect()->route('login');

    }

    protected function getUserByToken($token)
    {
        return User::where('email_token',$token)->first();
    }
}
