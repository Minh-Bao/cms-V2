@extends('errors.layout')
@section('content')
    @include('errors._partial', [
        'number' => '403', 
        'info' => "Il semble que vous n'avez pas les droits nécéssaire pour accéder à cette page...",
        'message' => "Veuillez vérifier vos identifiants et réessayer.",
        'route' => 'login',
        'name' => 'Connexion'
    ])
@endsection