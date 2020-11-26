@extends('layouts.default')
@section('content')
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">用户注册</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">昵称</label>
                    <input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="email" name="email" id="" class="form-control" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">确认密码</label>
                    <input type="password" name="password_confirmation" id="" class="form-control">
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">注册</button>
            </div>
        </div>
    </form>
@endsection
