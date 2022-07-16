<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_post', 'post');
    }

    public function index()
    {
        $data['title']          = 'Beranda';
        $data['footer']         = 'LukmanSoft';
        $data['page']           = 'dashboard/index';
        $data['post']           = $this->post->getPost();

        $this->load->view('user/main', $data);
    }
}