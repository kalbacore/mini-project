<div>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg"
                            alt="Workflow logo">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline">
                            @auth
                            <a href="{{ route('home') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('home*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-700' }} focus:outline-none focus:text-white focus:bg-gray-700">Home
                                @if(auth()->user()->events())
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ auth()->user()->events() }}
                                </span>
                                @endif
                            </a>
                            <a href="{{ route('messages') }}"
                                class="ml-4 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('messages*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-700' }} focus:outline-none focus:text-white focus:bg-gray-700">Messages</a>
                            <a href="{{ route('users') }}"
                                class="ml-4 px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('users*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-700' }} focus:outline-none focus:text-white focus:bg-gray-700">Users</a>
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="ml-4 flex items-center md:ml-6">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline">
                            <div class="flex items-center ml-3 ">
                                @auth
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                                    role="menuitem">
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                                @endauth
                                @guest
                                <a href="{{ route('login') }}"
                                    class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                    Login
                                </a>
                                <a href="{{ route('register') }}"
                                    class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                                    Register
                                </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
