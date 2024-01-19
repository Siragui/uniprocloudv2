@extends('layouts.app') @section('content') <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert"> {{ session()->get('message') }} </div>
            @endif @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all as $item)
                        <li> {{ $item }} </li>
                    @endforeach
                </ul>
            @endif
            <div class="jumbotron">
                <div class="lead d-flex align-items-center m-2 "> <a class=" btn btn-success  rounded"
                        href="{{ route('timetables.index') }}" role="button">revenir</a> <a
                        href="/timetables/{{ $timetable->slug }}/edit" class=" btn btn-warning m-2 rounded ">Mettre à jour</a>
                    <form action="/timetables/{{ $timetable->slug }}" method="POST"> @csrf @method('DELETE') <button
                            class=" btn btn-danger m-1 rounded ">Supprimer</button> </form>
                </div>
                <hr class="my-4">
            </div>
            <div class="main container ">
                <div class="mt-2 d-flex justify-content-center align-item-center">
                    <div class="border border-success p-3">
                        <h3 class="text-centre">Jour :  <span class="text-primary"> {{ $timetable->jour }}</span></h3>
                        <h3 class="text-centre">Horaire :    <span class="text-primary">{{ $timetable->heure }}</span></h3>
                        <h3 class="text-centre">Matière :    <span class="text-primary">{{ $timetable->mat }}</span></h3>
                        <h3 class="text-centre">Professeure :    <span class="text-primary">{{ $timetable->prof }}</span></h3>
                        <h3 class="text-centre">Salle de cours :    <span class="text-primary">{{ $timetable->sale }}</span></h3>
                    </div>
                </div>
        </div> @endsection
