@extends('layouts.app')

@section('content')
<div class="container">
    @include('includes.errors')
    <header>
        <h1>Add Post</h1>
    </header>
    <section id="form">
        @include('includes.admin.posts.form')
    </section>
</div>
@endsection