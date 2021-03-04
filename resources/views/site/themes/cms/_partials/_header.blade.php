    <header>
        <nav class="relative flex flex-wrap items-center content-between py-3 px-4  text-black bg-gray-100 top-0" aria-label="Fifth navbar example">
            <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
                <div class="logo">
                    <a class="site-logo  site-logo--image mb-5" href="{{route('site.homepage')}}" title="{{config('myconfig.name_app')}}" rel="home">
                        <img class="pb-5" src="{{url('/')}}/images/logo-black.png" rel="" alt="logo-naturelcoquin" width="7%"/>
                        {{-- <img class="site-logo-img--dark" src="images/logo-black.png" rel="logo" alt="" /> --}}
                    </a>                  
                </div>
                <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="px-5 py-1 border border-gray-600 rounded"></span>
                </button>

                <div class="hidden flex-grow items-center" id="navbarsExample05">
                    <ul class="flex flex-wrap list-reset pl-0 mb-0 me-auto mb-2 lg:mb-0">
                        {{-- <li class="">
                            <a class="inline-block py-2 px-4 no-underline" href="#">Catégorie</a>
                        </li> --}}
                        <li class="">
                            <a class="inline-block py-2 px-4 no-underline" href="https://www.naturelcoquin.com">Visitez la boutique</a>
                        </li>
                        <li class="">
                            <a class="inline-block py-2 px-4 no-underline" href="{{url('/').'/page/article-index'}}">Articles</a>
                        </li>
                        <li class="">
                            <a class="inline-block py-2 px-4 no-underline" href="{{url('/').'/page/contact'}}">Contact</a>
                        </li>                       
                    </ul>
                   {{--  <form>
                        <input class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" type="text" placeholder="Search" aria-label="Search" style="border-radius: 10px">
                    </form> --}}
                </div>
            </div>
        </nav>
    </header>

        {{-- <nav class="relative flex flex-wrap items-center content-between py-3 px-4  text-white top-0 site-header">
            <div class="container mx-auto sm:px-4">
                <a class="site-logo  site-logo--image" href="#" title="cms" rel="home">
                    <img class="" src="images/logo-white.png" rel="" alt="" />
                    <img class="site-logo-img--dark" src="images/logo-black.png" rel="logo" alt="" />
                </a>
                <button class="py-1 px-2 text-md leading-normal bg-transparent border border-transparent rounded" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="px-5 py-1 border border-gray-600 rounded"></span>
                </button>
                <div class="hidden flex-grow items-center" id="navbarCollapse">
                    <ul class="flex flex-wrap list-reset pl-0 mb-0 mr-auto">
                        @if ($sitepage->model == 'onepage')
                            @foreach ($menus as $menu)
                                <li class=" active">
                                    <a class="inline-block py-2 px-4 no-underline" href="#bloc-{{ $menu->id }}">{{ $menu->title }} 
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            @endforeach
                            @else
                            @foreach ($menus as $menu)
                                <li class=" active">
                                    <a class="inline-block py-2 px-4 no-underline" href="{{ $menu->slug }}">{{ $menu->title }} 
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </nav> --}}



