<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'C4SED') }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @livewireStyles

    <link rel="shortcut icon" href="{{ asset('logo.svg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/apps.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    
    @livewireScripts

</head>

  <body>

    @yield('content')

  </body>
</html>
