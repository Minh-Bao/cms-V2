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
                    <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-blue-700 bg-transparent waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div> --}}





  <!-- HEADER -->
                    <header>
                        <nav class="flex ml-4 md:ml-8" aria-label="Breadcrumb">
                            <ol class="bg-white rounded-md border-l-2 px-6 flex space-x-4">
                                <li class="flex">
                                    <div class="flex items-center">
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <!-- Heroicon name: solid/home -->
                                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                            </svg>
                                            <span class="sr-only">Home</span>
                                        </a>
                                    </div>
                                </li>
                    
                                @foreach ($bread as $item)
                                <li class="flex">
                                    <div class="flex items-center">
                                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                        </svg>
                                        <i class="material-icons material-icons text-gray-400 px-2 rounded-md">{{$item['icon'] }}</i>                                        
                                        <a href="{{url('')}}{{$item['url']}}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$item['name']}}</a>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        </nav>
                    </header>
<!-- #HEADER -->



{{-- 


 --}}


{{--  <div class=" px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div id="breadcontainer">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 bg-transparent rounded ">
            @foreach ($bread as $item)
            <li>
                <i class="material-icons material-icons text-gray-900 px-2 rounded-md">{{$item['icon'] }}</i>
            </li>
            &ensp;
            <li>
                <a href="{{ $item['url'] }}" class="text-gray-600">
                    {{ $item['name']  }}
                </a>
            </li>
            &ensp;
            @endforeach
        
        </ol>
    </div>
 --}}    {{-- <div class="flex-1 min-w-0">
        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
            Home
        </h1>
    </div> --}}
{{--     
    <div class="mt-4 flex sm:mt-0 sm:ml-4">
        <button type="button"
            class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">
            Share
        </button>
        <button type="button"
            class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-300 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
            Create
        </button>
    </div>
</div>
 --}}









