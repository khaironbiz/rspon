<?php
require_once '../../config/koneksi/koneksi.php';
if ($_GET['aksi'] == 'delete') {
    $has_master  = $_GET['id'];
    $delete_master   = mysqli_query($koneksi, "DELETE FROM db_master WHERE has_master='$has_master'");
    if ($delete_master) {
        echo "<script>document.location=\"index.php\"</script>";
    }
}
