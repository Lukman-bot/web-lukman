<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            redirect('back/Auth', 'refresh');
        }
    }
    public function index()
    {
        $data['title']          = 'Beranda';
        $data['footer']         = 'LukmanSoft';
        $data['page']           = 'dashboard/index';
        $data['user']           = $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array();
        $data['photo']          = $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array();

        $this->load->view('superadmin/main', $data);
    }
}