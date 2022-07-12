<?php
session_start();
include('../config/cMurid.php');
include('../config/cPelajaran.php');
include('../config/cKelas.php');
include('../config/cAbsensi.php');
include('../config/cNilai.php');
include('../config/cAkademik.php');
include('../config/koneksi.php');
require('../fpdf181/fpdf.php');

$kelas = $_GET['kelas'];
$regis = $_GET['regis'];

$pdf = new FPDF('L', 'mm', 'A4');
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

if ($kelas == '0') {
    $kelas2 = 'Semua Kelas';
} else {
    $kelas2 = get_kelas($db, $kelas, 'kelas');
}

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(15, 5, 'Kelas', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
$pdf->Cell(10, 5, $kelas2, 0, 1, 'L');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(15, 5, 'Tahun', 0, 0, 'L');
$pdf->Cell(5, 5, ':', 0, 0, 'L');
if ($regis == '0') {
    $pdf->Cell(10, 5, ' ', 0, 0, 'L');
    $pdf->Cell(3, 5, '/', 0, 0, 'L');
    $pdf->Cell(5, 5, ' ', 0, 1, 'L');
} else {
    $pdf->Cell(10, 5, get_akademik($db, $regis, 'semester'), 0, 0, 'L');
    $pdf->Cell(3, 5, '/', 0, 0, 'L');
    $pdf->Cell(5, 5, get_akademik($db, $regis, 'tahun'), 0, 1, 'L');
}

$pdf->SetFont('Times', '', 10);
$pdf->Cell(200, 5, '', 0, 0, '');
$pdf->Cell(25, 5, 'Tanggal Cetak: ', 0, 0, 'L');
$sekarang = date("d / m / Y");
$pdf->Cell(12, 6, $sekarang, 0, 1, '');

$pdf->SetFont('Times', '', 10);
$pdf->Cell(20, 5, '', 0, 0, '');
$pdf->Cell(10, 5, 'No', 1, 0, 'L');
$pdf->Cell(30, 5, 'ID_Murid', 1, 0, 'L');
$pdf->Cell(30, 5, 'ID Pelajaran', 1, 0, 'L');
$pdf->Cell(40, 5, 'Mata Pelajaran', 1, 0, 'L');
$pdf->Cell(30, 5, 'Nilai Pengetahuan', 1, 0, 'C');
$pdf->Cell(30, 5, 'Nilai Keterampilan', 1, 0, 'C');
$pdf->Cell(30, 5, 'Nilai Akhir', 1, 0, 'C');
$pdf->Cell(30, 5, 'Predikat', 1, 1, 'C');

$no = 1;

if ($kelas == '0') {
    $dt = get_allnilai($db);
} elseif ($kelas <> '0' and $regis <> '0') {
    $dt = get_allnilaiByKelasRegis($db, $kelas, $regis);
} else {
    $dt = get_allnilaikomplit($db, $kelas);
}
while ($data = mysqli_fetch_array($dt)) {
    $nilai = $data['pengetahuan'] + $data['keterampilan'];
    $nilaiakhir = $nilai / 2;
    if ($nilaiakhir > 80) {
        $na = "A";
    } else if ($nilaiakhir > 60) {
        $na = "B";
    } else if ($nilaiakhir > 40) {
        $na = "C";
    } else {
        $na = "D";
    }
    $pdf->Cell(20, 5, '', 0, 0, '');
    $pdf->Cell(10, 5, $no, 1, 0, 'L');
    $pdf->Cell(30, 5, $data['ID_Murid'], 1, 0, 'L');
    $pdf->Cell(30, 5, $data['ID_Pelajaran'], 1, 0, 'L');
    $pdf->Cell(40, 5, get_pelajaran($db, $data['ID_Pelajaran'], 'namapelajaran'), 1, 0, 'L');
    $pdf->Cell(30, 5, $data['pengetahuan'], 1, 0, 'L');
    $pdf->Cell(30, 5, $data['keterampilan'], 1, 0, 'L');
    $pdf->Cell(30, 5, $nilai / 2, 1, 0, 'L');
    $pdf->Cell(30, 5, $na, 1, 1, 'L');
    // $pdf->Cell(30,5, get_murid2($db, $data['Nama_Murid'], 'id'),1,0,'L');
    // $pdf->Cell(30,5,$data['Nama_Murid'],1,0,'L');
    // $pdf->Cell(50,5,get_pelajaran2($db, $data['Nama_Pelajaran'], 'namapelajaran'),1,0,'L');
    // $pdf->Cell(25,5,$data['Tanggal'],1,0,'C');
    // $pdf->Cell(25,5,$data['Status'],1,0,'C');

    $pdf->SetFont('Times', '', 10);
    $no++;
}

$pdf->Output();
