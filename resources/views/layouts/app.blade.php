<!DOCTYPE html>
<html :class="{ 'theme-dark': dark,'dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'C4SED') }}</title>

    @livewireStyles

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/apps.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <link type="text/css" href="{{ asset('assets/css/oldiziToast.css') }}" rel="stylesheet">
    
    @livewireScripts

</head>

  <body>
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
      @include('layouts.sidebar')  
      <div class="flex flex-col flex-1 w-full">
            @include('layouts.header')
            <main class="h-full overflow-y-auto">
              <div class="container px-10 mx-auto grid">
                @yield('content')
              </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/oldiziToast.js') }}"></script>
    <script type='Popper' src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
    <!-- Production -->
    <!-- <script type="text/javascript" src="https://unpkg.com/@popperjs/core@2" defer></script>
    <script type="text/javascript" src="https://unpkg.com/tippy.js@6" defer></script> -->
    
    <!-- Alpinejs -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script  type="text/javascript" src="{{ asset('assets/js/init-alpine.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/focus-trap.js') }}"></script>

  </body>
</html>
