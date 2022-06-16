<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_poli");
    }

    public function index()
    {

        $data["title"] = "List Data Poli";
        $data["data_poli"] = $this->M_poli->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('poli/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $poli = $this->M_poli; 
        $validation = $this->form_validation;
        $validation->set_rules($poli->rules()); 

        if ($validation->run()) {
            $poli->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Poli berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("poli");
        }
        $data["title"] = "Tambah Data Poli";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('poli/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('poli');

        $poli = $this->M_poli;
        $validation = $this->form_validation;
        $validation->set_rules($poli->rules());

        if ($validation->run()) {
            $poli->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Poli berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("poli");
        }
        $data["title"] = "Edit Data Poli";
        $data["data_poli"] = $poli->getById($id);
        if (!$data["data_poli"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('poli/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->M_poli->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Poli berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}