<?php
$title = 'Tambah Modul';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_icon     = $_POST['nama_icon'];
    $code_icon     = $_POST['code_icon'];
    $has_icon      = md5(time());
    $input         = mysqli_query($koneksi, "INSERT INTO icon SET nama_icon='$nama_icon', code_icon='$code_icon', has_icon='$has_icon'");
        if ($input) {
            echo "<script>document.location=\"index.php\"</script>";
        }
    
}
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <!-- /# row -->
            <?php
            include('../menu.php')
            ?>
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <h4><?php echo $title ?></h4>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama ICon</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_icon" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kode Icon</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code_icon" class="form-control">
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