<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Decrypt extends CI_Controller
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

        if($this->session->userdata('hak_akses') == 'admin'){
            $data = array(
                'title'         => 'Dekripsi Berkas',
                'data_file'     => $this->M_file->get_all_admin()
            );
        }else{
            $data = array(
                'title'         => 'Dekripsi Berkas',
                'data_file'     => $this->M_file->get_all()
            );
        }
        $this->templates->admin('admin/v_decrypt', $data);
    }

    public function detail($id_file)
    {

        $this->_rules_decrypt();
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Dekripsi Berkas',
                'data_file'     => $this->M_file->detail($id_file)
            );
            $this->templates->admin('admin/v_decrypt_detail', $data);
        } else {
            $key        = $this->M_file->escape_string(substr(MD5($this->input->post('password', TRUE)), 0, 16));
            $data_file  = $this->M_file->detail_confirm($id_file, $key);
            if (isset($data_file)) {
                $aes        = new AES($key);
                $email      = $data_file["email"];
                $message    = $data_file["message"];
                $file_path  = $data_file["file_url"];
                $key        = $data_file["password"];
                $file_name  = $data_file["file_name_source"];
                $size       = $data_file["file_size"];


                $decrypt_message = $aes->decrypt(base64_decode($message));
                $this->M_file->update_message($id_file, $decrypt_message);

                $file_size  = filesize($file_path);
                $mod        = $file_size % 16;

                if ($mod == 0) {
                    $banyak = $file_size / 16;
                } else {
                    $banyak = ($file_size - $mod) / 16;
                    $banyak = $banyak + 1;
                }

                $fopen1     = fopen($file_path, "rb");
                $plain      = "";
                $cache      = "assets/uploads/encrypt/".$file_name;
                $fopen2     = fopen($cache, "wb");

                ini_set('max_execution_time', -1);
                ini_set('memory_limit', -1);
                for ($bawah = 0; $bawah < $banyak; $bawah++) {
                    $filedata    = fread($fopen1, 16);
                    $plain       = $aes->decrypt($filedata);
                    fwrite($fopen2, $plain);
                }

                $this->session->set_userdata('download', $cache);
                $this->M_file->update_status($id_file);

                $data_update = array(
                    'file_name_source' => $cache,
                );

                $cache2      = "assets/uploads/encrypt/$file_name";

                $this->M_file->update($data_update, $id_file);

                // $is_send = $this->mailer->send($email, "Pesan Dekripsi AES", $decrypt_message, $file_name);
                $is_send = $this->sendmail->get($email, "Pesan Dekripsi AES", $decrypt_message, base_url($cache));
                if ($is_send) {

                    echo ("<script language='javascript'>
                    window.location.href='".base_url()."admin/file';
                    window.alert('Berhasil mendekripsi file & terkirim email...');
                    </script>");
                    
                    // echo ("<script language='javascript'>
                    // window.open('download.php', '_blank');
                    // window.location.href='decrypt';
                    // window.alert('Berhasil mendekripsi file & terkirim email...');
                    // </script>
                    // ");
                } else {
                    echo ("<script language='javascript'>
                    window.location.href='".base_url()."admin/file';
                    window.alert('Berhasil mendekripsi file namun gagal terkirim email...');
                    </script>");
                    // echo ("<script language='javascript'>
                    // window.open('download.php', '_blank');
                    // window.location.href='decrypt';
                    // window.alert('Berhasil mendekripsi file namun gagal terkirim email...');
                    // </script>
                    // ");
                }
            } else {
                echo ("<script language='javascript'>
                window.location.href='".base_url('admin/decrypt/detail/'.$id_file)."';
                window.alert('Maaf, Password tidak sesuai.');
                </script>");
                // die();
            }
        }
    }

    private function _rules_decrypt()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}
