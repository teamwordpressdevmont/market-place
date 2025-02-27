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
        <link rel="stylesheet" href="{{ url('/public/css/style.css') }}">
        {{-- <link rel="stylesheet" href="{{ url('/css/style.css') }}"> --}}

        
          <script src="{{ url('/public/js/jquery.min.js') }}"></script>
          {{-- <script src="{{ url('/js/jquery.min.js') }}"></script> --}}


    
        <script src="{{ url('/public/js/tailwind.js') }}"></script>
        {{-- <script src="{{ url('/js/tailwind.js') }}"></script> --}}

        
        <script src="{{ url('/public/js/custom-script.js') }}"></script>
        {{-- <script src="{{ url('/js/custom-script.js') }}"></script> --}}

    </head>
    <body class="bg-[url('{{ asset('storage/aiguy-images/Login.jpg') }}')] bg-no-repeat bg-cover bg-center h-auto w-full">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="pt-[50px]">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="w-full max-w-md mt-6 px-10 py-10 overflow-hidden box-border border border-[#002715] border-gradient rounded-2xl ">
                {{ $slot }}
            </div>
        </div>
        
      
    </body>
</html>