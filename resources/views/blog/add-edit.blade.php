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
    <div class="mt-5 bgShadow">
        <div class="pt-10 pb-8">
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl md:mb-10 mb-5 text-mat"> {{ isset($blog) ? 'Update Blog' : 'Add Blog' }}</h1>
            <form id="blogForm" action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if (isset($blog))
                    @method('PUT')  <!-- Use PUT for update -->
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="title" class="block md:text-sm text-xs font-bold text-mat">Title</label>
                        <div class="md:mt-4 mt-2">
                            <div class="">
                                <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('title', $blog->title ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="slug" class="block md:text-sm text-xs font-bold text-mat">Slug</label>
                        <div class="md:mt-4 mt-2">
                            <div class="">
                                <input type="text" name="slug" id="slug" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="jane-smith" value="{{ old('slug', $blog->slug ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="short_description" class="block md:text-sm text-xs font-bold text-mat">Short Description</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="short_description" id="content" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                                {{ old('short_description', $blog->short_description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="content_heading" class="block md:text-sm text-xs font-bold text-mat">Content Heading</label>
                    <div class="md:mt-4 mt-2">
                        <div class="">
                            <input type="text" name="content_heading" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Content Heading" value="{{ old('content_heading', $blog->content_heading ?? '') }}">
                        </div>
                    </div>
                </div>
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="description" class="block md:text-sm text-xs font-bold text-mat">Description</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                                {{ old('description', $blog->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="summary" class="block md:text-sm text-xs font-bold text-mat">Summary</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="summary" id="content" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                                {{ old('summary', $blog->summary ?? '') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="excerpt" class="block md:text-sm text-xs font-bold text-mat">Excerpt</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="excerpt" id="content" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                                {{ old('excerpt', $blog->excerpt ?? '') }}
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label class="block md:text-sm text-xs font-bold text-mat">Banner</label>
                        <div class="md:mt-4 mt-2">
                            <input type="file" name="banner" id="banner" accept="image/*" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm focus:outline-none">
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
                    </div>
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="publish_by" class="block md:text-sm text-xs font-bold text-mat">Publish By</label>
                        <div class="md:mt-4 mt-2">
                            <div class="">
                                <input type="text" name="publish_by" id="publish_by" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('publish_by', $blog->publish_by ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center site_field_col mt-0! md:mb-7! !mb-5 gap-3!">
                    <input id="featured-checkbox" type="checkbox" name="featured" value="1"
                        class="w-4 h-4 text-primary bg-white border-white rounded-sm focus:ring-gray-500"
                        {{ isset($blog) && $blog->featured == '1' ? 'checked' : '' }}>
                    <label for="featured-checkbox" class="block md:text-sm text-xs font-bold text-mat">Featured</label>
                </div>
                <div class="flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">
                        {{ isset($blog) ? 'Update' : 'Add New Blog' }} <!-- Dynamically change button text -->
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
