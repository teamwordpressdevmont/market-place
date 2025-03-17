@extends('layouts.app')
@section('content')

    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="">
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2 text-mat">Announcements</h1>
        </div>
        <a href="{{ route('announcement.addEdit') }}" class="lg:ml-auto bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-fit border border-primary hover:bg-primary transition gap-8">
            Add New
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                    <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"></path>
                </svg>
        </a>
    </div>

    <form id="searchForm" method="GET" action="{{ route('announcement.list') }}" class="relative flex mb-5 md:w-96 w-full">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search announcements">
        <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2 text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
    </form>

    <div id="table-container" class="overflow-x-auto rounded-xl bg-white border border-[#22222233]">
        <table class="genericTable w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 bg-[#eee] border-b border-[#22222233]">
                <tr>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">S.No</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Title</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Message</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Role</th>
                    <th class="px-6 py-3 text-[#ABABAB] font-[500]">Created At</th>
                </tr>
            </thead>
            <tbody>
                @if($announcements->isEmpty())
                    <tr class="bg-white border-b border-gray-200">
                        <td colspan="5" class="px-6 py-5 text-center text-xs font-normal text-mat">
                            No announcements available.
                        </td>
                    </tr>
                @else
                    @foreach($announcements as $index => $announcement)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-6 py-5 text-xs font-bold text-mat">
                                {{ ($announcements->currentPage() - 1) * $announcements->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-5 text-xs font-normal text-mat">
                                {{ $announcement->title }}
                            </td>
                            <td class="px-6 py-5 text-xs font-normal text-mat">
                                {{ $announcement->message }}
                            </td>
                            <td class="px-6 py-5 text-xs font-normal text-mat">
                                {{ optional($announcement->role)->name ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-5 text-xs font-normal text-mat">
                                {{ $announcement->created_at->format('Y-m-d') }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4" id="pagination-container">
        {{ $announcements->appends(request()->query())->links() }}
    </div>

@endsection
