<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
    	$roles = Role::all();
    	return view('admin.roles.index')->with('roles',$roles);
    }

    public function store(Request $request)
    {
    	Role::create(['name' => $request->name]);

    	return redirect('admin/roles');
    }

    public function destroy($id)
    {	
    	$role = Role::find($id);
    	$role->delete();
    	return redirect('admin/roles');
    	# code...
    }
}
