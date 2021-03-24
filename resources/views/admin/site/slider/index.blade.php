@extends('admin.main', ['sidebar' => "sliders"])



@section('title',' | Agences')



@section('stylesheets')

    <!-- DataTables -->
    {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}

@endsection



@section('content')

@include('admin._interface.header._breadcrumb', [
    'bread' => [
        [
            'icon' => 'dashboard',
            'url'  => '{{url("/admin")}}',
            'name' => 'Accueil'
        ],
        [
            'icon' => 'public',
            'url'  => '{{url("/")}}',
            'name' => 'Site'
        ],
        [
            'icon' => 'slideshow',
            'url'  => '{{url("/")}}',
            'name' => 'SLIDERS'
        ]
    ]
])



<div class="container mx-auto sm:px-4 max-w-full">
    <div class="flex flex-wrap  clearfix">
        <div class="sm:w-full pr-4 pl-4 md:w-full lg:w-full">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 bg-ivory card-header-{{Auth::user()->theme}}">
                    <div class="flex flex-wrap  clearfix">
                        <div 
                            class="sm:w-full pr-4 pl-4">
                            <h3>Sliders  <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-cyan">{{$sliders->count()}}</span></h3>
                        </div>
                        <a href="{{route('slider.create')}}" 
                            class=" object-none object-right order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:order-1 sm:ml-3">
                            Ajouter un slide
                        </a>
                    </div>
                </div>
                <div class="hidden mt-8 sm:block">
                    <div class="align-middle inline-block min-w-full border-b border-gray-200">
                        <table class="min-w-full">
                        <thead>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Titre du slider : 
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Supprimer
                            </th>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($sliders as $slider)
                                <tr>
                                    <td
                                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-left">
                                        {{ strip_tags($slider->title) }} 
                                    </td>
                                    <td
                                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                        <a href="{{ route('slider.edit',$slider->id) }}" class=""><i class="material-icons index_icon">mode_edit</i></a>
                                    </td>
                                    <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                <a href="{{ route('slider.delete',$slider->id)}}" class=""><i class="material-icons index_icon">delete_forever</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

{!! Html::script('plugins/datatables/extensions/FixedColumns/3.2.4/dataTables.fixedColumns.min.js') !!}

<script>

$(document).ready( function () {



@if($sliders->count()==0)

toastr.warning('Pour ajouter votre premier Slider, cliquer sur le bouton AJOUTER');

$('#btn-slider-create').animateCss("bounce");



@endif

  $('#sliders-tab').dataTable( {

    "bStateSave": true,

    "oLanguage": { "sUrl": "{{ url('') }}/fr.txt" },

    dom: 'Bfrtip'



  });

});

</script>



@endsection



