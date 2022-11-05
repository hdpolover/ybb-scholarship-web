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
            $this->session->set_flashdata('notif_warning', "Please login to continue");
            redirect('login');
        }

        if ($this->session->userdata('role') == 2) {
            $this->session->set_flashdata('warning', "You don`t have access to this page");
            redirect(base_url());
        }
    }

    public function export(){
        
        $data = $this->input->get('data');

        switch ($data) {
            case 'scholarshipApplicants':
                $this->excel->exportScholarship('applicants');
                break;

            case 'scholarshipMembers':
                $this->excel->exportScholarship('members');
                break;

            case 'user-active':
                $this->excel->exportUsers(1);
                break;

            case 'user-unverified':
                $this->excel->exportUsers(0);
                break;
            
            default:
                echo "cant find";
                break;
        }

    }

    public function index()
    {
        $data['pendaftaran_buka'] = $this->M_home->get_settingsValue('pendaftaran_buka');
        $data['pendaftaran_max'] = $this->M_home->get_settingsValue('pendaftaran_max');
        $count = $this->M_admin->countDashboard();

        $data['users'] = $count['users'];
        $data['members'] = $count['members'];
        $this->templateback->view('admin/dashboard', $data);
    }

    public function statistik()
    {   

        // statistik
        $data['statistik'] = $this->M_home->get_statistik();

        // school chart
        $statChartSchool = $this->M_admin->getChartSchool();
        foreach($statChartSchool as $val):
            $school = $val->school == null ? 'Tidak Mengisi' : str_replace("'", "`", $val->school);
            if($school != '-' || $school != ' - ' || $school != ''){
                $data['arrChartSchool']['school'][] = "'".strip_tags($school)."'";
                $data['arrChartSchool']['jmlPeserta'][] = $val->count;
            }
        endforeach;

        // field of study chart
        $statChartField = $this->M_admin->getChartFieldStudy();
        foreach($statChartField as $val):
            $field_study = $val->field_study == null ? 'Tidak Mengisi' : str_replace("'", "`", $val->field_study);
            if($field_study != '-' || $field_study != ' - ' || $field_study != ''){
                $data['arrChartField']['fieldStudy'][] = "'".strip_tags($field_study)."'";
                $data['arrChartField']['jmlPeserta'][] = $val->count;
            }
        endforeach;

        // current gpa chart
        $statChartGPA = $this->M_admin->getChartGPA();
        foreach($statChartGPA as $val):
            $data['arrChartGPA']['gpa'][] = "'".$val->current_gpa."'";
            $data['arrChartGPA']['jmlPeserta'][] = $val->count;
        endforeach;

        // semester chart
        $statChartSemester = $this->M_admin->getChartSemester();
        foreach($statChartSemester as $val):
            $data['arrChartSemester']['semester'][] = "'Semester ".$val->semester."'";
            $data['arrChartSemester']['jmlPeserta'][] = $val->count;
        endforeach;

        // gender chart
        $statChartGender = $this->M_admin->getChartGender();
        foreach ($statChartGender as $val):
            $data['arrChartGender']['gender'][] = "'".$val->gender."'";
            $data['arrChartGender']['jmlPeserta'][] = $val->count;
        endforeach;

        // daiily chart
        $statChartDaily = $this->M_admin->getChartDaily();
        foreach ($statChartDaily as $val):
            // $data['arrChartDaily']['created_at'][] = "'".date("Y-m-d\TH:i:s\.v\Z", $val->created_at)."'";
            $data['arrChartDaily']['created_at'][] = "'".$val->created_at."'";
            $data['arrChartDaily']['jmlPeserta'][] = $val->count;
        endforeach;

        // daily  account chart
        $statChartDailyAccount = $this->M_admin->getChartDailyAccount();
        foreach ($statChartDailyAccount as $val):
            // $data['arrChartDailyAccount']['created_at'][] = "'".date("Y-m-d\TH:i:s\.v\Z", $val->created_at)."'";
            $data['arrChartDailyAccount']['created_at'][] = "'".$val->created_at."'";
            $data['arrChartDailyAccount']['jmlPeserta'][] = $val->count;
        endforeach;
        
        if(!empty($statChartDaily) && !empty(!empty($statChartDailyAccount))){
            $data['arrChartDailyDate'] = array_unique(array_merge($data['arrChartDailyAccount']['created_at'], $data['arrChartDaily']['created_at']), SORT_REGULAR);
        }else{
            $data['arrChartDailyDate'] = null;
        }
        
        $this->templateback->view('admin/statistik_bar', $data);
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

    public function timeline()
    {
        $data['timeline'] = $this->M_admin->getTimelinelist();
        $this->templateback->view('admin/timeline', $data);
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
                $data['web_whatsapp'] = $this->M_home->get_settingsValue('web_whatsapp');
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
                $data['home_benefit'] = $this->M_home->get_homeSection('benefit');
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

            case 'scholarship':
                $data['pendaftaran_buka'] = $this->M_home->get_settingsValue('pendaftaran_buka');
                $data['pendaftaran_max'] = $this->M_home->get_settingsValue('pendaftaran_max');

                if($data['pendaftaran_max'] < date("Y-m-d")){
                    $this->M_admin->tutupPendaftaran(0);
                }else{
                    $this->M_admin->tutupPendaftaran(1);
                }
                
                $this->templateback->view('admin/settings/pendaftaran', $data);
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
			echo "<center class='py-5'><h4>There is an error when trying get user's datails!</h4></center>";
		}
    }

    public function getDetailApplicant(){

        $user_id = $this->input->post('user_id');

		if ($this->M_user->getScholarshipData($user_id) != false) {
            $data['scholar'] = $this->M_user->getScholarshipData($user_id);

            $this->load->view('admin/ajax/user_applicant', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user applicant's data!</h4></center>";
		}
    }

    public function getEditHeroAjax(){

        $id = $this->input->post('id');

		if ($this->M_admin->getDetailhero($id) != false) {
            $data['hero'] = $this->M_admin->getDetailhero($id);
            
            $this->load->view('admin/ajax/edit_hero', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get hero's data!</h4></center>";
		}
    }

    public function getDetailAnnouncement(){

        $id = $this->input->post('id');

		if ($this->M_admin->getDetailAnnouncement($id) != false) {
            $data['item'] = $this->M_admin->getDetailAnnouncement($id);

            $this->load->view('admin/ajax/edit_annoucement', $data);

		} else {
			echo "<center class='py-5'><h4>There is an error when trying get user applicant's data!</h4></center>";
		}
    }

    function addAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->addAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly posted the announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to post the announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    function editAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->editAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly editted the  announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    function deleteAnnouncement()
    {
        $subject = $this->input->post('subject');
        if ($this->M_admin->deleteAnnouncement() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted announcement '.$subject);
            redirect(site_url('information/announcement'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the announcement, try again later');
            redirect($this->agent->referrer());
        }
    }

    // settings

    function changeContribute(){
        if ($this->M_admin->changeContribute() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed contribute content page');
            redirect(site_url('settings/website?page=contribute'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change contribute content page, try again later');
            redirect($this->agent->referrer());
        }
    }

    // faq

    function addFaq()
    {
        if ($this->M_admin->addFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly added a new faq content');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add new faq content, try again later');
            redirect($this->agent->referrer());
        }
    }

    function editFaq()
    {
        if ($this->M_admin->editFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly editted a faq ');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit faq, try again later');
            redirect($this->agent->referrer());
        }
    }

    function deleteFaq()
    {
        if ($this->M_admin->deleteFaq() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted a faq ');
            redirect(site_url('settings/website?page=faq'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete faq, try again later');
            redirect($this->agent->referrer());
        }
    }

    // about

    function changeAboutContent()
    {
        if ($this->M_admin->changeAboutContent() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed the about content page');
            redirect(site_url('settings/website?page=about'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change the about content page, try again later');
            redirect($this->agent->referrer());
        }
    }

    // about gallery

    function addAboutGallery()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/about/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addAboutGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly added new Gallery Item');
                    redirect(site_url('settings/website?page=about'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add new Gallery Item, try again later');
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
        if ($_FILES['image']['name']) {
            $path = "berkas/about/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editAboutGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly editted the Gallery Item ');
                    redirect(site_url('settings/website?page=about'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Gallery Item, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->editAboutGallery($this->input->post('old_image')) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly editted the Gallery Item ');
                redirect(site_url('settings/website?page=about'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Gallery Item, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    function deleteAboutGallery()
    {
        if ($this->M_admin->deleteAboutGallery() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted the Gallery Item ');
            redirect(site_url('settings/website?page=about'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Gallery Item, try again later');
            redirect($this->agent->referrer());
        }
    }

    // Other Program

    function changeOtherProgramContent()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/other-program/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->changeOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly changed the other program content page');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change the other program content page, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->changeOtherProgramContent(false) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly changed the other program content page');
                redirect(site_url('settings/website?page=programs'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change the other program content page, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    // about gallery

    function addOtherProgramContent()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/other-program/content/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly added a new Other Program Content');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add a new Other Program Content, try again later');
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
        if ($_FILES['image']['name']) {
            $path = "berkas/other-program/content/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editOtherProgramContent($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly editted the Other Program Content ');
                    redirect(site_url('settings/website?page=programs'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Other Program Content, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->editOtherProgramContent($this->input->post('old_image')) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly editted the Other Program Content ');
                redirect(site_url('settings/website?page=programs'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Other Program Content, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    function deleteOtherProgramContent()
    {
        if ($this->M_admin->deleteOtherProgramContent() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted the Other Program Content ');
            redirect(site_url('settings/website?page=programs'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Other Program Content, try again later');
            redirect($this->agent->referrer());
        }
    }

    // home

    function changeHomeContent()
    {
        if ($this->M_admin->changeHomeContent() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed the home content page');
            redirect(site_url('settings/website?page=home'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change the home content page, try again later');
            redirect($this->agent->referrer());
        }
    }

    function addHomeBenefit()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/benefit/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addHomeBenefit($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly added the new Benefit Component');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add the new Benefit Component, try again later');
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

    function editHomeBenefit()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/benefit/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editHomeBenefit($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly editted the Benefit Component ');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Benefit Component, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->editHomeBenefit($this->input->post('old_image')) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly editted the Benefit Component ');
                redirect(site_url('settings/website?page=home'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Benefit Component, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    function deleteHomeBenefit()
    {
        if ($this->M_admin->deleteHomeBenefit() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted Benefit Component ');
            redirect(site_url('settings/website?page=home'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Benefit Component, try again later');
            redirect($this->agent->referrer());
        }
    }


    function addHomeGallery()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->addHomeGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly added a new Gallery Item');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add the new Gallery Item, try again later');
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

    function editHomeGallery()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/gallery/";
            $upload = $this->uploader->uploadImage($_FILES['image'], $path);
            
            if ($upload == true) {
                if ($this->M_admin->editHomeGallery($upload['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly editted the Gallery Item ');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Gallery Item, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            if ($this->M_admin->editHomeGallery($this->input->post('old_image')) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly editted the Gallery Item ');
                redirect(site_url('settings/website?page=home'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the Gallery Item, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    function deleteHomeGallery()
    {
        if ($this->M_admin->deleteHomeGallery() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted the Gallery Item ');
            redirect(site_url('settings/website?page=home'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Gallery Item, try again later');
            redirect($this->agent->referrer());
        }
    }

    function addHomeHero()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/hero/";
            $upload = $this->uploader->uploadImageMulti($_FILES['image'], 'image', $path);
            
            if ($upload == true) {
                $icon = $this->uploader->uploadImageMulti($_FILES['icon'], 'icon', $path);

                if ($this->M_admin->addHomeHero($upload['filename'], $icon['filename']) == true) {
                    $this->session->set_flashdata('notif_success', 'Succesfuly added a new Hero Component');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add the new Hero Component, try again later');
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

    function editHomeHero()
    {
        if ($_FILES['image']['name']) {
            $path = "berkas/home/hero/";
            $upload = $this->uploader->uploadImageMulti($_FILES['image'], 'image', $path);
            
            if ($upload == true) {
                $icon = $this->uploader->uploadImageMulti($_FILES['icon'], 'icon', $path);

                if ($this->M_admin->editHomeHero($upload['filename'], $icon['filename']) == true) {

                    $this->session->set_flashdata('notif_success', 'Succesfuly added the new Hero Component');
                    redirect(site_url('settings/website?page=home'));
                } else {
                    $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the new Hero Component, try again later');
                    redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('notif_warning', $upload['message']);
                redirect($this->agent->referrer());
            }
        } else {
            $path = "berkas/home/hero/";

            $icon = $this->uploader->uploadImageMulti($_FILES['icon'], 'icon', $path);

            if ($this->M_admin->editHomeHero($this->input->post('old_image'), $icon['filename']) == true) {
                $this->session->set_flashdata('notif_success', 'Succesfuly added the new Hero Component');
                redirect(site_url('settings/website?page=home'));
            } else {
                $this->session->set_flashdata('notif_warning', 'There is a problem when trying to edit the new Hero Component, try again later');
                redirect($this->agent->referrer());
            }
        }
    }

    function deleteHomeHero($id)
    {
        if ($this->M_admin->deleteHomeHero($id) == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted the Hero Component ');
            redirect(site_url('settings/website?page=home'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Hero Component, try again later');
            redirect($this->agent->referrer());
        }
    }

    // timeline

    function addTimeline()
    {
        if ($this->M_admin->addTimeline() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly added a Timeline ');
            redirect(site_url('information/timeline'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to add the Timeline, try again later');
            redirect($this->agent->referrer());
        }

    }

    function editTimeline()
    {
        if ($this->M_admin->editTimeline() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed the Timeline ');
            redirect(site_url('information/timeline'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change the Timeline, try again later');
            redirect($this->agent->referrer());
        }

    }

    function deleteTimeline()
    {
        if ($this->M_admin->deleteTimeline() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly deleted the Timeline ');
            redirect(site_url('information/timeline'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to delete the Timeline, try again later');
            redirect($this->agent->referrer());
        }
    }

    // basic

    function changeBasicInfo()
    {
        if ($this->M_admin->changeBasicInfo() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed basic information');
            redirect(site_url('settings/website?page=basic'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change basic information, try again later');
            redirect($this->agent->referrer());
        }
    }

    // register scholarship

    function changeScholarReg()
    {
        if ($this->M_admin->changeScholarReg() == true) {
            $data['pendaftaran_max'] = $this->M_home->get_settingsValue('pendaftaran_max');

            if($data['pendaftaran_max'] < date("Y-m-d")){
                $this->M_admin->tutupPendaftaran(0);
            }

            $this->session->set_flashdata('notif_success', 'Succesfuly change settings ');
            redirect(site_url('settings/website?page=scholarship'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change settings, try again later');
            redirect($this->agent->referrer());
        }
    }


    // mailer

    function changeMailerInfo()
    {
        if ($this->M_admin->changeMailerInfo() == true) {
            $this->session->set_flashdata('notif_success', 'Succesfuly changed mailer information');
            redirect(site_url('settings/website?page=mailer'));
        } else {
            $this->session->set_flashdata('notif_warning', 'There is a problem when trying to change mailer information, try again later');
            redirect($this->agent->referrer());
        }
    }

    function testMailer(){
        if ($this->send_email($this->input->post('email'), 'Test email mailer for YBB Foundation Scholarship website', 'This is a Test Email on '.date('d M Y - H:i:s')) == true) {
            $this->session->set_flashdata('success', 'Succesfuly tested mailer for the current setting');
            redirect(site_url('settings/website?page=mailer'));
        } else {
            $this->session->set_flashdata('warning', 'There is a problem when trying to test mailer, try again later');
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
