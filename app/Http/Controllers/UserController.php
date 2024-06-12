<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
   

    public function index()
    {
        return view('admin.index');
    }

    public function edit( User $user)
    { 
        $roles = Role::all();
        $select =$user->roles->pluck('id')->toArray();
       return view('admin.edit',compact('user','roles','select'));
    }

    
    public function update(Request $request, User $user)
    {
       $user->roles()
       ->sync($request->roles);
       return redirect()->route('admin.edit',compact('user'))
       ->with('info','Rol Asignado Correctamente');
    }
}
