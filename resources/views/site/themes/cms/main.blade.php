<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('site.themes.cms._partials._head')


<body>
@include('site.themes.cms._partials._header')

<main role="main" class="bg-white-450">
  	    @yield('content')
</main>


@include('site.themes.cms._partials._footer')
@include('site.themes.cms._partials._scripts')

@if (Auth::check())
    @include('site.themes.cms._partials._sitebuilder')
@endif


</body>
</html>
