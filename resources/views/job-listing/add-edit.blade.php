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
        <div class="mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Job</h1>
        </div>
        <div class="">

                <form id="tradeperson" action="{{ isset($OrderDetails) ? route('joblisting.update', $OrderDetails->id) : route('joblisting.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($OrderDetails))
                        @method('PUT')
                    @endif
                    <div class="sm:col-span-4 mb-5">
                        <label for="business_name" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('title', $OrderDetails->title ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $OrderDetails->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Budget</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="number" name="budget" id="budget" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('budget', $OrderDetails->budget ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900 mb-2">Timeline</label>                     
                        <div id="date-range-picker" date-rangepicker class="flex items-center">
                            <div class="relative w-1/2">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="job_start_time" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('job_start_time', isset($OrderDetails->job_start_time) ? \Carbon\Carbon::parse($OrderDetails->job_start_time)->format('d-m-Y') : '') }}" placeholder="Select date start">
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative w-1/2">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="job_end_time" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('job_end_time', isset($OrderDetails->job_end_time) ? \Carbon\Carbon::parse($OrderDetails->job_end_time)->format('d-m-Y') : '') }}" placeholder="Select date end">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Location</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="location" id="location" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('location', $OrderDetails->location ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <!-- Image Upload Field -->
                    <div class="sm:col-span-4 mb-5">
                        <label for="image" class="block text-sm/6 font-medium text-gray-900">Upload Photos</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="file" name="image[]" id="image" multiple accept="image/*" 
                                    class="image block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                            </div>
                        </div>
                        <!-- Existing Image Previews -->
                        {{-- <div id="preview" class="mt-3 flex flex-wrap gap-2">
                            @foreach($images as $key => $image)
                                <div class="relative image-container ">
                                    <img src="{{ asset('storage/order-images/' . $image ) }}" alt="Uploaded Image" class="h-20 w-20 rounded-md object-cover">
                                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full text-xs remove-image" data-key="{{ $key }}">✕</button>
                                </div>
                            @endforeach
                        </div> --}}
                        <input type="hidden" name="removed_images" id="removed_images" value="">
                        <div id="preview" class="mt-3 flex flex-wrap gap-2">
                            @foreach($imagesDetails as $key => $image)
                                <div class="relative image-container ">
                                    <img src="{{ asset('storage/order-images/' . $image ) }}" alt="Uploaded Image" class="h-20 w-20 rounded-md object-cover">
                                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full text-xs remove-image" data-key="{{ $key }}">✕</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="address" class="block text-sm/6 font-medium text-gray-900">Additional Notes</label>
                        <div class="mt-2">
                            <textarea name="additional_notes" id="additional_notes" rows="3" class="textarea_editor block w-full min-w-0 grow py-1.5 pr-3 pl-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('additional_notes', $OrderDetails->additional_notes ?? '') }}</textarea>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="featured" type="checkbox" name="featured" value="1"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500"
                        {{ isset($OrderDetails) && $OrderDetails->featured == '1' ? 'checked' : '' }}>
                        <label for="featured-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Featured</label>
                    </div>
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-green-700 px-3 py-2 cursor-pointer text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ isset($OrderDetails) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
