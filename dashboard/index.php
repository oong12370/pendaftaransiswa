<?php  

include '../auth.php';
include '../koneksi/koneksi.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}elseif ($_SESSION['role_user'] == 2) {
    $role = "kapsek";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else{
	$role = "User";
    $query      = "SELECT a.*,b.*,c.* FROM pendaftaran a, akun b, tb_seleksi c WHERE a.id = $id AND b.id_user=$id and c.id_user=$id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}

$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 2:
		$page 				= "include/profile.php";
		$_SESSION['active']	= "2";
		break;
	case 3:
		$page 				= "include/edit_profile.php";
		$_SESSION['active']	= "2";
		break;
	case 4:
		$page 				= "include/syarat_pendaftaran.php";
		$_SESSION['active'] = "3";
		break;
	case 5:
		$page 				= "include/upload_akte.php";
		$_SESSION['active'] = "3";
		break;
	case 6:
		$page 				= "include/upload_foto2r.php";
		$_SESSION['active'] = "3";
		break;
	case 7:
		$page 				= "include/konfirmasi_pendaftaran.php";
		$_SESSION['active']	= "4";
		break;
    case 8:
        $page               = "include/detail_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "4";
        break;
    case 9:
        $page               = "include/pembayaran.php";
        $_SESSION['active'] = "5";
        break;
   case 10:
        $page               = "include/nilai.php";
        $_SESSION['active'] = "33";
        break;
    case 12:
        $page               = "include/ubah_pengumuman.php";
        $_SESSION['active'] = "5";
        break;
    case 13:
        $page               = "include/review_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '5';
        break;
    case 14:
        $page               =  "include/konfirmasi_pembayaran_user.php";
        $_SESSION['active'] = '40';
        break;
    case 15:
        $page               =  "include/konfirmasi_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '7';
        break;
    case 16:
        $page               = "include/konfirmasi_pembayaran_spp.php";
        $_SESSION['active'] = '7';
        break;
    case 17:
        $page               = "include/konfirmasi_pembayaran_pendaftaran_admin.php";
        $_SESSION['active'] = '8';
        break;
    case 18:
        $page               = "include/laporan.php";
        $_SESSION['active'] = "9";
        break;
    case 19:
        $page               = "include/seleksi.php";
        $_SESSION['active'] = "10";
        break;
    case 11:
        $page               = "include/tambah_nilai.php";
        $_SESSION['active'] = "11";
        break;
    
    case 25:
        $page               = "include/konfirmasi_pembayaran_spp_admin.php";
        $_SESSION['active'] = "13";
        break;
    case 26:
        $page               = "include/hasil_test.php";
        $_SESSION['active'] = "14";
        break;
    case 27:
        $page               = "include/konfirmasi_pembayaran_kegiatan.php";
        $_SESSION['active'] = "7";
        break;
    case 28:
        $page               = "include/tambah_pengumuman.php";
        $_SESSION['active'] = "23";
        break;
    case 29:
        $page               = "include/ubah_nilai.php";
        $_SESSION['active'] = "24";
        break;
    case 30:
        $page               = "include/view_dokumen.php";
        $_SESSION['active'] = "25";
        break;
     case 31:
        $page               = "include/tambah_regist.php";
        $_SESSION['active'] = "26";
        break;
    case 32:
        $page               = "include/form_regis.php";
        $_SESSION['active'] = "27";
        break;
	default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>

<!doctype html>
<html lang="en">
	
<head>
    <title>Dashboard <?php echo $role; ?></title>
    <?php  
    	include "include/libs.php";
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.anggitprayogo.com" class="simple-text">
                    Selamat datang <?php $role == "Admin" ? print($nama_admin) : print($nama_panggilan); ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>">
                        <a href="index.php?page=1">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>
					
					<?php  
					if ($role == "User") {
					?>
					<li class="<?php $_SESSION['active'] == 2 ? print("active") : print("") ?>">
                        <a href="index.php?page=2">
                            <i class="material-icons">person</i>
                            <p>User Profile </p>
                        </a>
                    </li>
					<?php
					}
					?>
                    <?php  
                    if ($role == "kapsek") {
                    ?>
                   <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                        <a href="index.php?page=18">
                            <i class="material-icons">subject</i>
                            <p>Laporan</p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <?php  
					if ($role == "Admin") {
					?>
					<li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                        <a href="index.php?page=7">
                            <i class="material-icons">content_paste</i>
                            <p>Konfirmasi Pendaftaran </p>
                        </a>
                    </li>
                    
                    </li>
                    <li class="<?php $_SESSION['active'] == 8 ? print("active") : print("") ?>">
                        <a href="index.php?page=17">
                            <i class="material-icons">supervisor_account</i>
                            <p>Konfirmasi Pembayaran Pendaftaran</p>
                        </a>
                    </li>
                     <li class="<?php $_SESSION['active'] == 14 ? print("active") : print("") ?>">
                        <a href="index.php?page=26">
                            <i class="material-icons">subject</i>
                            <p> Seleksi</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 10 ? print("active") : print("") ?>">
                        <a href="index.php?page=19">
                            <i class="material-icons">supervisor_account</i>
                            <p>Regist</p>
                        </a>
                    </li>
                   
                    <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                        <a href="index.php?page=18">
                            <i class="material-icons">subject</i>
                            <p>Laporan</p>
                        </a>
                    </li>
					<?php
					}
					?>
                    
                    <?php  
                    if ($role == "User") {
                    ?>
                    <li class="<?php $_SESSION['active'] == 3 ? print("active") : print("") ?>">
                        <a href="index.php?page=4">
                            <i class="material-icons">content_paste</i>
                            <p>Syarat Pendaftaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 5 ? print("active") : print("") ?>">
                        <a href="index.php?page=9">
                            <i class="material-icons">library_books</i>
                            <p>Pembayaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 40 ? print("active") : print("") ?>">
                        <a href="index.php?page=14">
                            <i class="material-icons">library_books</i>
                            <p>Konfirmasi Pembayaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 33 ? print("active") : print("") ?>">
                        <a href="index.php?page=10">
                            <i class="material-icons">library_books</i>
                            <p>Hasil Test</p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>                
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                   
                   <?php  

                   include $page;

                   ?>
                        
                </div>
            </div>
            
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script  src="../asst/js/jquery-3.1.0.min.js"></script>
<script  src="../asst/js/jquery.dataTables.min.js"></script>
<script  src="../asst/js/dataTables.bootstrap.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<script src="../assets/js/arrive.min.js"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/js/bootstrap-notify.js"></script>
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="../assets/js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("#cetak").click(function(){
            window.print();
        });
    });
</script>

</html>