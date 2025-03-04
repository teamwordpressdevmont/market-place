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

            <h1 class="font-semibold text-4xl mb-10"> {{ isset($blog) ? 'Update Blog' : 'Add Blog' }}</h1>



                <form id="blogForm" action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($blog))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif
                    <div class="site_field_col">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title" class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="janesmith" value="{{ old('title', $blog->title ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
                            <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="publish_by" id="publish_by" class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="janesmith" value="{{ old('publish_by', $blog->publish_by ?? '') }}">
                            </div>
                        </div>
                    </div>
                        
                        <div class="site_field_col">
                            <label for="publish_by" class="block text-sm/6 font-medium text-gray-900 mb-2">Publish Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                                </div>
                                <input datepicker datepicker-autohide name="publish_date" id="publish_date" type="text" 
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:gray-500 focus:border-gray-500 block w-full ps-10 p-2.5 datepicker-input" 
                                placeholder="Select date" 
                                value="{{ old('publish_date', isset($blog->publish_date) ? \Carbon\Carbon::parse($blog->publish_date)->format('d-m-Y') : '') }}">
                            </div>
                         </div>                        

                    </div>


                    <div class="flex items-center site_field_col">
                            <input id="featured-checkbox" type="checkbox" name="featured" value="1"
                                class="w-4 h-4 text-primary bg-gray-200 border-gray-300 rounded-sm focus:ring-gray-500 dark:gray:ring-blue-600"
                                {{ isset($blog) && $blog->featured == '1' ? 'checked' : '' }}>
                            <label for="featured-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Featured</label>
                        </div>       







                    <div class="flex items-center justify-end gap-x-6 pt-5">
                        <button type="submit"
                            class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                            {{ isset($blog) ? 'Update' : 'Add New Blog' }} <!-- Dynamically change button text -->
                        </button>
                    </div>
                </form>
      


@endsection
