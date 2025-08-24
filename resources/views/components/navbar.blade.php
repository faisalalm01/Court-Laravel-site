<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex ml-auto items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            <div class="relative mr-4">
                <button type="button"
                    class="relative text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"
                    id="notif-button" aria-expanded="false" data-dropdown-toggle="notif-dropdown"
                    data-dropdown-placement="bottom">
                    <i class="fa fa-bell text-xl"></i>
                    @if ($notifCount > 0)
                        <span
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                            {{ $notifCount }}
                        </span>
                    @endif
                </button>

                <!-- Dropdown Notifikasi -->
                <div id="notif-dropdown"
                    class="z-50 hidden w-96 max-h-96 overflow-y-auto bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <div class="p-3 font-semibold text-gray-700 dark:text-gray-200">
                        Notifikasi
                    </div>
                    <ul class="text-sm text-gray-700 dark:text-gray-200">
                        @forelse($notifications as $notif)
                            <li
                                class="px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 flex justify-between items-start">
                                <div>
                                    <p class="text-sm">{{ $notif->pesan }}</p>
                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $notif->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                @if (!$notif->dibaca)
                                    <button class="ml-2 text-xs text-blue-500 hover:underline mark-read-btn"
                                        data-url="{{ route('dashboard.notifications.read', $notif->id_notification) }}">
                                        Tandai Telah Dibaca
                                    </button>
                                @endif
                            </li>
                        @empty
                            <li class="px-4 py-3 text-gray-500 dark:text-gray-400 text-center">
                                Tidak ada notifikasi
                            </li>
                        @endforelse
                    </ul>
                    <div class="p-2 flex flex-col text-center text-sm space-y-2">
                        <button id="mark-all-read-btn" data-url="{{ route('dashboard.notifications.readAll') }}"
                            class="text-blue-600 dark:text-blue-400 font-medium hover:underline w-full text-center
           disabled:text-gray-400  disabled:no-underline disabled:cursor-not-allowed "
                            @if ($notifCount == 0) disabled @endif>
                            Tandai semua telah dibaca
                        </button>

                        <a href="{{ route('dashboard.notifications.index') }}"
                            class="text-blue-600 dark:text-blue-400 font-medium hover:underline">
                            Lihat semua notifikasi
                        </a>
                    </div>


                </div>
            </div>
            <button type="button"
                class="gap-3 flex items-center text-sm rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <img class="w-8 h-8 rounded-full border border-gray-700"
                    src="{{ Auth::user()->foto ? asset('images/profile/' . Auth::user()->foto) : asset('https://st.depositphotos.com/1537427/3571/v/450/depositphotos_35717211-stock-illustration-vector-user-icon.jpg') }}"
                    alt="">
                <div class="pr-4">
                    <p class="font-semibold">{{ Auth::user()->pegawai->nama_pegawai }}</p>
                </div>
            </button>

            <!-- Dropdown menu -->
            <div class="z-50 hidden list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 w-48"
                id="user-dropdown">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
                    <li>
                        <a href={{ route('dashboard.profile') }}
                            class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-300" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.021 0 3.937.437 5.684 1.224M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li>
                        <!-- <button action={{ route('dashboard.profile') }}
                                class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-300" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 6V4m0 0a8 8 0 00-8 8v8a2 2 0 002 2h12a2 2 0 002-2v-8a8 8 0 00-8-8zm0 0v2">
                                    </path>
                                </svg>
                                User Manual
                            </button> -->
                    </li>
                    <li>
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center w-full px-4 py-2 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white">
                                <svg class="w-4 h-4 mr-3 text-red-500 dark:text-red-400" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".mark-read-btn");

        buttons.forEach(btn => {
            btn.addEventListener("click", function() {
                const url = this.dataset.url;
                const li = this.closest("li"); // Simpan li yang mau dihapus

                fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]').content,
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Hapus <li> notifikasi ini
                            li.remove();

                            // Update badge notif count
                            const badge = document.querySelector("#notif-button span");
                            if (badge) {
                                if (data.notifCount > 0) {
                                    badge.textContent = data.notifCount;
                                } else {
                                    badge.remove();
                                }
                            }

                            // Cek apakah masih ada notif-item
                            const notifList = document.querySelector("#notif-dropdown ul");
                            const remainingItems = notifList.querySelectorAll(
                                "li .mark-read-btn");

                            if (remainingItems.length === 0) {
                                notifList.innerHTML = `
                                <li class="px-4 py-3 text-gray-500 dark:text-gray-400 text-center">
                                    Tidak ada notifikasi
                                </li>
                            `;
                                document.getElementById("mark-all-read-btn")?.setAttribute(
                                    "disabled", true);
                            }
                        }
                    });
            });
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const markAllBtn = document.querySelector("#mark-all-read-btn");

        if (markAllBtn) {
            markAllBtn.addEventListener("click", function() {
                const url = this.dataset.url;

                fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .content,
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // Kosongkan semua isi notifikasi
                            const notifList = document.querySelector("#notif-dropdown ul");
                            if (notifList) {
                                notifList.innerHTML = `
                                <li class="px-4 py-3 text-gray-500 dark:text-gray-400 text-center">
                                    Tidak ada notifikasi
                                </li>
                            `;
                            }

                            // Update badge notif count
                            const badge = document.querySelector("#notif-button span");
                            if (badge) {
                                badge.remove();
                            }

                            // Disable tombol "mark all"
                            markAllBtn.setAttribute("disabled", true);
                        }
                    });
            });
        }
    });
</script>
