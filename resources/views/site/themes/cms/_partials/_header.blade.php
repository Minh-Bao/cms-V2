    <header class="bg-white-450" >
        <nav class="flex items-center justify-between flex-wrap p-4 w-full " x-data="{ isOpen: false }"
            @keydown.escape="isOpen = false" :class="{ 'shadow-lg ' : isOpen , 'bg-primary' : !isOpen}">
            <!--Logo etc-->
            <div class="flex items-center flex-shrink-0 text-white ml-6">
                
                <a href="{{ url('/') }}">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
                </a>
                <a href="{{url('/')}}">
                    <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
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

