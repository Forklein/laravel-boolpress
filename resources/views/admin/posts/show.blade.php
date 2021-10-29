@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>{{$post->title}}</h2>
        </div>
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col d-flex justify-content-center align-center">
                    <p>{{$post->content}}</p>
                </div>
                <div class="col-3">
                    <img class="img-fluid" src="{{url("storage/$post->image")}}" alt="{{$post->title}}">
                </div>
            </div>
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