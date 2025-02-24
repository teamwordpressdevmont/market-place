@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"><span class="font-medium">{{ session('success') }}</span></div>
    @endif




        <div class="flex mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Categories List</h1>
            <a href="{{ route('category.addEdit') }}" class="ml-auto rounded-md bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Add New 
            </a>   
        </div> 


        <div class="relative overflow-x-auto">
            <form id="searchForm" method="GET" action="{{ route('category.list') }}" class="relative mt-1 w-96 mb-5">
                <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="block pt-2 pb-2 ps-5 pe-7 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
                <button type="submit" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 bg-green-700 text-white rounded-r-lg hover:bg-green-900">Search</button>
                <div class="input-group-append absolute top-[10px] right-[80px]">
                    <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="20px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/></svg>
                    </span>
                </div>
            </form>
            <div id="table-container">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">#S.n</th>
                        <th scope="col" class="px-6 py-3">ID</th>                
                        <th scope="col" class="px-6 py-3">
                            <a href="{{ route('category.list', array_merge(request()->all(), ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                                Name
                            </a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                     
                        <th scope="col" class="px-6 py-3">
                            Icon
                        </th>
                        <th scope="col" class="px-6 py-3">
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ ($categories->currentPage() - 1) * $categories->perPage() + $index + 1 }}
                        </th>
                         <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                           {{ $category->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->description }}
                        </td>

                        <td class="px-6 py-4">
                            @if($category->icon)
                                <img src="{{ asset('storage/category-images/' . $category->icon) }}" alt="Logo" width="50">
                            @else
                                No Icon
                            @endif                    
                        </td>
                        <td class="px-6 py-4">
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


@endsection