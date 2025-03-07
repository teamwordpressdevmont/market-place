<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/ui/trumbowyg.min.css">

        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        
       <script src="{{ asset('/js/tailwind.js') }}"></script>


       <script src="{{ asset('/js/tailwindcss.js') }}"></script>

       <script>
        tailwind.config = {
            theme: {
            extend: {
                colors: {
                primary: '#DB4A2B',
                secondary: '#FF904E',
                mat: '#222222'
                },
                fontFamily: {
                    sora: ['Sora', 'sans-serif'],
                }
            }
            }
        }
        </script>
        <link rel="stylesheet" href="{{ asset('/css/flowbite.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    </head>
    <body class="bg-[#F4F4F4] font-sora">

        <!-- Trumbowyg CSS -->


       
        <!-- @include('partials.header') -->
        <div class="site_dasboard_content sm:ml-64">
            <div class="p-5">
                @include('partials.sidebar')

                <div class="sm:pl-7">
                    
                    @include('partials.header')
                    @yield('content')
                </div>
            </div>
        </div>

        @include('partials.footer')


        <script src="{{ asset('/js/jquery.min.js') }}"></script>

        

    
        <script src="{{ asset('/js/flowbite.min.js') }}"></script>


        <!-- Trumbowyg JS -->
        <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/trumbowyg.min.js"></script>


        <!-- validation -->
        <script src="{{ asset('/js/jquery.validate.min.js') }}"></script>

        <script src="{{ asset('/js/swiper-bundle.min.js') }}"></script>

        
        <script src="{{ asset('/js/custom-script.js') }}"></script>


    
    </body>
</html>
