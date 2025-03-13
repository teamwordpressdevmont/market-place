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
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2 text-mat">Edit Tradeperson</h1>
        </div>
        <div class="">

                <form id="tradeperson" action="{{ isset($tradeperson) ? route('tradeperson.update', $tradeperson->id) : route('tradeperson.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($tradeperson))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="">
                            <label for="business_name" class="block text-sm/6 font-medium text-gray-900">Business Name</label>
                            <div class="mt-2">
                                    <input type="text" name="business_name" id="business_name" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('business_name', $tradeperson->business_name ?? '') }}">
                            </div>
                        </div>
                        <div class="">
                            <label for="user_id" class="block text-sm/6 font-medium text-gray-900">User</label>
                            <div class="mt-2 grid grid-cols-1">
                                <select id="user_id" name="user_id" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                    <option value="" disabled selected>Select a User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ isset($tradeperson) && $tradeperson->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-span-full mb-5">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2 rou bg-white">
                            <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('description', $tradeperson->description ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="sm:col-span-4 mb-5">
                        <label for="phone" class="block text-sm/6 font-medium text-gray-900">Phone</label>
                        <div class="mt-2">
                            <input type="text" name="phone" id="phone" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="janesmith" value="{{ old('phone', $tradeperson->phone ?? '') }}">
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                        <div class="mt-2 bg-white">
                            <textarea name="address" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                              {{ old('address', $tradeperson->address ?? '') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-full mb-5">
                        <label for="category_id" class="block text-sm/6 font-medium text-gray-900">Category</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select name="category_id" id="category_id" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ isset($tradepersonCategory) && $tradepersonCategory->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="featured-checkbox" type="checkbox" name="featured" value="1"
                            class="w-4 h-4 text-primary bg-white border-gray-300 rounded-sm focus:ring-primary"
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

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="">
                                <label for="image" class="block text-sm/6 font-medium text-gray-900">Portfolio</label>
                                <div class="mt-2">                            
                                        <input type="file" name="portfolio[]" id="portfolio" multiple accept="image/*" 
                                            class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm">
                                </div>

                                @if(!empty($tradeperson->portfolio))
                                @php
                                    $portfolioImages = json_decode($tradeperson->portfolio, true) ?? []; 
                                @endphp
                                
                                @if(!empty($portfolioImages) && is_array($portfolioImages))
                                    @foreach($portfolioImages as $image)
                                        <div class="image-container relative inline-block">
                                            <img src="{{ asset('storage/portfolio-images/' . $image) }}" class="h-20 w-20 object-cover rounded-md border">
                                        </div>
                                    @endforeach
                                @endif
                                @endif                                

                            </div>

                    
                    
                            <div class="">
                                <label for="certificate" class="block text-sm/6 font-medium text-gray-900">Certificate</label>
                                <div class="mt-2">                                
                                    <input type="file" name="certificate[]" id="certificate" multiple accept="image/*" 
                                            class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm">
                                </div>
                                @if(!empty($tradeperson->certificate))
                                @php
                                    $certificateImages = json_decode($tradeperson->certificate, true) ?? []; 
                                @endphp
                                
                                @if(!empty($certificateImages) && is_array($certificateImages))
                                    @foreach($certificateImages as $image)
                                        <div class="image-container relative inline-block">
                                            <img src="{{ asset('storage/certificate-images/' . $image) }}" class="h-20 w-20 object-cover rounded-md border">
                                        </div>
                                    @endforeach
                                @endif
                                @endif                                
                            </div> 
                    


                    </div>
                
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                            {{ isset($tradeperson) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
