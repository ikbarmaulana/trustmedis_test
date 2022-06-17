<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_jadwal");
        $this->load->model("M_pegawai");
        $this->load->model("M_hari");
    }

    public function index()
    {
        $data["title"] = "List Data Jadwal Dokter";
        $data["data_jadwal"] = $this->M_jadwal->getAll();
        // $data["data_poli"] = $this->M_pegawai->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('jadwal/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $jadwal = $this->M_jadwal; 
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules()); 

        if ($validation->run()) {
            $jadwal->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pegawai berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("jadwal");
        }
        $data["title"] = "Tambah Data Jadwal Dokter";
        $data["data_pegawai"] = $this->M_pegawai->getAll();
        $data["data_hari"] = $this->M_hari->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('jadwal/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('jadwal');

        $jadwal = $this->M_jadwal;
        $hari = $this->M_hari;
        $pegawai = $this->M_pegawai;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pegawai berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("jadwal");
        }
        $data["title"] = "Edit Data Pegawai";
        $data["data_jadwal"] = $jadwal->getById($id);
        $data["data_pegawai"] = $pegawai->getAll();
        $data["data_hari"] = $hari->getAll();
        if (!$data["data_pegawai"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('jadwal/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->M_jadwal->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Pegawai berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }

    // public function get_data_poli(){
    //     $poli = $this->M_pegawai;
    //     $data_poli['data_poli'] = $poli->get_poli();
    //     $this->load->view('pegawai/add' , $data_poli);
    // }
}