    <header class="bg-white-450" >
        <nav class="flex items-center justify-between flex-wrap p-4 w-full " x-data="{ isOpen: false }"
            @keydown.escape="isOpen = false" :class="{ 'shadow-lg ' : isOpen , 'bg-primary' : !isOpen}">
            <!--Logo etc-->
            <div class="flex items-center flex-shrink-0 text-white ml-6">
                <a href="{{ url('/') }}">
                    <img class="hidden lg:block w-3/12" src="{{ url('/images/logo-black.png') }}" rel="" alt="logo-naturelcoquin">
                </a>
                <a href="{{url('/')}}">
                    <img class="block lg:hidden h-8 w-auto" src="{{ url('/images/logo-black.png') }}" rel="" alt="logo-naturelcoquin">
                </a>
            </div>

            <!--Toggle button (hidden on large screens)-->
            <button @click="isOpen = !isOpen" type="button"
                class="block lg:hidden px-2 text-black hover:text-gray-400 focus:outline-none focus:text-gray-400"
                :class="{ 'transition transform-180': isOpen }">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path x-show="isOpen" fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                    <path x-show="!isOpen" fill-rule="evenodd"
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                </svg>
            </button>

            <!--Menu-->
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
                :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }" @click.away="isOpen = false"
                x-show.transition="true">
                <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-black no-underline  hover:text-gray-400 hover:text-underline"
                            href="{{ config('myconfig.site_owner_url') }}" @click="isOpen = false">Visitez la boutique
                        </a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
                            href="{{ url('/page/article-index') }}" @click="isOpen = false">Article
                        </a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
                            href="{{ url('/page/contact') }}" @click="isOpen = false">Contact
                        </a>
                    </li>

                    @if (Auth::check())
                    <li class="mr-3">
                        <a class="inline-block text-black no-underline hover:text-gray-400 hover:text-underline py-2 px-4"
                            href="{{ url('/admin') }}" @click="isOpen = false">Admin
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>



    {{-- <div class=" bg-white">
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{url('/')}}">
                                <img class="block lg:hidden h-8 w-auto" src="{{ url('/images/logo-black.png') }}" rel="" alt="logo-naturelcoquin">
                            </a>
                            <a href="{{url('/')}}">
                                <img class="hidden lg:block h-8 w-auto" src="{{ url('/images/logo-black.png') }}" rel="" alt="logo-naturelcoquin">
                           
                            </a>
                            </div>
                            <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                                <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                <a href="{{ config('myconfig.site_owner_url') }}"
                                    class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Visitez la boutique
                                </a>
                                <a href="{{ url('/page/article-index')}}"
                                    class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Article
                                </a>
                                <a href="{{ url('/page/contact')}}"
                                    class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                    Conctact
                                </a>
                            </div>
                        </div>

                        <div class="-mr-2 flex items-center sm:hidden">
                            <!-- Mobile menu button -->
                            <button type="button" id="btn-open" onclick="btn()"
                                class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <!-- Heroicon name: outline/menu Menu open: "hidden", Menu closed: "block"  -->
                                <svg class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" id='open' 
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <!--   Heroicon name: outline/x   Menu open: "block", Menu closed: "hidden"    -->
                                <svg class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" id="close" 
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="" id="mobile-menu" >
                    <div class="pt-2 pb-3 space-y-1">
                        <a href="{{ config('myconfig.site_owner_url') }}"
                            class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            Visitez la boutique
                        </a>

                        <a href="{{ url('/page/article-index')}}"
                            class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            Articles
                        </a>

                        <a href="{{ url('/page/contact')}}"
                            class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                            Contact
                        </a>
                    </div>
                </div>
            </nav>
        </div> --}}
