@extends('layouts.app')

@section('content')
<div class="container roles">
    <div class="col-6 mx-auto shadow p-3">
        @include('includes.session')
        <ul class="list-group">
            @forelse ($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-center">
                    <div class="info col-4">
                        {{$user->name}}
                        <br />
                        <span class="badge p-2 rounded-pill" style="background-color: {{$user->roles->color}}">{{$user->roles->name}}</span>
                    </div>
                    <div class="count col-4">
                        Utenti <br/> {{count($user->users)}}
                    </div>
                    <div class="btn d-flex col-4">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning mx-2">Edit</a>
                    </div>
                </li>
            @empty
                <li>Nessun Users</li>
            @endforelse
        </ul>
    </div>
</div>
</div>
@endsection