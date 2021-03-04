@extends('admin.main')

@section('title',' | Pages du site web')

@section('stylesheets')

  <!-- DataTables -->
  {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}


@endsection

@section('content')

<div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
    <div id="breadcontainer">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
            <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
            <li class="active"><i class="material-icons">description</i>  <a href="{{ route('websitepage.index') }}">Pages</a></li>
        </ol>
    </div>

    <div class="flex flex-wrap  clearfix">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4 lg:w-full pr-4 pl-4">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 bg-ivory card-header-{{Auth::user()->theme}}">
                    <div class="flex flex-wrap  clearfix">
                        <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4">
                            <h3 class="mb-3">
                            Nombre de pages :  <div style="margin-left:1%;" class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded rounded-full py-1 px-3 bg-teal-500 text-white hover:bg-teal-600 ">{{$websitepages->count()}}</div>
                            </h3>
                        </div>
                        <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4 text-right">
                            <a href="{{route('websitepage.create')}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn_top_navbar"><i class="material-icons">add</i> Ajouter une page</a>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <table class="w-full max-w-full mb-4 bg-transparent" id="websitepage">
                        <thead>
                            <th>
                                Nom de la page :
                            </th>
                            <th>
                                Statut
                            </th>
                            <th>
                                Date de publication
                            </th>
                            <th>
                                Action
                            </th>
                            <th>
                                Supprimer
                            </th>
                        </thead>
                        <tbody>
                            @foreach($websitepages as $websitepage)
                                <tr>
                                    <td>
                                        {{ $websitepage->name }} 
                                    </td>
                                    <td class="text-center">
                                        @if($websitepage->status == 0)<i class="material-icons">construction</i>@endif
                                        @if($websitepage->status == 1)<i class="material-icons">save</i>@endif
                                        @if($websitepage->status == 2)<i class="material-icons">schedule</i>@endif
                                    </td>
                                    <td class="text-center">
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
                                        <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-teal-500 border-teal-500 hover:bg-teal-500 hover:text-white bg-white hover:bg-teal-600" @if($websitepage->status == 1) disabled @else enabled @endif style="background-color: rgb(231, 163, 245); color: grey">set</button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('websitepage.edit',$websitepage->id)}}" class=""><i class="material-icons index_icon">mode_edit</i></a>
                                    </td>
                                    <td class="text-center">
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



