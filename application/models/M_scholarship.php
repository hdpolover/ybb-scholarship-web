<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_scholarship extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_scholarId($user_id)
    {
        $user_id = $this->db->escape($user_id);
        $query = $this->db->query("SELECT * FROM tb_scholarship WHERE user_id = $user_id");
        return $query->num_rows();
    }

    public function applyScholarship($uploadData, $scholar_id)
    {
        $full_name = $this->input->post('full_name');
        $date_birth = $this->input->post('date_birth');
        $whatsapp_number = $this->input->post('whatsapp_number');
        $current_address = $this->input->post('current_address');
        $field_study = $this->input->post('field_study');
        $school = $this->input->post('school');
        $current_gpa = $this->input->post('current_gpa');
        $semester = $this->input->post('semester');
        $about = $this->input->post('about');
        $dream_come = $this->input->post('dream_come');
        $volunteer = $this->input->post('volunteer');

        $formData = [
            'scholar_id' => $scholar_id,
            'user_id' => $this->session->userdata('user_id'),
            'full_name' => $full_name,
            'date_birth' => $date_birth,
            'whatsapp_number' => $whatsapp_number,
            'current_address' => $current_address,
            'field_study' => $field_study,
            'school' => $school,
            'current_gpa' => $current_gpa,
            'semester' => $semester,
            'about' => $about,
            'dream_come' => $dream_come,
            'volunteer' => $volunteer,
            'created_at' => time()
        ];

        $this->db->insert('tb_scholarship', $formData);

        $this->db->insert('tb_scholarship_file', $uploadData);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
