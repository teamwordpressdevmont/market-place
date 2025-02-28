@extends('layouts.app')
@section('content')
{{--
<div>
   <div class="columns-2 gap-4">
      <div>
         <h1 class="font-semibold text-3xl">Let's Find The Right Expert For Your Job.</h1>
      </div>
      <div class="text-right">
         <a href="#" class="bg-orange-400 rounded-2xl px-4 pt-1 pb-2 text-sm text-white">Create a job</a>
      </div>
   </div>
   <div class="grid grid-cols-3 gap-7">
      <div>01</div>
      <div>02</div>
      <div>03</div>
   </div>
</div>
--}}
<div class="">
   <div class="grid grid-cols-1 md:grid-cols-2 gap-9 mt-6">
      <h1 class="font-semibold text-4xl">Let's Find The Right Expert For Your Job.</h1>
      <div class="flex justify-end">
         <a href="#" class="bg-orange-400 rounded-4xl px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-orange-600">
            Create a job
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="pl-1">
               <path d="M11 7V15M15 11L7 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="white" stroke-width="1.5"></path>
            </svg>
         </a>
      </div>
   </div>
   <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-9 mt-6">
      <div class="bg-white py-5 px-8 rounded-xl flex justify-between border border-[#22222233]">
         <div>
            <h3 class="text-6xl font-light text-orange-500 mb-10">05</h3>
            <p class="text-gray-600 font-bold text-sm">Active Jobs</p>
         </div>
         <div>
            <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M32.5226 67.5H27.6191C15.0707 67.5 8.79656 67.5 4.89828 63.5276C0.999996 59.5553 0.999996 53.1618 0.999996 40.375C0.999996 27.5882 0.999996 21.1947 4.89828 17.2224C8.79656 13.25 15.0707 13.25 27.6191 13.25H40.9287C53.4771 13.25 59.7512 13.25 63.6495 17.2224C66.6488 20.2787 67.3405 24.7681 67.5 32.5" stroke="#FF904E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M71 55.25C71 63.9485 63.9485 71 55.25 71C46.5515 71 39.5 63.9485 39.5 55.25C39.5 46.5515 46.5515 39.5 55.25 39.5C63.9485 39.5 71 46.5515 71 55.25Z" stroke="#FF904E" stroke-width="2" stroke-linecap="round"></path>
               <path d="M50 56.9167C50 56.9167 51.7292 56.9167 53.4583 60.375C53.4583 60.375 58.951 51.7292 63.8333 50" stroke="#FF904E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M50 13.25L49.6523 12.1683C47.9198 6.77812 47.0535 4.08304 44.9911 2.54152C42.9288 1 40.1893 1 34.7105 1H33.7895C28.3107 1 25.5712 1 23.5089 2.54152C21.4465 4.08304 20.5802 6.77812 18.8477 12.1683L18.5 13.25" stroke="#FF904E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
         </div>
      </div>
      <div class="bg-white py-5 px-8 rounded-xl flex justify-between border border-[#22222233]">
         <div>
            <h3 class="text-6xl font-light text-green-500 mb-10">10</h3>
            <p class="text-gray-600 font-bold text-sm">completed Jobs</p>
         </div>
         <div>
            <svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M46.875 20.9374C46.875 20.9374 48.6042 20.9374 50.3333 24.3958C50.3333 24.3958 55.826 15.7499 60.7083 14.0208" stroke="#24C500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M71.0833 19.2083C71.0833 28.7582 63.3416 36.5 53.7917 36.5C44.2417 36.5 36.5 28.7582 36.5 19.2083C36.5 9.65837 44.2417 1.91663 53.7917 1.91663C63.3416 1.91663 71.0833 9.65837 71.0833 19.2083Z" stroke="#24C500" stroke-width="2" stroke-linecap="round"/>
               <path d="M1.9165 29.5833H2.9165H1.9165ZM31.2106 2.91663C31.7629 2.91663 32.2106 2.46891 32.2106 1.91663C32.2106 1.36434 31.7629 0.916626 31.2106 0.916626L31.2106 2.91663ZM31.2106 71.0833V72.0833V71.0833ZM1.9165 43.4166H0.916504H1.9165ZM34.8724 71.0833V70.0833V71.0833ZM59.8765 67.0316L60.5631 67.7586L59.8765 67.0316ZM65.1663 44.8645C65.1665 44.3122 64.719 43.8642 64.1668 43.864C63.6145 43.8637 63.1665 44.3112 63.1663 44.8635L65.1663 44.8645ZM34.8724 70.0833H31.2106V72.0833H34.8724V70.0833ZM2.9165 43.4166L2.9165 29.5833H0.916505L0.916504 43.4166L2.9165 43.4166ZM2.9165 29.5833C2.9165 23.0323 2.91888 18.2255 3.44278 14.5453C3.96171 10.9 4.97472 8.50718 6.89315 6.69533L5.51991 5.2413C3.14832 7.48114 2.01632 10.3747 1.46274 14.2634C0.91413 18.1172 0.916505 23.0921 0.916505 29.5833H2.9165ZM31.2106 0.916626C24.3327 0.916626 19.0791 0.914727 15.0129 1.43105C10.9234 1.95032 7.88343 3.00909 5.51991 5.2413L6.89315 6.69533C8.81966 4.87585 11.377 3.90878 15.2648 3.41512C19.1757 2.91852 24.2792 2.91663 31.2106 2.91663L31.2106 0.916626ZM31.2106 70.0833C24.2792 70.0833 19.1757 70.0814 15.2648 69.5848C11.377 69.0911 8.81966 68.1241 6.89315 66.3046L5.5199 67.7586C7.88342 69.9908 10.9234 71.0496 15.0128 71.5689C19.0791 72.0852 24.3327 72.0833 31.2106 72.0833V70.0833ZM0.916504 43.4166C0.916504 49.9078 0.914128 54.8827 1.46274 58.7365C2.01632 62.6252 3.14831 65.5188 5.5199 67.7586L6.89315 66.3046C4.97472 64.4927 3.9617 62.0999 3.44278 58.4546C2.91888 54.7744 2.9165 49.9676 2.9165 43.4166L0.916504 43.4166ZM34.8724 72.0833C41.7503 72.0833 47.0039 72.0852 51.0702 71.5689C55.1596 71.0496 58.1996 69.9908 60.5631 67.7586L59.1899 66.3046C57.2633 68.1241 54.706 69.0911 50.8182 69.5848C46.9073 70.0814 41.8038 70.0833 34.8724 70.0833V72.0833ZM63.1663 44.8635C63.1633 50.9285 63.1205 55.4104 62.5794 58.8619C62.0437 62.2785 61.0367 64.5603 59.1899 66.3046L60.5631 67.7586C62.8445 65.6039 63.9795 62.8434 64.5552 59.1717C65.1254 55.5349 65.1633 50.8825 65.1663 44.8645L63.1663 44.8635Z" fill="#24C500"/>
               <path d="M19.208 39.9583H33.0413" stroke="#24C500" stroke-width="2" stroke-linecap="round"/>
               <path d="M19.208 53.7916H46.8747" stroke="#24C500" stroke-width="2" stroke-linecap="round"/>
            </svg>
         </div>
      </div>
      <div class="bg-white py-5 px-8 rounded-xl flex justify-between border border-[#22222233]">
         <div>
            <h3 class="text-6xl font-light text-orange-300 mb-10">03</h3>
            <p class="text-gray-600 font-bold text-sm">pending jobs Post</p>
         </div>
         <div>
            <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M32.5226 67.5H27.6191C15.0707 67.5 8.79656 67.5 4.89828 63.5276C0.999996 59.5553 0.999996 53.1618 0.999996 40.375C0.999996 27.5882 0.999996 21.1947 4.89828 17.2224C8.79656 13.25 15.0707 13.25 27.6191 13.25H40.9287C53.4771 13.25 59.7512 13.25 63.6495 17.2224C66.6488 20.2787 67.3405 24.7681 67.5 32.5" stroke="#FFC600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               <path d="M55.25 62.3375H55.2783M55.2808 55.25V48.1625M71 55.25C71 63.9485 63.9485 71 55.25 71C46.5515 71 39.5 63.9485 39.5 55.25C39.5 46.5515 46.5515 39.5 55.25 39.5C63.9485 39.5 71 46.5515 71 55.25Z" stroke="#FFC600" stroke-width="2" stroke-linecap="round"/>
               <path d="M50 13.25L49.6523 12.1683C47.9198 6.77812 47.0535 4.08304 44.9911 2.54152C42.9288 1 40.1893 1 34.7105 1H33.7895C28.3107 1 25.5712 1 23.5089 2.54152C21.4465 4.08304 20.5802 6.77812 18.8477 12.1683L18.5 13.25" stroke="#FFC600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </div>
      </div>
   </div>
   <div class="grid grid-cols-2 gap-6 mt-8">
      <div class="rounded-xl p-5 bg-white border border-[#22222233]">
         <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Recent Jobs</h2>
            <a href="#" class="text-[#ABABAB] text-xs flex items-center font-semibold">View All →</a>
         </div>
         <div class="space-y-5">
            <!-- Job Card 1 -->
            <div class="flex items-center rounded-xl border border-[#22222233] bg-[#F4F4F4]">
               <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-32 h-32 rounded-xl object-cover">
               <div class="mx-5 flex-1">
                  <div class="text-xs text-gray-500 flex items-center mb-1">
                     <div class="bg-[#FFE9DC] px-2 py-1 rounded-lg">
                        <svg width="10" height="10" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                     <span class="text-[#072130] text-xs ml-1"> Urgent</span>
                  </div>
                  <h3 class="text-sm font-semibold mb-1">Need To Fix Kitchen Pipe</h3>
                  <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                  <p class="text-xs text-gray-600">Suitable local tradespeople have been alerted about your job.<br>
                     As soon as one is interested we will let you know.
                  </p>
               </div>
               <div class="flex flex-col items-end mr-4">
                  <span class="bg-orange-400 text-white text-xs px-4 py-1 rounded-full mb-8">Active</span>
                  <a href="#" class="text-[#222222] text-sm flex items-center mt-2 font-semibold">View Job Details →</a>
               </div>
            </div>
            <div class="flex items-center rounded-xl border border-[#22222233] bg-[#F4F4F4]">
               <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-32 h-32 rounded-xl object-cover">
               <div class="mx-5 flex-1">
                  <div class="text-xs text-gray-500 flex items-center mb-1">
                     <div class="bg-[#FFE9DC] px-2 py-1 rounded-lg">
                        <svg width="10" height="10" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                     <span class="text-[#072130] text-xs ml-1"> Urgent</span>
                  </div>
                  <h3 class="text-sm font-semibold mb-1">Need To Fix Kitchen Pipe</h3>
                  <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                  <p class="text-xs text-gray-600">Suitable local tradespeople have been alerted about your job.<br>
                     As soon as one is interested we will let you know.
                  </p>
               </div>
               <div class="flex flex-col items-end mr-4">
                  <span class="bg-green-500 text-white text-xs px-4 py-1 rounded-full mb-8">Completed</span>
                  <a href="#" class="text-[#222222] text-sm flex items-center mt-2 font-semibold">View Job Details →</a>
               </div>
            </div>
            <div class="flex items-center rounded-xl border border-[#22222233] bg-[#F4F4F4]">
               <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-32 h-32 rounded-xl object-cover">
               <div class="mx-5 flex-1">
                  <div class="text-xs text-gray-500 flex items-center mb-1">
                     <div class="bg-[#FFE9DC] px-2 py-1 rounded-lg">
                        <svg width="10" height="10" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                     <span class="text-[#072130] text-xs ml-1"> Urgent</span>
                  </div>
                  <h3 class="text-sm font-semibold mb-1">Need To Fix Kitchen Pipe</h3>
                  <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                  <p class="text-xs text-gray-600">Suitable local tradespeople have been alerted about your job.<br>
                     As soon as one is interested we will let you know.
                  </p>
               </div>
               <div class="flex flex-col items-end mr-4">
                  <span class="bg-yellow-400 text-white text-xs px-4 py-1 rounded-full mb-8">Pending</span>
                  <a href="#" class="text-[#222222] text-sm flex items-center mt-2 font-semibold">View Job Details →</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
