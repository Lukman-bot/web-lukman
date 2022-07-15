<?php

class Mod_menu extends CI_Model {

    public function getMenu()
    {
        if ($this->session->userdata('hak_akses') == '1') {
            return $this->db->where('is_active', 'Y')->where('idakses', '1')->get('menu')->result();
        } else if ($this->session->userdata('hak_akses') == '2') {
            return $this->db->where('is_active', 'Y')->where('idakses', '2')->get('menu')->result();
        } else {
            return $this->db->where('is_active', 'Y')->get('menu')->result();
        }
    }

    public function getSubmenu($id)
    {
        $this->db->select(['submenus.sub_title', 'submenus.sub_url', 'submenus.is_active']);
        $this->db->from('submenus');
        $this->db->join('menu', 'submenus.menuid = menu.id');
        $this->db->where('submenus.menuid', $id);
        $this->db->where('submenus.is_active', 'Y');
        return $this->db->get()->result();
    }

    public function getCategory()
    {
        return $this->db->where('is_active', 'Y')->get('category')->result();
    }

    public function getSubcategory($categoryid)
    {
        $this->db->select(['subcategory.namesubcategory', 'subcategory.slugcategory', 'subcategory.is_active']);
        $this->db->from('subcategory');
        $this->db->join('category', 'subcategory.idcategory=category.categoryid');
        $this->db->where('subcategory.idcategory', $categoryid);
        $this->db->where('subcategory.is_active', 'Y');
        return $this->db->get()->result();
    }
}