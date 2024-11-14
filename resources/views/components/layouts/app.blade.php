<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <title>{{ $title ?? 'Buy Or Die' }}</title>
        @vite('resources/css/app.css')
        @livewireStyles


    </head>
    <body>
        @livewire('partials.navbar')
        <main>
        {{ $slot }}
        </main>
        @livewire('partials.footer')



        @livewireScripts

    </body>
</html>
