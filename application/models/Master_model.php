<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function getProduk()
    {
        $query = "SELECT * 
                  FROM `produk`
                 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPenjual()
    {
        $query = "SELECT * 
                  FROM `penjual`
                 
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPembeli()
    {
        $query = $this->db->get('pembeli');
        return $query->result();
    }
    function insertPembeli($data)
    {
        $this->db->insert('pembeli', $data);
    }
    function geteditPembeli($pembeli_id)
    {
        $this->db->where('id', $pembeli_id);
        $query = $this->db->get('pembeli');
        return $query->row();
    }
    function editPembeli($pembeli_id, $data)
    {
        $this->db->where('id', $pembeli_id);
        $this->db->update('pembeli', $data);
    }
    function deletePembeli($pembeli_id)
    {
        $this->db->where('id', $pembeli_id);
        $this->db->delete('pembeli');
    }
}
