@extends('site.themes.'.config('myconfig.site_theme').'.main')

@section('title', ' | ' . $sitepage->name)

@section('content')

<!--Carousel embla bundle-->
    @if ($slider)
        <div 
            x-data="{ embla: null, next: true, prev: true }"
            x-init="() => {
                embla = EmblaCarousel($refs.viewport, { loop: false })
                embla.on('select', () => {
                next = embla.canScrollNext()
                prev = embla.canScrollPrev()
                })
                embla.on('init', () => {
                next = embla.canScrollNext()
                prev = embla.canScrollPrev()
                })
            }"
            class="embla {{-- slider --}}" name="{{$sitepage->slider_id}}" value="picture">
            <div x-ref="viewport" class="embla__viewport">
                <div class="embla__container">
                    @foreach ($sitesliderimages as $key => $sitesliderimage)
                    <div class="embla__slide">
                        <div class="embla__slide__inner relative">
                            <img class="embla__slide__img" src="{{ asset($sitesliderimage->picture) }}"/>
                            <div class="z-50 absolute slideText top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 texrt-xl text-2xl text-gray-300 bold font-bold text-center">
                                <span class="uppercase w-100 text-4xl ">{{ $sitesliderimage->title }} : </span>
                                <p>{{ $sitesliderimage->content }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach            
                </div>
            </div>
        
            <!-- Buttons -->
            <button
                :disabled="!prev"
                @click="embla.scrollPrev()"
                class="embla__button embla__button--prev "
                type="button">
                <svg class="embla__button__svg" viewBox="137.718 -1.001 366.563 643.999">
                    <path d="M428.36 12.5c16.67-16.67 43.76-16.67 60.42 0 16.67 16.67 16.67 43.76 0 60.42L241.7 320c148.25 148.24 230.61 230.6 247.08 247.08 16.67 16.66 16.67 43.75 0 60.42-16.67 16.66-43.76 16.67-60.42 0-27.72-27.71-249.45-249.37-277.16-277.08a42.308 42.308 0 0 1-12.48-30.34c0-11.1 4.1-22.05 12.48-30.42C206.63 234.23 400.64 40.21 428.36 12.5z"></path>
                </svg>
            </button>
            <button
                :disabled="!next"
                @click="embla.scrollNext()"
                class="embla__button embla__button--next"
                type="button">
                <svg class="embla__button__svg " viewBox="0 0 238.003 238.003">
                    <path d="M181.776 107.719L78.705 4.648c-6.198-6.198-16.273-6.198-22.47 0s-6.198 16.273 0 22.47l91.883 91.883-91.883 91.883c-6.198 6.198-6.198 16.273 0 22.47s16.273 6.198 22.47 0l103.071-103.039a15.741 15.741 0 0 0 4.64-11.283c0-4.13-1.526-8.199-4.64-11.313z" ></path>
                </svg>
            </button>
        </div>
    @else 
    <!--Main header picture-->
        @if ($sitepage->image)  
            <div class="w-full pr-4 pl-4 banner-img page" name="{{$sitepage->id}}" value="image" >
                <img src="{{asset($sitepage->image)}}" alt="{{ $sitepage->alt_img }}" title="{{ $sitepage->title_img}}" class="w-full h-auto" >
            </div>
        @endif
    @endif

    <!--Title H1 WITHOUT synopsis-->
    @if ($sitepage->title != NULL && $sitepage->content == NULL)
        <div class=" margin-auto md:w-2/3 pr-4 pl-4 ml-5 mt-5"  >
            <h1 class=" margin-auto">{{ $sitepage->title }}</h1>
        </div>        
    @endif

    <!--Title H1 AND synopsis-->
    @if ($sitepage->content)
        <div class="container mx-auto  mt-8" >
            <div class="" >
                <h1 >{{ $sitepage->title }}</h1>
            </div>
            <div class=" mx-auto page text-justify italic"  name="{{$sitepage->id}}" value="content">                    
                {!! $sitepage->content !!}
            </div>
        </div>
    @endif

    {{-- @php
        $section_count = 0;
        $precedent = '';
        $groupe = 0;
    @endphp --}}


            @if ($siteblocs->count() > 0)

                <!-- Blocs -->
                @foreach ($siteblocs as $bloc)

                    {{-- @if ($precedent == $bloc->format)
                        {{ $section_count++ }}
                    @else
                        @php
                            $section_count = 1;
                            $precedent = $bloc->format;
                        @endphp
                    @endif --}}

                    <!--Include customs bloc -->
                <div class="container max-w-full mx-auto sm:px-4 bg-white-450" style="padding:15px;">                        
                    @include('site.themes.'.config('myconfig.site_theme').'.blocs.'.$bloc->format)
                </div>

                @endforeach
            @endif

    <!--Checkbox paginate and last review-->
    @if ($sitepage->paginate == "on")
        @include('site.themes.'.config('myconfig.site_theme').'._partials._paginate')
    @endif
    @if ($sitepage->last_review == "on")
        @include('site.themes.'.config('myconfig.site_theme').'._partials._last_review')
    @endif
@endsection

@section('scripts')



@endsection
