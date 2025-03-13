@extends('layouts.app')
@section('content')

    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <h4 class="font-semibold text-4xl">Contact</h4>
    </div>
    <form id="searchForm" method="GET" action="{{ route('contact') }}" class="relative flex  mb-5 md:w-96 w-full">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="rounded-tl-full rounded-bl-full bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm px-5" placeholder="Search for items">
        <button type="submit" class="bg-secondary cursor-pointer inset-y-0 right-0 px-4 py-2  text-white border border-primary hover:bg-primary transition rounded-tr-full rounded-br-full">Search</button>
        <div class="input-group-append absolute top-[13px] right-[100px]">
            <span class="input-group-text close-icon" style="cursor: pointer; display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="15px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path></svg>
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
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-[#ABABAB] font-[500]">
                        Message
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($contacts->isEmpty())
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat" colspan="5">
                            No contact data available.
                        </th>
                    </tr>
                @else
                @foreach($contacts as $index => $contact)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold text-mat">
                            {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $index + 1 }}
                        </th>
                        <th scope="row" class="px-6 py-5 whitespace-nowrap text-xs font-bold text-mat">
                            {{ $contact->id }}
                        </th>
                        <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat">
                            {{ $contact->name }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat">
                            {{ $contact->email }}
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-xs font-normal text-mat">
                            {{ $contact->message }}
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4" id="pagination-container">
        {{ $contacts->appends(request()->query())->links() }}
    </div>
@endsection
