<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('site.themes.cms._partials._head')


    <body class="bg-white-450">
        @include('site.themes.cms._partials._header')


        <main role="main" >
            @yield('content')
        </main>

        @include('site.themes.cms._partials._footer')
        
        @include('site.themes.cms._partials._scripts')
        @yield('scripts')


        @if (Auth::check())
            @include('site.themes.cms._partials._sitebuilder')
        @endif

    </body>
</html>
