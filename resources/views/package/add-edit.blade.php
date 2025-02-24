@extends('layouts.app')

@section('content')

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"> {{ isset($package) ? 'Update Package' : 'Add Package' }}</h1>
        </div>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div class="pb-12">

                <form id="package" action="{{ isset($package) ? route('package.update', $package->id) : route('package.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($package))
                        @method('PUT')  <!-- Use PUT for update -->
                    @endif

                    <!-- Name Field -->
                    <div class="sm:col-span-4 mb-5">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="name"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Package Name" value="{{ old('name', $package->name ?? '') }}"> <!-- Pre-fill if editing -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description Field -->
                    <div class="sm:col-span-4 mb-5">
                        <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <textarea name="description" id="description"
                                          class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                          cols="30" rows="10">{{ old('description', $package->description ?? '') }}</textarea> <!-- Pre-fill if editing -->
                            </div>
                        </div>
                    </div>

                     <!-- Price Field -->
                    <div class="sm:col-span-4 mb-5">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Price</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="number" name="price" id="price"
                                       class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                       placeholder="Price" value="{{ old('price', $package->price ?? '') }}"> <!-- Pre-fill if editing -->
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4 mb-5 setting_fields">
                        <label for="features" class="block text-sm/6 font-medium text-gray-900">Features</label>
                        <div class="features_container">
                            @if(!empty($features))
                                @foreach($features as $index => $feature)
                            <div class="flex items-center gap-4">
                                <input type="text" name="features[title][]" id="features_title_{{$index}}"
                                    class="rounded-md bg-white block w-full py-1.5 px-3 text-base text-gray-900 outline-1 w-full -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600"
                                    value="{{ $feature['heading'] ?? '' }}"> 
                                <div class="col-1">
                                    <a href="javascript:void(0)" class="add_sub_btn add_field" data-field_type="features">
                                        <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#3fa872"></path>
                                            <svg x="11" y="11" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.7809 18.4199H7.86689V10.6354H0.332115V8.01279H7.86689V0.35313H10.7809V8.01279H18.3157V10.6354H10.7809V18.4199Z" fill="white"></path>
                                            </svg>
                                        </svg>
                                    </a>
                                    @unless($loop->first)
                                        <a href="javascript:void(0)" class="add_sub_btn sub_field new" data-field_type="features">
                                            <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#3fa872"></path>
                                                <svg x="13.5" y="19" width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.957458 3.29962V0.552137H13.6126V3.29962H0.957458Z" fill="white"></path>
                                                </svg>
                                            </svg>
                                        </a>
                                    @endunless
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="flex items-center gap-4 ">
                                    <input type="text" name="features[title][]" id="features_title_0" class="rounded-md bg-white block w-full py-1.5 px-3 text-base text-gray-900 outline-1 w-full -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600"
                                        value="">
                                    <div class="col-1">
                                        <a href="javascript:void(0)" class="add_sub_btn add_field" data-field_type="features">
                                            <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#3fa872"></path>
                                                <svg x="11" y="11" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.7809 18.4199H7.86689V10.6354H0.332115V8.01279H7.86689V0.35313H10.7809V8.01279H18.3157V10.6354H10.7809V18.4199Z" fill="white"></path>
                                                </svg>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                                class="rounded-md cursor-pointer bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                {{ isset($package) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection
