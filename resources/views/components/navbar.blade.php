<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex ml-auto items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
<button type="button" class="gap-3 flex items-center text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
    <img class="w-8 h-8 rounded-full" src="https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg" alt="">
    <div class="pr-4">
        <p class="font-semibold">{{ Auth::user()->pegawai->nama_pegawai }}</p>
    </div>
</button>

<!-- Dropdown menu -->
<div class="z-50 hidden list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 w-48" id="user-dropdown">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
        <li>
            <button class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5.121 17.804A13.937 13.937 0 0112 15c2.021 0 3.937.437 5.684 1.224M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Profile
            </button>
        </li>
        <li>
            <button action={{ route('dashboard.profile') }} class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 6V4m0 0a8 8 0 00-8 8v8a2 2 0 002 2h12a2 2 0 002-2v-8a8 8 0 00-8-8zm0 0v2"></path>
                </svg>
                User Manual
            </button>
        </li>
        <li>
            <form method="POST" action="{{ route('auth.logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-3 text-red-500 dark:text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>

    </div>

    </div>
  </nav>
  