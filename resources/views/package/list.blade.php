@extends('layouts.app')

@section('content')



    @if(session('success'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto cursor-pointer -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif


    {{--  <div class="bgShadow pt-10">
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <h1 class="font-semibold text-4xl">Package List</h1>
            <a href="{{ route('package.addEdit') }}" class="md:ml-auto  bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">
                Add New <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                    <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"></path>
                </svg>
            </a>

        </div>
        <div class="relative overflow-x-auto">
            <form id="searchForm" method="GET" action="{{ route('package.list') }}" class="relative flex  mb-5 md:w-96 w-full">
                <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search for items">
                <button  type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
                <div class="input-group-append absolute top-[13px] right-[90px]">
                    <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
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
                                <a href="{{ route('package.list', array_merge(request()->all(), ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                    Name
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Description</th>
                            <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Price</th>
                            <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($packages->isEmpty())
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="8">
                            No data available.
                        </th>
                    </tr>
                    @else
                    @foreach($packages as $index => $package)
                        <tr class="bg-white border-b border-gray-200">
                             <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                                {{ ($packages->currentPage() - 1) * $packages->perPage() + $index + 1 }}
                            </th>
                            <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                                {{ $package->id }}
                            </th>
                            <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">{{ $package->name }}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{!! html_entity_decode($package->description) !!}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{{ $package->price }}</td>
                            <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                                <div class="flex gap-4">
                                        <a href="{{ route('package.edit', $package->id) }}" class="edit_package">
                                        <svg fill="#0D0D0D" width="20px" height="20px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>edit</title>
                                            <path class="clr-i-outline clr-i-outline-path-1" d="M33.87,8.32,28,2.42a2.07,2.07,0,0,0-2.92,0L4.27,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13.09,32,33.87,11.24A2.07,2.07,0,0,0,33.87,8.32ZM12.09,30.2,4.32,31.83l1.77-7.62L21.66,8.7l6,6ZM29,13.25l-6-6,3.48-3.46,5.9,6Z"></path>
                                            <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('package.delete', $package->id) }}" onclick="return confirm('Are you sure you want to delete this Package?');">
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
                  {!! $packages->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>  --}}

        <div class="bgShadow pt-10">
            <div class="grid grid-cols-2 mb-8 items-start">
                <div>
                    <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-4">Subscription plans</h1>
                    <p class="font-semibold text-sm text-mat">Subscription plans designed for tradespeople, offering exclusive tools, resources, and benefits to enhance business operations.</p>
                </div>
                <div class="flex md:justify-end justify-start self-start">
                    <a href="{{ route('package.addEdit') }}" class="bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">Add New Plan<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="pl-1">
                        <path d="M11 7V15M15 11L7 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="white" stroke-width="1.5"></path>
                    </svg>
                    </a>
                </div>
            </div>
           {{--  <div class="flex justify-between items-start">  --}}
                {{--  <div class="tabsWrapper w-[500px]">
                 <div class="tabsScroll  overflow-x-auto relative">
                    <ul class="flex flex-nowrap border-b bg-gray-200 rounded-full p-1 min-w-max justify-between" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                       <li role="presentation" class="w-full">
                          <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="true">For Client</button>
                       </li>
                       <li role="presentation" class="w-full">
                          <button class="w-full transition text-xs text-[#ababab] font-semibold px-12 py-3 rounded-full text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">For Tradepreson</button>
                       </li>
                    </ul>
                 </div>
                </div>  --}}

           {{--  </div>  --}}
            {{--  <div class="tabsWrapper">
                <div id="default-styled-tab-content">
                    <div class="overflow-y-auto rounded-lg text-xs text-[#ABABAB] hidden" id="styled-profile" role="tabpanel" aria-labelledby="proposal-tab">  --}}
                        <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
                            <table class="genericTable w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">S.No</th>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">ID</th>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                                            <a href="{{ route('package.list', array_merge(request()->all(), ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                                Name
                                            </a>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Description</th>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Price</th>
                                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($packages->isEmpty())
                                <tr class="bg-white border-b border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="8">
                                        No data available.
                                    </th>
                                </tr>
                                @else
                                @foreach($packages as $index => $package)
                                    <tr class="bg-white border-b border-gray-200">
                                         <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                                            {{ ($packages->currentPage() - 1) * $packages->perPage() + $index + 1 }}
                                        </th>
                                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                                            {{ $package->id }}
                                        </th>
                                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{{ $package->name }}</td>
                                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{!! html_entity_decode($package->description) !!}</td>
                                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{{ $package->price }}</td>
                                        <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                                            {{--  <div class="flex gap-4">
                                                    <a href="{{ route('package.edit', $package->id) }}" class="edit_package">
                                                    <svg fill="#0D0D0D" width="20px" height="20px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>edit</title>
                                                        <path class="clr-i-outline clr-i-outline-path-1" d="M33.87,8.32,28,2.42a2.07,2.07,0,0,0-2.92,0L4.27,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13.09,32,33.87,11.24A2.07,2.07,0,0,0,33.87,8.32ZM12.09,30.2,4.32,31.83l1.77-7.62L21.66,8.7l6,6ZM29,13.25l-6-6,3.48-3.46,5.9,6Z"></path>
                                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('package.delete', $package->id) }}" onclick="return confirm('Are you sure you want to delete this Package?');">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <title>delete</title>
                                                    <path d="M7 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h4a1 1 0 1 1 0 2h-1.069l-.867 12.142A2 2 0 0 1 17.069 22H6.93a2 2 0 0 1-1.995-1.858L4.07 8H3a1 1 0 0 1 0-2h4V4zm2 2h6V4H9v2zM6.074 8l.857 12H17.07l.857-12H6.074zM10 10a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1z" fill="red"/></svg>
                                                </a>
                                            </div>  --}}
                                            <div class="site_user_dropdown">
                                                <div class="flex items-center cursor-pointer justify-center" data-dropdown-toggle="userDropdown-action-{{ $package->id }}" data-dropdown-placement="bottom-end">
                                                    <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <div id="userDropdown-action-{{ $package->id }}" class="z-10 bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 hidden" aria-hidden="true" data-popper-placement="bottom-end">
                                                    <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                                        <li class="border-b border-[#d3d3d3]">
                                                            <a href="{{ route('package.edit', $package->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('package.delete', $package->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
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
                    {{--  </div>  --}}
                    {{--  <div class="rounded-lg text-xs text-[#ABABAB]" id="styled-settings" role="tabpanel" aria-labelledby="reviews-tab">
                        <form id="blogForm" action="" method="POST" enctype="multipart/form-data">
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="title" class="block text-sm font-bold text-mat">Title</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                        <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Brian" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="description" class="block text-sm font-bold text-mat">Description</label>
                                <div class="mt-4 bg-white rounded-2xl">
                                    <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="slug" class="block text-sm font-bold text-mat">Price</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                        <input type="number" name="price" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="1250" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="slug" class="block text-sm font-bold text-mat">Features</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 mb-3">
                                        <input type="text" name="features" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Basic" value="">
                                    </div>
                                    <div class="flex items-center rounded-2xl gap-3">
                                        <input type="text" name="features" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block text-sm p-3 w-[96%] flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" placeholder="Basic" value="">
                                        <a href="javascript:void(0)" class="w-[4%] add_sub_btn add_field mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features" style="">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <a href="#" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Save Plan</a>
                            </div>
                        </form>
                        <form id="blogForm" action="" method="POST" enctype="multipart/form-data" class="mt-[60px]">
                            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-5 text-[#2B2B2B]">Additional Services</h1>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="title" class="block text-sm font-bold text-mat">Title</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                        <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Brian" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="description" class="block text-sm font-bold text-mat">Description</label>
                                <div class="mt-4 bg-white rounded-2xl">
                                    <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="slug" class="block text-sm font-bold text-mat">Price</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                        <input type="number" name="price" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="1250" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <label for="slug" class="block text-sm font-bold text-mat">Features</label>
                                <div class="mt-4">
                                    <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 mb-3">
                                        <input type="text" name="features" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Basic" value="">
                                    </div>
                                    <div class="flex items-center rounded-2xl gap-3">
                                        <input type="text" name="features" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block text-sm p-3 w-[96%] flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" placeholder="Basic" value="">
                                        <a href="javascript:void(0)" class="w-[4%] add_sub_btn add_field mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features" style="">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="site_field_col mt-0! mb-7!">
                                <a href="#" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Save Plan</a>
                            </div>
                        </form>
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>

@endsection
