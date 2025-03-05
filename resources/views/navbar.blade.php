
<nav class="p-3" style="background-color: #B1D4E0">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
                Icon when menu is closed.

                Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
                Icon when menu is open.

                Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
            </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start gap-4">
            <div class="flex shrink-0 items-center">
            <img class="h-8 w-auto" src="{{ asset('img/hat-graduation-png-5.png')}}" alt="Your Company">
            </div>
            <div>
                <h1 class="text-2xl">COLLEGE ASSURANCE PLAN PHILIPPINES, INC.</h1>
            </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            
              <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ url('/home') }}" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
                    {{-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white">Payment Schedule</a> --}}
                    <div class="relative inline-block text-left" x-data="{ open: false }">
                        <div class="">
                          <button
                            type="button"
                            class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-700 hover:text-white"
                            id="menu-button"
                            aria-expanded="false"
                            aria-haspopup="true"
                            @click="open = !open"
                            @keydown.escape="open = false"
                          >
                            Payment Schedule
                            <svg
                              class="-mr-1 size-5 text-black"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                              aria-hidden="true"
                              data-slot="icon"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </button>
                        </div>
                      
                        <!-- Dropdown menu -->
                        <div
                          x-show="open"
                          x-transition:enter="transition ease-out duration-100"
                          x-transition:enter-start="transform opacity-0 scale-95"
                          x-transition:enter-end="transform opacity-100 scale-100"
                          x-transition:leave="transition ease-in duration-75"
                          x-transition:leave-start="transform opacity-100 scale-100"
                          x-transition:leave-end="transform opacity-0 scale-95"
                          class="absolute right-0 z-10 mt-2 w-30 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                          role="menu"
                          aria-orientation="vertical"
                          aria-labelledby="menu-button"
                          tabindex="-1"
                          @click.outside="open = false"
                        >
                          <div class="py-1" role="none">
                            <a
                              href="{{ url('/fullypaid') }}"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              role="menuitem"
                              tabindex="-1"
                              id="menu-item-0"
                              >Fully Paid</a>
                            <a
                              href="{{ url('/terminated') }}"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              role="menuitem"
                              tabindex="-1"
                              id="menu-item-1"
                              >Terminated</a>
                          </div>
                        </div>
                    </div>

                    <div class="relative inline-block text-left" x-data="{ open: false }">
                      <div class="">
                        <button
                          type="button"
                          class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-gray-700 hover:text-white"
                          id="menu-button"
                          aria-expanded="false"
                          aria-haspopup="true"
                          @click="open = !open"
                          @keydown.escape="open = false"
                        >
                          Admin
                          <svg
                            class="-mr-1 size-5 text-black"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                              clip-rule="evenodd"
                            />
                          </svg>
                        </button>
                      </div>
                    
                      <!-- Dropdown menu -->
                      <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-30 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="menu-button"
                        tabindex="-1"
                        @click.outside="open = false"
                      >
                          <div class="py-1" role="none">
                            <a
                              href="{{ url('/admin/create') }}"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              role="menuitem"
                              tabindex="-1"
                              id="menu-item-0"
                              >Create</a
                            >
                            <a
                              href="{{ url('/admin/table') }}"
                              class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              role="menuitem"
                              tabindex="-1"
                              id="menu-item-1"
                              >Table</a>
                          </div>
                        </div>
                    </div>
                      
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white">Announcement</a>
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-gray-700 hover:text-white">Contact Us</a>
                </div>
                </div>
            {{-- <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3" x-data="{ open: false }">
                <div>
                    <button 
                        type="button" 
                        class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" 
                        id="user-menu-button" 
                        aria-expanded="false" 
                        aria-haspopup="true"
                        @click="open = !open"
                    >
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </button>
                </div>

                <!-- Dropdown menu -->
                <div
                    x-show="open" 
                    @click.away="open = false" 
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden" 
                    role="menu" 
                    aria-orientation="vertical" 
                    aria-labelledby="user-menu-button" 
                    tabindex="-1"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    >
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
            </div>
            </div> --}}
        </div>
        </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Dashboard</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
        </div>
    </div>
</nav>