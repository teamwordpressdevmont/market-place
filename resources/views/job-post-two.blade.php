@extends('layouts.app')
@section('content')
<div class="mt-5">
   <div class="bgShadow pt-10 pb-8">
      <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-5 items-center">
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
            <h1 class="text-mat lg:text-4xl md:text-2xl text-xl font-semibold mt-2 mb-2">Need To Fix Kitchen Pipe</h1>
            <p class="text-[#ABABAB] text-xs">Published on: Feb 25, 2025</p>
            <div class="mt-4 flex gap-4 items-center">
               <h2 class="text-xs font-bold text-mat">Skills</h2>
               <span class="bg-[#ABABAB] text-white text-gray-700 px-4 py-1 leading[0] rounded-full text-xs hover:bg-secondary transition">Plumber</span>
            </div>
         </div>
         <div class="bg-[#EDE9D0] p-4 rounded-2xl flex items-end gap-4 justify-center xl:w-82 w-fit lg:ml-auto self-end">
            <p class="text-[#072130] text-sm font-semibold">Task Budget</p>
            <p class="lg:text-4xl md:text-2xl text-xl font-bold text-mat">$2500</p>
         </div>
      </div>
   </div>
   <div class="grid grid-cols-1 xl:grid-cols-3 2xl:gap-9 gap-6">
      <div class="lg:col-span-2 rounded-xl p-5 bg-white border border-[#22222233]">
         <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
            <h2 class="text-sm font-semibold">Job Description</h2>
            <p class="text-[#ABABAB] text-xs mt-2">John is seeking a skilled and reliable plumber for his kitchen pipes. The ideal candidate will be responsible for diagnosing and repairing issues with kitchen plumbing, including clogged drains, leaks, or damaged pipes...</p>
         </div>
         <div class="border-b border-[#e5e7eb] md:mb-8 mb-5 md:pb-8 pb-5">
            <h2 class="text-sm font-semibold">Contract Timeline</h2>
            <div class="flex md:flex-row flex-col md:gap-9 gap-4 border-2 border-dashed bg-[#F4F4F4] text-[#ABABAB] text-xs mt-2 md:w-fit w-100 md:px-9 px-5 py-4 rounded-2xl items-center"><span>Start Date: <strong class="text-mat font-light">12 Feb 2025</strong></span><span>End Date: <strong class="text-mat font-light">  18 Mar 2025</strong></span></div>
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
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-2 mt-2 xl:w-[58%]">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
               <img src="/public/images/job-post.png" alt="image" class="w-full">
            </div>
         </div>
      </div>
      <div>
         <div class="bg-[#FF904E] 2xl:px-12 px-6 pt-5 pb-9 text-center rounded-2xl mb-5">
            <h2 class="text-white md:text-2xl text-xl font-semibold">Invite Tradeperson</h2>
            <input type="text" placeholder="Plumber" class="w-full mt-4 py-3 px-4 bg-[#222222] text-white rounded-full text-xs">
         </div>
         <div class="bg-white rounded-xl border border-[#22222233] py-4">
            <h3 class="text-[#2C2C2C] font-semibold mb-4 text-sm border-b border-[#e5e7eb] px-5 pb-2">Recommended Tradepersons</h3>
            <div class="space-y-4 px-5">
               <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl shadow-sm">
                  <div class="flex-1 py-4">
                     <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                        <img src="/public/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
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
                     </div>
                  </div>
                  <a href="#" class="2xl:w-28 w-24 flex items-center justify-center border-l border-gray-200">
                  <span class="text-[#2C2C2C] sm:text-sm text-xs">Invite Sent</span>
                  </a>
               </div>
               <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl shadow-sm">
                  <div class="flex-1 py-4">
                     <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                        <img src="/public/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
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
                     </div>
                  </div>
                  <a href="#" class="2xl:w-28 w-24 flex items-center justify-center border-l border-gray-200">
                  <span class="text-[#2C2C2C] sm:text-sm text-xs">Invite Sent</span>
                  </a>
               </div>
               <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl shadow-sm">
                  <div class="flex-1 py-4">
                     <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                        <img src="/public/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
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
                     </div>
                  </div>
                  <a href="#" class="2xl:w-28 w-24 flex items-center justify-center border-l border-gray-200">
                  <span class="text-[#2C2C2C] sm:text-sm text-xs">Invite Sent</span>
                  </a>
               </div>
               <div class="flex bg-[#FCFCFA] border border-[#e5e7eb] rounded-xl shadow-sm">
                  <div class="flex-1 py-4">
                     <div class="flex justify-between items-start lg:px-4 px-3 flex-col sm:flex-row">
                        <img src="/public/images/proposal.png" alt="image" class="2xl:w-[75px] w-[60px] rounded-full object-cover xl:mr-3 sm:mr-2 mr-0 sm:mb-0 mb-3">
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
                     </div>
                  </div>
                  <a href="#" class="2xl:w-28 w-24 flex items-center justify-center border-l border-gray-200">
                  <span class="text-[#2C2C2C] sm:text-sm text-xs">Invite Sent</span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
