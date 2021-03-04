<!-- ============ Header file ================ -->

<!-- Overlay For Sidebars -->

<div class="overlay" id="overlay" style="margin-top:50%"></div>

<!-- #END# Overlay For Sidebars -->



 <!-- Modal Dialogs ====================================================================================================================== -->

    <!-- Large Size -->

    <div class="modal opacity-0" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header"></div>

                <div class="modal-body">
                    <div class="preloader">
                        <div class="spinner-layer pl-blue">
                            <div class="circle-clipper left">
                                <div class="circle">                                    
                                </div>
                            </div>

                            <div class="circle-clipper right">
                                <div class="circle">
                                </div>
                            </div>
                         </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline font-normal text-blue-700 bg-transparent waves-effect" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>





  <!-- Top Bar -->


  <nav class="relative flex flex-wrap items-center content-between py-3 px-4 top_navbar_admin">
    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
        

        <div class="site-logo text-center">
            <a  href="{{route('site.homepage')}}"><img class="pb-5" src="{{url('/')}}/images/logo-black.png" rel="" alt="logo-naturelcoquin" width="40%"/></a>
        </div>

        <div class="navbar-header pull-left">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
        </div>
 

        <div class="hidden flex-grow items-center" id="navbar-collapse">
            <ul class="flex flex-wrap list-none pl-0 mb-0 flex flex-wrap list-reset pl-0 mb-0 navbar-right pl-5">
            </ul>
        </div>
    </div>
</nav>

<!-- #Top Bar -->











