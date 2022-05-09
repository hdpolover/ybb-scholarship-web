<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getScholarshipStatus($user_id)
    {
        $query = $this->db->get_where('tb_scholarship', ['user_id' => $user_id, 'is_deleted' => 0]);
        if ($query->num_rows() > 0) {
            return $query->row()->status;
        } else {
            return false;
        }
    }

    public function getScholarshipData($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_scholarship sh');
        $this->db->join('tb_scholarship_file sf', 'sh.scholar_id = sf.scholar_id', 'inner');
        $this->db->where('sh.user_id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_annoucementsUser(){
        return $this->db->get_where('tb_announcement', ['for_users' => 'users', 'for_members' => null, 'is_deleted' => 0])->result();
    }

    public function get_annoucementsMember(){
        return $this->db->get_where('tb_announcement', ['for_members' => 'members', 'for_users' => null, 'is_deleted' => 0])->result();
    }

    public function get_annoucementsBoth(){
        return $this->db->get_where('tb_announcement', ['for_members' => 'members', 'for_users' => 'users', 'is_deleted' => 0])->result();
    }

    public function getDetailUser($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_auth ta');
        $this->db->join('tb_user tu', 'ta.user_id = tu.user_id', 'inner');
        $this->db->where('ta.user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function updateProfile($picture)
    {
        $name = htmlspecialchars($this->input->post('name'), true);
        $email = htmlspecialchars($this->input->post('email'), true);
        $phone = htmlspecialchars($this->input->post('phone'), true);
        $gender = htmlspecialchars($this->input->post('gender'), true);

        $dAuth = [
            'email' => $email,
        ];

        if ($picture == null) {
            $dUser = [
                'name' => $name,
                'phone' => $phone,
                'gender' => $gender,
            ];
        } else {
            $dUser = [
                'picture' => $picture,
                'name' => $name,
                'phone' => $phone,
                'gender' => $gender,
            ];
        }

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_auth', $dAuth);

        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_user', $dUser);
        return ($this->db->affected_rows() != 1) ? false : true;
    }


    public function resetPicture()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_user', ['picture' => null]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function changePassword($password)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_auth', ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
