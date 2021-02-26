@extends('site.themes.'.env('SITE_THEME').'.main')

@section('stylesheets')

@endsection

@section('title', ' | ' . $sitepage->name)

@section('content')

    @if ($slider)
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sitesliderimages as $key => $sitesliderimage)
                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" @if ($key++ == 1) class="active" @endif></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach ($sitesliderimages as $key => $sitesliderimage)
                    <div class="carousel-item @if ($key++==0) active @endif " style=" background">
                        <img src="{{ url('/') }}/{{ $sitesliderimage->picture }}"  style="width:100%;height:100%;">
                        <div class="carousel-caption text-center" style="">
                            <p>{{ $sitesliderimage->title }}</p>
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
    @else
        @if ($sitepage->image)
            <div class="row">
                <div class="col-md-12 page" name="{{$sitepage->id}}" value="image" style=" background-position: center;background-repeat: no-repeat;background-size: cover;">
                    <img src="{{url('/')}}/{{ $sitepage->image }}" alt="{{ $sitepage->alt_img }}" title="{{ $sitepage->title_img}}" class="img-fluid" style="width:100%;">
                </div>
            </div>
        @endif
    @endif

    @if ($sitepage->title != NULL && $sitepage->content == NULL)
        <div class="title_blog margin-auto col-md-8 ml-5 mt-5" style="width:63%;" >
            <h1 class=" margin-auto">{{ $sitepage->title }}</h1>
        </div>        
    @endif

    @if ($sitepage->content)
    <div class="container-fluid mt50 rounded" style="margin-left: 2.37em; text-align: justify-content" >
        <div class="row">
                <div class="margin-auto" >
                    <h1  style="margin-left: 0.3em">{{ $sitepage->title }}</h1>
                </div>
                <div class="col-md-11 page text-justify font-italic"  name="{{$sitepage->id}}" value="content">                    
                    {!! $sitepage->content !!}
                </div>
            </div>
        </div>
    @endif

    <?php
    $section_count = 0;
    $precedent = '';
    $groupe = 0;
    ?>

    <div>
        <div class="row">
            @if ($siteblocs->count() > 0)
                <!-- Blocs -->
                @foreach ($siteblocs as $bloc)
                    @if ($bloc->format == '12-title')
                        <?php $groupe++; ?>
                    @endif

                    @if ($precedent == $bloc->format)
                        <?php $section_count++; ?>
                    @else
                        @if ($precedent == '12-carrousel')
                            {{-- <div>
                                12-carrousel --}}
                            </div>
                        @endif
                        <?php
                        $section_count = 1;

                        $precedent = $bloc->format;
                        ?>
                            </div>
                        </div>

                        @if ($groupe % 2 == 0)

                            <div class="">
                                {{-- <div class="row" style="background-color:#f2f2f2;padding:15px;"> test pour mise en page mosaic Home...--}}
                                <div class="container-fluid" style="background-color:#f2f2f2;padding:15px;">
                        @else
                            <div class="container">
                                <div class="row" style="background-color:#fff;padding:15px;">
                        @endif

                        @if ($bloc->format == '12-carrousel' && $section_count == 1)

                            <div class="owl-carousel owl-theme mhc-blog-sec">

                        @endif
                    @endif

                    @include('site.themes.'.env('SITE_THEME').'.blocs.'.$bloc->format)
                @endforeach
            @endif
        </div>
    </div>
    @if ($sitepage->paginate == "on")
        @include('site.themes.'.env('SITE_THEME').'._partials._paginate')
    @endif
    @if ($sitepage->last_review == "on")
        @include('site.themes.'.env('SITE_THEME').'._partials._last_review')
    @endif
@endsection

@section('scripts')

@endsection
