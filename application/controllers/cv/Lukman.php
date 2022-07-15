<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lukman extends CI_Controller
{
    public function index()
    {
        $data['title']          = 'CV-Lukman Aditiya Anggara';
        $data['footer']         = 'LukmanSoft';
        $data['page']           = 'lukman/index';

        $this->load->view('cv/main-cv', $data);
    }
}