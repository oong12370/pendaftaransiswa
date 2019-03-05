<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['Id_test'])) {
	
	$Id_test 		= 	$_GET['Id_test'];

	$query		= 	"DELETE FROM tb_seleksi WHERE Id_test = $Id_test";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data ";
		echo '<script>window.location="../index.php?page=26"</script>';
	}
}
?>