<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function countDashboard(){
        $users = $this->db->get_where('tb_auth', ['active' => 1])->num_rows();
        $members = $this->db->get_where('tb_auth', ['active' => 1])->num_rows();

        return ['users' => $users, 'members' => $members];
    }

    public function getUserlist(){
        $this->db->select('*');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where(['b.is_deleted' => 0, 'role' => 2]);
        return $this->db->get()->result();
    }

    public function getScholarlist(){
        $this->db->select('a.*, b.*, c.email, c.role, c.is_deleted, d.name, d.picture');
        $this->db->from('tb_scholarship a');
        $this->db->join('tb_scholarship_file b', 'a.scholar_id = b.scholar_id');
        $this->db->join('tb_auth c', 'a.user_id = c.user_id');
        $this->db->join('tb_user d', 'a.user_id = d.user_id');
        $this->db->where(['c.is_deleted' => 0, 'c.role' => 2]);
        return $this->db->get()->result();
    }
}
