<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdf extends CI_Controller {

   public function __construct()
   {
       parent::__construct();
       $this->load->model("M_pegawai");
       $this->load->model("M_poli");
       $this->load->model("M_jadwal");
       $this->load->model("M_hari");
   }

   function index()
   {
      $data["data_pegawai"] = $this->M_pegawai->getAll();
      $data["data_poli"] = $this->M_poli->getJadwalFull();
      $data["data_jadwal"] = $this->M_jadwal->getAll();
      $data["data_hari"] = $this->M_hari->getAll();
      $this->load->view('GeneratePdfView', $data);
      $this->load->library('pdf');
      $html = $this->load->view('GeneratePdfView', [], true, $data);
      $this->pdf->createPDF($html, 'mypdf', false);
   }
}
?>