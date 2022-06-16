<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pegawai");
        $this->load->model("M_poli");
    }

    public function index()
    {

        $data["title"] = "List Data Pegawai";
        $data["data_pegawai"] = $this->M_pegawai->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $pegawai = $this->M_pegawai; 
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules()); 

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pegawai berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("pegawai");
        }
        $data["title"] = "Tambah Data Pegawai";
        $data["data_poli"] = $this->M_poli->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pegawai/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('pegawai');

        $pegawai = $this->M_pegawai;
        $poli = $this->M_poli;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Pegawai berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("pegawai");
        }
        $data["title"] = "Edit Data Pegawai";
        $data["data_pegawai"] = $pegawai->getById($id);
        $data["data_poli"] = $poli->getAll();
        if (!$data["data_pegawai"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('pegawai/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->M_pegawai->delete($id);
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