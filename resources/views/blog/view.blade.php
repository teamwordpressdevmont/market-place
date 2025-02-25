@extends('layouts.app')
@section('content')

    <h1></h1>
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 rounded-lg shadow-sm mx-auto">
        <img class="rounded-t-lg w-full h-100 object-cover object-center -mb-12" src="{{ asset('storage/blog-banner/' . $blog->banner) }}" alt="banner"/>
        <div class="flex flex-col items-center pb-10">
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $blog->title }}</h5>
            <p class="mb-1 text-xl font-medium text-gray-900">{{ $blog->description }}</p>
        </div>
    </div>
@endsection