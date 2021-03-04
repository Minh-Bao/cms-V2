@extends('admin.main')



@section('title', ' | Page > Création')



@section('stylesheets')

    <!-- Parsley -->
    {!! Html::style('plugins/parsley/css/parsley.css') !!}

    <!-- Trumbowyg -->
    {!! Html::style('plugins/trumbowyg/dist/ui/trumbowyg.min.css') !!}
    {!! Html::script('plugins/trumbowyg/dist/trumbowyg.min.js') !!}
    {!! Html::script('plugins/trumbowyg/dist/langs/fr.min.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/base64/trumbowyg.base64.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/colors/trumbowyg.colors.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/noembed/trumbowyg.noembed.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/pasteimage/trumbowyg.pasteimage.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/cleanpaste/trumbowyg.cleanpaste.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/template/trumbowyg.template.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/preformatted/trumbowyg.preformatted.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/table/trumbowyg.table.js') !!}
    {!! Html::script('plugins/trumbowyg/plugins/upload/trumbowyg.upload.js') !!}

    <!-- Slim kickstart -->
    {!! Html::style('plugins/kickstart/slim.min.css') !!}



@endsection



@section('content')

    {!! Form::open(['route' => 'websitebloc.store', 'data-parsley-validate' => '', 'files' => true]) !!}
    {{ Form::hidden('sitepages_id', $websitepage->id, ['class' => 'form-control', 'placeholder' => 'Example : Homepage', 'required' => '', 'minlength' => '2', 'maxlength' => '150']) }}

    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
        <div  id="breadcontainer">
            <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
                <li><i class="material-icons">dashboard</i> <a href="{{ url('') }}/admin"> Accueil</a></li>
                <li class=""><i class="material-icons">description</i> <a href="{{ route('websitepage.index') }}">Pages</a></li>
                <li class="active"><i class="material-icons">dns</i> Création d'un bloc</li>
            </ol>
        </div>

        <div class="flex flex-wrap  clearfix">
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4 lg:w-full pr-4 pl-4 xl:w-full pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 card-header-{{ Auth::user()->theme }}">
                        <div class="flex flex-wrap  clearfix">
                            <div class="md:w-2/3 pr-4 pl-4 sm:w-full pr-4 pl-4">
                                <h4 class="mb-3">
                                    Création d'un bloc sur la page : "{{ $websitepage->title }}"
                                </h4>
                            </div>
                            <div class="md:w-1/3 pr-4 pl-4 sm:w-full pr-4 pl-4 text-right">
                                {{ Form::submit('Enregistrer', ['class' => 'btn btn-lg btn-primary', 'id' => 'body', 'style' => 'margin-top:10px;']) }}
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        <div class="flex flex-wrap  mb-4">
                            <div class="md:w-2/3 pr-4 pl-4">
                                <div class="flex flex-wrap  mb-4">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('title', 'Titre bloc en H2 :') }}
                                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Example : Bienvenu sur notre site', 'minlength' => '2', 'maxlength' => '150']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap  mb-4" >
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('alt_img',"Description image ALT : ")}}
                                            {{ Form::text('alt_img',null,array('class'=>'form-control','minlength'=>'2' ,'maxlength'=>'150' ))}}
                                        </div>
                                    </div>
                                    <div class="md:w-1/2 pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('title_img',"Titre image SEO : ")}}
                                            {{ Form::text('title_img',null,array('class'=>'form-control' , 'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                        </div>
                                    </div>
                                </div>    

                                <div class="flex flex-wrap  mb-4">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            <label>Bloc</label>
                                            {{ Form::select('format', $blocs, null, ['class' => 'form-control minimal focused']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap  form-groupX">
                                    <div class="md:w-full pr-4 pl-4">
                                        {{ Form::label('content', 'Contenu', ['class' => 'form-label focused']) }}
                                        {{ Form::textarea('content', null, ['class' => 'trumbowyg']) }}
                                    </div>
                                    {{-- <div class="md:w-full pr-4 pl-4">
                                        {{ Form::label('content_hidden', 'Contenu', ['class' => 'form-label focused']) }}
                                        {{ Form::textarea('content_hidden', null, ['class' => 'trumbowyg']) }}
                                    </div> --}}
                                </div>
                            </div>

                            <div class="md:w-1/3 pr-4 pl-4">
                                <div class="flex flex-wrap ">
                                    <div class="md:w-full pr-4 pl-4">
                                        {{ Form::label('image', 'Image :') }}
                                        <div class="slim" 
                                            data-size="1440,1080" 
                                            data-force-size="1440,1080"
                                            data-label="Photo" 
                                            data-instant-edit="true" 
                                            data-button-cancel-label="Annuler"
                                            data-button-confirm-label="Confirmer">
                                            <input type="file" name="image[]" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap  mb-4">
                            <div class="md:w-full pr-4 pl-4 text-right">
                                {{ Form::submit('Enregistrer', ['class' => 'btn btn-lg btn-primary', 'id' => 'body', 'style' => 'margin-top:10px;']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}

@endsection

@section('scripts')

    <!-- Parsley -->
    {!! Html::script('plugins/parsley/js/parsley.min.js') !!}
    {!! Html::script('plugins/parsley/i18n/fr.js') !!}

    <!-- masked inputs -->
    {!! Html::script('plugins/input-mask/jquery.inputmask.bundle.min.js') !!}

    <!-- Slim kickstart -->
    {!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

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
                ['ruby'],
                ['table']
            ]
        });
    </script>
@endsection
