<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#222222] border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
  <div class="h-full px-3 py-4 overflow-y-auto dark:bg-gray-800 flex flex-col">
    <ul class="space-y-2">
      <li>
        <a href="{{ route( 'dashboard' ) }}" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('dashboard') ? 'bg-primary' : '' }}">
            <svg class="shrink-0 w-5 h-5 transition" viewBox="0 0 15 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M2.8 1L2.74967 0.99997C2.52122 0.999752 2.32429 0.999564 2.14983 1.04145C1.60136 1.17312 1.17312 1.60136 1.04145 2.14983C0.999564 2.32429 0.999752 2.52122 0.99997 2.74967L1 2.8V5.2L0.99997 5.25033C0.999752 5.47878 0.999564 5.67572 1.04145 5.85017C1.17312 6.39864 1.60136 6.82688 2.14983 6.95856C2.32429 7.00044 2.52122 7.00025 2.74967 7.00003L2.8 7H5.2L5.25033 7.00003C5.47878 7.00025 5.67572 7.00044 5.85017 6.95856C6.39864 6.82688 6.82688 6.39864 6.95856 5.85017C7.00044 5.67572 7.00025 5.47878 7.00003 5.25033L7 5.2V2.8L7.00003 2.74967C7.00025 2.52122 7.00044 2.32429 6.95856 2.14983C6.82688 1.60136 6.39864 1.17312 5.85017 1.04145C5.67572 0.999564 5.47878 0.999752 5.25033 0.99997L5.2 1H2.8ZM2.38328 2.01382C2.42632 2.00348 2.49222 2 2.8 2H5.2C5.50779 2 5.57369 2.00348 5.61672 2.01382C5.79955 2.05771 5.94229 2.20045 5.98619 2.38328C5.99652 2.42632 6 2.49222 6 2.8V5.2C6 5.50779 5.99652 5.57369 5.98619 5.61672C5.94229 5.79955 5.79955 5.94229 5.61672 5.98619C5.57369 5.99652 5.50779 6 5.2 6H2.8C2.49222 6 2.42632 5.99652 2.38328 5.98619C2.20045 5.94229 2.05771 5.79955 2.01382 5.61672C2.00348 5.57369 2 5.50779 2 5.2V2.8C2 2.49222 2.00348 2.42632 2.01382 2.38328C2.05771 2.20045 2.20045 2.05771 2.38328 2.01382ZM9.8 1L9.74967 0.99997C9.52122 0.999752 9.32429 0.999564 9.14983 1.04145C8.60136 1.17312 8.17312 1.60136 8.04145 2.14983C7.99956 2.32429 7.99975 2.52122 7.99997 2.74967L8 2.8V5.2L7.99997 5.25033C7.99975 5.47878 7.99956 5.67572 8.04145 5.85017C8.17312 6.39864 8.60136 6.82688 9.14983 6.95856C9.32429 7.00044 9.52122 7.00025 9.74967 7.00003L9.8 7H12.2L12.2503 7.00003C12.4788 7.00025 12.6757 7.00044 12.8502 6.95856C13.3986 6.82688 13.8269 6.39864 13.9586 5.85017C14.0004 5.67572 14.0003 5.47878 14 5.25033L14 5.2V2.8L14 2.74967C14.0003 2.52122 14.0004 2.32429 13.9586 2.14983C13.8269 1.60136 13.3986 1.17312 12.8502 1.04145C12.6757 0.999564 12.4788 0.999752 12.2503 0.99997L12.2 1H9.8ZM9.38328 2.01382C9.42632 2.00348 9.49222 2 9.8 2H12.2C12.5078 2 12.5737 2.00348 12.6167 2.01382C12.7995 2.05771 12.9423 2.20045 12.9862 2.38328C12.9965 2.42632 13 2.49222 13 2.8V5.2C13 5.50779 12.9965 5.57369 12.9862 5.61672C12.9423 5.79955 12.7995 5.94229 12.6167 5.98619C12.5737 5.99652 12.5078 6 12.2 6H9.8C9.49222 6 9.42632 5.99652 9.38328 5.98619C9.20045 5.94229 9.05771 5.79955 9.01382 5.61672C9.00348 5.57369 9 5.50779 9 5.2V2.8C9 2.49222 9.00348 2.42632 9.01382 2.38328C9.05771 2.20045 9.20045 2.05771 9.38328 2.01382ZM2.74967 7.99997L2.8 8H5.2L5.25033 7.99997C5.47878 7.99975 5.67572 7.99956 5.85017 8.04145C6.39864 8.17312 6.82688 8.60136 6.95856 9.14983C7.00044 9.32429 7.00025 9.52122 7.00003 9.74967L7 9.8V12.2L7.00003 12.2503C7.00025 12.4788 7.00044 12.6757 6.95856 12.8502C6.82688 13.3986 6.39864 13.8269 5.85017 13.9586C5.67572 14.0004 5.47878 14.0003 5.25033 14L5.2 14H2.8L2.74967 14C2.52122 14.0003 2.32429 14.0004 2.14983 13.9586C1.60136 13.8269 1.17312 13.3986 1.04145 12.8502C0.999564 12.6757 0.999752 12.4788 0.99997 12.2503L1 12.2V9.8L0.99997 9.74967C0.999752 9.52122 0.999564 9.32429 1.04145 9.14983C1.17312 8.60136 1.60136 8.17312 2.14983 8.04145C2.32429 7.99956 2.52122 7.99975 2.74967 7.99997ZM2.8 9C2.49222 9 2.42632 9.00348 2.38328 9.01382C2.20045 9.05771 2.05771 9.20045 2.01382 9.38328C2.00348 9.42632 2 9.49222 2 9.8V12.2C2 12.5078 2.00348 12.5737 2.01382 12.6167C2.05771 12.7995 2.20045 12.9423 2.38328 12.9862C2.42632 12.9965 2.49222 13 2.8 13H5.2C5.50779 13 5.57369 12.9965 5.61672 12.9862C5.79955 12.9423 5.94229 12.7995 5.98619 12.6167C5.99652 12.5737 6 12.5078 6 12.2V9.8C6 9.49222 5.99652 9.42632 5.98619 9.38328C5.94229 9.20045 5.79955 9.05771 5.61672 9.01382C5.57369 9.00348 5.50779 9 5.2 9H2.8ZM9.8 8L9.74967 7.99997C9.52122 7.99975 9.32429 7.99956 9.14983 8.04145C8.60136 8.17312 8.17312 8.60136 8.04145 9.14983C7.99956 9.32429 7.99975 9.52122 7.99997 9.74967L8 9.8V12.2L7.99997 12.2503C7.99975 12.4788 7.99956 12.6757 8.04145 12.8502C8.17312 13.3986 8.60136 13.8269 9.14983 13.9586C9.32429 14.0004 9.52122 14.0003 9.74967 14L9.8 14H12.2L12.2503 14C12.4788 14.0003 12.6757 14.0004 12.8502 13.9586C13.3986 13.8269 13.8269 13.3986 13.9586 12.8502C14.0004 12.6757 14.0003 12.4788 14 12.2503L14 12.2V9.8L14 9.74967C14.0003 9.52122 14.0004 9.32429 13.9586 9.14983C13.8269 8.60136 13.3986 8.17312 12.8502 8.04145C12.6757 7.99956 12.4788 7.99975 12.2503 7.99997L12.2 8H9.8ZM9.38328 9.01382C9.42632 9.00348 9.49222 9 9.8 9H12.2C12.5078 9 12.5737 9.00348 12.6167 9.01382C12.7995 9.05771 12.9423 9.20045 12.9862 9.38328C12.9965 9.42632 13 9.49222 13 9.8V12.2C13 12.5078 12.9965 12.5737 12.9862 12.6167C12.9423 12.7995 12.7995 12.9423 12.6167 12.9862C12.5737 12.9965 12.5078 13 12.2 13H9.8C9.49222 13 9.42632 12.9965 9.38328 12.9862C9.20045 12.9423 9.05771 12.7995 9.01382 12.6167C9.00348 12.5737 9 12.5078 9 12.2V9.8C9 9.49222 9.00348 9.42632 9.01382 9.38328C9.05771 9.20045 9.20045 9.05771 9.38328 9.01382Z"
                fill="currentColor"
            />
            </svg>               
            <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
        </a>
      </li>
      <li>
          <button type="button" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white w-full" aria-controls="dropdown-1" data-collapse-toggle="dropdown-1">
          <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="9" y="2" width="6" height="6" rx="1" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 18V14C4 13.4477 4.44772 13 5 13H19C19.5523 13 20 13.4477 20 14V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="4" cy="20" r="2" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="20" cy="20" r="2" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="12" cy="20" r="2" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 8V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
                <span class="flex-1 ms-3 text-left whitespace-nowrap ">Categories</span>
                <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
          </button>
          <ul id="dropdown-1" class="hidden py-2 space-y-2">
            <li>
              <a href="{{ route( 'category.list' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('categories') ? 'bg-primary' : '' }}">All Categories</a>
            </li>
            <li>
              <a href="{{ route( 'category.addEdit' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('categories/add') ? 'bg-primary' : '' }}">Add New Category</a>
            </li>          
          </ul>
      </li>               
      <li>
            <button type="button" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white w-full" aria-controls="dropdown-2" data-collapse-toggle="dropdown-2">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6 22H18C19.1046 22 20 21.1046 20 20V9.82843C20 9.29799 19.7893 8.78929 19.4142 8.41421L13.5858 2.58579C13.2107 2.21071 12.702 2 12.1716 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13 2.5V9H19" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8 17H15" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8 13H15" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8 9H9" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap ">Blogs</span>
                  <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                  </svg>
            </button>
            <ul id="dropdown-2" class="hidden py-2 space-y-2">
              <li>
                <a href="{{ route( 'blog.list' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('blog') ? 'bg-primary' : '' }}">All Blogs</a>
              </li>
              <li>
                <a href="{{ route( 'blog.addEdit' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('blog/add') ? 'bg-primary' : '' }}">Add New Blog</a>
              </li>          
            </ul>
      </li>
      <li>
        <button type="button" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white w-full" aria-controls="dropdown-3" data-collapse-toggle="dropdown-3">
        <svg fill="#ffffff" width="20px" height="20px" viewBox="-2 -2.5 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-message"><path d='M9.378 12H17a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1 1 1 0 0 1 1 1v3.013L9.378 12zM3 0h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.006V14a2 2 0 0 1-2-2V3a3 3 0 0 1 3-3z'/></svg>

              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap ">Testimonials</span>
              <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
        </button>
        <ul id="dropdown-3" class="hidden py-2 space-y-2">
          <li>
            <a href="{{ route( 'testimonial.list' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('testimonial') ? 'bg-primary' : '' }}">All Testimonials</a>
          </li>
          <li>
            <a href="{{ route( 'testimonial.addEdit' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('testimonial/add') ? 'bg-primary' : '' }}">Add New Testimonial</a>
          </li>          
        </ul>
      </li>

      <li>
        <button type="button" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white w-full" aria-controls="dropdown-4" data-collapse-toggle="dropdown-4">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 8.80835C5.5 8.80835 5 10.6111 5 13.5C5 16.3889 5.38889 18.9167 5.77778 19.2778C6.16667 19.6389 8.88889 20 12 20C15.1111 20 17.8333 19.6389 18.2222 19.2778C18.6111 18.9167 19 16.3889 19 13.5C19 10.6111 18.5 8.80835 18.5 8.80835M5.5 8.80835C6.65798 8.91328 9.19021 9 12 9C14.8098 9 17.342 8.91328 18.5 8.80835M5.5 8.80835C5.19265 8.7805 4.98211 8.75135 4.88889 8.72222C4.44444 8.58333 4 7.61111 4 6.5C4 5.38889 4.44444 4.41667 4.88889 4.27778C5.33333 4.13889 8.44444 4 12 4C15.5556 4 18.6667 4.13889 19.1111 4.27778C19.5556 4.41667 20 5.38889 20 6.5C20 7.61111 19.5556 8.58333 19.1111 8.72222C19.0179 8.75135 18.8074 8.7805 18.5 8.80835M10 13C10 13 10.5 12.5 12 12.5C13.5 12.5 14 13 14 13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

              <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap ">Package</span>
              <svg class="w-3 h-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
        </button>
        <ul id="dropdown-4" class="hidden py-2 space-y-2">
          <li>
            <a href="{{ route( 'package.list' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('package') ? 'bg-primary' : '' }}">All Package</a>
          </li>
          <li>
            <a href="{{ route( 'package.addEdit' ) }}" class="flex text-sm items-center font-normal w-full p-2 transition duration-75 rounded-lg pl-11 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('package/add') ? 'bg-primary' : '' }}">Add New Package</a>
          </li>          
        </ul>
      </li>     
      
      <li>
        <a href="{{ route( 'tradeperson.list' ) }}" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('tradeperson') ? 'bg-primary' : '' }}">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 10L8 16" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 12V16" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M16 8V16" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
<rect x="3" y="4" width="18" height="16" rx="2" stroke="#ffffff"/>
</svg>
           <span class="flex-1 ms-3 whitespace-nowrap ">Trade Person</span>
        </a>
      </li>

      <li>
        <a href="{{ route( 'joblisting.list' ) }}" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('joblisting') ? 'bg-primary' : '' }}">

           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
          <path d="M8 10L8 11" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M2 10C2.09955 11.955 2.20381 12.981 2.93208 13.6298C3.72183 14.3333 4.9537 14.3333 7.41743 14.3333H8.58257C11.0463 14.3333 12.2782 14.3333 13.0679 13.6298C13.7962 12.981 13.9005 11.955 14 10" stroke="#EDE9D0" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M1.89845 6.96204C3.03131 9.11629 5.58646 10 8.00033 10C10.4142 10 12.9693 9.11629 14.1022 6.96204C14.643 5.93371 14.2335 4 12.9017 4H3.09899C1.76715 4 1.35768 5.93371 1.89845 6.96204Z" stroke="#EDE9D0"/>
          <path d="M10.6673 3.99996L10.6084 3.79392C10.3151 2.76722 10.1684 2.25387 9.81925 1.96025C9.47007 1.66663 9.00625 1.66663 8.07863 1.66663H7.92268C6.99505 1.66663 6.53123 1.66663 6.18205 1.96025C5.83287 2.25387 5.6862 2.76722 5.39285 3.79392L5.33398 3.99996" stroke="#EDE9D0"/>
          </svg>
           <span class="flex-1 ms-3 whitespace-nowrap ">Job Listing</span>
        </a>
      </li>

      <li>
        <a href="{{ route( 'contact' ) }}" class="flex items-center p-2 text-white rounded-lg hover:bg-primary group-hover:text-white {{ Request::is('contact') ? 'bg-primary' : '' }}">
           <svg class="shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18"><path d="M19,4H5A3,3,0,0,0,2,7V17a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4ZM5,6H19a1,1,0,0,1,1,1l-8,4.88L4,7A1,1,0,0,1,5,6ZM20,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9.28l7.48,4.57a1,1,0,0,0,1,0L20,9.28Z"/></svg>               
           <span class="flex-1 ms-3 whitespace-nowrap ">Contact</span>
        </a>
      </li>

    </ul>

    <a href="{{ route('logout') }}" class="text-primary bg-white hover:bg-primary hover:text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none flex items-center group mt-auto">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" class="stroke-current group-hover:text-white">
        <path d="M9.33333 2.06334C9.02866 2.02161 8.71702 2 8.4 2C4.86538 2 2 4.68629 2 8C2 11.3137 4.86538 14 8.4 14C8.71702 14 9.02866 13.9784 9.33333 13.9367" />
        <path d="M14.0002 7.99998L7.3335 7.99998M14.0002 7.99998C14.0002 7.53316 12.6706 6.661 12.3335 6.33331M14.0002 7.99998C14.0002 8.4668 12.6706 9.33896 12.3335 9.66665" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
</a>


    
   </div>
</aside>