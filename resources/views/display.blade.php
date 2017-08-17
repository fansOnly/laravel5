@extends('layouts.app')

@section('content')
<div id="title" style="text-align: center;">
    <h1>Learn Laravel 5</h1>
    <div style="padding: 5px; font-size: 16px;">Learn Laravel 5</div>
</div>
<hr>
<div id="container">
    <ul>
        <li style="margin: 50px 0;">
            <div class="title">
                    <h4>{{ $article -> title }}</h4>
            </div>
            <div class="body">
                <p>{{ $article -> body }}</p>
            </div>
        </li>
    </ul>
</div>
@endsection
