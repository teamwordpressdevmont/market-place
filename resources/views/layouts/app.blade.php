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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/ui/trumbowyg.min.css">
        
        <script src="{{ url('/js/tailwindcss.js') }}"></script>

       <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                primary: '#DB4A2B', 
                secondary: '#F59E0B', 
                }
            }
            }
        }
        </script>    

        <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    </head>
    <body>
    
        <!-- Trumbowyg CSS -->
       
    
        @include('partials.header')
    
        <div class="site_dasboard_content p-4 sm:ml-64 mt-14">
            <div class="p-4">
                @include('partials.sidebar')
                @yield('content')
            </div>
        </div>
        
        @include('partials.footer')


        <script src="{{ url('/js/jquery.min.js') }}"></script>
    
        <script src="{{ url('/js/flowbite.min.js') }}"></script>

        <!-- Trumbowyg JS -->
        <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/trumbowyg.min.js"></script>

        
        <!-- validation -->
        <script src="{{ url('/js/jquery.validate.min.js') }}"></script>
        
        <script src="{{ url('/js/custom-script.js') }}"></script>
    
    </body>
</html>
