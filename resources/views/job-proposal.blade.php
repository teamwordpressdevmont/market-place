@extends('layouts.app')
@section('content')
<div class="mt-5">
   <div class="grid grid-cols-1 mb-10 items-start">
      <div>
         <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Job Management</h1>
         <p class="font-semibold text-sm text-[#222222]">Here is your listings statistic report from January 05 - Feburary 05.</p>
      </div>
   </div>
    <div class="relative">
        <form id="searchForm" method="GET" action="http://127.0.0.1:8000/categories" class="relative flex  mb-5 md:w-[450px] w-full">
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
    <div class="rounded-xl pt-5 bg-white border border-[#22222233] h-fit">
        <h2 class="text-lg font-bold mb-6 text-[#222222] px-5">Recent Jobs</h2>
        <div id="table-container" class="overflow-x-auto ">
        <table class="genericTable w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 bg-[#eee] border-t border-b border-[#22222233]">
                <tr>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Job ID</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Job Name</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Type</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Start &amp; Delivery Date</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Status</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Tradeperson ID</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-[#e9e9e9]">
                    <th class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">#0016</th>
                    <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">Need to Fix Kitchen Pipe
                    <span class="bg-secondary text-[#EDE9D0] text-xs font-normal px-2 py-1 rounded-full dark:bg-primary ml-2">High-priority</span>
                    </td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#DB4A2B]">Urgent</td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">12-02-2025 - 18-03-2025</td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#DB4A2B]">Active</td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#DB4A2B]">alexmorgan@gmail.com 1 e</td>
                    <td class="px-6 py-5 whitespace-nowrap text-xs">
                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44" data-popper-placement="bottom-end">
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
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
