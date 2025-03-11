@extends('layouts.app')
@section('content')
@if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="bgShadow pt-10">
            <h1 class="font-semibold text-4xl mb-10"> {{ isset($blog) ? 'Update Blog' : 'Add Blog' }}</h1>
            <form id="blogForm" action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if (isset($blog))
                    @method('PUT')  <!-- Use PUT for update -->
                @endif
                <div class="site_field_col">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('title', $blog->title ?? '') }}">
                        </div>
                    </div>
                </div>
                <div class="site_field_col">
                    <label for="slug" class="block text-sm/6 font-medium text-gray-900">Slug</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="slug" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="jane-smith" value="{{ old('slug', $blog->slug ?? '') }}">
                        </div>
                    </div>
                </div>
                <div class="site_field_col">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <div class="mt-2 bg-white">
                        <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 sm:text-sm/6">
                            {{ old('description', $blog->description ?? '') }}
                        </textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

                    <div class="site_field_col">
                        <label class="block text-sm font-medium mb-2">Banner</label>
                        <input type="file" name="banner" id="banner" accept="image/*" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm">
                        @if(isset($blog) && $blog->banner)
                            <div id="PreviewContainer" class="mt-2  relative">
                                <img  src="{{ asset('storage/blog-banner/' . $blog->banner) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                <span  class="CloseIcon  absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                            </div>
                        @else
                            <div id="PreviewContainer" class="mt-2 hidden relative">
                                <img  src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                <span class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                            </div>
                        @endif
                    </div>

                    <div class="site_field_col">
                    <label for="publish_by" class="block text-sm/6 font-medium text-gray-900">Publish By</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="publish_by" id="publish_by" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('publish_by', $blog->publish_by ?? '') }}">
                        </div>
                    </div>
                </div>

                    <div class="site_field_col">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2 bg-white">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 sm:text-sm/6">
                              {{ old('description', $blog->description ?? '') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <div class="site_field_col">
                            <label class="block text-sm font-medium mb-2">Banner</label>
                            <input type="file" name="banner" id="banner" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none">
                            @if(isset($blog) && $blog->banner)
                                <div id="PreviewContainer" class="mt-2  relative">
                                    <img  src="{{ asset('public/storage/blog-banner/' . $blog->banner) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                    <span  class="CloseIcon  absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                                </div>
                            @else
                                <div id="PreviewContainer" class="mt-2 hidden relative">
                                    <img  src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                    <span class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                                </div>
                            @endif
                        </div> 
                        
                        <div class="site_field_col">
                        <label for="publish_by" class="block text-sm/6 font-medium text-gray-900">Publish By</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="publish_by" id="publish_by" class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="janesmith" value="{{ old('publish_by', $blog->publish_by ?? '') }}">
                            </div>
                            <input datepicker datepicker-autohide name="publish_date" id="publish_date" type="text"
                            class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3 !ps-10 datepicker-input"
                            placeholder="Select date"
                            value="{{ old('publish_date', isset($blog->publish_date) ? \Carbon\Carbon::parse($blog->publish_date)->format('d-m-Y') : '') }}">
                        </div>
                        </div>

                </div>


                <div class="flex items-center site_field_col">
                        <input id="featured-checkbox" type="checkbox" name="featured" value="1"
                            class="w-4 h-4 text-primary bg-white border-white rounded-sm focus:ring-gray-500"
                            {{ isset($blog) && $blog->featured == '1' ? 'checked' : '' }}>
                        <label for="featured-checkbox" class="ms-2 text-sm font-medium text-gray-900">Featured</label>
                    </div>







                <div class="flex items-center justify-end gap-x-6 pt-5">
                    <button type="submit"
                        class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                        {{ isset($blog) ? 'Update' : 'Add New Blog' }} <!-- Dynamically change button text -->
                    </button>
                </div>
            </form>
        </div>



@endsection
