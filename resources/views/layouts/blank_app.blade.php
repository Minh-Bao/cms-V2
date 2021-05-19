<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Page d'accueil:site-vierge">
        <meta name="author" content="{{config('myconfig.site_owner')}} ">
    
        <title>{{config('myconfig.name_app')}} : Page d'accueil:site-vierge</title>
    
        <!-- Favicon-->
        <link rel="icon" href="{{asset('/images/favicon.png')}}" type="image/x-icon">
    
        <!-- Custom Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{url('')}}/site/css/style.css" rel="stylesheet"> --}}
        
        <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet"> 
    
        <!-- Livewire -->
        @livewireStyles
    
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106144058-4"> </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-106144058-4');
        </script>
    
        @yield('stylesheets')
    </head>

    <body class="bg-white-450">
        @include('site.themes.cms._partials._header')


        <main role="main" >
            @yield('content')
        </main>

        @include('site.themes.cms._partials._footer')

        @include('site.themes.cms._partials._scripts')
        @yield('scripts')

    </body>
</html>
