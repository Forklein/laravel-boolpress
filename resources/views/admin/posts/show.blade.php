@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="card-body">
            <p>{{$post->content}}</p>
        </div>
        <div class="card-footer">
            <address>{{$post->getFormattedDate('created_at')}}</address>
        </div>
    </div>
</div>
@endsection