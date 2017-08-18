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
                        <label for="">请输入序号</label>
                        <input type="text" name="parent_id" value="{{ $id }}" hidden>
                        <input type="number" name="sortnum" class="form-control" required="required" placeholder="请输入序号" min="0" >
                        <br>
                        <label for="">请输入标题</label>
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                        <label for="">请输入英文别称</label>
                        <input type="text" name="en_name" class="form-control" placeholder="请输入英文别称">
                        <br>
                        <label for="">是否允许子分类</label>
                        <input type="radio" name="hasSecond" class="" value="0" checked>是
                        <input type="radio" name="hasSecond" class="" value="1">否
                        <br>
                        {{-- <label for="">是否允许三级分类</label>
                        <input type="radio" name="hasThird" class="" value="0">是
                        <input type="radio" name="hasThird" class="" value="1" checked>否
                        <input type="radio" name="hasThird" class="" value="2">自定义
                        <br> --}}
                        <label for="">内容展现方式</label>
                        @if (str_contains($info_state,'0'))
                            <input type="checkbox" name="info_state[]" value="0" checked>图文内容
                        @endif
                        @if (str_contains($info_state,'1'))
                            <input type="checkbox" name="info_state[]" value="1" checked>新闻列表
                        @endif
                        @if (str_contains($info_state,'2'))
                            <input type="checkbox" name="info_state[]" value="2" checked>图片列表
                        @endif
                        @if (str_contains($info_state,'3'))
                            <input type="checkbox" name="info_state[]" value="3" checked>图文列表
                        @endif
                        <br>
                        <label for="">内容默认展现方式</label>
                        @if (str_contains($info_state,'0'))
                            <input type="radio" name="set_info_state" value="0" @if (starts_with($info_state,'0')) checked @endif >图文内容
                        @endif
                        @if (str_contains($info_state,'1'))
                            <input type="radio" name="set_info_state" value="1" @if (starts_with($info_state,'1')) checked @endif>新闻列表
                        @endif
                        @if (str_contains($info_state,'2'))
                            <input type="radio" name="set_info_state" value="2" @if (starts_with($info_state,'2')) checked @endif>图片列表
                        @endif
                        @if (str_contains($info_state,'3'))
                            <input type="radio" name="set_info_state" value="3" @if (starts_with($info_state,'3')) checked @endif>图文列表
                        @endif
                        <br>
                        <button class="btn btn-lg btn-info">添加</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection