@extends('layouts.app')

@section('content')
<div class="jumbotron container">
    <h3 class="display-6 text-danger "> Unipro Events  </h3>
    <p class="lead">Retrouver ici tout les Events</p>
    <hr class="my-4">

    @if (Auth::user()->roles == 2)

    <a class=" btn btn-danger rounded" href="{{ route('events.create') }}" role="button">Publier un Events</a>
    @endif
      <hr class="my-4">
  </div>
@foreach ($events as $item )



<div class="container mb-5">

<div class="row">


    <div class="container col-10">


      <div class="card mb-3" style="max-width: 740px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/Upload/events/photo/{{$item->photo}}" class="card-img-top" alt="..." class="img-fluid rounded-start" >


          </div>
          <div class="col-md-8">
            <div class="card-body ">
              <h5 class="card-title fw-bold">{{$item->title}}</h5>
              <p class="card-text">
                {{$item->body}}
              </p>




              {{-- <p class="card-text "><small class="text-muted ">{{$item->created_at->diffForhumans()}}</small></p> --}}
            </div>
            <div class="container  mr-5  ">
                <a href="/events/{{$item->slug}}" class="text-primary text-center  ms-3">
                    <i class="fa-solid fa-eye text-primary"></i> ouvrir
            </a>
            </div>

          </div>
        </div>

      </div>

    </div>
      @endforeach
@endsection
