@extends('admin.main')

@section('title', ' | Page > Modification')

@section('stylesheets')
    <!-- Parsley -->
    {!! Html::style('plugins/parsley/css/parsley.css') !!}

    <!-- Slim kickstart -->
    {!! Html::style('plugins/kickstart/slim.min.css') !!}

    <!-- DataTables -->
    {!! Html::style('plugins/datatables/media/css/dataTables.material.css') !!}

    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <style>
        [type=checkbox]:checked,
        [type=checkbox]:not(:checked) {
            position: unset !important;
            opacity:1 !important;
        }
    </style>

@endsection

@section('content')

    <div class="container-fluid">
        <div id="breadcontainer">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i> <a href="{{ url('') }}/admin"> Accueil</a></li>
                <li class=""><i class="material-icons">description</i> <a href="{{ route('websitepage.index') }}">Pages</a></li>
                <li class="active"><i class="material-icons">restore_page</i> Creéation d'une page</li>
            </ol>
        </div>

        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header card-header-{{ Auth::user()->theme }}">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 class="card-title">Modification d'une page</h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right"></div>
                        </div>
                    </div>

                    <div class="body">                        
                        {!! Form::open(['route' => 'websitepage.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                        <div class="row form-group">
                            <div class="col-md-8">
                                <div class="row form-group">
                                    <div class="col-md-8">                                      
                                        <div class="form-line">                                      
                                            {{ Form::label('name',"Name * :")}}                                      
                                            {{ Form::text('name',null,array('class'=>'form-control' , 'placeholder' => 'Example : Homepage', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>                                      
                                    </div>                                  
                                    <div class="col-md-4">                                  
                                        <div class="form-line">                                  
                                            {{ Form::label('slug',"Slug url * :")}}                                  
                                            {{ Form::text('slug',null,array('class'=>'form-control' , 'placeholder' => 'Example : ma-belle-page', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>                                  
                                    </div>                                  
                                    <div class="col-md-12">                                        
                                        <div class="form-line">                                        
                                            {{ Form::label('title',"Titre de la page (balise H1) : ")}}                                        
                                            {{ Form::text('title',null,array('class'=>'form-control' , 'placeholder' => 'Example : Bienvenu sur notre site', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>                                        
                                    </div>                                 
                                </div>


                                <div class="row form-group" >
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            {{ Form::label('meta_title',"Balise metatitle : ")}}
                                            {{ Form::text('meta_title',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            {{ Form::label('meta_desc',"Balise metadesc : ")}}
                                            {{ Form::text('meta_desc',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            {{ Form::label('alt_img',"Description image ALT associée au titre : ")}}
                                            {{ Form::text('alt_img',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-line">
                                            {{ Form::label('title_img',"Titre image SEO associée au titre : ")}}
                                            {{ Form::text('title_img',null,array('class'=>'form-control' , 'placeholder' => '', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'200' ))}}
                                        </div>
                                    </div>
                                </div>   
                                <div class="row form-group" >
                                    <div class="col-md-12">
                                        <h3>Bas de page : </h3>                                     
                                    </div>
                                    <div class="col-md-6" >
                                        {{ Form::label('paginate',"Paginate : ")}}
                                        {{ Form::checkbox('paginate' ,NULL)}}
                                    </div>
                                    <div class="col-md-6" >
                                        {{ Form::label('last_review',"Last articles : ")}}
                                        {{ Form::checkbox('last_review' ,NULL)}}
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    {{ Form::label('content', 'Synopsis', ['class' => 'form-label focused']) }}
                                    {{ Form::textarea('content', null, ['class' => 'trumbowyg']) }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ Form::label('image', 'Image associée au titre :') }}
                                        <div class="slim" 
                                            data-size="1440,450" 
                                            data-force-size="1440,450" 
                                            data-ratio="4:2"
                                            data-instant-edit="true" 
                                            data-label="Photo" 
                                            data-button-cancel-label="Annuler"
                                            data-button-confirm-label="Confirmer">
                                            <input type="file" name="image[]" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ Form::label('thumbnail',"Thumbnail* :",array('required'=>'' ))}}
                                        <div class="slim"
                                            data-size="450,300"
                                            data-force-size="300,200"
                                            data-ratio="4:2"
                                            data-instant-edit="true"
                                            data-label="Photo"
                                            data-button-cancel-label="Annuler"
                                            data-button-confirm-label="Confirmer">
                                            <input type="file" name="thumbnail[]" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            {{ Form::label('slider_id', 'Slider :') }}
                                            {{ Form::select('slider_id', ['0' => 'Aucun'] + $sliders, null, ['class' => 'form-control minimal']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                {{ Form::submit('Programmer', array('class'=>'btn btn-lg btn-primary' ,'name' =>"action", "value" =>"programmer" , 'style'=>'margin-top:10px;')) }}
                                {{ Form::submit('Brouillon', array('class'=>'btn btn-lg btn-primary' ,'name' =>"action", "value" =>"brouillon" , 'style'=>'margin-top:10px;')) }}
                                {{ Form::submit('Enregistrer', array('class'=>'btn btn-lg btn-primary' ,'name' =>"action", "value" =>"enregistrer", 'id'=>'body' , 'style'=>'margin-top:10px;')) }}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

    <!-- Parsley -->
    {!! Html::script('plugins/parsley/js/parsley.min.js') !!}

    <!-- masked inputs -->
    {!! Html::script('plugins/input-mask/jquery.inputmask.bundle.min.js') !!}

    <!-- Slim kickstart -->
    {!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}
    {!! Html::script('plugins/jQueryUI/jquery.ui.touch-punch.min.js') !!}

    <!-- Datatable -->
    {!! Html::script('plugins/datatables/1.10.16/dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/1.10.16/DataTables-1.10.16/js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.flash.js') !!}
    {!! Html::script('plugins/datatables/extensions/Buttons/js/jszip.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('plugins/datatables/extensions/Buttons/js/buttons.print.min.js') !!}
    {!! Html::script('plugins/pdfmake/0.1.1.18/build/pdfmake.min.js') !!}
    {!! Html::script('plugins/pdfmake/0.1.1.18/build/vfs_fonts.js') !!}
    {!! Html::script('plugins/datatables/extensions/FixedColumns/3.2.4/dataTables.fixedColumns.min.js') !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        var ul_sortable = $('.sortable'); //setup one variable for sortable holder that will be used in few places
        
        /*
        * jQuery UI Sortable setup
        */
        ul_sortable.sortable({
            revert: 100,
            axis: "y",
            placeholder: 'placeholder'
        });

        ul_sortable.disableSelection();

        /*
        * Saving and displaying serialized data
        */

        var btn_save = $('button.save'), // select save button
        div_response = $('.save'); // response div

        $('#websitepage').dataTable({
            "bStateSave": true,
            "oLanguage": {"sUrl": "{{ url('') }}/fr.txt"},
            dom: 'Bfrtip',
            buttons: []
        });

        $('.sortable').sortable({
            update: function(event, ui) {
                var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable
                $.ajax({ //ajax
                    data: sortable_data,

                    type: 'POST',

                    url: '{{ route('bloc.sort') }}', // save.php - file with database update

                    success: function(result) {
                    //alert (sortable_data);
                        div_response.text('Enregistrement terminé');
                        div_response.removeClass('btn-primary');
                        div_response.addClass('btn-success');
                        toastr.success("Ordre des blocs enregistré");

                    },

                    error: function(result) {
                        console.log('non');
                    }
                });
            }
        });

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
                ['p', 'blockquote'],
                ['strong', 'em', 'underline', 'del'],
                ['superscript', 'subscript'],
                ['createLink', 'unlink'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['upload', 'base64', 'noembed'],
                ['ruby'],  ['table'] ,
                ['foreColor', 'backColor'],
                ['preformatted'],
                ['template'],
                ['fullscreen', 'close']
            ],
        });

    </script>
 @endsection
