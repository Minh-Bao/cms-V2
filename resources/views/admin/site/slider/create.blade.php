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
            <div class="sm:w-full pr-4 pl-4 md:w-full lg:w-5/6">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100  mb-8 border-b-1 border-gray-300 text-gray-900 ">
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
                                {{ Form::label('title',"Titre du slider :" , array('class' => 'block text-sm font-medium text-gray-700')) }}
                                {{ Form::text('title',null,array('class'=>'class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line">
                                {{ Form::label('type',"Type :" , array('class' => 'block text-sm font-medium text-gray-700')) }}
                                {{ Form::select('type', array('1'=>'Classique','2'=>'Pleine page') , null , ['class' => 'class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"'])  }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap  mb-4">
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line">
                                {{ Form::label('ratio',"Format :" , array('class' => 'block text-sm font-medium text-gray-700')) }}
                                {{ Form::select('ratio', array('1:1'=>'Carré','3:2'=>'Paysage','2:3'=>'Portrait') , null , ['class' => 'class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"'])  }}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line focused">
                                {{ Form::label('width',"Largeur en pixel :" , array('class' => 'block text-sm font-medium text-gray-700')) }}
                                {{ Form::text('width',null,array('class'=>'class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"' , 'placeholder'=>'1600' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                        <div class="md:w-1/3 pr-4 pl-4">
                            <div class="form-line focused">
                                {{ Form::label('height',"Hauteur en pixel :" , array('class' => 'block text-sm font-medium text-gray-700')) }}
                                {{ Form::text('height',null,array('class'=>'class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"' , 'placeholder'=>'1200', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Enregistrer', array('class'=>'inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:order-1 sm:ml-3 mt-4 mb-4')) }}
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

