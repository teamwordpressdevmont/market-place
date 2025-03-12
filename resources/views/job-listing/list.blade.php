@extends('layouts.app')
@section('content')
<div class="mt-5">
<div class="bgShadow pt-10 pb-8">
   <div class="grid grid-cols-1 mb-6 items-start">
      <div>
         <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Job Management</h1>
         <p class="font-semibold text-sm text-mat">Here is your listings statistic report from January 05 - Feburary 05.</p>
      </div>
   </div>
   <div class="flex justify-between items-start">
      <div class="relative">
         <form id="searchForm" method="GET" action="{{ route('joblisting.list') }}" class="relative flex md:w-[450px] w-full">
            <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white text-[#222222] placeholder-[#222222] block flex-1 text-xs px-5" placeholder="Search for job">
            <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-3 text-white text-xs border border-secondary hover:bg-primary transition rounded-tr-full rounded-br-full w-[120px]">Search</button>
            <div class="input-group-append absolute top-[10px] right-[130px]">
               <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="13px" height="20px">
                     <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
                  </svg>
               </span>
            </div>
         </form>
      </div>
      <div class="relative">
         <span class="text-sm font-bold mr-3">Sort by:</span>
         <button id="dropdownDefaultButton" class="font-light text-xs bg-white text-[#ABABAB] border border-[#d3d3d3] text-center inline-flex items-center rounded-full px-3 py-1.5 w-[163px] justify-between">
             all
         </button>
         <!-- Dropdown menu -->
         <div id="dropdown" class="absolute top-full right-0 z-10 bg-white rounded-xl w-[122px] border border-[#d3d3d3] hidden">
             <ul class="bg-white text-sm rounded-xl overflow-hidden">
                 @foreach ($OrderStatus as $status)
                 <li class="{{ !$loop->last ? 'border-b border-[#d3d3d3]' : '' }}">
                     <a href="javascript:void(0)" class="block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222] order-status-filter" data-status="{{ $status->id }}">
                         {{ $status->status }}
                     </a>
                 </li>
                 @endforeach
             </ul>
         </div>
     </div>
   </div>
</div>
<div class="rounded-xl pt-5 bg-white border border-[#22222233] h-fit">
   <h2 class="text-lg font-bold mb-6 text-mat px-5">Recent Jobs</h2>
   <div id="table-container" class="overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 genericTable">
         <thead class="text-xs text-gray-700 bg-[#eee] border-t border-b border-[#22222233]">
            <tr>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Job ID</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Job name</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Type</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Start & Delivery Date</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Status</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Tradeperson ID</th>
               <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right" width="115">Action</th>
            </tr>
         </thead>
         <tbody>
            @if($OrderDetails->isEmpty())
            <tr class="">
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="8">
                  No Job Listing data available.
               </th>
            </tr>
            @else
            @foreach($OrderDetails as $index => $order)
            <tr class="border-b border-[#e9e9e9]">
               <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold {{ $order && $order->urgent ? 'text-[#DB4A2B]' : 'text-[#222222]' }}">
                  #{{ $order->order_id }}
               </th>
               <td class="px-6 py-5 whitespace-nowrap text-xs font-bold {{ $order && $order->urgent ? 'text-[#DB4A2B]' : 'text-[#222222]' }}">
                  {{ $order->title }}
                  @if($order->urgent)
                     <span class="bg-secondary text-[#EDE9D0] text-xs font-normal px-2 py-1 rounded-full dark:bg-primary ml-2">
                        High-priority
                     </span>
                  @endif
               </td>
               <td class="px-6 py-5 whitespace-nowrap text-xs {{ $order && $order->urgent ? 'font-bold text-[#DB4A2B]' : 'font-normal text-[#222222]' }}">
                  @if($order)
                     {{ $order->urgent ? 'Urgent' : 'Flexible' }}
                  @endif
               </td>
               <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                  {{ $order->job_start_timeline }} -  {{ $order->job_end_timeline }}
               </td>
               <td class="px-6 py-5 whitespace-nowrap text-xs font-normal
                  @if($order->order->OrderStatus->status == 'Pending') text-yellow-500
                  @elseif($order->order->OrderStatus->status == 'Active') text-orange-500
                  @elseif($order->order->OrderStatus->status == 'Completed') text-green-500
                  @elseif($order->order->orderStatus->status == 'Processing') text-[#FFA500]
                  @elseif($order->order->orderStatus->status == 'In Progress') text-[#007BFF]
                  @else text-[#222222] @endif">
                  {{ $order->order->OrderStatus->status }}
               </td>
               <td class="px-6 py-5 whitespace-nowrap text-xs font-normal {{ $order && $order->urgent ? 'font-bold text-[#DB4A2B]' : 'text-[#222222]' }}">
                  {{ $order->order->tradeperson->user->email }}
               </td>
                 <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222] text-center">
                  {{--  <button data-dropdown-toggle="dropdownDots-{{ $order->id }}" class="inline-flex justify-end w-fit ml-auto" type="button">
                      <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                  </button>

                  <div id="dropdownDots-{{ $order->id }}" class="dropdown-menu absolute top-full right-0 z-10 bg-white rounded-xl w-[122px] border border-[#d3d3d3] hidden">
                      <ul class="bg-white text-sm rounded-xl overflow-hidden">
                          <li class="border-b border-[#d3d3d3]">
                              <a href="{{ route('joblisting.edit', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                          </li>
                          <li class="border-b border-[#d3d3d3]">
                              <a href="{{ route('joblisting.view', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                          </li>
                          <li class="">
                              <a href="{{ route('joblisting.delete', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
                          </li>
                      </ul>
                  </div>  --}}
                    <div class="site_user_dropdown">
                        <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-{{ $order->id }}" data-dropdown-placement="bottom-end">
                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div id="userDropdown-action-{{ $order->id }}" class="z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                            <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                <li class="border-b border-[#d3d3d3]">
                                    <a href="{{ route('joblisting.edit', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                </li>
                                <li class="border-b border-[#d3d3d3]">
                                    <a href="{{ route('joblisting.view', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('joblisting.delete', $order->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
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
   <div class="mt-4" id="pagination-container">
      {{ $OrderDetails->appends(request()->all())->links() }}
   </div>
</div>
@endsection
