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
    <h1 class="display-4 text-danger ">Mettre à jour les informations </h1>
    <hr class="my-4">
    <p class="lead">
        <a class=" btn btn-success  rounded" href="{{ route('users.index') }}" role="button">revenir</a>
        {{-- <a href="/courses/{{$course->slug}}/edit" class=" btn btn-warning  rounded ">Mettre à jour</a>    </p> --}}
  </div>

<form method="POST" action="{{ route('users.store') }}" >
    @csrf


<div class="container form-group mt-5 border border-danger p-3 rounded w-75">

<div>
<label class="pb-2" for="">Nom</label><br/>


    <p>
        <label class="pb-2 mt-2" for=" title" >Nom et prenom</label><br/>
        <input class="form-control " type="text" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

   <div>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
   </div>
    </p>

    <p>
        <label class="pb-2 mt-2" for=" title" >Email</label><br/>
        <input class="form-control " type="text"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </p>
    <p>
        <label class="pb-2 mt-2" for=" title" >Mot de passe</label><br/>
        <input class="form-control "id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </p>
    <p>
        <label class="pb-2 mt-2" for=" title"  > Confirmer le Mot de passe</label><br/>
        <input class="form-control " id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">


    </p>

    <p>



          <div class="form-group">
          <label class="     mb-2" for="roles">Satuts de l'utilisateur :</label>
          <select class="form-control" name="roles" id="roles">
              <option value="">--- Choisir le role ---</option>
              <option value="0">Etudiant</option>
              <option value="1" >Professeur</option>
              <option value="2">Administrateur</option>
          </select>
        </div>
    </p>



    <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

</div>
</form>
@endsection
