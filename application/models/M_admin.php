<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // chart
    function getChartFieldStudy(){
        $this->db->select('field_study, COUNT(*) as count');
        $this->db->from('tb_scholarship');
        $this->db->group_by("field_study");
        return $this->db->get()->result();
    }

    function getChartSchool()
    {
        $this->db->select('school, COUNT(*) as count');
        $this->db->from('tb_scholarship');
        $this->db->group_by("school");
        return $this->db->get()->result();
    }

    function getChartGPA()
    {
        $this->db->select('current_gpa, COUNT(*) as count');
        $this->db->from('tb_scholarship');
        $this->db->group_by("current_gpa");
        return $this->db->get()->result();
    }

    function getChartSemester()
    {
        $this->db->select('semester, COUNT(*) as count');
        $this->db->from('tb_scholarship');
        $this->db->group_by("semester");
        return $this->db->get()->result();
    }

    function getChartGender()
    {
        $this->db->select('a.gender, COUNT(a.user_id) as count');
        $this->db->from('tb_user a');
        $this->db->join('tb_auth b', 'a.user_id = b.user_id');
        $this->db->where('b.role', 2);
        $this->db->group_by('gender');
        return $this->db->get()->result();
    }

    function getChartDaily()
    {
        $this->db->select('created_at, COUNT(created_at) as count');
        $this->db->from('tb_scholarship');
        $this->db->group_by('created_at');
        return $this->db->get()->result();
    }

    function getChartDailyAccount()
    {
        $this->db->select('created_at, COUNT(created_at) as count');
        $this->db->from('tb_auth');
        $this->db->group_by('created_at');
        return $this->db->get()->result();
    }


    function countDashboard(){
        $users = $this->db->get_where('tb_auth', ['active' => 1, 'role' => 2])->num_rows();
        $members = $this->db->get_where('tb_scholarship', ['status' => 2, 'is_deleted' => 0])->num_rows();

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

    public function getTimelinelist(){
        $this->db->select('*');
        $this->db->from('tb_timeline');
        $this->db->where(['is_deleted' => 0]);
        return $this->db->get()->result();
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

    // hero
    function getDetailhero($id){
        $query =  $this->db->get_where('tb_home', ['id' => $id, 'is_deleted' => 0]);
        if ($query->num_rows() > 0):
            return $query->row();
        else:
            return false;
        endif;

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

    // home

    public function addHomeBenefit($filename)
    {
        $benefit = $this->input->post('benefit');
        $desc = $this->input->post('desc');

        $data = [
            'key' => 'benefit',
            'picture' => $filename,
            'value' => $benefit,
            'desc' => $desc,
            'created_at' => time()
        ];

        $this->db->insert('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editHomeBenefit($filename)
    {
        $id = $this->input->post('id');
        $benefit = $this->input->post('benefit');
        $desc = $this->input->post('desc');

        $data = [
            'key' => 'benefit',
            'picture' => $filename,
            'value' => $benefit,
            'desc' => $desc,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteHomeBenefit()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_home', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function addHomeGallery($filename)
    {

        $data = [
            'key' => 'gallery',
            'picture' => $filename,
            'created_at' => time()
        ];

        $this->db->insert('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editHomeGallery($filename)
    {
        $id = $this->input->post('id');

        $data = [
            'picture' => $filename,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteHomeGallery()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_home', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function changeHomeContent(){
        $home_sinopsis = $this->input->post('home_sinopsis');
        $this->db->where('key', 'sinopsis');
        $this->db->update('tb_home', ['value' => $home_sinopsis]);

        return true;
    }

    public function addHomeHero($filename, $iconImg = null)
    {
        $title = $this->input->post('title');
        $sub_title = $this->input->post('sub_title');
        $icon = $this->input->post('icon');
        $button = $this->input->post('button');
        $button_text = $this->input->post('button_text');
        $button_color = $this->input->post('button_color');
        $button_text_color = $this->input->post('button_text_color');
        $button_link = $this->input->post('button_link');


        $data = [
            'key' => 'hero',
            'picture' => $filename,
            'value' => $title,
            'desc' => $sub_title,
            'hero_icon' => is_null($icon) ? 0 : 1,
            'icon' => $iconImg,
            'button' => is_null($button) ? 0 : 1,
            'button_text' => $button_text,
            'button_color' => $button_color,
            'button_text_color' => $button_text_color,
            'button_link' => $button_link,
            'created_at' => time()
        ];

        $this->db->insert('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editHomeHero($filename, $iconImg = null)
    {
        $id = $this->input->post('id');

        $title = $this->input->post('title');
        $sub_title = $this->input->post('sub_title');
        $icon = $this->input->post('icon');
        $button = $this->input->post('button');
        $button_text = $this->input->post('button_text');
        $button_color = $this->input->post('button_color');
        $button_text_color = $this->input->post('button_text_color');
        $button_link = $this->input->post('button_link');

        $button = is_null($button) ? 0 : 1;
        $icon = is_null($icon) ? 0 : 1;

        if($button == 0){
            $data = [
                'key' => 'hero',
                'picture' => $filename,
                'value' => $title,
                'desc' => $sub_title,
                'hero_icon' => $icon,
                'icon' => $iconImg,
                'button' => $button,
                'button_text' => '',
                'button_color' => '',
                'button_text_color' => '',
                'button_link' => '',
                'created_at' => time()
            ];
        }else{
            $data = [
                'key' => 'hero',
                'picture' => $filename,
                'value' => $title,
                'desc' => $sub_title,
                'button' => $button,
                'button_text' => $button_text,
                'button_color' => $button_color,
                'button_text_color' => $button_text_color,
                'button_link' => $button_link,
                'created_at' => time()
            ];
        }

        $this->db->where('id', $id);
        $this->db->update('tb_home', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteHomeHero($id)
    {

        $this->db->where('id', $id);
        $this->db->update('tb_home', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    // timeline

    public function addTimeline()
    {
        $title = $this->input->post('title');
        $period = $this->input->post('period');
        $desc = $this->input->post('desc');

        $data = [
            'title' => $title,
            'period' => $period,
            'desc' => $desc,
            'created_at' => time()
        ];

        $this->db->insert('tb_timeline', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editTimeline()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $period = $this->input->post('period');
        $desc = $this->input->post('desc');

        $data = [
            'title' => $title,
            'period' => $period,
            'desc' => $desc,
            'modified_at' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_timeline', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteTimeline()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('tb_timeline', ['is_deleted' => 1]);
        return ($this->db->affected_rows() != 1) ? false : true;
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

    // basic
    function changeBasicInfo()
    {
        $web_title = $this->input->post('web_title');
        $this->db->where('key', 'web_title');
        $this->db->update('tb_settings', ['value' => $web_title]);

        $web_desc = $this->input->post('web_desc');
        $this->db->where('key', 'web_desc');
        $this->db->update('tb_settings', ['value' => $web_desc]);

        $web_address = $this->input->post('web_address');
        $this->db->where('key', 'web_address');
        $this->db->update('tb_settings', ['value' => $web_address]);

        $web_whatsapp = $this->input->post('web_whatsapp');
        $this->db->where('key', 'web_whatsapp');
        $this->db->update('tb_settings', ['value' => $web_whatsapp]);

        $web_facebook = $this->input->post('web_facebook');
        $this->db->where('key', 'web_facebook');
        $this->db->update('tb_settings', ['value' => $web_facebook]);

        $web_instagram = $this->input->post('web_instagram');
        $this->db->where('key', 'web_instagram');
        $this->db->update('tb_settings', ['value' => $web_instagram]);

        $web_twitter = $this->input->post('web_twitter');
        $this->db->where('key', 'web_twitter');
        $this->db->update('tb_settings', ['value' => $web_twitter]);

        $web_youtube = $this->input->post('web_youtube');
        $this->db->where('key', 'web_youtube');
        $this->db->update('tb_settings', ['value' => $web_youtube]);

        return true;
    }

    // scholarship setting
    function changeScholarReg()
    {

        $pendaftaran_buka = $this->input->post('pendaftaran_buka');
        $pendaftaran_buka = $pendaftaran_buka == 'on' ? 1 : 0;
        $this->db->where('key', 'pendaftaran_buka');
        $this->db->update('tb_settings', ['value' => $pendaftaran_buka]);

        $pendaftaran_max = $this->input->post('pendaftaran_max');
        $this->db->where('key', 'pendaftaran_max');
        $this->db->update('tb_settings', ['value' => $pendaftaran_max]);

        return true;
    }


    // mailer
    function changeMailerInfo()
    {
        if($this->session->userdata('role') == 0):
            $mailer_mode = $this->input->post('mailer_mode');
            $this->db->where('key', 'mailer_mode');
            $this->db->update('tb_settings', ['value' => $mailer_mode]);

            $mailer_host = $this->input->post('mailer_host');
            $this->db->where('key', 'mailer_host');
            $this->db->update('tb_settings', ['value' => $mailer_host]);

            $mailer_port = $this->input->post('mailer_port');
            $this->db->where('key', 'mailer_port');
            $this->db->update('tb_settings', ['value' => $mailer_port]);
        endif;

        $mailer_alias = $this->input->post('mailer_alias');
        $this->db->where('key', 'mailer_alias');
        $this->db->update('tb_settings', ['value' => $mailer_alias]);

        $mailer_username = $this->input->post('mailer_username');
        $this->db->where('key', 'mailer_username');
        $this->db->update('tb_settings', ['value' => $mailer_username]);

        $mailer_password = $this->input->post('mailer_password');
        $this->db->where('key', 'mailer_password');
        $this->db->update('tb_settings', ['value' => $mailer_password]);

        return true;
    }

}
