<?php
$title = 'Master Modul';
require_once '../../config/koneksi/koneksi.php';
require_once '../../config/layout/header.php';
require_once '../../config/layout/sidebar.php';
require_once '../../config/layout/fluid.php';


?>
<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <?php
            include('../../menu/menu-perawat.php')
            ?>

            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <h3><?php echo $title ?></h3>

                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    <a href="create.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Tambah Modul</a>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Modul</th>
                                                <th>Folder Modul</th>
                                                <th>Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($koneksi, "SELECT * FROM modul ORDER BY nama_modul ASC");
                                            while ($d = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $d['id']; ?></td>
                                                    <td><?php echo $d['nama_modul']; ?></td>
                                                    <td><?php echo $d['folder_modul']; ?></td>
                                                    <td><?php echo $d['create']; ?></td>
                                                    <td>Edit</td>
                                                </tr>
                                            <?php }
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