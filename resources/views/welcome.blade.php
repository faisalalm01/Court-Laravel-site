<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/js/app.js'])
        @vite(['resources/css/app.css'])
    </head>
    <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="check_login.php" method="POST">
              <h1>Selamat Datang</h1>
              <div>
                <input type="text" class="form-control" placeholder="NIP" required="" name="nip" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button type="submit" name="login" class="btn btn-default submit">Masuk</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="icon-legal"></i> <icon-legal></icon-legal></i> </h1>
                  <p>Sistem Informasi Pegawai Pengadilan Negeri Purwokerto</p>
                  <p>©<?= date('Y'); ?> Pengadilan Negeri Purwokerto.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
