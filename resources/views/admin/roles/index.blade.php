@extends('layouts.app')

@section('content')
<div class="container roles">
    <div class="col-6 mx-auto shadow p-3">
        @include('includes.session')
        <ul class="list-group">
            @forelse ($roles as $role)
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-center">
                    <div class="info col-4">
                        {{$role->name}}
                        <br />
                        <span class="badge p-2 rounded-pill" style="background-color: {{$role->color}}">{{$role->name}}</span>
                    </div>
                    <div class="count col-4">
                        Utenti <br/> {{count($role->users)}}
                    </div>
                    <div class="btn d-flex col-4">
                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-warning mx-2">Edit</a>
                    </div>
                </li>
            @empty
                <li>Nessun Ruolo</li>
            @endforelse
        </ul>
    </div>
</div>
</div>
@endsection