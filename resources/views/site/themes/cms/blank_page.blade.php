@extends('layouts.blank_app')

@section('title, | , Page vide')

@section('content')
    <div class="relative py-16 bg-white mt-8">
        <div class="hidden absolute top-0 inset-x-0 h-1/2 bg-gray-50 lg:block" aria-hidden="true"></div>
        <div class="max-w-7xl mx-auto bg-indigo-600 lg:bg-transparent lg:px-8">
            <div class="lg:grid lg:grid-cols-12">
                <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
                    <div class="absolute inset-x-0 h-1/2 bg-gray-50 lg:hidden" aria-hidden="true"></div>
                    <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                        <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                            <img class="object-cover object-center rounded-3xl shadow-2xl"
                                src="https://images.unsplash.com/photo-1507207611509-ec012433ff52?ixlib=rb-1.2.1&ixqx=BweQ1V4IZi&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80"
                                alt="">
                        </div>
                    </div>
                </div>

                <div
                    class="relative bg-gray-400 lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center">
                    
                    <div
                        class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6">
                        <h2 class="text-3xl font-extrabold " id="join-heading">Site vierge...</h2>
                        <p class="text-lg ">Le site ne comporte aucune donnée utilisateur pour le moment. Pour pouvoir commencer a utiliser notre interface veuillez créer un compte et vous connecter  sur ce lien :</p>
                        <a class="block w-full py-3 px-5 text-center bg-gray-50 border border-transparent rounded-md shadow-md text-base font-medium text-black hover:bg-blue-200 sm:inline-block sm:w-auto"
                            href="{{url('/register')}}">register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


