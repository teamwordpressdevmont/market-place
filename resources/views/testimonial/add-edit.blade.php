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

        <h1 class="font-semibold text-4xl mb-10">Add Testimonial</h1>

        <div class="">

                <form id="testimonialForm" action="{{ isset($testimonials) ? route('testimonial.update', $testimonials->id) : route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($testimonials))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="site_field_col">
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('name', $testimonials->name ?? '') }}">
                            </div>
                        </div>

                        <div class="site_field_col">
                            <label for="heading" class="block text-sm/6 font-medium text-gray-900">Heading</label>
                            <div class="mt-2">
                                    <input type="text" name="heading" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('heading', $testimonials->heading ?? '') }}">
                            </div>
                        </div>


                        <div class="site_field_col">
                            <label for="category_id" class="block text-sm/6 font-medium text-gray-900">User</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="user_id" name="user_id" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                    <option value="" disabled selected>Select a User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($testimonials) && $testimonials->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>



                    <div class="site_field_col">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2 bg-white">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $testimonials->description ?? '') }}
                            </textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="site_field_col">
                            <label for="rating" class="block text-sm/6 font-medium text-gray-900">Rating</label>
                            <div class="mt-2">
                                <input type="number" name="rating" id="rating" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="3" value="{{ old('rating', $testimonials->rating ?? '') }}"  min="1" max="5">
                            </div>
                        </div>

                        <div class="site_field_col">
                            <label for="verified" class="block text-sm/6 font-medium text-gray-900">Verified:</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="verified" name="verified" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                    <option value="1" {{ isset($testimonials) && $testimonials->verified == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ isset($testimonials) && $testimonials->verified == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="flex items-center justify-end gap-x-6 pt-5">
                        <button type="submit"
                            class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                            {{ isset($testimonials) ? 'Update' : 'Add Testimonial' }} <!-- Dynamically change button text -->
                        </button>
                    </div>
                </form>

        </div>

@endsection
