@extends('layouts.app')
@section('content')

<div class="bgShadow pt-10">
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <h4 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2 text-mat">Trade Person</h4>
    </div>
    <form id="searchForm" method="GET" action="{{ route('tradeperson.list') }}" class="relative flex  mb-5 md:w-96 w-full">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search for items">
        <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
        <div class="input-group-append absolute top-[13px] right-[100px]">
            <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="15px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
            </span>
        </div>
    </form>
    <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
        <table class="genericTable w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
                <tr>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">S.No</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">ID</th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Business Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        User Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right" width="115">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($tradeperson->isEmpty())
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="8">
                            No Trade Person data available.
                        </th>
                    </tr>
                @else
                @foreach($tradeperson as $index => $trade)
                    <tr class="bg-white border-b  border-gray-200">
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                            {{ ($tradeperson->currentPage() - 1) * $tradeperson->perPage() + $index + 1 }}
                        </th>
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                            {{ $trade->id }}
                        </th>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                            {{ $trade->first_name }} {{ $trade->last_name }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {{-- {{ $trade->user->id }} --}}
                            @if ($trade->user)
                                <button class="btn btn-sm {{ $trade->user->user_approved ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} tradeperson-user-approval"
                                    data-id="{{ $trade->user->id }}">
                                    {{ $trade->user->user_approved ? 'Approved' : 'Disapproved' }}
                                </button>
                            @else
                                <span>No User</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {{ $trade->phone }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {!! html_entity_decode($trade->address) !!}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {!! html_entity_decode($trade->description) !!}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {{--  <div class="flex gap-4">
                                <a href="{{ route('tradeperson.edit', $trade->id) }}">
                                    <svg fill="#0D0D0D" width="20px" height="20px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>edit</title>
                                        <path class="clr-i-outline clr-i-outline-path-1" d="M33.87,8.32,28,2.42a2.07,2.07,0,0,0-2.92,0L4.27,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13.09,32,33.87,11.24A2.07,2.07,0,0,0,33.87,8.32ZM12.09,30.2,4.32,31.83l1.77-7.62L21.66,8.7l6,6ZM29,13.25l-6-6,3.48-3.46,5.9,6Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </a>
                                <a href="{{ route('tradeperson.view', $trade->id) }}">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <title>View</title>
                                    <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" fill="blue"/><path d="M21.894 11.553C19.736 7.236 15.904 5 12 5c-3.903 0-7.736 2.236-9.894 6.553a1 1 0 0 0 0 .894C4.264 16.764 8.096 19 12 19c3.903 0 7.736-2.236 9.894-6.553a1 1 0 0 0 0-.894zM12 17c-2.969 0-6.002-1.62-7.87-5C5.998 8.62 9.03 7 12 7c2.969 0 6.002 1.62 7.87 5-1.868 3.38-4.901 5-7.87 5z" fill="blue"/></svg>
                                </a>
                                <a href="{{ route('tradeperson.delete', $trade->id) }}" onclick="return confirm('Are you sure you want to delete this Contractor?');">
                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <title>delete</title>
                                    <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="red"/></svg>
                                </a>
                            </div>  --}}
                            <div class="site_user_dropdown">
                                <div class="cursor-pointer w-[30px] ml-auto bg-[#eee] px-1 py-2 rounded-md flex justify-center items-center hover:bg-gray-300 transition" data-dropdown-toggle="userDropdown-action-{{ $trade->id }}" data-dropdown-placement="bottom-end">
                                    <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div id="userDropdown-action-{{ $trade->id }}" class="z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" aria-hidden="true" data-popper-placement="bottom-end">
                                    <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                        <li class="border-b border-[#d3d3d3]">
                                            <a href="{{ route('tradeperson.edit', $trade->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                        </li>
                                        <li class="border-b border-[#d3d3d3]">
                                            <a href="{{ route('tradeperson.view', $trade->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('tradeperson.delete', $trade->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
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
        {{ $tradeperson->appends(request()->all())->links() }}
    </div>
</div>
@endsection
