<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubjectController extends Controller
{

    public function index()
    {



        $subjects = Subject::all();


        return view('subjects.index' , compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }


    public function store(Request $request)

    {

    $this->validate($request, [
        'subject' => 'bail|required|string|max:255',
        // "logo" => 'required|image',
        "logo" => 'bail|required|string',
    ]);

    // 2. On upload l'image dans "/storage/app/public/posts"
    // $chemin_logo = $request->logo->store("subjects");

    // 3. On enregistre les informations du Post
    Subject::create([
        "subject" => $request->subject,
        "logo" => $request->logo,
        "course_id" => course()->id,
        // "logo" => $chemin_logo,

    ]);

    // 4. On retourne vers tous les posts : route("posts.index")
    return redirect(route("subjects.index"));


    }


    public function show(Subject $subjects)
    {
        //
    }


    public function edit(Subject $id)
    {
        return view("subjects.edit", compact("subjects"));;
    }


    public function update(Request $request, Subject $subject)
    {

           // 1. La validationSubject

    // Les règles de validation pour "title" et "content"
    $rules = [
        'subject' => 'bail|required|string|max:255',

    ];

    // // Si une nouvelle image est envoyée
    // if ($request->has("logo")) {
    //     // On ajoute la règle de validation pour "logo"
    //     $rules["logo"] = 'bail|required|image|max:1024';
    // }

    $this->validate($request, $id);

    // 2. On upload l'image dans "/storage/app/public/posts"
    // if ($request->has("logo")) {

    //     //On supprime l'ancienne image
    //     Storage::delete($subject->logo);

    //     $chemin_logo = $request->logo->store("subjects");
    // }

    // 3. On met à jour les informations du Post
    $subject->update([
        "subject" => $request->subject,
        "logo" => $request->logo,


    ]);

    // 4. On affiche le Post modifié : route("subjects.show")
    return redirect(route("subjects.show", $subject));


    }


    public function destroy( Subject $subject)
    {
// // On supprime l'image existant
// Storage::delete($subject->logo);

// On les informations du $subject de la table "subjects"
$subject->delete();

// Redirection route "subjects.index"
return redirect(route('subjects.index'));
    }
}
