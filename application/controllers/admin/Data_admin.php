<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Data_admin extends CI_Controller {



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

            'title'             => 'Data Admin',

            'data_admin' => $this->M_user->get_admin(),

        );

        $this->templates->admin('admin/v_data_admin', $data);

    }



    public function insert(){

        $data = [

            'username'      => $this->input->post('username', TRUE),

            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),

            'email'  => $this->input->post('email', TRUE),

            'password'      => MD5($this->input->post('password', TRUE)),

            'hak_akses'     => 'admin',

        ];



        $this->M_user->insert($data);

        echo ("<script language='javascript'>

        window.location.href='".base_url()."admin/data_admin';

        window.alert('Success, Data Berhasil disimpan.');

        </script>");

        exit();

    }



    public function update(){

        $id_user = $this->input->post('id_user', TRUE);



        $data = [

            'username'      => $this->input->post('username', TRUE),

            'nama_lengkap'  => $this->input->post('nama_lengkap', TRUE),

            'email'  => $this->input->post('email', TRUE),

            'password'      => MD5($this->input->post('password', TRUE)),

            'hak_akses'     => 'admin',

        ];



        $this->M_user->update($data, $id_user);

        echo ("<script language='javascript'>

        window.location.href='".base_url()."admin/data_admin';

        window.alert('Success, Data Berhasil diupdate.');

        </script>");

        exit();

    }



    public function delete($id_user){

        $this->M_user->delete($id_user);



        echo ("<script language='javascript'>

        window.location.href='".base_url()."admin/data_admin';

        window.alert('Success, Data Berhasil dihapus.');

        </script>");

        exit();



        

    }

}

