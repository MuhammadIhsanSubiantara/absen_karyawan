<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Cuti_model extends CI_Model 
{
    public function get_cuti()
    {
        $this->db->join('users','users.id_user = cuti.id_user');
        $this->db->order_by('tanggal_cuti','desc');
        $result = $this->db->get('cuti');
        return $result->result();
    }
    public function find_cuti($field, $value, $return = FALSE)
    {
        $this->db->join('users','users.id_user = cuti.id_user');
        $this->db->where('cuti.id_user', $value ,'or 0');
        $this->db->select('nama, id_cuti, tanggal_cuti, cuti.id_user, alasan, status, tipe');
        $this->db->order_by('tanggal_cuti','desc');
        $result = $this->db->get('cuti');
        return $result->result();
    }
    public function insert_data($data)
	{
		$result = $this->db->insert('cuti', $data);
		return $result;
	}
    public function update_cuti($id, $data)
	{
		$this->db->where('id_cuti', $id);
		$result = $this->db->update('cuti', $data);
		return $result;
	}
}