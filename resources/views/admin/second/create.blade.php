@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增栏目</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/base') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="base_id" value="{{ $base_id }}" >
                        <label for="">请输入序号</label>
                        <input type="number" name="sortnum" class="form-control" required="required" placeholder="请输入序号" min="0" >
                        <br>
                        <label for="">请输入标题</label>
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                        <label for="">请输入英文别称</label>
                        <input type="text" name="en_name" class="form-control" required="required" placeholder="请输入英文别称">
                        <br>
                        <label for="">是否允许三级分类</label>
                        <input type="radio" name="hasThird" class="" value="0">是
                        <input type="radio" name="hasThird" class="" value="1" checked>否
                        <br>
                        <label for="">内容展现方式</label>
                        <input type="checkbox" name="info_state[]" class="" value="0" checked>图文内容
                        <input type="checkbox" name="info_state[]" class="" value="1">新闻列表
                        <input type="checkbox" name="info_state[]" class="" value="2">图片列表
                        <input type="checkbox" name="info_state[]" class="" value="3">图文列表
                        <br>
                        <button class="btn btn-lg btn-info">添加</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection