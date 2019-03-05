

<?php  

  

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	
	if ($id_user == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}
	if ($nilai == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}
	if ($hasil == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}
	if ($tgl == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO seleksi VALUES(null, '$id_user', '$nilai', '$hasil', '$tgl')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ";
			echo '<script>window.location = "index.php?page=26"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['Id_test']);
	unset($_SESSION['id_user']);
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
                <h4 class="title">Tambah Regist</h4>
                <p class="category">Masukan data  dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=19" class="btn btn-primary btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data </b></h3>
				
				<form action="" name="hitung" method="post">
					
				<div class="control-group">
					<label for="kode_mapel_kegiatan"> Seleksi</label>
					<div class="controls">
			<input type="text" list="id_user" class="form-control"  name='id_user'  class='required'
			>
			<datalist id="id_user">
			<?php 
				$query = "SELECT * FROM pendaftaran";
				$exec=mysqli_query($conn,$query);
				while ($rows = mysqli_fetch_array($exec)) {
				echo "<option value='$rows[Id] $rows[nama] '>";
				}
			?>
			</datalist>

		</div>
					<div class="form-group floating-label">
						<label for="nilai">No Regist</label>
						<input type="text" class="form-control" name="nilai" value="" onFocus="if(this.value=='0')this.value=''" onBlur="if(this.value=='')this.value='0'; return hit();">
					</div>
					<div class="form-group floating-label">
						<label for="hasil">Seleksi</label>
						<input type="text" class="form-control" name="hasil"  id="hasil" value="" onFocus="if(this.value=='0')this.value=''" onBlur="if(this.value=='')this.value='0'; return hit();">
					</div>
					<div class="form-group floating-label">
						<label for="hasil">Ket</label>
						<input type="text" class="form-control" name="hasil"  id="hasil" value="" onFocus="if(this.value=='0')this.value=''" onBlur="if(this.value=='')this.value='0'; return hit();">
					</div>
					<input type="hidden" class="form-control" readonly="readonly" name="tgl" value="<?php echo date('Y-m-d ') ?>">
	
					<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
