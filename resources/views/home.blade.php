@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Bienvenue sur votre tableau de bord !' ) }}
                    </div>
                    <div class="container">
                        <div class="card" style="width: 18rem;">
                            {{-- <img src="https://cdn-icons-png.flaticon.com/512/147/147285.png" class="card-img-top" alt="..."> --}}
                            <div class="card-body">

                                <h3>  {{ Auth::user()->name }}</h3>

                                <span class="mt-5">Consulter votre profile ici  !!

                                    <a href="{{ url('/profile') }}"><button class="btn btn-primary mt-5" type="button"
                                        aria-label=""> PROFILE </button>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
