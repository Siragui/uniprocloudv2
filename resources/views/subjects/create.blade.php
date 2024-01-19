@extends("layouts.app")
@section("title", "Editer une matière")
@section("content")
<p>
    <!-- Lien pour créer un nouvel article : "subjects.create" -->
  <a class="btn btn-danger container w-25" href="{{ route('subjects.index') }}" title="Créer un article" >Tous les matières</a>
</p>
<h2 class="text-danger text-center">Créer une nouvelle matière</h2>

<!-- Le formulaire est géré par la route " $subjects.store" -->
<form method="POST" action="{{ route('subjects.store') }}" enctype="multipart/form-data" >

    <!-- Le token CSRF -->
    @csrf
<div class="container form-group mt-5 border border-danger p-5 rounded w-50">

    <p>
        <label class="pb-2" for=" subject" >Matière</label><br/>
        <input class="form-control " type="text" name="subject" value="{{ old('subject') }}"  id="subject" placeholder="Le nom de la Matière" >

        <!-- Le message d'erreur pour "title" -->
        @error("subject")
        <div>{{ $message }}</div>
        @enderror
    </p>
    <p>
        <label  class="pb-2" for=" logo" >Logo</label><br/>
        <input class="form-control " type="text" name="logo" value="{{ old('logo') }}"  id="logo" placeholder="Le lien du logo " >

        <!-- Le message d'erreur pour "title" -->
        @error("logo")
        <div>{{ $message }}</div>
        @enderror
    </p>


    <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

</div>
</form>
@endsection
