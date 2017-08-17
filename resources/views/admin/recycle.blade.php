@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('admin/recycle') }}" class="btn btn-lg btn-primary">回收站</a>
                    <a href="{{ url('admin/article') }}" class="btn btn-lg btn-primary">文章列表</a>
                </div>
                <a href="{{ url('admin/recycle/restoreAll') }}" class="btn btn-success">全部还原</a>
                <a href="{{ url('admin/recycle/deleteAll') }}" class="btn btn-danger">全部删除</a>
                <div class="panel-body">
                @foreach ($articles as $article)
                    <p>{{ $article->title }}</p>
                    <p>{{ $article->body }}</p>
                    <a href="{{ url('admin/recycle/restore/' .$article->id) }}" class="btn btn-success">还原</a>
                    <a href="{{ url('admin/recycle/delete/' .$article->id) }}" class="btn btn-danger">彻底删除</a>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection