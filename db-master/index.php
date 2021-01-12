<?php
include('header.php');
$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Jakarta');
$time=date('Y-m-d H:i:s');
$url=__FILE__ ;
$name=$user_check;
mysqli_query($koneksi, "INSERT INTO statistik set ip='$ip', time='$time', url='$url', name='$name'");

//input master db

if($_POST['master'] !=''){
    $uraian_master      = $_POST['master'];
    $has_master         = md5(time());
    $input_master       = mysqli_query($koneksi, "INSERT INTO db_master set nama_master='$uraian_master', has='$has_master'");
    if($input_master){
    echo "<script>document.location=\"db-master.php\"</script>";
    }
}
//input sub master

if($_POST['sub_master'] !=''){
    $uraian_master_submaster    = $_POST['sub_master'];
    $id_master_post             = $_POST['id_master'];
    $has_submaster              = md5(time());
    $input_sub_master           = mysqli_query($koneksi, "INSERT INTO db_sub_master set 
                                    nama_submaster  = '$uraian_master_submaster',
                                    id_master       = '$id_master_post',
                                    has             = '$has_submaster'");
    if($input_sub_master){
    echo "<script>document.location=\"db-master.php?id=$id_master_post\"</script>";
    }
}


//paragraph awal

?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3><? echo $karir_detail ?> </h3>
        
    </div>
</div>
<?
include('menu-karir.php');

?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4">
        <h4>Data Perawat</h4>
        <div class="table-responsive">
            <table class="table table-striped">
            
            <tr>
                <th>No.</th>
                <th>Master</th>
                <th>ID</th>
                <th>Aksi</th>
                </tr>
                
                <?php 
                
                $no = 1;
                $data = mysqli_query($koneksi,"select * from mahasiswa");
                while($d = mysqli_fetch_array($data)){
                ?>
				
						<tr>
						<td><? echo $no ?></td>
						<td><? echo $data['nama_master'] ?></td>
						<td><? echo $data['id'] ?></td>
						<td><a href="?id=<? echo $data['id']?>"><span class="badge badge-warning">Detail</span></a></td>
						</tr>
						<?
				}if($_GET['aksi'] !=''){
				?>
				<form method="post" action="">  
    				<tr>
    				    

        				<td><a class="btn btn-danger" href="db-master.php" role="button">Back</a></td>
        				<td colspan='2'><input type='text' name='master' class="form-control" ></td>
        				<td><button class="btn btn-primary" type="submit">SAVE</button></td>
    				</tr>
				</form>
				<?
				}else{
				?>
				<tr>
                    <td></td>
                    <td>
                        <a href="db-master.php?aksi=tambah">
                        <button type="button" class="btn btn-primary">+ Master</button>
                        </a>
                    </td> 
                    <td></td>
                     <td></td>
                </tr>
                
                <?
                } 
                
                ?>
            </table>
        </div>
    </div>
    <?
    $id_master    = $_GET['id'];
    if($id_master !=''){
        $sql_submaster  = mysql_query("SELECT * FROM db_sub_master where id_master='$id_master' ORDER BY id ASC");
        $sub            = mysql_fetch_assoc(mysql_query("SELECT * FROM db_master where id='$id_master'"));
    ?>
    <div class="col-lg-4">
        <h4>Data Sub Master </h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>No.</th>
                    <th><? echo $sub['nama_master'] ?></th>
                    <th>ID</th>
                </tr>
                <?
                while($data_submaster = mysql_fetch_assoc($sql_submaster)){
                    $noo++
                ?>
                <tr>
                    <td><? echo $noo?></td>
                    <td><? echo $data_submaster['nama_submaster']?></td>
                    <td><? echo $data_submaster['id']?></td>
                </tr>
                <?
                }
                    if($_GET['submaster'] !=''){
                        ?>
                        <form method="post" action="">
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href="db-master.php?id=<? echo $_GET['id'] ?>" role="button">Batal</a>
                                    <input type='hidden' name='id_master' class="form-control" value='<?php echo $_GET['id']?> '>
                                </td>
                                <td><input type='text' name='sub_master' class="form-control"></td>
                                <td><button type="submit" class="btn btn-primary btn-sm">SAVE</button></td>
                            </tr>
                        </form>
                    <?    
                    }else{
                        ?>
                        <tr>
                            <td></td>
                            <td>
                                <?
                                
                                ?>
                                <a href="db-master.php?submaster=tambah&id=<? echo $_GET['id']?>">
                                <button type="button" class="btn btn-primary">+ subMaster</button>
                                </a>
                            </td>
                             <td></td>
                        </tr>
                        <?
                    }
                    ?>
            </table>
        </div>
    </div>
    <?
    }
    ?>
    <?
    $has_sub_master    = $_GET['id2'];
    if($has_sub_master !=''){
    ?>
    <div class="col-lg-4">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>No.</th>
                    <th>Sub Master Detail</th>
                    <th>Aksi</th>
                </tr>
            </table>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php
include ('footer.php');
?>
