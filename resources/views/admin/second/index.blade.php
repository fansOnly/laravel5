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

                    <a href="{{ url('admin/second/create') }}" class="btn btn-lg btn-primary">新增</a>

                    <table width="100%" border="1" collspacing="0" collspadding="5">
                        <tr>
                            <td>序号</td>
                            <td>栏目名称</td>
                            <td>栏目别称</td>
                            {{-- <td>一级栏目</td> --}}
                            <td>三级栏目</td>
                            <td>展现形式</td>
                            <td>默认展现</td>
                            <td colspan="2">操作</td>
                        </tr>
                    @foreach ($second as $second)
                        @php
                            $hasThird = $second->hasThird;
                            $hasThird = str_replace('0', '是', $hasThird);
                            $hasThird = str_replace('1', '否', $hasThird);
                            $info_state = $second->info_state;
                            $info_state = str_replace('0', '图文内容', $info_state);
                            $info_state = str_replace('1', '新闻列表', $info_state);
                            $info_state = str_replace('2', '图片列表', $info_state);
                            $info_state = str_replace('3', '图文列表', $info_state);
                        @endphp
                        <hr>
                        <tr>
                            <td>{{ $second->sortnum }}</td>
                            <td>{{ $second->name }}</td>
                            <td>{{ $second->en_name }}</td>
                            <td>{{ $hasThird }}
                                @if ($hasThird==='是')
                                    <a href="{{ url('admin/second/index') }}" class="btn btn-success">查看</a>
                                @endif
                            </td>
                            <td>{{ $info_state }}</td>
                            <td><a href="{{ url('admin/second/edit/'.$second->id) }}" class="btn btn-success">编辑</a></td>
                            <td>
                                <form action="{{ url('admin/second/'.$second->id) }}" method="POST" style="display: inline;">
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