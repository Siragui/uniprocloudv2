@extends('layouts.app')

@section('content')


<div class="container">

    @if (session()->has('message'))

    <div class="alert alert-success" role="alert">

        {{session()->get('message')}}
    </div>
    @endif

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all as $item )
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
    @endif

<div class="jumbotron">
    {{-- <h1 class="display-4 text-danger ">Publier un nouveau cours</h1> --}}
    {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
    <div class="lead d-flex align-items-center m-2 ">

        <a class=" btn btn-success  rounded" href="{{ route('courses.index') }}" role="button">revenir</a>
        @if (Auth::user()->id == $course->user_id )
        <a href="/courses/{{$course->slug}}/edit" class=" btn btn-warning m-2 rounded ">Mettre à jour</a>

        <form action="/courses/{{$course->slug}}" method="POST">
            @csrf
            @method('DELETE')

            <button class=" btn btn-danger m-1 rounded ">Supprimer</button>
        </form>
        @endif
    </div>
    <hr class="my-4">
  </div>

  <div class="main container ">

    <div class="mt-2 d-flex justify-content-center align-item-center">



<div>
        <h2 class="text-centre">{{$course->title}}</h2>


        <p>{{$course->body}}</p>
    </div>

    </div>
{{--

    <div class="event  p-3 bg-secondary text-dark bg-opacity-25 rounded">





    </div> --}}

    <embed src="/course/pdf/{{$course->pdf}}" width=100% height=900 class="border border-success" type='application/pdf'/>




</div>

        @endsection
