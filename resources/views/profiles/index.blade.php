@extends('layouts.app')

@section('content')


<div class="mt-3 main container">

    <div class="row">
      <div class="col-sm-4 bg-secondary bg-gradient p-2 text-dark bg-opacity-10">
        <div class="compte d-column align-items-center justify-content-center">
        <img  src="profile/photo/{{$user->profile->photo}}" class=" img-thumbnail mx-auto d-block text-center" style="width: 200px; height: auto"   alt="profile">
                <h3 class=" mt-2 text-center"> {{$user->name}}</h3>
                <p class="text-center">   @switch ($user->roles)
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

                    @endswitch</p>

      </div>
      <div class="items w-75 p-3">
        @if (Auth::user()->roles == 0)

        <p> <i class="fa-solid fa-graduation-cap text-danger"></i> Classe: {{$user->profile->class}} </p>
        @endif
        <p> <i class="fa-solid fa-venus-mars text-danger"></i>  Sex : {{$user->profile->gender}}</p>
                <p> <i class="fa-sharp fa-solid fa-location-dot text-danger"></i>  Adresse: {{$user->profile->address}}</p>

        <p> <i class="fa-solid fa-phone text-danger"></i> Telephone : {{$user->profile->number}}</p>
        <a href="{{route('profiles.edit',$user->profile->id)}}"> <i class="fa-regular fa-pen-to-square text-danger"></i>  Mettre a jour votre profile</a>



    </div>
    </div>


  </div>

@endsection
