<?php
session_start();
include('../config/cMurid.php');
include('../config/cPelajaran.php');
include('../config/cKelas.php');
include('../config/cGuru.php');
include('../config/cAbsensi.php');
include('../config/cNilai.php');
include('../config/cAkademik.php');
include('../config/cRegistrasi.php');
include('../config/koneksi.php');
require('../fpdf181/fpdf.php');

$kelas = $_GET['kelas'];
$mapel = $_GET['mapel'];
$tanggal = $_GET['tanggal'];
$regis = $_GET['regis'];

if ($mapel == '0') {
    $namapelajaran = 'Semua';
} else {
    $namapelajaran = get_pelajaran($db, $mapel, 'namapelajaran');
}


$pdf = new FPDF();
$pdf->AddPage();


$pdf->Cell(10, 6, '', 0, 0, '');
$pdf->Image('../assets/images/ngabang.jpeg', 20, 10, 15);

$pdf->SetFont('Times', 'b', 16);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(20, 6, '', 0, 0, '');
$pdf->Cell(67, 6, 'SMA NEGERI 1 NGABANG', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Jl. Veteran, Hilir Ktr.', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(30, 5, '', 0, 0, '');
$pdf->Cell(67, 5, 'Kec. Ngabang, Kabupaten Landak, Kalimantan Barat 79357', 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0, 0, '');

$pdf->ln(10);

if ($kelas == '0') {
    $kelas2 = 'Semua Kelas';
} else {
    $kelas2 = get_kelas($db, $kelas, 'kelas');
}

$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Kelas', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5, $kelas2, 0, 1, 'L');
$pdf->SetFont('Times', '', 10);

$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Tanggal', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5, $tanggal, 0, 1, 'L');

$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Mata Pelajaran', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5, $namapelajaran, 0, 1, 'L');

$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(30, 5, 'Tahun', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5, get_akademik($db, $regis, 'semester'), 0, 0, 'L');
$pdf->Cell(3, 5, '/', 0, 0, 'L');
$pdf->Cell(10, 5, get_akademik($db, $regis, 'tahun'), 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(130, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tanggal Cetak: ', 0, 0, 'L');
$sekarang = date("d / m / Y");
$pdf->Cell(12, 6, $sekarang, 0, 1, '');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(10, 5, '', 0, 0, '');
$pdf->Cell(10, 5, 'No', 1, 0, 'L');
$pdf->Cell(30, 5, 'ID Murid', 1, 0, 'L');
$pdf->Cell(60, 5, 'Nama Murid', 1, 0, 'L');
$pdf->Cell(25, 5, 'Tanggal', 1, 0, 'C');
$pdf->Cell(25, 5, 'Status', 1, 1, 'C');

$no = 1;

if ($kelas == '0' and $mapel == '0' and $regis == '0') {
    $dt = get_allabsensiByTanggal($db, $tanggal);
} elseif ($kelas > '0' and $mapel == '0' and $regis == '0') {
    $dt = get_allabsensiByKelasTanggal($db, $kelas, $tanggal);
} elseif ($kelas == '0' and $mapel == '0' and $regis > '0') {
    $dt = get_allabsensiByTanggalRegis($db, $regis, $tanggal);
} elseif ($kelas == '0' and $mapel > '0' and $regis == '0') {
    $dt = get_allabsensiByMapelTanggal($db, $mapel, $tanggal);
} elseif ($kelas == '0' and $mapel == '0' and $regis == '0') {
    $dt = get_allabsensiByMapelTanggal($db, $mapel, $tanggal);
} elseif ($kelas > '0' and $mapel > '0' and $regis == '0') {
    $dt = get_allabsensiByKelasMapelTanggal($db, $kelas, $mapel, $tanggal);
} elseif ($kelas > '0' and $mapel > '0' and $regis > '0') {
    $dt = get_allabsensiByAll($db, $kelas, $mapel, $tanggal, $regis);
} else {
    $dt = get_allabsensi($db);
}

while ($data = mysqli_fetch_array($dt)) {
    $pdf->Cell(10, 5, '', 0, 0, '');
    $pdf->Cell(10, 5, $no, 1, 0, 'L');
    $pdf->Cell(30, 5, $data['ID_Murid'], 1, 0, 'L');
    $pdf->Cell(60, 5, get_murid($db, $data['ID_Murid'], 'nama'), 1, 0, 'L');
    $pdf->Cell(25, 5, $data['Tanggal'], 1, 0, 'C');
    $pdf->Cell(25, 5, $data['Status'], 1, 1, 'C');
    $pdf->SetFont('Times', '', 10);

    $no++;
}

$pdf->Output();
