@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <a href="{{ url('admin/article') }}" class="btn btn-lg btn-success ">管理文章</a>
                    <a href="{{ url('admin/recycle') }}" class="btn btn-lg btn-success ">回收站</a>
                    <a href="{{ url('admin/base') }}" class="btn btn-lg btn-success ">新建栏目</a>
                    <a href="{{ url('admin/test') }}" class="btn btn-lg btn-success ">测试</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection