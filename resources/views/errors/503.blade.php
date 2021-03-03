@extends('errors.layout')
@section('content')
    @include('errors._partial', [
        'number' => '503', 
        'info' => "Le serveur que vous essayez de contacter semble rencontrer des problèmes...",
        'message' => "Veuillez réessayer ultérieurement ou contactez l'administrateur du site.",
        'route' => 'login',
        'name' => 'Connexion'
    ])
@endsection