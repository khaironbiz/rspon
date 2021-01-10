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
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><span class="badge bg-primary">Tambah</span></a></li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
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
                                            $data = mysqli_query($koneksi,"SELECT * FROM pok INNER JOIN mak on pok.id_mak=mak.id ORDER BY mak.id ASC");
                                            while ($d = mysqli_fetch_assoc($data)) { ?>
                                                <tr>
                                                    <td><?php echo $d['id']; ?></td>
                                                    <td><?php echo $d['nama']; ?></td>
                                                    <td><?php echo $d['nira']; ?></td>
                                                    <td><?php echo $d['pendidikan']; ?></td>
                                                    <td><?php echo $d['ruangan']; ?></td>
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
