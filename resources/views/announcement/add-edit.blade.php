@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="bgShadow pt-10 pb-8">
       <div class="grid grid-cols-1 mb-6 items-start">
          <div>
             <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Announcements</h1>
          </div>
       </div>
       
       <form id="blogForm" action="{{ route('announcement.store') }}" method="POST">
            @csrf

            {{-- Title Field --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-0! mb-7! items-end">
                <div class="col-span-2 site_field_col">
                    <label for="title" class="block text-sm font-bold text-mat">Title</label>
                    <div class="mt-2">
                        <input type="text" name="title" id="title"
                            class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block w-full text-sm p-3"
                            placeholder="Enter announcement title" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Role Selection --}}
                <div class="site_field_col">
                    <label for="role" class="block text-sm font-bold text-mat">Send To</label>
                    <div class="mt-2 grid grid-cols-1">
                        <select id="role" name="role"
                                class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block w-full text-sm p-3">
                            <option value="" disabled selected>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Message Field --}}
            <div class="site_field_col mt-0! mb-7!">
                <label for="message" class="block text-sm font-bold text-mat">Description</label>
                <div class="mt-4 bg-white rounded-2xl">
                    <textarea name="message" id="message" rows="3"
                            class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="site_field_col mt-0! mb-7!">
                <button type="submit"
                        class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">
                    Send
                </button>
            </div>
        </form>
    
    </div>
</div>
@endsection
