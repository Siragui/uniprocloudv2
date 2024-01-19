@extends('layouts.app')
@section('content')

<div class="conatainer mx-auto">

<div class="  mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <a class="text-success fs-1 text-xl" value="{{$replies->file}}" download="{{$replies->file}}" href="project/Replies/file/{{$replies->file}}"
            title="{{$replies->file}}">
            <i class="fa-solid fa-download">
                 </i></a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$replies->user->name }}</h5>
          <p class="card-text">{{$replies->body }}</p>
          <p class="card-text"><small class="text-muted">{{$replies->created_at}}</small></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
