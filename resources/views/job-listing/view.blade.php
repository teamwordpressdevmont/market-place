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
    
    .swiper-button-next:after
    {

    }

    .swiper-button-prev:after
    {

      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      font-size: 0;
      width: 20px;
      height: 20px;
      background-image:url({{ asset('/images/circle-arrow-left-round.svg') }});
      
    }

    .swiper-button-next:after
    {
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      font-size: 0;
      width: 20px;
      height: 20px;
      background-image:url({{ asset('/images/circle-arrow-right-round.svg') }})
    }

</style>


<div class="">

   <div class="bgShadow pt-15 pb-15">
        <div class="grid grid-cols-2 items-start">
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Pending Approval</h1>            
            <div class="flex justify-end">
               <a href="#" class="text-white bg-mat hover:bg-primary focus:outline-none  rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2">Reject</a>
               <a href="#" class="text-white bg-secondary hover:bg-primary focus:outline-none  rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2">Accept</a>
            </div>

        </div>
    </div>

   <div class="">

      <div class="">
         <img src="{{ asset( '/images/job-listing.png' ) }}" class="h-[300px] rounded-lg w-full ">
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-5">
         <div class="lg:col-span-1 p-">
            <img src="{{ asset( '/images/plumber.png' ) }}" class="rounded-full w-60 h-60 object-cover mx-auto -mt-25">
         </div>
         <div class="lg:col-span-2 p-4">

            <h4 class="font-semibold lg:text-2xl mt-4 mb-2 flex gap-2">Lars Eriksen <svg xmlns="http://www.w3.org/2000/svg" width="28" height="27" viewBox="0 0 28 27" fill="none">
            <path d="M26.9605 10.5332C26.733 10.1764 26.543 9.7972 26.3934 9.40155C26.263 8.99499 26.1814 8.5744 26.1504 8.14863C26.1327 7.11832 25.834 6.1123 25.2864 5.23864C24.6168 4.44641 23.7442 3.8504 22.7618 3.51419C22.3609 3.35979 21.9765 3.16572 21.6143 2.93489C21.3001 2.66501 21.0109 2.36742 20.7502 2.04572C20.13 1.20541 19.289 0.552647 18.3202 0.159612C17.3392 -0.0716989 16.3143 -0.0391568 15.35 0.253918C14.4887 0.455904 13.5923 0.455904 12.731 0.253918C11.7499 -0.0489306 10.705 -0.0815148 9.70685 0.159612C8.72815 0.548358 7.87733 1.20147 7.24976 2.04572C6.98055 2.36862 6.6823 2.66625 6.35873 2.93489C5.99654 3.16572 5.61211 3.35979 5.21118 3.51419C4.22388 3.84824 3.34642 4.4444 2.67309 5.23864C2.13976 6.1164 1.85513 7.12214 1.84957 8.14863C1.81858 8.5744 1.737 8.99499 1.60656 9.40155C1.45532 9.78791 1.26535 10.158 1.03954 10.5063C0.430839 11.3722 0.0713312 12.3879 0 13.4432C0.0761579 14.4892 0.435447 15.495 1.03954 16.3532C1.27055 16.6984 1.46082 17.0691 1.60656 17.4579C1.72402 17.8752 1.79199 18.3047 1.80906 18.7378C1.82546 19.7683 2.12427 20.7747 2.67309 21.6478C3.34272 22.44 4.21527 23.036 5.19768 23.3722C5.59861 23.5266 5.98304 23.7207 6.34523 23.9515C6.6688 24.2202 6.96705 24.5178 7.23626 24.8407C7.85233 25.685 8.69462 26.3388 9.66634 26.7268C10.0471 26.8425 10.4429 26.9015 10.8409 26.902C11.4506 26.8826 12.0567 26.8013 12.65 26.6595C13.5098 26.445 14.4092 26.445 15.269 26.6595C16.2525 26.9507 17.2955 26.9786 18.2932 26.7403C19.2649 26.3523 20.1072 25.6985 20.7232 24.8542C20.9924 24.5313 21.2907 24.2337 21.6143 23.965C21.9765 23.7342 22.3609 23.5401 22.7618 23.3857C23.7442 23.0495 24.6168 22.4535 25.2864 21.6613C25.8352 20.7882 26.134 19.7818 26.1504 18.7513C26.1675 18.3182 26.2355 17.8886 26.3529 17.4714C26.5042 17.085 26.6941 16.7149 26.92 16.3667C27.5408 15.5089 27.9143 14.4978 28 13.4432C27.9238 12.3972 27.5646 11.3914 26.9605 10.5332Z" fill="#DB4A2B"/>
            <path d="M12.6505 18.8865C12.4729 18.8875 12.2969 18.8535 12.1325 18.7864C11.968 18.7193 11.8185 18.6204 11.6924 18.4955L7.64394 14.4508C7.51812 14.3251 7.41831 14.1759 7.35021 14.0116C7.28212 13.8474 7.24707 13.6713 7.24707 13.4936C7.24707 13.1345 7.38983 12.7902 7.64394 12.5363C7.89806 12.2824 8.24271 12.1398 8.60208 12.1398C8.96145 12.1398 9.3061 12.2824 9.56021 12.5363L12.6505 15.6372L18.4398 9.83986C18.6939 9.58599 19.0386 9.44336 19.3979 9.44336C19.7573 9.44336 20.102 9.58599 20.3561 9.83986C20.6102 10.0937 20.753 10.4381 20.753 10.7971C20.753 11.1561 20.6102 11.5005 20.3561 11.7543L13.6087 18.4955C13.4826 18.6204 13.333 18.7193 13.1686 18.7864C13.0042 18.8535 12.8281 18.8875 12.6505 18.8865Z" fill="white"/>
            </svg></h4>
            <p class="text-[#ABABAB] text-xs mb-3 flex leading-none">Plumber </p>
            <p class="text-[#2B2B2B] text-sm mt-2 flex leading-[1.1rem] mb-5">With over a decade of hands-on experience, Lars Eriksen is a highly skilled and reliable expert plumber specializing in residential and commercial plumbing solutions. Known for his precision, professionalism, and problem-solving abilities, Lars ensures that every job is completed efficiently and to the highest standard.</p>

            <h4 class="font-semibold lg:text-2xl mb-4">Package</h4>
            <span class="bg-primary text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Basic Package</span>

            <h4 class="font-semibold lg:text-2xl mt-10 mb-4">Portfolio</h4>
            <!-- <img src="{{ asset( '/images/slider-1.jfif' ) }}" class="rounded-[20px]"> -->



            <div  class="swiper mySwiper2">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper thumbmySwiper">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
                  <div class="swiper-slide">
                  <img src="{{ asset( '/images/slider-1.jfif' ) }}" />
                  </div>
               </div>
            </div>


         </div>
         <div class="lg:col-span-2 p-4">
         
            <h4 class="font-semibold lg:text-2xl mt-4 mb-2">Location</h4>      
            <div class="mt-7 pb-5">
             <p class="text-[#ABABAB] text-xs mt-2 flex leading-none gap-2">
               <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M8.0785 14.2446C7.78937 14.5153 7.40293 14.6666 7.00075 14.6666C6.59856 14.6666 6.21212 14.5153 5.92299 14.2446C3.27535 11.7506 -0.272825 8.96459 1.45751 4.91976C2.39309 2.73275 4.6389 1.33331 7.00075 1.33331C9.36259 1.33331 11.6084 2.73275 12.544 4.91976C14.2721 8.95949 10.7327 11.7592 8.0785 14.2446Z" stroke="#DB4A2B"></path>
                   <path d="M9.33268 7.33333C9.33268 8.622 8.28801 9.66667 6.99935 9.66667C5.71068 9.66667 4.66602 8.622 4.66602 7.33333C4.66602 6.04467 5.71068 5 6.99935 5C8.28801 5 9.33268 6.04467 9.33268 7.33333Z" stroke="#DB4A2B"></path>
                </svg>
                John’s Home | 21 Crescent St, York UK
             </p>
            </div>   
            <div class="w-full max-w-[600px] h-[220px] mx-auto border border-primary rounded-[20px] overflow-hidden p-3 mb-10">
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
               <img src="{{ asset( '/images/certi.png' ) }}" class="h-auto max-w-full">
               <img src="{{ asset( '/images/iso.png' ) }}" class="h-auto max-w-full">
               <img src="{{ asset( '/images/loin.png' ) }}" class="h-auto max-w-full">
            </div>


         </div>
      </div>

   </div>

</div>









<div class="mt-5 hidden ">
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-5 mt-8 items-center">
       <!-- Left Section -->
       <div class="lg:col-span-2 col-span-1">
          <div class="flex items-center gap-2 bg-white rounded-full text-sm w-fit pr-4">
             <div class="bg-[#FFE9DC] px-3 py-2 rounded-full">
                <svg width="16" height="16" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <g clip-path="url(#clip0_490_3278)">
                      <ellipse cx="4.27322" cy="4.7875" rx="3.02419" ry="3.02419" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round"></ellipse>
                      <path d="M1.92107 6.80359L1.24902 7.47563M6.62537 6.80359L7.29741 7.47563" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M6.62545 1.61868L6.82555 1.51863C7.10958 1.37661 7.21628 1.39287 7.44209 1.61868C7.66789 1.84449 7.68415 1.95119 7.54214 2.23521L7.44209 2.43531M1.92115 1.61868L1.72105 1.51863C1.43703 1.37661 1.33033 1.39287 1.10452 1.61868C0.878709 1.84449 0.862455 1.95119 1.00447 2.23521L1.10452 2.43531" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round"></path>
                      <path d="M4.27344 3.61139V4.95547L4.94548 5.62752" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M4.27344 1.59528V1.09125" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M3.60107 1.09125H4.94516" stroke="#2B2B2B" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                   </g>
                   <defs>
                      <clipPath id="clip0_490_3278">
                         <rect width="8.06452" height="8.06452" fill="white" transform="translate(0.241211 0.419189)"></rect>
                      </clipPath>
                   </defs>
                </svg>
             </div>
             <span class="">Urgent</span>
          </div>
          <h1 class="text-[#222222] lg:text-4xl md:text-2xl text-xl font-semibold mt-2 mb-2">Need To Fix Kitchen Pipe</h1>
          <p class="text-[#ABABAB] text-xs">Published on: Feb 25, 2025</p>
          <div class="mt-4 flex gap-4 items-center">
             <h2 class="text-xs font-bold text-[#222222]">Skills</h2>
             <span class="bg-[#ABABAB] text-white text-gray-700 px-4 pt-1 pb-1 leading[0] rounded-full text-xs hover:bg-secondary transition">Plumber</span>
          </div>
       </div>
       <!-- Right Section (Budget) -->
       <div class="bg-[#EDE9D0] p-4 rounded-2xl flex items-end gap-4 justify-center xl:w-82 w-fit lg:ml-auto self-end">
          <p class="text-[#072130] text-sm font-semibold">Task Budget</p>
          <p class="lg:text-4xl md:text-2xl text-xl font-bold text-[#222222]">$2500</p>
       </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-3 2xl:gap-9 gap-6 mt-5">
       <div class="rounded-xl p-5 bg-white border border-[#22222233] h-fit">
          <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
             <h2 class="text-sm font-semibold">Job Description</h2>
             <p class="text-[#ABABAB] text-xs mt-2">John is seeking a skilled and reliable plumber for his kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes...</p>
          </div>
          <!-- Contract Timeline -->
          <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
             <h2 class="text-sm font-semibold">Contract Timeline</h2>
             <div class="flex md:flex-row flex-col md:gap-9 gap-4 border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 md:px-9 px-5 py-4 rounded-2xl items-center"><span>Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
          </div>
          <!-- Location -->
          <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
             <h2 class="text-sm font-semibold">Location</h2>
             <p class="text-[#ABABAB] text-xs mt-2 flex leading-none gap-2">
                <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M8.0785 14.2446C7.78937 14.5153 7.40293 14.6666 7.00075 14.6666C6.59856 14.6666 6.21212 14.5153 5.92299 14.2446C3.27535 11.7506 -0.272825 8.96459 1.45751 4.91976C2.39309 2.73275 4.6389 1.33331 7.00075 1.33331C9.36259 1.33331 11.6084 2.73275 12.544 4.91976C14.2721 8.95949 10.7327 11.7592 8.0785 14.2446Z" stroke="#ABABAB"></path>
                   <path d="M9.33268 7.33333C9.33268 8.622 8.28801 9.66667 6.99935 9.66667C5.71068 9.66667 4.66602 8.622 4.66602 7.33333C4.66602 6.04467 5.71068 5 6.99935 5C8.28801 5 9.33268 6.04467 9.33268 7.33333Z" stroke="#ABABAB"></path>
                </svg>
                John’s Home | 21 Crescent St, York UK
             </p>
          </div>
          <!-- Images -->
          <div class="mt-6">
             <h2 class="text-sm font-semibold">Images</h2>
             <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 mt-2">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
             </div>
          </div>
       </div>
       <div class="bg-white rounded-2xl border border-[#22222233] py-4 h-fit">
          <h3 class="text-[#2C2C2C] font-semibold mb-4 text-sm border-b border-[#e5e7eb] px-5 pb-2">Accept Proposals</h3>
          <div class="space-y-4 px-5">
             <!-- Tradeperson Card -->
             <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl">
                <!-- Left Section -->
                <div class="flex-1 py-4">
                   <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                      <!-- Profile Info -->
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex-1">
                         <div>
                            <h4 class="font-semibold text-[#072130] text-xs mb-1">Brian Simmons</h4>
                            <p class="text-xs text-[#ABABAB] mb-4">Expert Plumber</p>
                         </div>
                         <div class="flex 2xl:items-center items-start md:mt-0 mt-3 2xl:flex-row flex-col 2xl:gap-0 gap-2">
                            <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-4 py-1 rounded-full">
                               4.5/5
                               <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                               </svg>
                            </span>
                            <span class="text-xs text-[#ABABAB] md:ml-2 ml-0 md:mt-0 mt-2">(28 reviews)</span>
                         </div>
                      </div>
                      <!-- Rating Section -->
                   </div>
                </div>
                <!-- Right Arrow Section -->
                <a href="#" class="md:w-24 w-14 flex items-center justify-center border-l border-gray-200">
                   <span class="text-gray-500 text-lg">
                      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1.00005 1C1.00005 1 6.99999 5.41893 7 7.00005C7.00001 8.58116 1 13 1 13" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                   </span>
                </a>
             </div>
             <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl">
                <!-- Left Section -->
                <div class="flex-1 py-4">
                   <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                      <!-- Profile Info -->
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex-1">
                         <div>
                            <h4 class="font-semibold text-[#072130] text-xs mb-1">Brian Simmons</h4>
                            <p class="text-xs text-[#ABABAB] mb-4">Expert Plumber</p>
                         </div>
                         <div class="flex 2xl:items-center items-start md:mt-0 mt-3 2xl:flex-row flex-col 2xl:gap-0 gap-2">
                            <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-4 py-1 rounded-full">
                               4.5/5
                               <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                               </svg>
                            </span>
                            <span class="text-xs text-[#ABABAB] md:ml-2 ml-0 md:mt-0 mt-2">(28 reviews)</span>
                         </div>
                      </div>
                      <!-- Rating Section -->
                   </div>
                </div>
                <!-- Right Arrow Section -->
                <a href="#" class="md:w-24 w-14 flex items-center justify-center border-l border-gray-200">
                   <span class="text-gray-500 text-lg">
                      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1.00005 1C1.00005 1 6.99999 5.41893 7 7.00005C7.00001 8.58116 1 13 1 13" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                   </span>
                </a>
             </div>
             <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl">
                <!-- Left Section -->
                <div class="flex-1 py-4">
                   <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                      <!-- Profile Info -->
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex-1">
                         <div>
                            <h4 class="font-semibold text-[#072130] text-xs mb-1">Brian Simmons</h4>
                            <p class="text-xs text-[#ABABAB] mb-4">Expert Plumber</p>
                         </div>
                         <div class="flex 2xl:items-center items-start md:mt-0 mt-3 2xl:flex-row flex-col 2xl:gap-0 gap-2">
                            <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-4 py-1 rounded-full">
                               4.5/5
                               <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                               </svg>
                            </span>
                            <span class="text-xs text-[#ABABAB] md:ml-2 ml-0 md:mt-0 mt-2">(28 reviews)</span>
                         </div>
                      </div>
                      <!-- Rating Section -->
                   </div>
                </div>
                <!-- Right Arrow Section -->
                <a href="#" class="md:w-24 w-14 flex items-center justify-center border-l border-gray-200">
                   <span class="text-gray-500 text-lg">
                      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1.00005 1C1.00005 1 6.99999 5.41893 7 7.00005C7.00001 8.58116 1 13 1 13" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                   </span>
                </a>
             </div>
             <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl">
                <!-- Left Section -->
                <div class="flex-1 py-4">
                   <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                      <!-- Profile Info -->
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex-1">
                         <div>
                            <h4 class="font-semibold text-[#072130] text-xs mb-1">Brian Simmons</h4>
                            <p class="text-xs text-[#ABABAB] mb-4">Expert Plumber</p>
                         </div>
                         <div class="flex 2xl:items-center items-start md:mt-0 mt-3 2xl:flex-row flex-col 2xl:gap-0 gap-2">
                            <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-4 py-1 rounded-full">
                               4.5/5
                               <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                               </svg>
                            </span>
                            <span class="text-xs text-[#ABABAB] md:ml-2 ml-0 md:mt-0 mt-2">(28 reviews)</span>
                         </div>
                      </div>
                      <!-- Rating Section -->
                   </div>
                </div>
                <!-- Right Arrow Section -->
                <a href="#" class="md:w-24 w-14 flex items-center justify-center border-l border-gray-200">
                   <span class="text-gray-500 text-lg">
                      <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1.00005 1C1.00005 1 6.99999 5.41893 7 7.00005C7.00001 8.58116 1 13 1 13" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                   </span>
                </a>
             </div>
          </div>
       </div>
       <div class="bg-white rounded-2xl border border-[#22222233] py-4">
          <h3 class="text-[#2C2C2C] text-sm font-semibold text-base border-b border-[#e5e7eb] px-5 pb-3">Assign Tradeperson:</h3>
          <div class="space-y-4 px-5">
             <!-- Tradeperson Card -->
             <div class="flex border-b border-[#e5e7eb]">
                <!-- Left Section -->
                <div class="flex-1 py-4">
                   <div class="flex justify-between sm:items-center items-start flex-col sm:flex-row">
                      <!-- Profile Info -->
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex flex-1 gap-4 justify-between items-center sm:flex-row flex-col">
                         <div>
                            <h4 class="font-semibold text-[#072130] text-sm">Brian Simmons</h4>
                            <p class="text-xs text-[#ABABAB]">Expert Plumber</p>
                         </div>
                         <div class="flex items-center">
                            <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-3 py-1 rounded-full">
                               4.5/5
                               <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                               </svg>
                            </span>
                            <span class="text-xs text-[#ABABAB] ml-2">(28 reviews)</span>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!-- Message Button -->
             <div class="flex border-b border-[#e5e7eb] pb-4 text-center">
                <a href="#" class="bg-[#FF904E] text-white px-6 py-3 rounded-full text-sm inline-block w-full max-w-lg hover:bg-primary transition">
                Message
                </a>
             </div>
             <!-- Hire Question -->
             <div class="mt-4">
                <p class="text-sm text-[#2C2C2C] font-semibold mb-4">Do you want to hire Brian Simmons?</p>
                <div class="flex justify-between gap-4 border-b border[#222222] mb-5 pb-5">
                   <a href="#" class="px-6 py-3 border border-[#ABABAB] text-[#2C2C2C] font-semibold rounded-full text-xs w-full text-center hover:bg-secondary transition hover:text-white hover:border-secondary">
                   Yes
                   </a>
                   <a href="#" class="px-6 py-3 bg-gray-200 text-[#ABABAB] rounded-full text-xs w-full text-center hover:bg-secondary transition hover:text-white hover:border-secondary">
                   No
                   </a>
                </div>
             </div>




             <!-- Tabs -->
             <div class="tabsWrapper">
                <div class="tabsScroll w-full pb-2 overflow-x-auto relative">
                   <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                      <li role="presentation">
                         <button class="transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Proposal</button>
                      </li>
                      <li role="presentation">
                         <button class="transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Profile</button>
                      </li>
                      <li role="presentation">
                         <button class="transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Reviews</button>
                      </li>
                   </ul>
                </div>
                <div id="default-styled-tab-content">
                    <div class="mt-6 rounded-lg text-xs text-[#ABABAB] h-[500px] overflow-y-auto" id="styled-profile" role="tabpanel" aria-labelledby="proposal-tab">
                      <div>
                         <p class="mb-4">Dear Alex, 1</p>
                         <p class="mb-4">Thank you for reaching out regarding your kitchen plumbing repairs. Below is a breakdown of my proposed approach:</p>
                         <h4 class="mb-4 font-bold">Proposal Overview:</h4>
                         <p class="mb-4">1. Inspection &amp; Diagnosis (Day 1)</p>
                         <ul class="list-disc pl-5 mb-4">
                            <li>Diagnosis of kitchen plumbing issues</li>
                            <li>Selection of suitable plumbing materials</li>
                            <li>Efficient and timely repairs</li>
                         </ul>
                         <h4 class="mb-4 font-bold">Project Milestones:</h4>
                         <p class="mb-4">1. Inspection &amp; Diagnosis (Day 1)</p>
                         <ul class="list-disc pl-5 mb-4">
                            <li>Inspection &amp; Diagnostic Report</li>
                            <li>Material Procurement &amp; Preparation</li>
                            <li>Installation &amp; Testing</li>
                         </ul>
                         <h4 class="mb-4 font-bold">Project Milestones:</h4>
                         <p class="mb-4">1. Inspection &amp; Diagnosis (Day 1)</p>
                         <ul class="list-disc pl-5 mb-4">
                            <li>Inspection &amp; Diagnostic Report</li>
                            <li>Material Procurement &amp; Preparation</li>
                            <li>Installation &amp; Testing</li>
                         </ul>
                         <h4 class="mb-4 font-bold">Project Milestones:</h4>
                         <p class="mb-4">1. Inspection &amp; Diagnosis (Day 1)</p>
                         <ul class="list-disc pl-5 mb-4">
                            <li>Inspection &amp; Diagnostic Report</li>
                            <li>Material Procurement &amp; Preparation</li>
                            <li>Installation &amp; Testing</li>
                         </ul>
                         <h4 class="mb-4 font-bold">Project Milestones:</h4>
                         <p class="mb-4">1. Inspection &amp; Diagnosis (Day 1)</p>
                         <ul class="list-disc pl-5 mb-4">
                            <li>Inspection &amp; Diagnostic Report</li>
                            <li>Material Procurement &amp; Preparation</li>
                            <li>Installation &amp; Testing</li>
                         </ul>
                      </div>
                    </div>
                    <div class="mt-6 rounded-lg text-xs text-[#ABABAB] h-[500px] overflow-y-auto hidden" id="styled-dashboard" role="tabpanel" aria-labelledby="profile-tab">
                        <div>
                         <p class="mb-6 flex gap-2">
                            <span>
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="8.00065" cy="7.99998" r="6.66667" stroke="#222222"></circle>
                                  <path d="M8 5.33331V7.99998L9.33333 9.33331" stroke="#222222" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                            </span>
                            Member since 2019
                         </p>
                         <h4 class="mb-3 font-semibold text-[#222222]">Good to know</h4>
                         <p class="mb-5 flex gap-3">
                            <span>
                               <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M12.661 12.6666H12.6673M12.661 12.6666C12.2459 13.0783 11.4935 12.9758 10.9659 12.9758C10.3183 12.9758 10.0065 13.1025 9.54427 13.5647C9.15071 13.9582 8.62314 14.6666 8.00067 14.6666C7.37818 14.6666 6.8506 13.9582 6.45703 13.5647C5.99484 13.1025 5.68298 12.9758 5.03536 12.9758C4.50777 12.9758 3.75544 13.0783 3.34031 12.6666C2.92186 12.2517 3.02484 11.4962 3.02484 10.9653C3.02484 10.2943 2.87809 9.98571 2.40024 9.50787C1.68941 8.79706 1.334 8.44161 1.33398 7.99996C1.33399 7.55832 1.6894 7.20291 2.40022 6.49209C2.82679 6.06552 3.02484 5.64283 3.02484 5.03468C3.02484 4.50708 2.92231 3.75474 3.33398 3.33961C3.74894 2.92117 4.50439 3.02415 5.03537 3.02415C5.6435 3.02415 6.0662 2.82612 6.49275 2.39956C7.20358 1.68873 7.559 1.33331 8.00065 1.33331C8.44231 1.33331 8.79772 1.68873 9.50855 2.39956C9.93502 2.82602 10.3576 3.02415 10.9659 3.02415C11.4935 3.02415 12.2459 2.92163 12.661 3.33331C13.0794 3.74827 12.9765 4.50371 12.9765 5.03468C12.9765 5.7057 13.1232 6.01423 13.6011 6.49209C14.3119 7.20291 14.6673 7.55832 14.6673 7.99996C14.6673 8.44161 14.3119 8.79706 13.6011 9.50787C13.1232 9.9857 12.9765 10.2943 12.9765 10.9653C12.9765 11.4962 13.0794 12.2517 12.661 12.6666Z" stroke="#222222"></path>
                                  <path d="M6 8.59522C6 8.59522 6.8 9.02975 7.2 9.66665C7.2 9.66665 8.4 7.16665 10 6.33331" stroke="#222222" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                            </span>
                            Verified by DINBYGGEMARKED
                         </p>
                         <h4 class="mb-3 font-semibold text-[#222222]">Services</h4>
                         <p class="mb-5">Bathroom Fitter, Electrician, Guttering Installer, Fencer, Plumber</p>
                         <h4 class="mb-3 font-semibold text-[#222222]">About Brian Simmons</h4>
                         <p class="mb-5">Company number&nbsp;- 08900980
                            Established in 2014, we are a team of trustworthy, friendly, and fully trained tradesmen dedicated to handling all your maintenance needs—whether domestic or commercial. No job is too big or too small, and every project receives our full attention and commitment.
                         </p>
                         <h4 class="mb-3 font-semibold text-[#222222]">Portfolio</h4>
                         <div class="grid grid-cols-6 gap-1 mt-2">
                            <img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full">
                            <img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full"><img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full"><img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full"><img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full"><img src="http://127.0.0.1:8000/images/portfolio.png" alt="image" class="w-full">
                         </div>
                        </div>
                    </div>
                    <div class="mt-6 rounded-lg text-xs h-[500px] overflow-y-auto hidden" id="styled-settings" role="tabpanel" aria-labelledby="reviews-tab">
                        <div>
                            <div class="userReviewBox border border-[#e5e7eb] rounded-xl pt-5 pb-5 ps-5 pe-10 mb-4">
                                <ul class="flex mb-2"> 
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                </ul>
                                <h2 class="text-sm font-semibold mb-3">John provided excellent service</h2>
                                <p class="text-[#ABABAB] text-xs mt-2 mb-3">John provided excellent service. He was punctual, professional, and quickly resolved all my plumbing issues. The work area was left clean, and the repairs have held up perfectly. Highly recommended!</p>                
                                <p class="text-xs">Lara Smith</p>
                            </div>
                            <div class="userReviewBox border border-[#e5e7eb] rounded-xl pt-5 pb-5 ps-5 pe-10 mb-4">
                                <ul class="flex mb-2"> 
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                </ul>
                                <h2 class="text-sm font-semibold mb-3">John provided excellent service</h2>
                                <p class="text-[#ABABAB] text-xs mt-2 mb-3">John provided excellent service. He was punctual, professional, and quickly resolved all my plumbing issues. The work area was left clean, and the repairs have held up perfectly. Highly recommended!</p>                
                                <p class="text-xs">Lara Smith</p>
                            </div>    
                            <div class="userReviewBox border border-[#e5e7eb] rounded-xl pt-5 pb-5 ps-5 pe-10 mb-4">
                                <ul class="flex mb-2"> 
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                    <li><img src="{{ asset( '/images/stars.svg' ) }}"></li>
                                </ul>
                                <h2 class="text-sm font-semibold mb-3">John provided excellent service</h2>
                                <p class="text-[#ABABAB] text-xs mt-2 mb-3">John provided excellent service. He was punctual, professional, and quickly resolved all my plumbing issues. The work area was left clean, and the repairs have held up perfectly. Highly recommended!</p>                
                                <p class="text-xs">Lara Smith</p>
                            </div>                                                    
                        </div>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>


<div class="mx-auto max-w-7xlmx-auto hidden">
    <div class="flex flex-col">
        <h3 class="mb-5 text-xl text-left font-medium text-white bg-green-900 px-4 py-3 rounded-md">{{ $OrderDetail->title }}</h3>
        <p class="mb-8 text-gray-900">{{ $OrderDetail->description }}</p>
    </div>
    <!--<h4 class="mb-3 text-xl text-left font-medium text-grey border-b pb-3 border-green-700 inline-block">JOB PROPOSAL</h4>    -->
    <!--<div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 shadow-sm mx-auto">-->
    <!--    <div class="relative overflow-x-auto">-->
    <!--        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">-->
    <!--            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">-->
    <!--                <tr>-->
    <!--                    <th scope="col" class="px-6 py-3">-->
    <!--                        Name-->
    <!--                    </th>-->
    <!--                    <th scope="col" class="px-6 py-3">-->
    <!--                        Color-->
    <!--                    </th>-->
    <!--                    <th scope="col" class="px-6 py-3">-->
    <!--                        Category-->
    <!--                    </th>-->
    <!--                    <th scope="col" class="px-6 py-3">-->
    <!--                        Staus-->
    <!--                    </th>-->
    <!--                </tr>-->
    <!--            </thead>-->
    <!--            <tbody>-->
    <!--                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">-->
    <!--                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">-->
    <!--                        Apple MacBook Pro 17"-->
    <!--                    </th>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        Silver-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        Laptop-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Decline</span>-->
    <!--                    </td>-->
    <!--                </tr>-->
    <!--                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">-->
    <!--                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">-->
    <!--                        Microsoft Surface Pro-->
    <!--                    </th>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        White-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        Laptop PC-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Accept</span>-->
    <!--                    </td>-->
    <!--                </tr>-->
    <!--                <tr class="bg-white dark:bg-gray-800">-->
    <!--                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">-->
    <!--                        Magic Mouse 2-->
    <!--                    </th>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        Black-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        Accessories-->
    <!--                    </td>-->
    <!--                    <td class="px-6 py-4">-->
    <!--                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Decline</span>-->
    <!--                    </td>-->
    <!--                </tr>-->
    <!--            </tbody>-->
    <!--        </table>-->
    <!--    </div>-->
    <!--</div>-->
    
    
    @if(!empty($OrderDetail->order->review))

    <h4 class="mb-3 text-xl text-left font-medium text-grey border-b pb-3 border-green-700 inline-block">Order Reviews</h4>    
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 shadow-sm mx-auto">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Sno</th>
                        <th scope="col" class="px-6 py-3">Trade Person Name</th>
                        <th scope="col" class="px-6 py-3">Review</th>
                        <th scope="col" class="px-6 py-3">Rating</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">{{ $OrderDetail->order->review->tradeperson->business_name }}</td>
                            <td class="px-6 py-4">{{ $OrderDetail->order->review->review }}</td>
                            <td class="px-6 py-4">{{ $OrderDetail->order->review->rating}}</td>
                            <td class="px-6 py-4">
                                @if(!empty($OrderDetail->order->review->approved) && $OrderDetail->order->review->approved == 1)
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Accepted</span>
                                @else
                                    <a href="{{ route('accept.review' , $OrderDetail->order->review->id) }}" class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Accept</a>
                                @endif
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif



@endsection