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
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Tradeperson</h1>
        </div>
        <div class="">

                <form id="tradeperson" action="{{ isset($tradeperson) ? route('tradeperson.update', $tradeperson->id) : route('tradeperson.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($tradeperson))
                        @method('PUT')
                    @endif
                    <div class="sm:col-span-4 mb-5">
                        <label for="business_name" class="block text-sm/6 font-medium text-gray-900">Business Name</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="business_name" id="business_name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('business_name', $tradeperson->business_name ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="category_id" class="block text-sm/6 font-medium text-gray-900">User</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select id="user_id" name="user_id" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                <option value="" disabled selected>Select a User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($tradeperson) && $tradeperson->user_id == $user->id ? 'selected' : '' }}>
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
                              {{ old('description', $tradeperson->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="phone" id="phone" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="janesmith" value="{{ old('phone', $tradeperson->phone ?? '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                        <div class="mt-2">
                            <textarea name="address" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('address', $tradeperson->address ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="featured-checkbox" type="checkbox" name="featured" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            {{ isset($tradeperson) && $tradeperson->featured == '1' ? 'checked' : '' }}>
                        <label for="featured-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Featured</label>
                    </div>

                    {{-- <div class="col-span-full mb-5">
                        <label for="about" class="block text-sm/6 font-medium text-gray-900">About</label>
                        <div class="mt-2">
                            <textarea name="about" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">{{ old('about', $tradepersonDetail->about ?? '') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-span-full mb-5">
                        <label for="services" class="block text-sm/6 font-medium text-gray-900">Services</label>
                        <div class="mt-2">
                            <textarea name="services" id="services" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900">{{ old('services', $tradepersonDetail->services ?? '') }}</textarea>
                        </div>
                    </div>
                    --}}
                    {{-- <div class="sm:col-span-4 mb-5">
                        <label for="image" class="block text-sm/6 font-medium text-gray-900">Portfolio</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="file" name="portfolio[]" id="portfolio" multiple accept="image/*" 
                                    class="image block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-span-full mb-5">
                        <label for="certifications" class="block text-sm/6 font-medium text-gray-900">Certifications</label>
                        <input type="file" name="certifications[]" id="certifications" multiple class="block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50">
                    </div>  --}}
                
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="rounded-md bg-green-700 px-3 py-2 cursor-pointer text-sm font-semibold text-white shadow-xs hover:bg-green-900 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ isset($tradeperson) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
