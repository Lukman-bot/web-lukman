<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('hak_akses') == '1') {
            redirect(base_url('index.php/back/Auth', 'refresh'));
        }
        $this->validasi();
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Login Page';
            $this->load->view('auth/login', $data);
        } else {
            $this->db->where('username', $this->input->post('username', TRUE));
            $query = $this->db->get('users');
            if ($query->row_array() > 0) {
                foreach ($query->result() as $k) {
                    if (password_verify($this->input->post('password', TRUE), $k->password)) {
                        $session_data = array(
                            'userid'        => $k->userid,
                            'username'      => $k->username, 
                            'namauser'      => $k->namauser,
                            'hak_akses'     => $k->idakses,
                            'photo'         => $k->photo,
                            'created_at'    => $k->created_at
                        );
                        $this->session->set_userdata($session_data);

                        if ($session_data['hak_akses'] == '1') {
                            redirect(base_url('index.php/superadminnn/Home'));
                        } else if ($session_data['hak_akses'] == '2') {
                            redirect(base_url('index.php/adminnn/Home'));
                        }

                        // redirect('Admin/Admin');
                    } else {
                        $this->session->set_flashdata('pesan', 'Password yang anda masukkan tidak sesuai, silahkan cek kembali');
                        $data['title']      = 'Login Page';
                        $this->load->view('auth/login', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', 'User yang anda cari tidak ditemukan.!');
                $data['title']      = 'Login Page';
                $this->load->view('auth/login', $data);
            }
        }
    }

    public function validasi()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('back/Auth', 'refresh');
        die();
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */