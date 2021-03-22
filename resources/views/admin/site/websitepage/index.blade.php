@extends('admin.main')

@section('title',' | Pages du site web')

@section('stylesheets')

  <!-- DataTables -->
  {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}


@endsection

<!-- Header -->


@section('content')


@include('admin._interface.header._breadcrumb', [
        'bread' => [
            [
                'icon' => '<i class="material-icons">dashboard</i>',
                'url'  => '{{url("/admin")}}',
                'name' => ' > Articles'
            ],
            [
                'icon' => '<i class="material-icons">description</i>',
                'url'  => '{{url("/")}}',
                'name' => ' > Page'
            ]
        ]
    ])


<div class="container mx-auto sm:px-4 max-w-full">
    
    <div class="flex flex-wrap  clearfix">
        <div class="sm:w-full pr-4 pl-4 md:w-full lg:w-full">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 bg-ivory card-header-{{Auth::user()->theme}}">
                    <div class="flex flex-wrap  clearfix">
                        <div class="sm:w-full pr-4 pl-4">
                            <h3 class="mb-3">
                            Nombre de pages :  <div style="margin-left:1%;" class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded rounded-full py-1 px-3 bg-teal-500 text-white hover:bg-teal-600 ">{{$websitepages->count()}}</div>
                            </h3>
                        </div>
                        <a href="{{route('websitepage.create')}}" 
                            class=" object-none object-right order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:order-1 sm:ml-3">
                            Ajouter une page
                        </a>
                    </div>
                </div>
                <div class="hidden mt-8 sm:block">
                    <div class="align-middle inline-block min-w-full border-b border-gray-200">
                        <table class="min-w-full">
                        <thead>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="lg:pl-2">Nom de la page :</span>
                            </th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut
                            </th>
                            <th
                                class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date de publication
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
                            @foreach($websitepages as $websitepage)
                                <tr>
                                    <td
                                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-left">
                                        {{ $websitepage->name }} 
                                    </td>
                                    <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                        @if($websitepage->status == 0)<i class="material-icons">construction</i>@endif
                                        @if($websitepage->status == 1)<i class="material-icons">save</i>@endif
                                        @if($websitepage->status == 2)<i class="material-icons">schedule</i>@endif
                                    </td>
                                    <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                        @php if($websitepage->status == 1){
                                                $disable = ["disabled" => "disabled"]; 
                                                $date= $websitepage->created_at;
                                            }elseif($websitepage->status == 0){
                                                $disable = ["enabled" => "enabled"];
                                                $date= null;
                                            }elseif ($websitepage->status == 2) {
                                                $disable = ["enabled" => "enabled"];
                                                $date= date('Y-m-d', strtotime($websitepage->schedul));
                                            }
                                        @endphp
                                        {!! Form::open(['route'=> ['websitepage.setDate',$websitepage->id], 'method'=>'PUT' ]) !!}
                                        {{Form::date('date', $date, $disable)}}
                                        <button type="submit" 
                                            class=" order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-pink-450 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:order-1 sm:ml-3" 
                                            @if($websitepage->status == 1) disabled @else enabled @endif >
                                            set
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                <a href="{{ route('websitepage.edit',$websitepage->id)}}" class=""><i class="material-icons index_icon">mode_edit</i></a>
                                    </td>
                                    <td
                                    class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-center">
                                <a href="{{ route('websitepage.delete', $websitepage->id)}}" class=""><i class="material-icons index_icon">delete_forever</i></a>
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
{!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') !!}
{!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.print.min.js') !!}
{!! Html::script('plugins/datatables/extensions/FixedColumns/3.2.4/dataTables.fixedColumns.min.js') !!}

<script>

$(document).ready( function () {
    $('#websitepage').dataTable( {
        "bSort": false,        
        "bStateSave": true,
        "oLanguage": { "sUrl": "{{ url('') }}/fr.txt" },
        dom: 'Bfrtip',
        buttons: [  ]
    });
});

</script>

@endsection



