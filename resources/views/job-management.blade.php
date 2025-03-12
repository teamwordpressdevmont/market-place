@extends('layouts.app')
@section('content')
<div class="mt-5">
<div class="bgShadow pt-10 pb-8">
<div class="grid grid-cols-1 md:grid-cols-2 md:gap-8 gap-5 mb-5 items-start">
   <div>
      <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl">Job Managemant</h1>
   </div>
   <div class="flex md:justify-end justify-start self-start">
      <a href="#" class="bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">
         Create a job
         <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="pl-1">
            <path d="M11 7V15M15 11L7 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="white" stroke-width="1.5"></path>
         </svg>
      </a>
   </div>
</div>
<div>
   <div class="tabsWrapper">
      <div class="tabsScroll 2xl:w-[38%] xl:w-[50%] lg:w-[70%] pb-10 overflow-x-auto relative">
         <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li role="presentation">
               <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Active Jobs</button>
            </li>
            <li role="presentation">
               <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Pending Jobs</button>
            </li>
            <li role="presentation">
               <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Completed Jobs</button>
            </li>
         </ul>
      </div>
      <div id="default-tab-content">
         <div class="rounded-xl p-5 bg-white border border-[#22222233] h-fit" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div>
               <div class="flex justify-between items-center mb-4">
                  <h2 class="text-lg font-bold">4 Active Jobs</h2>
               </div>
               <div class="space-y-5">
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                           <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                           <div class="flex items-center gap-2">
                              <img src="/public/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                              <div>
                                 <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                 <p class="text-xs text-gray-500">Expert Plumber</p>
                              </div>
                           </div>
                        </div>
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-1" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-1" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                           <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                           <div class="flex items-center gap-2">
                              <img src="/public/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                              <div>
                                 <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                 <p class="text-xs text-gray-500">Expert Plumber</p>
                              </div>
                           </div>
                        </div>
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-2" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-2" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                           <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                           <div class="flex items-center gap-2">
                              <img src="/public/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                              <div>
                                 <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                 <p class="text-xs text-gray-500">Expert Plumber</p>
                              </div>
                           </div>
                        </div>
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-3" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-3" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                           <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                           <div class="flex items-center gap-2">
                              <img src="/public/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                              <div>
                                 <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                 <p class="text-xs text-gray-500">Expert Plumber</p>
                              </div>
                           </div>
                        </div>
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-4" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-4" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="rounded-xl p-5 bg-white border border-[#22222233] h-fit hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div>
               <div class="flex justify-between items-center mb-4">
                  <h2 class="text-lg font-bold">2 Active Jobs</h2>
               </div>
               <div class="space-y-5">
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233] w-[450px]">
                        <div class="flex flex-col items-center justify-center text-center text-xs text-gray-600 border-r border-[#22222233] bg-[#ffe5d8] px-8">
                           <p class="font-semibold text-primary text-sm block mb-3">Job Pending</p>
                           <p class="text-mat text-xs font-light">Approval Pending from Admin</p>
                        </div>
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-5" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-5" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-[#22222233] w-[450px]">
                        <div class="flex items-center justify-center text-xs text-gray-600 border-r border-[#22222233] pr-12">
                            <img src="/public/images/proposals.png" alt="Job Image" >
                           <span class=" text-[#ABABAB] text-xs block ml-2 whitespace-nowrap">8 Proposals Submitted</span>
                        </div>
                        <div class="text-xs text-gray-600 px-7">
                           <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                           <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-6" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-6" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="rounded-xl p-5 bg-white border border-[#22222233] h-fit hidden" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <div>
               <div class="flex justify-between items-center mb-4">
                  <h2 class="text-lg font-bold">2 Active Jobs</h2>
               </div>
               <div class="space-y-5">
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid grid-cols-1 h-full border-r border-[#22222233]">
                        <div class="flex flex-col gap-3 md:justify-end justify-start self-start pr-7">
                           <a href="#" class="bg-[#ABABAB] rounded-full px-5 py-2 text-sm text-white flex items-center justify-center hover:bg-primary transition">Submit Reviews
                           </a>
                           <a href="#" class="bg-[#24C500] rounded-full px-5 py-2 text-sm text-white flex items-center justify-center hover:bg-primary transition">Job Completed
                           </a>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-7" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-7" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
                  <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                     <img src="/public/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                     <div class="md:py-2 py-4 flex-1">
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
                        <h3 class="text-sm font-bold mb-1">Need To Fix Kitchen Pipe</h3>
                        <p class="text-xs text-[#ABABAB] mb-3">Posted 24 Feb 2025</p>
                        <p class="text-xs text-gray-600 line-clamp-2">Suitable local tradespeople have been alerted about your job.<br>
                           As soon as one is interested we will let you know.
                        </p>
                     </div>
                     <div class="grid grid-cols-1 h-full border-r border-[#22222233]">
                        <div class="flex flex-col gap-3 pr-7">
                           <a href="#" class="bg-[#222222] rounded-full pl-1 pr-3 py-1 text-sm text-white flex items-center justify-center hover:bg-primary transition">
                              <span class="flex items-center gap-2 text-xs font-bold text-[#2B2B2B] bg-[#F4F3F3] px-4 py-2 rounded-full mr-2">
                                 5.0/5
                                 <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.07057 1.62215L6.89578 3.28619C7.0083 3.51783 7.30838 3.74002 7.56156 3.78257L9.05724 4.03312C10.0137 4.19385 10.2388 4.8935 9.54955 5.5837L8.38677 6.7561C8.18984 6.95465 8.082 7.33757 8.14296 7.61175L8.47585 9.06307C8.73841 10.2118 8.13358 10.6562 7.12552 10.0558L5.72361 9.21907C5.47043 9.06779 5.05314 9.06779 4.79526 9.21907L3.39336 10.0558C2.38998 10.6562 1.78046 10.2071 2.04302 9.06307L2.37592 7.61175C2.43687 7.33757 2.32903 6.95465 2.13211 6.7561L0.969324 5.5837C0.284781 4.8935 0.505148 4.19385 1.46163 4.03312L2.95731 3.78257C3.20581 3.74002 3.50588 3.51783 3.61841 3.28619L4.44361 1.62215C4.89372 0.719213 5.62515 0.719213 6.07057 1.62215Z" fill="#EEDD2B"></path>
                                 </svg>
                              </span>
                              Review Submited
                           </a>
                           <a href="#" class="bg-[#24C500] rounded-full px-5 py-2 text-sm text-white hover:bg-primary transition w-fit self-end">Job Completed
                           </a>
                        </div>
                     </div>
                     <div class="flex flex-col gap-12 pr-7">

                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-8" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-8" class="-top-[5px]! z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="#" class="text-mat text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                           View Contract
                           <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                              <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
