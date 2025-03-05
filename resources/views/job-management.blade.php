@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8 gap-5 mb-12 items-start">
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
    <div class="tabsWrapper">
        <div class="tabsScroll w-[30%] pb-10 overflow-x-auto relative">
            <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li role="presentation">
                <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Active Jobs</button>
                </li>
                <li class="" role="presentation">
                <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Pending Jobs</button>
                </li>
                <li class="" role="presentation">
                <button class="transition text-xs text-[#ababab] font-semibold px-8 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Completed Jobs</button>
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
                    <!-- Job Card 1 -->
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                            <!-- Assigned Tradesperson -->
                            <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                                <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                                <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                                </div>
                            </div>
                            <!-- Task Deadline -->
                            <div class="text-xs text-gray-600 pl-7 pr-7">
                                <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                                <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                            </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                            <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                                View Contract
                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
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
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">4 Active Jobs</h2>
                </div>
                <div class="space-y-5">
                    <!-- Job Card 1 -->
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                            <!-- Assigned Tradesperson -->
                            <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                                <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                                <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                                </div>
                            </div>
                            <!-- Task Deadline -->
                            <div class="text-xs text-gray-600 pl-7 pr-7">
                                <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                                <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                            </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                            <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                                View Contract
                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
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
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800 hidden" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">4 Active Jobs</h2>
                </div>
                <div class="space-y-5">
                    <!-- Job Card 1 -->
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                            <!-- Assigned Tradesperson -->
                            <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                                <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                                <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                                </div>
                            </div>
                            <!-- Task Deadline -->
                            <div class="text-xs text-gray-600 pl-7 pr-7">
                                <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                                <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                            </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                            <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                                View Contract
                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
                            View Contract
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-4 group-hover:stroke-[#db4a2b]">
                                <path d="M13 4.99982L1 4.99982" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        </div>
                    </div>
                    <div class="flex items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col gap-5">
                        <!-- Job Image -->
                        <img src="http://127.0.0.1:8000/images/job-1.png" alt="Job Image" class="w-35 max-md:w-full h-32 rounded-xl object-cover">
                        <!-- Job Details -->
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
                        <!-- Tradesperson & Task Deadline -->
                        <div class="grid md:grid-cols-2 grid-cols-1 h-full border-r border-l border-[#22222233]">
                        <!-- Assigned Tradesperson -->
                        <div class="text-xs text-gray-600 border-r border-[#22222233] px-8">
                            <span class="font-semibold text-[#072130] text-sm block mb-5">Assign Tradesperson:</span>
                            <div class="flex items-center gap-2">
                                <img src="http://127.0.0.1:8000/images/proposal.png" alt="Tradesperson" class="w-[54px] rounded-full object-cover">
                                <div>
                                    <p class="text-[#072130] text-sm mb-1">Brian Simmons</p>
                                    <p class="text-xs text-gray-500">Expert Plumber</p>
                                </div>
                            </div>
                        </div>
                        <!-- Task Deadline -->
                        <div class="text-xs text-gray-600 pl-7 pr-7">
                            <span class="font-semibold text-[#072130] text-sm block mb-4">Task Deadline:</span>
                            <div class="flex flex-col border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 px-3 py-3 rounded-3xl items-center"><span class="border-b border-[#22222233] pb-2 mb-2">Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
                        </div>
                        </div>
                        <!-- View Contract -->
                        <div class="flex flex-col gap-12 pr-7">
                        <a href="#" class="text-[#222222] text-xs ml-auto font-semibold hover:text-[#db4a2b] transition">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-[#222222] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
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
