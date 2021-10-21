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
        <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="info">
                <address class="font-weight-bold">{{$post->getFormattedDate('created_at')}}</address>
                <address class="font-weight-bold">Category @if($post->category){{$post->category->name}}@else Nessuna Categoria @endif</address>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection