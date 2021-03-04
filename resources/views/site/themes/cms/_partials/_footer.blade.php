



  <!-- FOOTER -->

<footer class="footer-container" style="height: 300px;">
    <div class="flex flex-wrap ">
        <div class="md:w-1/4 pr-4 pl-4 ml-5 mb-5">
            <div>
                <img src="http://localhost:8000/images/logo-white.png" alt="" width="50%" class="mt-5"><br>
            </div>
            <div class="m-2 ml-2">
                <a href="{{ config('myconfig.FB_owner_url') }}" target="_blank"  title="facebook_{{config('myconfig.site_owner')}}" >
                    <img src="{{url('/')}}/images/socialMedia_icon/facebook_blanc.png" alt="icon_facebook" width="10%">
                </a>
                <a href="{{ config('myconfig.utube_owner_url') }}" target="_blank" title="youtube_{{config('myconfig.site_owner')}}" >
                    <img src="{{url('/')}}/images/socialMedia_icon/youtube_blanc.png" alt="icon_youtube" width="10%" >
                </a>
                <a href="{{ config('myconfig.pinterest_owner_url') }}" target="_blank" title="pinterest_{{config('myconfig.site_owner')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/pinterest_blanc.png" alt="icon_pinterest" width="10%" >
                </a>
                <a href="{{ config('myconfig.insta_owner_url') }}" target="_blank" title="instagram_{{config('myconfig.site_owner')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/instagram_blanc.png" alt="icon_instagram" width="10%" >
                </a>
            </div>
        </div>
        <div class="md:w-1/4 pr-4 pl-4" style="margin-top:10%">
            <a href="{{config('myconfig.site_developper_url')}}">© {{config('myconfig.site_developper')}} {{date('Y')}} -</a>  
            <a href="javascript:void(0);" data-toggle="modal" data-target="#mentions">Mentions légales</a>
        </div>

        <div class="copyright-text text-left md:w-1/4 pr-4 pl-4" style="margin-top:3%; margin-left:5%;">
            <h3 class="uppertext " style="font-size: 2.7rem !important;font-weight: bolder !important;border-bottom: 3px solid #ce4963;">
                Newsletter
            </h3>
            <p>Saisissez votre adresse pour vous abonner a notre newsletter...</p>
            <div class="relative flex items-stretch w-full mb-3">
                <input type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="adresse mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white hover:bg-gray-700" type="button" id="button-addon2" style="height:85%; top:15%;background-color: #ce4963;color:white;">Envoyer</button>
                </div>
            </div>         
            </div>
        </div>
</footer>

  <!-- Modal -->

<div id="mentions" class="modal opacity-0" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{!! App\Models\Site\Websitepage::where('id',2)->first()->title !!}</h2>
            </div>
            <div class="modal-body">
                {!! App\Models\Site\Websitepage::where('id',2)->first()->content !!}
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>