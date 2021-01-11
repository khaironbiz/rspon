<?php
include("../config/koneksi/koneksi.php");

$user_check     = $_SESSION['login_user'];
$session_ini    = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$user_check'");
$row            = mysqli_fetch_assoc($session_ini);
$login_session  = $row['email'];

if (!isset($login_session)) {
    mysqli_close($koneksi);
    header('location : http://localhost/auth/index.php');
}
