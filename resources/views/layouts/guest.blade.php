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

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

        
          <script src="{{ asset('/js/jquery.min.js') }}"></script>


    
        <script src="{{ asset('/js/tailwind.js') }}"></script>

        
        <script src="{{ asset('/js/custom-script.js') }}"></script>

    </head>
    <body class="bg-[url('{{ asset('storage/aiguy-images/Login.jpg') }}')] bg-no-repeat bg-cover bg-center h-auto w-full">
        <div class="min-h-screen flex items-center pt-6 sm:pt-0">
            <div class="p-10">
                <img src="{{ asset( '/images/admin-dash-thumb.png' ) }}" alt="">
            </div>
            <div>    
            <div class="pt-[50px]">
                    <img src="{{ asset( '/images/admin-dash-logo.png' ) }}" alt="">

                    <h2> Login to <br>
                    DINBYGGEMARKED</h2>

                    {{ $slot }}
            </div>

            </div>
        </div>
      
    </body>
</html>