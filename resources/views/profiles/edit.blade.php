@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Homme','Femme'];
    $classArray = ['L1 GI','L2 GI','L3 GI'];
@endphp

<div class="container">


    <div class="jumbotron">
        <h3 class="display-4 text-danger ">Mettre à jour vos information</h3    >
        <hr class="my-4">
        <p class="lead">
            <a class=" btn btn-success  rounded" href="{{ route('profiles.index') }}" role="button">revenir</a>
      </div>

    <form method="POST" action="/profiles/{{$profile->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div >

                <p>
                    <label class="pb-2 mt-2" for=" title" >Adresse </label><br/>
                    <input class="form-control " type="text" name="address"  value="{{$profile->address}}"  id="address"  >

                    <!-- Le message d'erreur pour "title" -->
                    @error("address")
                    <div>{{ $message }}</div>
                    @enderror
                </p>
        </div>
        <div >

            <p>
                <label class="pb-2 mt-2" for=" title" >Votre Numero de telephone </label><br/>
                <input class="form-control " type="text" name="number"  value="{{$profile->number}}"  id="number"  >

                <!-- Le message d'erreur pour "title" -->
                @error("number")
                <div>{{ $message }}</div>
                @enderror
            </p>

        </div>





          <div class="form-group">
            <label for="exampleFormControlInput1"> Sex </label>
          <select class="form-control" name="gender" >
              @foreach ($genderArray  as $item)
              <option value="{{$item}}" {{($profile->gender == $item) ? 'selected':''}}>{{$item}}</option>
              @endforeach

              @error("gender")
              <div>{{ $message }}</div>
              @enderror
          </select>
        </div>
        <p>
            <label  class="pb-2"  > Importer l'image '</label><br/>
            <input class="form-control " type="file" name="photo"value=" {{$profile->photo}}"  id="photo"  >

            <!-- Le message d'erreur pour "Documents" -->
            @error("photo")
            <div>{{ $message }}</div>
            @enderror
        </p>


        <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >
      </form>
</div>



@endsection
