<?php
$title = 'Edit Modul';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//mengambil data
$has_modul  = $_GET['id'];
$data_modul = mysqli_query($koneksi, "SELECT * FROM modul WHERE has_modul='$has_modul'");
$row_modul  = mysqli_fetch_assoc($data_modul);

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_modul         = $_POST['nama_modul'];
    $folder_modul       = $_POST['folder_modul'];
    $has_modul_post     = $_POST['has_modul'];
    $count_nama_modul   = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM modul where nama_modul='$nama_modul'"));
    $count_folder_modul = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM modul where folder_modul='$folder_modul'"));
    if ($count_nama_modul < 1 and $count_folder_modul < 1) {
        $edit_modul     = mysqli_query($koneksi, "UPDATE modul SET 
                            nama_modul      ='$nama_modul', 
                            folder_modul    ='$folder_modul' WHERE 
                            has_modul       ='$has_modul_post'");
        if ($edit_modul) {
            echo "<script>document.location=\"index.php\"</script>";
        }
    }
}
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
                                        <input type="text" name="nama_modul" class="form-control" value="<?php echo $row_modul['nama_modul'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Folder</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="folder_modul" class="form-control" value="<?php echo $row_modul['folder_modul'] ?>">
                                        <input type="hidden" name="has_modul" class="form-control" value="<?php echo $row_modul['has_modul'] ?>">
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