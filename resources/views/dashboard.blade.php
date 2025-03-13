@extends('layouts.app')
@section('content')
<div class="mt-5">
   <div class="grid grid-cols-1 mb-10 items-start">
      <div>
         <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Welcome, DM</h1>
         <p class="font-semibold text-sm text-mat">Here is your listings statistic report from January 05 - Feburary 05.</p>
      </div>
   </div>
   <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 xl:gap-9 gap-5 mt-6">

    <div class="bg-white py-5 xl:px-8 px-4 rounded-xl flex justify-between border border-[#22222233]">
       <div>
          <h3 class="xl:text-3xl text-xl font-bold text-mat md:mb-12 mb-6">    {{ $totalBudget }}         </h3>
          <p class="text-mat font-bold text-sm">Total Earnings</p>
       </div>
       <div>
          <svg width="69" height="73" viewBox="0 0 69 73" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M60.4377 39.9583V29.5833C60.4377 18.1714 60.4377 12.4655 56.8924 8.92023C53.3472 5.375 47.6412 5.375 36.2293 5.375H25.8543C14.4424 5.375 8.73645 5.375 5.19122 8.92023C1.646 12.4655 1.646 18.1714 1.646 29.5833V46.875C1.646 58.2869 1.646 63.9929 5.19122 67.5381C8.73645 71.0833 14.4424 71.0833 25.8543 71.0833H31.0418" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M48.3333 1.91699V8.83366M31.0417 1.91699V8.83366M13.75 1.91699V8.83366" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M39.6875 64.1673C39.6875 64.1673 43.1458 64.1673 46.6042 71.084C46.6042 71.084 57.5895 53.7923 67.3542 50.334" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M17.2085 46.8757H31.0418M17.2085 29.584H44.8752" stroke="#222222" stroke-width="2" stroke-linecap="round"></path>
          </svg>
       </div>
    </div>
    <div class="bg-white py-5 xl:px-8 px-4 rounded-xl flex justify-between border border-[#22222233]">
       <div>
          <h3 class="xl:text-3xl text-xl font-bold text-mat md:mb-12 mb-6">10,000</h3>
          <p class="text-mat font-bold text-sm">Active users</p>
       </div>
       <div>
          <svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M39.9582 70.9129C38.8207 71.0258 37.667 71.0837 36.4998 71.0837C17.4 71.0837 1.9165 55.6002 1.9165 36.5003C1.9165 17.4005 17.4 1.91699 36.4998 1.91699C55.5997 1.91699 71.0832 17.4005 71.0832 36.5003C71.0832 37.6675 71.0254 38.8212 70.9124 39.9587" stroke="#222222" stroke-width="2" stroke-linecap="round"></path>
             <path d="M20.9375 53.7923C25.7877 48.7123 33.115 46.544 39.9583 47.5468M45.1289 27.8548C45.1289 32.6298 41.2525 36.5007 36.4707 36.5007C31.6889 36.5007 27.8126 32.6298 27.8126 27.8548C27.8126 23.0799 31.6889 19.209 36.4707 19.209C41.2525 19.209 45.1289 23.0799 45.1289 27.8548Z" stroke="#222222" stroke-width="2" stroke-linecap="round"></path>
             <circle cx="58.9792" cy="58.9792" r="12.1042" stroke="#222222" stroke-width="2"></circle>
          </svg>
       </div>
    </div>
    <div class="bg-white py-5 xl:px-8 px-4 rounded-xl flex justify-between border border-[#22222233]">
       <div>
          <h3 class="xl:text-3xl text-xl font-bold text-mat md:mb-12 mb-6">{{ $completedJobs }}</h3>
          <p class="text-mat font-bold text-sm">Completed Jobs</p>
       </div>
       <div>
          <svg width="69" height="73" viewBox="0 0 69 73" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M60.4377 39.9583V29.5833C60.4377 18.1714 60.4377 12.4655 56.8924 8.92023C53.3472 5.375 47.6412 5.375 36.2293 5.375H25.8543C14.4424 5.375 8.73645 5.375 5.19122 8.92023C1.646 12.4655 1.646 18.1714 1.646 29.5833V46.875C1.646 58.2869 1.646 63.9929 5.19122 67.5381C8.73645 71.0833 14.4424 71.0833 25.8543 71.0833H31.0418" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M48.3333 1.91699V8.83366M31.0417 1.91699V8.83366M13.75 1.91699V8.83366" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M39.6875 64.1673C39.6875 64.1673 43.1458 64.1673 46.6042 71.084C46.6042 71.084 57.5895 53.7923 67.3542 50.334" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
             <path d="M17.2085 46.8757H31.0418M17.2085 29.584H44.8752" stroke="#222222" stroke-width="2" stroke-linecap="round"></path>
          </svg>
       </div>
    </div>
 </div>
   <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 xl:gap-9 gap-5 mt-8">
    <div class="2xl:col-span-2 col-span-1 rounded-xl md:pt-5 pt-4 bg-white border border-[#22222233] h-fit">
        <h2 class="md:text-lg text-md font-bold md:mb-6 mb-4 text-mat px-5">Recent Jobs</h2>
        <div id="table-container" class="overflow-x-auto ">
           <table class="genericTable w-full text-sm text-left rtl:text-right text-gray-500">
              <thead class="text-xs text-gray-700 bg-[#eee] border-t border-b border-[#22222233]">
                 <tr>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] whitespace-nowrap">Job ID</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Job Name</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Type</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Email ID</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right">Action</th>
                 </tr>
              </thead>
              <tbody>
               @if($orders->isEmpty())
               <tr class="border-b border-[#e9e9e9]">
                  <th class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]" colspan="6">
                       No data available.
                   </th>
               </tr>
               @else
               @foreach ($orders as $order)
                  <tr class="border-b border-[#e9e9e9]">
                     <th class="px-6 py-5 whitespace-nowrap text-xs font-bold  {{ $order->orderDetail && $order->orderDetail->urgent ? 'text-[#DB4A2B]' : 'text-mat' }}">#{{ $order->id }}</th>
                     <td class="px-6 py-5 whitespace-nowrap text-xs font-bold {{ $order->orderDetail && $order->orderDetail->urgent ? 'text-[#DB4A2B]' : 'text-mat' }}">{{ optional($order->orderDetail)->title }}</td>
                     <td class="px-6 py-5 whitespace-nowrap text-xs font-bold {{ $order->orderDetail && $order->orderDetail->urgent ? 'text-[#DB4A2B]' : 'text-mat' }}">
                        @if($order->orderDetail)
                           {{ $order->orderDetail->urgent ? 'Urgent' : 'Flexible' }}
                        @endif
                     </td>
                     <td class="px-6 py-5 whitespace-nowrap text-xs font-normal {{ $order->orderDetail && $order->orderDetail->urgent ? 'text-[#DB4A2B]' : 'text-mat' }}">{{ $order->tradeperson->user->email }}</td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs text-right">
                         <div class="site_user_dropdown">
                            <div class="cursor-pointer w-[30px] ml-auto bg-[#eee] px-1 py-2 rounded-md flex justify-center items-center hover:bg-gray-300 transition" data-dropdown-toggle="userDropdown-action-{{ $order->id }}" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-{{ $order->id }}" class="z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-mat hover:text-white text-mat">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-mat hover:text-white text-mat">View</a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-mat hover:text-white text-mat">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                     </td>

                  </tr>

               @endforeach
               @endif
              </tbody>
           </table>
        </div>
     </div>
      <div class="rounded-xl md:p-5 md:px-5 px-4 py-4 bg-white border border-[#22222233]">
         <div class="flex justify-between items-center mb-4">
            <h2 class="md:text-lg text-md font-bold">Pending Approvals</h2>
            <a href="#" class="group text-[#ABABAB] text-xs flex items-center font-semibold hover:text-[#db4a2b] transition">
               View All
               <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2 group-hover:stroke-[#db4a2b]">
                  <path d="M13 4.99988L1 4.99988" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M9.25003 8.75C9.25003 8.75 13 5.98817 13 4.99997C13 4.01177 9.25 1.25 9.25 1.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               </svg>
            </a>
         </div>
         <div class="tabsWrapper">
            <div class="tabsScroll w-full overflow-x-auto relative">
               <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300" role="tablist">
                  <li role="presentation" class="w-full">
                     <button class="w-full transition text-xs text-[#ababab] font-semibold px-5 md:py-3 py-2 rounded-full" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Accounts</button>
                  </li>
                  <li role="presentation" class="w-full">
                     <button class="w-full transition text-xs text-[#ababab] font-semibold px-5 md:py-3 py-2 rounded-full text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Edited Jobs</button>
                  </li>
               </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="min-h-[400px] overflow-y-auto mt-3 rounded-lg text-xs text-[#ABABAB] pr-3" id="styled-profile" role="tabpanel" aria-labelledby="proposal-tab">
                @if($pendingOrders->isNotEmpty())
                  @foreach($pendingOrders as $order)

                     @php
                           $initials = strtoupper(substr($order->title, 0, 1)) . (strpos($order->title, ' ') ? strtoupper(substr($order->title, strpos($order->title, ' ') + 1, 1)) : '');
                     @endphp

                     <div class="flex md:items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col py-4 px-3 mb-3 md:gap-0 gap-3">
                           {{-- <img src="{{ $order->image }}" alt="Job Image" class=" rounded-xl object-cover"> --}}
                           <div class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 text-white font-bold">
                              {{ $initials }}
                        </div>
                           <div class="lg:px-4 md:px-3 flex-1">
                              <h3 class="text-xs font-bold mb-1 text-mat">{{ $order->title }}<span class="font-light"> create his profile</span></h3>
                              <p class="text-xs text-[#9A9FA5] font-light">{{ $order->created_at->diffForHumans() }}</p>
                           </div>
                           <a href="#" class="bg-mat text-white text-xs px-4 py-3 leading-[0] rounded-full hover:bg-[#24C500] transition font-[500] w-fit">Review Profile</a>
                     </div>

                  @endforeach
                  @else
                     <p class="text-center text-gray-500 p-5">No pending orders found.</p>
                  @endif
                </div>
                <div class="min-h-[400px] overflow-y-auto mt-3 rounded-lg text-xs text-[#ABABAB] hidden pr-3" id="styled-settings" role="tabpanel" aria-labelledby="reviews-tab">
                @if($pendingOrders->isNotEmpty())
                  @foreach($pendingOrders as $order)

                  @php
                        $initials = strtoupper(substr($order->title, 0, 1)) . (strpos($order->title, ' ') ? strtoupper(substr($order->title, strpos($order->title, ' ') + 1, 1)) : '');
                  @endphp

                       <div class="flex md:items-center rounded-2xl border border-[#EDE9D0] bg-[#F4F4F4] md:flex-row flex-col py-4 px-3 mb-3 md:gap-0 gap-3">
                              {{-- <img src="/public/images/profile.png" alt="Job Image" class=" rounded-xl object-cover"> --}}
                              <div class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 text-white font-bold">
                                 {{ $initials }}
                           </div>
                              <div class="lg:px-4 md:px-3 flex-1">
                              <h3 class="text-xs font-bold mb-1 text-mat">{{ $order->title }} </h3>
                              <p class="text-xs text-[#9A9FA5] font-light">{{ $order->created_at->diffForHumans() }}</p>
                              </div>
                              <a href="#" class="bg-mat text-white text-xs px-4 py-3 leading-[0] rounded-full hover:bg-[#24C500] transition font-[500] w-fit">Review Job</a>
                        </div>

                  @endforeach
                  @else
                     <p class="text-center text-gray-500 p-5">No pending orders found.</p>
                  @endif
                  </div>
                </div>
            </div>
         </div>
      </div>
   </div>
@endsection
