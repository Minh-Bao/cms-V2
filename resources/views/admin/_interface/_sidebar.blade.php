    <!-- Left Sidebar -->

            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div class="lg:hidden"
                x-show="open"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0 "
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="fixed inset-0 flex z-40 ">
                    <div class="fixed inset-0" aria-hidden="true"
                        x-show="open"
                        x-transition:enter="transition ease-in-out duration-900 transform"
                        x-transition:enter-start="-translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in-out duration-900 transform"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="-translate-x-full">
                        <div class="absolute inset-0 bg-gray-400 opacity-85"></div>
                    </div>
                    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                        <div class="absolute top-0 right-0 -mr-12 pt-2">
                            <button
                            @click="open = !open"
                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-shrink-0 flex items-center px-4">
                            <a  href="{{route('site.homepage')}}"><img class="h-8 w-auto" src="{{asset('/images/logo-black.png')}}" rel="" alt="logo-naturelcoquin" /></a>
                        </div>
                        
                        <div class="mt-5 flex-1 h-0 overflow-y-auto">
                            <nav class="px-2">
                                <div class="space-y-1">
                                    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
                                    <a href="#"
                                        class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md"
                                        aria-current="page">
                                        <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                                        <!-- Heroicon name: outline/home -->
                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Home
                                    </a>
    
                                    <a href="#"
                                        class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/view-list -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                        </svg>
                                        My tasks
                                    </a>
    
                                    <a href="#"
                                        class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                        <!-- Heroicon name: outline/clock -->
                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6 "
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Recent
                                    </a>
                                </div>
                                <div class="mt-8">
                                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                        id="teams-headline">
                                        Teams
                                    </h3>
                                    <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Engineering
                                            </span>
                                        </a>
    
                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Human Resources
                                            </span>
                                        </a>
    
                                        <a href="#"
                                            class="group flex items-center px-3 py-2 text-base leading-5 font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                            <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full"
                                                aria-hidden="true"></span>
                                            <span class="truncate">
                                                Customer Success
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>
    
            <!-- Static sidebar for desktop -->
            <div class="hidden lg:flex lg:flex-shrink-0"
                >
                <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
                    <div class="flex items-center flex-shrink-0 px-6">
                        <a  href="{{route('site.homepage')}}">
                            <img class="h-18 w-auto" 
                                src="{{asset('/images/logo-black.png')}}" rel="" 
                                alt="logo {{config('myconfig.site_owner')}}"/>
                        </a>
                    </div>
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <div class="h-0 flex-1 flex flex-col overflow-y-auto"
                    >   
                        <!-- User account dropdown -->
                        <div class="px-3 mt-6 relative inline-block text-left"
                            x-data=" { open: false }">
                            <div>
                                <button type="button"
                                    @click="open = !open"
                                    class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-pink-300"
                                    id="options-menu" aria-expanded="false" aria-haspopup="true">
                                    <span class="flex w-full justify-between items-center">
                                        <span class="flex min-w-0 items-center justify-between space-x-3">
                                            <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0"
                                                src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixqx=BweQ1V4IZi&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                                alt="">
                                            <span class="flex-1 min-w-0">
                                                <span class="text-gray-900 text-sm font-medium truncate">
                                                    {{Auth::user()->name}} 
                                                    {{Auth::user()->firstname}}</span>
                                                <span class="text-gray-500 text-sm truncate">@-{{Auth::user()->name}}</span>
                                            </span>
                                        </span>
                                        <!-- Heroicon name: solid/selector -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
    
                            <div 
                                x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg opacity-90 bg-gray-50 ring-1 ring-black ring-opacity-5 divide-y divide-gray-900 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="py-1" role="none">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">View profile</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Settings</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Notifications</a>
                                </div>
                                <div class="py-1" role="none">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Get desktop app</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">Support</a>
                                </div>
                                
                                <div class="py-1" role="none">
                                    <a href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">
                                    <!-- Heroicon name: outline/clock -->
                                    Logout
                                </a>
                                </div>
                            </div> 
                        </div>
                        <!-- Sidebar Search -->
                        <div class="px-3 mt-5">
                            <label for="search" class="sr-only">Search</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                    aria-hidden="true">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="mr-3 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="search"
                                    class="focus:ring-pink-500 focus:border-pink-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Search">
                            </div>
                        </div>
                        <!-- Navigation -->
                        <nav class="px-3 mt-6">
                            <div class="space-y-1">
                                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
                                <a href="{{ route('admin.index') }}"
                                    class=" text-gray-900 group flex items-center hover:bg-purple-100 px-2 py-2 text-sm font-medium rounded-md
                                    @if($active == "dashboard") bg-gray-200 @endif">
                                    <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                                    <!-- Heroicon name: outline/home -->
                                    <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Tableau de bord
                                </a>
                                
                                <a href="{{route('websitepage.index')}}"
                                    class="text-gray-700 hover:text-gray-900 hover:bg-purple-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md
                                    @if($active == "articles") bg-gray-200  @endif">
                                    <!-- Heroicon name: outline/view-list -->
                                    <svg class="text-gray-500 group-hover:text-gray-500 mr-3 h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    Articles
                                </a>

                                <a href="{{route('slider.index')}}"
                                    class="text-gray-700 hover:text-gray-900 hover:bg-purple-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md
                                    @if($active == "sliders") bg-gray-200 @endif">
                                    <!-- Heroicon name: outline/view-list -->
                                    <svg class="text-gray-500 group-hover:text-gray-500 mr-3 h-6 w-6" 
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>                                
                                    Sliders
                                </a>
    
                                <a href="#"
                                    class="text-gray-700 hover:text-gray-900 hover:bg-purple-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="text-gray-500 group-hover:text-gray-500 mr-3 h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Recent
                                </a>
                               
                                <a href="#"
                                    class="text-gray-700 hover:text-gray-900 hover:bg-purple-100 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="text-gray-500 group-hover:text-gray-500 mr-3 h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Catalogue
                                </a>

                                {{-- <a href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/clock -->
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" 
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </a> --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>


                            </div>
                            <div class="mt-8">
                                <!-- Secondary navigation -->
                                <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                                    id="teams-headline">
                                    Teams
                                </h3>
                                <div class="mt-1 space-y-1" role="group" aria-labelledby="teams-headline">
                                    <a href="#"
                                        class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                            Engineering
                                        </span>
                                    </a>
    
                                    <a href="#"
                                        class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                            Human Resources
                                        </span>
                                    </a>
    
                                    <a href="#"
                                        class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                                        <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                                        <span class="truncate">
                                            Customer Success
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>


   


