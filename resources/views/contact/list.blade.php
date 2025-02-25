@extends('layouts.app')
@section('content')

    <div class="flex mb-6">
        <h4 class="text-3xl font-bold tracking-tight text-gray-900">Contact</h4>
    </div>
    <form id="searchForm" method="GET" action="{{ route('contact') }}" class="relative mt-1 w-96 mb-5">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="block pt-2 pb-2 ps-5 pe-7 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
        <button type="submit" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 bg-green-700 text-white rounded-r-lg hover:bg-green-900">Search</button>
        <div class="input-group-append absolute top-[10px] right-[80px]">
            <span class="input-group-text close-icon" style="cursor: pointer; display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px" height="20px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"></path></svg>
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
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Message
                    </th>
                </tr>
            </thead>   
            <tbody>
                @if($contacts->isEmpty())
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap " colspan="5">
                            No contact data available.
                        </th>
                    </tr>
                @else
                @foreach($contacts as $index => $contact)
                    <tr class="bg-white border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $index + 1 }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $contact->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $contact->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->email }}
                        </td>
                        <td class="px-6 py-4">
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