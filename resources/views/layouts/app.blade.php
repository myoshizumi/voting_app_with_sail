<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <title>{{ $title ?? 'Voting_App' }}</title>

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
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                        <div class="flex items-center space-x-4">
                            @admin
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    <a href="/users" class="ml-4 text-sm text-gray-700 dark:text-gray-500">Manage employee</a>
                                @endif
                            @endadmin

                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="/thanks-messeges" class="mx-2 text-sm text-gray-700 dark:text-gray-500">Thanks Messages</a>
                            <a href="/ranking-management" class="mx-2 text-sm text-gray-700 dark:text-gray-500">ranking page</a>

                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                {{ __('Log out') }}
                            </a>
                            </form>
                            <livewire:comment-notifications />
                        </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @endauth
                    </div>
                @endif
                
                @auth
                    <a href="#">
                        <img src="{{ auth()->user()->getAvatar() }}" alt="avatar" class="w-10 h-10 rounded-full">
                    </a>
                @endauth
            </div>
        </header>

        {{ $slot }}
        
        @if (session('success_message'))
            <x-notification-success
                :redirect="true"
                message-to-display="{{ session('success_message') }}"
            />
        @endif
        
        @if (session('error_message'))
            <x-notification-success
                type="error"
                :redirect="true"
                message-to-display="{{ session('error_message') }}"
            />
        @endif
        
        @livewireScripts
    </body>
</html>
