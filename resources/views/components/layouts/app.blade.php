<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/css/output.css', 'resources/js/app.js'])
    <!-- Styles -->
</head>

<body class="overflow-x-hidden">

    {{ $slot }}

    @livewireScripts
</body>

</html>
