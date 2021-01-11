<?
include("koneksi.php");
$web   = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM website"));
$base_url   = $web['base_url'];


?>