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

    // credentials
    public function get_superAccount(){
        $this->db->select('*');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where(['b.is_deleted' => 0, 'role' => 0]);
        return $this->db->get()->result();
    }
    public function get_adminAccount(){
        $this->db->select('*');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where(['b.is_deleted' => 0, 'role' => 1]);
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

    // settings

    // faq

    public function addFaq()
    {
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');

        $data = [
            'question' => $question,
            'answer' => $answer,
            'created_at' => time()
        ];

        $this->db->insert('tb_faq', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editFaq()
    {
        $id = $this->input->post('id');
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');

        $data = [
            'question' => $question,
            'answer' => $answer,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_faq', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteFaq()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_faq', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // about

    public function addAboutGallery($filename)
    {

        $data = [
            'picture' => $filename,
            'created_at' => time()
        ];

        $this->db->insert('tb_about_gallery', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editAboutGallery($filename)
    {
        $id = $this->input->post('id');

        $data = [
            'picture' => $filename,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_about_gallery', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteAboutGallery()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_about_gallery', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // about
    function changeAboutContent(){
        $web_motto = $this->input->post('web_motto');
        $this->db->where('key', 'web_motto');
        $this->db->update('tb_settings', ['value' => $web_motto]);

        $web_about = $this->input->post('web_about');
        $this->db->where('key', 'web_about');
        $this->db->update('tb_settings', ['value' => $web_about]);

        return true;
    }

    // other program

    public function addOtherProgramContent($filename)
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');

        $data = [
            'title' => $title,
            'picture' => $filename,
            'desc' => $desc,
            'created_at' => time()
        ];

        $this->db->insert('tb_other_program', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editOtherProgramContent($filename)
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');

        $data = [
            'title' => $title,
            'picture' => $filename,
            'desc' => $desc,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_other_program', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteOtherProgramContent()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_other_program', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // about
    function changeOtherProgramContent($filename){

        if ($filename != false) {
            $this->db->where('key', 'op_bg');
            $this->db->update('tb_settings', ['value' => $filename]);
        }

        $op_desc = $this->input->post('op_desc');
        $this->db->where('key', 'op_desc');
        $this->db->update('tb_settings', ['value' => $op_desc]);

        return true;
    }

    // contribute
    function changeContribute(){
        $contribute_desc = $this->input->post('contribute_desc');
        $this->db->where('key', 'contribute_desc');
        $this->db->update('tb_settings', ['value' => $contribute_desc]);

        $contribute_an_rekening = $this->input->post('contribute_an_rekening');
        $this->db->where('key', 'contribute_an_rekening');
        $this->db->update('tb_settings', ['value' => $contribute_an_rekening]);

        $contribute_rekening = $this->input->post('contribute_rekening');
        $this->db->where('key', 'contribute_rekening');
        $this->db->update('tb_settings', ['value' => $contribute_rekening]);

        $contribute_whatsapp = $this->input->post('contribute_whatsapp');
        $this->db->where('key', 'contribute_whatsapp');
        $this->db->update('tb_settings', ['value' => $contribute_whatsapp]);

        return true;
    }
}
