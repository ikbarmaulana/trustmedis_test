<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    private $table = 'jadwal_dokter';

    public function rules()
    {
        return [
            [
                'field' => 'id_pegawai',
                'label' => 'Nama Pegawai',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_hari',
                'label' => 'Nama Hari',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jam_mulai',
                'label' => 'Jam Mulai',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'jam_berakhir',
                'label' => 'Jam Berakhir',
                'rules' => 'trim|required'
            ],
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function getAll()
    {
        $this->db->select('jadwal_dokter.id, pegawai.nama, hari.nama as hari, jam_mulai, jam_berakhir, poli.nama as poli');
        $this->db->from($this->table);
        $this->db->join('pegawai', 'jadwal_dokter.id_pegawai = pegawai.id');
        $this->db->join('hari', 'jadwal_dokter.id_hari = hari.id');
        $this->db->join('poli', 'pegawai.id_poli = poli.id');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $data = array(
            "id_pegawai" => $this->input->post('id_pegawai'),
            "id_hari" => $this->input->post('id_hari'),
            "jam_mulai" => $this->input->post('jam_mulai'),
            "jam_berakhir" => $this->input->post('jam_berakhir'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "id_pegawai" => $this->input->post('id_pegawai'),
            "id_hari" => $this->input->post('id_hari'),
            "jam_mulai" => $this->input->post('jam_mulai'),
            "jam_berakhir" => $this->input->post('jam_berakhir'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}