<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class File extends CI_Controller {



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

        

        if($this->session->userdata('hak_akses') == 'admin'){

            $data = array(

                'title'         => 'Daftar Berkas',

                'data_file'     => $this->M_file->get_all_admin()

            );

        }else{

            $data = array(

                'title'         => 'Daftar Berkas',

                // 'data_file'     => $this->M_file->get_all_admin()
                'data_file'     => $this->M_file->get_all_user($this->session->userdata('id_user'))

            );

        }



        

        $this->templates->admin('admin/v_file', $data);

    }

}

