@extends('site.themes.'.config('myconfig.site_theme').'.main')

@section('stylesheets')

@endsection


@section('title',' | '. $sitepage->name)

@section('content')

@if($slider)
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    @foreach($sitesliderimages as $key=>$sitesliderimage)
    <div class="carousel-item @if($key++==0) active @endif" >
      <img src="{{$sitesliderimage->picture}}" style="width:100%;height:100%;">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>{{$sitesliderimage->title}}</h1>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endif

<?php

$section_count = 0;
$precedent = "";
$groupe = 0;
?>



<div class="containerx">
  <div class="row">
    @if($siteblocs->count()>0)
    <!-- Blocs -->
    @foreach($siteblocs as $bloc)

    @if($bloc->format == "12-title1")
    <?php $groupe++; ?>
    @endif

    @if($precedent==$bloc->format)
    <?php $section_count++; ?>
    @else

    @if($precedent=="12-carrousel")
  </div>
  @endif

  <?php $section_count = 1;
  $precedent = $bloc->format; ?>
</div>

<div class="row" @if($groupe % 2==0) style="background-color:#f2f2f2;padding:15px;" @else style="background-color:#fff;padding:20px;" @endif>
  @if($bloc->format=="12-carrousel" && $section_count==1)
  <div class="owl-carousel owl-theme mhc-blog-sec">
    @endif
    @endif
    @include('site.themes.'.config('myconfig.site_theme').'.blocs.'.$bloc->format)
    @endforeach
    @endif
  </div>
</div>

@endsection

@section('scripts')

@endsection