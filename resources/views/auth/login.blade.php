@extends('main')

@section('main_content')
    {{-- <div class=" bg-gray-300 w-full h-full mx-auto justify-center content-center">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="w-full px-20">
            <div class="animate bg-white px-20 rounded-lg shadow-xl">
                <section class="login_content">
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <h1>Selamat Datang</h1>
                        <div>
                            <input type="text" class="form-control p-2" placeholder="NIP" name="nip" pattern="[0-9]+"
                                value="{{ old('nip') }}" />
                            @error('nip')
                                <p class="alert alert-danger py-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control p-2" placeholder="Password" name="password"
                                id="password" />
                            @error('password')
                                <p class="alert alert-danger py-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" name="login" class="btn btn-default submit">Masuk</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            @if (session('loginError'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <div>
                                <i class="fa-solid fa-building-columns h-10"></i>
                                <p>Sistem Informasi Pegawai Pengadilan Negeri Purwokerto</p>
                                <p>©<?= date('Y') ?> Pengadilan Negeri Purwokerto.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div> --}}

    <section class="bg-[url('/images/bg-login.jpg')] bg-cover dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            {{-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite    
            </a> --}}
            <div class="w-full inset-0 bg-gray-800 bg-opacity-90 backdrop-blur-sm rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 shadow-gray-600">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 text-center login_content">
                    <form class="space-y-3 md:space-y-3" action="{{ route('auth.login') }}" method="POST">
                        <div class="">
                            @csrf
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
                                Selamat Datang
                            </h1>
                        </div>
                        <div>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text"placeholder="NIP" name="nip" pattern="[0-9]+" value="{{ old('nip') }}">
                            @error('nip')
                                <p class="py-2 px-2 rounded-lg bg-red-500 text-white">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="password" placeholder="******" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('password')
                                <p class="py-2 px-2 rounded-lg bg-red-500 text-white">{{ $message }}</p>
                            @enderror
                        </div>
                        <button name="login" type="submit" class="text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-md text-sm px-5 py-1.5 text-center dark:bg-green-600 dark:hover:bg-green-600 dark:focus:ring-green-800 submit">Masuk</button>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            @if (session('loginError'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('loginError') }}
                                </div>
                            @endif
                            <div class="space-y-3">
                                <div>
                                    <i class="fa-solid fa-building-columns h-8 text-white"></i>
                                </div>
                                <div class="text-white font-serif">
                                    <p>Sistem Informasi Pegawai Pengadilan Negeri Purwokerto</p>
                                    <p>©<?= date('Y') ?> Pengadilan Negeri Purwokerto.</p>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
@endsection
