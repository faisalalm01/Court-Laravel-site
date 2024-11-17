@extends('main')

@section('main_content')
<body class="login">

    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <h1>Selamat Datang</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="NIP" name="nip" pattern="[0-9]+"
                                value="{{ old('nip') }}" />
                            @error('nip')
                                <p class="alert alert-danger py-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
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
                                <h1><i class="icon-legal"></i> <icon-legal></icon-legal></i> </h1>
                                <p>Sistem Informasi Pegawai Pengadilan Negeri Purwokerto</p>
                                <p>©<?= date('Y') ?> Pengadilan Negeri Purwokerto.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>

</body>
@endsection
