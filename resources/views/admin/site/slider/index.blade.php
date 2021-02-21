@extends('admin.main')



@section('title',' | Agences')



@section('stylesheets')

  <!-- DataTables -->

  {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}

@endsection



@section('content')

  <div class="container-fluid">
    <div id="breadcontainer">
      <ol class="breadcrumb">
        <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
        <li><i class="material-icons">public</i> <a href=""> Site</a></li>
        <li class="active"><i class="material-icons">slideshow</i>  <a href="{{ route('slider.index') }}">Sliders</a></li>
      </ol>

    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                          <h3>Sliders  <span class="badge bg-cyan">{{$sliders->count()}}</span></h3>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                          <a href="{{route('slider.create')}}" class="btn btn-primary" id="btn-slider-create"><i class="material-icons">add</i> Ajouter</a>
                        </div>
                    </div>
                </div>

                <div class="body">
                  <table class="table" id="sliders-tab">
                    <thead>
                      <th>
                        Titre du slider : 
                      </th>
                      <th>
                        Action : 
                      </th>
                      <th>
                        Supprimer
                      </th>
                    </thead>
                    <tbody>
                      @foreach($sliders as $slider)
                      <tr>
                        <td>
                          {{ strip_tags($slider->title) }} 
                        </td>
                        <td class="text-center">
                          <a id href="{{ route('slider.edit',$slider->id) }}" class=""><i class="material-icons index_icon">mode_edit</i></a>
                        </td>
                        <td class="text-center">
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



