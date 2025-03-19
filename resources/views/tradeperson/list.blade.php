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
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        About me
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
                            {{ $trade->phone }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {!! html_entity_decode($trade->address) !!}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                            {!! html_entity_decode(Str::words($trade->about_me, 10, '...')) !!}

                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
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
