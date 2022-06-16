<div>
    <nav class="z-10 h-24 bg-white shadow-md" x-data="{open:false}">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <!-- Mobile menu button-->
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">

                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                    {{-- Logotipo --}}
                    <div>
                        <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-16 w-auto" src="{{ asset('img/logo.jpg') }}" alt="Cetmar 31">
                            <img class="hidden lg:block h-12 w-auto" src="{{ asset('img/logo.jpg') }}" alt="Cetmar31">
                        </a>
                    </div>
                    {{-- Menú lg --}}
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex justify-between items-center">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                            <a href="#" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

                            <a href="#" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                            <a href="#" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                            <a href="#" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inscripciones</a>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{open:false}">
                            <div>
                                <button @click="open = true" type="button" class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-600 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"   alt="">
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div x-show="open" x-on:click.away="open=false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tu perfil</a>

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2"
                                       @click.prevent="$root.submit();">
                                        Cerrar sesión</a>
                                </form>
                            </div>
                        </div>
                    </div>

                @else
                    <div>
                        <a href="{{ route('login') }}" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:bg-blue-600 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>
                    </div>
                @endauth


            </div>

        </div>

        <!-- Mobile menu-->
        <div x-show="open" @click.away="open = false" class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>
</div>
