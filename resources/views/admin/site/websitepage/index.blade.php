@extends('admin.main', ['sidebar' => "articles"])

@section('title',' | Pages du site web')

@section('stylesheets')

    <!-- DataTables -->
    {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}

    <style>
        [type="date"]{
            border-width: 0 !important;
        }
    </style>


@endsection

<!------------------------------Section content----------------------------------------->

@section('content')


<!------------------------------Breadcrumb---------------------------------------------->
@include('admin._interface.header._breadcrumb', [
    'bread' => [
        [
            'icon' => 'dashboard',
            'url'  => '{{url("/admin")}}',
            'name' => 'Articles'
        ],
        [
            'icon' => 'description',
            'url'  => '{{url("/")}}',
            'name' => 'Page'
        ]
    ]
])


<div class="container mx-auto sm:px-4 max-w-full">
    <div class="flex flex-wrap  clearfix">
        <div class="sm:w-full pr-4 pl-4 md:w-full lg:w-full">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 bg-ivory card-header-{{Auth::user()->theme}}">
                    <div class="grid grid-cols-6">
                        <div class="w-full col-span-3">
                            <h3 class="mb-3 text-gray-500">
                            Nombre de pages :  
                                <span style="margin-left:1%;" 
                                    class="inline-block p-2 text-center text-gray-50 text-sm align-baseline leading-none rounded-full bg-blue-400 w-8 h-8 shadow-lg">
                                    {{$websitepage}}
                            </span>
                            </h3>
                        </div>
                        <div class="col-span-3 text-right">
                            <a href="{{route('websitepage.create')}}" 
                                class=" object-none object-right order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                Ajouter une page
                            </a>

                        </div>
                    </div>
                </div>


                <div class="px-4 mt-6 sm:px-6 lg:px-8">
                    <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Pages les plus vues...</h2>
                    <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3">
                        @foreach ($bestpage as $item)
                            <li class="relative col-span-1 flex shadow-sm rounded-md">
                                <div
                                    class="flex-shrink-0 flex items-center justify-center w-16  text-white text-sm font-medium rounded-l-md" style="background-image: url('{{asset($item->thumbnail )}}'); background-size: 100% 100%">
                                </div>
                                <div
                                    x-data=" { open: false }"
                                    class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                    <div class="flex-1 px-4 py-2 text-sm truncate">
                                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">
                                            {{$item->title}}
                                        </a>
                                        <p class="text-gray-500">{{$item->author}}</p>
                                    </div>
                                    <div class="flex-shrink-0 pr-2">
                                        <button type="button"
                                            @click="open = !open"
                                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            id="pinned-project-options-menu-0" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>

                                        <div 
                                            x-show="open"
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"                                            
                                            class="z-10 mx-3 origin-top-right absolute right-10 top-3 w-24 mt-1 rounded-md shadow-lg opacity-80 bg-gray-300 ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="pinned-project-options-menu-0">
                                            <div class="py-1" role="none">
                                                <a href="{{route('site.page', ['slug' => $item->slug , 'type' =>'page'])}}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">View
                                                </a>
                                            </div>
                                            <div class="py-1" role="none">
                                                <a href="{{ route('websitepage.edit',$item->id)}}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">Edit</a>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">Share</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                    
                <div class=" mt-8 sm:block">
                    <div class="align-middle inline-block min-w-full border-b border-gray-200">
                        <hr>
                        <livewire:pages-table/>                       
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')

<!-- Datatable -->
{!! Html::script('plugins/datatables/1.10.16/dataTables.min.js') !!}
{!! Html::script('plugins/datatables/1.10.16/DataTables-1.10.16/js/dataTables.bootstrap.min.js') !!}
{!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') !!}
{!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.print.min.js') !!}
{!! Html::script('plugins/datatables/extensions/FixedColumns/3.2.4/dataTables.fixedColumns.min.js') !!}

<script>

$(document).ready( function () {
    $('#websitepage').dataTable( {
        "bSort": false,        
        "bStateSave": true,
        "oLanguage": { "sUrl": "{{ url('/fr.txt') }}" },
        dom: 'Bfrtip',
        buttons: [  ]
    });
});

</script>

@endsection



