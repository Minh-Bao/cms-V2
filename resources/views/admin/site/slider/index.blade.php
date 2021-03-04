@extends('admin.main')



@section('title',' | Agences')



@section('stylesheets')

  <!-- DataTables -->

  {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}

@endsection



@section('content')

  <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
    <div id="breadcontainer">
      <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
        <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
        <li><i class="material-icons">public</i> <a href=""> Site</a></li>
        <li class="active"><i class="material-icons">slideshow</i>  <a href="{{ route('slider.index') }}">Sliders</a></li>
      </ol>

    </div>

    <div class="flex flex-wrap  clearfix">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4 lg:w-full pr-4 pl-4">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div class="header">
                    <div class="flex flex-wrap  clearfix">
                        <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4">
                          <h3>Sliders  <span class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-cyan">{{$sliders->count()}}</span></h3>
                        </div>
                        <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4 align-right">
                          <a href="{{route('slider.create')}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" id="btn-slider-create"><i class="material-icons">add</i> Ajouter</a>
                        </div>
                    </div>
                </div>

                <div class="body">
                  <table class="w-full max-w-full mb-4 bg-transparent" id="sliders-tab">
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



