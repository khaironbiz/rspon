<?php
$title = 'Tambah Menu';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_shift           = $_POST['id_shift'];
    $code_shift         = $_POST['code_shift'];
    $masuk              = $_POST['masuk'];
    $keluar             = $_POST['keluar'];
    $has_shift          = md5(time());
    
    
        $input          = mysqli_query($koneksi, 
                        "INSERT INTO shift SET 
                            id_shift        ='$id_shift', 
                            code_shift      ='$code_shift', 
                            masuk           ='$masuk', 
                            keluar          ='$keluar', 
                            has_shift       ='$has_shift'");
        if ($input) {
            echo "<script>document.location=\"jam-shift.php\"</script>";
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Modul</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="id_shift">
                                            <option value="">--Pilih Shift--</option>
                                            <?php
                                            $data = mysqli_query($koneksi, "SELECT * FROM db_sub_master WHERE id_master='1' ORDER BY id ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_submaster'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Shift</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code_shift" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="masuk" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keluar</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="keluar" class="form-control">
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