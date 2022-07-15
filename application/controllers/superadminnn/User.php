<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_user', 'user');
        if ($this->session->userdata('hak_akses') != '1') {
            redirect('back/Auth', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data User',
            'page'              => 'user/index',
            'footer'            => 'LukmanSoft',
            'dataUser'          => $this->user->getDataUser()->result(),
            'user'              => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
            'photo'             => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
        );

        $this->load->view('superadmin/main', $data);
    }

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->user->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('namauser', 'Nama User', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );
        $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]', [
            'required'  => "Mohon isi.!!"
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input User',
                'page'          => 'user/form',
                'footer'        => 'LukmanSoft',
                'dataakses'     => $this->user->AmbilAkses()->result(),
                'form_action'   => base_url("index.php/superadminnn/User/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $passwordhash=password_hash($this->input->post('password', true),PASSWORD_DEFAULT);
            $data = [
                'namauser'              => $this->input->post('namauser', true),
                'jeniskelamin'          => $this->input->post('jeniskelamin', true),
                'notelepon'             => $this->input->post('notelepon', true),
                'alamat'                => $this->input->post('alamat', true),
                'username'              => $this->input->post('username', true),
                'password'              => $passwordhash,
                'idakses'               => $this->input->post('akses', true)
            ];

            if (!empty($_FILES['photo']['name'])){
                $imageName = url_title($data['username'], true) . '-' . $data['namauser'];
                $upload = $this->user->uploadImage($imageName);
                $this->_create_thumbs($upload);
                $data['photo']  = $upload;
            }

            $this->user->insert($data);
            $this->session->set_flashdata('success', 'User Berhsil Ditambahkan.');

            redirect(base_url('index.php/superadminnn/User/index'));
        }
    }

    public function Update($id)
    {
        if(!$_POST) {
            $input = (object) $this->user->getDataById($id);
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('namauser', 'Nama User', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );
        $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]', [
            'required'  => "Mohon isi.!!"
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Edit User',
                'page'          => 'user/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url('index.php/superadminnn/User/Update/' . $id),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $passwordhash=password_hash($this->input->post('password', true),PASSWORD_DEFAULT);
            $data = [
                'namauser'              => $this->input->post('namauser', true),
                'jeniskelamin'          => $this->input->post('jeniskelamin', true),
                'notelepon'             => $this->input->post('notelepon', true),
                'alamat'                => $this->input->post('alamat', true),
                'username'              => $this->input->post('username', true),
                'password'              => $passwordhash,
                'idakses'               => $this->input->post('akses', true)
            ];

            if (!empty($_FILES['photo']['name'])) {
                $imageName = url_title($data['username'], '-', true) . '-' . $data['namauser'];
                $upload = $this->user->uploadImage($imageName);
                $this->_create_thumbs($upload);

                if ($upload) {
                    $user = $this->user->getDataById($id);

                    if (file_exists('__assets/img/user/' . $user->photo) && $user->photo) {
                        unlink('__assets/img/user/' . $user->photo);
                        unlink('__assets/img/user/thumbs/' . $user->photo);
                    }

                    $data['photo'] = $upload;
                } else {
                    redirect(base_url("index.php/superadminnn/User/Update/$id"));
                }
            }

            $this->user->update($id, $data);
            $this->session->set_flashdata('success', 'User Berhasil Diupdate.');

            redirect(base_url('index.php/superadminnn/User'));
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id_hapus', true);
        $user = $this->user->getDataById($id);

        if (file_exists('__assets/img/user/' . $user->photo) && $user->photo) {
            unlink('__assets/img/user/' . $user->photo);
            unlink('__assets/img/user/thumbs/' . $user->photo);
        }

        $this->user->delete($id);
        $this->session->set_flashdata('success', 'User Berhasil dihapus');

        redirect(base_url('index.php/superadminnn/User'));
    }

    public function _create_thumbs($file_name) 
    {
        $config = [
            // Thumbnail Image
            [
                'image_library'         => 'GD2',
                'source_image'          => './__assets/img/user/' . $file_name,
                'maintain_ratio'        => TRUE,
                'width'                 => 350,
                'height'                => 200,
                'new_image'             => './__assets/img/user/thumbs/' . $file_name
            ]
        ];

        $this->load->library('image_lib', $config[0]);

        foreach ($config as $item) {
            $this->image_lib->initialize($item);

            if (!$this->image_lib->resize()) {
                return false;
            }

            $this->image_lib->clear();
        }
    }

    public function Getid($userid=null)
    {
        $this->db->where('userid', $userid);
        $data=$this->db->get('users')->row();
        echo json_encode($data);
    }

}