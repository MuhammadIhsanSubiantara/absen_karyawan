<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Absensi_model extends CI_Model 
{
    public function get_absen($id_user, $bulan, $tahun)
    {
        $this->db->select(" DATE_FORMAT(a.tgl, '%d-%m-%Y') AS tgl, 
        MIN(CASE WHEN a.keterangan = 'Masuk' THEN a.waktu ELSE NULL END) AS jam_masuk,
        MAX(CASE WHEN a.keterangan = 'Pulang' THEN a.waktu ELSE NULL END) AS jam_pulang");
        $this->db->where('id_user', $id_user);
        $this->db->where("DATE_FORMAT(tgl, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tgl, '%Y') = ", $tahun);
        $this->db->group_by("tgl");
        $result = $this->db->get('absensi a');
        return $result->result_array();
    }

    public function absen_harian_user($id_user)
    {
        $today = date('Y-m-d');
        $this->db->where('tgl', $today);
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('absensi');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('absensi', $data);
        return $result;
    }

    public function get_jam_by_time($time)
    {
        $this->db->where('start', $time, '<=');
        $this->db->or_where('finish', $time, '>=');
        $data = $this->db->get('jam');
        return $data->row();
    }
    public function count($id_user, $bulan)
    {
        $this->db->select('count(*) as total_absen');
        $this->db->from('absensi');
        $this->db->where('id_user', $id_user);
        $this->db->where("MONTH(tgl) = MONTH (2024-5-11)");
        $this->db->where("YEAR(tgl) = YEAR (2024-5-11)");
        $result = $this->db->get()->row();
        return $result ? $result->total_absen : 0;
    }

    public function hitung_absen($id_user, $bulan, $tahun){
        $this->db->select('COUNT(*) as total_absen');
        $this->db->from('absensi');
        $this->db->where('id_user', $id_user);
        $this->db->where('keterangan', "Masuk");
        $this->db->where('YEAR(tgl)', $tahun);
        $this->db->where('MONTH(tgl)', $bulan);
        
        $query = $this->db->get()->row_array();
        return $query;
    }
}

