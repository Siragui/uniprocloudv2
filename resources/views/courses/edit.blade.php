@extends('layouts.app')

@section('content')


<div class="container">



<div class="jumbotron">
    <h1 class="display-4 text-danger ">Mettre à jour le cours</h1>
    <hr class="my-4">
    <p class="lead">
        <a class=" btn btn-success  rounded" href="{{ route('courses.index') }}" role="button">revenir</a>

  </div>

      <!-- Le formulaire est géré par la route " $courses.store" -->
      <form method="POST" action="/courses/{{$course->slug}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')


    <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

  <div>
    <label class="pb-2" for="" >cours</label><br/>


        <p>
            <label class="pb-2 mt-2" for=" title" >Titre</label><br/>
            <input class="form-control " type="text" name="title" value="{{$course->title}}"  id="title"  >

            <!-- Le message d'erreur pour "title" -->
            @error("title")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" for=" body" >Description </label><br/>

            <textarea name="body" id="" class="form-control" cols="30" rows="3"> {{$course->body}}</textarea>
            @error("body")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" > Importer le documents du cours</label><br/>
            <input class="form-control " type="file" name="pdf" value="{{$course->pdf}}"  id="pdf" >

            @error("pdf")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2"  > Importer le logo de la matièret</label><br/>
            <input class="form-control " type="file" name="logo"value="{{$course->logo}}"  id="logo"  >

            <!-- Le message d'erreur pour "Documents" -->
            @error("logo")
            <div>{{ $message }}</div>
            @enderror
        </p>


        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

    </div>
    </form>

        @endsection
