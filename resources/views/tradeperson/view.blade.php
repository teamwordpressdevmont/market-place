@extends('layouts.app')
@section('content')

<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    body {
      background: #000;
      color: #000;
    }

    .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 300px;
      width: 100%;
    }

    .mySwiper2 .swiper-slide img,
    .mySwiper2 .swiper-slide
    {
      border-radius:20px;
    }

    .thumbmySwiper {
      height: 100px;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .thumbmySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .thumbmySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .thumbmySwiper .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius:10px
    }

    .thumbmySwiper .swiper-slide {
      border-radius:10px
    }
    .swiper-button-prev:after
    {

      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      font-size: 0;
      width: 20px;
      height: 20px;
      background-image:url({{ asset('public/images/circle-arrow-left-round.svg') }});

    }

    .swiper-button-next:after
    {
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      font-size: 0;
      width: 20px;
      height: 20px;
      background-image:url({{ asset('public/images/circle-arrow-right-round.svg') }})
    }

</style>

<div class="mt-5 bgShadow">
   <div class="pt-10 pb-8">
        <div class="grid lg:grid-cols-2 grid-cols-1 items-start mb-8 lg:gap-0 gap-4">
            <h1 class="font-semibold xl:text-4xl lg:text-2xl text-xl mb-2 text-mat">Pending Approval</h1>
            <div class="flex lg:justify-end flex-col sm:flex-row">
                    <!-- Reject Button -->
                    <a href="javascript:void(0);" 
                       class="tradeperson-approval-btn text-white {{ $tradeperson->user->user_approved ? 'bg-mat' : 'bg-red-500' }} hover:bg-primary focus:outline-none rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2 transition w-fit"
                       data-id="{{ $tradeperson->user->id }}"
                       data-status="0">
                        Reject
                    </a>
            
                    <!-- Accept Button -->
                    <a href="javascript:void(0);" 
                       class="tradeperson-approval-btn text-white {{ $tradeperson->user->user_approved ? 'bg-green-500' : 'bg-secondary' }} hover:bg-primary focus:outline-none rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2 transition w-fit"
                       data-id="{{ $tradeperson->user->id }}"
                       data-status="1">
                        Accept
                    </a>
                
            </div>

        </div>
        <div class="">

            <div class="">
                <img src="{{ asset( 'public/images/job-listing.png' ) }}" class="sm:h-[300px] h-[200px] rounded-lg w-full object-cover">
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-5">
                <div class="lg:col-span-1 p-">
                    <img src="{{ $tradeperson->user->avatar }}"
                        class="rounded-full 2xl:w-60 2xl:h-60 sm:w-50 sm:h-50 w-[150px] h-[150px] object-cover xl:mx-auto sm:-mt-25 -mt-20">
                </div>
                <div class="lg:col-span-2 xl:p-4">
                    <h4 class="font-semibold lg:text-2xl mt-4 mb-2 flex gap-2">
                    {{ $tradeperson->first_name }}
                    {{ $tradeperson->last_name }}<svg xmlns="http://www.w3.org/2000/svg"
                        width="28" height="27" viewBox="0 0 28 27" fill="none">
                        <path
                            d="M26.9605 10.5332C26.733 10.1764 26.543 9.7972 26.3934 9.40155C26.263 8.99499 26.1814 8.5744 26.1504 8.14863C26.1327 7.11832 25.834 6.1123 25.2864 5.23864C24.6168 4.44641 23.7442 3.8504 22.7618 3.51419C22.3609 3.35979 21.9765 3.16572 21.6143 2.93489C21.3001 2.66501 21.0109 2.36742 20.7502 2.04572C20.13 1.20541 19.289 0.552647 18.3202 0.159612C17.3392 -0.0716989 16.3143 -0.0391568 15.35 0.253918C14.4887 0.455904 13.5923 0.455904 12.731 0.253918C11.7499 -0.0489306 10.705 -0.0815148 9.70685 0.159612C8.72815 0.548358 7.87733 1.20147 7.24976 2.04572C6.98055 2.36862 6.6823 2.66625 6.35873 2.93489C5.99654 3.16572 5.61211 3.35979 5.21118 3.51419C4.22388 3.84824 3.34642 4.4444 2.67309 5.23864C2.13976 6.1164 1.85513 7.12214 1.84957 8.14863C1.81858 8.5744 1.737 8.99499 1.60656 9.40155C1.45532 9.78791 1.26535 10.158 1.03954 10.5063C0.430839 11.3722 0.0713312 12.3879 0 13.4432C0.0761579 14.4892 0.435447 15.495 1.03954 16.3532C1.27055 16.6984 1.46082 17.0691 1.60656 17.4579C1.72402 17.8752 1.79199 18.3047 1.80906 18.7378C1.82546 19.7683 2.12427 20.7747 2.67309 21.6478C3.34272 22.44 4.21527 23.036 5.19768 23.3722C5.59861 23.5266 5.98304 23.7207 6.34523 23.9515C6.6688 24.2202 6.96705 24.5178 7.23626 24.8407C7.85233 25.685 8.69462 26.3388 9.66634 26.7268C10.0471 26.8425 10.4429 26.9015 10.8409 26.902C11.4506 26.8826 12.0567 26.8013 12.65 26.6595C13.5098 26.445 14.4092 26.445 15.269 26.6595C16.2525 26.9507 17.2955 26.9786 18.2932 26.7403C19.2649 26.3523 20.1072 25.6985 20.7232 24.8542C20.9924 24.5313 21.2907 24.2337 21.6143 23.965C21.9765 23.7342 22.3609 23.5401 22.7618 23.3857C23.7442 23.0495 24.6168 22.4535 25.2864 21.6613C25.8352 20.7882 26.134 19.7818 26.1504 18.7513C26.1675 18.3182 26.2355 17.8886 26.3529 17.4714C26.5042 17.085 26.6941 16.7149 26.92 16.3667C27.5408 15.5089 27.9143 14.4978 28 13.4432C27.9238 12.3972 27.5646 11.3914 26.9605 10.5332Z"
                            fill="#DB4A2B" />
                        <path
                            d="M12.6505 18.8865C12.4729 18.8875 12.2969 18.8535 12.1325 18.7864C11.968 18.7193 11.8185 18.6204 11.6924 18.4955L7.64394 14.4508C7.51812 14.3251 7.41831 14.1759 7.35021 14.0116C7.28212 13.8474 7.24707 13.6713 7.24707 13.4936C7.24707 13.1345 7.38983 12.7902 7.64394 12.5363C7.89806 12.2824 8.24271 12.1398 8.60208 12.1398C8.96145 12.1398 9.3061 12.2824 9.56021 12.5363L12.6505 15.6372L18.4398 9.83986C18.6939 9.58599 19.0386 9.44336 19.3979 9.44336C19.7573 9.44336 20.102 9.58599 20.3561 9.83986C20.6102 10.0937 20.753 10.4381 20.753 10.7971C20.753 11.1561 20.6102 11.5005 20.3561 11.7543L13.6087 18.4955C13.4826 18.6204 13.333 18.7193 13.1686 18.7864C13.0042 18.8535 12.8281 18.8875 12.6505 18.8865Z"
                            fill="white" />
                    </svg></h4>
                <p class="text-[#ABABAB] text-xs mb-3 flex leading-none"> {{ $tradeperson->categories->pluck('name')->join(', ') }}</p>
                <p class="text-[#2B2B2B] text-sm mt-2 flex leading-[1.1rem] mb-5">
                    {{ $tradeperson->about_me }}</p>
                    {{-- <h4 class="font-semibold lg:text-2xl mb-4">Package</h4>
                    <span class="bg-primary text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Basic Package</span> --}}

                    <h4 class="font-semibold lg:text-2xl mt-10 mb-4">Portfolio</h4>
                    <!-- <img src="{{ asset( 'public/images/slider-1.jfif' ) }}" class="rounded-[20px]"> -->



                    <div  class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        @if ($tradeperson->portfolio)
                            @php
                                // Decode the JSON certificate array
                               $portfolios = is_array($tradeperson->portfolio) ? $tradeperson->portfolio : json_decode($tradeperson->portfolio, true);

                            @endphp

                            @if (!empty($portfolios))
                                @foreach ($portfolios as $portfolio)
                                <div class="swiper-slide">
                                    <img src="{{ $portfolio }}">
                                </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-sm">No portfolio available.</p>
                            @endif
                        @else
                            <p class="text-gray-500 text-sm">No portfolio available.</p>
                        @endif
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper thumbmySwiper">
                    <div class="swiper-wrapper">

                        @if ($tradeperson->portfolio)
                            @php
                                // Decode the JSON certificate array
                                $certificates = is_array($tradeperson->certificate) ? $tradeperson->certificate : json_decode($tradeperson->certificate, true);
                            @endphp

                            @if (!empty($portfolios))
                                @foreach ($portfolios as $portfolio)
                                {{-- @php
                                    var_dump($portfolio);
                                @endphp --}}
                                <div class="swiper-slide">
                                    <img src="{{ $portfolio }}">
                                </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-sm">No portfolio available.</p>
                            @endif
                        @else
                            <p class="text-gray-500 text-sm">No portfolio available.</p>
                        @endif

                    </div>
                    </div>


                </div>
                <div class="lg:col-span-2 xl:p-4">

                    <h4 class="font-semibold lg:text-2xl mt-4 mb-2">Location</h4>
                    <div class="mt-7 pb-5">
                    <p class="text-[#ABABAB] text-xs mt-2 flex leading-none gap-2">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.0785 14.2446C7.78937 14.5153 7.40293 14.6666 7.00075 14.6666C6.59856 14.6666 6.21212 14.5153 5.92299 14.2446C3.27535 11.7506 -0.272825 8.96459 1.45751 4.91976C2.39309 2.73275 4.6389 1.33331 7.00075 1.33331C9.36259 1.33331 11.6084 2.73275 12.544 4.91976C14.2721 8.95949 10.7327 11.7592 8.0785 14.2446Z" stroke="#DB4A2B"></path>
                        <path d="M9.33268 7.33333C9.33268 8.622 8.28801 9.66667 6.99935 9.66667C5.71068 9.66667 4.66602 8.622 4.66602 7.33333C4.66602 6.04467 5.71068 5 6.99935 5C8.28801 5 9.33268 6.04467 9.33268 7.33333Z" stroke="#DB4A2B"></path>
                        </svg>
                        {{ $tradeperson->address }}
                    </p>
                    </div>
                    <div class="w-full max-w-[600px] h-[220px] xl:mx-auto border border-primary rounded-[20px] overflow-hidden p-3 mb-10">
                    <iframe
                        class="w-full h-full rounded-[10px]"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.95373631531692!3d-37.8162791797516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce7e33!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1646482392853!5m2!1sen!2s"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    </div>

                    <h4 class="font-semibold lg:text-2xl mt-4 mb-4">Certifications</h4>

                    <div class="flex gap-4">
                    @if ($tradeperson->certificate)
                        @php
                            // Decode the JSON certificate array
                            $certificates =  is_array($tradeperson->certificate) ? $tradeperson->certificate : json_decode($tradeperson->certificate, true);
                        @endphp

                        @if (!empty($certificates))
                            @foreach ($certificates as $certificate)
                                <img src="{{ $certificate }}" class="h-auto max-w-full">
                            @endforeach
                        @else
                            <p class="text-gray-500 text-sm">No certifications available.</p>
                        @endif
                    @else
                        <p class="text-gray-500 text-sm">No certifications available.</p>
                    @endif
                </div>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection
