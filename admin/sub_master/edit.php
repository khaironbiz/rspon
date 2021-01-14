<?php
$title = 'Edit Master';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//mengambil data
$has_submaster  = $_GET['id'];
$data_submaster = mysqli_query($koneksi, "SELECT * FROM db_sub_master WHERE has_submaster='$has_submaster'");
$row_submaster  = mysqli_fetch_assoc($data_submaster);

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_submaster        = $_POST['nama_submaster'];
    $has_submaster_post    = $_POST['has_submaster'];
    $edit_submaster        = mysqli_query($koneksi, "UPDATE db_sub_master SET nama_submaster ='$nama_submaster' WHERE has_submaster ='$has_submaster_post'");
        if ($edit_submaster) {
            echo "<script>history.go(-2)</script>";
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Master</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_submaster" class="form-control" value="<?php echo $row_submaster['nama_submaster'] ?>">
                                        <input type="hidden" name="has_submaster" class="form-control" value="<?php echo $row_submaster['has_submaster'] ?>">
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
                            <p>2018 © Admin Board. - <a href="<?php echo $base_url; ?>"target=_blank><?php echo $nama_web?></a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require_once '../../config/layout/footer.php';
?>