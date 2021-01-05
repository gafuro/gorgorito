<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gorgorito') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Ico -->
        <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/icon">

        <!-- Styles -->
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <section class="px-8 py-4">
                <header class="container mx-auto flex items-center justify-between">
                    <h1>
                        <img src="/images/logo.png" alt="{{ config('app.name', 'Logo') }}">
                    </h1>
                    <div>
                        <ul class="flex flex-row items-center">
                            <li class="mx-3">
                                <a href="/notifications" class="flex items-center justify-between hover:text-blue-700">
                                    Notifications
                                    @php ($notificationCount = auth()->user()->unreadNotifications()->count())
                                    <i class="fa fa-bell mr-1 w-3 font-weight-bold text-red-600 relative">
                                        @if( boolval($notificationCount) )
                                            <span
                                                class="
                                                absolute
                                                bottom-0
                                                top-1
                                                left-3
                                                text-white
                                                border-2 border-red-500
                                                rounded-full flex items-center justify-center font-mono
                                                bg-black font-bold"
                                            style="height: 1.25rem; width: 1.25rem; " >
                                                {{ $notificationCount }}
                                            </span>
                                        @endif
                                    </i>

                                </a>
                            </li>
                            <li class="mx-3">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="text-lg hover:text-blue-700" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </header>
            </section>

            {{ $slot }}
        </div>
        <script src="http://unpkg.com/turbolinks"></script>
    </body>
</html>
