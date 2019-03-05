<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Start/Stop Slider</title>
	<script type="text/javascript" src="js/jquery-1.2.6.js"></script>
	<script type="text/javascript" src="js/startstop-slider.js"></script>
	<style type="text/css">
<!--
.style1 {font-size: 10px}
body {
	background-color: #FFFFFF;
}
-->
    </style>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1><a href="">Pengumumam Terbaru</a></h1>
<?php
include 'koneksi/koneksi.php';
                $query = "SELECT * FROM pengumuman";

                $exec  = mysqli_query($conn,$query);

                
                    while ($rows = mysqli_fetch_array($exec)) {
                        
                    
              ?>
	<div id="page-wrap">
	  <div id="slider">
        <div id="mover">
          <div id="slide-1" class="slide">
            
            <p class="style1">

          <div class="slide">
            <h1><?php echo $rows['judul'] ?></a></h1>
            <p><?php echo $rows['deskkripsi'] ?><? echo"<a href=\"?page=peserta/detail_informasi&no_info=15\">[ Read More ] </a>" ?> 
</p>
            
        </div>
      </div>
	  <p align="center" style="text-align: center;">&nbsp;</p>
		
</div>
	
</body>
<?php
                    }
              ?>
</html>
