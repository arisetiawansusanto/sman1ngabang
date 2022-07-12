<?php
session_start();
include('../config/cMurid.php');
include('../config/cAbsensi.php');
include('../config/cAkademik.php');
include('../config/cRegistrasi.php');
include('../config/cGuru.php');
include('../config/koneksi.php');
require('../fpdf181/fpdf.php');

$pdf = new FPDF();
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
$pdf->Cell(20, 5, '', 0, 0, '');

$pdf->ln(10);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(20, 5, 'Nama', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(30, 5, get_murid($db, $_GET['id'], 'nama'), 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(20, 5, 'Tahun Ajaran', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(8, 5, get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'semester'), 0, 0, 'L');
$pdf->Cell(2, 5, ' ', 0, 0, 'L');
$pdf->Cell(8, 5, get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'tahun'), 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(20, 5, 'Laporan Absensi ', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(135, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tanggal Cetak: ', 0, 0, 'L');
$sekarang = date("d / m / Y");
$pdf->Cell(12, 6, $sekarang, 0, 1, '');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(10, 5, 'No', 1, 0, 'L');
$pdf->Cell(60, 5, 'Mata Pelajaran', 1, 0, 'L');
$pdf->Cell(25, 5, 'ID Guru', 1, 0, 'C');
$pdf->Cell(25, 5, 'Nama Guru', 1, 0, 'C');
$pdf->Cell(25, 5, 'Tanggal', 1, 0, 'C');
$pdf->Cell(25, 5, 'Status', 1, 1, 'C');

$dt = get_allabsensiByMurid($db, $_GET['id']);
$no = 1;
while ($data = mysqli_fetch_array($dt)) {
    $pdf->Cell(20, 5, '', 0, 0, '');
    $pdf->Cell(10, 5, $no, 1, 0, 'L');
    $pdf->Cell(60, 5, $data['ID_Pelajaran'], 1, 0, 'L');
    $pdf->Cell(25, 5, $data['ID_Guru'], 1, 0, 'C');
    $pdf->Cell(25, 5, get_guru($db, $data['ID_Guru'], 'nama'), 1, 0, 'C');
    $pdf->Cell(25, 5, $data['Tanggal'], 1, 0, 'C');
    $pdf->Cell(25, 5, $data['Status'], 1, 1, 'C');
    $no++;
}

$pdf->Output();
