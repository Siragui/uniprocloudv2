@extends('layouts.app')

@section('content')

<div class="lead container d-flex align-items-center m-2 ">

    <a class=" btn btn-success  rounded" href="{{ route('projects.index') }}" role="button">revenir</a>
    @if (Auth::user()->id == $project->user_id )
    <a href="/projects/{{$project->slug}}/edit" class=" btn btn-warning m-2 rounded ">Mettre à jour</a>

    <form action="/projects/{{$project->slug}}" method="POST">
        @csrf
        @method('DELETE')

        <button class=" btn btn-danger m-1 rounded ">Supprimer</button>

    </form>
    @endif
</div>


@if (session()->has('message'))

<div class="alert alert-success" role="alert">

    {{session()->get('message')}}
</div>
@endif
<hr class="my-4">
</div>
<div class="container">

    <h1 class="text-primary">
        {{$project->title }}
    </h1>
    <p class=""> {{$project->body }}</p>


    @if (Auth::user()->roles == 0 )

<div class="">
    <form method="POST" action="{{ route('replies.store') }}" enctype="multipart/form-data" >

        <!-- Le token CSRF -->
        @csrf
    <div class=" m-2 form-group mt-5 border rounded  p-3  w-50">

  <div>
    <label class="pb-2" for="" >Soumettre votre projet</label><br/>



    <input type="hidden" name="project_id" id="post_id" value="{{$project->id}}" />
    <input type="hidden" name="title" id="title" value="{{$project->title}}" />

        <p>
            {{-- <label  class="pb-2" for=" body" >Message </label><br/> --}}

            <textarea name="body" id="" class="form-control" cols="30" rows="3" value="{{ old('body') }}"  placeholder="Message.... "></textarea>
            <!-- Le message d'erreur pour "Description" -->
            @error("body")
            <div>{{ $message }}</div>
            @enderror
        </p>
        <p>
            <label  class="pb-2" > Importer le documents du projet</label><br/>
            <input class="form-control " type="file" name="file" value="{{ old('file') }}"  id="file"  >

            <!-- Le message d'erreur pour "logo" -->
            @error("file")
            <div>{{ $message }}</div>
            @enderror
        </p>




        <input class="btn btn-success rounded" type="submit" name="valider" value="Soumettre" >

    </div>
    </form>
</div>
@endif
<hr>
</div>
@include('replies.index', ['replies'=>$project->reply, 'project_id'=>$project->id])
{{-- @include('projects.replies', ['replies'=>$project->reply, 'project_id'=>$project->id]) --}}

@endsection
