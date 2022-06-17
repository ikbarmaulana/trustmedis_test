<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_hari extends CI_Model
{
    private $table = 'hari';

    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        return $query->result();
    }
}