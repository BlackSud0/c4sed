<!DOCTYPE html>
<html :class="{ 'theme-dark': dark,'dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link type="text/css" href="{{ asset('assets/css/oldiziToast.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    
    @livewireScripts

</head>

  <body>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      @include('layouts.sidebar')  
      <div class="flex flex-col flex-1 w-full">
            @include('layouts.header')
            <main class="h-full overflow-y-auto">
              <div class="container px-10 mx-auto">
                @yield('content')
              </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script> -->
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/oldiziToast.js') }}"></script>
    <!-- <script type='Popper' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script> -->
    
    <!-- Production -->
    <script  type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('assets/js/tippy.min.js') }}"></script>
    <!-- <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2" defer></script>
    <script type="text/javascript" src="https://unpkg.com/tippy.js@6" defer></script> -->
    
    <script type="text/javascript" src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <!-- <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
    
    <!-- Alpinejs -->
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> -->
    <script  type="text/javascript" src="{{ asset('assets/js/alpine.min.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/focus-trap.js') }}"></script>

  </body>
</html>
