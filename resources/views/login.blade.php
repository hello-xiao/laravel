@extends('layouts.default')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">用户登录</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="email" name="email" id="" class="form-control" value="{{old('email')}}">
                </div><div class="form-group">
                    <label for="">密码</label>
                    <input type="password" name="password" id="" class="form-control">
            </div>
            </div><div class="form-group">
                <label for=""></label>
                <a href="{{route('FindPasswordEmail')}}">找回密码</a>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">登录</button>
            </div>
        </div>
    </form>
@endsection
