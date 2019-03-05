<?php  


session_start();
include '../../koneksi/koneksi.php';


if (isset($_GET['id'])) {
	//ID Cicilan pendaftaran
	$id 		=	$_GET['id'];
	//ID detail pendaftaran
	$idd 		=	$_GET['idd'];

	$date 		=	substr(date('Y'), 2,4);

	//Query untuk mendapatkan nis terakhir siswa

	//QUery ubah status cicilan menjadi 1(sudah dikonfirmasi oleh admin)
	$query		=	"UPDATE pembayaran
					SET status=1
					WHERE id_pemabayaran=$id";
	$exec 		= 	mysqli_query($conn, $query);


	if ($exec) {
		$_SESSION['message']	= "1";
		echo '<script>window.location="../index.php?page=17"</script>';
	}else{
		echo mysqli_error($conn);
	}
}

?>