

<div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
<div class="card" style="margin-top: 50px">
<div class="card-header" data-background-color="blue">
<h4 class="title">Seleksi Pendaftar</h4>
<p class="category">Data berikut telah di koreksi</p>
</div>
<div class="card-content table-responsive">

<h3 style="overflow: hidden;"><b>Data </b></h3>
<table class="table table-hover">

    <tbody>
        <tr>
            <td><b>Email</b></td>
            <td>: <?php echo $email; ?> </td>
        </tr>
        <tr>
            <td><b>Nama</b></td>
            <td>: <?php echo $nama; ?></td>
        </tr>
        <tr>
            <td><b>Nama Panggilan</b></td>
            <td>: <?php echo $nama_panggilan;; ?></td>
        </tr>
        <tr>
            <td><b>TTL</b></td>
            <td>: <?php echo $tempat_lahir.", ".$tanggal_lahir;; ?>, <?php isset($_SESSION['birth_date'])  ?  print($_SESSION['birth_date']) : "2009-01-01"; ?></td>
        </tr>
        <tr>
            <td><b>Jenis Kelamin</b></td>
            <td>: <?php echo $jenis_kelamin; ?></td>
        </tr>
        
        
        <tr>
            <td><b>Nilai Test</b></td>
            <td>: <?php echo $nilai; ?></td>
        </tr>
        <tr>
            <td><b>Hasil Test</b></td>
            <td>: <?php echo $hasil; ?></td>
        </tr>
    </tbody>
</table>




