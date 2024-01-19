@extends('layouts.app')

@section('content')



<div class="container">


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
    <h1 class="display-4 text-danger ">Publier un nouveau events</h1>
    {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
    <hr class="my-4">
    <p class="lead">
      <a class=" btn btn-success rounded" href="{{ route('events.index') }}" role="button">Revenir</a>
    </p>
  </div>
    <!-- Le formulaire est géré par la route " $courses.store" -->
    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" >

        <!-- Le token CSRF -->
        @csrf
    <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

  <div>
    <label class="pb-2" for="" >Events</label><br/>


        <p>
            <label class="pb-2 mt-2" for=" title" >Titre</label><br/>
            <input class="form-control " type="text" name="title" value="{{ old('title') }}"  id="title" placeholder="Le Titre du cours" >

            <!-- Le message d'erreur pour "title" -->
            @error("title")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" for=" body" >Description </label><br/>
            {{-- <input class="form-control " type="text" name="body" value="{{ old('body') }}"  id="body" placeholder="Descriptions du cours " > --}}

            <textarea name="body" id="" class="form-control" cols="30" rows="3" value="{{ old('body') }}"  placeholder="Descriptions du cours.... "></textarea>
            <!-- Le message d'erreur pour "Description" -->
            @error("body")
            <div>{{ $message }}</div>
            @enderror
        </p>

        <p>
            <label  class="pb-2"  > Importer l'image de l'evenement</label><br/>
            <input class="form-control " type="file" name="photo" value="{{ old('photo') }}"  id="photo" placeholder=" Logo de la matièret " >

            <!-- Le message d'erreur pour "Documents" -->
            @error("photo")
            <div>{{ $message }}</div>
            @enderror
        </p>


        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

    </div>
    </form>


        @endsection
