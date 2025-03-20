@extends('layouts.app')
@section('content')

<div class="bgShadow">

   <div class="pt-15 pb-15">
        <div class="grid grid-cols-2 items-start">
            <h1 class="font-semibold lg:text-4xl md:text-2xl text-xl mb-2">Violations by Client</h1>
            {{-- <div class="flex justify-end">
               <a href="#" class="text-white bg-mat hover:bg-primary focus:outline-none  rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2">Suspend</a>
               <a href="#" class="text-white bg-secondary hover:bg-primary focus:outline-none  rounded-full text-sm px-20 py-2.5 text-center me-2 mb-2">Delete account</a>
            </div> --}}

        </div>
    </div>

   <div class="">

      <div class="grid grid-cols-1 lg:grid-cols-5">
         <div class="lg:col-span-1 p-">
            <img src="{{ $clientDetails->user->avatar }}" class="rounded-full w-60 h-60 object-cover mx-auto">
         </div>
         <div class="lg:col-span-2 p-4">
            <h4 class="font-semibold lg:text-2xl mt-4 mb-2 flex gap-2">{{ $clientDetails->first_name }} {{ $clientDetails->last_name }}</h4>
           {{-- <p class="text-[#2B2B2B] text-sm mt-2 flex leading-[1.1rem] mb-7">
           I’m a results-driven business professional with a focus on innovation, growth, and building successful ventures.</p> --}}


            <h4 class="font-semibold lg:text-2xl mb-2">Email</h4>
            <p class="text-[#ABABAB] text-xs mb-7 flex leading-none"> {{ $clientDetails->user->email }}</p>

            <h4 class="font-semibold lg:text-2xl mb-2">Phone no.</h4>
            <p class="text-[#ABABAB] text-xs mb-7 flex leading-none">{{ $clientDetails->phone }} </p>

            <h4 class="font-semibold lg:text-2xl mt-4 mb-2">Location</h4>
            <div class="mt-7 pb-5">
             <p class="text-[#ABABAB] text-xs mt-2 flex items-center leading-none gap-2">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M14.5 9C14.5 10.3807 13.3807 11.5 12 11.5C10.6193 11.5 9.5 10.3807 9.5 9C9.5 7.61929 10.6193 6.5 12 6.5C13.3807 6.5 14.5 7.61929 14.5 9Z" stroke="#DB4A2B" stroke-width="1.5"/>
                  <path d="M13.2574 17.4936C12.9201 17.8184 12.4693 18 12.0002 18C11.531 18 11.0802 17.8184 10.7429 17.4936C7.6543 14.5008 3.51519 11.1575 5.53371 6.30373C6.6251 3.67932 9.24494 2 12.0002 2C14.7554 2 17.3752 3.67933 18.4666 6.30373C20.4826 11.1514 16.3536 14.5111 13.2574 17.4936Z" stroke="#DB4A2B" stroke-width="1.5"/>
                  <path d="M18 20C18 21.1046 15.3137 22 12 22C8.68629 22 6 21.1046 6 20" stroke="#DB4A2B" stroke-width="1.5" stroke-linecap="round"/>
               </svg>
               {{ $clientDetails->address }}
             </p>
            </div>
            <div class="w-full max-w-[600px] h-[220px] border border-primary rounded-[20px] overflow-hidden p-3 mb-10">
               <iframe class="w-full h-full rounded-[10px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.95373631531692!3d-37.8162791797516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce7e33!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1646482392853!5m2!1sen!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
               </iframe>
            </div>

         </div>

      </div>

   </div>

</div>

@endsection
