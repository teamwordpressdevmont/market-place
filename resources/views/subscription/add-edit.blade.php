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

    <div class="mt-5 bgShadow">
        <div class="pt-10 pb-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 items-start md:mb-10 mb-5 lg:gap-0 gap-4">
                <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl text-mat"> {{ isset($subscription) ? 'Update subscription' : 'Add subscription' }}</h1>
                <div class="flex md:justify-end justify-start self-start">
                    {{--  <button type="submit" class="bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-40 border border-primary hover:bg-primary transition">Add New Plan<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="pl-1">
                        <path d="M11 7V15M15 11L7 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="white" stroke-width="1.5"></path>
                    </svg>
                    </button>  --}}
                    <a href="{{ route('subscription.addEdit') }}" class="lg:ml-auto bg-secondary rounded-full px-4 py-2 text-sm text-white flex items-center justify-between w-fit border border-primary hover:bg-primary transition gap-8">Add New Plan
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="stroke-current group-hover:text-white">
                            <path d="M12 8V16M16 12L8 12" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z" stroke-width="1.5"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <form  action="{{ isset($subscription) && $subscription ? route('subscription.update', $subscription) : route('subscription.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

                @csrf
                @if (isset($subscription))
                    @method('PUT')  <!-- Use PUT for update -->
                @endif

                <!-- Name Field -->
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="title" class="block md:text-sm text-xs font-bold text-mat">Title</label>
                    <div class="md:mt-4 mt-2">

                            <input type="text" name="title" id="title"
                                    class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"
                                    placeholder="subscription Title" value="{{ old('title', $subscription->title ?? '') }}"> <!-- Pre-fill if editing -->
                    </div>
                </div>

                <!-- Description Field -->
                <div class="site_field_col mt-0! md:mb-7! !mb-5">
                    <label for="description" class="block md:text-sm text-xs font-bold text-mat">Description</label>
                    <div class="md:mt-4 mt-2">
                        <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                            <textarea name="description" id="description"
                                        class="textarea_editor block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                        cols="30" rows="10">{{ old('description', $subscription->description ?? '') }}</textarea> <!-- Pre-fill if editing -->
                        </div>
                    </div>
                </div>

                <!-- Price Field -->
                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="name" class="block md:text-sm text-xs font-bold text-mat">Price</label>
                        <div class="md:mt-4 mt-2">
                                <input type="number" name="price" id="price" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Price" value="{{ old('price', $subscription->price ?? '') }}"> <!-- Pre-fill if editing -->
                        </div>
                    </div>
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="clip_number" class="block md:text-sm text-xs font-bold text-mat">Clip Number</label>
                        <div class="md:mt-4 mt-2">
                            <input type="number" name="clip_number" id="clip_number" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Clip Number" value="{{ old('clip_number', $subscription->clip_number ?? '') }}">
                        </div>
                    </div>
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <label for="free_clip_number" class="block md:text-sm text-xs font-bold text-mat">Free Clip Number</label>
                        <div class="md:mt-4 mt-2">
                            <input type="number" name="free_clip_number" id="free_clip_number" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Free Clip Number" value="{{ old('free_clip_number', $subscription->free_clip_number ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="site_field_col mt-0! md:mb-7! !mb-5 setting_fields">
                    <label for="features" class="block md:text-sm text-xs font-bold text-mat">Features</label>
                    <div class="features_container md:mt-4 mt-2">
                        @if(!empty($features))
                            @foreach($features as $index => $feature)
                        <div class="flex items-center gap-3">
                            <input type="text" name="features[title][]" id="features_title_{{$index}}"
                                class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"
                                value="{{ is_array($feature) ? implode(', ', $feature) : $feature }}">
                            <div class="col-1">
                                <a href="javascript:void(0)" class="mb-2 add_sub_btn add_field mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                                    </svg>
                                </a>
                                @unless($loop->first)
                                    <a href="javascript:void(0)" class="mb-2 add_sub_btn sub_field new mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                                        </svg>
                                    </a>
                                @endunless
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div class="flex items-center gap-3">
                                <input type="text" name="features[title][]" id="features_title_0" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"
                                    value="">
                                <div class="col-1">
                                    <a href="javascript:void(0)" class="add_sub_btn add_field mt-0! bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <select name="binding_period" id="binding_period"
                        class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                            <option value="">Select Month</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                        </select>
                    </div>
                    <div class="site_field_col mt-0! md:mb-7! !mb-5">
                        <select name="profile_type" id="profile_type"
                        class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                            <option value="">Profile Type</option>
                                <option value="Standard">Standard</option>
                                <option value="Premium">Premium</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="grid grid-cols-1 md:grid-cols-2 md:gap-4">
                    <label class="inline-flex items-center me-5 cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" checked>
                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500 dark:peer-checked:bg-orange-500"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Orange</span>
                    </label>
                </div> --}}
                <!-- Submit Button -->
                <div class="flex items-center">
                    <button type="submit" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Save Plan</button>
                </div>
            </form>
        </div>
    </div>



@endsection
