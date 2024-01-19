@extends('layouts.app')

@section('content')


<div class="container">

    @if (session()->has('message'))

    <div class="alert alert-success" role="alert">

        {{session()->get('message')}}
    </div>
    @endif

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

    <div class="lead d-flex align-items-center m-2 ">
        <a class=" btn btn-success  rounded" href="{{ route('events.index') }}" role="button">revenir</a>

        @if (Auth::user()->id == $event->user_id )
        <a  href="/events/{{$event->slug}}/edit" class=" btn btn-warning m-2 rounded ">Mettre à jour</a>

        <form action="/events/{{$event->slug}}" method="POST">
            @csrf
            @method('DELETE')

            <button class=" btn btn-danger m-1 rounded ">Supprimer</button>
        </form>

        @endif
    </div>



        <hr class="my-4">
 <div class="container">
        <h3 class="text-center">
            {{$event->title}}

        </h3>
        </div>
  </div>


<div class="container d-flex justify-content-center align-item-center">

  </p>
  <img class="w-auto"  src="/Upload/events/photo/{{$event->photo}}" alt="..."  >

</div>

@endsection
