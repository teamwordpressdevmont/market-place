@extends('layouts.app')
@section('content')

<div class="mt-5">
    <div class="bgShadow pt-10">
        <div class="grid grid-cols-1 mb-10 items-start">
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
    <div class="rounded-xl pt-5 bg-white border border-[#22222233] h-fit mt-8">
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
                            Customer
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
                                {{ $order->order->tradeperson->business_name ?? 'No Business' }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                {{ $order->budget }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-[#222222]">
                                <div class="flex gap-4">
                                    <a href="{{ route('joblisting.edit', $order->id) }}">
                                        <svg fill="#0D0D0D" width="20px" height="20px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>edit</title>
                                            <path class="clr-i-outline clr-i-outline-path-1" d="M33.87,8.32,28,2.42a2.07,2.07,0,0,0-2.92,0L4.27,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13.09,32,33.87,11.24A2.07,2.07,0,0,0,33.87,8.32ZM12.09,30.2,4.32,31.83l1.77-7.62L21.66,8.7l6,6ZM29,13.25l-6-6,3.48-3.46,5.9,6Z"></path>
                                            <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('joblisting.view', $order->id) }}">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <title>View</title>
                                        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" fill="blue"/><path d="M21.894 11.553C19.736 7.236 15.904 5 12 5c-3.903 0-7.736 2.236-9.894 6.553a1 1 0 0 0 0 .894C4.264 16.764 8.096 19 12 19c3.903 0 7.736-2.236 9.894-6.553a1 1 0 0 0 0-.894zM12 17c-2.969 0-6.002-1.62-7.87-5C5.998 8.62 9.03 7 12 7c2.969 0 6.002 1.62 7.87 5-1.868 3.38-4.901 5-7.87 5z" fill="blue"/></svg>
                                    </a>
                                    <a href="{{ route('joblisting.delete', $order->id) }}" onclick="return confirm('Are you sure you want to delete this Contractor?');">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <title>delete</title>
                                        <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="red"/></svg>
                                    </a>
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
