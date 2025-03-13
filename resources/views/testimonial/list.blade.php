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

    <div class="bgShadow pt-10 pb-8 mb-10">
        <div class="grid grid-cols-2 items-start mb-8">
            <div class="">
                <h4 class="font-semibold text-4xl mb-4">Testimonial List</h4>
                <p class="text-sm text-[#222222]">Subscription plans designed for tradespeople, offering exclusive tools, resources, and benefits to enhance business operations.</p>
            </div>
            <a href="{{ route('testimonial.addEdit') }}" class="md:ml-auto  bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">
                Add New
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                        <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"></path>
                    </svg>
            </a>
    </div>
    <form id="searchForm" method="GET" action="{{ route('testimonial.list') }}" class="relative flex  mb-5 md:w-96 w-full mb-8">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search for items">
        <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
        <div class="input-group-append absolute top-[13px] right-[100px]">
            <span class="input-group-text close-icon" style="cursor: pointer; display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="15px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path></svg>
            </span>
        </div>
    </form>
    <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
    <table class="genericTable w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
            <tr>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]" width="100">S.No</th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">ID</th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                    <a href="{{ route('testimonial.list', array_merge(request()->all(), ['sort_by' => 'name', 'sort_direction' => request('sort_direction') == 'asc' ? 'desc' : 'asc'])) }}">
                        Name
                    </a>
                </th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Heading</th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Rating</th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">Testimonials</th>
                <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500] text-right" width="115">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($testimonials->isEmpty())
            <tr class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="8">
                    No data available.
                </th>
            </tr>
            @else
            @foreach($testimonials as $index => $testimonial)
            <tr class="bg-white border-b border-[#e9e9e9]">
                <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                    #{{ ($testimonials->currentPage() - 1) * $testimonials->perPage() + $index + 1 }}
                </th>
                <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">
                    {{ $testimonial->id }}
                </th>
                <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">{{ $testimonial->name }}</td>
                <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-bold">{{ $testimonial->heading }}</td>
                <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">{{ $testimonial->rating }}</td>
                <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">
                    <button type="button" class="toggleApprovalBtn text-white hover:bg-primary focus:outline-none rounded-full text-xs px-10 py-2 text-center
                        {{ $testimonial->approvedTestimonial ? 'bg-mat' : 'bg-secondary' }}"
                        data-id="{{ $testimonial->id }}">
                        {{ $testimonial->approvedTestimonial ? 'Remove from Website' : 'Add to Website' }}
                    </button>
                </td>
                <td class="px-6 py-5 whitespace-nowrap text-xs text-mat font-normal">

                        <div class="site_user_dropdown">
                            <div class="flex items-center cursor-pointer justify-end" data-dropdown-toggle="userDropdown-action-{{ $testimonial->id }}" data-dropdown-placement="bottom-end">
                                <svg width="4" height="16" viewBox="0 0 4 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.99199 8H2.00098" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.98418 14H1.99316" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1.99981 2H2.00879" stroke="#222222" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div id="userDropdown-action-{{ $testimonial->id }}" class="z-10 bg-white divide-y rounded-xl w-[122px] border border-[#d3d3d3] hidden" data-popper-placement="bottom-end">
                                <ul class="bg-white text-sm rounded-xl overflow-hidden">
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Edit</a>
                                    </li>
                                    <li class="border-b border-[#d3d3d3]">
                                        <a href="{{ route('testimonial.view', $testimonial->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">View</a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('testimonial.delete', $testimonial->id) }}" class="text-left block px-3 py-3 text-xs font-light transition hover:bg-[#222222] hover:text-white text-[#222222]">Delete</a>
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
        {{ $testimonials->appends(request()->query())->links() }}
    </div>

    </div>

    <!-- Modal -->
    <div id="approvalModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <input type="hidden" id="testimonialId">

            <!-- Order Number Input -->
            <label class="block text-sm font-medium text-gray-700">Order Number:</label>
            <input type="number" id="order_number" class="w-full p-2 border rounded-lg mt-2">

            <div class="flex justify-end mt-4">
                <button id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancel</button>
                <button id="confirmAdd" class="bg-green-600 text-white px-4 py-2 rounded-lg toggle-user-approval">Confirm</button>
            </div>
        </div>
    </div>
    @endsection


