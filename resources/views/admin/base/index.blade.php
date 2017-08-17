@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">文章管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <a href="{{ url('admin/base/create/'.($base or 0)) }}" class="btn btn-lg btn-primary">新增</a>

                    <table width="100%" border="1" collspacing="0" collspadding="5">
                        <tr>
                            <td>序号</td>
                            <td>栏目名称</td>
                            <td>栏目别称</td>
                            <td>二级栏目</td>
                            <td>三级栏目</td>
                            <td>展现形式</td>
                            <td>默认展现</td>
                            <td colspan="2">操作</td>
                        </tr>
                        @foreach ($base as $base)
                            @php
                                $hasSecond = $base->hasSecond;
                                $hasSecond = str_replace('0', '是', $hasSecond);
                                $hasSecond = str_replace('1', '否', $hasSecond);
                                $hasThird = $base->hasThird;
                                $hasThird = str_replace('0', '是', $hasThird);
                                $hasThird = str_replace('1', '否', $hasThird);
                                $hasThird = str_replace('2', '自定义', $hasThird);
                                $info_state = $base->info_state;
                                $info_state = str_replace('0', '图文内容', $info_state);
                                $info_state = str_replace('1', '新闻列表', $info_state);
                                $info_state = str_replace('2', '图片列表', $info_state);
                                $info_state = str_replace('3', '图文列表', $info_state);
                                $set_info_state = $base->set_info_state;
                                $set_info_state = str_replace('0', '图文内容', $set_info_state);
                                $set_info_state = str_replace('1', '新闻列表', $set_info_state);
                                $set_info_state = str_replace('2', '图片列表', $set_info_state);
                                $set_info_state = str_replace('3', '图文列表', $set_info_state);
                            @endphp
                            <hr>
                            <tr>
                                <td>{{ $base->sortnum }}</td>
                                <td>{{ $base->name }}</td>
                                <td>{{ $base->en_name }}</td>
                                <td>{{ $hasSecond }}
                                    @if ($hasSecond==='是')
                                        <a href="{{ url('admin/base/create/'.$base->id) }}" class="btn btn-success">查看</a>
                                        {{-- <a href="{{ url('admin/base?base_id='.$base->id) }}" class="btn btn-success">查看</a> --}}
                                    @endif
                                </td>
                                <td>{{ $hasThird }}</td>
                                <td>{{ $info_state }}</td>
                                <td>{{ $set_info_state }}</td>
                                <td><a href="{{ url('admin/base/edit/'.$base->id) }}" class="btn btn-success">编辑</a></td>
                                <td>
                                    <form action="{{ url('admin/base/'.$base->id) }}" method="POST" style="display: inline;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">删除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection