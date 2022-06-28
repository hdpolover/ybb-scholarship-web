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

            // $acak = random_int(1000000, 9999999);

            $link = base_url()."reset-password/{$this->input->post('email')}";

            $pesan  = "Hai, kami telah menerima permintaan lupa password untuk akunmu, harap klik link berikut untuk melanjutkan proses lupa password kamu: {$link}";

            $file = "";

            $is_send = $this->sendmail1->get($email, "Permintaan Reset Password", $pesan, $file);

            if ($is_send) {

                $this->session->set_flashdata('message_success', 'Berhasil mengirim permintaan lupa password, harap cek email anda untuk melanjutkan');
                redirect($this->agent->referrer());

            } else {

                $this->session->set_flashdata('message', 'Gagal mengirim Email.');
                redirect('/');

            }

           

       }else{

            $this->session->set_flashdata('message', 'Email Tidak ditemukan');
            redirect('auth/lupa_password');

       }
    }


    // reset password after request
    public function reset_password($email = null)
    {

        $cek_email = $this->M_user->cek_email($email);

        if ($cek_email > 0) {
            $data['email'] = $email;
            $this->load->view('auth/v_reset_password', $data);
        } else {

            $this->session->set_flashdata('message', 'Email Tidak ditemukan');
            redirect('auth/lupa_password');
        }
    }

    public function reset_password_aksi()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $password_conf = $this->input->post('password_conf', TRUE);

        $cek_email = $this->M_user->cek_email($email);

        if ($cek_email > 0) {

            if ($password === $password_conf) {

                $data = array(
                    'password' => MD5($password),
                );

                $this->M_user->update_byemail($data, $email);

                $now = date('d F Y H:i:s');

                $pesan  = "Hai, kamu telah merubah password kamu pada {$now}";

                $file = "";

                $is_send = $this->sendmail1->get($email, "Permintaan Reset Password", $pesan, $file);


                $this->session->set_flashdata('message_success', 'Berhasil mengubah email anda, harap masuk menggunakan password baru anda.');
                redirect('/');
            } else {

                $this->session->set_flashdata('message', 'Konfirmasi password tidak sama');
                redirect($this->agent->referrer());
            }
        } else {

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

