@extends('admin.main')

@section('title',' | Page > Modification')

@section('stylesheets')

    <!-- Slim kickstart -->
    {!! Html::style('plugins/kickstart/slim.min.css') !!}

    <link media="all" type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  
@endsection



@section('content')

    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
        <div id="breadcontainer">
            <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
                <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
                <li class=""><i class="material-icons">description</i>  <a href="{{ route('websitepage.index') }}">Pages</a></li>
                <li class=""><i class="material-icons">dns</i>  <a href="">blocs</a></li>
                <li class="active"><i class="material-icons">mode_edit</i>  Modification d'un bloc</li>
            </ol>
        </div>

        <div class="flex flex-wrap  clearfix">
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4 lg:w-full pr-4 pl-4 xl:w-full pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900 card-header-{{Auth::user()->theme}}">
                        <div class="flex flex-wrap  clearfix">
                            <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4">
                                <h4 class="mb-3">
                                    Modification d'un bloc de la page 
                                    <a href="{{route('websitepage.edit',$websitepage->id)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">{{$websitepage->name}}</a>
                                </h4>
                            </div>

                            <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4 align-right" style="margin-top:5px;">
                                @if ($websitepage->status == 0)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">Prévisualiser</a>
                                @endif
                                @if ($websitepage->status == 1)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'page'])}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">Prévisualiser</a>
                                @endif
                                @if ($websitepage->status == 2)
                                    <a href="{{route('site.page', ['slug' => $websitepage->slug , 'type' =>'preview'])}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">Prévisualiser</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="body">
                        {!! Form::model($websitebloc,['route'=> ['websitebloc.update',$websitebloc->id], 'method'=>'PUT' , 'files' => 'true'] ) !!}
                            <div class="flex flex-wrap  mb-4">
                                <div class="md:w-2/3 pr-4 pl-4">
                                    <div class="flex flex-wrap  mb-4">
                                        <div class="md:w-full pr-4 pl-4">
                                            <div class="form-line">
                                                {{ Form::label('title',"Titre bloc en H2 :")}}
                                                {{ Form::text('title',null,array('class'=>'form-control' , 'placeholder' => 'Example : Bienvenu sur notre site', 'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap  mb-4" >
                                        <div class="md:w-1/2 pr-4 pl-4">
                                            <div class="form-line">
                                                {{ Form::label('alt_img',"Description image ALT : ")}}
                                                {{ Form::text('alt_img',null,array('class'=>'form-control' , 'placeholder' => '', 'minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                        <div class="md:w-1/2 pr-4 pl-4">
                                            <div class="form-line">
                                                {{ Form::label('title_img',"Titre image SEO : ")}}
                                                {{ Form::text('title_img',null,array('class'=>'form-control' , 'placeholder' => '','minlength'=>'2' ,'maxlength'=>'150' ))}}
                                            </div>
                                        </div>
                                    </div>    

                                    <div class="flex flex-wrap  mb-4">
                                        <div class="md:w-full pr-4 pl-4">
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

                                    <div class="flex flex-wrap  form-groupX">
                                        <div class="md:w-full pr-4 pl-4">
                                            {{ Form::label('content', 'Contenu', array('class' => 'form-label focused')) }}
                                            {{ Form::textarea('content', null, ['class' => 'trumbowyg' ]) }}
                                        </div>

                                        <div class="md:w-full pr-4 pl-4 content_two">
                                            {{ Form::label('content_two', 'Contenu', array('class' => 'form-label focused')) }}
                                            {{ Form::textarea('content_two', null, ['class' => 'trumbowyg' ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="md:w-1/3 pr-4 pl-4">
                                    <div class="flex flex-wrap ">
                                        <div class="md:w-full pr-4 pl-4">
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
                            <div class="flex flex-wrap  mb-4">
                                <div class="md:w-1/2 pr-4 pl-4">
                                    <a href="{{route('websiteblocs.destroy', $websitebloc->id)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline py-3 px-4 leading-tight text-xl bg-red-600 text-white hover:bg-red-700 ">Supprimer</a>
                                </div>

                                <div class="md:w-1/2 pr-4 pl-4 text-right">
                                    {{ Form::submit('Modifier', array('class'=>'btn btn-lg btn-primary' , 'id'=>'body' , 'style'=>'margin-top:10px;')) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
            <div class="header">
                <div class="flex flex-wrap  clearfix">
                    <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4">
                        <h2>Contenu (blocs)</h2>
                    </div>

                    <div class="sm:w-full pr-4 pl-4 sm:w-1/2 pr-4 pl-4 align-right"></div>
                </div>
            </div>

            <div class="body">
                <div class="flex flex-wrap  mb-4">
                    <div class="md:w-full pr-4 pl-4" id="sortable">
                        <ul class="sortable">
                            @foreach($websiteblocs as $bloc)
                                <li id="item-{{$bloc->id}}">
                                    <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 droppable" id="{{$bloc->id}}" name="noname" style="margin:10px;padding:10px;cursor:move;">
                                        <div class="flex flex-wrap ">
                                            <div class="md:w-1/6 pr-4 pl-4">
                                                {{$bloc->sort}}
                                            </div>
                                            <div class="md:w-1/5 pr-4 pl-4">
                                                {{ $bloc->title }}
                                            </div>
                                            <div class="md:w-1/3 pr-4 pl-4">
                                                {{ substr(strip_tags($bloc->content),0,100) }} 
                                                @if (strlen($bloc->content)>100)
                                                    ...
                                                @endif
                                            </div>
                                            <div class="md:w-1/6 pr-4 pl-4">
                                                <a href="{{route('websitebloc.edit',$bloc->id)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default">Modifier</a>
                                            </div>
                                            <div class="md:w-1/6 pr-4 pl-4">
                                                <a href="{{route('websitebloc.clone',$bloc->id)}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500 confirmation">Cloner</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex flex-wrap  text-right">
                    <div class="md:w-full pr-4 pl-4">
                        <a href="{{route('websitebloc.create')}}?sitepages_id={{$websitepage->id}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-blue-600 text-white hover:bg-blue-600 py-3 px-4 leading-tight text-xl">Ajouter</a>
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

