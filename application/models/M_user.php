<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function updateProfile($picture){
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


    function resetPicture()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_user', ['picture' => null]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function changePassword($password)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('tb_auth', ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
