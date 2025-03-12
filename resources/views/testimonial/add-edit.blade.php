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
        <h1 class="font-semibold text-4xl mb-10">Add Testimonial</h1>

        <div class="">

                <form id="testimonialForm" action="{{ isset($testimonials) ? route('testimonial.update', $testimonials->id) : route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($testimonials))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="site_field_col mt-0! mb-7!">
                            <label for="name" class="block text-sm font-bold text-mat">Name</label>
                            <div class="mt-4">
                                <input type="text" name="name" id="name" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('name', $testimonials->name ?? '') }}">
                            </div>
                        </div>

                        <div class="site_field_col mt-0! mb-7!">
                            <label for="heading" class="block text-sm font-bold text-mat">Heading</label>
                            <div class="mt-4">
                                    <input type="text" name="heading" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('heading', $testimonials->heading ?? '') }}">
                            </div>
                        </div>


                        <div class="site_field_col mt-0! mb-7!">
                            <label for="category_id" class="block text-sm font-bold text-mat">User</label>
                            <div class="mt-4 grid grid-cols-1">
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
                    <div class="site_field_col mt-0! mb-7!">
                        <label for="description" class="block text-sm font-bold text-mat">Description</label>
                        <div class="mt-4 bg-white">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"">
                              {{ old('description', $testimonials->description ?? '') }}
                            </textarea>
                        </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="site_field_col mt-0! mb-7!">
                            <label for="rating" class="block text-sm font-bold text-mat">Rating</label>
                            <div class="mt-4">
                                <input type="number" name="rating" id="rating" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="3" value="{{ old('rating', $testimonials->rating ?? '') }}"  min="1" max="5">
                            </div>
                        </div>

                        <div class="site_field_col mt-0! mb-7!">
                            <label for="verified" class="block text-sm font-bold text-mat">Verified:</label>
                            <div class="mt-4 grid grid-cols-1">
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
    </div>

@endsection
