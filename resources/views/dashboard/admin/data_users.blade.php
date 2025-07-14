@extends('dashboard.index')

@section('content')
    <div class="p-3">
        <div class="flex justify-between items-center">
            <div class="title_left">
                <h3 class="text-2xl font-semibold">Daftar Users</h3>
            </div>
            <div class="title_right">
                <nav aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="#" class="hover:underline">Home</a> /</li>
                        <li class="text-gray-800 font-medium">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="bg-white shadow rounded-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="text-xl font-bold">Daftar User</h2>
                <p class="text-sm text-gray-500">User yang menggunakan aplikasi</p>
            </div>
            <div class="flex space-x-2">
                <a href="#" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded flex items-center" data-toggle="modal" data-modal-toggle="modaltambahuser">
                    <i class="fa fa-plus-circle mr-2"></i> Tambah User
                </a>
            </div>
        </div>

            <div class="overflow-x-auto">
                <!-- <button href="#" title="Tambah User" type="button" class="btn btn-info pull-right"
                    data-modal-toggle="modaltambahuser"><i class="fa fa-plus-circle"></i> Tambah
                    User</button> -->
                @if (session('success'))
                    <div class="alert alert-success bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative mb-4" role="alert" id="alert-success">
                        {{ session('success') }}
                        <button type="button" class="absolute top-1 right-2 text-green-800 hover:text-green-900" data-dismiss="alert">
                            &times;
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded relative mb-4" role="alert" id="alert-error">
                        {{ session('error') }}
                        <button type="button" class="absolute top-1 right-2 text-red-800 hover:text-red-900" data-dismiss="alert">
                            &times;
                        </button>
                    </div>
                @endif

                <table id="data-tables" class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Hak Akses</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                            <tr class="hover:bg-gray-50">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>{{ $user->pegawai->nama_pegawai }}</td>
                                <td>{{ $user->pegawai->jabatan->nama_jabatan }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modalviewuser{{ $user->nip }}"><i class="fa fa-eye"></i>
                                        View</a>
                                    <a href="#" class="btn btn-info" data-toggle="modal"
                                        data-modal-toggle="modaledituser{{ $user->nip }}"><i class="fa fa-edit"></i>
                                        Edit</a>
                                </td>
                                <!-- <td class="text-center">
                                                        </td> -->
                            </tr>

                            <!-- Modal -->
                            <div id="modalviewuser{{ $user->nip }}"
                                class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-4">Detail User - {{ $user->pegawai->nama_pegawai }}
                                        </h3>
                                        <!-- Konten modal -->
                                        <div class="space-y-3">
                                            <p><strong>Nama Lengkap:</strong> {{ $user->pegawai->nama_pegawai }}</p>
                                            <p><strong>NIP:</strong> {{ $user->nip }}</p>
                                            <p><strong>Jabatan:</strong> {{ $user->pegawai->jabatan->nama_jabatan }}</p>
                                            <p><strong>Golongan:</strong> {{ $user->pegawai->golongan->nama_golongan }}</p>
                                            <p><strong>Hak Akses Akun:</strong> {{ $user->role }}</p>
                                            <!-- Data lainnya -->
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 px-6 py-3 flex justify-end">
                                        <button type="button" data-modal-hide="modalviewuser{{ $user->nip }}"
                                            class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <!-- modal edit  -->
                                <div id="modaledituser{{ $user->nip }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Edit User</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaledituser{{ $user->nip }}">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form action="{{ route('dashboard.admin.edit-users', ['nip' => $user->nip]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="space-y-4">
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Pegawai</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="pegawai" required>
                                                 <option value="{{ $user->nip }}">{{ $user->pegawai->nama_pegawai }}</option>
                                            </select>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Password</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <input type="password" name="password" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="Masukkan Password" required>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Hak Akses</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="hak_akses" required>
                                            <option value="" selected disabled>-- Hak Akses --</option>
                                            @if($user->role == "User")
                                            <option value="User" selected>User</option>
                                            <option value="Admin">Admin</option>
                                            @else
                                            <option value="User">User</option>
                                            <option value="Admin" selected>Admin</option>
                                            @endif
                                            </select>
                                        </div>
                                        </div>

                                        <div class="border-t pt-4">
                                        <div class="flex justify-end gap-x-3">
                                            <button type="modal" data-modal-hide="modaledituser{{ $user->nip }}" class="rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="submit">
                                            Cancel
                                            </button>
                                            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="submit">
                                            Save Changes
                                            </button>
                                        </div>
                                        </div>
                                       </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                                

                                <!-- modal tambah -->
                                <div id="modaltambahuser" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50 p-4">
                                <div class="w-full max-w-2xl rounded-lg bg-white shadow-xl">
                                    <div class="border-b p-4">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl font-semibold text-gray-800">Form Tambah User</h3>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-modal-hide="modaltambahuser">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="p-6">
                                    <form class="" method="POST" action="{{ route('dashboard.admin.add-users') }}">
                                        @csrf
                                        <div class="space-y-4">
                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Pegawai</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="pegawai" required>
                                            <option value="" selected disabled>-- Pilih Pegawai --</option>
                                            @foreach ($pegawai as $peg)
                                                <option value="{{ $peg->nip }}">
                                                    {{ $peg->nama_pegawai }} | {{ $peg->nip }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Password</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <input type="password" name="password" class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" placeholder="Masukkan Password" required>
                                        </div>
                                        </div>

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-12">
                                        <div class="md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Hak Akses</label>
                                        </div>
                                        <div class="md:col-span-9">
                                            <select class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:outline-none focus:ring-blue-500" name="hak_akses" required>
                                            <option value="" selected disabled>-- Pilih Hak Akses --</option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                        </div>

                                        <div class="border-t pt-4">
                                        <div class="flex justify-end">
                                            <button type="submit" class="rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="submit">
                                            Submit
                                            </button>
                                        </div>
                                        </div>
                                       </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

<!-- modal tambah -->
<!-- <div id="modaltambahuser" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
        <div class="p-6">
            <h3 class="text-xl font-bold mb-4">Tambah User</h3>
            <form action="{{ route('dashboard.admin.add-users') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Pegawai</label>
                    <select class="w-full p-2 border rounded" name="nip">
                        <option disabled selected>-- Pilih Pegawai --</option>
                        @foreach ($pegawai as $peg)
                            <option value="{{ $peg->nip }}">
                                {{ $peg->nama_pegawai }} | {{ $peg->nip }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full p-2 border rounded" placeholder="Password">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Hak Akses</label>
                    <select class="w-full p-2 border rounded" name="role">
                        <option disabled selected>-- Pilih Role --</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
        <div class="bg-gray-50 px-6 py-3 flex justify-end">
            <button type="button" data-modal-hide="modaltambahuser" 
                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg">
                Tutup
            </button>
        </div>
    </div>
</div> -->