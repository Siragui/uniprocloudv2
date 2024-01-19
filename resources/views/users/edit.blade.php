@extends('layouts.app')

@section('content')

@php
      $rolesArray = ['0','1','2'];
@endphp
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
    <h1 class="display-4 text-danger ">Mettre à jour les informations </h1>
    <hr class="my-4">
    <p class="lead">
        <a class=" btn btn-success  rounded" href="{{ route('users.index') }}" role="button">revenir</a>
  </div>

<form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data" >
    @csrf
    @method('PUT')

<div class="container form-group mt-5 border border-danger p-3 rounded w-75">

<div>
<label class="pb-2" for="">Nom</label><br/>


    <p>
        <label class="pb-2 mt-2" for=" title" >Nom et prenom</label><br/>
        <input class="form-control " type="text" name="name" value="{{$user->name}}"  id="name"  >

        <!-- Le message d'erreur pour "title" -->
        @error("name")
        <div>{{ $message }}</div>
        @enderror
    </p>

    <p>
        <label class="pb-2 mt-2" for=" title" >Email</label><br/>
        <input class="form-control " type="text" name="email" value="{{$user->email}}"  id="email"  >

        <!-- Le message d'erreur pour "title" -->
        @error("email")
        <div>{{ $message }}</div>
        @enderror
    </p>

    <p>


        <div class="form-group">
            <label for="exampleFormControlInput1"> status  </label>
            <select class="form-control" name="roles" >
                @foreach ($rolesArray  as $item)
                <option value="{{$item}}" {{($user->roles == $item) ? 'selected':''}}>

                    @switch ($item)
                    @case(2)
                        Administrateur
                    @break

                    @case(1)
                        Professeur
                    @break

                    @case(0)
                        Etudiant
                    @break

                    @default

                    @endswitch

                </option>
                @endforeach
            </select>
          </div>
    </p>



    <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

</div>
</form>
@endsection
