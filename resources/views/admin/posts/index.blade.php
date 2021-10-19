@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Scritto il</th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->getFormattedDate('created_at')}}</td>
            <td class="d-flex justify-content-end">
              <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Details</a>
              <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-2">Edit</a>
              <form method="post" action="{{ route('admin.posts.destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Nessun Post</td>
          </tr>
        </tbody>
        @endforelse
      </table>
      {{$posts->links()}}
</div>
@endsection