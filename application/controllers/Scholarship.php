<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scholarship extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_home', 'M_auth', 'M_admin', 'M_user', 'M_scholarship']);

        // cek apakah user sudah login
        if ($this->session->userdata('logged_in') == false || !$this->session->userdata('logged_in')) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            $this->session->set_flashdata('notif_warning', "Please login, to continued");
            redirect('login');
        }
    }

    public function index()
    {
        $this->templateauth->view('scholarship/apply');
    }

    public function applicant()
    {
        $data['users'] = $this->M_admin->getScholarlist();
        $this->templateback->view('admin/scholarship', $data);
    }

    // form
    public function applyScholarship()
    {
        // CREATE UNIQ NAME KODE USER
        $string = preg_replace('/[^a-z]/i', '', $this->session->userdata('name'));

        $vocal = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " "];
        $scrap = str_replace($vocal, "", $string);
        $begin = substr($scrap, 0, 5);
        $uniqid = strtoupper($begin);

        // CREATE KODE USER
        do {
            $scholar_id = "SCHLR-" . $uniqid . "-" . substr(md5(time()), 0, 6);
        } while ($this->M_scholarship->cek_scholarId($scholar_id) > 0);

        $path = "berkas/user/{$this->session->userdata('user_id')}/scholarship/";

        $upload_follow = $this->uploader->uploadImageMulti($_FILES['upload_follow'], 'upload_follow', $path);
        $upload_apps = $this->uploader->uploadImageMulti($_FILES['upload_apps'], 'upload_apps', $path);
        $upload_youtube = $this->uploader->uploadImageMulti($_FILES['upload_youtube'], 'upload_youtube', $path);
        $upload_telegram = $this->uploader->uploadImageMulti($_FILES['upload_telegram'], 'upload_telegram', $path);
        $upload_story = $this->uploader->uploadImageMulti($_FILES['upload_story'], 'upload_story', $path);
        $upload_tags = $this->uploader->uploadImageMulti($_FILES['upload_tags'], 'upload_tags', $path);

        $uploadData = [
            'scholar_id' => $scholar_id,
            'user_id' => $this->session->userdata('user_id'),
            'upload_follow' => $upload_follow['filename'],
            'upload_apps' => $upload_apps['filename'],
            'upload_youtube' => $upload_youtube['filename'],
            'upload_telegram' => $upload_telegram['filename'],
            'upload_story' => $upload_story['filename'],
            'upload_tags' => $upload_tags['filename']
        ];

        if ($this->M_scholarship->applyScholarship($uploadData, $scholar_id) == true) {
            $this->session->set_flashdata('notif_success', 'successfully applied for a scholarship');
            redirect(site_url('user/scholarship'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem with regristration process, try again later');
            redirect($this->agent->referrer());
        }
    }
}
