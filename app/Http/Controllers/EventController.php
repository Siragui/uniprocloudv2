<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
// use Auth;

class EventController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::orderBy('created_at' , 'DESC')->get();
        return view('events.index')->with('events',$events);
    }


    public function create()
    {
        return view('events.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required',
            'body' =>  'required',
            'photo' =>  'required|mimes:jpeg,png,jpg,pdf',
        ]);


        $slug = Str::slug($request->title, '-');

        $newPhotoName = uniqid() . '-' .  $slug . '.' . $request->photo->extension();


        $request->photo->move(public_path('Upload/events/photo'), $newPhotoName);



        Event::create([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'photo' => $newPhotoName ,
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),



        ]);
        // return redirect()->back();
        return redirect('/events');

    }

    public function show( $slug)
    {
        return view('events.show')
        ->with('event', Event::where('slug',$slug)->first());

    }


    public function edit( $slug)
    {

        return view('events.edit')
        ->with('event', Event::where('slug',$slug)->first());
    }


    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' =>  'required',
            'body' =>  'required',
            'photo' =>  'required|mimes:jpeg,png,jpg,pdf',

        ]);


        $newPhotoName = uniqid() . '-' .  $slug . '.' . $request->photo->extension();

        $request->photo->move(public_path('Upload/events/photo'), $newPhotoName);




        Event::where('slug', $slug)
        ->update([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'photo' => $newPhotoName ,
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),


        ]);


        // dd($request->all());

        return redirect('/events/'. $slug)
        ->with('message', 'mise a jour avec succès');

    }

    public function destroy( $slug)
    {

        Event::where('slug', $slug)->delete();

        return redirect('/events')
        ->with('message', 'Le cours à été supprimé avec succès');
    }
}

