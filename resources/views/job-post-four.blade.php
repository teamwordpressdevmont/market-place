@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="grid grid-cols-1 xl:grid-cols-2 lg:gap-8 gap-5 mt-8 items-end">
       <div class="">
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
       <div class="flex md:items-end md:gap-12 gap-5 xl:justify-end md:flex-row flex-col items-left">
          <a href="#" class="bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 hover:bg-primary transition">
             <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 14.6667C5.23989 14.6667 6.12719 14.2618 7.0329 13.4519M7.0329 13.4519C7.8052 12.7613 8.59089 11.7763 9 10.4968C9.88889 7.71688 4.55556 10.4968 6.33333 12.8134C6.55207 13.0985 6.78763 13.3068 7.0329 13.4519ZM7.0329 13.4519C8.10138 14.084 9.35406 13.5161 10.2028 12.863C10.4621 12.6634 10.5918 12.5636 10.6692 12.5947C10.7466 12.6257 10.7919 12.8043 10.8824 13.1615C11.1721 14.3046 12.0277 15.2274 13 13.7404" stroke="#EDE9D0" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12.334 8.66675L12.334 5.26056C12.334 4.11766 12.334 3.54621 12.1553 3.08981C11.8682 2.35607 11.2608 1.77731 10.4908 1.50365C10.0118 1.33342 9.41215 1.33342 8.21277 1.33342C6.11386 1.33342 5.0644 1.33342 4.22622 1.63132C2.87874 2.11024 1.81586 3.12307 1.31327 4.4071C1.00065 5.2058 1.00065 6.20584 1.00065 8.20592L1.00065 9.92404C1.00065 11.9958 1.00065 13.0317 1.56578 13.7511C1.7277 13.9572 1.91973 14.1402 2.13603 14.2945C2.38076 14.469 2.66039 14.587 3.00065 14.6667" stroke="#EDE9D0" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M0.999349 8C0.999349 6.7727 1.99427 5.77778 3.22157 5.77778C3.66543 5.77778 4.18871 5.85555 4.62026 5.73992C5.00369 5.63718 5.30319 5.33768 5.40593 4.95424C5.52157 4.52269 5.44379 3.99941 5.44379 3.55556C5.44379 2.32826 6.43872 1.33333 7.66602 1.33333" stroke="#EDE9D0" stroke-linecap="round" stroke-linejoin="round"></path>
             </svg>
             View Contract
          </a>
          <div class="bg-[#EDE9D0] p-4 rounded-2xl flex items-end gap-4 justify-center xl:w-[280px] w-fit">
             <p class="text-[#072130] text-sm font-semibold">Task Budget</p>
             <p class="lg:text-4xl md:text-2xl text-xl font-bold text-[#222222]">$2500</p>
          </div>
       </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-3 2xl:gap-9 gap-6 mt-5">
       <div class="rounded-xl p-5 bg-white border border-[#22222233] h-fit">
          <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
             <h2 class="text-sm font-semibold">Job Description</h2>
             <p class="text-[#ABABAB] text-xs mt-2">John is seeking a skilled and reliable plumber for his kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes...</p>
          </div>
          <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
             <h2 class="text-sm font-semibold">Contract Timeline</h2>
             <div class="flex md:flex-row flex-col md:gap-9 gap-4 border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 md:px-9 px-5 py-4 rounded-2xl items-center"><span>Start Date: <strong class="text-[#222222] font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-[#222222] font-light">  18 Mar 2025</strong></span></div>
          </div>
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
       <div class="bg-white rounded-2xl border border-[#22222233] py-4">
          <h3 class="text-[#2C2C2C] text-sm font-semibold text-base border-b border-[#e5e7eb] px-5 pb-3">Assign Tradeperson:</h3>
          <div class="space-y-4 px-5">
             <div class="flex border-b border-[#e5e7eb]">
                <div class="flex-1 py-4">
                   <div class="flex justify-between sm:items-center items-start flex-col sm:flex-row">
                      <img src="http://127.0.0.1:8000/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
                      <div class="flex flex-1 gap-4 justify-between md:items-center sm:flex-row flex-col">
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
             <div class="border-b border-[#e5e7eb] pb-4 text-center">
                <a href="#" class="bg-[#FF904E] text-white px-6 py-3 rounded-full text-sm inline-block w-full max-w-lg hover:bg-primary transition">
                Message
                </a>
             </div>
             <div class="tabsWrapper">
                <div class="tabsScroll w-full pb-2 overflow-x-auto relative">
                   <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                      <li role="presentation" class="w-full">
                         <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                      </li>
                      <li role="presentation" class="w-full">
                         <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Reviews</button>
                      </li>
                   </ul>
                </div>
                <div id="default-styled-tab-content">
                   <div class="mt-6 rounded-lg text-xs text-[#ABABAB] hidden" id="styled-profile" role="tabpanel" aria-labelledby="proposal-tab">
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
                   <div class="mt-6 rounded-lg text-xs text-[#ABABAB]" id="styled-settings" role="tabpanel" aria-labelledby="reviews-tab">
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
                </div>
             </div>
          </div>
       </div>
       <div class="bg-white rounded-2xl border border-[#22222233] py-4 h-fit">
          <h3 class="text-[#2C2C2C] font-semibold mb-7 text-sm border-b border-[#e5e7eb] px-5 pb-2">Project Milestones</h3>
          <p class="text-[#ABABAB] mb-12 text-sm px-5">This project involves diagnosing and repairing kitchen plumbing issues, including clogged drains, leaks, and damaged pipes. The goal is to ensure a fully functional and leak-free kitchen plumbing system that operates safely and efficiently.</p>
          <div class="px-5 mb-12">
             <div class="flex items-start space-x-4">
                <div class="flex flex-col items-center">
                   <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <circle cx="14" cy="14" r="14" fill="#20AD00"></circle>
                         <circle cx="14" cy="14" r="10" fill="#24C500"></circle>
                         <path d="M17.073 10L13.1148 14.9829L10.3804 13.2L9 14.8801L13.6615 18L19 11.28L17.073 10Z" fill="white"></path>
                      </svg>
                   </div>
                   <div class="h-10 w-0.5 bg-gray-300"></div>
                </div>
                <div>
                   <h3 class="font-semibold text-xs text-black mb-1">1st Milestone</h3>
                   <p class="text-black text-xs text-light">Diagnosis &amp; Inspection</p>
                </div>
             </div>
             <div class="flex items-start space-x-4">
                <div class="flex flex-col items-center">
                   <div class="w-6 h-6 bg-orange-500 rounded-full flex items-center justify-center">
                      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <circle cx="14" cy="14" r="14" fill="#FF904E"></circle>
                         <circle cx="14" cy="14" r="10" fill="#DB4A2B"></circle>
                         <path d="M17.073 10L13.1148 14.9829L10.3804 13.2L9 14.8801L13.6615 18L19 11.28L17.073 10Z" fill="white"></path>
                      </svg>
                   </div>
                   <div class="h-10 w-0.5 bg-gray-300"></div>
                </div>
                <div>
                   <h3 class="font-semibold text-xs text-black mb-1">2nd Milestone</h3>
                   <p class="text-black text-xs text-light">Material Procurement <span class="ml-4 text-gray-400 text-xs">4 days left</span></p>
                </div>
             </div>
             <div class="flex items-start space-x-4 opacity-50">
                <div class="flex flex-col items-center">
                   <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <circle cx="14" cy="14" r="14" fill="#F5F5F5"></circle>
                         <circle cx="14" cy="14" r="10" fill="#DEDEDE"></circle>
                         <path d="M17.073 10L13.1148 14.9829L10.3804 13.2L9 14.8801L13.6615 18L19 11.28L17.073 10Z" fill="white"></path>
                      </svg>
                   </div>
                   <div class="h-10 w-0.5 bg-gray-300"></div>
                </div>
                <div>
                   <h3 class="font-semibold text-xs text-[#ABABAB] mb-1">3rd Milestone</h3>
                   <p class="text-[#ABABAB] text-xs font-light">Repair &amp; Installation</p>
                </div>
             </div>
             <div class="flex items-start space-x-4 opacity-50">
                <div class="flex flex-col items-center">
                   <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center">
                      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <circle cx="14" cy="14" r="14" fill="#F5F5F5"></circle>
                         <circle cx="14" cy="14" r="10" fill="#DEDEDE"></circle>
                         <path d="M17.073 10L13.1148 14.9829L10.3804 13.2L9 14.8801L13.6615 18L19 11.28L17.073 10Z" fill="white"></path>
                      </svg>
                   </div>
                </div>
                <div>
                   <h3 class="font-semibold text-xs text-[#ABABAB] mb-1">4th Milestone</h3>
                   <p class="text-[#ABABAB] text-xs font-light">Final Testing &amp; Cleanup</p>
                </div>
             </div>
          </div>
          <div class="text-center px-5 mb-5">
             <a href="#" class="flex justify-center bg-[#ABABAB] text-white px-6 py-3 rounded-full text-sm inline-block w-full max-w-lg hover:bg-primary transition mb-2">Job Completed</a>
             <a href="#" class="flex justify-center bg-[#FF904E] text-white px-6 py-3 rounded-full text-sm inline-block w-full max-w-lg hover:bg-primary transition" style="
                align-items: center;
                /* justify-content: center; */
                /* display: flex; */
                ">Extend Date</a>
          </div>
          <p class="px-5 font-semibold text-xs text-[#ABABAB]">Job completed?<span class="text-black"> Leave a review</span></p>
       </div>
    </div>
</div>
@endsection
