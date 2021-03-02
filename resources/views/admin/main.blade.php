<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin._interface._head')

    </head>


    <body id="body" class="">
        <div class="se-pre-con"></div>
        @include('admin._interface._nav')
        @include('admin._interface._timeout')
        @include('admin._interface._sidebar')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('admin._interface._message')
                    @yield('content')
                </div>
            </div>
        </section>

        <!--LivewireModal -->
        @stack('modals')

        <!-- Main Scripts -->
        @include('admin._interface._scripts')

        <!-- Additionnal Scripts -->
        @yield('scripts')

    </body>
</html>

