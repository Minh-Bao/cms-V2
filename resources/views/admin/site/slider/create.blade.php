@extends('admin.main')

@section('title',' | Page > Modification')

@section('stylesheets')

@endsection

@section('content')

{!! Form::open(['route' => 'slider.store' ,'data-parsley-validate' =>'','files'=>true  ]) !!}
    <div class="container-fluid">
      <div id="breadcontainer">
          <ol class="breadcrumb">
              <li><i class="material-icons">dashboard</i> <a href="{{url('')}}/admin"> Accueil</a></li>
              <li><i class="material-icons">public</i> Site</li>
              <li><i class="material-icons">photo_library</i> <a href="{{route('slider.index')}}">Sliders</a></li>
          </ol>
      </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>Création d'un slider</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                            </div>
                        </div>
                    </div>
                    <div class="body">
                    <div class="row form-group">
                        <div class="col-md-8">
                            <div class="form-line">
                                {{ Form::label('title',"Titre du slider :" , array('class' => 'form-label')) }}
                                {{ Form::text('title',null,array('class'=>'form-control' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'150' ))}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-line">
                                {{ Form::label('type',"Type :" , array('class' => 'form-label')) }}
                                {{ Form::select('type', array('1'=>'Classique','2'=>'Pleine page') , null , ['class' => 'form-control minimal'])  }}
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="form-line">
                                {{ Form::label('ratio',"Format :" , array('class' => 'form-label')) }}
                                {{ Form::select('ratio', array('1:1'=>'Carré','3:2'=>'Paysage','2:3'=>'Portrait') , null , ['class' => 'form-control minimal'])  }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-line focused">
                                {{ Form::label('width',"Largeur en pixel :" , array('class' => 'form-label')) }}
                                {{ Form::text('width',null,array('class'=>'form-control' , 'placeholder'=>'1600' ,  'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-line focused">
                                {{ Form::label('height',"Hauteur en pixel :" , array('class' => 'form-label')) }}
                                {{ Form::text('height',null,array('class'=>'form-control' , 'placeholder'=>'1200', 'required'=>'' ,'minlength'=>'2' ,'maxlength'=>'5' ))}}
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('Enregistrer', array('class'=>'btn btn-lg btn-primary' , 'id'=>'body' , 'style'=>'margin-top:10px;')) }}
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
{!! Form::close() !!}
@endsection
@section('scripts')

<!-- Parsley -->



@endsection

