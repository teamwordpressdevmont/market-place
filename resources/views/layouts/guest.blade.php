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


        <link rel="stylesheet" href="{{ asset('/public/css/trumbowyg.min.css') }}">

       <script src="{{ asset('/public/js/tailwind.js') }}"></script>

       <script src="{{ asset('/public/js/tailwindcss.js') }}"></script>


       <link rel="stylesheet" href="{{ asset('/public/css/flowbite.min.css') }}">
       <link rel="stylesheet" href="{{ asset('/public/css/swiper-bundle.min.css') }}">
       <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">

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

        <style>

            body
            {
                font-family: Sora, sans-serif;
            }

            .site_admin_login {
                max-width: 390px;
            }

            .site_admin_login input[type="text"],
            .site_admin_login input[type="password"],
            .site_admin_login input[type="number"],
            .site_admin_login input[type="email"]
            {
                border-radius:25px;
                box-shadow:none;
                padding: 8px 20px;
            }

            .focus\:ring-indigo-500:focus
            {
                border-color:rgb(107 114 128);
            }

            .site_admin_login button
            {
                width: 100%;
                justify-content: center;
                margin-left: 0px;
                background-color: rgb(255 144 78);
                border-radius: 25px;
                padding: 12px 10px;
                box-shadow:none;
                border:none;
                cursor: pointer;
            }

            .site_admin_login button:hover
            {
                background-color: #DB4A2B;
            }

            .site_admin_login .text-indigo-600
            {
                color: oklch(0.76 0.16 49.37);
            }

            .focus\:ring-indigo-500:focus
            {
                box-shadow:none
            }

            .site_oruseemail {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }

            .site_oruseemail::before
            {
                content: "";
                width: 100px;
                display: block;
                height: 1px;
                background: #ababab;
            }

            .site_oruseemail::after
            {
                content: "";
                width: 100px;
                display: block;
                height: 1px;
                background: #ababab;
            }

        </style>



    </head>
    <body class="bg-[url('{{ asset('/public/images/dash-shadow.svg') }}')] bg-no-repeat bg-cover bg-center h-auto w-full bg-[#F4F4F4]" >
        <div class="min-h-screen flex items-center">
            <div class="flex-1">
                <img src="{{ asset( '/public/images/admin-dash-thumb.png' ) }}" class="h-screen p-5" alt="">
            </div>
            <div class="w-[50%]">
                <div class="px-20">
                        <div class="max-w-[390px]">

                            <img src="{{ asset( '/public/images/admin-dash-logo.png' ) }}" alt="" class="mb-20 w-35">
                            <h2 class="font-bold text-4xl mb-8"> Login To <br> DINBYGGEMARKED</h2>
                            <!-- <button type="button" class="text-[#ABABAB] w-full bg-[#ffffff] hover:bg-[#222222] focus:ring-4 focus:outline-none focus:ring-[transparent]/50 font-medium rounded-4xl text-sm px-5 py-2.5 text-center inline-flex items-center border border-gray-300 justify-center hover:text-[#ffffff] mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" class="me-4">
                                    <path d="M18.1712 8.36794H17.5V8.33335H9.99996V11.6667H14.7095C14.0225 13.6071 12.1762 15 9.99996 15C7.23871 15 4.99996 12.7613 4.99996 10C4.99996 7.23877 7.23871 5.00002 9.99996 5.00002C11.2745 5.00002 12.4341 5.48085 13.317 6.26627L15.6741 3.90919C14.1858 2.5221 12.195 1.66669 9.99996 1.66669C5.39788 1.66669 1.66663 5.39794 1.66663 10C1.66663 14.6021 5.39788 18.3334 9.99996 18.3334C14.602 18.3334 18.3333 14.6021 18.3333 10C18.3333 9.44127 18.2758 8.89585 18.1712 8.36794Z" fill="#FBC02D"/>
                                    <path d="M2.62744 6.12127L5.36536 8.12919C6.10619 6.29502 7.90036 5.00002 9.99994 5.00002C11.2745 5.00002 12.4341 5.48085 13.317 6.26627L15.6741 3.90919C14.1858 2.5221 12.1949 1.66669 9.99994 1.66669C6.79911 1.66669 4.02327 3.47377 2.62744 6.12127Z" fill="#E53935"/>
                                    <path d="M10 18.3333C12.1525 18.3333 14.1084 17.5096 15.5871 16.17L13.008 13.9875C12.1713 14.6212 11.1313 15 10 15C7.83255 15 5.99213 13.6179 5.2988 11.6891L2.5813 13.7829C3.96047 16.4816 6.7613 18.3333 10 18.3333Z" fill="#4CAF50"/>
                                    <path d="M18.1712 8.3679L18.1646 8.33331H17.5H10V11.6666H14.7096C14.3796 12.5987 13.78 13.4025 13.0067 13.9879L13.0079 13.9871L15.5871 16.1696C15.4046 16.3354 18.3333 14.1666 18.3333 9.99998C18.3333 9.44123 18.2758 8.89581 18.1712 8.3679Z" fill="#1565C0"/>
                                </svg>
                                Sign in with Google
                            </button>

                           <div class="site_oruseemail mt-5 mb-4"> or use email </div> -->

                        </div>
                        <div class="site_admin_login">
                            {{ $slot }}
                            <!-- <div class="mt-5 text-center">
                                <a href="#" class="text-[#ababab] hover:text-[#222222]">Forget Password ?</a>
                            </div> -->
                        </div>


                </div>

            </div>
        </div>


        <script src="{{ asset('/public/js/jquery.min.js') }}"></script>

        <script src="{{ asset('/public/js/flowbite.min.js') }}"></script>

        <!-- Trumbowyg JS -->
        <script src="{{ asset('/public/js/trumbowyg.min.js') }}"></script>

        <!-- validation -->
        <script src="{{ asset('/public/js/jquery.validate.min.js') }}"></script>

        <script src="{{ asset('/public/js/swiper-bundle.min.js') }}"></script>

        <script src="{{ asset('/public/js/custom-script.js') }}"></script>

    </body>
</html>
