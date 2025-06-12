<div class="page-title flex justify-between items-center mb-6">
  <h3 class="text-2xl font-semibold">Profile</h3>
  <nav aria-label="breadcrumb">
    <ol class="flex text-sm text-gray-500">
      <li><a href="#" class="hover:text-gray-700">Home</a></li>
      <li class="mx-2">/</li>
      <li class="font-semibold text-gray-700">Profile</li>
    </ol>
  </nav>
</div>

<div class="flex justify-center mb-6 space-x-4">
  <button data-modal-toggle="editPhoto" class="btn btn-info flex items-center space-x-2 px-4 py-2 text-white bg-blue-500 rounded">
    <i class="fa fa-edit"></i><span>Edit Photo</span>
  </button>
  <button data-modal-toggle="resetPass" class="btn btn-danger flex items-center space-x-2 px-4 py-2 text-white bg-red-500 rounded">
    <i class="fa fa-key"></i><span>Reset Password</span>
  </button>
</div>

<div class="max-w-xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg">
  <div class="p-6 text-center">
    @php
      // Ambil data PHP seperti di aslinya
      $pegawai = DB::table('pegawai')
        ->join('jabatan','pegawai.id_jabatan','jabatan.id_jabatan')
        ->join('golongan','pegawai.id_golongan','golongan.id_golongan')
        ->where('nip', $nip)
        ->first();
      $user = DB::table('user')->where('nip', $nip)->first();
    @endphp

    <img src="{{ $user->foto ? asset('build/images/thump_' . $user->foto) : asset('build/images/user.png') }}"
         alt="Profile Photo"
         class="w-32 h-32 rounded-full mx-auto mb-4">
    <h2 class="text-xl font-semibold mb-2">{{ $pegawai->nama_pegawai }}</h2>

    <div class="text-left space-y-4">
      <div>
        <span class="font-semibold">NIP:</span>
        <span class="text-gray-700">{{ $pegawai->nip }}</span>
      </div>
      <div>
        <span class="font-semibold">Jabatan:</span>
        <span class="text-gray-700">{{ $pegawai->nama_jabatan }}</span>
      </div>
      <div>
        <span class="font-semibold">Golongan:</span>
        <span class="text-gray-700">{{ $pegawai->nama_golongan }}</span>
      </div>
    </div>
  </div>
</div>

{{-- Modal: Edit Photo --}}
<div id="editPhoto" class="hidden fixed inset-0 z-50 flex items-center justify-center">
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6">
    <h3 class="text-lg font-semibold mb-4">Edit Photo Profile</h3>
    <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="nip" value="{{ $pegawai->nip }}">
      <input type="file" name="gambar" required class="mb-4 w-full text-sm text-gray-600 file:py-2 file:px-4 file:border file:rounded file:text-sm file:font-semibold
        file:bg-blue-50 hover:file:bg-blue-100">
      <div class="flex justify-end">
        <button type="submit" class="btn px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
      </div>
    </form>
  </div>
</div>

{{-- Modal: Reset Password --}}
<div id="resetPass" class="hidden fixed inset-0 z-50 flex items-center justify-center">
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-96 p-6">
    <h3 class="text-lg font-semibold mb-4">Reset Password</h3>
    <form action="{{ route('profile.reset-password') }}" method="POST">
      @csrf
      <input type="hidden" name="nip" value="{{ $pegawai->nip }}">
      <div class="mb-4">
        <label class="block font-semibold mb-1">New Password</label>
        <input type="password" name="password" required class="w-full px-3 py-2 border rounded">
      </div>
      <div class="mb-4">
        <label class="block font-semibold mb-1">Confirm Password</label>
        <input type="password" name="password_confirmation" required class="w-full px-3 py-2 border rounded">
      </div>
      <div class="flex justify-end">
        <button type="submit" class="btn px-4 py-2 bg-red-500 text-white rounded">Submit</button>
      </div>
    </form>
  </div>
</div>
