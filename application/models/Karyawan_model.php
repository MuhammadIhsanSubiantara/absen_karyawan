<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Karyawan_model extends CI_Model
{
	public function get_all()
	{
		$this->db->where('role', 'Karyawan');
		$result = $this->db->get('users');
		return $result->result();
	}

	public function find($id)
	{
		$this->db->where('id_user', $id);
		$result = $this->db->get('users');
		return $result->row();
	}
	public function get_field($field)
	{
		$this->db->select($field);
		$result = $this->db->get('users');
		return $result->row();
	}

	public function insert_data($data)
	{
		$result = $this->db->insert('users', $data);
		return $result;
	}

	public function update_data($id, $data)
	{
		$this->db->where('id_user', $id);
		$result = $this->db->update('users', $data);
		return $result;
	}

	public function delete_data($id)
	{
		$this->db->where('id_user', $id);
		$result = $this->db->delete('users');
		return $result;
	}
	public function count_id($date,$table,$field)
	{
		$this->db->select('count(*) as total');
		$this->db->from($table);
		$this->db->like($field, $date, '%');
		$digit = $this->db->get()->row();
		$result = str_pad($digit->total+1, 2, '0', STR_PAD_LEFT);
        return $result;
	}
	
}