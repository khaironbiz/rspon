<?php
$title = 'Tambah Master Data Base';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_master             = $_POST['id_master'];
    $nama_submaster        = $_POST['nama_submaster'];
    $has_submaster         = md5(time());
    //input ke data base
    $input          = mysqli_query($koneksi, "INSERT INTO db_sub_master SET nama_submaster='$nama_submaster', id_master='$id_master', has_submaster='$has_submaster'");
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
                                    <label class="col-sm-2 col-form-label">Master</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="id_master">
                                            <option value="">--Pilih Master--</option>
                                            <?php
                                            $data = mysqli_query($koneksi, "SELECT * FROM db_master ORDER BY nama_master ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_master'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama SubMaster</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_submaster" class="form-control">
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