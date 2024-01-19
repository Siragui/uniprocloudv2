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
            <h1 class="display-4 text-danger ">Programmer un nouveau devoir</h1>
            <hr class="my-4">
            <p class="lead">
              <a class=" btn btn-success rounded" href="{{ route('projects.index') }}" role="button">Revenir</a>
            </p>
          </div>
            <!-- Le formulaire est géré par la route " $courses.store" -->
            <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" >

                <!-- Le token CSRF -->
                @csrf
            <div class="container form-group mt-5 border border-danger p-3 rounded w-75">

          <div>
            <label class="pb-2" for="" >Matière du devoir</label><br/>


                <p>
                    <label class="pb-2 mt-2" for=" title" >Titre</label><br/>
                    <input class="form-control " type="text" name="title" value="{{ old('title') }}"  id="title" placeholder="Le Titre  du devoir" >

                    <!-- Le message d'erreur pour "title" -->
                    @error("title")
                    <div>{{ $message }}</div>
                    @enderror
                </p>
                <p>
                    <label class="pb-2 mt-2" for="date_limite" >Date Limite à rendre</label><br/>
                    <input class="form-control " type="text" name="date_limite" value="{{ old('date_limite') }}"  id="date_limite" placeholder="Date Limite à rendre" >

                    <!-- Le message d'erreur pour "title" -->
                    @error("date_limite")
                    <div>{{ $message }}</div>
                    @enderror
                </p>
                <p>
                    <label  class="pb-2" for=" body" >Description  du devoir </label><br/>

                    <textarea name="body" id="" class="form-control" cols="30" rows="3" value="{{ old('body') }}"  placeholder="Descriptions  du devoir.... "></textarea>
                    <!-- Le message d'erreur pour "Description" -->
                    @error("body")
                    <div>{{ $message }}</div>
                    @enderror
                </p>
                <p>
                    <label  class="pb-2" > Importer le documents  du devoir</label><br/>
                    <input class="form-control " type="file" name="pdf" value="{{ old('pdf') }}"  id="pdf" placeholder=" Documents  du devoir " >

                    <!-- Le message d'erreur pour "logo" -->
                    @error("pdf")
                    <div>{{ $message }}</div>
                    @enderror
                </p>


                <input class="btn btn-primary rounded" type="submit" name="valider" value="Valider" >

            </div>
            </form>

                @endsection
