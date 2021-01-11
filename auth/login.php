<?php
session_start(); // Memulai Session
$error = ''; // Variabel untuk menyimpan pesan error
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email']) || empty($_POST['pass'])) {
        $error = "Username or Password is invalid";
    } else {
        // Variabel username dan password
        $email      = $_POST['email'];
        $pass       = md5($_POST['pass']);

        //koneksi db
        include('../config/koneksi/koneksi.php');

        // SQL query untuk memeriksa apakah user terdapat di database?

        $rows_email     = mysqli_num_rows(mysqli_query($koneksi, "select * from users where email='$email'"));

        if ($rows_email < 1) {
            echo "<script> alert(\"Maaf email : $email tidak terdaftar\");</script>";
        }
        if ($rows_email = 1) {
            $query  = mysqli_query($koneksi, "SELECT * FROM users WHERE password='$pass' AND email='$email' AND blokir='N' ");
            $rows   = mysqli_num_rows($query);
            $users  = mysqli_fetch_assoc($query);
        }
        if ($rows == 1) {
            $_SESSION['login_user'] = $users['email']; // Membuat Sesi/session

            header("location: ../admin/modul/index.php"); // Mengarahkan ke halaman profil
        }

        if ($rows < 1) {
            echo "<script> alert(\"Maaf kombinasi username dan pasword tidak sesuai \");</script>";
        }


        mysqli_close($koneksi); // Menutup koneksi
    }
}
