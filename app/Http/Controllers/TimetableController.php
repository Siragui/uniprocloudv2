<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $timetables = Timetable::get();
        return view('timetables.index')->with('timetables',$timetables);
    }


    public function create()
    {
        return view('timetables.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'jour' =>  'required',
            'heure' =>  'required',
            'sale' =>  'required',
            'mat' =>  'required',
            'prof' =>  'required',
        ]);


        $slug = Str::slug($request->jour, '-');


        Timetable::create([

            'jour' => $request->input('jour'),
            'heure' => $request->input('heure'),
            'sale' => $request->input('sale'),
            'mat' => $request->input('mat'),
            'prof' => $request->input('prof'),
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),


        ]);

        // dd($request->all());
        // dd($newLogoName);
        return redirect()->back();
    }


    public function show($slug)
    {

        return view('timetables.show')
        ->with('timetable', Timetable::where('slug',$slug)->first());
    }


    public function edit($slug)
    {

        return view('timetables.edit')
        ->with('timetable', Timetable::where('slug',$slug)->first());
    }


    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'jour' =>  'required',
            'heure' =>  'required',
            'sale' =>  'required',
            'mat' =>  'required',
            'prof' =>  'required',
        ]);



            Timetable::where('slug', $slug)
        ->update([

            'jour' => $request->input('jour'),
            'heure' => $request->input('heure'),
            'sale' => $request->input('sale'),
            'mat' => $request->input('mat'),
            'prof' => $request->input('prof'),
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),


        ]);

        return redirect('/timetables/'. $slug)
        ->with('message', 'mise a jour avec succès');
    }


    public function destroy(Timetable $timetable)
    {
        //
    }
}
