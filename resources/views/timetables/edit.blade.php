@extends('layouts.app')

@section('content')


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
    <h1 class="display-4 text-danger ">Mettre a jour </h1>
    <hr class="my-4">
    <p class="lead">
      <a class=" btn btn-success rounded" href="{{ route('timetables.index') }}" role="button">revenir</a>
    </p>
  </div>

    <form method="POST"  action="/timetables/{{$timetable->slug}}"  >

        @csrf
        @method('PUT')

    <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

  <div>
    <label class="pb-2" for="" >Journée</label><br/>


        <p>
            <label class="pb-2 mt-2" for="Jour" >Jour</label><br/>
            <input class="form-control " type="text" name="jour" value="{{$timetable->jour}}"  id="jour" placeholder="Indiqué le jour" >


            @error("jour")
            <div>{{ $message }}</div>
            @enderror

        </p>

        <p>
            <label class="pb-2 mt-2" for=" heure" >Heure</label><br/>
            <input class="form-control " type="text" name="heure" value="{{$timetable->heure}}"  id="heure" placeholder="Indiqué l'heure" >


            @error("heure")
            <div>{{ $message }}</div>
            @enderror

        </p>


                <p>
                    <label class="pb-2 mt-2" for=" mat " >Matière</label><br/>
                    <input class="form-control " type="text" name="mat" value="{{ $timetable->mat}}"  id="mat" placeholder="Indiqué la matière" >


                    @error("mat")
                    <div>{{ $message }}</div>
                    @enderror

                </p>


                <p>
                    <label class="pb-2 mt-2" for="prof" >Professeur</label><br/>
                    <input class="form-control " type="text" name="prof" value="{{ $timetable->prof}}"  id="prof" placeholder="Indiqué le professeur" >


                    @error("prof")
                    <div>{{ $message }}</div>
                    @enderror

                    <p>
                        <label class="pb-2 mt-2" for="sale" >Sale</label><br/>
                        <input class="form-control " type="text" name="sale" value="{{ $timetable->sale}}"  id="sale" placeholder="Indiqué la sale" >


                        @error("sale")
                        <div>{{ $message }}</div>
                        @enderror

                    </p>

        </p>



        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

    </div>
    </form>

        @endsection
