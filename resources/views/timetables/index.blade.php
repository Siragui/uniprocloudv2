@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> --}}

<div class="jumbotron container">
    <h3 class="display-6 text-danger ">Emplois du temps  </h3>
    <p class="lead"> Cet emplois du temps est susptible de modification</p>
    <hr class="my-4">


    @if (Auth::user()->roles == 2)

    <a class=" btn btn-danger rounded" href="{{ route('timetables.create') }}" role="button"> Créer l'emplois du temps</a>
    @endif

      {{-- <a class=" btn btn-danger rounded" href="{{ route('courses.create') }}" role="button">Publier un cours</a> --}}

      @if (session()->has('message'))

    <div class="alert alert-danger mt-2" role="alert">

        {{session()->get('message')}}
    </div>
    <hr class="my-4">
    @endif
  </div>


{{-- @foreach ($timetables as $item ) --}}



<div class="container">
<p class="text-center">Emplois du temps L3 Genie Informatique</p>

    <table class="table table-bordered border-primar mt-3 ms-3">
        <thead >
          <tr>
            @foreach ($timetables as $item )
            <th class="text-center " scope="col">{{$item->jour}}

                @if (Auth::user()->roles == 2)
                <a href="/timetables/{{$item->slug}}" class="  ">

                <i class="fa-regular fa-pen-to-square text-warning ms-3"></i></a>
                @endif



            </th>

            @endforeach
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($timetables as $item )
           <th class="text-center" scope="row">{{$item->heure}}</th>
            @endforeach
          </tr>
          <tr>
            @foreach ($timetables as $item )
            <td class="text-center" >{{$item->mat}}</td>
            @endforeach
          </tr>
          <tr>
            <!-- <th scope="row">3</th> -->
            @foreach ($timetables as $item )
            <td class="text-center" >{{$item->prof}}</td>
            @endforeach

          </tr>
          <tr>

            @foreach ($timetables as $item )

            <td class="text-center" >{{$item->sale}}</td>
            @endforeach

</div>
    {{-- {{ $item->prof}}
                {{ $item->sale}}  --}}

    {{-- <a href="/timetables/{{$item->slug}}" class=" btn btn-warning m-2 rounded ">Mettre à jour</a> --}}
</div>




{{-- @endforeach --}}

@endsection
