@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑分类</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/base/'.$base->id) }}" method="POST">
                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}
                        <label for="sortnum">请输入序号</label>
                        <input type="number" name="sortnum" class="form-control" required="required" placeholder="请输入序号" min="0" value="{{ $base->sortnum }}">
                        <br>
                        <label for="name">请输入标题</label>
                        <input type="text" name="name" class="form-control" required="required" placeholder="请输入标题" value="{{ $base->name }}">
                        <br>
                        <label for="en_name">请输入英文别称</label>
                        <input type="text" name="en_name" class="form-control" placeholder="请输入英文别称" value="{{ $base->en_name }}">
                        <br>
                        <label for="hasSecond">是否允许二级分类</label>
                        <input type="radio" name="hasSecond" value="0"  @if( $base->hasSecond ===0) checked @endif>是
                        <input type="radio" name="hasSecond" value="1" @if( $base->hasSecond ===1) checked @endif>否
                        <br>
                        <label for="hasThird">是否允许三级分类</label>
                        <input type="radio" name="hasThird" value="0" @if( $base->hasThird ===0) checked @endif>是
                        <input type="radio" name="hasThird" value="1" @if( $base->hasThird ===1) checked @endif>否
                        <input type="radio" name="hasThird" value="2" @if( $base->hasThird ===2) checked @endif>自定义
                        <br>
                        <label for="info_state">内容展现方式</label>
                        @php
                            $info_state = explode(',',$base->info_state);
                        @endphp
                        <input type="checkbox" name="info_state[]" value="0" @if(in_array(0,$info_state)) checked @endif>图文内容
                        <input type="checkbox" name="info_state[]" value="1" @if(in_array(1,$info_state)) checked @endif>新闻列表
                        <input type="checkbox" name="info_state[]" value="2" @if(in_array(2,$info_state)) checked @endif>图片列表
                        <input type="checkbox" name="info_state[]" value="3" @if(in_array(3,$info_state)) checked @endif>图文列表
                        <br>
                        <label for="set_info_state">内容默认展现方式</label>
                        <input type="radio" name="set_info_state" value="0" @if( $base->set_info_state ===0) checked @endif>图文内容
                        <input type="radio" name="set_info_state" value="1" @if( $base->set_info_state ===1) checked @endif>新闻列表
                        <input type="radio" name="set_info_state" value="2" @if( $base->set_info_state ===2) checked @endif>图片列表
                        <input type="radio" name="set_info_state" value="3" @if( $base->set_info_state ===3) checked @endif>图文列表
                        <br>
                        <button class="btn btn-lg btn-info">保存</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection