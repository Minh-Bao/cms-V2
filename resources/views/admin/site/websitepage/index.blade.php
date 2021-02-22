@extends('admin.main')

@section('title',' | Pages du site web')

@section('stylesheets')

  <!-- DataTables -->
  {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}


@endsection

@section('content')

<div class="container-fluid">
    <div id="breadcontainer">
        <ol class="breadcrumb">
            <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
            <li class="active"><i class="material-icons">description</i>  <a href="{{ route('websitepage.index') }}">Pages</a></li>
        </ol>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header bg-ivory card-header-{{Auth::user()->theme}}">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h3 class="card-title">
                            Nombre de pages :  <div style="margin-left:1%;" class="badge badge-pill badge-info ">{{$websitepages->count()}}</div>
                            </h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <a href="{{route('websitepage.create')}}" class="btn btn_top_navbar"><i class="material-icons">add</i> Ajouter une page</a>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <table class="table" id="websitepage">
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
                                        <button type="submit" class="btn btn-outline-info" @if($websitepage->status == 1) disabled @else enabled @endif style="background-color: rgb(231, 163, 245); color: grey">set</button>
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



