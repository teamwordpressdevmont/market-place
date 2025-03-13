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

    <div class="mt-5 bgShadow">
        <div class="pt-10 pb-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 items-start mb-8 lg:gap-0 gap-4">
                <div>
                    <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2 text-mat">Subscription plans</h1>
                    <p class="font-semibold text-sm text-mat">Subscription plans designed for tradespeople, offering exclusive tools, resources, and benefits to enhance business operations.</p>
                </div>
                <a href="{{ route('package.addEdit') }}" class="lg:ml-auto bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-fit border border-primary hover:bg-primary transition gap-8">Add New Plan
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                        <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"></path>
                    </svg>
                </a>
            </div>

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
                            <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right" width="115">Action</th>
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
                                    <div class="site_user_dropdown">
                                        <div class="cursor-pointer w-[30px] ml-auto bg-[#eee] px-1 py-2 rounded-md flex justify-center items-center hover:bg-gray-300 transition" data-dropdown-toggle="userDropdown-action-{{ $package->id }}" data-dropdown-placement="bottom-end">
                                            <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div id="userDropdown-action-{{ $package->id }}" class="z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" aria-hidden="true" data-popper-placement="bottom-end">
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
        </div>
    </div>

@endsection
