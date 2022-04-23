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
        $members = $this->db->get_where('tb_scholarship', ['status' => 2])->num_rows();

        return ['users' => $users, 'members' => $members];
    }

    public function getUserlist(){
        $this->db->select('*');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where(['b.is_deleted' => 0, 'role' => 2]);
        return $this->db->get()->result();
    }

    public function getAnnouncementlist(){
        $this->db->select('*');
        $this->db->from('tb_announcement');
        $this->db->where(['is_deleted' => 0]);
        return $this->db->get()->result();
    }

    public function getDetailAnnouncement($id){
        $this->db->select('*');
        $this->db->from('tb_announcement');
        $this->db->where(['is_deleted' => 0, 'id' => $id]);
        return $this->db->get()->row();
    }

    public function getScholarlist(){
        $this->db->select('a.*, b.*, c.email, c.role, c.is_deleted, d.name, d.picture, d.gender');
        $this->db->from('tb_scholarship a');
        $this->db->join('tb_scholarship_file b', 'a.scholar_id = b.scholar_id');
        $this->db->join('tb_auth c', 'a.user_id = c.user_id');
        $this->db->join('tb_user d', 'a.user_id = d.user_id');
        $this->db->where(['c.is_deleted' => 0, 'c.role' => 2, 'status !=' => 2]);
        return $this->db->get()->result();
    }

    public function getScholarlistApproved(){
        $this->db->select('a.*, b.*, c.email, c.role, c.is_deleted, d.name, d.picture, d.gender');
        $this->db->from('tb_scholarship a');
        $this->db->join('tb_scholarship_file b', 'a.scholar_id = b.scholar_id');
        $this->db->join('tb_auth c', 'a.user_id = c.user_id');
        $this->db->join('tb_user d', 'a.user_id = d.user_id');
        $this->db->where(['c.is_deleted' => 0, 'c.role' => 2, 'status' => 2]);
        return $this->db->get()->result();
    }

    public function addAnnouncement()
    {
        $subject = $this->input->post('subject');
        $content = $this->input->post('content');
        $for_public = $this->input->post('for_public');
        $for_users = $this->input->post('for_users');
        $for_members = $this->input->post('for_members');

        $data = [
            'subject' => $subject,
            'content' => $content,
            'for_public' => $for_public,
            'for_users' => $for_users,
            'for_members' => $for_members,
            'created_by' => $this->session->userdata('user_id'),
            'created_at' => time()
        ];

        $this->db->insert('tb_announcement', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editAnnouncement()
    {
        $id = $this->input->post('id');
        $subject = $this->input->post('subject');
        $content = $this->input->post('content');
        $for_public = $this->input->post('for_public');
        $for_users = $this->input->post('for_users');
        $for_members = $this->input->post('for_members');

        $data = [
            'subject' => $subject,
            'content' => $content,
            'for_public' => $for_public,
            'for_users' => $for_users,
            'for_members' => $for_members,
            'modified_by' => $this->session->userdata('user_id'),
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_announcement', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteAnnouncement()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_announcement', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
