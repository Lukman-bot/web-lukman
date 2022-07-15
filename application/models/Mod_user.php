<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model
{
    public function getDataUser()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('akses','users.idakses=akses.aksesid');
        return $this->db->get();
    }

    public function getDefaultValues()
    {
        return [
            'namauser'          => '',
            'jeniskelamin'      => '',
            'notelepon'         => '',
            'alamat'            => '',
            'username'          => '',
            'password'          => '',
            'idakses'           => '',
            'photo'             => ''
        ];
    }

    public function uploadImage($imageName)
    {
        $config = [
            'upload_path'           => './__assets/img/user',
            'file_name'             => $imageName,
            'allowed_types'         => 'jpg|jpeg|png|JPG|PNG',
            'max_size'              => 3000,
            'max_width'             => 0,
            'max_height'            => 0,
            'overwrite'             => TRUE,
            'file_ext_tollower'     => TRUE
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('image_error', 'Jenis file yang diupload tidak diizinkan atau file terlalu besar.');
            return false;
        }

    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('users', ['userid' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->update('users', $data, ['userid' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('userid', $id);
        $this->db->delete('users');
    }

    public function AmbilAkses()
    {
        return $this->db->get('akses');
    }
}