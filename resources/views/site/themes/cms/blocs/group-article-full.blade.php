<section class="flex flex-wrap " >
    <article class="md:w-2/3 pr-4 pl-4 ">
        @if ($bloc->title)
        <div class="title_blog">
            <h2 class=" bloc" name="{{$bloc->id}}" value="title" >
                {!! $bloc->title !!}
            </h2>
        </div>
        @endif
        <div class="bloc" name="{{$bloc->id}}" value="content">
            {!! $bloc->content !!}
        </div>
        @if ($bloc->image)
            <div class="text-center  bloc" name="{{$bloc->id}}" value="image" style="margin-bottom:2%;">
                <img src="{{ asset($bloc->image)}}" title="{{$bloc->title_img}}" alt="{{$bloc->alt_img}}" class="img-responsive w-1/2">
            </div>
        @endif
        <div class="bloc" name="{{$bloc->id}}" value="content_two">
            {!! $bloc->content_two !!}
        </div>
    </article>

    <aside class="md:w-1/3 pr-4 pl-4 pt-5 text-center">
        <div id="instabloc" class="m-auto p-2" style="width:90%;border:2px solid rgb(216, 211, 211);margin-top:5% !important;border-radius:10px">
            <h3 style="font-size:2.5em "class="uppercase font-bold">Instagram</h3>
            <ul id="instafeed" class="grid grid-cols-3 gap-5"></ul>
            <div class="mt-5"><a class="pink_nc" href="{{ config('myconfig.insta_owner_url') }}/">@naturelcoquin</a></div>
            <div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des images.... Veuillez reessayer plus tard.</div>
        </div>
        <div id="social_btn" class="m-auto" style="width:90%;border:2px solid rgb(216, 211, 211); margin-top:5% !important; border-radius:10px">
            <div style="margin-top:5%;">
                <h3 style="font-size:2.5em" class="uppercase font-bold">Suivez nous sur</h3>
            </div>
            <div class=" flex" >
                <a href="{{ config('myconfig.FB_owner_url') }}" target="_blank" style="margin:7%; display:block" title="facebook_{{config('myconfig.site_owner')}}" >
                    <img src="{{asset('/images/socialMedia_icon/facebook_noir.png')}}" alt="" width="150%">
                </a>
                <a href="{{ config('myconfig.utube_owner_url') }}" target="_blank" style="margin:7%; display:block;">
                    <img src="{{asset('/images/socialMedia_icon/youtube_noir.png')}}" alt="" width="150%" >
                </a>
                <a href="{{ config('myconfig.pinterest_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="pinterest_{{config('myconfig.site_owner')}}">
                    <img src="{{ asset('/images/socialMedia_icon/pinterest_noir.png')}}" alt="" width="150%" >
                </a>
                <a href="{{ config('myconfig.insta_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="instagram_{{config('myconfig.site_owner')}}">
                    <img src="{{asset('/images/socialMedia_icon/instagram_noir.png')}}" alt="" width="150%" >
                </a>
            </div>
            <div class="flex">
                <div style="margin:0 5% 0 8%">facebook</div>
                <div style="margin:0 5% 0 8%">youtube</div>
                <div style="margin:0 5% 0 8%">pinterest</div>
                <div style="margin:0 5% 0 8%">instagram</div>
            </div>
        </div>
    </aside>
</section>

@if ($next == "nonext")
    <div id="pagination"  style="width:63%;"
        class=" pl-4 pink_nc mx-12 pr-12 border border-t-2 border-pink-450" >
        <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
            <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}">Article précédent > </a>
        </div>
    </div>
@else
    @if ($prev == "noprev")
        <div id="pagination" style="width:63%;"
             class=" pl-4 pink_nc mx-12 pr-12 border-t-2 border-pink-450" >
            <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/') . '/page/'.$next}}">< Article suivant </a>
            </div>
        </div>
    @else
        <div id="pagination" style="width:63%;"
            class= "pl-4 pink_nc m-12 pr-12 border-t-2 border-pink-450" >
            <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/') .'/page/'.$next}}">< Article suivant </a>
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}"> Article précédent ></a>
            </div>
        </div>    
    @endif
@endif



<!-- Bloc derniers articles -->
<div class="container mx-auto">
    <h2 class="text-center md:text-left lg:text-left">Derniers Articles : </h2>

    @if ($page->count() > 0)
        @foreach ($page->take(3)->chunk(3) as $chunk)
            <div class="flex flex-wrap ">
                @foreach ($chunk as $item)
                    <div class="md:w-1/3 md:pr-6 pt-6 mx-auto">
                        <article class="home_thumbnail bg-transparent rounded shadow">
                            <div class="max-w-full overflow-hidden rounded-t">
                                <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                                    title="{{ config('myconfig.site_owner') }}_article_{{ $item->slug }}">
                                    <img src="{{ asset($item->thumbnail) }}" alt="thumbnail_{{ $item->slug }}"
                                        class="w-full" />
                                </a>
                            </div>
                            <h3 class="pl-3 pt-3">
                                <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                                    class="text-gray-900 text-decoration-none font-bold">
                                    {{ Str::limit($item->title, $limit = 43, $end = '...') }}
                                </a>
                            </h3>
                            <p class="pl-3 pb-3 text-gray-600 "><small>Rédigé le {{ $item->created_at->format('Y-m-d') }},
                                    par <span class="text-red-400">{{ $item->author }}</span></small></p>
                        </article>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p class="h1 mt-5 text-center">Il n'y a pas encore d'article à ce jour... <a
                href="{{ route('admin.index') }}">soyez le premier</a></p>
    @endif
</div>

<div class="md:w-full  text-center ">
    <a  href="{{ url('/page/article-index')}}" class="btn_calltoAction m-8">
          Voir plus  
    </a>
</div>


<script type="text/javascript" src="{{ asset('/plugins/instafeed.js-master/dist/instafeed.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/instafeed-small.js') }}"></script>






{{-- <section class="">
    <div class="container mx-auto sm:px-4 max-w-full">
        @if($bloc->title)
            <div class="flex flex-wrap ">
                <div class="">
                    <div class="">
                        <h2 class="text-underline  bloc" name="{{$bloc->id}}" value="title" style="font-weight: 200;text-transform: none; letter-spacing: 0.2em;">
                            {!! $bloc->title !!}
                        </h2>

                        <div class="mhc-heading-under-line">
                            <div class="mhc-heading-inside-line"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($bloc->content)
            <div class="flex flex-wrap ">
                @if($bloc->image)
                <div class="md:w-full pr-4 pl-4 bloc" name="{{$bloc->id}}" value="content">
                    {!! $bloc->content !!}
                </div>
                    <div class="md:w-1/4 pr-4 pl-4  bloc" name="{{$bloc->id}}" value="image">
                        <img src="{{asset($bloc->image)}}" title="{{$bloc->title}}" alt="{{$bloc->title}}" class="img-responsive">
                    </div>

                @else
                    <div class="md:w-full pr-4 pl-4 col-md-offset-1 bloc" name="{{$bloc->id}}" value="content">
                        {!! $bloc->content !!}
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>

@php
    $section_count = 0;
@endphp --}}