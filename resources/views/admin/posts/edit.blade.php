@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{route('admin.posts.store')}}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Descrizione</label>
            <textarea class="form-control" name="content" id="content" rows="5">value={{$post->content}}</textarea>
          </div>
        <div class="mb-3">
            <label for="image" class="form-label">Link Image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{$post->image}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
    </form>
</div>
@endsection