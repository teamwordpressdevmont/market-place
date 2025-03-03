@extends('layouts.app')
@section('content')
<div class="mt-5">
   <div class="grid grid-cols-1 xl:grid-cols-3 md:gap-9 gap-8 mt-8 items-center">
      <!-- Left Section -->
      <div class="col-span-2">
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
         <h1 class="text-[#222222] text-4xl font-semibold mt-2 mb-2">Need To Fix Kitchen Pipe</h1>
         <p class="text-[#ABABAB] text-xs">Published on: Feb 25, 2025</p>
         <div class="mt-4 flex gap-4 items-center">
            <h2 class="text-xs font-bold text-[#222222]">Skills</h2>
            <span class="bg-[#ABABAB] text-white text-gray-700 px-4 pt-1 pb-2 rounded-full text-xs leading-[12px]">Plumber</span>
         </div>
      </div>
      <!-- Right Section (Budget) -->
      <div class="bg-[#EDE9D0] p-4 rounded-2xl flex items-end gap-3 justify-end w-64">
         <p class="text-[#072130] text-sm font-semibold">Task Budget</p>
         <p class="text-4xl font-bold text-[#222222]">$2500</p>
      </div>
   </div>
   <div class="grid grid-cols-1 xl:grid-cols-3 md:gap-9 gap-8 mt-8">
      <div class="xl:col-span-2 rounded-xl p-5 bg-white border border-[#22222233]">
         <div class="mt-6">
            <h2 class="text-lg font-semibold">Job Description</h2>
            <p class="text-gray-700 text-sm mt-2">John is seeking a skilled and reliable plumber for his kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes...</p>
         </div>
         <!-- Contract Timeline -->
         <div class="mt-6">
            <h2 class="text-lg font-semibold">Contract Timeline</h2>
            <p class="text-gray-700 text-sm">Start Date: <strong>12 Feb 2025</strong> - End Date: <strong>18 Mar 2025</strong></p>
         </div>
         <!-- Location -->
         <div class="mt-6">
            <h2 class="text-lg font-semibold">Location</h2>
            <p class="text-gray-700 text-sm">John’s Home | 21 Crescent St, York UK</p>
         </div>
         <!-- Images -->
         <div class="mt-6">
            <h2 class="text-lg font-semibold">Images</h2>
            <div class="grid grid-cols-4 gap-2 mt-2">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
               <img src="http://127.0.0.1:8000/images/job-post.png" alt="Pipe issue" class="">
            </div>
         </div>
      </div>
      <div class="rounded-xl p-5 bg-black text-white flex items-center justify-center text-center">
         <div>
            <h2 class="text-xl font-semibold">Your Job Post Is Under Review!</h2>
            <p class="text-gray-400 mt-2">Our team is checking the details to ensure everything is good to go. You’ll be notified once it is approved and ready to list.</p>
         </div>
      </div>
   </div>
</div>
@endsection
