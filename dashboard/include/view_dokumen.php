<script  src="../asst/js/jquery-3.1.0.min.js"></script>
<script  src="../asst/js/jquery.dataTables.min.js"></script>
<script  src="../asst/js/dataTables.bootstrap.min.js"></script>
<script >
            $(document).ready(function () {
                $('#dataView').DataTable();
            });
        </script>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Dokumen</h4>
                
            </div>
            <div class="card-content">
               
                <h3 style="overflow: hidden;"><b>Data </b></h3>
                 <div class="row">
                <div class="col-lg-12">
                        <table id="dataView" class="table table-hover">
                              <thead>
                                    <tr>
                                          <td><b>No</b></td>
                                          <td><b>Nama</b></td>
                                          <td><b>Akte</b></td>
                                          <td><b>Kartu Keluarga</b></td>
                                          <td><b>Foto Keluarga</b></td>
                                          
                                    </tr>
                              </thead>
                            <tbody>
                              
                              <?php  

                                    $query = "SELECT * from pendaftaran ";

                                    $exec  = mysqli_query($conn,$query);

                                    if ($exec) {
                                          $count = mysqli_num_rows($exec);
                                          if ($count > 0) {
                                                $no = 0;
                                                while ($rows = mysqli_fetch_array($exec)) {
                                                    
                                                
                              ?>
                                                      <tr>
                                                                  <td><?php echo ++$no; ?></td>
                                                                  <td><?php echo $rows['nama'] ?></td>
                                                                  <td  class='fancybox'  width='50' height='20' ></a><a href='<?php echo "../assets/uploads/" . $rows['upload_akte'] . "";?>' target='_blank'><?php
						if (!empty($rows['upload_akte'])) {
							echo "<img src='../assets/uploads/" . $rows['upload_akte'] . "' />";
						}
					?> </td>
																<td width='50' height='20' ><a href='<?php echo "../assets/uploads/" . $rows['upload_kartu_keluarga'] . "";?>' target='_blank'><?php
						if (!empty($rows['upload_kartu_keluarga'])) {
							echo "<img src='../assets/uploads/" . $rows['upload_kartu_keluarga'] . "' />";
						}
					?> </td>
					</td>
																<td width='50' height='20' ><a href='<?php echo "../assets/uploads/" . $rows['foto_keluarga'] . "";?>' target='_blank'><?php
						if (!empty($rows['foto_keluarga'])) {
							echo "<img src='../assets/uploads/" . $rows['foto_keluarga'] . "' />";
						}
					?> </td>
                                                                  
                                                            </tr>
                              <?php
                                                }
                                          }else{
                              ?>
                                          <tr>
                                                      <td colspan="6" align="center"><h4><b>Kosong</b></h4></td>
                                                </tr>
                              <?php
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
 