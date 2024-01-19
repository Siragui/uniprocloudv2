@extends('layouts.app')

@section('content')<div class="container">


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
    <h1 class="display-4 text-danger ">Mettre à jour l'evenement</h1>
    <hr class="my-4">
    <p class="lead">
        <a class=" btn btn-success  rounded" href="{{ route('events.index') }}" role="button">revenir</a>
  </div>

        <form method="POST" action="/events/{{$event->slug}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

  <div>
    <label class="pb-2" for="" >Events</label><br/>


        <p>
            <label class="pb-2 mt-2" for=" title" >Titre</label><br/>
            <input class="form-control " type="text" name="title" value="{{$event->title}}"  id="title"  >

            <!-- Le message d'erreur pour "title" -->
            @error("title")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" for=" body" >Description </label><br/>

            <textarea name="body" id="" class="form-control" cols="30" rows="3"  > {{$event->body}}</textarea>
            @error("body")
            <div>{{ $message }}</div>
            @enderror
        </p>

        <p>
            <label  class="pb-2"  > Importer l'image '</label><br/>
            <input class="form-control " type="file" name="photo"value=" {{$event->photo}}"  id="photo"  >

            <!-- Le message d'erreur pour "Documents" -->
            @error("photo")
            <div>{{ $message }}</div>
            @enderror
        </p>


        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

    </div>
    </form>

          </div>
        </div>

        @endsection
