@extends('layouts.default')
@section('content')
    @auth
    <form action="{{route('blog.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                发布博客
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">内容</label>
                    <textarea class="form-control" name="content">{{old('content')}}</textarea>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">发布</button>
            </div>
        </div>
    </form>
    @endauth
    {{--博客列表--}}
    <div class="card mt-2">
        <div class="card-header">
            博客列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th style="text-align:center;">文章</th>
                    <th>作者</th>
                    <th with="100" >操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>
                        {{$blog['content']}}
                    </td>
                    <td>
                        <a class="btn btn-outline-dark" href="{{route('user.show',$blog->user)}}"> {{$blog->user->name}}</a>
                    </td>
                    <td>
                        @can('delete',$blog)
                            <form action="{{route('blog.destroy',$blog)}}" method="post">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger">删除</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$blogs->links()}}
        </div>
    </div>
@endsection

