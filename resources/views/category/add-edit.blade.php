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
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl md:mb-10 mb-5 text-mat"> {{ isset($category) ? 'Update Category' : 'Add Category' }}</h1>
            <form id="Category" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                @if(isset($category))

                @method('PUT')

                @endif


                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="name" class="block md:text-sm text-xs font-bold text-mat">Category Name</label>
                        <div class="md:mt-4 mt-2">
                                <input type="text" name="name" id="name"
                                        class="rounded-2xl bg-white border border-gray-300 text-gray-900 block flex-1 min-w-0 w-full text-sm p-3 focus:ring-gray-500 focus:border-gray-500"
                                        placeholder="Category Name" value="{{ isset($category) ? $category->name : '' }}"> <!-- Pre-fill if editing -->
                        </div>
                    </div>

                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="parent_id" class="block md:text-sm text-xs font-bold text-mat">Parent Category</label>
                        <div class="md:mt-4 mt-2">
                            <select name="parent_id" id="parent_id"
                                    class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                <option value="">Select Parent Category</option>
                                @foreach($allCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}"
                                        {{ $parentCategory->id == $selectedCategories ? 'selected' : '' }}>
                                        {{ $parentCategory->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description Field -->
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="description" class="block md:text-sm text-xs font-bold text-mat">Description</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="description" id="description"
                                        class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                        cols="30" rows="10">{{ isset($category) ? $category->description : '' }}</textarea> <!-- Pre-fill if editing -->
                        </div>
                    </div>
                </div>

                <div class="site_field_col mt-0! md:mb-7! !mb-5" id="iconField" style="{{ isset($category) && $category->parent_id ? 'display: block;' : 'display: none;' }}">
                    <label class="block md:text-sm text-xs font-bold text-mat">Icon</label>
                    <div class="md:mt-4 mt-2 grid grid-cols-1">
                        <input type="file" name="icon" accept="image/*" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm focus:outline-none">
                            @if(isset($category) && $category->icon)
                            <div id="PreviewContainer" class="mt-2  relative">
                                <img  src="{{ asset('public/storage/category-images/' . $category->icon) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
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

                <!-- Submit Button -->
                <div class="flex items-center justify-end gap-x-6">
                    <button type="submit"
                            class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">
                        {{ isset($category) ? 'Update' : 'Add New Category' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
