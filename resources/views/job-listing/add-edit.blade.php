@extends('layouts.app')
@section('content')

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
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Timeline</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="timeline" id="timeline" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('timeline', $OrderDetails->timeline ?? '') }}">
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
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Upload Photos</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="file" name="photos[]" id="photos" multiple class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                            </div>
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
