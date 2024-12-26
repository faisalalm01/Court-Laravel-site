    {{-- <?php
    include '../database/koneksi.php';

    if (isset($_POST['submit'])) {
        $nip = $_POST['pegawai'];
        $password = md5($_POST['password']);
        $hakakses = $_POST['hak_akses'];

        $selectnip = mysqli_query($koneksi, "SELECT * FROM user where nip=$nip");
        $data = mysqli_fetch_array($selectnip);

        if (empty($data['nip'])) {
            $query = mysqli_query($koneksi, "INSERT INTO user VALUES (null, '$nip','$password', '$hakakses', null)");

            if ($query) {
                echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=data_user';</script>";
            } else {
                echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=data_user';</script>";
            }
        } elseif (!empty($data['nip'])) {
            echo "<script>alert('Akun sudah didaftarkan'); document.location='index.php?page=data_user';</script>";
        }
    }
    ?> --}}
