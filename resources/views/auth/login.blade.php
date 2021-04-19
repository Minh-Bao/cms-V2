@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white flex">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-20 w-auto" src="{{asset('images/logo-black.png')}}"
                    alt="logo {{config('myconfig.site_owner')}}">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Connectez vous...
                </h2>
                <p class="mt-2 text-sm text-gray-600 max-w">
                    Ou
                    <a href="{{url('/')}}" class="font-medium text-pink-450 hover:text-pink-500">
                        Revenez à la page d'accueil
                    </a>
                </p>
            </div>

            <div class="mt-8">
                <div class="mt-6">
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Adresse email
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                            @if ($errors->has('email'))
                                <span class="hidden mt-1 text-sm text-red" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Mot de passe
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm focus:border-pink-700 focus:ring-pink-500">
                            </div>
                            @if ($errors->has('password'))
                                <span class="hidden mt-1 text-sm text-red" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif                        
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember_me" type="checkbox"
                                    class="h-4 w-4 text-pink-450 focus:ring-pink-600 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                    Se souvenir de moi...
                                </label>
                            </div> 

                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a href="{{ route('password.request') }}" class="font-medium text-pink-450 hover:text-pink-500">
                                        Mot de passe oubliée?
                                    </a>
                                </div>
                            @endif
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-600">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover"
            src="{{asset('images/bg_login.jpg')}}"
            alt="">
    </div>
</div>
@endsection

