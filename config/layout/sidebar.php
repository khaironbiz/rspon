        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="index.html"><span>Focus</span></a></div>
                    <ul>
                    <?php
                    include("../../config/koneksi/koneksi.php");
                    $sql = 'SELECT * FROM sub_menu 
                                INNER JOIN menu on sub_menu.id_menu=menu.id
                                INNER JOIN modul on sub_menu.id_modul=modul.id';
                    $hasil = mysqli_query($koneksi, $sql);
                    while ($d = mysqli_fetch_array($hasil)) { ?>
                        <li class="label"><?php echo $d['nama_modul']; ?></li>
                        <li><a class="sidebar-sub-toggle"><i class="<?php echo $d['icon']; ?>"></i>  <?php echo $d['nama_menu']; ?>  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo $base_url.$d['folder_modul']."/".$d['folder_menu']."/".$d['link']; ?>"><?php echo $d['nama_submenu']; ?></a></li>
                            </ul>
                        </li>
                        <?php }
                    ?>
                    <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->