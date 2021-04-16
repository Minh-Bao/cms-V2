<div id="social_btn" class="md:w-1/2 pr-4 pl-4 m-auto text-center flex" style="flex-direction:column;width:90%;border:2px solid rgb(216, 211, 211); margin-top:5% !important; border-radius:10px">
    <div style="margin-top:5%;" class="text-center">
        <h3 style="font-size:2.5em" class="uppercase font-bold">Suivez nous sur</h3>
    </div>
    <div class="logo flex " style="width:40%;align-self:center;margin-right:6%;">
        <a href="{{ config('myconfig.FB_owner_url') }}" target="_blank" style="margin:7%; display:block" title="facebook_{{config('myconfig.site_owner')}}" >
            <img src="{{asset('/images/socialMedia_icon/facebook_noir.png')}}" alt="icon_facebook"  width="200%">
        </a>
        <a href="{{ config('myconfig.utube_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="youtube_{{config('myconfig.site_owner')}}">
            <img src="{{asset('/images/socialMedia_icon/youtube_noir.png')}}" alt="icon_youtube" width="200%" >
        </a>
        <a href="{{ config('myconfig.pinterest_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="pinterest_{{config('myconfig.site_owner')}}">
            <img src="{{ asset('/images/socialMedia_icon/pinterest_noir.png')}}" alt="icon_pinterest" width="200%" >
        </a>
        <a href="{{ config('myconfig.insta_owner_url') }}" target="_blank" style="margin:7%; display:block;" title="instagram_{{config('myconfig.site_owner')}}">
            <img src="{{ asset('/images/socialMedia_icon/instagram_noir.png')}}" alt="icon_instagram" width="200%" >
        </a>
    </div>
    <div class="flex" style="align-self:center;justify-content:center">
        <div style="margin:0 7% 0 15%">facebook</div>
        <div style="margin:0 7% 0 15%">youtube</div>
        <div style="margin:0 7% 0 15%">pinterest</div>
        <div style="margin:0 7% 0 15%">instagram</div>
    </div>
</div>