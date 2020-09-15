@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="alert alert-info alert-dismissible text-center" role="alert">
            <h3>Ja teniu la part per a buscar centres i emplenar les dades de contacte operativa al final d'esta pàgina. Per
                favor ompliu la base de dades per a evitar futurs problemes si agafeu una baixa.</h3>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div> --}}
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">CEFIRE VALENCIA</h1>
            <p class="lead">Aquesta pàgina és per a gestionar els horaris del centre del CEFIRE de València. A continuació teniu els enllaços per a accedir als diferents recursos.</p>
            <hr class="my-4">
            <p>Pots accedir clickant al següent botó. O desde el menú Acceder.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Accedeix</a>
        </div>
    </div>
    {{ $exemple ?? '' }}
    <bottons-component></bottons-component>


@endsection
