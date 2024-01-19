@extends('layouts.app')

@section('content')


<div class="container">




    <div class="jumbotron">
        <h2 class="display-4 text-danger ">Mettre à jour</h2>
        <hr class="my-4">
        <p class="lead">
            <a class=" btn btn-success  rounded" href="{{ route('projects.index') }}" role="button">revenir</a>

      </div>



    <form method="POST" action="/projects/{{$project->slug}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
    <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

  <div>
    <label class="pb-2" for="" >Matière du devoir</label><br/>


        <p>
            <label class="pb-2 mt-2" for=" title" >Titre</label><br/>
            <input class="form-control " type="text" name="title" value="{{$project->title }}"  id="title" placeholder="Le Titre  du devoir" >

            <!-- Le message d'erreur pour "title" -->
            @error("title")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label class="pb-2 mt-2" for="date_limite" >Date Limite à rendre</label><br/>
            <input class="form-control " type="text" name="date_limite" value="{{$project->date_limite }}"  id="date_limite" placeholder="Date Limite à rendre">

            <!-- Le message d'erreur pour "title" -->
            @error("date_limite")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" for=" body" >Description  du devoir </label><br/>

            <textarea name="body" id="" class="form-control" cols="30" rows="3"  placeholder="Descriptions  du devoir.... ">{{$project->body }}</textarea>
            <!-- Le message d'erreur pour "Description" -->
            @error("body")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" > Importer le documents  du devoir</label><br/>
            <input class="form-control " type="file" name="pdf" value="{{$project->pdf }}"  id="pdf" placeholder=" Documents  du devoir " >

            <!-- Le message d'erreur pour "pdf" -->
            @error("pdf")
            <div>{{ $message }}</div>
            @enderror
        </p>


        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

    </div>
    </form>

        @endsection
