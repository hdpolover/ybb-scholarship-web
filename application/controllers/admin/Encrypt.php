<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Encrypt extends CI_Controller

{

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



    public function index()

    {



        $data_header = array(

            'title' => 'Enkripsi Berkas',

        );



        $this->_rules_encrypt();

        if ($this->form_validation->run() == FALSE) {

            $this->templates->admin('dashboard/decrypt', $data_header);

        } else {

            $user       = $this->session->userdata('id_user');

            $key        = $this->M_file->escape_string(substr(MD5($this->input->post('password', TRUE)), 0, 16));

            $deskripsi  = $this->M_file->escape_string($this->input->post('keterangan', TRUE));

            $email      = $this->M_file->escape_string($this->input->post('email', TRUE));

            $message    = $this->M_file->escape_string($this->input->post('message', TRUE));



            $file_tmpname   = $_FILES['file']['tmp_name'];



            // var_dump($file_tmpname);

            // die();

            //untuk nama file url

            $file           = rand(1000, 100000) . "-" . $_FILES['file']['name'];

            $new_file_name  = strtolower($file);

            $final_file     = str_replace(' ', '-', $new_file_name);

            //untuk nama file

            $filename       = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

            $new_filename   = strtolower($filename);

            $finalfile      = str_replace(' ', '-', $new_filename);

            $size           = filesize($file_tmpname);

            $size2          = (filesize($file_tmpname)) / 1024;

            $info           = pathinfo($final_file);

            $file_source    = fopen($file_tmpname, 'rb');

            $ext            = $info["extension"];



            // var_dump($size2);

            // die();



            if ($ext == "docx" || $ext == "doc" || $ext == "pdf" || $ext == "xls" || $ext == "xlsx" || $ext == "ppt" || $ext == "pptx") {

            } else {

                echo ("<script language='javascript'>

                window.location.href='encrypt';

                window.alert('Maaf, file yang bisa dienkrip hanya word, excel, ppt ataupun pdf.');

                </script>");

                exit();

            }



            if ($size2 > 3084) {

                echo ("<script language='javascript'>

                window.location.href='encrypt';

                window.alert('Maaf, file tidak bisa lebih besar dari 3MB.');

                </script>");

                exit();

            }



            $aes = new AES($key);

            $encrypt_msg = base64_encode($aes->encrypt($message));



            $data_file = [

                'id_user'          => $user,

                'email'             => $email,

                'message'           => $encrypt_msg,

                'file_name_source'  => $final_file,

                'file_name_finish'  => $finalfile . '.rda',

                'file_size'         => $size2,

                'password'          => $key,

                'status'            => '1',

                'keterangan'        => $deskripsi

            ];



            $id = $this->M_file->insert($data_file);



            $url = $finalfile . '.rda';

            $file_url = 'assets/uploads/encrypt/' . $url;



            $update_file = [

                'file_url'          => $file_url

            ];



            $this->M_file->update($update_file, $id);



            $mod    = $size % 16;

            if ($mod == 0) {

                $banyak = $size / 16;

            } else {

                $banyak = ($size - $mod) / 16;

                $banyak = $banyak + 1;

            }



            $file_output        = fopen($file_url, 'wb');

            if (is_uploaded_file($file_tmpname)) {

                ini_set('max_execution_time', -1);

                ini_set('memo[ry_limit', -1);



                for ($bawah = 0; $bawah < $banyak; $bawah++) {

                    $data    = fread($file_source, 16);

                    $cipher  = $aes->encrypt($data);

                    fwrite($file_output, $cipher);

                }



                fclose($file_source);

                fclose($file_output);



                // $is_send = $this->mailer->send($email, "Pesan Enkripsi AES", $encrypt_msg, $url);

                $is_send = $this->sendmail->get($email, "Pesan Enkripsi AES", $encrypt_msg, base_url($file_url));

                if ($is_send) {

                    echo ("<script language='javascript'>

                    window.location.href='decrypt';

                    window.alert('Enkripsi Berhasil & Sukses Terkirim Email...');

                    </script>");

                } else {

                    echo ("<script language='javascript'>

                    window.location.href='decrypt';

                    window.alert('Enkripsi Berhasil Namun Gagal Terkirim Email...');

                    </script>");

                }

            } else {

                echo ("<script language='javascript'>

                window.location.href='".base_url('admin/encrypt')."';

                window.alert('Encrypt file mengalami masalah..');

                </script>");

            }

        }

    }



    public function insert(){

        

        $berkas= $_FILES['berkas']['name'];



        $result_berkas= $this->upload_berkas->upload($berkas,'berkas', 'encrypt');



        if($result_berkas== NULL ){

            echo ("<script language='javascript'>

            window.location.href='".base_url('admin/decrypt')."';

            window.alert('Gagal Tersimpan..');

            </script>"

            );

        }

        $data = array(

            'id_user'           => $this->session->userdata('id_user'),

            'email'             => $this->input->post('email', TRUE),

            'message'           => $this->input->post('message', TRUE),

            'password'          => md5($this->input->post('password')),

            'status'            => '1',

            'file_url'         => $result_berkas,

            'keterangan'        => $this->input->post('keterangan'),

        );



        $this->M_file->insert($data);



        echo ("<script language='javascript'>

            window.location.href='".base_url('admin/decrypt')."';

            window.alert('Data Berhasil Disimpan');

            </script>"

        );

    }



    private function _rules_encrypt()

    {

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        // $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('message', 'Pesan', 'required');

    }

}

