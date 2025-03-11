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


    <div class="bgShadow pt-10">

        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <h1 class="font-semibold text-4xl">Categories List</h1>
            <a href="{{ route('category.addEdit') }}" class="md:ml-auto  bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">
                Add New
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                    <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"/>
                </svg>
            </a>
        </div>


        <div class="relative">
            <form id="searchForm" method="GET" action="{{ route('category.list') }}" class="relative flex  mb-8 md:w-96 w-full">
            <input type="text" name="search" value="{{ request('search') }}"
            id="table-search"
            class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5"
            placeholder="Search for items">


                <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
                <div class="input-group-append absolute top-[13px] right-[100px]">
                    <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="15px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
                    </span>
                </div>
            </form>
            <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
            <table class="genericTable w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">S.No</th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">ID</th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            <a href="{{ route('category.list', array_merge(request()->all(), ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                Name
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Description
                        </th>

                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                            Icon
                        </th>
                        <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="115">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if($categories->isEmpty())
                    <tr class="bg-white border-b   border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="6">
                            No data available.
                        </th>
                    </tr>
                @else
                @foreach($categories as $index => $category)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#222222]">
                            {{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}
                        </th>
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#222222]">
                        {{ $category->id }}
                        </th>
                        <td class="px-6 py-5 whitespace-nowrap text-xs font-bold text-[#222222]">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-[#222222]">
                            {!! html_entity_decode($category->description); !!}
                        </td>

                        <td class="px-6 py-5 whitespace-nowrap text-xs text-[#222222]">
                            @if($category->icon)
                                <img src="{{ asset('public/storage/category-images/' . $category->icon) }}" class="bg-green-700 p-2" alt="Logo" width="50">
                                {{-- <img src="{{ $category->icon }}" class="bg-green-700 p-2" alt="Logo" width="50"> --}}
                            @else
                                No Icon
                            @endif
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs text-[#222222]">
                            <div class="flex gap-4">
                                    <a href="{{ route('category.edit', $category->id) }}">
                                    <svg fill="#0D0D0D" width="20px" height="20px" viewBox="0 0 36 36" version="1.1"  preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>edit</title>
                                        <path class="clr-i-outline clr-i-outline-path-1" d="M33.87,8.32,28,2.42a2.07,2.07,0,0,0-2.92,0L4.27,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13.09,32,33.87,11.24A2.07,2.07,0,0,0,33.87,8.32ZM12.09,30.2,4.32,31.83l1.77-7.62L21.66,8.7l6,6ZM29,13.25l-6-6,3.48-3.46,5.9,6Z"></path>
                                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                    </svg>
                                </a>
                                <a href="{{ route('category.delete', $category->id) }}" onclick="return confirm('Are you sure you want to delete this Category?');">
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
                {{ $categories->appends(request()->query())->links() }}
            </div>
        </div>
    </div>





@endsection
