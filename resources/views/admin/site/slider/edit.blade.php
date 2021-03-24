@extends('admin.main', ['sidebar' =>'sliders'])



@section('title',' | Slider > Mise à jour')



@section('stylesheets')

<!-- Slim kickstart -->
{!! Html::style('plugins/kickstart/slim.min.css') !!}



<style>
/* ------------------------
*
*     ul#Sortable Gallery
*
*  -------------------------- */



ul.sortable li {
    height: 180px;
    width: 175px;
    float: left;
    margin: 0 7px 7px 0;
    border: 2px solid #fff;
    cursor: move;
    padding-bottom: 15px;
}

ul.sortable li img {
    height: 100%;
    float: left;
}

ul.sortable li.ui-sortable-helper {
    border-color: #3498db;
}

ul.sortable li.placeholder {
    width: 250px;
    height: 140px;
    float: left;
    background: #eee;
    border: 2px dashed #bbb;
    display: block;
    opacity: 0.6;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
}

.ribbon {
    font-size: 11px;
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
            'name' => 'Site'
        ],
        [
            'icon' => 'photo_library',
            'url'  => '{{url("/")}}',
            'name' => 'Gestion des slides'
        ]
    ]
])




    <div class="container mx-auto  max-w-full">
        <div 
        class="mx-6 py-3 px-6 mb-0 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  {{-- bg-gray-200 --}} border-b-1 border-gray-300 text-gray-900 ">
        <div 
            class="header">
                <h2>Sliders</h2>
            </div>
        </div>

        <div class="flex flex-wrap  clearfix">
            <div class="md:w-full pr-4 pl-4 lg:w-3/4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    
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
                                                            <img src="{{url('')}}/{{$picture->picture}}" class="img-responsive"style="margin-bottom:10px;width:100%;height:auto;">
                                                            <a href="{{ route('sliderimage.edit',$picture->id) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default waves-effect modal-picture" id="{{$picture->id}}">
                                                                <i class="material-icons">mode_edit</i>
                                                            </a>
                                                            <a href="{{ route('sliderimage.delete',$picture->id) }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default waves-effect waves-deep-orange">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 save pull-right ">Enregistrer l'ordre</button>
                                </div>
                            </div>

                            <div class="footer">
                                <div id="response"></div>
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
                                    {!! Form::open(['route' => 'sliderimage.store' , 'class'=>'avatar', 'enctype'=>'multipart/form-data' ,'data-parsley-validate' =>'','files'=>true ]) !!}
                                    <input type="hidden" name="sitesliders_id" value="{{$slider->id}}">
                                    <div class="slim" 
                                        data-label="Ajouter" 
                                        data-force-type="jpg"
                                        data-size="{{$slider->width}},{{$slider->height}}" 
                                        data-instant-edit="true"
                                        data-button-cancel-label="Annuler" 
                                        data-button-confirm-label="Confirmer" 
                                        data-push="true"
                                        data-save-initial-image="true" 
                                        data-ratio="{{$slider->ratio}}">
                                        <input type="file" name="slide[]" required />
                                </div>
                                <div class="flex flex-wrap  mb-4 form-float" style="margin-top:25px;">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('title', 'Titre *', array('class' => 'form-label')) }}
                                            {{ Form::text('title',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap  mb-4 form-float">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('content',"Texte :")}}
                                            {{ Form::textarea('content', null, array('class'=>'form-control' ))}}
                                        </div>
                                    </div>
                                </div>
                                <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 w-full" type="submit">Enregistrer</button>
                                {!! Form::close() !!}
                            </div>
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
      div_response = $('.save'); // response div

    btn_save.on('click', function(e){ // trigger function on save button click
      e.preventDefault(); 
      var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable
      // alert(sortable_data);
      div_response.text( 'Sauvegarde en cours...' ); //setup response information


      $.ajax({ //ajax
              data: sortable_data,
              type: 'POST',
              url: '{{ route('sliderimage.sort') }}', // save.php - file with database update
              success:function(result) {
                  // alert (sortable_data);
                  div_response.text( 'Enregistrement terminé' );
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

<script type="text/javascript">
  $(document).ready(function(){
   $('.modal-picture').click(function(){
     var id = $(this).attr("id");
     $.ajax({
       url:"{{route('modal.picture')}}",
       method:"GET",
       data: {id : id},
       success:function(data){
         $('#largeModal').html(data);
//         console.log(data);
         $('#largeModal').modal({
          backdrop: 'static',
          keyboard: false
          })
       }
     });
   });
});

$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});

</script>

@endsection