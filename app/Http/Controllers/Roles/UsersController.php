<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','asc')->get();

        return view('usuario.index',['users' => $users]);
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Roles::where('id', $request->role_id)->first();
            $permissions = $roles->permisos;

            return $permissions;  
        }

        $roles = Roles::all();
        return view('usuario.crear',['roles'=>$roles]);
    }

 
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|unique:users|email|max:50',
            'password' => 'required|between:8,12|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return \Redirect::route('users.index');

    }

    public function show(User $user)
    {
        return view('usuario.mostrar',['users' => $user]);
    }

    public function edit(User $user)
    {
         return view('usuario.editar',['users' => $user]);
    }

    public function update(Request $request, User $user)
    {  
        
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:50',
            'password' => 'confirmed',
        ]);
 

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return \Redirect::route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return \Redirect::route('users.index');
    }
}
