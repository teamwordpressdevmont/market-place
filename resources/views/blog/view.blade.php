@extends('layouts.app')
@section('content')

    <h1></h1>
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 rounded-lg shadow-sm mx-auto">
        <div class="flex flex-col items-center pb-10">
            <span class="text-sm text-gray-500">{{ $blog->category->pluck('name')->join(', ') }}</span>
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('public/storage/blog-images/' . $blog->featured_image) }}" alt="Featured image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $blog->heading }}</h5>
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $blog->reading_time }}</h5>
            <p class="mb-1 text-xl font-medium text-gray-900">{{ $blog->content }}</p>
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('public/storage/blog-images/' . $blog->left_image) }}" alt="Left image"/>
            <p class="mb-1 text-xl font-medium text-gray-900">{!! html_entity_decode($blog->right_text) !!}}</p>
            <p class="mb-1 text-xl font-medium text-gray-900">{!! html_entity_decode($blog->middle_text) !!}</p>
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('public/storage/blog-images/' . $blog->middle_image) }}" alt="Left image"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $blog->sub_title }}</h5>
         <p class="mb-1 text-xl font-medium text-gray-900">{!! html_entity_decode($blog->sub_content) !!}</p>

            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('public/storage/blog-images/' . $blog->sub_image) }}" alt="Left image"/>
            <div class="flex mt-4 md:mt-6">
            </div>
        </div>
    </div>
@endsection