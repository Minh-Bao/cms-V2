<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>       

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{ $sitepage->meta_desc }}">
        <meta name="author" content="{{config('myconfig.site_owner') . '-'. $sitepage->author}} ">
    
        <title>Authentification blog Nc</title>
    
        <!-- Favicon-->
        <link rel="icon" href="{{url('')}}/images/favicon.png" type="image/x-icon">
    
        <!-- Livewire -->
        @livewireStyles
      </head>

<body>

<main>
  	    @yield('content')
</main>

@include('site.themes.cms._partials._scripts')
</body>
</html>