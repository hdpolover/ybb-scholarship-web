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
            $this->session->set_flashdata('notif_warning', "Please login, to continued");
            redirect('login');
        }

        // cek apakah akun user sudah aktif / suspend - 0: BELUM AKTIF - 1: AKTIF - 2: SUSPEND;
        $user = $this->M_auth->get_userByID($this->session->userdata('user_id'));
        if ($user->active == 0) {
            $this->session->set_flashdata('error', "Hi {$user->name}, please activated your account first");
            redirect(site_url('email-activation'));
        } elseif ($user->active == 2) {
            $this->session->set_flashdata('error', "Hi {$user->name}, your account has been suspended, please contact admin for more info");
            redirect(site_url('suspend'));
        }
    }

    public function index()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $this->templateuser->view('user/overview', $data);
    }

    public function scholarship()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $this->templateuser->view('user/scholarship', $data);
    }

    public function settings()
    {
        $data['user'] = $this->M_auth->get_auth($this->session->userdata('email'));

        $this->templateuser->view('user/settings', $data);
    }

    public function updateProfile(){

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

                    $this->session->set_flashdata('notif_success', 'Your profile has been updated');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'You not make any changes to your profile');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
            
        }else {

            if ($this->M_user->updateProfile(null) == true) {

                $session = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                ];

                $this->session->set_userdata($session);

                $this->session->set_flashdata('notif_success', 'Your profile has been updated');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('notif_warning', 'You not make any changes to your profile');
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
            delete_files($path, TRUE); 

            $this->session->set_flashdata('notif_success', 'Your picture profile has been reset');
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('notif_warning', 'There is an error when trying reset your picture profile');
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

                    $subject = "Password changes";
                    $message = "Hi, your password for account YBB Foundation Scholarship <b>{$email}</b> has been changes at {$now}. <br>If you don't feel like changing your password, please contact the admin immediately.";

                    // mengirimemailperubahan password
                    $this->send_email(htmlspecialchars($this->session->userdata("email"), true), $subject, $message);

                    $this->session->set_flashdata('notif_success', 'Your password has been reset');
                    redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is an error when trying reset your password');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', 'Password wrong, try again');
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Password confirmation doesn`t match');
            redirect($this->agent->referrer());
        }
    }


    // FUNCTION PRIVATE
    // MAILER SENDER
    function send_email($email, $subject, $message)
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
