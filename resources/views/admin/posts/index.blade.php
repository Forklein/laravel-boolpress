@extends('layouts.app')

@section('content')
<div class="container posts shadow p-3">
    @if(session('alert'))
    <div class="alert alert-{{session('alert')}}">
      <strong>{{session('alert-message')}}</strong>
    </div>
    @endif
    <table class="table">
        <thead>
          <tr>
            {{-- <th scope="col">ID</th> --}}
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Author</th>
            {{-- <th scope="col">Address</th> --}}
            <th scope="col">Tags</th>
            <th scope="col">Scritto il</th>
            <th scope="col" class="text-right">
              <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Crea post</a>
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
          <tr>
            {{-- <td>{{$post->id}}</td> --}}
            <td>{{$post->title}}</td>
            <td>
              @if($post->category) <span class="badge p-2 rounded-pill bg-{{$post->category->color}}">{{$post->category->name}}</span> @else Nessuna Categoria @endif
            </td>
            <td>
              @if($post->author) 
                {{$post->author->name}}
                @else Nessun Autore 
              @endif
            </td>
            {{-- <td>
              @if($post->author->userInfo) 
                {{$post->author->userInfo->address}}
                @else Nessuna Via 
              @endif
            </td> --}}
            <td> 
              @forelse($post->tags as $tag)
              <span class="badge p-2 rounded-pill text-white" style="background-color: {{$tag->color}};">{{$tag->name}}</span>
              @empty Nessun Tag
              @endforelse
            </td>
            <td>{{$post->getFormattedDate('created_at', 'd-m-Y')}}</td>
            <td class="d-flex justify-content-around">
              <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Details</a>
              <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-1">Edit</a>
              <form method="post" action="{{ route('admin.posts.destroy', $post->id) }}" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8">Nessun Post</td>
          </tr>
        </tbody>
        @endforelse
      </table>
      {{$posts->links()}}
</div>
@endsection


@section('scripts')
<script src="{{ asset('js/confirm.js') }}"></script>
@endsection