<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Error page">
        <meta name="author" content="{{config('myconfig.site_owner')}} ">
    
        <title>{{config('myconfig.name_app')}} : Error page</title>
    
        <!-- Favicon-->
        <link rel="icon" href="{{asset('/images/favicon.png')}}" type="image/x-icon">
    
        <!-- Custom Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
        <!-- Livewire -->
        @livewireStyles
    
        <style>
            h1{
                z-index: -24;
                left: 33%;
                color: #B640B4 !important;
                font-family: "SourceSansPro-extraLight"!important;	
                font-size: 250px!important;	
                font-weight: 300!important;	
                line-height: 56px!important;	
                text-align: center!important;
                margin: 7.5%;
                border: none;
            }
            h2{
                color: #1B0E4F;	
                font-family: "SourceSansPro-Bold";	
                font-size: 40px;	
                text-align: center;
                margin: 46px auto 0 auto;
            }
            h2+h2{
                color: #1B0E4F;	
                font-family: "SourceSansPro-Bold";	
                font-size: 30px;	
                text-align: center;
                margin: 0 auto 77px auto;
            }
            p{
                color: #1B0E4F;	
                font-family: "SourceSansPro";	
                font-size: 34px;
                text-align: center;
            }
            h1+p{
                margin: 100px auto 0 ;
            
            }
            h2 + p {
                margin: 0 auto 100px;
            }
        </style>
    </head>

    


    <body class="bg-white">
        @include('site.themes.cms._partials._header')


        <div class="main">
            @yield('content')
        </div>

        @include('site.themes.cms._partials._footer')
        
        @include('site.themes.cms._partials._scripts')
        @yield('scripts')

    </body>
</html>
    