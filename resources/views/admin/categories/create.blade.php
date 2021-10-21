@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-4 mx-auto shadow p-3">
        <form method="POST" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Nome categoria</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="color">Colore</label>
                <input type="text" class="form-control" id="color" name="color">
            </div>
            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Back</a>
        </form>
    </div>
</div>
@endsection
