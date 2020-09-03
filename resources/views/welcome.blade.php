@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">CEFIRE VALENCIA</h1>
        <p class="lead">Aquesta pàgina és per a gestioanr els horaris del centre del CEFIRE de València</p>
        <hr class="my-4">
        <p>Pots accedir clickant al següent botó. O desde el menú Acceder.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Accedeix</a>
    </div>
</div>
{{$exemple ?? ''}}
<centres-component></centres-component>
@endsection
