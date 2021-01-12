<?php
$title = 'Edit Modul';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_submenu       = $_POST['nama_submenu'];
    $link               = $_POST['link'];
    $has_submenu_post   = $_POST['has_submenu'];
        $update         = mysqli_query($koneksi, "UPDATE sub_menu SET nama_submenu='$nama_submenu', link='$link' WHERE has_submenu='$has_submenu_post'");
        if ($update) {
            echo "<script>document.location=\"index.php\"</script>";
        }
}
//query get has untuk menampilkan data di form edit sub menu
$has_submenu   = $_GET['id'];
$data_submenu  = mysqli_query($koneksi, "SELECT * FROM sub_menu INNER JOIN menu on menu.id=sub_menu.id_menu WHERE sub_menu.has_submenu='$has_submenu'");
$row_submenu   = mysqli_fetch_assoc($data_submenu);
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <h4><?php echo $title ?></h4>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Menu</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nama_menu" class="form-control" value="<?php echo $row_submenu['nama_menu'] ?>" readonly> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sub Menu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_submenu" class="form-control" value="<?php echo $row_submenu['nama_submenu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link" class="form-control" value="<?php echo $row_submenu['link'] ?>">
                                        <input type="hidden" name="has_submenu" class="form-control" value="<?php echo $row_submenu['has_submenu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once '../../config/layout/footer.php';
?>