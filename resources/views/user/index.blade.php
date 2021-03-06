@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            用户列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th style="padding-left: 50px">昵称</th>
                    <th style="padding-left: 80px">邮箱</th>
                    <th width="200" style="text-align:center;">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('user.show',$user)}}" class="btn btn-info">查看</a>
                            @can('update',$user)
                                <a href="{{route('user.edit',$user)}}" class="btn btn-success">修改</a>
                            @endcan
                            @can('delete',$user)
                                <form action="{{route('user.destroy',$user)}}" method="post">
                                     @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$users->links()}}
        </div>
    </div>
@endsection
