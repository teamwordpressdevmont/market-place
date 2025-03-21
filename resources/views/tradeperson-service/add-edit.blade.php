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
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2 text-mat"> {{ isset($tradepersonService) ? 'Edit Tradeperson Service' : 'Add Tradeperson Service' }} </h1>
        </div>
        <div class="">

                <form id="tradepersonService" action="{{ isset($tradepersonService) ? route('tradeperson-service.update', $tradepersonService->id) : route('tradeperson-service.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @if (isset($tradepersonService))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="col-span-full mb-5">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <input type="text" name="title" id="title" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Title" value="{{ old('title', $tradepersonService->title ?? '') }}">
                            </div>
                        </div>

                        <div class="col-span-full mb-5">
                            <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                            <div class="mt-2 rou bg-white">
                                <textarea name="description" id="description" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    {{ old('description', $tradepersonService->description ?? '') }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-span-full mb-5 setting_fields">
                            <label for="features" class="block md:text-sm text-xs font-bold text-mat">Features</label>
                            <div class="features_container md:mt-4 mt-2">
                                @if(!empty($features))
                                    @foreach($features as $index => $feature)
                                <div class="flex items-center gap-3">
                                    <input type="text" name="features[title][]" id="features_title_{{$index}}"
                                        class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"
                                        value="{{ $feature['heading'] }}">
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

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label for="name" class="block md:text-sm text-xs font-bold text-mat">Price</label>
                            <div class="md:mt-4 mt-2">
                                    <input type="number" name="price" id="price" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"  placeholder="Price" value="{{ old('price', $tradepersonService->price ?? '') }}"> <!-- Pre-fill if editing -->
                            </div>
                        </div>
                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label for="binding_period" class="block text-sm/6 font-medium text-gray-900">Binding Period</label>
                            <div class="mt-2">
                                <input type="text" name="binding_period" id="binding_period" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" placeholder="Binding Period" value="{{ old('binding_period', $tradepersonService->binding_period ?? '') }}">
                            </div>
                        </div>

                        <div class="col-span-full mb-5">
                            <label for="search_visibility" class="block md:text-sm text-xs font-bold text-mat">Search Visibility</label>
                            <div class="md:mt-4 mt-2">
                                <div class="flex items-center rounded-md bg-white  outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-500">
                                    <select id="search_visibility" name="search_visibility" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3">
                                        <option value="Medium" {{ $tradepersonService->search_visibility == 'Medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="High" {{ $tradepersonService->search_visibility == 'High' ? 'selected' : '' }}>High</option>
                                        <option value="Premium" {{ $tradepersonService->search_visibility == 'Premium' ? 'selected' : '' }}>Premium</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Recommended Tradeperson:</label>
                            <div class="md:mt-4 mt-2">
                                <input type="hidden" name="recommended_tradeperson" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="recommended_tradeperson" value="1" class="sr-only peer"  {{ $tradepersonService->recommended_tradeperson ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                </label>
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Appear on Homepage:</label>
                            <div class="md:mt-4 mt-2">
                                <input type="hidden" name="appear_homepage" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="appear_homepage" value="1" class="sr-only peer" {{ $tradepersonService->appear_homepage ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                </label>
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Google Visibility:</label>
                            <div class="md:mt-4 mt-2">
                                <input type="hidden" name="google_visibility" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="google_visibility" value="1" class="sr-only peer" {{ $tradepersonService->google_visibility ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                </label>
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Access Premium Tender:</label>
                            <div class="md:mt-4 mt-2">
                                <input type="hidden" name="access_premium_tender" value="0">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="access_premium_tender" value="1" class="sr-only peer" {{ $tradepersonService->access_premium_tender ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-5 peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                                </label>
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Extra Clip:</label>
                            <div class="md:mt-4 mt-2">
                                <input type="text" name="extra_clip" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" value="{{ old('extra_clip', $tradepersonService->extra_clip ?? '') }}">
                            </div>
                        </div>

                        <div class="site_field_col mt-0! md:mb-7! !mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Contract Creation:</label>
                            <div class="md:mt-4 mt-2">
                                 <input type="text" name="contract_creation" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" value="{{ old('contract_creation', $tradepersonService->contract_creation ?? '') }}">
                            </div>
                        </div>

                        <div class="col-span-full mb-5">
                            <label class="block md:text-sm text-xs font-bold text-mat">Free Contract:</label>
                            <div class="md:mt-4 mt-2">
                                 <input type="text" name="free_contract" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3" value="{{ old('free_contract', $tradepersonService->free_contract ?? '') }}">
                            </div>
                        </div>

                    </div>

                   

                  
                   
                    
                   
                    
                
                    <div class="flex items-center justify-end gap-x-6">
                        <button type="submit"
                            class="bg-secondary rounded-full px-4 py-2 text-white w-48 flex justify-center items-center border border-primary hover:bg-primary transition">
                            {{ isset($tradepersonService) ? 'Update' : 'Add' }}
                        </button>
                    </div>
                </form>
      
        </div>

@endsection
