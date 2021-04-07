@extends('admin.main', ['sidebar' => "sliders"])

@section('title',' | Page > Modification')

@section('stylesheets')

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

{!! Form::open(['route' => 'slider.store' ,'data-parsley-validate' =>'','files'=>true  ]) !!}
    <div class="container mx-auto sm:px-4 max-w-full">
      
        <div class="flex flex-wrap  clearfix">
            <div class="sm:w-full pr-4 pl-4 md:w-full lg:w-3/4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="header">
                        <div class="flex flex-wrap  clearfix">
                            <div class="sm:w-full pr-4 pl-4">
                                <h2>Création d'un slider</h2>
                            </div>
                            <div class="sm:w-full pr-4 pl-4 align-right">
                            </div>
                        </div>
                    </div>
                    <div class="body">
                    <div class="flex flex-wrap  mb-4">
                        <div class="md:w-2/3 pr-4 pl-4">
                            <div class="form-line">
                                {{ Form::label('title',"Titre du slider :" , array('class' => 'form-label')) }}
                                {{ Form::text('title',null,array('class'=>'form-control' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line">
                                {{ Form::label('type',"Type :" , array('class' => 'form-label')) }}
                                {{ Form::select('type', array('1'=>'Classique','2'=>'Pleine page') , null , ['class' => 'form-control minimal'])  }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap  mb-4">
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line">
                                {{ Form::label('ratio',"Format :" , array('class' => 'form-label')) }}
                                {{ Form::select('ratio', array('1:1'=>'Carré','3:2'=>'Paysage','2:3'=>'Portrait') , null , ['class' => 'form-control minimal'])  }}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line focused">
                                {{ Form::label('width',"Largeur en pixel :" , array('class' => 'form-label')) }}
                                {{ Form::text('width',null,array('class'=>'form-control' , 'placeholder'=>'1600' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line focused">
                                {{ Form::label('height',"Hauteur en pixel :" , array('class' => 'form-label')) }}
                                {{ Form::text('height',null,array('class'=>'form-control' , 'placeholder'=>'1200', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Enregistrer', array('class'=>'btn btn-lg btn-primary' , 'id'=>'body' , 'style'=>'margin-top:10px;')) }}
                </div>
            </div>
        <div class="sm:w-full pr-4 md:w-1/4 lg:w-1/4 pl-4"></div>
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('scripts')

<!-- Parsley -->



@endsection

