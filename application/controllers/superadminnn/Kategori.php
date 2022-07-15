<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            redirect('back/Auth', 'refresh');
        }
        $this->load->model('Mod_kategori', 'kategori');
        $this->load->helper('ci_helper');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Kategori',
            'page'              => 'kategori/index',
            'footer'            => 'LukmanSoft',
            'dataKategori'      => $this->kategori->getDataKategori()->result(),
            'user'              => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
            'photo'             => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
        );

        $this->load->view('superadmin/main', $data);
    }

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->kategori->getDefaultValuesKategori();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('categoryname', 'Nama Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input Kategori',
                'page'          => 'kategori/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url("index.php/superadminnn/Kategori/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'categoryname'         => $this->input->post('categoryname', true),
                'slug'                 => slugify($this->input->post('categoryname', true)),
                'description'          => $this->input->post('description', true),
                'is_active'            => 'Y'
            ];

            $this->kategori->insertKategori($data);
            $this->session->set_flashdata('success', 'Data Kategori Berhasil Ditambahkan.');

            redirect(base_url('index.php/superadminnn/Kategori'));
        }
    }

    public function Update($id)
    {
        if(!$_POST) {
            $input = (object) $this->kategori->getDataByIdKategori($id);
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('categoryname', 'Nama Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Edit Kategori',
                'page'          => 'kategori/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url('index.php/superadminnn/Kategori/Update/' . $id),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'categoryname'         => $this->input->post('categoryname', true),
                'slug'                 => slugify($this->input->post('categoryname', true)),
                'description'          => $this->input->post('description', true),
                'is_active'            => 'Y'
            ];

            $this->kategori->updateKategori($id, $data);
            $this->session->set_flashdata('success', 'Kategori Berhasil Diupdate.');

            redirect(base_url('index.php/superadminnn/Kategori'));
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id_hapus', true);

        $this->kategori->deleteKategori($id);
        $this->session->set_flashdata('success', 'Kategori Berhasil dihapus');

        redirect(base_url('index.php/superadminnn/Kategori'));
    }

    public function Getid($categoryid=null)
    {
        $this->db->where('categoryid', $categoryid);
        $data=$this->db->get('category')->row();
        echo json_encode($data);
    }
}