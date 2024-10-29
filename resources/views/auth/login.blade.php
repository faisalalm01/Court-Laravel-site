@extends('welcome')

@section('content')
    <body class="login">
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1>Selamat Datang</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="NIP" required="" name="nip" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Masuk</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-legal"></i></h1>
                                <p>Sistem Informasi Pegawai Pengadilan Negeri Purwokerto</p>
                                <p>© {{ date('Y') }} Pengadilan Negeri Purwokerto.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </body>
@endsection