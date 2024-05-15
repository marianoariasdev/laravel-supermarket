<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return view('users.create', compact('permissions', 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->assignRole($request->role);
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $permissions = Permission::get();
        $roles = Role::get();
        return view('users.edit', compact('user', 'permissions', 'roles'));
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->syncRoles($request->role);
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }   
}
