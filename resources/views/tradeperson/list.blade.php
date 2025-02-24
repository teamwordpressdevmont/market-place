@extends('layouts.app')
@section('content')

    <div class="flex mb-6">
        <h4 class="text-3xl font-bold tracking-tight text-gray-900">Trade Person</h4>
    </div>
    <form method="GET" action="{{ route('tradeperson.list') }}" class="relative mt-1 w-96 mb-5">
        <input type="text" name="search" value="{{ request('search') }}" id="table-search" class="block pt-2 pb-2 ps-5 pe-7 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
        <button type="submit" class="absolute cursor-pointer inset-y-0 right-0 flex items-center px-3 bg-green-700 text-white rounded-r-lg hover:bg-green-900">Search</button>
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#S.n</th>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">
                    Business Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>   
        <tbody>
            @if($tradeperson->isEmpty())
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="5">
                        No Trade Person data available.
                    </th>
                </tr>
            @else
            @foreach($tradeperson as $index => $trade)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ ($tradeperson->currentPage() - 1) * $tradeperson->perPage() + $index + 1 }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $trade->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $trade->business_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $trade->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $trade->address }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $trade->description }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-4">
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
                        </div>
                    </td>     
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-4">
        {{ $tradeperson->appends(request()->all())->links() }}
    </div>
@endsection