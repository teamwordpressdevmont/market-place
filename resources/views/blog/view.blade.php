@extends('layouts.app')
@section('content')

    {{--  <h1></h1>
    <div class="mt-5 mx-auto max-w-7xl bg-white border border-gray-200 rounded-lg shadow-sm mx-auto">

        <div class="flex flex-col items-center pb-10">
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $blog->title }}</h5>
            <p class="mb-1 text-xl font-medium text-gray-900">{{ $blog->description }}</p>
        </div>
    </div>  --}}

    <div class="mt-5 bgShadow">
        <div class="pt-10 pb-8 2xl:px-50">
            <div class="text-sm">
                <h1 class="font-semibold lg:text-5xl sm:text-3xl text-2xl mb-5 text-mat text-center">{{ $blog->title }}</h1>
                <div class="flex sm:flex-row flex-col justify-between mb-5 gap-3">
                    <span class="text-sm text-mat">Slug: {{ $blog->slug}}</span>
                    <span class="text-sm text-mat">Publisert: {{ $blog->publish_by}}</span>
                </div>
                {{--  <img class="rounded-t-lg w-full h-100 object-cover object-center -mb-12" src="{{ asset('storage/app/public/blog-banner/' . $blog->banner) }}" alt="banner"/>  --}}
                <img class="rounded-t-lg w-full md:h-100 object-cover" src="{{ asset('storage/app/public/blog-banner/' . $blog->banner) }}" alt="banner">
                <div class="xl:w-[70%] sm:w-[90%] mx-auto my-5 blogViewDetail">
                    {!! html_entity_decode($blog->short_description) !!}
                    <h2 class="font-semibold xl:text-4xl md:text-2xl text-xl sm:mb-8 mb-5 text-primary md:pl-4">{{ $blog->content_heading }}</h2>
                    <h3 class="font-bold text-mat xl:text-2xl md:text-xl text-md mb-3">Description</h3>
                    {!! html_entity_decode($blog->description) !!}
                    <h3 class="font-bold text-mat xl:text-2xl md:text-xl text-md mb-3">Summary</h3>
                    {!! html_entity_decode($blog->summary) !!}
                    <h3 class="font-bold text-mat xl:text-2xl md:text-xl text-md mb-3">Excerpt</h3>
                    {{--  <p class="text-mat text-sm">{{ $blog->excerpt }}</p>  --}}
                    {!! html_entity_decode($blog->excerpt) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
