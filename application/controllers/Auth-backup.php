<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $this->_rules_login();
        if ($this->form_validation->run() == FALSE) {
            $this->templates->login();
        } else {
            $data = [
                'username'      => $this->input->post('username', TRUE),
                'password'      => MD5($this->input->post('password', TRUE))
            ];

            $login = $this->M_user->login($data);

            if ($login) {
                
                $this->session->set_userdata('id_user', $login->id_user);
                $this->session->set_userdata('username', $login->username);
                $this->session->set_userdata('email', $login->email);
                $this->session->set_userdata('nama_lengkap', $login->nama_lengkap);
                $this->session->set_userdata('hak_akses', $login->hak_akses);
                $this->session->set_userdata('last_activity', $login->last_activity);
                
                //print($this->session->userdata('nama_lengkap'));
                 redirect('admin/home');
            } else {
                $this->session->set_flashdata('message', 'Username atau Password Salah!');
                redirect('/');
            }
        }
    }
    
    public function signup()
    {
        $this->_rules_signup();
        if ($this->form_validation->run() == FALSE) {
            $this->templates->signup();
        } else {
            $data = [
                'username'      => $this->input->post('username', TRUE),
                'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),
                'email'  => $this->input->post('email', TRUE),
                'password'      => MD5($this->input->post('password', TRUE)),
                'hak_akses'     => 'pengguna',
            ];

            $login = $this->M_user->signup($data);
            
            $this->session->set_flashdata('message_success', 'Berhasil mendaftar. Silakan lakukan login.');
            redirect('/');
            
        }
    }

    public function lupa_password(){
        $this->load->view('auth/v_lupa_password');
    }

    public function lupa_password_aksi(){
       $cek_email = $this->M_user->cek_email($this->input->post('email', TRUE));
       
       $email = $this->input->post('email', TRUE);
       if($cek_email > 0 ){
            $acak = random_int(1000000, 9999999);
            $pesan  = "Anda Telah Reset Password ini merupakan Password Terbaru Anda ".$acak;
            $file = "";
            $is_send = $this->sendmail1->get($email, "Reset Password", $pesan, $file);
            if ($is_send) {
                $data = array(
                    'password' => MD5($acak),
                );
                $this->M_user->update_byemail($data, $email);
                $this->session->set_flashdata('message_success', 'Berhasil reset passsword. Silakan periksa login.');
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Gagal Kekirim Email.');
                redirect('/');
            }
           
       }else{
            $this->session->set_flashdata('message', 'Email Tidak ditemukan');
            redirect('auth/lupa_password');
       }
    }

    public function logout()
    {
        $this->M_user->update_lastonline($this->session->userdata['id_user']);
        $this->session->sess_destroy();
        redirect('/');
    }

    private function _rules_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
    
    private function _rules_signup()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_lengkap', 'Full name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}
