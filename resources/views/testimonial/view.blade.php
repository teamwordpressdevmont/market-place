@extends('layouts.app')
@section('content')

    <h1></h1>
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 rounded-lg shadow-sm mx-auto">
        <div class="flex flex-col items-center p-10">
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $testimonial->name }}</h5>
            <p class="mb-1 text-xl font-medium text-gray-900">{{ $testimonial->description }}</p>
        </div>
    </div>
@endsection
