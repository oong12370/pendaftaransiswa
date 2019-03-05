

<?php  
$Id_test = $_GET['Id_test'];
$query 		=	"select tb_seleksi.Id_test,nilai,hasil,nama,tgl from tb_seleksi inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id where Id_test=$Id_test ";

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

	if ($nilai == "") {
		$valid = false;
	}

	if ($hasil == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE tb_seleksi 
						SET nilai = '$nilai', hasil = '$hasil'
						WHERE Id_test=$Id_test";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ";
			echo '<script>window.location = "index.php?page=26"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}
?>

<script type="text/javascript"> 
function hit() 
{ 
  var b1 = parseFloat (document.forms.hitung.nilai.value);   
 if(b1 > 75) {
  document.forms.hitung.hasil.value = ("Lulus"); 
  document.forms.hitung.ket.value = ("Selamat atas keberhasilan Anda! Anda lulus dalam pelatihan dan mempunyai kemampuan yang sangat baik dalam bidang anda!"); 
  }else {
  document.forms.hitung.hasil.value = ("Gagal"); 
  document.forms.hitung.ket.value = ("Anda Tidak Lulus mohon kembangkan kemampuan anda!!!");
  } 
}  
</script>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Nilai</h4>
                <p class="category">Masukan data  dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=26" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data test</b></h3>
				
				<form action="" name="hitung" method="post">
					
				<div class="control-group">
					<label for="kode_mapel_kegiatan">Peserta</label>
					<div class="controls">
			<input type="text" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $data['nama']?>" class='required'
			>
			<input type="hidden" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $data['Id_test']?>" class='required'
			>
			
		</div>
					<div class="form-group floating-label">
						<label for="nilai">Nilai</label>
						<input type="text" class="form-control" name="nilai" value="<?php echo $data['nilai']?>" onFocus="if(this.value=='0')this.value=''" onBlur="if(this.value=='')this.value='0'; return hit();">
					</div>
					<div class="form-group floating-label">
						<label for="hasil">Hasil</label>
						<input type="text" class="form-control" name="hasil"  id="hasil" value="<?php echo $data['hasil']?>" onFocus="if(this.value=='0')this.value=''" onBlur="if(this.value=='')this.value='0'; return hit();">
					</div>
					
	
					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
