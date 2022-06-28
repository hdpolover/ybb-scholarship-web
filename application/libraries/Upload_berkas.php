<?php


class Upload_berkas
{
    /*
        library untuk membantu upload image
        keterangan variabel
        $data -> contoh : $_FILES['gambar']['name']
        $name_file -> contoh ; name="gambar" -> gambar
        $jenis_photo -> contoh : folder foto yg mau di masukkan -> folder "ktp"
    */

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function upload($data, $name_file, $berkas)
    {
        if ($data != null) {
            $config['upload_path']          = './assets/uploads/' . $berkas . '/';
            $config['allowed_types']        = 'doc|pdf|ppt|docx|xls|xlsx|jpg|jpeg|png|svg';
            $config['max_size']             = '5000';
            $config['file_name']            = $berkas . '-' . date("dmY") . substr(md5(rand()), 0, 10);

            $this->ci->upload->initialize($config);

            if ($this->ci->upload->do_upload($name_file)) {

                $uploadData                 = $this->ci->upload->data();
                $filename                   = $uploadData['file_name'];

                return $filename;
            } else {
                $error = $this->ci->upload->display_errors();
                return null;
            }
        } else {
            return null;
        }
    }

    public function update($data, $name_file, $jenis_photo, $data_hapus)
    {
        if ($data != null) {
            $target_delete                  =  './assets/img/' . $jenis_photo . '/' . $data_hapus;
            unlink($target_delete);

            $config['upload_path']          = './assets/img/' . $jenis_photo . '/';
            $config['allowed_types']        = 'doc|pdf|ppt|docx|xls|xlsx|jpg|jpeg|png|svg';
            $config['max_size']             = '5000';
            $config['file_name']            = $jenis_photo . '-' . date("dmY") . substr(md5(rand()), 0, 10);

            $this->ci->upload->initialize($config);

            if ($this->ci->upload->do_upload($name_file)) {

                $uploadData                 = $this->ci->upload->data();
                $filename                   = $uploadData['file_name'];

                return $filename;
            } else {
                $error = $this->ci->upload->display_errors();
                var_dump($error);
                die();
                return null;
            }
        } else {
            return null;
        }
    }

    public function delete($data, $jenis_photo)
    {
        if ($data != null) {
            $target_delete                  =  './assets/img/' . $jenis_photo . '/' . $data;
            unlink($target_delete);
            return true;
        } else {
            return false;
        }
    }
}
