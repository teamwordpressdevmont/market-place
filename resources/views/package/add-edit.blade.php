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


    <h1 class="font-semibold text-4xl mb-10"> {{ isset($package) ? 'Update Package' : 'Add Package' }}</h1>



    <form  action="{{ isset($package) && $package ? route('package.update', $package) : route('package.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf
        @if (isset($package))
            @method('PUT')  <!-- Use PUT for update -->
        @endif

        <!-- Name Field -->
        <div class="sm:col-span-4 mb-5">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">

                    <input type="text" name="name" id="name"
                            class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5"
                            placeholder="Package Name" value="{{ old('name', $package->name ?? '') }}"> <!-- Pre-fill if editing -->
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
                    <input type="number" name="price" id="price"
                            class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5"
                            placeholder="Price" value="{{ old('price', $package->price ?? '') }}"> <!-- Pre-fill if editing -->
            </div>
        </div>

        <div class="sm:col-span-4 mb-5 setting_fields">
            <label for="features" class="block text-sm/6 font-medium text-gray-900">Features</label>
            <div class="features_container">
                @if(!empty($features))
                    @foreach($features as $index => $feature)
                <div class="flex items-center gap-4">
                    <input type="text" name="features[title][]" id="features_title_{{$index}}"
                        class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5"
                        value="{{ $feature['heading'] ?? '' }}">
                    <div class="col-1">
                        <a href="javascript:void(0)" class="add_sub_btn add_field" data-field_type="features">
                            <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#ff904e"></path>
                                <svg x="11" y="11" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7809 18.4199H7.86689V10.6354H0.332115V8.01279H7.86689V0.35313H10.7809V8.01279H18.3157V10.6354H10.7809V18.4199Z" fill="white"></path>
                                </svg>
                            </svg>
                        </a>
                        @unless($loop->first)
                            <a href="javascript:void(0)" class="add_sub_btn sub_field new" data-field_type="features">
                                <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#ff904e"></path>
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
                        <input type="text" name="features[title][]" id="features_title_0" class="rounded-lg bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-2.5"
                            value="">
                        <div class="col-1">
                            <a href="javascript:void(0)" class="add_sub_btn add_field" data-field_type="features">
                                <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#ff904e"></path>
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
        <div class="flex items-center justify-end gap-x-6 pt-5">
            <button type="submit"
                    class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                    {{ isset($package) ? 'Update' : 'Add New Package' }}
            </button>
        </div>
    </form>



@endsection
