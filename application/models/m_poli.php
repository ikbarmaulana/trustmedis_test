<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_poli extends CI_Model
{
    private $table = 'poli';

    public function rules()
    {
        return [
            [
                'field' => 'nama',  
                'label' => 'nama',  
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function getJadwalFull()
    {
        $this->db->select('poli.id, poli.nama as poli, pegawai.nama as pegawai, hari.nama as hari, hari.id as id_hari, jadwal_dokter.id_hari as id_hari_jadwal, jam_mulai, jam_berakhir');
        $this->db->from($this->table);
        $this->db->join('pegawai', 'pegawai.id_poli = poli.id');        
        $this->db->join('jadwal_dokter', 'jadwal_dokter.id_pegawai = pegawai.id', 'left');       
        $this->db->join('hari', 'jadwal_dokter.id_hari = hari.id', 'left');       
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}