



  <!-- FOOTER -->

<footer class="footer-container" style="height: 300px;">
    <div class="row">
        <div class="col-md-3 ml-5 mb-5">
            <div>
                <img src="http://localhost:8000/images/logo-white.png" alt="" width="50%" class="mt-5"><br>
            </div>
            <div class="m-2 ml-2">
                <a href="https://www.facebook.com/Naturel-Coquin-117150962289464"  title="facebook_{{env('SITE_OWNER')}}" >
                    <img src="{{url('/')}}/images/socialMedia_icon/facebook_blanc.png" alt="icon_facebook" width="10%">
                </a>
                <a href="https://www.youtube.com/channel/UC6VRWOkZCLJ9E-DSBblapjQ" target="_blank" title="youtube_{{env('SITE_OWNER')}}" >
                    <img src="{{url('/')}}/images/socialMedia_icon/youtube_blanc.png" alt="icon_youtube" width="10%" >
                </a>
                <a href="https://www.pinterest.fr/NaturelCoquin/" target="_blank" title="pinterest_{{env('SITE_OWNER')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/pinterest_blanc.png" alt="icon_pinterest" width="10%" >
                </a>
                <a href="https://www.instagram.com/naturelcoquin" target="_blank" title="instagram_{{env('SITE_OWNER')}}">
                    <img src="{{url('/')}}/images/socialMedia_icon/instagram_blanc.png" alt="icon_instagram" width="10%" >
                </a>
            </div>
        </div>
        <div class="col-md-3" style="margin-top:10%">
            <a href="{{env('SITE_DEVELOPPER_URL')}}">© {{env('SITE_DEVELOPPER')}} {{date('Y')}} -</a>  
            <a href="javascript:void(0);" data-toggle="modal" data-target="#mentions">Mentions légales</a>
        </div>

        <div class="copyright-text text-left col-md-3" style="margin-top:3%; margin-left:5%;">
            <h3 class="uppertext " style="font-size: 2.7rem !important;font-weight: bolder !important;border-bottom: 3px solid #ce4963;">
                Newsletter
            </h3>
            <p>Saisissez votre adresse pour vous abonner a notre newsletter...</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="adresse mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="height:85%; top:15%;background-color: #ce4963;color:white;">Envoyer</button>
                </div>
            </div>         
            </div>
        </div>
</footer>

  <!-- Modal -->

<div id="mentions" class="modal fade" role="dialog">
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