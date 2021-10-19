@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <header>
        <h1>Add Post</h1>
    </header>
    <section id="form">
        @include('includes.admin.posts.form')
    </section>
</div>
@endsection