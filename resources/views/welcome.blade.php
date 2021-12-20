<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>C4SED | Open source steel elements design platform</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="{{ asset('logo.svg') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
        <!-- Styles -->
        <style>
            ::-moz-selection{background-color:#3A87F2;color:#fff}::selection{background-color:#3A87F2;color:#fff}::-webkit-scrollbar{width:5px;height:7px}::-webkit-scrollbar-button{width:0;height:0}::-webkit-scrollbar-thumb{background:#525965;border:0 none #fff;border-radius:0}::-webkit-scrollbar-thumb:hover{background:#525965}::-webkit-scrollbar-thumb:active{background:#525965}::-webkit-scrollbar-track{background:0 0;border:0 none #fff;border-radius:50px}::-webkit-scrollbar-track:hover{background:0 0}::-webkit-scrollbar-track:active{background:0 0}::-webkit-scrollbar-corner{background:0 0}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <header class="text-gray-600 body-font bg-white shadow-sm">
            <div class="container mx-auto flex flex-wrap px-5 py-3 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <img class="w-12 rounded-full" src="{{asset('logo.svg')}}">
                <span class="ml-2 text-3xl font-extrabold text-blue-500">C4SED</span>
                </a>
                @if (Route::has('login'))
                    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                        @auth
                            <a href="{{ url('/home') }}" class="mr-5 text-gray-700 hover:text-gray-900 underline">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="mr-5 text-gray-700 hover:text-gray-900 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center text-white bg-blue-500 border-0 py-2 px-4 focus:outline-none hover:bg-blue-600 rounded text-base mt-4 md:mt-0">Register
                                    <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg> -->
                                    <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-12 py-16 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Open source steel elements
                    <br class="hidden lg:inline-block">design platform
                </h1>
                <p class="mb-8 leading-relaxed">C4SED (Civil 4 steel elements design) is a simplified web-based platform, providing analysis and design of steel elements. With its help, as an engineer, you can shortcut your design process, so you can focus on planning great buildings. The degree of integration, simplicity of input, and speed of design make C4SED the ideal platform for common steel elements calculations and reports.</p>
                <div class="flex justify-center">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                            <svg class="w-5 h-5 mr-2 mt-1 fill-current" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg">
                                <g fill-rule="nonzero">
                                    <path d="M56.4 46.2a12.6 12.6 0 10-8.9-3.7 12.5 12.5 0 008.9 3.7zm-3.3-15.9a4.6 4.6 0 116.5 6.5 4.6 4.6 0 01-6.5-6.5z"></path>
                                    <path d="M.6 41.4a6 6 0 004.5 4.8l10.8 2.5-3.6 2.5a4 4 0 00-.5 6.1l1.5 1.5h-.1A21.7 21.7 0 008 62.7C1 69.6 0 81 2.7 85.4c.216.4.485.77.8 1.1h.1l.8.6a12 12 0 006.4 1.5A24.1 24.1 0 0027.3 82a21.6 21.6 0 003.7-5l.2-.4 1.6 1.6a4 4 0 002.8 1.2h.4a4 4 0 002.9-1.7l2.5-3.6 2.5 10.8a6 6 0 004.8 4.6h1.1a6 6 0 005-2.7l5.5-8.5a31.2 31.2 0 005-18.9v-.2a59.5 59.5 0 006.2-5.4C88.7 36.6 92 12.1 88 4.8a5.8 5.8 0 00-1.1-1.5l-.2-.2a5.5 5.5 0 00-1.2-.9c-7.3-4.4-32.2-.7-49.3 16.3a59.5 59.5 0 00-5.4 6.2h-.2a31.2 31.2 0 00-18.9 5l-8.5 5.6a6 6 0 00-2.6 6.1zm23 32.6a13.4 13.4 0 01-1.9 2.4 16 16 0 01-12.2 4.2 16 16 0 014.2-12.2 13.5 13.5 0 012.6-2l4.3-.3 3.3 3.3-.3 4.6zM35 69.2L20.8 55l2.3-1.6 13.5 13.4-1.6 2.4zM53.6 74l-3 4.5-2.4-10.1a67.7 67.7 0 008.9-4 23.1 23.1 0 01-3.5 9.6zM81.1 9c.7 1.7.8 6.5-.7 12.6a29 29 0 00-11.8-12c6.1-1.4 10.8-1.4 12.5-.7V9zM41.9 24.2a53.6 53.6 0 0113.9-9.9c10.932.372 19.646 9.263 19.8 20.2a54 54 0 01-9.8 13.6 56.5 56.5 0 01-22.9 13.7L28.2 47.1a56.6 56.6 0 0113.7-22.9zM16 36.4a23.1 23.1 0 019.6-3.5 67.8 67.8 0 00-4 8.9l-10.1-2.4 4.5-3z"></path>
                                </g>
                            </svg>
                            Get started
                        </a>
                    @endif
                    <a href="https://github.com/BlackSud0/c4sed" class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg" target="_blank">
                        <svg class="w-5 h-5 mr-2 mt-1" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                        </svg>
                        Github
                    </a>
                </div>
                </div>
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                    <img class="object-cover object-center rounded" alt="hero" src="{{asset('Construction-pana.svg')}}">
                </div>
            </div>
        </section>
        <footer class="text-gray-600 body-font">
            <div class="container p-5 mx-auto flex items-center sm:flex-row flex-col">
                <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img class="w-10 rounded-full" src="{{asset('logo.svg')}}">
                <span class="ml-2 font-extrabold text-xl text-blue-500">C4SED</span>
                </a>
                <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© <script>document.write(new Date().getFullYear())</script> University Of Kassala —
                <a href="https://twitter.com/blacksud0" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@blacksudo</a>
                </p>
                <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a href="https://github.com/BlackSud0/c4sed" class="text-gray-500 focus:outline-none hover:text-gray-700" target="_blank">
                    <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
                    </svg>
                </a>
                <a href="mailto:c4sed.sd@gmail.com" class="text-gray-500 focus:outline-none hover:text-gray-700" target="_blank">
                    <svg class="w-5 h-5 ml-4" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </a>
                <a href="#" class="text-gray-500 focus:outline-none hover:text-gray-700" target="_blank">
                    <svg class="w-5 h-5 ml-4" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                </a>
                </span>
            </div>
        </footer>
    </body>
</html>
