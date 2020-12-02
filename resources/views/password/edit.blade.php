@extends('layouts.default')
@section('content')
    <form action="{{route('FindPasswordUpdate')}}" method="post">
        @csrf
        <input type="text" hidden name="token" value="{{$user['email_token']}}">
        <div class="card">
            <div class="card-header">
                重置密码
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="text" name="email" disabled class="form-control" value="{{$user['email']}}">
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
                <button class="btn btn-success">发送</button>
            </div>
        </div>
    </form>
@endsection
