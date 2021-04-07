@extends('admin.main', ['sidebar' => "articles"])

@section('title',' | Page > Modification')

@section('stylesheets')
<!-- Slim kickstart for image upload -->
{!! Html::style('plugins/kickstart/slim.min.css') !!}

<link media="all" type="text/css" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endsection



@section('content')

@include('admin._interface.header._breadcrumb', [
'bread' => [
[
'icon' => 'dashboard',
'url' => '/admin',
'name' => 'Accueil'
],
[
'icon' => 'description',
'url' => '/admin/websitepage',
'name' => 'Pages'
],
[
'icon' => 'dns',
'url' => '',
'name' => "Blocs"
],
[
'icon' => 'mode_edit',
'url' => '',
'name' => "Modification"
]
]
])

<div class="container mx-auto sm:px-4 max-w-full">
    <div class="flex flex-wrap mb-8">
        <div class="sm:w-full pr-4 pl-4 w-full">
            <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                <div
                    class="py-3 px-6 mb-0 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  {{-- bg-gray-200 --}} border-b-1 border-gray-300 text-gray-900 ">
                    <div class="grid grid-cols-6">
                        <div class="w-full col-span-3">
                            <h4 class="mb-3">
                                Modification du bloc : <span class="text-blue-400">" {{$websitebloc->format}} " </span> de la page :
                                <a href="{{route('websitepage.edit',$websitepage->id)}}" class="text-blue-400">
                                    " {{$websitepage->name}} "
                                </a>
                            </h4>
                        </div>

                        <div class="w-full col-span-3 text-right">
                            @if ($websitepage->status == 0)
                            <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}"
                                class="bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Prévisualiser</a>
                            @endif
                            @if ($websitepage->status == 1)
                            <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'page'])}}"
                                class="bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Prévisualiser</a>
                            @endif
                            @if ($websitepage->status == 2)
                            <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}"
                                class="bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Prévisualiser</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="body">
                    {!! Form::model($websitebloc,['route'=> ['websitebloc.update',$websitebloc->id], 'method'=>'PUT' ,
                    'files' => 'true'] ) !!}
                    <div class="grid grid-cols-6 mb-4">
                        <div class="col-span-4 p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 md:col-span-4 ">
                                    <label for="title" class="block text-sm font-medium text-gray-700">
                                        Titre bloc en H2 :
                                    </label>
                                    <input type="text" name="title" id="title" value="{{$websitebloc->title}}"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 md:col-span-2">
                                    <label for="alt_img" class="block text-sm font-medium text-gray-700">
                                        Description image ALT :
                                    </label>
                                    <input type="text" name="alt_img" id="alt_img" value="{{$websitebloc->alt_img}}"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                <div class="col-span-6 ">
                                    <label for="meta_desc" class="block text-sm font-medium text-gray-700">
                                        Choisissez un bloc :
                                    </label>
                                    {{ Form::select('format',$blocs , $websitebloc->format, [ 'id' =>"selectBloc", 'class' => 'mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm' ]) }}
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
                                    {{ Form::label('image',"Image :", array('class' => 'block text-md font-medium text-gray-700 mb-2'))}}
                                    <div class="slim" data-size="1440,1080" data-force-size="1440,1080"
                                        data-label="Photo" data-instant-edit="true" data-button-cancel-label="Annuler"
                                        data-button-confirm-label="Confirmer">

                                        @if($websitebloc->image)
                                        <img src="{{url('')}}/{{$websitebloc->image}}" alt="">
                                        @endif

                                        <input type="file" name="image[]" />
                                    </div>

                                    <br />

                                    <input type="checkbox" name="del_image" id="del_image" value="1"
                                        class="filled-in chk-col-red">
                                    {{ Form::label('del_image','Supprimer la photo', array('class' => 'text-md font-medium text-gray-700 mb-2')) }}

                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap  mb-4">
                        <div class="md:w-1/2 pr-4 pl-4">
                            <a href="{{route('websiteblocs.destroy', $websitebloc->id)}}"
                                class="bg-red-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Supprimer</a>
                        </div>

                        <div class="md:w-1/2 pr-4 pl-4 text-right">
                            {{ Form::submit('Modifier', array('class'=>'bg-blue-400 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500' , 'id'=>'body' )) }}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="w-full pr-4 pl-4 mb-4">
        <div class=" flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
            <div
                class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 card-header-{{Auth::user()->theme}}">
                <div class="flex flex-wrap  clearfix">
                    <div class="w-full ">
                        <h4 class="underline text-gray-600">
                            Contenu (blocs)
                        </h4>
                        <div class="w-full text-right">
                            <a href="{{route('websitebloc.create')}}?sitepages_id={{$websitepage->id}}"
                                class="bg-blue-300 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Ajouter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrapmb-4">
                <div class="w-full " id="sortable">
                    <ul class="sortable m-2">
                        @foreach($websiteblocs as $bloc)
                        <li id="item-{{$bloc->id}} " x-data=" { open: false }">
                            <div class="relative flex flex-col text-gray-600 min-w-0 rounded break-words border bg-purple-200 border-1 border-gray-300 droppable"
                                id="{{$bloc->id}}" name="noname"
                                style="margin:0px 20px 50px 0px;padding:5px;cursor:move;">
                                <div class="flex flex-wrap ">
                                    <div class="md:w-1/12 pr-4 pl-4 border-r-2">
                                        <span
                                            class="inline-block p-2 text-center font-semibold text-sm align-baseline leading-none rounded-full bg-blue-100 w-8 h-8 shadow-lg">
                                            {{$bloc->sort}}
                                        </span>
                                    </div>
                                    <div class="md:w-5/12 pr-4 pl-4">
                                        <span class="text-gray-800">
                                            Titre :
                                        </span>
                                        @isset( $bloc->title) {{$bloc->title}} @else <span class="text-red-400"> Non
                                            assigné...</span> @endisset
                                    </div>
                                    <div class="md:w-5/12 pr-4 pl-4">
                                        <span class="text-gray-800">
                                            Format :
                                        </span>
                                        {{$bloc->format}}
                                    </div>
                                    <div class="relative flex justify-end md:w-1/12">
                                        <button type="button" @click="open = !open"
                                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                            id="project-options-menu-0" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>

                                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg z-10 bg-gray-50 ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="project-options-menu-0">
                                            <div class="py-1" role="none">
                                                <a href="{{route('websitebloc.edit', $bloc->id)}}"
                                                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">
                                                    <!-- Heroicon name: solid/pencil-alt -->
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <a href="{{route('websitebloc.clone', $bloc->id)}}"
                                                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">
                                                    <!-- Heroicon name: solid/duplicate -->
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                                                        <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
                                                    </svg>
                                                    Duplicate
                                                </a>
                                            </div>
                                            <div class="py-1" role="none">
                                                <a href="{{route('websitebloc.destroy', $bloc->id)}}"
                                                    class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                                    role="menuitem">
                                                    <!-- Heroicon name: solid/trash -->
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
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