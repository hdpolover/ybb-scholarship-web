<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // global
    function get_settingsValue($key){
        return $this->db->get_where('tb_settings', ['key' => $key])->row()->value;
    }

    function get_statistik(){
        $total_pendaftar = $this->db->get_where('tb_auth', ['role' => 2])->num_rows();
        $total_seleksi = $this->db->get_where('tb_scholarship', ['status' => 1])->num_rows();
        $total_member = $this->db->get_where('tb_scholarship', ['status' => 2])->num_rows();

        $arr = [
            'total' => $total_pendaftar,
            'seleksi' => $total_seleksi+$total_member,
            'member' => $total_member
        ];

        return $arr;
    }

    public function getAnnouncementHome(){
        $this->db->select('*');
        $this->db->from('tb_announcement');
        $this->db->where(['for_public' => 'public', 'is_deleted' => 0]);
        return $this->db->get()->result();
    }

    // home
    function get_homeSection($key){
        $query =  $this->db->get_where('tb_home', ['key' => $key, 'is_deleted' => 0]);
        if($query->num_rows() <= 0):
            return false;
        elseif($query->num_rows() > 1 || $key == 'hero' || $key == 'gallery' || $key == 'benefit'):
            return $query->result();
        else:
            return $query->row()->value;
        endif;
    }

    // about
    function get_aboutGallery(){
        return $this->db->get_where('tb_about_gallery', ['is_deleted' => 0])->result();
    }

    // faq
    function get_faqContent()
    {
        return $this->db->get_where('tb_faq', ['draft' => 0, 'is_deleted' => 0])->result();
    }

    // other programs
    function get_otherProgramsContent(){
        return $this->db->get_where('tb_other_program', ['draft' => 0, 'is_deleted' => 0])->result();
    }
}
