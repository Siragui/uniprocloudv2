<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at' , 'DESC')->get();
        return view('users.index')->with('users',$users);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required', 'string', 'max:255'],

        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => $request->roles,
        ]);

        return redirect('/users');
    }



    public function show($id)
    {
        return view('users.show')
        ->with('user', User::where('id',$id)->first());
    }



    public function edit($id)
    {
        return view('users.edit')
        ->with('user', User::where('id',$id)->first());
    }



    public function update(Request $request, $id)
    {


        User::where('id',$id)
        ->update([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'roles' => $request->input('roles'),
        ]);

        return redirect('/users/'. $id)
        ->with('message',  ' Utilisateur mise a jour avec succès');
    }


    public function destroy($id)
    {
        User::where('id',$id)->delete();

        return redirect('/users')
        ->with('message', 'Utilisateur à été supprimé avec succès');
    }
}
