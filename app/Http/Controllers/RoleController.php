<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role.index', compact('roles', 'permissions'));
    }
    public function edit(Role $role){
        return view('admin.role.index', compact('role'));
    }
    public function store(Request $request, Role $role){
        $selected_permissions = $request->input('selected_permissions') ?? [];
        $role->create($request->all());
        foreach($selected_permissions as $selected_permission){
            $role->givePermissionTo($selected_permission);
        }
        return redirect()->route('roles.index')->with('success', 'Role successfully created!');
    }
    public function update(Request $request, $id){
        $role = Role::with('permissions')->find($id);
        $selected_permissions = $request->input('selected_permissions') ?? []; //handle empty request, let it empty array
        $role->name = $request->input('name');
        $role->update();
        $role->syncPermissions($selected_permissions); //sync so it give and revoke permission dynamically
        return redirect()->route('roles.index')->with('success', 'Role successfully updated!');
    }
    public function destroy(Role $role){
        $role->delete();
        
        return redirect()->route('roles.index')->with('success', 'Role successfully deleted!');
    }

}
