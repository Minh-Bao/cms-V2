@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="h-20 w-auto m-auto" src="{{asset('images/logo-black.png')}}"
                    alt="logo {{config('myconfig.site_owner')}}">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Modifier votre mot de passe
            </h2>
        </div>

        @if (session('status'))
            <div class="relative px-3 py-3 mb-4 border rounded bg-pink-200 border-pink-300 text-pink-800" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input name="token" type="hidden" value="{{$request->route('token')}}">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Adresse email :</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500"
                        placeholder="Adresse email">
                </div>
                @if ($errors->has('email'))
                    <span class="hidden mt-1 text-sm text-red" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif 
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe :</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="hidden mt-1 text-sm text-red" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <div>
                    <label for="passwordConfirmation" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe :</label>
                    <div class="mt-1">
                        <input id="passwordConfirmation" name="passwordConfirmation" type="passwordConfirmation" autocomplete="current-password" required 
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                    </div>
                </div>
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


