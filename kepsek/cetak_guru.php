<?php 
    session_start();
    include('../config/cGuru.php');
    include('../config/koneksi.php');
    require('../fpdf181/fpdf.php');

    $pdf=new FPDF();
    $pdf->AddPage();


    $pdf->Cell(10,6,'',0,0,'');
    $pdf->Image('../assets/images/ngabang.jpeg', 20, 10, 15);

    $pdf->SetFont('Times','b',16);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,6,'',0,0,'');
    $pdf->Cell(67,6,'SMA NEGERI 1 NGABANG',0,1,'L');

    $pdf->SetFont('Times','',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(30,5,'',0,0,'');
    $pdf->Cell(67,5,'Jl. Veteran, Hilir Ktr.',0,1,'L');

    $pdf->SetFont('Times','',10);
    $pdf->Cell(30,5,'',0,0,'');
    $pdf->Cell(67,5,'Kec. Ngabang, Kabupaten Landak, Kalimantan Barat 79357',0,1,'L');

    $pdf->SetFont('Times','',10);
    $pdf->Cell(30,5,'',0,0,'');

    $pdf->ln(5);

    $pdf->SetFont('Times','',10);
    $pdf->Cell(135,5,'',0,0,'');
    $pdf->Cell(25,5,'Tanggal Cetak: ',0,0,'L');
    $sekarang = date("d / m / Y");
    $pdf->Cell(12,6,$sekarang,0,1,'');

    $pdf->SetFont('Times','',10);
    $pdf->Cell(10,5,'',0,0,'');
    $pdf->Cell(6,5,'No',1,0,'L');
    $pdf->Cell(15,5,'ID Guru',1,0,'L');
    $pdf->Cell(40,5,'Nama Guru',1,0,'L');
    $pdf->Cell(50,5,'Alamat',1,0,'C');
    $pdf->Cell(40,5,'Email',1,0,'C');
    $pdf->Cell(30,5,'Telp',1,1,'C');

    $dt = get_allguru($db);$no=1;
    while($data = mysqli_fetch_array($dt)){
        $pdf->Cell(10,5,'',0,0,'');
        $pdf->Cell(6,5,$no,1,0,'L');
        $pdf->Cell(15,5,$data['ID_Guru'],1,0,'L');
        $pdf->Cell(40,5,$data['Nama_Guru'],1,0,'L');
        $pdf->Cell(50,5,$data['Alamat_Guru'],1,0,'L');
        $pdf->Cell(40,5,$data['Gmail'],1,0,'L');
        $pdf->Cell(30,5,$data['Telp'],1,1,'L');
    $no++;
    }
    

    
    $pdf->Output();

    
?>