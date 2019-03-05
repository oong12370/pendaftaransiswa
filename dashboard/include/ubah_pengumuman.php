
<?php  
$id = $_GET['id'];
$query 		=	"SELECT * FROM pengumuman where id = $id";

$exec  		= 	mysqli_query($conn, $query);

if ($exec) {
	$data 	= mysqli_fetch_array($exec);
}else{
	echo mysqli_error($conn);
}


if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
	}

	if ($judul == "") {
		$valid = false;
	}

	if ($deskkripsi == "") {
		$valid = false;
	}

	if ($ket == "") {
		$valid = false;
	}


	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE pengumuman 
						SET judul = '$judul', deskkripsi = '$deskkripsi', ket = '$ket' 
						WHERE id=$id";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil";
			echo '<script>window.location = "index.php?page=19"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Add Pengumuman</h4>
                <p class="category">Masukan data dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=19" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Pengumuman</b></h3>
				
				<form action="" method="post">

					<div class="form-group floating-label">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" name="judul" value="<?php echo $data['judul']?>">
						<input type="hidden" class="form-control" name="id" value="<?php echo $data['id']?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Deskripsi</label>
						<textarea name="deskkripsi" cols="20" rows="4" class="form-control"><?php echo $data['deskkripsi']?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="keteranngan">Keterangan</label>
						<input type="text" class="form-control" name="ket" value="<?php echo $data['ket']?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
