<?php
$title = 'Sub Master Data Base';
$sub    = "../../config/layout/fluid.php";
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/koneksi/web.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once($sub);
?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <?php
            include('../menu.php')
            ?>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <h3><?php echo $title ?></h3>
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <a href="create.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Add SubMaster</a>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama SubMaster</th>
                                                <th>Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($koneksi, "SELECT * FROM db_sub_master ORDER BY id_master, id ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no ; ?></td>
                                                    <td><?php echo $d['nama_submaster']; ?></td>
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