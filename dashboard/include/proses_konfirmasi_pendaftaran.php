<?php  


session_start();
include '../../koneksi/koneksi.php';

date_default_timezone_get("Asia/Jakarta");

if (isset($_GET['idd'])) {
	$id 		=	$_GET['idd'];
	$idu 		=	$_GET['idu'];
	$idd 		=	$_GET['idd'];
	
	$query		=	"UPDATE detail_pendaftaran 
					SET status_pendaftaran=1, id_admin=2 
					WHERE id_user=$id";
	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=7"</script>';
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'tidak ada';
}




?>