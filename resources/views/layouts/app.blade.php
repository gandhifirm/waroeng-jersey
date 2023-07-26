<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="turbolinks-cache-control" content="no-cache">
        <meta name="turbolinks-visit-control" content="reload">

        <title>
            @yield('page-title') | JerseyPedia
        </title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @livewireStyles
    </head>

    <body>
        <div id="app">
            @livewire('components.navbar')

            <main class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>

        <footer class="container pb-4 mt-5">
            <hr>
            <p class="mb-0 text-center">JERSEYPEDIA &copy;{{ now()->year }}</p>
        </footer>

        @livewireScripts

        <script type="module">
            import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
        </script>

        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
    </body>
</html>
