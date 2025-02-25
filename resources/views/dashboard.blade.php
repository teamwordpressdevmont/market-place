{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')

    <main>
        <dl class="flex gap-4">
            @foreach($reports as $report)
            <div class="w-[600px] h-[167px] flex justify-between items-center border-2 border-orange-400 rounded-lg p-6">
                <div>
                    <p class="text-6xl font-light text-orange-400"> {{$report->value}} </p>
                    <p class="font-semibold text-gray-800 mt-2"> {{$report->key}} </p>
                </div>
                <div class="flex flex-col items-end">
                    <svg class="w-14 h-14 text-orange-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm text-gray-500">Last job Active Wed, 12 Feb</p>
                </div>
            </div>
            @endforeach
        </dl>
    </main>

@endsection
