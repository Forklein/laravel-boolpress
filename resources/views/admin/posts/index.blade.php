@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Scritto il</th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->getFormattedDate('created_at')}}</td>
            <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Details</a></td>
          </tr>
          @empty
          <tr>
            <td colspan="3">Nessun Post</td>
          </tr>
        </tbody>
        @endforelse
      </table>
</div>
@endsection