<?php
require_once '../../config/koneksi/koneksi.php';
if ($_GET['aksi'] == 'delete') {
    $has_icon  = $_GET['id'];
    $delete_icon   = mysqli_query($koneksi, "DELETE FROM icon WHERE has_icon='$has_icon'");
    if ($delete_icon) {
        echo "<script>document.location=\"index.php\"</script>";
    }
}
