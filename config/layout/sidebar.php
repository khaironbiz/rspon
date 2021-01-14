        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="<?php echo $base_url ?>index.php"><span>Focus</span></a></div>
                    <ul>
                        <?php
                        include("../../config/koneksi/koneksi.php");
                        //$sql = "SELECT * FROM sub_menu 
                        //        INNER JOIN menu on sub_menu.id_menu=menu.id
                        //        INNER JOIN modul on sub_menu.id_modul=modul.id";
                        $sql    = "SELECT * FROM modul order by nama_modul";
                        $hasil  = mysqli_query($koneksi, $sql);
                        while ($modul = mysqli_fetch_array($hasil)) { ?>
                            <li class="label"><?php echo $modul['nama_modul']; ?></li>
                            <?php
                            $id_modul   = $modul['id'];
                            $data_menu  = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_modul='$id_modul'");
                            while ($c = mysqli_fetch_assoc($data_menu)) {
                            ?>
                                <li><a class="sidebar-sub-toggle"><i class="<?php echo $c['icon']; ?>"></i> <?php echo $c['nama_menu']; ?> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                    <?php
                                    $id_menu        = $c['id'];
                                    $data_submenu   = mysqli_query($koneksi, "SELECT * FROM sub_menu 
                                                        INNER JOIN menu on menu.id=sub_menu.id_menu 
                                                        INNER JOIN modul on modul.id=sub_menu.id_modul
                                                        WHERE sub_menu.id_menu ='$id_menu'");
                                    while ($b = mysqli_fetch_assoc($data_submenu)) {
                                    ?>
                                        <ul>
                                            <li><a href="<?php echo $base_url . $b['folder_modul'] . "/" . $b['folder_menu'] . "/" . $b['link']; ?>"><?php echo $b['nama_submenu']; ?></a></li>
                                        </ul>
                                <?php
                                    }
                                }
                                ?>
                                </li>
                            <?php
                        }
                            ?>
                            <li><a href="<?php echo $base_url . "auth/logout.php" ?>"><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->