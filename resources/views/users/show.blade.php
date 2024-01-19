@extends('layouts.app')

@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success text-center mt-2" role="alert">

            {{ session()->get('message') }}
        </div>
    @endif
    <hr class="my-4">
    </div>

    <div class="container  d-flex align-items-center m-2">

        <a class=" btn btn-success  rounded" href="{{ route('users.index') }}" role="button">revenir</a>

        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button class=" btn btn-danger m-1 rounded ">Supprimer</button>
        </form>

        <a class=" btn btn-warning " href="/users/{{ $user->id }}/edit"> Modifier</a>
    </div>
    <div class="container row">



        <h3 class="">
            Nom et Prénom : {{ $user->name }}


        </h3>

        <h3>
            Adresse Email : {{ $user->email }}

        </h3>

        <h3>
            Status :
            @switch ($user->roles)
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

        </h3>



        <h3> Sex : {{ $user->profile->gender }} </h3>
        <h3> Adresse: {{ $user->profile->address }} </h3>

        <h3> Telephone : {{ $user->profile->number }} </h3>


    </div>
@endsection
