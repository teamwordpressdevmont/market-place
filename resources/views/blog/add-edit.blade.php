@extends('layouts.app')
@section('content')

        <div class="mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Blog</h1>
        </div>
        <div class="">

                <form id="blogForm" action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($blog))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif
                    <div class="sm:col-span-4 mb-5">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('title', $blog->title ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $blog->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label class="block text-sm font-medium">Banner</label>
                        <input type="file" name="banner" id="banner" accept="image/*" class="w-full p-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
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
                    <div class="sm:col-span-4 mb-5">
                        <label for="publish_by" class="block text-sm/6 font-medium text-gray-900">Publish By</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="publish_by" id="publish_by" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('publish_by', $blog->publish_by ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="publish_by" class="block text-sm/6 font-medium text-gray-900">Publish Date</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                              </svg>
                            </div>
                            <input datepicker datepicker-autohide name="publish_date" id="publish_date" type="text" 
                            class="outline-1 -outline-offset-1 outline-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Select date" 
                            value="{{ old('publish_date', isset($blog->publish_date) ? \Carbon\Carbon::parse($blog->publish_date)->format('d-m-Y') : '') }}">
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-green-700 px-3 py-2 cursor-pointer text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ isset($blog) ? 'Update' : 'Add' }} <!-- Dynamically change button text -->
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
