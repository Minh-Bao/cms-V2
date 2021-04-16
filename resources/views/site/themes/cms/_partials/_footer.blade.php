<!-- FOOTER -->

<footer class="footer-container"  x-data="{ 'showModal': false }"
    @keydown.escape="showModal = false" x-cloak>
    <div class="flex flex-wrap bg-black">
        <div class="md:w-1/4 pr-4 pl-4 ml-5 mb-5">
            <div>
                <img src="{{asset('/images/logo-white.png')}}" alt="" width="50%" class="mt-5"><br>
            </div>
            <div class="m-2 ml-2 flex flex-wrap">
                <a href="{{ config('myconfig.FB_owner_url') }}" target="_blank"
                    title="facebook_{{ config('myconfig.site_owner') }}">
                    <img src="{{ asset('/images/socialMedia_icon/facebook_blanc.png') }}" alt="icon_facebook" >
                </a>
                <a href="{{ config('myconfig.utube_owner_url') }}" target="_blank"
                    title="youtube_{{ config('myconfig.site_owner') }}">
                    <img src="{{ asset('/images/socialMedia_icon/youtube_blanc.png') }}" alt="icon_youtube" >
                </a>
                <a href="{{ config('myconfig.pinterest_owner_url') }}" target="_blank"
                    title="pinterest_{{ config('myconfig.site_owner') }}">
                    <img src="{{ asset('/images/socialMedia_icon/pinterest_blanc.png') }}" alt="icon_pinterest">
                </a>
                <a href="{{ config('myconfig.insta_owner_url') }}" target="_blank"
                    title="instagram_{{ config('myconfig.site_owner') }}">
                    <img src="{{ asset('/images/socialMedia_icon/instagram_blanc.png') }}" alt="icon_instagram">
                </a>
            </div>
        </div>
        <div class="md:w-1/4 pr-4 pl-4" style="margin-top:10%">
            <a href="{{ config('myconfig.site_developper_url') }}">© {{ config('myconfig.site_developper') }}
                {{ date('Y') }} -</a>
            <button type="button"
                class="bg-transparent  hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"
                @click="showModal = true">Mentions Légales</button>
        </div>

        <div class="copyright-text text-left w-1/4 pr-4 pl-4" style="margin-top:3%; margin-left:5%;">
            <h3 class="uppertext  text-gray-50"
                style="font-size: 2.7rem !important;font-weight: bolder !important;border-bottom: 3px solid #ce4963;">
                Newsletter
            </h3>
            <p class="text-sm m-2">Saisissez votre adresse pour vous abonner a notre newsletter...</p>
            <div class="relative flex items-stretch w-full mb-3">
                <input type="text"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    placeholder="adresse mail" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-gray-600 border-gray-600 hover:bg-gray-600 hover:text-white bg-white"
                        type="button" id="button-addon2"
                        style="height:85%; top:15%;background-color: #ce4963;color:white;">Envoyer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="w-full bg-transparent"  x-show="showModal"
        :class="{ 'relative z-10 flex items-center justify-center': showModal }">
        <!--Dialog-->
        <div class="absolute bg-gray-50 w-11/12 md:max-w-md mx-auto rounded shadow-lg py-4 text-left px-6" style="bottom:45px;" 
            x-show="showModal"
            @click.away="showModal = false" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90">

            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <h2 class="text-2xl font-bold">{!! App\Models\Site\Websitepage::where('id', 2)->first()->title !!}</h2>
                <div class="cursor-pointer z-50" >
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- content -->
            {!! App\Models\Site\Websitepage::where('id', 2)->first()->content !!}
        </div>
        <!--/Dialog -->
    </div>
    <!-- /Overlay -->
</footer>
