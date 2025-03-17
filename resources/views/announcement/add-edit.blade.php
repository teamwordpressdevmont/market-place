@extends('layouts.app')
@section('content')
<div class="mt-5">
    <div class="bgShadow pt-10 pb-8">
       <div class="grid grid-cols-1 mb-6 items-start">
          <div>
             <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Announcements</h1>
          </div>
       </div>
        <form id="blogForm" action="" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-0! mb-7! items-end">
                <div class="col-span-2 site_field_col">
                    <label for="name" class="block text-sm font-bold text-mat">Title</label>
                    <div class="mt-2">
                        <input type="text" name="name" id="name" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3 flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600" placeholder="janesmith" value="">
                    </div>
                </div>




                <div class="site_field_col">
                    <label for="category_id" class="block text-sm font-bold text-mat">Send To</label>
                    <div class="mt-2 grid grid-cols-1">
                        <select id="user_id" name="user_id" class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3 flex items-center rounded-2xl bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600 text-[#ABABAB]">
                            <option value="" disabled="" selected="">Tradepersons</option>
                                                                    <option value="1">
                                    Admin
                                </option>
                                                                    <option value="2">
                                    Customer
                                </option>
                                                                    <option value="3">
                                    Tradeperson
                                </option>





                                                            </select>
                    </div>
                </div>


            </div>
            <div class="site_field_col mt-0! mb-7!">
                <label for="description" class="block text-sm font-bold text-mat">Description</label>
                <div class="mt-4 bg-white rounded-2xl">
                    <textarea name="description" id="content" rows="3" class="textarea_editor block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                </div>
            </div>
            <div class="site_field_col mt-0! mb-7!">
                <a href="#" class="bg-secondary rounded-full px-12 py-2 text-sm text-white border border-primary hover:bg-primary transition">Send</a>
            </div>
        </form>
    </div>
</div>
@endsection
