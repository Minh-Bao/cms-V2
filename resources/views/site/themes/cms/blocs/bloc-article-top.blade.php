<section class="flex flex-wrap " >
    <article class="md:w-2/3 pr-4 pl-4 ">
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



<script type="text/javascript" src="{{ asset('/plugins/instafeed.js-master/dist/instafeed.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/instafeed-small.js') }}"></script>


