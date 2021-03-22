<!-- ============ Header file ================ -->


 <!-- Modal Dialogs ====================================================================================================================== -->

    <!-- Large Size -->

    {{-- <div class="modal opacity-0" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header"></div>

                <div class="modal-body">
                    <div class="preloader">
                        <div class="spinner-layer pl-blue">
                            <div class="circle-clipper left">
                                <div class="circle">                                    
                                </div>
                            </div>

                            <div class="circle-clipper right">
                                <div class="circle">
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div> --}}





  <!-- Top Bar -->
                      <!-- Page title & actions -->
                      <header>
                        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                            <div id="breadcontainer">
                                <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
                                    {{-- <li><i class="material-icons">dashboard</i> <a href="{{url('/admin')}}/admin"> Accueil</a></li>
                                    <li class="active"><i class="material-icons">description</i>  <a href="{{ route('websitepage.index') }}">Pages</a></li> --}}
                                    
                                    @foreach ($bread as $item)
                                    <li>
                                        {!! $item['icon'] !!}
                                    </li>
                                    <a href="{{ $item['url'] }}">
                                        <li>
                                            {{ $item['name']  }}
                                        </li>
                                    </a>
                                    @endforeach
                                
                                </ol>
                            </div>
                            <div class="flex-1 min-w-0">
                                {{-- <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                    Home
                                </h1> --}}
                            </div>
                            <div class="mt-4 flex sm:mt-0 sm:ml-4">
                                <button type="button"
                                    class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
                                    Share
                                </button>
                                <button type="button"
                                    class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                    Create
                                </button>
                            </div>
                        </div>
                    </header>


  {{-- <nav class="relative flex flex-wrap items-center content-between py-3 px-4 top_navbar_admin">
    <div class="container mx-auto sm:px-4 max-w-full">
        

        <div class="site-logo text-center">
            <a  href="{{route('site.homepage')}}"><img class="pb-5" src="{{url('/')}}/images/logo-black.png" rel="" alt="logo-naturelcoquin" width="40%"/></a>
        </div>

        <div class="navbar-header pull-left">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
        </div>
 

        <div class="hidden flex-grow items-center" id="navbar-collapse">
            <ul class="flex flex-wrap list-none pl-0 mb-0 list-reset navbar-right">
            </ul>
        </div>
    </div>
</nav> --}}

<!-- #Top Bar -->











