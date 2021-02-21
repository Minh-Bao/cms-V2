@extends('admin.main')

@section('title',' | Page > Modification')

@section('stylesheets')

    <!-- Slim kickstart -->
    {!! Html::style('plugins/kickstart/slim.min.css') !!}

    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  
@endsection



@section('content')

    <div class="container-fluid">
        <div id="breadcontainer">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
                <li class=""><i class="material-icons">description</i>  <a href="{{ route('websitepage.index') }}">Pages</a></li>
                <li class=""><i class="material-icons">dns</i>  <a href="">blocs</a></li>
                <li class="active"><i class="material-icons">mode_edit</i>  Modification d'un bloc</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header card-header-{{Auth::user()->theme}}">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="card-title">
                                    Modification d'un bloc de la page 
                                    <a href="{{route('websitepage.edit',$websitepage->id)}}" class="btn btn-default">{{$websitepage->name}}</a>
                                </h4>
                            </div>

                            <div class="col-xs-12 col-sm-6 align-right" style="margin-top:5px;">
                                @if ($websitepage->status == 0)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}" class="btn btn-default">Prévisualiser</a>
                                @endif
                                @if ($websitepage->status == 1)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'page'])}}" class="btn btn-default">Prévisualiser</a>
                                @endif
                                @if ($websitepage->status == 2)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}" class="btn btn-default">Prévisualiser</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        {!! Form::model($websitebloc,['route'=> ['websitebloc.update',$websitebloc->id], 'method'=>'PUT' , 'files' => 'true'] ) !!}
                            <div class="row form-group">
                                <div class="col-md-8">
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="form-line">
                                                {{ Form::label('title',"Titre bloc en H2 :")}}
                                                {{ Form::text('title',null,array('class'=>'form-control' , 'placeholder' => 'Example : Bienvenu sur notre site', 'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group" >
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                {{ Form::label('alt_img',"Description image ALT : ")}}
                                                {{ Form::text('alt_img',null,array('class'=>'form-control' , 'placeholder' => '', 'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-line">
                                                {{ Form::label('title_img',"Titre image SEO : ")}}
                                                {{ Form::text('title_img',null,array('class'=>'form-control' , 'placeholder' => '','minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="form-line">
                                                <label>Bloc</label>
                                                {{ Form::select('format', $blocs , null, [ 'id'=>'selectBloc','class' => 'form-control minimal focused']) }}
                                            </div>
                                        {{-- <div class="form-line">
                                                <label>Group</label>
                                                {{ Form::select('format', $groups , null, [ 'id'=>'selectBloc','class' => 'form-control minimal focused', 'placeholder' => 'choisi ce que tu veux' ]) }}
                                            </div>  --}}       
                                        </div>
                                    </div>

                                    <div class="row form-groupX">
                                        <div class="col-md-12">
                                            {{ Form::label('content', 'Contenu', array('class' => 'form-label focused')) }}
                                            {{ Form::textarea('content', null, ['class' => 'trumbowyg' ]) }}
                                        </div>

                                        <div class="col-md-12 content_two">
                                            {{ Form::label('content_two', 'Contenu', array('class' => 'form-label focused')) }}
                                            {{ Form::textarea('content_two', null, ['class' => 'trumbowyg' ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ Form::label('image',"Image :")}}                                
                                            <div class="slim"
                                                data-size="1440,1080"
                                                data-force-size="1440,1080"
                                                data-label="Photo"
                                                data-instant-edit="true"
                                                data-button-cancel-label="Annuler"
                                                data-button-confirm-label="Confirmer">

                                                @if($websitebloc->image)
                                                    <img src="{{url('')}}/{{$websitebloc->image}}" alt="">
                                                @endif

                                                <input type="file" name="image[]" />
                                            </div>

                                            <br />

                                            <input type="checkbox" name="del_image" id="del_image" value="1" class="filled-in chk-col-red">
                                            {{ Form::label('del_image','Supprimer la photo') }}                                

                                            <br />                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <a href="{{route('websitebloc.delete',$websitebloc->id)}}" class="btn btn-lg btn-danger ">Supprimer</a>
                                </div>

                                <div class="col-md-6 text-right">
                                    {{ Form::submit('Modifier', array('class'=>'btn btn-lg btn-primary' , 'id'=>'body' , 'style'=>'margin-top:10px;')) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Contenu (blocs)</h2>
                    </div>

                    <div class="col-xs-12 col-sm-6 align-right"></div>
                </div>
            </div>

            <div class="body">
                <div class="row form-group">
                    <div class="col-md-12" id="sortable">
                        <ul class="sortable">
                            @foreach($websiteblocs as $bloc)
                                <li id="item-{{$bloc->id}}">
                                    <div class="card droppable" id="{{$bloc->id}}" name="noname" style="margin:10px;padding:10px;cursor:move;">
                                        <div class="row">
                                            <div class="col-md-1">
                                                {{$bloc->sort}}
                                            </div>
                                            <div class="col-md-2">
                                                {{ $bloc->title }}
                                            </div>
                                            <div class="col-md-4">
                                                {{ substr(strip_tags($bloc->content),0,100) }} 
                                                @if (strlen($bloc->content)>100)
                                                    ...
                                                @endif
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{route('websitebloc.edit',$bloc->id)}}" class="btn btn-default">Modifier</a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{route('websitebloc.clone',$bloc->id)}}" class="btn btn-warning confirmation">Cloner</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row text-right">
                    <div class="col-md-12">
                        <a href="{{route('websitebloc.create')}}?sitepages_id={{$websitepage->id}}" class="btn btn-primary btn-lg">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

    <!-- masked inputs -->
    {!! Html::script('plugins/input-mask/jquery.inputmask.bundle.min.js') !!}

    <!-- Slim kickstart -->
    {!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}
    {!! Html::script('plugins/jQueryUI/jquery.ui.touch-punch.min.js') !!}

    <script>
        //Hide bloc content two
        $( document ).ready(function() {
            var result = $('#selectBloc').val();
            if(result != "group-article-full"){
                $('.content_two').hide();
            }
        });

        $( "#selectBloc" ).change(function() {
            var res = $('#selectBloc').val();
            if(res == 'group-article-full'){
                $('.content_two').show();
            }else{
                $('.content_two').hide();
            }
        });
    </script>

    <script type="text/javascript">

        $('.confirmation').on('click', function () {

            return confirm('Veuillez confirmer');
        });

        var ul_sortable = $('.sortable'); //setup one variable for sortable holder that will be used in few places

        /*
        * jQuery UI Sortable setup
        */
        ul_sortable.sortable({revert: 100,axis: "y",placeholder: 'placeholder'});
        ul_sortable.disableSelection();

        /*
        * Saving and displaying serialized data
        */

        var btn_save = $('button.save'), // select save button
        div_response = $('.save'); // response div


        $('.sortable').sortable({update: function(event, ui) {
            var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable

            $.ajax({ //ajax

                data: sortable_data,
                type: 'POST',
                url: '{{ route('bloc.sort') }}', // save.php - file with database update

                success:function(result) {

                    //alert (sortable_data);
                    div_response.text( 'Enregistrement terminé' );
                    div_response.removeClass( 'btn-primary' );
                    div_response.addClass( 'btn-success' );
                    toastr.success("Ordre des blocs enregistré");
                },

                error:function(result) {
                    console.log('non');
                }      
            });
        }});

    </script>

    <script>
        $('.trumbowyg').trumbowyg({      
            lang: 'fr',
            fixedBtnPane: true,
            autogrow: true,
            autogrowOnEnter: true,
            mobile: true,
            fixedBtnPane: true,
            fixedFullWidth: true,
            semantic: true,
            resetCss: true,
            removeformatPasted: true,
            imageWidthModalEdit: true,

            btns: [
                ['viewHTML'],
                ['p', 'blockquote','h2', 'h3', 'h4'],
                ['strong', 'em', 'underline', 'del'],
                ['createLink', 'unlink'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['ruby'],  ['table'] 
            ]
        });  


    </script>

@endsection

