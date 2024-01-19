<?php

namespace App\Http\Controllers;

// use auth;
// use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $courses = Course::orderBy('created_at' , 'DESC')->get();
        return view('courses.index')->with('courses',$courses);
    }


    public function create()
    {

        return view('courses.create');

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required',
            'body' =>  'required',
            'pdf' =>  'required|mimes:pdf, docx, doc, odt, xls, xlsx, ppt, pptx, txt',
            'logo' =>  'required|mimes:jpeg,png,jpg,pdf',
        ]);


        $slug = Str::slug($request->title, '-');

        $newPdfName = uniqid() . '-' .  $slug . '.' . $request->pdf->extension();
        $newLogoName = uniqid() . '-' .  $slug . '.' . $request->logo->extension();

        $request->pdf->move(public_path('course/pdf'), $newPdfName);
        $request->logo->move(public_path('course/logo'), $newLogoName);



         Course::create([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'pdf' => $newPdfName ,
            'logo' => $newLogoName ,
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),


        ]);

        // dd($request->all());
        // dd($newLogoName);
        return redirect('/courses');

    }


    public function show( $slug )
    {


        return view('courses.show')
        ->with('course', Course::where('slug',$slug)->first());

    }


    public function edit( $slug)
    {
        return view('courses.edit')
        ->with('course', Course::where('slug',$slug)->first());
    }


    public function update(Request $request, $slug)
    {

        $this->validate($request,[
            'title' =>  'required',
            'body' =>  'required',
            // 'pdf' =>  'required|mimes:pdf, docx, doc, odt, xls, xlsx, ppt, pptx, txt',
            // 'logo' =>  'required|mimes:jpeg,png,jpg,pdf',
        ]);

        $newPdfName = uniqid() . '-' .  $slug . '.' . $request->pdf->extension();
        $newLogoName = uniqid() . '-' .  $slug . '.' . $request->logo->extension();

        $request->pdf->move(public_path('course/pdf'), $newPdfName);
        $request->logo->move(public_path('course/logo'), $newLogoName);

        Course::where('slug', $slug)
        ->update([

            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'pdf' => $newPdfName ,
            'logo' => $newLogoName ,
            'slug' =>  $slug ,
            'user_id' =>  Auth::id(),


        ]);

        return redirect('/courses/'. $slug)
        ->with('message', 'mise a jour avec succès');

    }


    public function destroy( $slug)
    {

        Course::where('slug', $slug)->delete();

        return redirect('/courses')
        ->with('message', 'Le cours à été supprimé avec succès');
    }

    public function search(Request $request)
    {
        $q = ($request->input('q'));

        $courses = Course::where('title', 'like', "%$q%" )

        ->orWhere('body', 'like', "%$q%");

        return view('courses.search')->with('courses',$courses);
    }
}
