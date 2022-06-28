<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



    public function __construct()

    {

        parent::__construct();



        if ($this->session->userdata('hak_akses') != '') {

            $hak_akses = $this->session->userdata('hak_akses');



      

            switch ($hak_akses) {

                case 'admin':

                    if($hak_akses != 'admin'){

                        echo ("<script language='javascript'>

                        window.location.href='".base_url()."auth/login';

                        window.alert('Maaf, Anda Belum Login.');

                        </script>");

                        exit();

                    }

                       

                    break;

                case 'pengguna':

                    if($hak_akses != 'pengguna'){

                        echo ("<script language='javascript'>

                        window.location.href='".base_url()."auth/login';

                        window.alert('Maaf, Anda Belum Login.');

                        </script>");

                        exit();

                    }

                    break;

                default:

                    echo ("<script language='javascript'>

                    window.location.href='".base_url()."auth/login';

                    window.alert('Maaf, Anda Belum Login.');

                    </script>");

                    exit();

                break;

            }



        }

    }







	public function index(){

        

        $data = array(

            'title'             => 'Dashboard',

            // 'total_encrypt'     => $this->M_file->total_encrypt(),

            // 'total_decrypt'     => $this->M_file->total_decrypt(),

            'total_encrypt'     => $this->M_file->total_encrypt_pengguna($this->session->userdata('id_user')),

            'total_decrypt'     => $this->M_file->total_decrypt_pengguna($this->session->userdata('id_user')),

            'total_admin'     => $this->M_user->total_admin(),

            'total_pengguna'     => $this->M_user->total_pengguna(),

        );

        $this->templates->admin('admin/v_dashboard', $data);
    }



    public function profil()
    {



        $data = array(

            'title'             => 'Data Pengguna',

            'pengguna' => $this->M_user->get_penggunaDetail($this->session->userdata('id_user')),

        );

        $this->templates->admin('admin/v_profil_pengguna', $data);
    }

    public function updateProfil(){
        $id_user = $this->session->userdata('id_user');

        if ($this->input->post('password')) {


            $data = [

                'username'      => $this->input->post('username', TRUE),

                'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),

                'email'  => $this->input->post('email', TRUE),

                'password'      => MD5($this->input->post('password', TRUE)),

                'hak_akses'     => 'pengguna',

            ];
        } else {


            $data = [

                'username'      => $this->input->post('username', TRUE),

                'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),

                'email'  => $this->input->post('email', TRUE),

                // 'password'      => MD5($this->input->post('password', TRUE)),

                'hak_akses'     => 'pengguna',

            ];
        }



        $this->M_user->update($data, $id_user);

        echo ("<script language='javascript'>

        window.location.href='" . base_url() . "admin/home/profil';

        window.alert('Success, Data Berhasil diupdate.');

        </script>");

        exit();
    }

}

