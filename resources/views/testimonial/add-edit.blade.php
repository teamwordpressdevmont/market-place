@extends('layouts.app')
@section('content')

        <div class="mb-6">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Testimonial</h1>
        </div>
        <div class="">

                <form id="testimonialForm" action="{{ isset($testimonials) ? route('testimonial.update', $testimonials->id) : route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($testimonials))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif
                    <div class="sm:col-span-4 mb-5">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('name', $testimonials->name ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="heading" class="block text-sm/6 font-medium text-gray-900">Heading</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="heading" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('heading', $testimonials->heading ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="category_id" class="block text-sm/6 font-medium text-gray-900">User</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="user_id" name="user_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="" disabled selected>Select a User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($testimonials) && $testimonials->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $testimonials->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="rating" class="block text-sm/6 font-medium text-gray-900">Rating</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="number" name="rating" id="rating" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="3" value="{{ old('rating', $testimonials->rating ?? '') }}"  min="1" max="5">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="verified" class="block text-sm/6 font-medium text-gray-900">Verified:</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="verified" name="verified" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="1" {{ isset($testimonials) && $testimonials->verified == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ isset($testimonials) && $testimonials->verified == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-green-700 px-3 py-2 cursor-pointer text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ isset($testimonials) ? 'Update' : 'Add' }} <!-- Dynamically change button text -->
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
