<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_home','M_auth', 'M_admin', 'M_user']);

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

        if ($this->session->userdata('role') == 2) {
            $this->session->set_flashdata('warning', "You don`t have access to this page");
            redirect(base_url());
        }
    }

    public function index()
    {
        $count = $this->M_admin->countDashboard();

        $data['users'] = $count['users'];
        $data['members'] = $count['members'];
        $this->templateback->view('admin/dashboard', $data);
    }

    public function userList()
    {
        $data['users'] = $this->M_admin->getUserlist();
        $this->templateback->view('admin/data_user', $data);
    }

    public function settingWebsite()
    {
        $this->templateback->view('admin/settings');
    }

    public function getDetailUser(){

        $user_id = $this->input->post('user_id');

		if ($this->M_user->getDetailUser($user_id) != false) {

			$data['user'] = $this->M_user->getDetailUser($user_id);

            $this->load->view('admin/ajax/user_detail', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user datail !</h4></center>";
		}
    }

    public function getDetailApplicant(){

        $user_id = $this->input->post('user_id');

		if ($this->M_user->getScholarshipData($user_id) != false) {
            $data['scholar'] = $this->M_user->getScholarshipData($user_id);

            $this->load->view('admin/ajax/user_applicant', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user applicant data`s !</h4></center>";
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
