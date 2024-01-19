@extends('layouts.app')
@section("title", "Tous les matière")
@section("content")

<h2 class="text-danger">Tous les matières</h2>

<p>
    <!-- Lien pour créer un nouvel article : "subjects.create" -->
  <a class="btn btn-outline-danger" href="{{ route('subjects.create') }}" title="Créer un article" >Créer une nouvelle matière</a>
</p>

<div class="container">
    <div class="row">



        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>

                    <th scope="col">Matière</th>
                    <th scope="col">Logo</th>
                    {{-- <th scope="col">Actions</th> --}}
                  </tr>
                </thead>
                <tbody>

                    @foreach ($subjects as $item)
                    <tr>

                        <td>{{$item->subject}}</td>
                        <td>
                        {{-- <img src="{{asset($item->logo)}}" alt="{{$item->logo}}" --}}
                        <img src="{{$item->logo}}" alt="" logo=""

                        class="img-tumbnail" width="100" height="100">
                        </td>
                        {{-- <td>
                            @if ($item->user_id == Auth::id())
                            &nbsp;&nbsp;
                            <a href="{{route('subjects.edit',['id'=> $item->id])}}"> <i class="fas fa-2x fa-edit"></i>  </a>&nbsp;&nbsp;
                            <a class="text-danger" href="{{route('subjects.destroy',['id'=> $item->id])}}"> <i class="fas  fa-2x fa-trash-alt"></i> </a>
                            @endif

                        </td> --}}
                      </tr>
                    @endforeach

                </tbody>
              </table>


          </div>

    </div>
</div>
@endsection
