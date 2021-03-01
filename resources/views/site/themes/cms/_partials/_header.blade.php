    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <div class="logo">
                    <a class="site-logo  site-logo--image mb-5" href="{{route('site.homepage')}}" title="{{config('myconfig.name_app')}}" rel="home">
                        <img class="pb-5" src="{{url('/')}}/images/logo-black.png" rel="" alt="logo-naturelcoquin" width="7%"/>
                        {{-- <img class="site-logo-img--dark" src="images/logo-black.png" rel="logo" alt="" /> --}}
                    </a>                  
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Catégorie</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.naturelcoquin.com">Visitez la boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/').'/page/article-index'}}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/').'/page/contact'}}">Contact</a>
                        </li>                       
                    </ul>
                   {{--  <form>
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" style="border-radius: 10px">
                    </form> --}}
                </div>
            </div>
        </nav>
    </header>

        {{-- <nav class="navbar navbar-expand-md navbar-dark fixed-top site-header">
            <div class="container">
                <a class="site-logo  site-logo--image" href="#" title="cms" rel="home">
                    <img class="" src="images/logo-white.png" rel="" alt="" />
                    <img class="site-logo-img--dark" src="images/logo-black.png" rel="logo" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        @if ($sitepage->model == 'onepage')
                            @foreach ($menus as $menu)
                                <li class="nav-item active">
                                    <a class="nav-link" href="#bloc-{{ $menu->id }}">{{ $menu->title }} 
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            @endforeach
                            @else
                            @foreach ($menus as $menu)
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ $menu->slug }}">{{ $menu->title }} 
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </nav> --}}



