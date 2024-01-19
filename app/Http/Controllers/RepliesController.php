<?php

namespace App\Http\Controllers;

use App\Models\Replies;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class RepliesController extends Controller
{

    public function index()
    {
        $projects = Replies::orderBy('created_at' , 'DESC')->get();
        // $projects = Project::all();
        return view('replies.index' , compact('replies'));
    }


    public function create()
    {
        //
    }


         public function store(Request $request)
    {
         $this->validate($request,
         [
             'body' => 'required' ,
             'file' =>  'required',



         ]);

         $slug = Str::slug($request->title, '-');

         $newFileName = uniqid() . '-' .  $slug . '.' . $request->file->extension();

         $request->file->move(public_path('project/Replies/file'), $newFileName);




       Replies::create([


            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'project_id' => $request->input('project_id'),
            'slug' =>  $slug ,
            'file' => $newFileName ,
            'user_id' =>  Auth::id(),
            // 'project_id' => Project::id()

        ]);

        // dd($request->all());
       return redirect()->back()->with('replies', 'success', 'Votre Projet à été soumit avec succès');
    }

    // replies.show.blade
    public function show( $id)
    {


        return view('replies.show')
        ->with('replies', Replies::where('id',$id)->first());
    }


    public function edit(Replies $slug)
    {
        //
    }

    public function update(Request $request, Replies $replies)
    {
        //
    }


    public function destroy(Replies $replies)
    {
        //
    }
}
