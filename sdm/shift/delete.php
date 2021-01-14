<?php
require_once '../../config/koneksi/koneksi.php';
if ($_GET['aksi'] == 'delete') {
    $has_modul  = $_GET['id'];
    $delete_modul   = mysqli_query($koneksi, "DELETE FROM menu WHERE has_menu='$has_modul'");
    if ($delete_modul) {
        echo "<script>document.location=\"index.php\"</script>";
    }
}
