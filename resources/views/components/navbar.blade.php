{{-- @include('main')
<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>

                    @if (auth()->user()->role === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/users">Manage Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/settings">Settings</a>
                        </li>
                    @endif

                    @if (auth()->user()->role === 'User')
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/orders">My Orders</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <h1>Welcome {{ auth()->user()->pegawai->nama_pegawai }}</h1>
            </div>
        </div>
    </div>
</body> --}}

<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        {{-- <button class="btn" id="toggle-sidebar">
            ☰
        </button> --}}
        <a class="navbar-brand ms-2" href="#">PN-Purwokerto</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
