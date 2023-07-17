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
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
<h3 class="flex items-center justify-center text-3xl font-bold text-center mb-2">Your potential matches</h3>
          <div class="flex">
      <div class="w-1/5 bg-white p-4">
        <h2 class="text-lg font-bold mb-2">Menu</h2>
        <ul class="list-none">
          <li class="mb-2"><a class="text-gray-800 hover:text-blue-500" href="#">Home</a></li>
          <li class="mb-2"><a class="text-gray-800 hover:text-blue-500" href="#">Explore</a></li>
          <li class="mb-2"><a class="text-gray-800 hover:text-blue-500" href="#">Notifications</a></li>
          <li class="mb-2"><a class="text-gray-800 hover:text-blue-500" href="#">Messages</a></li>
        </ul>
      </div>
      <div class="w-3/5 bg-white p-4">
        <div id="feed">
          <!-- Feed content goes here -->
        </div>
      </div>
      <div class="w-1/5 bg-white p-4">
        <h2 class="text-lg font-bold mb-2">Trends</h2>
        <!-- Trends content goes here -->
      </div>
    </div>    <!-- Page Heading -->
           
        </div>
  
  </body>
</html>
