    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{config('myconfig.site_developper')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{{url('')}}/images/favicon.png" type="image/x-icon">

	<title>Admin {{config('myconfig.name_app')}} @yield('title')</title>

    <!-- jQuery -->
    {{ Html::script('plugins/jQuery/2.2.4/jquery.min.js')}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
	{{-- {{ Html::style('plugins/bootstrap/css/bootstrap.css')}} --}}
    {{-- {{ Html::style('plugins/bootstrap/css/bootstrap-xlgrid.css')}} --}}

    <!-- Waves Effect Css -->
	{{-- {{ Html::style('plugins/node-waves/0.7.6/waves.min.css')}} --}}

    <!-- Animation Css -->
    {{-- {{ Html::style('plugins/animate-css/animate.css')}} --}}
    {{-- <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}

    <!-- Select2 -->
    {{-- {!! Html::style('plugins/select2/select2.css') !!} --}}

    <!-- Custom Css (Add css to resource/sass/admin.scss and run "npm run dev" in dev mode then build in production)-->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">

    <!-- Ribbon -->
    {{-- {{ Html::style('css/admin/ribbon.css')}} --}}

    <!-- User Card -->
    {{-- {{ Html::style('css/admin/user-card.css')}} --}}
    
    <link rel="shortcut icon" href="#">
    
    <!-- Toaster -->
    {{ Html::script('plugins/jquery.toaster/jquery.toaster.js')}}
    {{ Html::style('plugins/jquery.toaster/toastr.css')}}
    {{ Html::script('plugins/jquery.toaster/toastr.min.js')}}


    <!-- Livewire -->
    @livewireStyles


    <!--  -->

    
    
    <!-- Stylish Tooltip -->
{{--     {{ Html::style('plugins/stylish-tooltip/stylish-tooltip.css')}}
 --}}
    <!-- bootstrap datepicker -->
{{--     {!! Html::style('plugins/datepicker/datepicker3.css') !!} 
 --}}


    <!-- Fontawesome -->
{{--     {{ Html::style('plugins/font-awesome/5.1.1/css/all.min.css')}}
 --}}
    <!-- Admin Themes -->
{{--     {{ Html::style('css/themes/all-themes.css')}}
 --}}

@yield('stylesheets')

