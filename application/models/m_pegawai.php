<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    private $table = 'pegawai';

    public function rules()
    {
        return [
            [
                'field' => 'nama',  
                'label' => 'nama', 
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_poli',
                'label' => 'Nama Poli',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)
    {
        $this->db->select('pegawai.id, pegawai.nama, pegawai.id_poli, poli.nama as poli');
        $this->db->join('poli', 'pegawai.id_poli = poli.id');
        $query = $this->db->get_where($this->table, ["pegawai.id" => $id]);
        return $query->row();
    }

    public function getAll()
    {
        $this->db->select('pegawai.id, pegawai.nama, pegawai.id_poli, poli.nama as poli');
        $this->db->from($this->table);
        $this->db->join('poli', 'pegawai.id_poli = poli.id');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "id_poli" => $this->input->post('id_poli'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "id_poli" => $this->input->post('id_poli'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}