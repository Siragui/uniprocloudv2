<?php

namespace App\Http\Controllers;

// use auth;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {

        $projects = Project::orderBy('created_at' , 'DESC')->get();
        // $projects = Project::all();
        return view('projects.index' , compact('projects'));
    }

    public function create()
    {
        {
            return view('projects.create');
        }

    }


    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'body' => 'required' ,
            'pdf' =>  'required|mimes:pdf',
            'date_limite' =>  'required',

        ]);

        $slug = Str::slug($request->title, '-');

        $newPdfName = uniqid() . '-' .  $slug . '.' . $request->pdf->extension();
        $request->pdf->move(public_path('project/pdf'), $newPdfName);




        Project::create([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'pdf' => $newPdfName ,
            'slug' =>  $slug ,
            'date_limite' => $request->input('date_limite'),
            'user_id' =>  Auth::id(),

        ]);
            return redirect('projects')->with('success', 'Projet publié avec succès');



    }

    public function show($slug)
    {

        return view('projects.show')
        ->with('project', Project::where('slug',$slug)->first());
    }


    public function edit($slug)
    {
        return view('projects.edit')
        ->with('project', Project::where('slug',$slug)->first());
    }


    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required' ,
            'pdf' =>  'required|mimes:pdf',
            'date_limite' =>  'required',
        ]);

        $newPdfName = uniqid() . '-' .  $slug . '.' . $request->pdf->extension();
        $request->pdf->move(public_path('project/pdf'), $newPdfName);


        Project::where('slug', $slug)
        ->update([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'pdf' => $newPdfName ,
            'slug' =>  $slug ,
            'date_limite' => $request->input('date_limite'),
            'user_id' =>  Auth::id(),


        ]);

        return redirect('/projects/'. $slug)
        ->with('message', 'mise a jour avec succès');

    }


    public function destroy( $slug)
    {

        Project::where('slug', $slug)->delete();

        return redirect('/projects')
        ->with('message', 'Le cours à été supprimé avec succès');
    }
}
