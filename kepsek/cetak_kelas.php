<?php
session_start();
include('../config/cKelas.php');
include('../config/cMurid.php');
include('../config/cTingkat.php');
include('../config/cJurusan.php');
include('../config/cregistrasi.php');
include('../config/cAkademik.php');
include('../config/koneksi.php');
require('../fpdf181/fpdf.php');

$kelas = $_GET['kelas'];

$pdf = new FPDF();
$pdf->AddPage();


$pdf->Cell(20, 6, '', 0, 0, '');
$pdf->Image('../assets/images/ngabang.jpeg', 20, 10, 15);

$pdf->SetFont('Times', 'b', 16);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(10, 6, '', 0, 0, '');
$pdf->Cell(67, 6, 'SMA NEGERI 1 NGABANG', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Jl. Veteran, Hilir Ktr.', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(30, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Kec. Ngabang, Kabupaten Landak, Kalimantan Barat 79357', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');

$pdf->ln(5);

$pdf->Cell(10, 5, '', 0, 1, '');
$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(10, 5, 'Kelas :', 0, 0, 'L');
$pdf->Cell(5, 5, get_kelas($db, $kelas, 'kelas'), 0, 0, 'L');
$pdf->Cell(30, 5, '', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(130, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tanggal Cetak: ', 0, 0, 'L');
$sekarang = date("d / m / Y");
$pdf->Cell(12, 6, $sekarang, 0, 1, '');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(6, 5, 'No', 1, 0, 'L');
$pdf->Cell(20, 5, 'ID Murid', 1, 0, 'L');
$pdf->Cell(50, 5, 'Nama Murid', 1, 0, 'L');
$pdf->Cell(50, 5, 'Alamat', 1, 0, 'C');
$pdf->Cell(20, 5, 'Semester', 1, 0, 'C');
$pdf->Cell(20, 5, 'Tahun', 1, 1, 'C');


$dt = get_MuridByKelas($db, $kelas);

$no = 1;

while ($data = mysqli_fetch_array($dt)) {
    $pdf->Cell(10, 5, '', 0, 0, '');
    $pdf->Cell(6, 5, $no, 1, 0, 'L');
    $pdf->Cell(20, 5, $data['ID_Murid'], 1, 0, 'L');
    $pdf->Cell(50, 5, get_murid($db, $data['ID_Murid'], 'nama'), 1, 0, 'L');
    $pdf->Cell(50, 5, get_murid($db, $data['ID_Murid'], 'alamat'), 1, 0, 'L');
    $pdf->Cell(20, 5, get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'semester'), 1, 0, 'L');
    $pdf->Cell(20, 5, get_akademik($db, get_registrasi2($db, $data['ID_Murid'], 'id_akad'), 'tahun'), 1, 1, 'L');
    $no++;
}



$pdf->Output();
