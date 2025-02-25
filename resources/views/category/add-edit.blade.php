@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold tracking-tight text-gray-900 mb-6"> {{ isset($category) ? 'Update Category' : 'Add Category' }}</h1>
    <form id="Category" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        @if(isset($category))

        @method('PUT') 

        @endif 
        
        <!-- Name Field -->
        <div class="sm:col-span-4 mb-5">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600">
                    <input type="text" name="name" id="name"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Category Name" value="{{ isset($category) ? $category->name : '' }}"> <!-- Pre-fill if editing -->
                </div>
            </div>
        </div>
        
        <!-- Description Field -->
        <div class="sm:col-span-4 mb-5">
            <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600">
                    <textarea name="description" id="description"
                                class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                cols="30" rows="10">{{ isset($category) ? $category->description : '' }}</textarea> <!-- Pre-fill if editing -->
                </div>
            </div>
        </div>

            <!-- Icon Field -->
        <div class="col-span-full mb-5">
            <label class="block text-sm/6 font-medium text-gray-900">Icon</label>
            <div class="mt-2 grid grid-cols-1">
                <input type="file" name="icon" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    @if(isset($category) && $category->icon)
                    <div id="PreviewContainer" class="mt-2  relative">
                        <img  src="{{ asset('storage/category-images/' . $category->icon) }}" class="Preview w-32 h-32 object-cover rounded-lg border border-gray-300">
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
        
        <!-- Parent Category Dropdown -->
        <div class="sm:col-span-4 mb-5">
            <label for="parent_id" class="block text-sm/6 font-medium text-gray-900">Parent Category</label>
            <div class="mt-2">
                <select name="parent_id" id="parent_id"
                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-green-600 sm:text-sm/6">
                    <option value="">Select Parent Category</option>
                    @foreach($allCategories as $parentCategory)
                        <option value="{{ $parentCategory->id }}" {{ (isset($category) && $parentCategory->id == $category->parent_category_id) ? 'selected' : '' }}>
                            {{ $parentCategory->name }}
                        </option> <!-- Pre-select if editing -->
                    @endforeach
                </select>
            </div>
        </div>
        
        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-x-6">
            <button type="submit"
                    class="rounded-md cursor-pointer bg-green-700 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                {{ isset($category) ? 'Update' : 'Add' }} 
            </button>
        </div>
    </form>
@endsection