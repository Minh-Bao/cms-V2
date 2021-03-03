@extends('errors.layout')
@section('content')
    @include('errors._partial', [
        'number' => '404', 
        'info' => "La page que vous recherchez n'existe plus....",
        'message' => "Veuillez vous rediriger vers la page d'accueil",
        'route' => '/',
        'name' => 'Home'
    ])
@endsection



