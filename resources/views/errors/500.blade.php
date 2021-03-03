@extends('errors.layout')
@section('content')
    @include('errors._partial', [
        'number' => '500', 
        'info' => "Le serveur n'arrive pas à accéder à l'url demandé...",
        'message' => "Ceci est lié à une erreur interne du serveur, Veuillez contactez votre admnistrateur",
        'route' => '/',
        'name' => 'Home'
    ])
@endsection