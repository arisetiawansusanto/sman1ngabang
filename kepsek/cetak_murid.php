<?php
session_start();
include('../config/cMurid.php');
include('../config/cRegistrasi.php');
include('../config/cAkademik.php');
include('../config/cJurusan.php');
include('../config/koneksi.php');
require('../fpdf181/fpdf.php');

$jurusan = $_GET['jurusan'];
$regis = $_GET['regis'];

$pdf = new FPDF('L', 'mm', 'Letter');
$pdf->AddPage();


$pdf->Cell(20, 6, '', 0, 0, '');
$pdf->Image('../assets/images/ngabang.jpeg', 30, 10, 15);

$pdf->SetFont('Times', 'b', 16);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 6, '', 0, 0, '');
$pdf->Cell(67, 6, 'SMA NEGERI 1 NGABANG', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(40, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Jl. Veteran, Hilir Ktr.', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(40, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Kec. Ngabang, Kabupaten Landak, Kalimantan Barat 79357', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(40, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Kelas', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, '');
$pdf->Cell(67, 5, get_jurusan($db, $jurusan, 'namajurusan'), 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(40, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tahun Ajaran ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, '');
if ($regis == '0') {
    $pdf->Cell(10, 5, ' ', 0, 0, 'L');
    $pdf->Cell(3, 5, '/', 0, 0, 'L');
    $pdf->Cell(5, 5, ' ', 0, 1, 'L');
} else {
    $pdf->Cell(10, 5, get_akademik($db, $regis, 'semester'), 0, 0, 'L');
    $pdf->Cell(3, 5, '/', 0, 0, 'L');
    $pdf->Cell(5, 5, get_akademik($db, $regis, 'tahun'), 0, 1, 'L');
}

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(200, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tanggal Cetak: ', 0, 0, 'L');
$sekarang = date("d / m / Y");
$pdf->Cell(12, 6, $sekarang, 0, 1, '');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(6, 5, 'No', 1, 0, 'L');
$pdf->Cell(15, 5, 'ID Murid', 1, 0, 'L');
$pdf->Cell(60, 5, 'Nama Murid', 1, 0, 'L');
$pdf->Cell(50, 5, 'Alamat', 1, 0, 'C');
$pdf->Cell(60, 5, 'Email', 1, 0, 'C');
$pdf->Cell(25, 5, 'Telp', 1, 1, 'C');

$no = 1;

if ($regis == 0 and $jurusan > 0) {
    $dt = get_allmuridByKelas($db, $jurusan);
} elseif ($regis > 0 and $jurusan == 0) {
    $dt = get_allmuridByRegis($db, $regis);
} elseif ($regis > 0 and $jurusan > 0) {
    $dt = get_allmuridByRegisJurusan($db, $regis, $jurusan);
} else {

    $dt = get_allmurid($db);
}


while ($data = mysqli_fetch_array($dt)) {
    $pdf->Cell(20, 5, '', 0, 0, '');
    $pdf->Cell(6, 5, $no, 1, 0, 'L');
    $pdf->Cell(15, 5, $data['ID_Murid'], 1, 0, 'L');
    $pdf->Cell(60, 5, $data['Nama_Murid'], 1, 0, 'L');
    $pdf->Cell(50, 5, $data['Alamat_Murid'], 1, 0, 'L');
    $pdf->Cell(60, 5, $data['Gmail'], 1, 0, 'L');
    $pdf->Cell(25, 5, $data['Telp'], 1, 1, 'L');
    $no++;
}



$pdf->Output();
