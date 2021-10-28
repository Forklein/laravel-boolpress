<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(user $user)
    {
        $roles = Role::all();
        $roleIds = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'roleIds'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->roles;
        if (!$data) $user->roles()->detach();
        else $user->roles()->sync($data);
        return redirect()->route('admin.users.index')->with('alert', 'success')->with('alert-message', "$user->name modificato con successo");
    }
}
