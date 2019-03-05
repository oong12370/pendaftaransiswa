<?php
define('db_host','localhost');
	define('db_user','root');
	define('db_pass','root');
	define('db_name','sale_rembang');
	
	mysql_connect(db_host,db_user,db_pass);
	mysql_select_db(db_name);
	
//data dari produk
if(isset($_POST)){
$id_regist=$_POST['id_regist'];
$id_user=$_POST['id_user'];
$bank=$_POST['bank'];
$norek=$_POST['norek'];
$biaya_pendaftaran=$_POST['biaya_pendaftaran'];
$tanggal_pembayaran=$_POST['tanggal_pembayaran'];


$aksi = $_POST['aksi'];


$lokasi_file = $_FILES['foto']['tmp_name'];
$foto_file = $_FILES['foto']['name'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];
$direktori = "../../assets/uploads/$foto_file";
$sql = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if($ukuran_file > $MAX_FILE_SIZE) {
	header("Location:index.php?page=26");
	exit();
}
$sql = null;
if($ukuran_file > 0) {
	move_uploaded_file($lokasi_file, $direktori);
}

if($aksi == 'tambah') {
	$sql = "INSERT INTO pembayaran(id_regist,id_user,bank,
    norek,biaya_pendaftaran,tanggal_pembayaran,foto)
        VALUES('$id_regist',
        '$id_user','$bank','$norek','$biaya_pendaftaran','$tanggal_pembayaran','$foto_file')";
}


$result = mysql_query($sql) or die(mysql_error());

//check if query successful
if($result) {
	header('location:index.php?page=26');
} else {
	header('index.php?page=26');

}
}
?>
