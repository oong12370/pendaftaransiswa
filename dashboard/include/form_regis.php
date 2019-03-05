

<?php  
$Id_test = $_GET['Id_test'];
$query 		=	"select tb_seleksi.Id_test,nilai,hasil,nama,tgl from tb_seleksi inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id";

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

	if ($Id_test == "") {
		$valid = false;
	}

	if ($keterangan == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO regist VALUES(null, '$Id_test', '$tgl', '$keterangan')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ";
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
                <h4 class="title">Regist</h4>
                <p class="category">Masukan data  dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=19" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data </b></h3>
				
				<form action="" name="hitung" method="post">
					
				<div class="control-group">
					<label for="kode_mapel_kegiatan">Nomor Test</label>
					<div class="controls">
			<input type="hidden" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $data['nama']?>" class='required'
			>
			<input type="text" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $data['Id_test']?>" class='required'
			>
			
		</div>
					<div class="form-group floating-label">
						<label for="nilai">Nilai</label>
						<input type="text" class="form-control" readonly name="nilai" value="<?php echo $data['nilai']?>"">
					</div>
					<div class="form-group floating-label">
						<label for="hasil">Hasil</label>
						<input type="text" class="form-control" readonly name="hasil"  id="hasil" value="<?php echo $data['hasil']?>">
						<input type="hidden" class="form-control" readonly="readonly" name="tgl" value="<?php echo date('Y-m-d ') ?>">
					</div>
					<div class="form-group floating-label">
						<label for="nilai">Keterangan</label>
						<input type="text" class="form-control"  name="keterangan" value="">
					</div>
	
					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
