@extends('layouts.app')
@section('content')
<div class="container categories">
    <div class="col-6 mx-auto shadow p-3">
        @include('includes.session')
        <div class="create text-right my-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Crea categoria</a>
        </div>
        <ul class="list-group">
            @forelse ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
                    <div class="info">
                        {{$category->name}}
                    </div>
                    <span class="badge p-2 rounded-pill bg-{{$category->color}}">{{$category->name}}</span>
                    <div class="btn d-flex">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning mx-2">Edit</a>
                        <form method="post" action="{{ route('admin.categories.destroy', $category->id) }}" class="delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li>Nessuna Categoria</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection