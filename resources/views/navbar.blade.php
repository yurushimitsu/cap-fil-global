<nav class="" style="background-color: #B1D4E0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{ url('/home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="{{ asset('img/cap.png') }}" class="h-8" alt="Flowbite Logo" />
        <span class="hidden sm:block self-center md:text-2xl font-semibold whitespace-nowrap sm:text-sm">COLLEGE ASSURANCE PLAN PHILIPPINES, INC.</span>
        <span class="md:hidden self-center md:text-2xl font-semibold whitespace-nowrap sm:text-sm">CAP PHIL INC.</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-700 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
        <li>
          <a href="{{ url('/home') }}" class="flex items-center rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center text-sm font-medium w-full py-2 px-3 text-gray-900 rounded-md hover:bg-gray-700 hover:text-white">
              Payment Schedule 
              <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="{{ url('/fullypaid') }}" class="block px-4 py-2 hover:bg-gray-100">Fully Paid</a>
                  </li>
                  <li>
                    <a href="{{ url('/terminated') }}" class="block px-4 py-2 hover:bg-gray-100">Terminated</a>
                  </li>
                </ul>
            </div>
        </li>
        <li>
          <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2" class="flex items-center text-sm font-medium w-full py-2 px-3 text-gray-900 rounded-md hover:bg-gray-700 hover:text-white">
            Admin 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNavbar2" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
              <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="{{ url('/admin/create') }}" class="block px-4 py-2 hover:bg-gray-100">Create</a>
                </li>
                <li>
                  <a href="{{ url('/admin/table') }}" class="block px-4 py-2 hover:bg-gray-100">Table</a>
                </li>
                <li>
                  <a href="{{ url('/admin/announcement') }}" class="block px-4 py-2 hover:bg-gray-100">Announcement</a>
                </li>
              </ul>
          </div>
        </li>
        <li>
          <a href="{{ url('/announcement') }}" class="flex items-center rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white">Announcement</a>
        </li>
        <li>
          <a href="{{ url('/contact_us') }}" class="flex items-center rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>