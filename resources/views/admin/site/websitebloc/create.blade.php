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

@include('admin._interface.header._breadcrumb', [
    'bread' => [
        [
            'icon' => 'dashboard',
            'url'  => 'admin',
            'name' => 'Accueil'
        ],
        [
            'icon' => 'description',
            'url'  => '',
            'name' => 'Pages'
        ],
        [
            'icon' => 'dns',
            'url'  => '',
            'name' => "Création d'un bloc"
        ]
    ]
])


    {!! Form::open(['route' => 'websitebloc.store', 'data-parsley-validate' => '', 'files' => true]) !!}
    {{ Form::hidden('sitepages_id', $websitepage->id, ['class' => 'form-control', 'placeholder' => 'Example : Homepage', 'required' => '', 'minlength' => '2', 'maxlength' => '150']) }}

    <div class="container mx-auto sm:px-4 max-w-full">

        <div class="flex flex-wrap mb-8">
            <div class="sm:w-full pr-4 pl-4 w-full">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div
                        class="py-3 px-6 mb-0 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  {{-- bg-gray-200 --}} border-b-1 border-gray-300 text-gray-900 ">
                        <div class="grid grid-cols-6">
                            <div class="w-full col-span-3">
                                <h4 class="mb-3">
                                    Création d'un bloc :
                                    <a href="{{route('websitepage.edit',$websitepage->id)}}" class="">
                                        " {{$websitepage->name}} "
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
    
                    <div class="body">
                        <div class="grid grid-cols-6 mb-4">
                            <div class="col-span-4 p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 md:col-span-4 ">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Titre bloc en H2 :
                                        </label>
                                        <input type="text" name="title" id="title" placeholder="Example : Bienvenu sur notre site"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
    
                                    <div class="col-span-6 md:col-span-2">
                                        <label for="alt_img" class="block text-sm font-medium text-gray-700">
                                            Description image ALT :
                                        </label>
                                        <input type="text" name="alt_img" id="alt_img" 
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
    
                                    <div class="col-span-6 ">
                                        <label for="meta_desc" class="block text-sm font-medium text-gray-700">
                                            Choisissez un bloc :
                                        </label>
                                        {{ Form::select('format',$blocs , null, [ 'id' =>"selectBloc", 'class' => 'mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' ]) }}
                                    </div>
    
                                    <div class="col-span-6">
                                        {{ Form::label('content', 'Contenu', array('class' => 'form-label focused')) }}
                                        {{ Form::textarea('content', null, ['class' => 'trumbowyg' ]) }}
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="col-span-2">
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
                               
                            <div class="w-full pr-4 pl-4 text-right">
                                {{ Form::submit('Enregistrer', array('class'=>'bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500' , 'id'=>'body' )) }}
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
