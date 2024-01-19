@extends("layouts.app")
@section("title", "Editer une matière")
@section("content")

<h1>Editer un post</h1>

	<!-- Si nous avons un Post $post -->
	@if (isset($subject))

	<!-- Le formulaire est géré par la route "subjects.update" -->
	<form method="POST" action="{{ route('subjects.update', $subject) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "subjects.store" -->
	<form method="POST" action="{{ route('subjects.store') }}" enctype="multipart/form-data" >

	@endif

		<!-- Le token CSRF -->
		@csrf

		<p>
			<label for="subject" >Nom</label><br/>

			<!-- S'il y a un $subject->title, on complète la valeur de l'input -->
			<input type="text" name="subject" value="{{ isset($subject->subject) ? $subject->subject : old('subject') }}"  id="subject" placeholder="Le titre du matière" >

			<!-- Le message d'erreur pour "subject" -->
			@error("subject")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<p>
			<label for="logo" >Nom</label><br/>

			<!-- S'il y a un $subject->title, on complète la valeur de l'input -->
			<input type="text" name="logo" value="{{ isset($subject->logo) ? $subject->logo : old('logo') }}"  id="logo" placeholder="Le logo du matière" >

			<!-- Le message d'erreur pour "subject" -->
			@error("logo")
			<div>{{ $message }}</div>
			@enderror
		</p>

		{{-- <!-- S'il y a une image $subject->picture, on l'affiche -->
		@if(isset($subject->logo))
		<p>
			<span>Couverture actuelle</span><br/>
			<img src="{{ asset('storage/'.$subject->logo) }}" alt="logo actuelle" style="max-height: 200px;" >
		</p>
		@endif

		<p>
			<label for="logo" >logo</label><br/>
			<input type="file" name="logo" id="logo" >

			<!-- Le message d'erreur pour "logo" -->
			@error("logo")
			<div>{{ $message }}</div>
			@enderror
		</p> --}}


		<input type="submit" name="valider" value="Valider" >

	</form>
@endsection
