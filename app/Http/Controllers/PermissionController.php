<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }
    public function edit(Permission $permission){
        return view('admin.permission.edit', compact('permission'));
    }
    public function store(Request $request, Permission $permission){
        $permission->create($request->all());
        return redirect()->route('permission.index')->with('success', 'Permission successfully created!');
    }
    public function update(Request $request, Permission $permission){
        $permission->create($request->all());
        return redirect()->route('permission.index')->with('success', 'Permission successfully created!');
    }
    public function destroy(Permission $permission){
        return redirect()->route('permission.index')->with('success', 'Permission successfully deleted!');
    }
}
