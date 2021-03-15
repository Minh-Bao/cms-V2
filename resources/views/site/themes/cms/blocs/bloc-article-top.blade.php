<section class="flex flex-wrap " >
    <article class="md:w-2/3 pr-4 pl-4 pl-5 ">
        @if ($bloc->title)
        <div class="title_blog">
            <h2 style="font-size:1.3em " class=" bloc" name="{{$bloc->id}}" value="title" >
                {!! $bloc->title !!}
            </h2>
        </div>
        @endif
        <div class="bloc" name="{{$bloc->id}}" value="content">
            {!! $bloc->content !!}
        </div>
        @if ($bloc->image)
            <div class="text-center  bloc" name="{{$bloc->id}}" value="image" style="margin-bottom:2%;">
                <img src="{{url('')}}/{{ $bloc->image }}" title="{{$bloc->title_img}}" alt="{{$bloc->alt_img}}" class="img-responsive w-1/2">
            </div>
        @endif
        <div class="bloc" name="{{$bloc->id}}" value="content_two">
            {!! $bloc->content_two !!}
        </div>
    </article>
    <aside class="md:w-1/3 pr-4 pl-4 pt-5 text-center">
        {{-- <div id="best_product" style="width:90%;border:2px solid rgb(216, 211, 211);border-radius:15px;mar" class="m-auto ">
            <div style="margin-top:5%;">
                <h3 style="font-size:2.5em" class="uppercase font-bold mb-2">Produit du mois</h3>
                <div class="best_product_img ">
                    {{-- <img src="{{url('')}}/{{ $bloc->image }}" title="{{$bloc->title}}" alt="{{$bloc->title}}" class="img-responsive w-1/2"> --}}
                    {{-- Cette image est en guise de test:--}}
                {{--<img src="{{url('/')}}/images/lelo.png" alt="lelo-dildo">
                    <a href="" class="btn_calltoAction  "  style="display:block;width:35%; margin: 3% auto">Consulter</a>
                    
                </div>
            </div>
        </div>
        <div id="categ" style="width:90%;border:2px solid rgb(216, 211, 211);border-radius:15px;margin:5% auto" class="">
            <div>
                <h3 style="font-size:2.5em "class="uppercase font-bold">Catégories</h3>
            </div>
            <div class="flex justify-center ">
                <a href="" class="categ inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline  " style="background-color: rgb(255, 208, 0); color: white;" >Sextoy</a>
                <a href="" class="categ inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline " style="background-color: rgb(0, 174, 255); color: white;" >Fétichisme</a>
                <a href="" class="categ inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline " style="background-color: rgb(255, 136, 0); color: white;" >Bien être</a>
            </div>
            <div class="flex justify-center">
                <a href="" class="categ inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline " style="background-color: rgb(26, 160, 86); color: white;" >Bondage</a>
                <a href="" class="categ inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline " style="background-color: rgb(96, 19, 184); color: white;" >Art de vivre</a>
            </div>
        </div> --}}
        <div id="instabloc" class="m-auto p-2" style="width:90%;border:2px solid rgb(216, 211, 211);margin-top:5% !important;border-radius:10px">
            <h3 style="font-size:2.5em "class="uppercase font-bold">Instagram</h3>
            <div id="instafeed" class="flex flex-wrap  "></div>
            <div class="mt-5"><a class="pink_nc" href="{{ config('myconfig.insta_owner_url') }}/">@naturelcoquin</a></div>
            <div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des images.... Veuillez reessayer plus tard.</div>
        </div>
        <div id="social_btn" class="m-auto" style="width:90%;border:2px solid rgb(216, 211, 211); margin-top:5% !important; border-radius:10px">
            <div style="margin-top:5%;">
                <h3 style="font-size:2.5em" class="uppercase font-bold">Suivez nous sur</h3>
            </div>
            <div class=" flex" >
                <a href="{{ config('myconfig.FB_owner_url') }}" target="_blank" style="margin:7%; display:block" title="facebook_{{config('myconfig.site_owner')}}" >
                    <img src="{{url('/')}}/images/socialMedia_icon/facebook_noir.png" alt="" width="150%">
                </a>
                <a href="{{ config('myconfig.utube_owner_url') }}" target="_blank" style="margin:7%; display:block;">
                    <img src="{{url('/')}}/images/socialMedia_icon/youtube_noir.png" alt="" width="150%" >
                </a>
                <a href="{{ config('myconfig.pinterest_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="pinterest_{{config('myconfig.site_owner')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/pinterest_noir.png" alt="" width="150%" >
                </a>
                <a href="{{ config('myconfig.insta_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="instagram_{{config('myconfig.site_owner')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/instagram_noir.png" alt="" width="150%" >
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


{{-- @if ($next == "nonext")
    <div id="pagination" class="md:w-2/3 pr-4 pl-4 pink_nc" style="border-top: 3px solid #ce4963;width:63%;margin-left:3%;">
        <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
            <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/'.$prev}}">Article précédent > </a>
        </div>
    </div>
@else
    <div id="pagination" class="md:w-2/3 pr-4 pl-4 pink_nc" style="border-top: 3px solid #ce4963;width:63%;margin-left:3%;">
        <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
            <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/'.$next}}">< Article suivant </a>
            <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/'.$prev}}"> Article précédent ></a>
        </div>
    </div>
@endif

 --}}

<!-- Bloc derniers articles -->

{{-- <h2 class="title_home">Derniers Articles : </h2>

@if ($page->count() > 0)
    <div class="flex flex-wrap  p-12" >
        @foreach($page->take(3) as $item)
            <div class="md:w-1/3 pr-4 pl-4">
                <article class="home_thumbnail bg-white rounded shadow">
                    <div class="max-w-full overflow-hidden rounded-t">
                        <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}">
                            <img src="{{ url('/').'/'.$item->thumbnail }}" alt="thumbnail_nc" class="w-full"/>
                        </a>
                    </div>
                    <h2 class="h5 pl-3 pt-3"><a href="" class="text-gray-900 text-decoration-none font-bold">{{ $item->title }}</a></h2>
                    <p class="pl-3 pb-3 text-gray-700 "><small>Rédigé le {{$item->created_at->format('Y-m-d') }},  par {{$item->author}}</small></p>
                </article>
            </div>
        @endforeach
    </div>
@else
    <p class="h1 mt-5 text-center">Il n'y a pas encore d'article à ce jour... <a href="{{ route('admin.index') }}">soyez le premier</a></p>
@endif
<div class="md:w-full pr-4 pl-4 text-center">
    <a href="{{url('/').'/page/article-index'}}" class="btn_calltoAction" role="button" aria-disabled="true" width="15%" height="125%">Voir plus</a>
</div>
 --}}


<script type="text/javascript" src="{{url('/').'/plugins/instafeed.js-master/dist/instafeed.min.js'}}"></script>

<script type="text/javascript">
    var feed = new Instafeed({
        accessToken: '{{ config('myconfig.insta_access_token') }}',
        limit: 6,
        after: function(){
                var container = document.getElementById('instafeed');
                for (var i = 0; i < container.children.length; i++) {
                    var parent = container.children;
                for(var j = 0; j<parent.length; j++){
                    var child_img = parent[j].children;
                    child_img[0].setAttribute("class", "img-thumbnail shadow  bg-white rounded img_insta_social");
                    parent[j].setAttribute('target', '_blank');
                    parent[j].setAttribute('class', 'col-md-4');
               }
            }
        },
        error: function(){
            document.getElementById('insta_error_msg').style.display = "block";
        }
    });
    feed.run();
</script>






{{-- <section class="">
    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
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
                        <img src="{{url('')}}/{{ $bloc->image }}" title="{{$bloc->title}}" alt="{{$bloc->title}}" class="img-responsive">
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