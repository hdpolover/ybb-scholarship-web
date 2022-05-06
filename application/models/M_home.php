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

    // home
    function get_homeSection($key){
        $query =  $this->db->get_where('tb_home', ['key' => $key, 'is_deleted' => 0]);
        if($query->num_rows() <= 0):
            return false;
        elseif($query->num_rows() > 1 || $key == 'hero'):
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
