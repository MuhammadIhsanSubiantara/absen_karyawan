<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Gaji_model extends CI_Model 
{
    public function get_gaji(){
        $this->db->select("*");
        $this->db->from('gaji');
        $this->db->join("users", 'users.id_user = gaji.id_user');
        #$this->db->join("cuti", 'cuti.id_user = gaji.id_user');
        #$this->db->join("absensi", 'absensi.id_user = gaji.id_user');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_where($id_user){
        $this->db->select("*");
        $this->db->from('gaji');
        $this->db->where('id_user', $id_user);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function get_where_year($id_user, $tahun){
        $this->db->select("*");
        $this->db->from('gaji');
        $this->db->where('id_user', $id_user);
        $this->db->where('tahun', $tahun);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function find_by($field, $value, $return = FALSE)
    {
        $this->db->select("*");
        $this->db->from('gaji');
        $this->db->join("users", 'gaji.id_user = users.id_user');
        #$this->db->join("cuti", 'cuti.id_user = gaji.id_user');
        #$this->db->join("absensi", 'absensi.id_user = gaji.id_user');
        $this->db->where($field, $value);
        #$this->db->order_by('bulan','desc');
        $result = $this->db->get();
        return $result->result();
    }
    public function find_by_date($table, $start, $end, $return = false)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where('tanggal >=',$start);
        $this->db->where('tanggal <=',$end);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function insert_data($data)
	{
		$result = $this->db->insert('gaji', $data);
		return $result;
	}
    public function update_cuti($id, $data)
	{
		$this->db->where('id_cuti', $id);
		$result = $this->db->update('cuti', $data);
		return $result;
	}
    

    
}