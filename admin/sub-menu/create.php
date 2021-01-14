<?php
$title = 'Tambah Sub Menu';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';

//aksi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_menu            = $_POST['id_menu'];
    $sub_menu           = $_POST['sub_menu'];
    $has_submenu        = md5(time());
    $link               = $_POST['link'];
    $sql_modul          = mysqli_query($koneksi, "SELECT * FROM menu WHERE id='$id_menu'");
    $modul              = mysqli_fetch_assoc($sql_modul);
    $id_modul           = $modul['id_modul'];
    $input              = mysqli_query($koneksi, 
                            "INSERT INTO sub_menu SET 
                            id_modul        ='$id_modul', 
                            id_menu         ='$id_menu', 
                            nama_submenu    ='$sub_menu', 
                            link            ='$link', 
                            has_submenu     ='$has_submenu'");
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
                                    <label class="col-sm-2 col-form-label">Nama Menu</label>
                                    <div class="col-sm-10">
                                    <select class="form-control" name="id_menu">
                                            <option value="">--Pilih Menu--</option>
                                            <?php
                                            $data = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY nama_menu ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <option value="<?php echo $d['id'] ?>"><?php echo $d['nama_menu'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sub Menu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sub_menu" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="link" class="form-control">
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