<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysql_connect("localhost","u487816097_ppni","domain250909");
// Seleksi Database
$db = mysql_select_db("u487816097_data", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("select nama from nira where nira='$user_check' and blokir='N' and kode !='' ", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['nama'];

if(!isset($login_session)){
mysql_close($connection); // Menutup koneksi
header('Location: index.php'); // Mengarahkan ke Home Page
}

?>