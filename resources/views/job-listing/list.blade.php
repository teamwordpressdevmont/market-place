@extends('layouts.app')
@section('content')

    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <h4 class="font-semibold text-4xl">Job Listing</h4>
    </div>
    <form id="searchForm" method="GET" action="{{ route('joblisting.list') }}" class="relative flex  mb-5 md:w-96 w-full">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search for items">
        <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
        <div class="input-group-append absolute top-[13px] right-[90px]">
            <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
            </span>
        </div>
    </form>
    <div id="table-container">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500"> 
            <thead class="text-xs text-gray-700 bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Order id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        TradePerson Business
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Budget
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>   
            <tbody>
                @if($OrderDetails->isEmpty())
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="8">
                            No Job Listing data available.
                        </th>
                    </tr>
                @else
                @foreach($OrderDetails as $index => $order)
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap">
                            {{ $order->order_id }}
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $order->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->order->customer->name ?? 'No Customer' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->order->tradeperson->business_name ?? 'No Business' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $order->budget }}
                        </td>
                        <td class="px-6 py-4">
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
@endsection