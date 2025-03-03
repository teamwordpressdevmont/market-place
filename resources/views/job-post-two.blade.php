@extends('layouts.app')
@section('content')
<div class="mt-5">
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
             <span class="bg-[#ABABAB] text-white text-gray-700 px-4 pt-1 pb-2 rounded-full text-xs leading-[12px] hover:bg-secondary transition">Plumber</span>
          </div>
       </div>
       <!-- Right Section (Budget) -->
       <div class="bg-[#EDE9D0] p-4 rounded-2xl flex items-end gap-4 justify-center xl:w-64 w-fit lg:ml-auto self-end">
          <p class="text-[#072130] text-sm font-semibold">Task Budget</p>
          <p class="lg:text-4xl md:text-2xl text-xl font-bold text-[#222222]">$2500</p>
       </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 xl:gap-9 gap-6 mt-5">
        <div class="lg:col-span-2 rounded-xl p-5 bg-white border border-[#22222233]">
            <div class="border-b border-[#e5e7eb] mb-8 pb-8">
                <h2 class="text-md font-semibold">Job Description</h2>
                <p class="text-[#ABABAB] text-sm mt-2">John is seeking a skilled and reliable plumber for his kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes...</p>
            </div>
            <!-- Contract Timeline -->
            <div class="border-b border-[#e5e7eb] mb-8 pb-8">
                <h2 class="text-md font-semibold">Contract Timeline</h2>
                <div class="flex md:flex-row flex-col md:gap-9 gap-4 border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-sm mt-2 md:w-fit w-100 md:px-9 px-5 py-4 rounded-2xl items-center"><span>Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
            </div>
            <!-- Location -->
            <div class="border-b border-[#e5e7eb] mb-8 pb-8">
                <h2 class="text-md font-semibold">Location</h2>
                <p class="text-[#ABABAB] text-sm mt-2 flex leading-none gap-2">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.0785 14.2446C7.78937 14.5153 7.40293 14.6666 7.00075 14.6666C6.59856 14.6666 6.21212 14.5153 5.92299 14.2446C3.27535 11.7506 -0.272825 8.96459 1.45751 4.91976C2.39309 2.73275 4.6389 1.33331 7.00075 1.33331C9.36259 1.33331 11.6084 2.73275 12.544 4.91976C14.2721 8.95949 10.7327 11.7592 8.0785 14.2446Z" stroke="#ABABAB"></path>
                    <path d="M9.33268 7.33333C9.33268 8.622 8.28801 9.66667 6.99935 9.66667C5.71068 9.66667 4.66602 8.622 4.66602 7.33333C4.66602 6.04467 5.71068 5 6.99935 5C8.28801 5 9.33268 6.04467 9.33268 7.33333Z" stroke="#ABABAB"></path>
                    </svg>
                    John’s Home | 21 Crescent St, York UK
                </p>
            </div>
            <!-- Images -->
            <div class="mt-6">
                <h2 class="text-md font-semibold">Images</h2>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 mt-2 xl:w-[58%]">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                    <img src="http://127.0.0.1:8000/images/job-post.png" alt="image" class="w-full">
                </div>
            </div>
        </div>
        <div>
            <div class="bg-[#FF904E] p-6 text-center rounded-t-2xl">
                <h2 class="text-white text-lg font-semibold">Invite Tradeperson</h2>
                <input type="text" placeholder="Plumber" class="w-full mt-3 p-2 bg-black text-white rounded-lg text-center">
            </div>
            <div class="bg-white p-6 rounded-b-2xl shadow-md">
                <h3 class="text-gray-700 font-semibold mb-4">Recommended Tradepersons</h3>

                <div class="space-y-4">
                    <!-- Tradeperson Card -->
                    <div class="flex items-center p-4 bg-gray-100 rounded-lg">
                        <img src="http://127.0.0.1:8000/images/proposal.png" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800">Brian Simmons</h4>
                            <p class="text-sm text-gray-500">Expert Plumber</p>
                            <div class="flex items-center text-yellow-500 text-sm">
                                ★ 4.5/5 <span class="text-gray-500 ml-1">(28 reviews)</span>
                            </div>
                        </div>
                        <button class="text-gray-400">Invite Sent</button>
                    </div>

                    <div class="flex items-center p-4 bg-gray-100 rounded-lg">
                        <img src="http://127.0.0.1:8000/images/proposal.png" alt="Profile" class="w-12 h-12 rounded-full mr-4">
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800">Brian Simmons</h4>
                            <p class="text-sm text-gray-500">Expert Plumber</p>
                            <div class="flex items-center text-yellow-500 text-sm">
                                ★ 4.5/5 <span class="text-gray-500 ml-1">(28 reviews)</span>
                            </div>
                        </div>
                        <button class="bg-[#FF904E] text-white px-4 py-1 rounded-lg">Invite</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
