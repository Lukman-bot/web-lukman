<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubKategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            redirect('back/Auth', 'refresh');
        }
        $this->load->model('Mod_kategori', 'kategori');
    }

    public function index()
    {
        $data = array(
            'title'                 => 'Data Sub Kategori',
            'page'                  => 'sub-kategori/index',
            'footer'                => 'LukmanSoft',
            'dataSubKategori'       => $this->kategori->getDataSubKategori()->result(),
            'user'                  => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
            'photo'                 => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
        );

        $this->load->view('superadmin/main', $data);
    }

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->kategori->getDefaultValuesSubKategori();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('namesubcategory', 'Nama Sub Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input Sub Kategori',
                'page'          => 'sub-kategori/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url("index.php/superadminnn/SubKategori/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'idcategory'            => $this->input->post('idcategory', true),
                'namesubcategory'       => $this->input->post('namesubcategory', true),
                'slugcategory'          => slugify($this->input->post('namesubcategory', true)),
                'description'           => $this->input->post('description', true),
                'is_active'             => 'Y'
            ];

            $this->kategori->insertSubKategori($data);
            $this->session->set_flashdata('success', 'Data Sub Kategori Berhasil Ditambahkan.');

            redirect(base_url('index.php/superadminnn/SubKategori'));
        }
    }

    public function Update($id)
    {
        if(!$_POST) {
            $input = (object) $this->kategori->getDataByIdSubKategori($id);
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('namesubcategory', 'Nama Sub Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Edit Sub Kategori',
                'page'          => 'sub-kategori/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url('index.phpsuperadminnn/SubKategori/Update/' . $id),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'idcategory'            => $this->input->post('idcategory', true),
                'namesubcategory'       => $this->input->post('namesubcategory', true),
                'slugcategory'          => slugify($this->input->post('namesubcategory', true)),
                'description'           => $this->input->post('description', true),
                'is_active'             => 'Y'
            ];

            $this->kategori->updateSubKategori($id, $data);
            $this->session->set_flashdata('success', 'Data Sub Kategori Berhasil Diupdate.');

            redirect(base_url('index.php/superadminnn/SubKategori'));
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id_hapus', true);

        $this->kategori->deleteSubKategori($id);
        $this->session->set_flashdata('success', 'Data Sub Kategori Berhasil dihapus');

        redirect(base_url('index.php/superadminnn/SubKategori'));
    }

    public function Getid($subcategoryid=null)
    {
        $this->db->where('subcategoryid', $subcategoryid);
        $data=$this->db->get('subcategory')->row();
        echo json_encode($data);
    }
}