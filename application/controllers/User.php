<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_home', 'M_auth', 'M_user']);

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

        // cek apakah akun user sudah aktif / suspend - 0: BELUM AKTIF - 1: AKTIF - 2: SUSPEND;
        $user = $this->M_auth->get_userByID($this->session->userdata('user_id'));
        if ($user->active == 0) {
            $this->session->set_flashdata('error', "Hi {$user->name}, harap aktivasi akunmu terlebih dahulu");
            redirect(site_url('email-activation'));
        } elseif ($user->active == 2) {
            $this->session->set_flashdata('error', "Hi {$user->name}, akunmu telah tersuspend, harap hubungi admin kami untuk konfirmasi");
            redirect(site_url('suspend'));
        }
    }

    public function index()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $data['scholarship'] = $this->cekScholarshipStatus();

        $this->templateuser->view('user/overview', $data);
    }

    public function announcements()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $data['scholarship'] = $this->cekScholarshipStatus();
        $data['annoucementsUser'] = $this->M_user->get_annoucementsUser();
        $data['annoucementsMember'] = $this->M_user->get_annoucementsMember();
        $data['annoucementsBoth'] = $this->M_user->get_annoucementsBoth();

        $this->templateuser->view('user/announcements', $data);
    }

    public function scholarship()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $data['scholarship'] = $this->cekScholarshipStatus();
        $data['scholar'] = $this->M_user->getScholarshipData($this->session->userdata('user_id'));

        $this->templateuser->view('user/scholarship', $data);
    }

    public function settings()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $data['scholarship'] = $this->cekScholarshipStatus();

        $this->templateuser->view('user/settings', $data);
    }

    public function updateProfile()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/user/{$this->session->userdata('user_id')}/profile/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_user->updateProfile($upload['filename']) == true) {
                    $session = [
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                    ];

                    $this->session->set_userdata($session);

                    $this->session->set_flashdata('notif_success', 'Informasi akunmu telah diubah');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'Kamu tidak mengubah informasi akunmu');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_user->updateProfile(null) == true) {
                $session = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                ];

                $this->session->set_userdata($session);

                $this->session->set_flashdata('notif_success', 'Informasi akunmu telah diubah');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('notif_warning', 'Kamu tidak mengubah informasi akunmu');
                redirect($this->agent->referrer());
            }
        }
    }

    public function resetPicture()
    {
        if ($this->M_user->resetPicture() == true) {
            $this->load->helper('file');
            $path = "berkas/user/{$this->session->userdata('user_id')}/profile/";
            // delete all uploaded files
            delete_files($path, true);

            $this->session->set_flashdata('notif_success', 'Foto profilmu telah direset');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mencoba mereset foto profilmu');
            redirect($this->agent->referrer());
        }
    }

    public function changePassword()
    {
        $cur_password   = $this->input->post('currentPassword');
        $password       = $this->input->post('newPassword');
        $conf_password  = $this->input->post('confirmNewPassword');

        // mengambil data user dengan param email
        $user = $this->M_auth->get_auth($this->session->userdata('email'));

        if ($password == $conf_password) {
            //mengecek apakah password benar
            if (password_verify($cur_password, $user->password)) {
                if ($this->M_user->changePassword($password) == true) {

                    // atur dataemailperubahan password
                    $now = date("d F Y - H:i");
                    $email = htmlspecialchars($this->session->userdata("email"), true);

                    $subject = "Perubahan password";
                    $message = "Hai, password untuk akun YBB Foundation Scholarship <b>{$email}</b> telah dirubah pada {$now}. <br>Jika kamu tidak merasa melakukan perubahan password, harap hubungi ADMIN YBB Scholarship Program secepatnya!";

                    // mengirimemailperubahan password
                    $this->send_email(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

                    $this->session->set_flashdata('notif_success', 'Passwordmu berhasil dirubah');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'Terjadi kesalahan saat mencoba merubah passwordmu');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', 'Password salah, coba lagi');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Konfirmasi password tidak sesuai');
            redirect($this->agent->referrer());
        }
    }


    // FUNCTION PRIVATE

    public function cekScholarshipStatus()
    {
        $scholarshipStatus = $this->M_user->getScholarshipStatus($this->session->userdata('user_id'));
        switch ($scholarshipStatus) {
            // not yet apply
            case false:
                $scholar = [
                    'status' => false,
                    'alert' => 'warning',
                    'message' => 'Kamu belum mendaftaran diri untuk beasiswa, harap daftarkan diri sekarang',
                ];
                break;
            // waiting verfication
            case 1:
                $scholar = [
                    'status' => 1,
                    'alert' => 'info',
                    'message' => 'Berkas pendaftaran beasiswamu telah terkirim, harap tunggu informasi selanjutnya',
                ];
                break;
            // accepted
            case 2:
                $scholar = [
                    'status' => 2,
                    'alert' => 'success',
                    'message' => '<b>Selamat</b>! Berkas pendaftaran beasiswa telah diterima, harap tunggu Tim kami untuk menghubungimu',
                ];
                break;
            // rejected
            case 3:
                $scholar = [
                    'status' => 3,
                    'alert' => 'danger',
                    'message' => '<b>Mohon Maaf</b>. Berkas pendaftaran beasiswamu telah kami tolak, jangan putus asa.',
                ];
                break;
            
            default:
                $scholar = [
                    'status' => false,
                    'alert' => 'warning',
                    'message' => 'Kamu belum mendaftaran diri untuk beasiswa, harap daftarkan diri sekarang',
                ];
                break;
        }

        return $scholar;

    }
    // MAILER SENDER
    public function send_email($email, $subject, $message)
    {
        $mail = [
                'to' => $email,
                'subject' => $subject,
                'message' => $message
            ];

        if ($this->mailer->send($mail) == true) {
            return true;
        } else {
            return false;
        }
    }
}
