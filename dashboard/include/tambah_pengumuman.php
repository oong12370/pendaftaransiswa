<h1>Add Pengumuman</h1>

<?php  

 

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($judul == "") {
		array_push($err, "judul tidak boleh kosong");
		$valid = false;
	}

	if ($deskkripsi == "") {
		array_push($err, "Deskripsi tidak boleh kosong");
		$valid = false;
	}

	if ($ket == "") {
		array_push($err, "keteranngan tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO pengumuman VALUES(null, '$id_user', '$tanggal', '$judul', '$deskkripsi', '$ket')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ";
			echo '<script>window.location = "index.php?page=19"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['judul']);
	unset($_SESSION['deskkripsi']);
	unset($_SESSION['ket']);
	
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
					
<?php 
	$query="select * from akun where nama_admin='".$_SESSION['nama_admin']."'";
    $baris=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($baris);
	?>
					<div class="form-group floating-label">
						<label for="judul">Judul</label>
						<input type="text" class="form-control" name="judul" value="<?php isset($_SESSION['judul'])  ?  print($_SESSION['judul']) : ""; ?>">
						<input type="hidden" class="form-control" name="tanggal" value="<?php echo date('Y-m-d H:i:s') ?>">
						<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Deskripsi</label>
						<textarea name="deskkripsi" cols="20" rows="4" class="form-control"><?php isset($_SESSION['deskkripsi'])  ?  print($_SESSION['deskkripsi']) : ""; ?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="keteranngan">Keterangan</label>
						<input type="text" class="form-control" name="ket" value="<?php isset($_SESSION['keteranngan'])  ?  print($_SESSION['keteranngan']) : ""; ?>">>
					</div>
					

					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
