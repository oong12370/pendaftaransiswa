

<?php  

  

if (isset($_POST['submit'])) {
    
    $_SESSION['message'] = "";

    $valid = true;
    $err   = array();

    

    foreach ($_POST as $key=>$val) {
        ${$key} = $val;
        $_SESSION[''.$key.''] = $val;
    }

    if ($bank == "") {
        array_push($err, "bank tidak boleh kosong");
        $valid = false;
    }
    if ($norek == "") {
        array_push($err, "nomor rekening tidak boleh kosong");
        $valid = false;
    }
    if ($biaya_pendaftaran == "") {
        array_push($err, "nominal tidak boleh kosong");
        $valid = false;
    }

    if ($tgl == "") {
        array_push($err, "nama tidak boleh kosong");
        $valid = false;
    }
    if ($status == "") {
        array_push($err, "nama tidak boleh kosong");
        $valid = false;
    }
    if ($valid == false) {
        echo '<script>alert("tidak boleh ada field yang kosong")</script>';
    }else{

        $query      =   "INSERT INTO pembayaran(id_regist,id_user,bank,
    norek,biaya_pendaftaran,tanggal_pembayaran,status)
        VALUES('$id_regist',
        '$id_user','$bank','$norek','$biaya_pendaftaran','$tanggal_pembayaran','$status')";
        $exec       =   mysqli_query($conn, $query);

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
 
</script>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title"></h4>
                <p class="category">Konfirmasi Pembayaran</p>
            </div>
            <?php  

                                    $query = "select tb_seleksi.Id_test,nilai,hasil,nama,keterangan,id_regist from tb_seleksi inner join regist on tb_seleksi.Id_test=regist.Id_test inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id where id_user=$id_user ";

                                    $exec  = mysqli_query($conn,$query);

                                    
                                                while ($rows = mysqli_fetch_array($exec)) {
                                                    
                                                
                              ?>
            <div class="card-content">
                
                <form action="" name="hitung" method="post">
                    
                <div class="control-group">
                    <label for="kode_mapel_kegiatan">Peserta</label>
                    <div class="controls">
            <input type="text" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $nama; ?>"  class='required'
            >
            <input type="hidden" list="id_regist" class="form-control"  name='id_regist' readonly value="<?php echo $rows['id_regist'] ?>"  class='required'
            >
            <input type="hidden" list="id_user" class="form-control"  name='id_user' readonly value="<?php echo $id_user; ?>"  class='required'
            >
            <input type="hidden" list="status" class="form-control"  name='status' readonly value="0"  class='required'
            >

        </div>
                    <div class="form-group floating-label">
                        <label for="nilai">Bank</label>
                        <input type="text" class="form-control" name="bank" value="" >
                    </div>
                    <div class="form-group floating-label">
                        <label for="hasil">Nomor Rekening</label>
                        <input type="text" class="form-control" name="norek"  id="norek" value="" >
                    </div>
                    <div class="form-group floating-label">
                        <label for="hasil">Nominal</label>
                        <input type="text" class="form-control" name="biaya_pendaftaran"  id="biaya_pendaftaran" value="" >
                    </div>
                   
                    <input type="hidden" class="form-control" readonly="readonly" name="tanggal_pembayaran" value="<?php echo date('Y-m-d ') ?>">
    
                    <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
                    <button type="reset" class="btn btn-warning pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php 
        }
        ?>  