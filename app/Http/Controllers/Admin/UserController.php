<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }

    public function edit(user $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, Role $role)
    {
        //
    }
}
