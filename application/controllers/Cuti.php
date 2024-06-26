<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Cuti extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Cuti_model', 'cuti');
		$this->load->model('Karyawan_model', 'karyawan');
		$this->load->model('Jam_model', 'jam');
		$this->load->helper('Tanggal');
	}
	public function index()
	{
        $id_user = $this->session->id_user;
		if (is_role('Karyawan')) {
            $data['cuti'] = $this->cuti->find_cuti('cuti.id_user',$id_user);
			$this->template->load('template','cuti/cutiadmin', $data);


		} else {
            $data['cuti'] = $this->cuti->get_cuti();
			$this->template->load('template','cuti/cutiadmin', $data);

		}
	}
	public function tambahcuti()
	{
		$data['users'] = $this->karyawan->get_all();
		$this->template->load('template','cuti/cutikaryawan', $data);
	}
    public function editcuti()
    {
        $post = $this->input->post();
		$data = [
			'tanggal_cuti' => $post['tanggal_cuti'],
			'id_user' => $post['id_user'],
			'alasan' => $post['status'],
			'status' => $post['status'],
		];

		if ($post['password'] !== '') {
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		}

		$result = $this->karyawan->update_data($post['id_user'], $data);
		if ($result) {
			$response = [
				'status' => 'success',
				'message' => 'Data Karyawan berhasil diubah!'
			];
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Data Karyawan gagal diubah!'
			];
		}
    }

    public function inputcuti() 
    {
		$post = $this->input->post();
		$id_cuti = $this->karyawan->count_id(date('ym'),'cuti','id_cuti') ;
			
        if (is_role('Karyawan')) {
			$data = [
				'id_cuti' => 'CT'.date('ym').$id_cuti,
				'tanggal_cuti' => $post['tanggal_cuti'],
				'alasan' => $post['alasan'],
				'tipe' => $post['tipe'],
				'id_user' => $this->session->id_user,
				'status' => 'off',
			];

        } else {
			$data = [
				'id_cuti' => 'CT'.date('ym').$id_cuti,
				'tanggal_cuti' => $post['tanggal_cuti'],
				'alasan' => $post['alasan'],
				'tipe' => $post['tipe'],
				'status' => 'on',
				'id_user' => $post['id_user'],
			];
        }
		$result = $this->cuti->insert_data($data);
		if ($result) {
			$this->session->set_flashdata('response', [
				'status' => 'success',
				'message' => 'Jadwal tercatat'
			]);
		} else {
			$this->session->set_flashdata('response', [
				'status' => 'error',
				'message' => 'Jadwal gagal tercatat'
			]);
		}
		redirect('cuti');
    }
	public function togglecuti()
	{
		$post = $this->input->post();
		$newStatus = ($post['status'] == 'on') ? 'off' : 'on';


    	$data = [
        	'status' => $newStatus,
    	];
	
		$result = $this->cuti->update_cuti($post['id_cuti'], $data);

		if ($result) {
			$this->session->set_flashdata('response', [
				'status' => 'success',
				'message' => 'Status berhasil diubah!'
			]);
		} else {
			$this->session->set_flashdata('response', [
				'status' => 'error',
				'message' => 'Status gagal diubah!'
			]);
		}
		redirect('cuti');
	}
	
}
