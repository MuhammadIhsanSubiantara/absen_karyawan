<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Gaji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Gaji_model', 'gaji');
        $this->load->model('Absensi_model', 'absen');
        #$this->load->model('Cuti_model', 'cuti');
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->model('Jam_model', 'jam');
        $this->load->helper('Tanggal');
    }
    public function index()
    {
        if (is_role('Admin')) {
            $data['karyawan'] = $this->karyawan->get_all();
            return $this->template->load('template', 'gaji/list_karyawan', $data);
            // $id_user = $this->session->id_user;
            // if (is_role('Karyawan')) {
            //     $id_user = $this->session->id_user;
            //     $data['user'] = $this->user->find_by('id_user', $id_user, true);
            // 	$this->template->load('template','gaji/gajiadmin', $data);

            // } else {
            //     $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('M');
            //     $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');

            //     $data['gaji'] = $this->gaji->get_gaji();
            //     $data['all_bulan'] = bulan();
            //     $data['bulan'] = $bulan;
            //     $data['tahun'] = $tahun;
            //	$this->template->load('template','gaji/gajiadmin', $data);
        } else {
            $id_user = $this->session->id_user;
            $data['tahun'] = null;

            $data['karyawan'] = $this->karyawan->find($id_user);
            if ($this->input->get('tahun')) {
                $tahun = $this->input->get('tahun');
                $data['tahun'] = $this->input->get('tahun');
                $data['gaji'] = $this->gaji->get_where_year($id_user, $tahun);
            } else {
                $data['gaji'] = $this->gaji->get_where($id_user);
            }

            $data['karyawan'] = $this->karyawan->find($id_user);
            return $this->template->load('template', 'gaji/list_gaji', $data);
        }


    }

    public function detail_gaji($id_user)
    {
        $data['tahun'] = null;

        $data['karyawan'] = $this->karyawan->find($id_user);
        if ($this->input->get('tahun')) {
            $tahun = $this->input->get('tahun');
            $data['tahun'] = $this->input->get('tahun');
            $data['gaji'] = $this->gaji->get_where_year($id_user, $tahun);
        } else {
            $data['gaji'] = $this->gaji->get_where($id_user);
        }
        $this->template->load('template', 'gaji/list_gaji', $data);
    }

    public function set_gaji($id_user)
    {
        $data['karyawan'] = $this->karyawan->find($id_user);
        $this->template->load('template', 'gaji/create', $data);
    }

    public function store()
    {
        $post = $this->input->post();
        $id_gaji = $this->karyawan->count_id(date('ym'), 'gaji', 'id_gaji');
        $data = [
            'id_gaji' => 'GJ' . date('ym') . $id_gaji,
            'id_user' => $post['id_user'],
            'gaji_pokok' => $post['gaji_pokok'],
            'gaji_sekunder' => $post['gaji_sekunder'],
            'total_absen' => $post['total_absen'],
            'bonus' => $post['bonus'],
            'total_gaji' => $post['total_gaji'],
            'bulan' => $post['bulan'],
            'tahun' => $post['tahun'],
        ];

        $result = $this->gaji->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Gaji telah ditambahkan!'
            ];
            $redirect = 'gaji/detail_gaji/' . $data['id_user'];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gaji gagal ditambahkan'
            ];
            $redirect = 'gaji/set_gaji/' . $data['id_user'];
        }

        $this->session->set_flashdata('response', $response);
        redirect($redirect);
    }

    public function penggajian()
    {
        $id_user = $this->session->id_user;
        $data['user'] = $this->user->find_by('id_user', $id_user, true);
        $this->template->load('template', 'gaji/penggajian', $data);
    }
    public function detail()
    {
        $post = $this->input->post();
        $id_gaji = $post['id_gaji'];

        $data['absen'] = $this->absen->count($post['id_user'], $post['bulan'], true);
        $data['gaji'] = $this->gaji->find_by('id_gaji', $post['id_gaji'], true);
        $this->template->load('template', 'gaji/gajidetail', $data);
    }
    public function pdf_list()
    {
        if (is_role('Admin')) {
            $data['gaji'] = $this->gaji->get_where($this->uri->segment(3));
            $sroot = $_SERVER['DOCUMENT_ROOT'];
            include $sroot . "/absen_karyawan/application/third_party/dompdf/autoload.inc.php";
            $dompdf = new Dompdf\Dompdf();
            $this->load->view('gaji/pdf_list', $data);
            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $dompdf->set_paper($paper_size, $orientation);
            $dompdf->load_html($html);
            $dompdf->render();
            $dompdf->stream("list_gaji_".$this->session->nama.".pdf", array('Attachment' => 0));

        } else {
            $data['karyawan'] = $this->karyawan->find($this->session->id_user);
            $sroot = $_SERVER['DOCUMENT_ROOT'];
            include $sroot . "/absen_karyawan/application/third_party/dompdf/autoload.inc.php";
            $dompdf = new Dompdf\Dompdf();
            $this->load->view('gaji/pdf_list', $data);
            $paper_size = 'A4';
            $orientation = 'landscape';
            $html = $this->output->get_output();
            $dompdf->set_paper($paper_size, $orientation);
            $dompdf->load_html($html);
            $dompdf->render();
            $dompdf->stream("list_gaji_".$this->session->nama.".pdf", array('Attachment' => 0));
        }
    }
}