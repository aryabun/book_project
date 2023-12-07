<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    public function edit(Role $role){
        return view('admin.role.edit', compact('role'));
    }
    public function store(Request $request, Role $role){
        $role->create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role successfully created!');
    }
    public function update(Request $request, Role $role){
        $role->create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role successfully created!');
    }
    public function destroy(Role $role){
        // $role->create($request->all());
        return redirect()->route('roles.index')->with('success', 'Role successfully deleted!');
    }

}
