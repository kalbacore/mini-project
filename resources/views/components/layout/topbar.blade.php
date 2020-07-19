<nav class="fixed top-0 shadow-md w-screen">
    <div class="px-4 mx-auto">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex px-2 py-1 self-center text-sm font-medium text-gray-800 antialiased rounded-md focus:outline-none hover:bg-blue-100 hover:text-blue-500 focus:bg-blue-100">
                    <div class="justify-center text-xl font-semibold text-center">
                        Mini Project
                    </div>
                </div>
                <div class="hidden md:block">
                @auth
                <div class="hidden md:block">
                    <div class="flex items-center ml-3 ">
                        <a href="{{ route('home') }}"
                            class="px-3 py-1 ml-2 self-center text-sm font-medium text-gray-800 antialiased rounded-md focus:outline-none hover:bg-blue-100 hover:text-blue-500 focus:bg-blue-100">
                            Home
                        </a>
                        <a href="{{ route('home') }}"
                            class="px-3 py-1 ml-2 self-center text-sm font-medium text-gray-800 antialiased rounded-md focus:outline-none hover:bg-blue-100 hover:text-blue-500 focus:bg-blue-100">
                            Messages
                        </a>
                    </div>
                @endauth

                @guest
                    <div class="flex items-center ml-3 ">
                        <a href="{{ route('login') }}"
                            class="px-3 py-1 ml-2 self-center text-sm font-medium text-gray-800 antialiased rounded-md focus:outline-none hover:bg-blue-100 hover:text-blue-500 focus:bg-blue-100">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-3 py-1 ml-2 self-center text-sm font-medium text-gray-800 antialiased rounded-md focus:outline-none hover:bg-blue-100 hover:text-blue-500 focus:bg-blue-100">
                            Register
                        </a>
                    </div>
                @endguest
                </div>
            </div>
            <div x-data="{ open: false }">
                <div class="flex -mr-2 md:hidden">
                    <button @click="open = true"
                        class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                        <svg class="block w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div x-show="open" @click.away="open = false"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
                    <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                        aria-labelledby="options-menu">
                        @auth
                            <div class="py-1">
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                    Home
                                </a>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('messages') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                    Messages
                                </a>
                            </div>
                            <div class="border-t border-gray-100"></div>
                            <div class="py-1">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        @endauth

                        @guest
                            <div class="py-1">
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Login
                                </a>
                            </div>
                            <div class="py-1">
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
                                    role="menuitem">
                                    Register
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
