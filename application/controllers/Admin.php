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

    public function announcement()
    {
        $data['announcement'] = $this->M_admin->getAnnouncementlist();
        $this->templateback->view('admin/announcement', $data);
    }

    public function settingWebsite()
    {
        $page = $this->input->get('page');

        switch ($page) {
            case 'basic':
                $data['web_title'] = $this->M_home->get_settingsValue('web_title');
                $data['web_icon'] = $this->M_home->get_settingsValue('web_icon');
                $data['web_logo'] = $this->M_home->get_settingsValue('web_logo');
                $data['web_desc'] = $this->M_home->get_settingsValue('web_desc');
                $data['web_address'] = $this->M_home->get_settingsValue('web_address');
                $data['web_phone'] = $this->M_home->get_settingsValue('web_phone');
                $data['web_facebook'] = $this->M_home->get_settingsValue('web_facebook');
                $data['web_instagram'] = $this->M_home->get_settingsValue('web_instagram');
                $data['web_twitter'] = $this->M_home->get_settingsValue('web_twitter');
                $data['web_youtube'] = $this->M_home->get_settingsValue('web_youtube');

                $this->templateback->view('admin/settings/basic', $data);
                break;

            case 'credentials':
                $data['super_account'] = $this->M_admin->get_superAccount();
                $data['admin_account'] = $this->M_admin->get_adminAccount();

                $this->templateback->view('admin/settings/credentials', $data);
                break;

            case 'mailer':
                $data['mailer_mode'] = $this->M_home->get_settingsValue('mailer_mode');
                $data['mailer_host'] = $this->M_home->get_settingsValue('mailer_host');
                $data['mailer_port'] = $this->M_home->get_settingsValue('mailer_port');
                $data['mailer_alias'] = $this->M_home->get_settingsValue('mailer_alias');
                $data['mailer_username'] = $this->M_home->get_settingsValue('mailer_username');
                $data['mailer_password'] = $this->M_home->get_settingsValue('mailer_password');

                $this->templateback->view('admin/settings/mailer', $data);
                break;

            case 'home':
                $data['hero_section'] = $this->M_home->get_homeSection('hero');
                $data['web_motto'] = $this->M_home->get_settingsValue('web_motto');
                $data['home_sinopsis'] = $this->M_home->get_homeSection('sinopsis');
                $data['home_manfaat'] = $this->M_home->get_homeSection('manfaat');
                $data['home_gallery'] = $this->M_home->get_homeSection('gallery');

                $this->templateback->view('admin/settings/home', $data);
                break;

            case 'about':
                $data['web_about'] = $this->M_home->get_settingsValue('web_about');
                $data['web_motto'] = $this->M_home->get_settingsValue('web_motto');
                $data['about_gallery'] = $this->M_home->get_aboutGallery();

                $this->templateback->view('admin/settings/about', $data);
                break;

            case 'faq':
                $data['faq'] = $this->M_home->get_faqContent();

                $this->templateback->view('admin/settings/faq', $data);
                break;

            case 'programs':
                $data['op_bg'] = $this->M_home->get_settingsValue('op_bg');
                $data['op_desc'] = $this->M_home->get_settingsValue('op_desc');
                $data['op_content'] = $this->M_home->get_otherProgramsContent();

                $this->templateback->view('admin/settings/programs', $data);
                break;

            case 'contribute':
                $data['contribute_desc'] = $this->M_home->get_settingsValue('contribute_desc');
                $data['contribute_an_rekening'] = $this->M_home->get_settingsValue('contribute_an_rekening');
                $data['contribute_rekening'] = $this->M_home->get_settingsValue('contribute_rekening');
                $data['contribute_whatsapp'] = $this->M_home->get_settingsValue('contribute_whatsapp');

                $this->templateback->view('admin/settings/contribute', $data);
                break;
            
            default:
                $this->templateback->view('admin/settings');
                break;
        }
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

    public function getDetailAnnouncement(){

        $id = $this->input->post('id');

		if ($this->M_admin->getDetailAnnouncement($id) != false) {
            $data['item'] = $this->M_admin->getDetailAnnouncement($id);

            $this->load->view('admin/ajax/edit_annoucement', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user applicant data`s !</h4></center>";
		}
    }

    function addAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->addAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly post announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying post announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    function editAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->editAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly edit announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying edit announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    function deleteAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->deleteAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly delete announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying delete announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    // settings

    function changeContribute(){
        if ($this->M_admin->changeContribute() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changes contribute content page');
            redirect(site_url('settings/website?page=contribute'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying changes contribute content page, try again later');
            redirect($this->agent->referrer());
        }
    }

    // faq

    function addFaq()
    {
        if ($this->M_admin->addFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly add new faq content');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying add new faq,content try again later');
            redirect($this->agent->referrer());
        }
    }

    function editFaq()
    {
        if ($this->M_admin->editFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly edit faq ');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying edit faq, try again later');
            redirect($this->agent->referrer());
        }
    }

    function deleteFaq()
    {
        if ($this->M_admin->deleteFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly delete faq ');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying delete faq, try again later');
            redirect($this->agent->referrer());
        }
    }

    // about

    function changeAboutContent()
    {
        if ($this->M_admin->changeAboutContent() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changes about content page');
            redirect(site_url('settings/website?page=about'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying changes about content page, try again later');
            redirect($this->agent->referrer());
        }
    }

    // about gallery

    function addAboutGallery()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/about/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addAboutGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly add new Gallery Item');
                    redirect(site_url('settings/website?page=about'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying add new Gallery Item, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Please select a file');
            redirect($this->agent->referrer());
        }
    }

    function editAboutGallery()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/about/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editAboutGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly edit Gallery Item ');
                    redirect(site_url('settings/website?page=about'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying edit Gallery Item, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Please select a file');
            redirect($this->agent->referrer());
        }
    }

    function deleteAboutGallery()
    {
        if ($this->M_admin->deleteAboutGallery() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly delete Gallery Item ');
            redirect(site_url('settings/website?page=about'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying delete Gallery Item, try again later');
            redirect($this->agent->referrer());
        }
    }

    // Other Program

    function changeOtherProgramContent()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/other-program/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->changeOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly changes other program content page');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying changes other program content page, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->changeOtherProgramContent(false) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly changes other program content page');
                redirect(site_url('settings/website?page=programs'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying changes other program content page, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    // about gallery

    function addOtherProgramContent()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/other-program/content/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly add new Other Program Content');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying add new Other Program Content, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Please select a file');
            redirect($this->agent->referrer());
        }
    }

    function editOtherProgramContent()
    {
        if (isset($_FILES['image'])) {
            $path = "berkas/other-program/content/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly edit Other Program Content ');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying edit Other Program Content, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('notif_warning', 'Please select a file');
            redirect($this->agent->referrer());
        }
    }

    function deleteOtherProgramContent()
    {
        if ($this->M_admin->deleteOtherProgramContent() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly delete Other Program Content ');
            redirect(site_url('settings/website?page=programs'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying delete Other Program Content, try again later');
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
