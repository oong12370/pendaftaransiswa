<?php  
ob_start();
include '../../assets/libs/fpdf/fpdf.php';
include '../../koneksi/koneksi.php';
include '../../assets/libs/fpdf/mc_table/mc_table_pendapatan.php';

$id_maintenance = $_GET['id_mnt'];


// Instanciation of inherited class
$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->Ln(15);
$pdf->Cell(40,10,'',0,0,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(100,10,'List Regist',1,1,'C');
$pdf->Ln();
$pdf->SetFont('TIMES','',10);
$pdf->Cell(10,10,'No.',1,0,'C');
$pdf->Cell(40,10,'Nama',1,0,'C');
$pdf->Cell(50,10,'Nilai',1,0,'C');
$pdf->Cell(40,10,'Hasil',1,0,'C');
$pdf->Cell(30,10,'Date',1,1,'C');


$query	=	"select tb_seleksi.Id_test,nilai,hasil,nama,tgl from tb_seleksi inner join pendaftaran on tb_seleksi.id_user=pendaftaran.Id where hasil='Lulus'";
$exec 	=	mysqli_query($conn, $query);

$no = 0;

$pdf->SetWidths(array(10,40,50,40,30));

$count 	=	0;
$tmp_id = "";
$count = 0;

while ($rows = mysqli_fetch_array($exec)) {

  $mp 	=	$rows['metode_pembayaran'];
 
  if ($mp == "C") {
  	$cicilan = $rows['cicilan_ke'];
    if ($cicilan == 2) {
      $cicilan = "LUNAS";
    }
  }else{
  	$cicilan = "LUNAS";
  }

  $pdf->Row(array(++$no,$rows['nama'],$rows['nilai'],$rows['hasil'],$rows['tgl']));
  $count+=$rows['biaya_pendaftaran'];
}


$pdf->Output();



function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}


?>