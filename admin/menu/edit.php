<?php
$title = 'Edit Modul';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_modul           = $_POST['id_modul'];
    $nama_menu          = $_POST['nama_menu'];
    $folder_menu        = $_POST['folder_menu'];
    $has_menu_post      = $_POST['has_menu'];
    $icon               = $_POST['icon'];
    $count_nama_menu    = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM menu where nama_menu='$nama_menu'"));
    $count_folder_menu  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM menu where folder_menu='$folder_menu'"));
    if ($count_nama_menu < 1 and $count_folder_menu < 1) {
        $update         = mysqli_query($koneksi, "UPDATE menu SET id_modul='$id_modul', nama_menu='$nama_menu', folder_menu='$folder_menu', icon='$icon' WHERE has_menu='$has_menu_post'");
        if ($update) {
            echo "<script>document.location=\"index.php\"</script>";
        }
    }
}
$has_menu   = $_GET['id'];
$data_menu  = mysqli_query($koneksi, "SELECT * FROM menu INNER JOIN modul on modul.id=menu.id_modul WHERE menu.has_menu='$has_menu'");
$row_menu   = mysqli_fetch_assoc($data_menu);
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Modul</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_modul" name="id_modul">
                                            <option value="<?php echo $row_menu['id_modul'] ?>"><?php echo $row_menu['nama_modul'] ?></option>
                                            <?php
                                            $data = mysqli_query($koneksi, "SELECT * FROM modul ORDER BY nama_modul ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_modul'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Menu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_menu" class="form-control" value="<?php echo $row_menu['nama_menu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Folder Menu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="folder_menu" class="form-control" value="<?php echo $row_menu['folder_menu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Icon Menu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="icon" class="form-control" value="<?php echo $row_menu['icon'] ?>">
                                        <input type="hidden" name="has_menu" class="form-control" value="<?php echo $row_menu['has_menu'] ?>">
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