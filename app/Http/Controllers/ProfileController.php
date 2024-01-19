<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $user = Auth::user();
        $id = Auth::id();

        if ($user->Profile == null) {

         Profile::create([
                'user_id' => $id ,
                'photo' => '',
                'class'=> 'L3 GI ',
                'gender'=> 'Homme ',
                'address'=> 'Dakar Gueule Tapée ',
                'number'=> '+221 77 000 00 00 ',
            ]);
        }

        return view('profiles.index')->with('user', $user);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        return view('profiles.edit')
        ->with('profile', Profile::where('id',$id)->first());
    }

    public function update(Request $request ,$id )
    {

        $this->validate($request,[

            'photo' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);


        $photo = uniqid() . '-'  . '.' . $request->photo->extension();


        $request->photo->move(public_path('profile/photo'), $photo);

        Profile::where('id', $id)
        ->update([

            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),
            'photo' => $photo ,
            'user_id' =>  Auth::id(),


        ]);

        return redirect('/profiles')
        ->with('message', 'mise a jour avec succès');


    }


    public function destroy($id)
    {
        //
    }
}
