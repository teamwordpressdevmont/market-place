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
                        <label for="username" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('name', $blog->name ?? '') }}">
                            </div>
                        </div>
                    </div>
                      <div class="sm:col-span-4 mb-5">
                        <label for="slug" class="block text-sm/6 font-medium text-gray-900">Slug</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="slug" id="slug" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="" value="{{ old('slug', $blog->slug ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea name="content" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('content', $blog->content ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="category_id" class="block text-sm/6 font-medium text-gray-900">Categories</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="category_id" name="category[]" multiple class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                          {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
                                          {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="username" class="block text-sm/6 font-medium text-gray-900">Reading Time</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="number" name="reading_time" id="reading_time" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('reading_time', $blog->reading_time ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label class="block text-sm font-medium">Fearured Image</label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*" class="w-full p-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                         @if(isset($blog) && $blog->featured_image)
                              <div id="PreviewContainer" class="mt-2  relative">
                                  <img  src="{{ asset('public/storage/blog-images/' . $blog->featured_image) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                  <span  class="CloseIcon  absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                              </div>
                          @else
                              <div id="PreviewContainer" class="mt-2 hidden relative">
                                  <img  src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                  <span class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                              </div>
                           @endif
                    </div>
                    <div class="col-span-full mb-5">
                        <label class="block text-sm font-medium">Left Image</label>
                        <input type="file" name="left_image" id="left_image" accept="image/*" class="w-full p-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            @if(isset($blog) && $blog->left_image)
                                 <div id="PreviewContainer" class="mt-2  relative">
                                     <img  src="{{ asset('public/storage/blog-images/' . $blog->left_image) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                     <span  class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                                 </div>
                            @else
                                 <div id="PreviewContainer" class="mt-2 hidden relative">
                                     <img src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                     <span class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                                 </div>
                            @endif
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="right_text" class="block text-sm/6 font-medium text-gray-900">Right Text</label>
                        <div class="mt-2">
                            <textarea name="right_text" id="right_text" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                               {{ old('right_text', $blog->right_text ?? '') }}
                            </textarea>

                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="middle_text" class="block text-sm/6 font-medium text-gray-900">Middle Text</label>
                        <div class="mt-2">
                            <textarea name="middle_text" id="middle_text" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('middle_text', $blog->middle_text ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label class="block text-sm font-medium">Middle Image</label>
                        <input type="file" name="middle_image" id="middle_image" accept="image/*" class="w-full p-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                         @if(isset($blog) && $blog->middle_image)
                             <div id="PreviewContainer" class="mt-2 eee relative">
                                 <img  src="{{ asset('public/storage/blog-images/' . $blog->middle_image) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                 <span  class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                             </div>
                         @else
                             <div id="PreviewContainer" class="mt-2 hidden relative">
                                 <img src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                 <span  class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                             </div>
                          @endif
                    </div>      
                    <div class="sm:col-span-4 mb-5">
                        <label for="sub_title" class="block text-sm/6 font-medium text-gray-900">Sub Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="sub_title" id="sub_title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('sub_title', $blog->sub_title ?? '') }}">
                            </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="sub_content" class="block text-sm/6 font-medium text-gray-900">Sub Content</label>
                        <div class="mt-2">
                            <textarea name="sub_content" id="sub_content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                {{ old('sub_content', $blog->sub_content ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label class="block text-sm font-medium">Sub Image</label>
                        <input type="file" name="sub_image" id="sub_image" accept="image/*" class="w-full p-2 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                         @if(isset($blog) && $blog->sub_image)
                             <div id="PreviewContainer" class="mt-2  relative">
                                 <img  src="{{ asset('public/storage/blog-images/' . $blog->sub_image) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                 <span class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                             </div>
                         @else
                             <div id="PreviewContainer" class="mt-2 hidden relative">
                                 <img  src="" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
                                 <span  class="CloseIcon absolute top-0 right-0 bg-gray-600 text-white text-xs px-2 py-1 rounded-full cursor-pointer">X</span>
                             </div>
                          @endif
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
