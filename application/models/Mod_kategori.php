<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_kategori extends CI_Model
{
    public function getDataKategori()
    {
        // return $this->db->get('category');
        $eksekusi = $this->db->query("SELECT category.*, count(post.postid) as jumlah_postingan from category left join post on category.categoryid=post.idcategory GROUP BY(category.categoryid)");
        return $eksekusi;
    }

    public function getDefaultValuesKategori()
    {
        return [
            'categoryname'      => '',
            'description'       => '',
            'is_active'         => ''
        ];
    }

    public function insertKategori($data)
    {
        $this->db->insert('category', $data);
    }

    public function getDataByIdKategori($id)
    {
        return $this->db->get_where('category', ['categoryid' => $id])->row();
    }

    public function updateKategori($id, $data)
    {
        $this->db->update('category', $data, ['categoryid' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteKategori($id)
    {
        $this->db->where('categoryid', $id);
        $this->db->delete('category');
    }

    public function getDataSubKategori()
    {
        // return $this->db->get('subcategory');
        $this->db->select('subcategory.*, category.categoryname');
        $this->db->from('subcategory');
        $this->db->join('category', 'subcategory.idcategory=category.categoryid', 'left');
        return $this->db->get();
    }

    public function getDefaultValuesSubKategori()
    {
        return [
            'idcategory'        => '',
            'namesubcategory'   => '',
            'slugcategory'      => '',
            'description'       => '',
            'is_active'         => ''
        ];
    }

    public function insertSubKategori($data)
    {
        $this->db->insert('subcategory', $data);
    }

    public function getDataByIdSubKategori($id)
    {
        return $this->db->get_where('subcategory', ['subcategoryid' => $id])->row();
    }

    public function updateSubKategori($id, $data)
    {
        $this->db->update('subcategory', $data, ['subcategoryid' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteSubKategori($id)
    {
        $this->db->where('subcategoryid', $id);
        $this->db->delete('subcategory');
    }
}