@extends('layouts.app')

@section('content')

<style>

  p {
   display: -webkit-box;
   -webkit-box-orient: vertical;
   -webkit-line-clamp: 5;
   overflow: hidden;
  }
</style>


<div class="jumbotron container">
    <h3 class="display-6 text-danger ">Projets et devoirs </h3>
    <p class="lead">Retrouver ici tout les devoirs et les projects publié pat vos professeurs .</p>
    <hr class="my-4">
    @if (Auth::user()->roles == 1 || Auth::user()->roles == 2 )
    {{-- si l'utilisateur a le role 1 ou 2  --}}
      <a class=" btn btn-danger rounded" href="{{ route('projects.create') }}" role="button">Progarmmer un devoir</a>
      <hr class="my-4">
      @endif
  </div>



  <div class="container mt-3 text-center">
      <div class="row">
          @foreach ($projects as $item )
          <div class="col">

              <div class="card mb-5"  style="width: 18rem;">
                <div class="card-body">
                </div>
                <p href="" class="fst-italic">Date limite : <span class="text-danger fst-italic">{{$item->date_limite}}</span></p>
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                <p class="card-text text-center"> {{$item->body}}</p>


            </div>


            <a class="text-success fs-3 text-xl" download="{{$item->pdf}}" href="/project/pdf/{{$item->pdf}}" title="{{$item->title}}"> <i class="fa-solid fa-download"></i></a>
            <div class="card-body mb-5">

                @if (Auth::user()->roles == 0 )
                <a href="/projects/{{$item->slug}}"  class="card-link">Soumettre votre projet</a>

                @else
                <a href="/projects/{{$item->slug}}"  class="card-link"> <i class="fa-solid fa-eye text-primary"></i> Voir les projets</a>
                @endif
            </div>
              <div> publié par :
                  <span  class="fst-italic text-muted mb-5"> {{$item->user->name}}</span>
              </div>
            </div>
        </div>
        @endforeach
    </div>

</div>



          @endsection
