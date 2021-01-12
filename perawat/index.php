<?php
$title = 'Data Perawat';
require_once '../config/koneksi.php';
require_once '../layout/header.php';
require_once '../layout/sidebar.php';
require_once '../layout/fluid.php';
?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <?php
                    include('../menu/menu-perawat.php')
                ?>
                
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                    <h3><?php echo $title ?></h3>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>NIRA</th>
                                                    <th>Pendidikan</th>
                                                    <th>Ruangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query(
                                                $koneksi,
                                                "SELECT * FROM nira WHERE blokir='N' ORDER BY nama ASC"
                                            );
                                            while (
                                                $d = mysqli_fetch_array($data)
                                            ) { ?>
                                                <tr>
                                                    <td><?php echo $d[
                                                        'id'
                                                    ]; ?></td>
                                                    <td><?php echo $d[
                                                        'nama'
                                                    ]; ?></td>
                                                    <td><?php echo $d[
                                                        'nira'
                                                    ]; ?></td>
                                                    <td><?php echo $d[
                                                        'pendidikan'
                                                    ]; ?></td>
                                                    <td><?php echo $d[
                                                        'ruangan'
                                                    ]; ?></td>
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
<?php require_once '../layout/footer.php';
?>
