<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_post extends CI_Model
{
    public function getDataPost()
    {
        // return $this->db->get('post');
        $this->db->select('*');
        $this->db->from('post');
        $this->db->join('category', 'post.idcategory=category.categoryid', 'left');
        return $this->db->get();
    }

    public function getDefaultValues()
    {
        return [
            'idsubcategory'     => '',
            'posttitle'         => '',
            'slugpost'          => '',
            'content'           => '',
            'is_active'         => '',
            'photo'             => '',
            'idcategory'        => '',
            'tglpost'           => ''
        ];
    }

    public function uploadImage($imageName)
    {
        $config = [
            'upload_path'           => './__assets/img/postingan',
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
        $this->db->insert('post', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('post', ['postid' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->update('post', $data, ['postid' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('postid', $id);
        $this->db->delete('post');
    }
}