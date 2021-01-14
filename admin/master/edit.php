<?php
$title = 'Edit Master';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//mengambil data
$has_master     = $_GET['id'];
$data_master    = mysqli_query($koneksi, "SELECT * FROM db_master WHERE has_master='$has_master'");
$row_master     = mysqli_fetch_assoc($data_master);

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_master        = $_POST['nama_master'];
    $has_master_post    = $_POST['has_master'];
    $edit_master        = mysqli_query($koneksi, "UPDATE db_master SET nama_master ='$nama_master' WHERE has_master ='$has_master_post'");
        if ($edit_master) {
            echo "<script>document.location=\"index.php\"</script>";
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Master</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_master" class="form-control" value="<?php echo $row_master['nama_master'] ?>">
                                        <input type="hidden" name="has_master" class="form-control" value="<?php echo $row_master['has_master'] ?>">
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