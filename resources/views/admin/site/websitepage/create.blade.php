@extends('admin.main', ['sidebar' => "articles"])

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
            'icon' => 'restore_page',
            'url'  => '',
            'name' => "Création d'un page"
        ]
    ]
])

    <div class="container mx-auto sm:px-4 max-w-full">

        <div class="flex flex-wrap  clearfix">
            <div class="w-full pr-4 pl-4">
                <div class="flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div
                        class="py-3 px-6 mb-0 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  {{-- bg-gray-200 --}} border-b-1 border-gray-300 text-gray-900 ">
                        <div class="grid grid-cols-6  clearfix">
                            <div class="w-full col-span-3 ">
                                <h4 class="underline text-gray-500">
                                    Création d'une page
                                </h4>
                            </div>
                        </div>
                    </div>
    
                    <div>
                        {!! Form::open(['route' => 'websitepage.store', 'data-parsley-validate' => '', 'files' => true]) !!}
                    
                        <div class="grid grid-cols-3  mb-4">
                            <div class="col-span-2">
                                <div class=" sm:rounded-md sm:overflow-hidden">
                                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-4">
                                                <label for="name" class="block text-sm font-medium text-gray-700">
                                                    Name * :</label>
                                                <input type="text" name="name" id="name" 
                                                    placeholder="Ex: Titre de la page"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-2">
                                                <label for="slug" class="block text-sm font-medium text-gray-700">
                                                    Slug url * :</label>
                                                <input type="text" name="slug" id="slug" 
                                                    placeholder="Ex: Tpage-de-bateau"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 ">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Titre de la page (balise H1) :
                                                </label>
                                                <input type="text" name="title" id="title" 
                                                    placeholder="Ex: Titre de la page en gros..."
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="meta_title"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Balise metatitle :
                                                </label>
                                                <input type="text" name="meta_title" id="meta_title"
                                                    placeholder="Ex: Blog_nc..."
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="meta_desc"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Balise metadesc :
                                                </label>
                                                <input type="text" name="meta_desc" id="meta_desc"
                                                    placeholder="Ex: Ceci est le blog de NC..."
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="alt_img"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Description image ALT associée au titre : </label>
                                                <input type="text" name="alt_img" id="alt_img"
                                                    placeholder="Ex: Image de bateau..."
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="title_img" class="block text-sm font-medium text-gray-700">
                                                    Titre image SEO associée au titre : </label>
                                                <input type="text" name="title_img" id="title_img"
                                                    placeholder="Ex: Titre de mon image..."
                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="paginate"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Paginate : 
                                                </label>
                                                <input type="hidden" name="paginate" value='off'>
                                                <input type="checkbox" name="paginate" id="paginate"
                                                    class="mt-1 block  border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    >
                                            </div>
    
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="last_review"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Last articles : 
                                                </label>
                                                <input type="hidden" name="last_review" value='off'>
                                                <input type="checkbox" name="last_review" id="last_review"
                                                    class="mt-1 block border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                   >
                                            </div>
    
                                            <div class="col-span-6">
                                                <label for="content"
                                                    class="block text-sm font-medium text-gray-700">
                                                    Synopsis :
                                                </label>
                                                {{ Form::textarea('content', null, ['class' => 'trumbowyg' ]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-span-1 ">
                                <div class="flex flex-wrap ">
                                    <div class="md:w-full pr-4 pl-4">
                                        {{ Form::label('image', 'Image associée au titre :', array('class' => 'block text-sm font-medium text-gray-700 mb-2 mt-4')) }}
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
                                <div class="flex flex-wrap ">
                                    <div class="md:w-full pr-4 pl-4">
                                        {{ Form::label('thumbnail',"Thumbnail* :",array('class'=>'block text-sm font-medium text-gray-700 mb-2 mt-4' ))}}
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
    
                                <div class="flex flex-wrap ">
                                    <div class="md:w-full pr-4 pl-4">
                                        <div class="form-line">
                                            {{ Form::label('slider_id',"Slider :", array('class' => 'block text-sm font-medium text-gray-700'))}}
                                            {{ Form::select('slider_id', array('0'=>'Aucun')+$sliders , null, [ 'class' => 'mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' ]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="flex flex-wrap ">
                            <div class="w-full pr-4 pl-4 mb-2  text-right">
                                {{ Form::submit('Programmer', array('class'=>'bg-blue-300 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500' ,'name' =>"action", "value" =>"programmer" )) }}
                                {{ Form::submit('Brouillon', array('class'=>'bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500' ,'name' =>"action", "value" =>"brouillon" )) }}
                                {{ Form::submit('Enregistrer', array('class'=>'bg-blue-500 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500' ,'name' =>"action", "value" =>"enregistrer", 'id'=>'body' )) }}
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
            "oLanguage": {"sUrl": "{{ url('/fr.txt') }}"},
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
