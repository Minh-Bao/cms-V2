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


{{--
<div class="container mx-auto sm:px-4">
    <div class="flex flex-wrap  justify-center">
        <div class="md:w-2/3 pr-4 pl-4">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">{{ __('Reset Password') }}</div>

                <div class="flex-auto p-6">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4 flex flex-wrap ">
                            <label for="email" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('E-Mail Address') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <input id="email" type="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded{{ $errors->has('email') ? ' bg-red-700' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap ">
                            <label for="password" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Password') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <input id="password" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded{{ $errors->has('password') ? ' bg-red-700' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap ">
                            <label for="password-confirm" class="md:w-1/3 pr-4 pl-4 pt-2 pb-2 mb-0 leading-normal md:text-right">{{ __('Confirm Password') }}</label>

                            <div class="md:w-1/2 pr-4 pl-4">
                                <input id="password-confirm" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="mb-4 flex flex-wrap  mb-0">
                            <div class="md:w-1/2 pr-4 pl-4 md:mx-1/3">
                                <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
