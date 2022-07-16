<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            redirect('back/Auth', 'refresh');
        }
        $this->load->model('Mod_post', 'post');
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Postingan',
            'page'              => 'post/index',
            'footer'            => 'LukmanSoft',
            'dataPostingan'     => $this->post->getDataPost()->result(),
            'user'              => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
            'photo'             => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
        );

        $this->load->view('superadmin/main', $data);
    }

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->post->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('idsubcategory', 'Nama Sub Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('posttitle', 'Judul Postingan', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('content', 'Konten', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input Postingan',
                'page'          => 'post/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url("index.php/superadminnn/Post/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'idsubcategory'         => $this->input->post('idsubcategory', true),
                'posttitle'             => $this->input->post('posttitle', true),
                'slugpost'              => slugify($this->input->post('posttitle', true)),
                'content'               => $this->input->post('content', true),
                'iduser'                => $this->input->post('iduser', true),
                'idcategory'            => $this->input->post('idcategory', true),
                'is_active'             => 'Y',
                'tglpost'               => date('Y-m-d')
            ];

            if (!empty($_FILES['photo']['name'])){
                $imageName = url_title($data['posttitle'], '-', true) . '-' . date('YmdHis');
                $upload = $this->post->uploadImage($imageName);
                $this->_create_thumbs($upload);
                $data['photo']  = $upload;
            }

            $this->post->insert($data);
            $this->session->set_flashdata('success', 'Postingan Berhasil Ditambahkan.');

            redirect(base_url('index.php/superadminnn/Post'));
        }
    }

    public function Update($id)
    {
        if(!$_POST) {
            $input = (object) $this->post->getDataById($id);
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('idsubcategory', 'Nama Sub Kategori', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('posttitle', 'Judul Postingan', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('content', 'Konten', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Edit Postingan',
                'page'          => 'post/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url('index.php/superadminnn/Post/Update/' . $id),
                'input'         => $input,
                'user'          => $this->admin->mengambil('users',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('users',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('superadmin/main', $data);
        } else {
            $data = [
                'idsubcategory'         => $this->input->post('idsubcategory', true),
                'posttitle'             => $this->input->post('posttitle', true),
                'slugpost'              => slugify($this->input->post('posttitle', true)),
                'content'               => $this->input->post('content', true),
                'iduser'                => $this->input->post('iduser', true),
                'idcategory'            => $this->input->post('idcategory', true),
                'is_active'             => 'Y',
                'tglpost'               => date('Y-m-d')
            ];

            if (!empty($_FILES['photo']['name'])) {
                $imageName = url_title($data['posttitle'], '-', true) . '-' . date('YmdHis');
                $upload = $this->post->uploadImage($imageName);
                $this->_create_thumbs($upload);

                if ($upload) {
                    $post = $this->post->getDataById($id);

                    if (file_exists('__assets/img/postingan/' . $post->photo) && $post->photo) {
                        unlink('__assets/img/postingan/' . $post->photo);
                        unlink('__assets/img/postingan/thumbs/' . $post->photo);
                    }

                    $data['photo'] = $upload;
                } else {
                    redirect(base_url("index.php/superadminnn/Post/Update/$id"));
                }
            }

            $this->post->update($id, $data);
            $this->session->set_flashdata('success', 'Postingan Berhasil Diupdate.');

            redirect(base_url('index.php/superadminnn/Post'));
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id_hapus', true);
        $post = $this->post->getDataById($id);

        if (file_exists('__assets/img/postingan/' . $post->photo) && $post->photo) {
            unlink('__assets/img/postingan/' . $post->photo);
            unlink('__assets/img/postingan/thumbs/' . $post->photo);
        }

        $this->post->delete($id);
        $this->session->set_flashdata('success', 'Postingan Berhasil dihapus');

        redirect(base_url('index.php/superadminnn/Post'));
    }

    public function _create_thumbs($file_name)
	{
		$config = [
			// Thumbnail Image
			[
				'image_library'	=> 'GD2',
				'source_image'		=> '__assets/img/postingan/' . $file_name,
				'maintain_ratio'	=> TRUE,
				'width'				=> 350,
				'height'		    => 200,
				'new_image'			=> '__assets/img/postingan/thumbs/' . $file_name
			]
		];

		$this->load->library('image_lib', $config[0]);

		foreach ($config as $item){
			$this->image_lib->initialize($item);

			if(!$this->image_lib->resize()){
				return false;
			}

			$this->image_lib->clear();
		}
	}

    public function Getid($postid=null)
    {
        $this->db->where('postid', $postid);
        $data=$this->db->get('post')->row();
        echo json_encode($data);
    }
}