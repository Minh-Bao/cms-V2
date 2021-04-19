@extends('admin.main', ['sidebar' => "sliders"])

@section('title',' | Slider > Mise à jour')

@section('stylesheets')
  <!-- Slim kickstart -->
  {!! Html::style('plugins/kickstart/slim.min.css') !!}

<style>
/* 
*
* ul#Sortable Gallery
*
**/
ul.sortable {width: 100%; float: left; margin: 20px 0; list-style: none; position: relative !important;}
ul.sortable li {height: 180px; width:175px; float: left; margin: 0 7px 7px 0; border: 2px solid #fff; cursor: move;padding-bottom:15px;}
ul.sortable li img {height: 100%; float: left;}
ul.sortable li.ui-sortable-helper {border-color: #3498db;}


ul.sortable li.placeholder {width: 250px; height: 140px; float: left; background: #eee; border: 2px dashed #bbb; display: block; opacity: 0.6;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
}

.ribbon {
	font-size:11px;
}

li {
    list-style-type: none;
}

</style>


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
            'name' => 'Sliders'
        ],
        [
            'icon' => 'photo_library',
            'url'  => '{{url("/")}}',
            'name' => 'Gestion des Slides'
        ]
    ]
])


    <div class="container mx-auto sm:px-4 max-w-full">
        <div class="flex flex-wrap  clearfix">
            <div class="md:w-full pr-4 pl-4 lg:w-3/4">

                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="flex flex-wrap py-3 px-6 mb-0 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  {{-- bg-gray-200 --}} border-b-1 border-gray-300 text-gray-900 ">
                        <div  class=" w-1/2">
                            <h2>Modification des images d'un slide</h2>
                        </div>
                        <div class="w-1/2 pr-4 pl-4 text-right">
                            <a href="{{route('slider.edit',$slider->id)}}" class="bg-purple-500 text-gray-50 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"><i class="material-icons">add</i> Ajouter une slide</a>
                        </div>
                    </div>                   

                    <div class="body">
                        <div class="flex flex-wrap ">
                            <div class="md:w-full pr-4 pl-4">
                                <div class="flex flex-wrap  mb-4">
                                    <div class="md:w-full pr-4 pl-4" id="sortable">
                                    <ul class="sortable">
                                        @foreach($pictures as $picture)
                                            <li id="item-{{$picture->id}}">
                                                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 droppable" id="{{$picture->id}}" name="noname">
                                                    <div class="body">
                                                        <img src="{{ asset($picture->picture)}}" class="img-responsive" style="margin-bottom:10px;width:100%;height:auto;">
                                                        <a href="{{ route('sliderimage.edit',$picture->id) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default waves-effect modal-picture" id="{{$picture->id}}">
                                                            <i class="material-icons">mode_edit</i></a>
                                                        <a href="{{ route('sliderimage.delete',$picture->id) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default waves-effect waves-deep-orange"><i class="material-icons">delete</i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="saved">

                                </div>
                                <button 
                                        class="save bg-purple-500 text-gray-50 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Enregistrer l'ordre
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/4 pr-4 pl-4 md:w-full">
            <div class="flex flex-wrap  mb-4">
                <div class="md:w-full pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                        <div class="body">
                            {!! Form::model($slide,['route'=> ['sliderimage.update',$slide->id], 'method'=>'PUT' ] ) !!}
                                <div class="slim"
                                    data-label="Ajouter"
                                    data-force-type = "jpg"
                                    data-size="{{$slider->width}},{{$slider->height}}"
                                    data-instant-edit="true"
                                    data-button-cancel-label="Annuler"
                                    data-button-confirm-label="Confirmer"
                                    data-push="true"
                                    data-save-initial-image="true"
                                    data-ratio="{{$slider->ratio}}">
                                    <img src="{{ asset($slide->picture)}}" alt=""/>
                                    <input type="file" name="slim[]" required />
                                </div>
                                <div class="flex flex-wrap  mb-4 form-float">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('title', 'Titre *', array('class' => "block text-sm font-medium text-gray-700")) }}
                                            {{ Form::text('title',null,array('class'=>'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap  mb-4 form-float" style="margin-top:25px;">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('content',"Texte :")}}
                                            {{ Form::textarea('content', null, array('rows'=>'5', 'class'=>'mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' ))}}
                                        </div>
                                    </div>
                                </div>
                                <button 
                                    class="w-full bg-purple-500 text-gray-50 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">                                        
                                    Modifier
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Slim kickstart -->
{!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}

<!-- jquery.ui.touch-punch -->
{!! Html::script('plugins/jQueryUI/jquery.ui.touch-punch.min.js') !!}



<script type="text/javascript">
    var ul_sortable = $('.sortable'); //setup one variable for sortable holder that will be used in few places


    /*
    * jQuery UI Sortable setup
    */
    ul_sortable.sortable({revert: 100, placeholder: 'placeholder'});
    ul_sortable.disableSelection();

    /*
    * Saving and displaying serialized data
    */
    var btn_save = $('button.save'), // select save button



    btn_save.on('click', function(e){ // trigger function on save button click
        e.preventDefault(); 

        var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable
            // alert(sortable_data);
        div_response.text( 'Sauvegarde en cours...' ); //setup response information

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({ //ajax
            data: sortable_data,
            type: 'POST',
            url: '{{ route('sliderimage.sort') }}', // save.php - file with database update
            success:function(result) {
                //  alert (sortable_data);
            div_response.removeClass( 'btn-primary' );
            div_response.addClass( 'btn-success' );
            toastr.success("Ordre des photos enregistré");
            },
            error:function(result) {
                toastr.danger('Une erreur est survenue');
              }
        });
    });
  </script>

@endsection
