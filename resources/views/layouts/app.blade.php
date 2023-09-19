<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="/"><img src="{{ asset('img/logo.svg') }}" alt="logo"></a>
            <div class="flex items-center mtt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Log out') }}
                            </a>
                            </form>

                            <div x-data="{ isOpen: false }" class="relative">
                                <button @click="isOpen = !isOpen">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-400">
                                    <path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z" />
                                    <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="absolute rounded-full bg-red text-white text-xs w-6 h-6 flex justify-center items-center -top-1 -right-1 border-2">8</div>
                                </button>
                                <ul class="absolute w-76 md:w-96 text-left text-gray-700 text-sm bg-white shadow-xl rounded-xl max-h-128 overflow-y-auto z-10 -right-1
                                "
                                    x-show.transition.origin.top="isOpen"
                                    x-cloak
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                >
                                    <li>
                                        <a href="#"
                                        @click.prevent="isOpen = false" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000?d=mp"                                              alt="avatar" class="w-10 h-10 rounded-full"
                                            >                                               
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Me</span>
                                                comment on
                                                <span class="font-semibold">This is my idea</span>
                                            </div>:
                                            <span class="line-clamp-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis reiciendis ipsa eligendi quisquam expedita ad ipsam doloremque temporibus qui. Aliquam!</span>
                                            <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        @click.prevent="isOpen = false" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000?d=mp"                                              alt="avatar" class="w-10 h-10 rounded-full"
                                            >                                               
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Me</span>
                                                comment on
                                                <span class="font-semibold">This is my idea</span>
                                            </div>:
                                            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis reiciendis ipsa eligendi quisquam expedita ad ipsam doloremque temporibus qui. Aliquam!</span>
                                            <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        @click.prevent="isOpen = false" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000?d=mp"                                              alt="avatar" class="w-10 h-10 rounded-full"
                                            >                                               
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Me</span>
                                                comment on
                                                <span class="font-semibold">This is my idea</span>
                                            </div>:
                                            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis reiciendis ipsa eligendi quisquam expedita ad ipsam doloremque temporibus qui. Aliquam!</span>
                                            <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        @click.prevent="isOpen = false" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                                            <img src="https://www.gravatar.com/avatar/000000000000000000000?d=mp"                                              alt="avatar" class="w-10 h-10 rounded-full"
                                            >                                               
                                        <div class="ml-4">
                                            <div>
                                                <span class="font-semibold">Me</span>
                                                comment on
                                                <span class="font-semibold">This is my idea</span>
                                            </div>:
                                            <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis reiciendis ipsa eligendi quisquam expedita ad ipsam doloremque temporibus qui. Aliquam!</span>
                                            <div class="text-xs text-gray-500 mt-2">1 hour ago</div>
                                        </div>
                                        </a>
                                    </li>
                                    <li class="border-t border-gray-300 text-center">
                                        <button class="w-full block font-semibold hover:bg-gray-100 transition duration-150 ease-in px-5 py-4">
                                            Mark all as read
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <a href="#">
                    <img src="https://www.gravatar.com/avatar/000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row" style="max-width:1000px">
            <div class="w-70 mx-auto md:mr-5 md:mx-0">
                <div class="bg-white md:sticky md:top-8 border-2 border-blue rounded-xl mt-16"
                    style="
                          border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;
                            background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;
                            background-clip: content-box, border-box;
                    ">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look over!
                            @else
                                Please login to create an idea.
                            @endauth
                    
                        </p>
                    </div>

                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                            <a href="{{ route('login') }}" class="inline-block justify-center w-1/2 h-11 text-xs text-white bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Login                           
                            </a>
                            <a href="{{ route('register') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4">
                                Sign Up
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

            <div class="w-full md:w-175 px-2 md:px-0">
                <livewire:status-filters />
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>

        @if (session('success_message'))
            <x-notification-success
                :redirect="true"
                message-to-display="{{ session('success_message') }}"
            />
        @endif
        
        @livewireScripts
    </body>
</html>
