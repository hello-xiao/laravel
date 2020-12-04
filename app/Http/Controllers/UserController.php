<?php

namespace App\Http\Controllers;


use App\Mail\RegMail;
use Auth;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['index','show','create','store','confirmEmailToken']
        ]);
        $this->middleware('guest',[
            'only'=>['create','store']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =User::paginate(6);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $this->validate($request,[
                'name'=>'required|min:3|max:18',
                'email'=>'required|unique:users|email',
                'password'=>'required|min:6|max:16|confirmed'
        ]);
       $data['password'] = bcrypt($data['password']);

       //添加用户
       $user = User::create($data);
        //发送注册邮件
        \Mail::to($user)->send(new RegMail($user));
       session()->flash('success','请查看邮箱完成注册验证');
       return redirect()->route('home');
    }

    //关注或取关
    public function follow(User $user)
    {
        $user->followToggle(\Auth::user()->id);
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $blogs =$user->blogs()->paginate('8');
        if(\Auth::check())
            $followTitle = $user->isFollow(\Auth::user() ->id)?'取消关注':'关注';
        return view('user.show',compact('user','blogs','followTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $this->authorize('update',$user);

        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this ->validate($request,[
            'name'=>'required|min:3|max:18',
            'password'=>'nullable|min:6|max:16|confirmed'
        ]);
        $user->name = $request->name;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        session()->flash('success','修改成功');
        return redirect()->route('user.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete',$user);
        $user->delete();
        session()->flash('success','删除成功');
        return redirect()->route('user.index');
    }
    //注册邮箱验证
    public function confirmEmailToken($token)
    {
       $user = User::where('email_token', $token)->first();
       if($user) {
           $user->email_active = true;
           $user->save();
           session()->flash('验证成功');
           \Auth::login($user);
           return redirect('/');
       }
       session()->flash('danger','邮箱验证失败');
       return redirect('/');
    }
}
