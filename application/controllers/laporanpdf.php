<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LOGBOOK KEGIATAN PETUGAS',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'Nama',1,0);
        $pdf->Cell(25,6,'TANGGAL',1,0);
        $pdf->Cell(20,6,'SHIFT',1,0);
        $pdf->Cell(100,6,'INVENTARIS',1,1);
        $pdf->SetFont('Arial','',10);
        $data = $this->db->get('laporan')->result();
        foreach ($data as $row){
            $pdf->Cell(40,6,$row->nama,1,0);
            $pdf->Cell(25,6,$row->tanggal,1,0);
            $pdf->Cell(20,6,$row->shift,1,0);
            $pdf->Cell(100,6,$row->inventaris,1,1); 
        }
        $pdf->Output();
    }
}