@extends('layouts.app')
@section('content')

<div class="mt-5">
    <div class="bgShadow pt-10 pb-8">
        <div class="grid grid-cols-1 mb-6 items-start">
        <div>
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Job Management</h1>
            <p class="font-semibold text-sm text-[#222222]">Here is your listings statistic report from January 05 - Feburary 05.</p>
        </div>
        </div>
        <div class="flex justify-between items-start">
            <div class="relative">
                <form id="searchForm" method="GET" action="http://127.0.0.1:8000/categories" class="relative flex md:w-[450px] w-full">
                    <input type="text" name="search" value="" id="table-search" class="rounded-tl-full rounded-bl-full bg-white text-[#222222] placeholder-[#222222] block flex-1 text-xs px-5" placeholder="Search for job">
                    <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-3 text-white text-xs border border-secondary hover:bg-primary transition rounded-tr-full rounded-br-full w-[120px]">Search</button>
                    <div class="input-group-append absolute top-[13px] right-[100px]">
                        <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="15px" height="20px">
                            <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path>
                        </svg>
                        </span>
                    </div>
                </form>
            </div>
            <div>
                <span class="text-sm font-bold mr-3">Sort by:</span>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-xs bg-white text-[#ABABAB] text-center inline-flex items-center rounded-xl px-3 py-3 w-[160px] justify-between" type="button">Urgent<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-[160px] hidden" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1740px, 279px);" data-popper-placement="bottom">
                    <ul class="bg-white text-sm border-1 border-[#ABABAB] rounded-xl" aria-labelledby="dropdownDefaultButton">
                    <li class="border-b border-[#ABABAB]">
                        <a href="#" class="block px-5 py-3 text-xs font-light transition">Acive</a>
                    </li>
                    <li class="border-b border-[#ABABAB]">
                        <a href="#" class="block px-5 py-3 text-xs font-light transition">Pending</a>
                    </li>
                    <li class="">
                        <a href="#" class="block px-5 py-3 text-xs font-light transition">Completed</a>
                    </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="rounded-xl pt-5 bg-white border border-[#22222233] h-fit">
        <h2 class="text-lg font-bold mb-6 text-[#222222] px-5">Recent Jobs</h2>
        <div id="table-container" class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 genericTable">
                <thead class="text-xs text-gray-700 bg-[#eee] border-t border-b border-[#22222233]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Order id
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            TradePerson Business
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Budget
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Action
                        </th>
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
                            <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">
                                {{ $order->order_id }}
                            </th>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">
                                {{ $order->title }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                {{ $order->order->customer->name ?? 'No Customer' }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                Active
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                {{ $order->order->tradeperson->business_name ?? 'No Business' }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                {{ $order->budget }}
                            </td>



                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots" data-popper-placement="bottom-end" class="inline-flex justify-end w-fit ml-auto"  type="button">
                                    <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                 <!-- Dropdown menu -->
                                <div id="dropdownDots" class="z-10 bg-white divide-gray-100 rounded-lg shadow-sm w-34 hidden" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1777px, 414px);" data-popper-placement="bottom-end">
                                    <ul class="text-sm text-[072130] justify-between" aria-labelledby="dropdownMenuIconButton">
                                       <li>
                                          <a href="#" class="block px-4 py-3 text-xs border-b border-[#22222233] hover:bg-[#222222] hover:text-white transition">Edit</a>
                                       </li>
                                       <li>
                                          <a href="#" class="block px-4 py-3 text-xs border-b border-[#22222233] hover:bg-[#222222] hover:text-white transition">View</a>
                                       </li>
                                       <li>
                                          <a href="#" class="block px-4 py-3 text-xs hover:bg-[#222222] hover:text-white transition">Delete</a>
                                       </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-[#e9e9e9]">
                            <th class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">#0016</th>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">Need Urgent Insulation Specialist<span class="bg-secondary text-[#EDE9D0] text-xs font-normal px-2 py-1 rounded-full dark:bg-primary ml-2">High-priority</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">Urgent</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">12-02-2025 - 18-03-2025</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#DB4A2B]">Active</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#DB4A2B]">alexmorgan@gmail.com</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs">
                            <a href="#" class="text-[#222222] text-xs font-semibold hover:text-[#db4a2b] transition flex">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
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
