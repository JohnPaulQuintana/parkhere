<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- font awesome --}}
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-462d1fe84b879d730fe2180b0e0354e0.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-neutral-900 h-full overflow-hidden">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 overflow-hidden">
        <!-- ========== HEADER ========== -->
        <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-neutral-800 dark:border-neutral-700">
            <nav class="relative max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Global">
              <div class="flex items-center justify-between">
                <a class="flex-none text-xl text-violet-500 font-semibold dark:text-white" href="#" aria-label="Brand"><i class="fa-sharp fa-solid fa-square-parking text-violet-500 tracking-wider"></i>arkHere</a>
                <div class="sm:hidden">
                  <button type="button" class="hs-collapse-toggle size-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    <svg class="hs-collapse-open:block flex-shrink-0 hidden size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                  </button>
                </div>
              </div>
              <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end sm:ps-7">
                  
                  <a class="flex items-center gap-x-2 font-medium text-violet-500 hover:text-blue-600 sm:border-s sm:border-gray-300 py-2 sm:py-0 sm:ms-4 sm:my-6 sm:ps-6 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500" href="{{ route('register') }}">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    Register
                  </a>
                </div>
              </div>
            </nav>
          </header>
        <!-- ========== END HEADER ========== -->
        <!-- Hero -->
        <div class="relative overflow-hidden h-screen">
            <!-- Gradients -->
            <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
                <div
                    class="bg-gradient-to-r from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900">
                </div>
                <div
                    class="bg-gradient-to-tl from-blue-50 via-blue-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem] dark:from-indigo-900/70 dark:via-indigo-900/70 dark:to-blue-900/70">
                </div>
            </div>
            <!-- End Gradients -->

            <div class="relative z-10">
                <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
                    <div class="max-w-2xl text-center mx-auto">
                        
                        <p
                            class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent dark:from-blue-400 dark:to-violet-400">
                            Parkhere: A new parking site 2024
                        </p>

                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            {{-- <i class="fa-solid fa-circle-parking text-7xl"></i> --}}
                            <h1
                                class="flex justify-center items-center tracking-wider font-semibold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-neutral-200">
                                <i class="fa-sharp fa-solid fa-square-parking text-violet-500"></i>arkHere
                            </h1>
                            <p
                            class="inline-block text-xl font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent dark:from-blue-400 dark:to-violet-400">
                                Real-Time Parking Availability and Reservation System
                            </p>
                            
                        </div>
                        <!-- End Title -->

                        <div class="mt-5 max-w-3xl">
                            <p class="text-lg text-gray-600 dark:text-neutral-400">Easily find and reserve parking with our Real-Time Parking Availability and Reservation System. Get up-to-the-minute updates on available spots and secure your space in advance. Enjoy a hassle-free parking experience every time.</p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 gap-3 flex justify-center">
                            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-violet-500 text-white hover:bg-violet-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="{{ route('login') }}">
                                    <i class="fa-solid fa-user"></i>
                                    Get started
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </a>
                           
                        </div>
                        <!-- End Buttons -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->


    </div>
</body>

</html>
