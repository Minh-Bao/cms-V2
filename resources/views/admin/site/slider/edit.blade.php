@extends('admin.main')



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
    <div class="container-fluid">
        <div id="breadcontainer">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
                <li><i class="material-icons">public</i> Site</li>
                <li><i class="material-icons">photo_library</i> <a href="{{route('slider.index')}}">Sliders</a></li>
                <li class="active">Gestion des Slides</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="header">
                        <h2>Sliders</h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row form-group">
                                    <div class="col-md-12" id="sortable">
                                        <ul class="sortable">
                                            @foreach($pictures as $picture)
                                                <li id="item-{{$picture->id}}">
                                                    <div class="card droppable" id="{{$picture->id}}" name="noname">
                                                        <div class="body">
                                                            <img src="{{url('')}}/{{$picture->picture}}" class="img-responsive"style="margin-bottom:10px;width:100%;height:auto;">
                                                            <a href="{{ route('sliderimage.edit',$picture->id) }}" class="btn btn-default waves-effect modal-picture" id="{{$picture->id}}">
                                                                <i class="material-icons">mode_edit</i>
                                                            </a>
                                                            <a href="{{ route('sliderimage.delete',$picture->id) }}" class="btn btn-default waves-effect waves-deep-orange">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <button class="btn btn-primary save pull-right ">Enregistrer l'ordre</button>
                                </div>
                            </div>

                            <div class="footer">
                                <div id="response"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="card">
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
                                <div class="row form-group form-float" style="margin-top:25px;">
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            {{ Form::label('title', 'Titre *', array('class' => 'form-label')) }}
                                            {{ Form::text('title',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group form-float">
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            {{ Form::label('content',"Texte :")}}
                                            {{ Form::textarea('content', null, array('class'=>'form-control' ))}}
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Enregistrer</button>
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