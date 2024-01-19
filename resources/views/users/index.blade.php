@extends('layouts.app')

@section('content')
    <div class="jumbotron container">
        <h3 class="display-6 text-danger ">Gerer les utilisteurs </h3>
        {{-- <p class="lead">Retrouver ici tout vos cours publié par vos professeurs .</p> --}}
        <hr class="my-4">

        <a class=" btn btn-danger rounded" href="{{ route('users.create') }}" role="button">Creer un utilisateur</a>

        @if (session()->has('message'))
            <div class="alert alert-danger mt-2" role="alert">

                {{ session()->get('message') }}
            </div>
        @endif
        <hr class="my-4">
    </div>





    <div class="container ">
        <div class="container row mt-5">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <th>{{$user->email}}</th>
                                <th>

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
                                </th>

                                <th>
                                    <a href="/users/{{$user->id}}">  <i class="fa-regular fa-pen-to-square text-warning ms-3"></i></a>
                                </th>
                    @endforeach

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


{{--
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
@endswitch --}}
