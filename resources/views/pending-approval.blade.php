@extends('layouts.app')
@section('content')
<div class="mt-5">
<div class="bgShadow pt-10 pb-8">
   <div class="grid grid-cols-1 mb-6 items-start">
      <div>
         <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Pending Approvals</h1>
         <p class="font-semibold text-sm text-mat">Here is your listings statistic report from January 05 - Feburary 05.</p>
      </div>



   </div>
   <div class="flex justify-between items-start">
      <div class="relative">
         {{-- <form id="searchForm" method="GET" action="{{ route('pending-approval') }}" class="relative flex md:w-[450px] w-full">
            <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white text-[#222222] placeholder-[#222222] block flex-1 text-xs px-5" placeholder="Search for job">
            <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-3 text-white text-xs border border-secondary hover:bg-primary transition rounded-tr-full rounded-br-full w-[120px]">Search</button>
            <div class="input-group-append absolute top-[10px] right-[130px]">
               <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="13px" height="20px">
                     <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
                  </svg>
               </span>
            </div>
         </form> --}}
      </div>

      <div class="tabsWrapper w-[450px]">
         <div class="tabsScroll  overflow-x-auto relative">
            <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
               <li role="presentation" class="w-full">
                  <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Accounts</button>
               </li>
               <li role="presentation" class="w-full">
                  <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Edited Jobs</button>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>


<div class="tabsWrapper">

   <div id="default-styled-tab-content">
      <div class="h-[400px] overflow-y-auto mt-3 rounded-lg text-xs text-[#ABABAB] pr-3" id="styled-profile" role="tabpanel" aria-labelledby="proposal-tab">

      <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
         <table class="genericTable w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
               <tr>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="90">Job ID</th>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="300">Job Title</th>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="150">Type</th>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Start & Delivery Date </th>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]"> </th>
                  <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right">Action</th>
               </tr>
            </thead>
            <tbody>
               @if($pendingOrders->isEmpty())
               <tr class="">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="8">
                     No Pending Orders data available.
                  </th>
               </tr>
               @else
               @foreach($pendingOrders as $orderDetail)
               <tr class="bg-white border-b border-[#e9e9e9]">
                  <th class="px-6 py-5 whitespace-nowrap text-xs   {{ $orderDetail && $orderDetail->urgent ? 'font-bold text-[#DB4A2B]' : 'font-normal  text-[#222222]' }}">#{{ $orderDetail->order->id }}</th>
                  <td class="px-6 py-5 whitespace-nowrap text-xs font-bold {{ $orderDetail && $orderDetail->urgent ? 'text-[#DB4A2B]' : 'text-[#222222]' }}">{{ $orderDetail->title }}</td>
                  <td class="px-6 py-5 whitespace-nowrap text-xs  {{ $orderDetail && $orderDetail->urgent ? 'font-bold text-[#DB4A2B]' : 'text-[#222222]' }}">
                      @if($orderDetail)
                           {{ $orderDetail->urgent ? 'Urgent' : 'Flexible' }}
                        @endif
                  </td>
                  <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat">{{ $orderDetail->job_start_timeline }} - {{ $orderDetail->job_end_timeline }}</td>
                  <td class="px-6 py-5 whitespace-nowrap text-end"><a href="{{ route('tradeperson.view', $orderDetail->id) }}" class="bg-[#222222] text-white font-normal text-xs px-5 py-2 leading-[0] rounded-full hover:bg-[#24C500] transition">Review Profile</a></td>
                  <td class="px-6 py-5 whitespace-nowrap text-xs text-right">
                     <button id="dropdownMenuIconButton" data-dropdown-toggle="dd-1" data-popper-placement="bottom-start" class="inline-flex justify-end w-fit ml-auto  px-5" type="button">
                           <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </svg>
                     </button>
                        <!-- Dropdown menu -->
                        <div id="dd-1" class="absolute top-full right-0 z-10 bg-white rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1307px, 616px);">
                           <ul class="bg-white text-sm rounded-xl overflow-hidden" aria-labelledby="dropdownMenuIconButton">
                              <li class="border-b border-[#d3d3d3]">
                                 <a href="" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">Edit</a>
                              </li>
                              <li class="border-b border-[#d3d3d3]">
                                 <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">View</a>
                              </li>
                              <li class="">
                                 <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">Delete</a>
                              </li>
                           </ul>
                        </div>

                  </td>

               </tr>
               @endforeach
               @endif



               </tbody>
         </table>
      </div>

      </div>
      <div class="h-[400px] overflow-y-auto mt-3 rounded-lg text-xs text-[#ABABAB] hidden pr-3" id="styled-settings" role="tabpanel" aria-labelledby="reviews-tab">

      <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
         <table class="genericTable w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
                <tr>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]" width="90">ID</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]" width="200">Tradeperson Name</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]" width="150">Skills</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Join Date</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Email ID</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Location</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Phone No</th>
                    {{-- <th class="px-6 py-3 text-[#ABABAB] font-[500]">Package</th> --}}
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]"></th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Action</th>
                </tr>
            </thead>
            <tbody>
               @if($pendingOrders->isEmpty())
               <tr class="">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="8">
                     No Pending Orders data available.
                  </th>
               </tr>
               @else
                @foreach($pendingOrders as $orderDetail)
                    <tr class="bg-white border-b border-[#e9e9e9]">
                        <th class="px-6 py-5 whitespace-nowrap text-xs text-mat">#{{ $orderDetail->id }}</th>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{ $orderDetail->order->tradeperson->first_name }} {{ $orderDetail->order->tradeperson->last_name }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{ $orderDetail->order->categories->pluck('name')->join(', ')  }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{ $orderDetail->job_start_timeline }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{  $orderDetail->order->tradeperson->user->email }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{ $orderDetail->order->tradeperson->address }}</td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat">{{ $orderDetail->order->tradeperson->phone }}</td>
                        {{-- <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat">{{ ucfirst($orderDetail->package) }}</td> --}}
                        <td class="px-6 py-5 whitespace-nowrap text-end">
                            <a href="{{ route('tradeperson.view', $orderDetail->id) }}" 
                               class="bg-[#222222] text-white font-normal text-xs px-5 py-2 leading-[0] rounded-full hover:bg-[#24C500] transition">
                               Review Profile
                            </a>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-right">
                            <button id="dropdownMenuIconButton-{{ $orderDetail->id }}" data-dropdown-toggle="dd-{{ $orderDetail->id }}" data-popper-placement="bottom-start" class="inline-flex justify-end w-fit ml-auto px-5" type="button">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div id="dd-{{ $orderDetail->id }}" class="absolute top-full right-0 z-10 bg-white rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">View</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-mat">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
            </tbody>
        </table>
      </div>
    </div>
      </div>
   </div>
</div>


@endsection
