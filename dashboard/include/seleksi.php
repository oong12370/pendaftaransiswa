

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Seleksi </h4>
                
            </div>
            <div class="card-content">
                <a href="index.php?page=31" class="btn btn-primary btn-md pull-right"><i class="fa fa-plus"></i> Tambah </a>
                <h3 style="overflow: hidden;"><b>Data </b></h3>
                        <table class="table table-hover">
                              <thead>
                                    <tr>
                                         <td><b>No</b></td>
              <td><b>Nama</b></td>
              <td><b>Nilai</b></td>
              <td><b>Hasil</b></td>
              <td><b>Date</b></td>
                                          
                                    </tr>
                              </thead>
                            <tbody>
                              
                              <?php  

                                    $query = "select tb_seleksi.Id_test,nilai,hasil,nama,tgl from tb_seleksi inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id where hasil='Lulus' ";

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
                      <td><?php echo $rows['nilai'] ?></td>
                      <td><?php echo $rows['hasil'] ?></td>
                      <td><?php echo $rows['tgl'] ?></td>
                      <td>
                        <a href="index.php?page=32&Id_test=<?php echo $rows['Id_test'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil">Acc</i></a>
                        
                      </td>
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