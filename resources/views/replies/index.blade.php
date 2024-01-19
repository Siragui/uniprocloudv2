

{{-- <div class="border mt-3">
    <p  class="fst-italic text-muted">
        {{$item->user->name }}
    </p>
    <p class=""> {{$item->body }}</p>



    <a class="text-success fs-3 text-xl"  download="{{$item->file}}" href="project/Replies/file/{{$item->file}}" title="{{$item->file}}">
       <i class="fa-solid fa-download">
            </i></a>

    <span>
        {{$item->created_at}}
    </span>
</div> --}}
{{-- <table class="table">
    <thead class="thead-dark">
        <tr class="">
            <th scope="col">Nom</th>
            <th scope="col">Message</th>
            <th scope="col">Date</th>
            <th scope="col">Telecharger</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($replies as $item )
        <tr>

            <td> {{$item->user->name }}</td>
            <td>  {{$item->body }}  </td>
            <td> {{$item->created_at}}</td>
            <td><a class="text-success fs-3 text-xl" value="{{$item->file}}" download="{{$item->file}}" href="project/Replies/file/{{$item->file}}" title="{{$item->file}}">
                <i class="fa-solid fa-download">
                     </i></a>  </td>

          </tr>
          @endforeach

    </tbody>
  </table> --}}

  @foreach ($replies as $item )

  @if (Auth::user()->roles == 1 || Auth::user()->roles == 2 || Auth::user()->id == $item->user_id )
  {{-- si l'utilisateur a le role 1 ou 2  --}}

  <div class="card container mb-3 border-danger">
    <div class="card-body">
      <h5 class="card-title"> {{$item->user->name }}</h5>
      <p class="card-text"> {{$item->body }} </p>
      <p class="card-text"><small class="text-muted">{{$item->created_at}}</small></p>
      <div class="gab-3">
        {{-- <a href="/replies/{{$item->id}}" class="text-primary text-center  ms-3">
            <i class="fa-solid fa-eye text-primary"></i> ouvrir
    </a> --}}
    @if (Auth::user()->roles == 1 || Auth::user()->roles == 2)
    <a class="text-success text-center ms-3" value="{{$item->file}}" download="{{$item->file}}" href="project/Replies/file/{{$item->file}}"
        title="{{$item->file}}">
        <i class="fa-solid fa-download">
             </i> Telecharger</a>
             @endif
      </div>
    </div>
  </div>
  @endif
  @endforeach
