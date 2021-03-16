  <head>       

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $sitepage->meta_desc }}">
    <meta name="author" content="{{config('myconfig.site_owner') . '-'. $sitepage->author}} ">

    <title>{{config('myconfig.name_app')}} : {{ $sitepage->meta_title }}</title>

    <!-- Favicon-->
    <link rel="icon" href="{{url('')}}/images/favicon.png" type="image/x-icon">


    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}

    <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{url('')}}/site/css/style.css" rel="stylesheet"> --}}
    
    <link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('')}}/css/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('')}}/css/owlcarousel/assets/owl.theme.default.min.css">

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


  </head>