

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> Konfirmasi Pembayaran pendaftaran.
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Konfirmasi pembayaran</h4>
                <p class="category">Lakukan konfirmasi pembayaran</p>
            </div>
            <div class="card-content">
                
                <h3 style="overflow: hidden;"><b>Data Konfirmasi Pembayaran</b></h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>No</b></td>
							<td><b>Nama Pendaftar</b></td>
							<td><b>Bank</b></td>
							<td><b>No rekening</b></td>
							<td><b>Total</b></td>
							<td><b>Tanggal</b></td>
							<td><b>status</b></td>
							<td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	<?php  
				    		$query 	= "select pembayaran.id_pemabayaran,nama,bank,norek,tanggal_pembayaran,biaya_pendaftaran,status from pembayaran inner join regist on pembayaran.id_regist=regist.id_regist inner join pendaftaran on pembayaran.id_user=pendaftaran.Id ";

				    		$exec 	=	mysqli_query($conn, $query);

				    		if ($exec) {
				    			$total	= mysqli_num_rows($exec);
				    			if ($total > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				    $status = $rows['status'];

				    			
				    	?>
		
								
									<tr>
										<td><?php echo ++$no; ?></td>
										<td><?php echo $rows['nama']; ?></td>
										<td><?php echo $rows['bank']; ?></td>
										<td><b><?php echo $rows['norek']; ?></b></td>
										<td><b><?php echo $rows['biaya_pendaftaran']; ?></b></td>
										<td><b><?php echo $rows['tanggal_pembayaran']; ?></b></td>
										<td><?php 
										$status == 0 ? 
										print("<font color='#e74c3c'>Belum dikonfirmasi</font>") : 
										print("<font color='##2ecc71'>Sudah dikonfirmasi</font>"); 
										?></td>
										<td>
											<!-- <a href="" class="btn btn-primary btn-sm">Konfirmasi</a> -->
											<a href="include/proses_konfirmasi_cicilan_pendaftaran.php?id=<?php echo $rows['id_pemabayaran'] ?>" class="btn btn-warning btn-sm">Konfirmasi</a>
										</td>
									</tr>

				    	<?php
				    				}
				    			}else{
				    				echo "<td colspan='5' align='center'><h3><b>Belum ada yang melakukan konfirmasi Pembayaran</b></h3></td>";
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}
				    	?>
				        
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>