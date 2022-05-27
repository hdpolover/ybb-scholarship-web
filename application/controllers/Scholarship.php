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
            $this->session->set_flashdata('notif_warning', "Harap login ke akunmu untuk melanjutkan");
            redirect('login');
        }
    }

    public function index()
    {
        $pendaftaran_buka = $this->M_home->get_settingsValue('pendaftaran_buka');
        $pendaftaran_max = $this->M_home->get_settingsValue('pendaftaran_max');
        $applicant_lolos = $this->M_home->get_totalApplicantLolos(['status' => 2]);

        if($pendaftaran_buka == 1){
            if($pendaftaran_max <= $applicant_lolos){
                $this->session->set_flashdata('notif_warning', "Mohon maaf, Kuota peserta beasiswa telah terpenuhi");
                redirect('home');
            }else{
                $this->templateauth->view('scholarship/apply');
            }
        }else{
            $this->session->set_flashdata('notif_warning', "Mohon maaf, pendaftaran beasiswa telah ditutup");
            redirect('home');
        }

    }

    public function applicant()
    {
        $data['users'] = $this->M_admin->getScholarlist();
        $this->templateback->view('admin/scholarship', $data);
    }

    public function member()
    {
        $data['users'] = $this->M_admin->getScholarlistApproved();
        $this->templateback->view('admin/scholarship_member', $data);
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
            'upload_tags' => $upload_tags['filename'],
            'upload_twibbon' => $this->input->post('upload_twibbon')
        ];

        if ($this->M_scholarship->applyScholarship($uploadData, $scholar_id) == true) {
            $this->session->set_flashdata('notif_success', 'Berhasil mendaftarkan diri ke beasiswaA');
            redirect(site_url('user/scholarship'));
        } else {
            $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mendaftarkan diri ke beasiswa, coba lagi nanti');
            redirect($this->agent->referrer());
        }
    }

    public function manageApplicant()
    {
        $status = $this->input->post('status');
        if ($this->M_scholarship->manageApplicant() == true) {
            $this->session->set_flashdata('notif_success', 'Applicant request for YBB Scholarship program has been '.$status);
            redirect(site_url('scholarship/applicant'));
        } else {
            $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mendaftarkan diri ke beasiswa, coba lagi nanti');
            redirect($this->agent->referrer());
        }
    }
}
