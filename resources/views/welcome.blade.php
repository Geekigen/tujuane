<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-center bg-cover bg-no-repeat bg-fixed" style="background-image: url({{asset('bgimages/lb1.png')}});">

  <div class="flex items-center justify-center h-full">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
      <h1 class="text-3xl font-bold text-center mb-2">Welcome to Tujuane Dating site</h1>
      @guest
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <a href="/login" class="block  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Login
          </a>
        </div>
        <div class="md:w-1/2 px-3">
          <a href="/register" class="block  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Register
          </a>
        </div>
      </div>
      @endguest
      
      @auth
      <div class="-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <div class="relative inline-block text-left">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
              Welcome, {{ auth()->user()->name }}
            </button>
            <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
              <div class="py-1 rounded-md bg-white shadow-xs">
                <x-jet-dropdown align="right" width="48">
                  <x-slot name="trigger">
                      @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                          <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                              Manage profile
                          </button>
                      @else
                          <span class="inline-flex rounded-md">
                              <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                  {{ Auth::user()->name }}

                                  <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                              </button>
                          </span>
                      @endif
                  </x-slot>

                  <x-slot name="content">
                      <!-- Account Management -->
                      <div class="block px-4 py-2 text-xs text-gray-400">
                          {{ __('Manage Account') }}
                      </div>

                      <x-jet-dropdown-link href="{{ route('profile.show') }}">
                          {{ __('Profile') }}
                      </x-jet-dropdown-link>

                      @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                          <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                              {{ __('API Tokens') }}
                          </x-jet-dropdown-link>
                      @endif

                      <div class="border-t border-gray-100"></div>

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}" x-data>
                          @csrf

                          <x-jet-dropdown-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                              {{ __('Log Out') }}
                          </x-jet-dropdown-link>
                      </form>
                  </x-slot>
              </x-jet-dropdown>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      @endauth
      
    </div>

</div>
</body>
</html>
