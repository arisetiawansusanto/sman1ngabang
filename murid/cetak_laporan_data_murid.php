<?php
session_start();
include('../config/cMurid.php');
include('../config/cPelajaran.php');
include('../config/cKelas.php');
include('../config/cTingkat.php');
include('../config/cNilai.php');
include('../config/cJurusan.php');
include('../config/cRegistrasi.php');
include('../config/cAkademik.php');
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

$pdf->ln(20);


$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(20, 5, 'Laporan Data Murid ', 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'ID Murid : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(30, 5, $_GET['id'], 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Nama', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_murid($db, $_GET['id'], 'nama'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Alamat : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_murid($db, $_GET['id'], 'alamat'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Email : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_murid($db, $_GET['id'], 'email'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Telepon : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_murid($db, $_GET['id'], 'telp'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Tingkat : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_tingkat($db, get_registrasi($db, $_GET['regis'], 'tingkat'), 'jenistingkat'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Kelas : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_jurusan($db, get_registrasi($db, $_GET['regis'], 'jurusan'), 'namajurusan'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Jurusan : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(50, 5, get_kelas($db, get_registrasi($db, $_GET['regis'], 'kelas'), 'kelas'), 0, 1, 'L');

$pdf->ln(5);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Tahun : ', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5,  get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'semester'), 0, 0, 'L');
$pdf->Cell(3, 5, '/', 0, 0, 'L');
$pdf->Cell(10, 5,  get_akademik($db, get_registrasi2($db, $_GET['id'], 'id_akad'), 'tahun'), 0, 1, 'L');


$pdf->Output();
