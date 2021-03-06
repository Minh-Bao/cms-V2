@extends('layouts.app')

@section('content')
 
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8"> 
        <div>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Entrez votre email
            </h2>
        </div>

        @if (session('status'))
            <div class="relative px-3 py-3 mb-4 border rounded bg-pink-200 border-pink-300 text-pink-800" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500"
                        placeholder="Adresse email">
                </div>
                @if ($errors->has('email'))
                    <span class="hidden mt-1 text-sm text-red" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif            
            </div>
            
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                    Envoyer le lien de récupération de mot de passe
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

