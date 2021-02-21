<section>
    <!-- ============ Sidebar file ================ -->

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image"></div>
            <div class="info-container"></div>
        </div>

        <!-- #User Info -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li id="dashboard" class="{{{ (Request::is('admin/dashboard') ? 'active' : '') }}} {{{ (Request::is('admin/dashboard/*') ? 'active' : '') }}}">
                    <a href="{{ route('admin.index') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Tableau de bord</span>
                    </a>
                </li>

                <li id="user_list" class="{{{ (Request::is('admin/websitepage') ? 'active' : '') }}} {{{ (Request::is('admin/websitepage/*') ? 'active' : '') }}}">
                    <a href="{{route('websitepage.index')}}">
                        <i class="material-icons">description</i>
                        <span>Pages</span>
                    </a>
                </li>

                <li id="user_add" class="{{{ (Request::is('admin/site/slider') ? 'active' : '') }}} {{{ (Request::is('admin/site/slider/*') ? 'active' : '') }}} {{{ (Request::is('admin/site/sliderimage/*') ? 'active' : '') }}}">
                    <a href="{{route('slider.index')}}">
                      <i class="material-icons">panorama</i>
                      <span>Sliders</span>
                    </a>
                </li>

                <li id="user_add" class="{{{ (Request::is('admin/site/slider') ? 'active' : '') }}} {{{ (Request::is('admin/site/slider/*') ? 'active' : '') }}} {{{ (Request::is('admin/site/sliderimage/*') ? 'active' : '') }}}">
                    <a href="{{ route('logout') }}">
                        <i class="material-icons">logout</i>
                      <span>Déconnexion</span>
                    </a>
                </li>

            </ul>
        </div>

      <!-- #Menu -->

      <!-- Footer -->
        <div class="legal">
            <div class="copyright"> 
                &copy; {{date("Y")}} 
                <a href="{{env('SITE_DEVELOPPER_URL')}}">Agence{{env('SITE_DEVELOPPER')}}</a>.
            </div>
        </div>
      <!-- #Footer -->
    </aside>
  <!-- #END# Left Sidebar -->

  <!-- ============ Right SIdebar ================ -->
</section>