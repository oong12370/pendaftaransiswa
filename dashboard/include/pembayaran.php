

<div class="row"> 	
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Pembayaran</h4>
                <p class="category">Isi Form pendaftaran dengan benar</p>
            </div>
            <div class="card-content">
            
            
            <h4><b>Biaya yang harus dibayarkan , kententuan sebagai berikut: </b></h4>
			<ol>
			
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Nama</th>
							<th align="right"><?php echo $nama; ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nilai</td>
							<td align="right"><?php echo $nilai; ?></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td align="right"><?php echo $hasil; ?></td>
						</tr>
						<?php  

                                    $query = "select tb_seleksi.Id_test,nilai,hasil,nama,keterangan from tb_seleksi inner join regist on tb_seleksi.Id_test=regist.Id_test inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id where id_user=$id_user ";

                                    $exec  = mysqli_query($conn,$query);

                                    
                                                while ($rows = mysqli_fetch_array($exec)) {
                                                    
                                                
                              ?>
						<tr>
							<td>Pembayaran </td>
							<td align="right"><?php echo $rows['keterangan'] ?></td>
						</tr>
						
					</tbody>
				</table>
				
		<?php 
		}
		?>		
					
			
