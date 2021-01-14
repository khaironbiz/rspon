<?php
$title = 'Add SubMaster';
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
    $id_master          = $_POST['id_master'];
    $nama_submaster     = $_POST['nama_submaster'];
    $has_submaster      = md5(time());
    $input              = mysqli_query($koneksi, "INSERT INTO db_sub_master SET nama_submaster='$nama_submaster', id_master='$id_master', has_submaster='$has_submaster'");
        if ($input) {
            echo "<script>history.go(-1)</script>";
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Master</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_master" class="form-control" value="<?php echo $row_master['nama_master'] ?>" readonly>
                                        <input type="hidden" name="id_master" class="form-control" value="<?php echo $row_master['id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">SubMaster</label>
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama SubMaster</th>
                                                <th>ID</th>
                                                <th>Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no         = 1;
                                            $id_master2 = $row_master['id'];
                                            $data       = mysqli_query($koneksi, "SELECT * FROM db_sub_master WHERE id_master='$id_master2' ORDER BY id_master, id ASC");
                                            while ($d   = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $d['nama_submaster']; ?></td>
                                                    <td><?php echo $d['id']; ?></td>
                                                    <td><?php echo $d['create']; ?></td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm" href="edit.php?id=<?php echo $d['has_submaster']; ?>" role="button">Edit</a>
                                                        <a class="btn btn-danger btn-sm" href="delete.php?aksi=delete&id=<?php echo $d['has_submaster']; ?>" onclick="return confirm('Yakin Hapus?')" role="button">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            $no++;
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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