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
        <div class="mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Job</h1>
        </div>
        <div class="">

                <form id="tradeperson" action="{{ isset($OrderDetails) ? route('joblisting.update', $OrderDetails->id) : route('joblisting.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($OrderDetails))
                        @method('PUT')
                    @endif
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="business_name" class="block text-sm font-bold text-mat">Title</label>
                        <div class="mt-4">
                            <div class="">
                                <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('title', $OrderDetails->title ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="description" class="block text-sm font-bold text-mat">Description</label>
                        <div class="mt-4 bg-white">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $OrderDetails->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="phone" class="block text-sm font-bold text-mat">Budget</label>
                        <div class="mt-4">
                            <div class="">
                                <input type="number" name="budget" id="budget" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" value="{{ old('budget', $OrderDetails->budget ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="phone" class="block text-sm font-bold text-mat">Timeline</label>
                        <div class="mt-4">
                            <div id="date-range-picker" date-rangepicker class="flex items-center">
                                <div class="relative w-1/2">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input id="datepicker-range-start" name="job_start_timeline" type="text" class="bg-gray-50 border bg-white focus:ring-gray-500 focus:border-gray-500 text-gray-900 text-sm rounded-2xl block w-full ps-10 p-3 datepicker-input" value="{{ old('job_start_timeline', isset($OrderDetails->job_start_timeline) ? \Carbon\Carbon::parse($OrderDetails->job_start_timeline)->format('m-d-Y') : '') }}" placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative w-1/2">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input id="datepicker-range-end" name="job_end_timeline" type="text" class="bg-gray-50 border bg-white border-gray-300 focus:ring-gray-500 focus:border-gray-500 text-gray-900 text-sm rounded-2xl block w-full ps-10 p-3 datepicker-input" value="{{ old('job_end_timeline', isset($OrderDetails->job_end_timeline) ? \Carbon\Carbon::parse($OrderDetails->job_end_timeline)->format('m-d-Y') : '') }}" placeholder="Select date end">
                                </div>
                            </div>
  
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                        <div class="site_field_col mt-0! md:mb-7! mb-5">
                            <label for="urgent" class="block md:text-sm text-xs font-bold text-mat">Job Type:</label>
                            <div class="md:mt-4 mt-2 grid grid-cols-1">
                                <select id="urgent" name="urgent" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                    <option value="1" {{ old('urgent', $OrderDetails->urgent ?? '') == 1 ? 'selected' : '' }}>Urgent</option>
                                    <option value="0" {{ old('urgent', $OrderDetails->urgent ?? '') == 0 ? 'selected' : '' }}>Flexible</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="site_field_col mt-0! md:mb-7! mb-5">
                            <label for="order_status" class="block md:text-sm text-xs font-bold text-mat">Order Status:</label>
                            <div class="md:mt-4 mt-2 grid grid-cols-1">
                                <select id="order_status" name="order_status" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                    @foreach($OrderStatus as $status)
                                        <option value="{{ $status->id }}" 
                                            {{ isset($OrderDetails->order) && $OrderDetails->order->order_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="phone" class="block text-sm font-bold text-mat">Location</label>
                        <div class="mt-4">
                            <div class="">
                                <input type="text" name="location" id="location" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" value="{{ old('location', $OrderDetails->location ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <!-- Image Upload Field -->
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="image" class="block text-sm font-bold text-mat">Upload Photos</label>
                            <div class="mt-4 grid grid-cols-1">
                                <input type="file" name="image[]" id="image" multiple accept="image/*"
                                    class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm focus:outline-none">
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
                            @if (!empty($imagesDetails) && is_array($imagesDetails))
                            @foreach($imagesDetails as $key => $image)
                                <div class="relative image-container ">
                                    <img src="{{ asset('storage/order-images/' . $image ) }}" alt="Uploaded Image" class="h-20 w-20 rounded-md object-cover">
                                    <button type="button" class="absolute top-0 right-0 bg-red-500 text-white p-1 rounded-full text-xs remove-image" data-key="{{ $key }}">✕</button>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="address" class="block text-sm font-bold text-mat">Additional Notes</label>
                        <div class="mt-4 bg-white">
                            <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                                <textarea name="additional_notes" id="additional_notes" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">{{ old('additional_notes', $OrderDetails->additional_notes ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="site_field_col mt-0! mb-7! flex items-center mb-4 gap-3!">
                        <input type="hidden" name="featured" value="0">
                        <input id="featured" type="checkbox" name="featured" value="1"
                            class="w-4 h-4 text-primary bg-white border-white rounded-sm focus:ring-gray-500"
                            {{ isset($OrderDetails) && $OrderDetails->featured == '1' ? 'checked' : '' }}>
                        <label for="featured-checkbox" class="block text-sm font-bold text-mat">Featured</label>
                    </div>
                    <div class="site_field_col mt-0! mb-7! flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">
                            {{ isset($OrderDetails) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>

        </div>
    </div>

@endsection
