<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('usertool')->with('success', 'User deleted successfully.');
    }
    
    public function showAssignRoleForm($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.assignRole', compact('user', 'roles'));
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = Role::findOrFail($request->role_id);

        $user->roles()->sync([$role->id]);

        return redirect()->route('usertool')->with('success', 'Role assigned successfully.');
    }
}