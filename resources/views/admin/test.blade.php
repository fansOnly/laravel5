@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('admin') }}" class="btn btn-lg btn-success">返回</a>
                </div>

                <div class="panel-body">
                    @foreach ($users as $user)
                        <p>{{ $user->id }} 、 {{ $user->name }} | {{ $user->email }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection