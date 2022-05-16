<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    // construct
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_home', 'M_admin']);
    }
	
	public function index()
	{
		$data['hero_section'] = $this->M_home->get_homeSection('hero');
		$data['web_motto'] = $this->M_home->get_settingsValue('web_motto');
		$data['home_sinopsis'] = $this->M_home->get_homeSection('sinopsis');
		$data['home_manfaat'] = $this->M_home->get_homeSection('manfaat');
		$data['home_benefit'] = $this->M_home->get_homeSection('benefit');
		$data['home_gallery'] = $this->M_home->get_homeSection('gallery');

        $data['web_whatsapp'] = $this->M_home->get_settingsValue('web_whatsapp');
        $data['web_email'] = $this->M_home->get_settingsValue('web_email');

		// statistik
		$data['statistik'] = $this->M_home->get_statistik();

		$this->templatefront->view('home/home', $data);
	}

	public function aboutUs()
	{
		$data['web_about'] = $this->M_home->get_settingsValue('web_about');
        $data['web_motto'] = $this->M_home->get_settingsValue('web_motto');
		$data['about_gallery'] = $this->M_home->get_aboutGallery();

		$this->templatefront->view('home/about', $data);
	}

	public function faq()
	{
        $data['faq'] = $this->M_home->get_faqContent();

		$this->templatefront->view('home/faq', $data);
	}

	public function announcements()
	{
        $data['announcement'] = $this->M_home->getAnnouncementHome();

		$this->templatefront->view('home/announcement', $data);
	}

	public function timeline()
	{
        $data['timeline'] = $this->M_admin->getTimelinelist();

		$this->templatefront->view('home/timeline', $data);
	}

	public function otherPrograms()
	{
		$data['op_bg'] = $this->M_home->get_settingsValue('op_bg');
		$data['op_desc'] = $this->M_home->get_settingsValue('op_desc');
        $data['op_content'] = $this->M_home->get_otherProgramsContent();

		$this->templatefront->view('home/other_programs', $data);
	}

	public function contribute()
	{
		$data['contribute_desc'] = $this->M_home->get_settingsValue('contribute_desc');
		$data['contribute_an_rekening'] = $this->M_home->get_settingsValue('contribute_an_rekening');
        $data['contribute_rekening'] = $this->M_home->get_settingsValue('contribute_rekening');
        $data['contribute_whatsapp'] = $this->M_home->get_settingsValue('contribute_whatsapp');

		$this->templatefront->view('home/contribute', $data);
	}

	public function notFound()
	{
        $data['web_icon'] = $this->M_home->get_settingsValue('web_icon');
        $data['web_icon_white'] = $this->M_home->get_settingsValue('web_icon_white');
        $data['web_logo'] = $this->M_home->get_settingsValue('web_logo');
        $data['web_logo_white'] = $this->M_home->get_settingsValue('web_logo_white');

        $data['web_title'] = $this->M_home->get_settingsValue('web_title');
        $data['web_desc'] = $this->M_home->get_settingsValue('web_desc');
        $data['web_address'] = $this->M_home->get_settingsValue('web_address');

        $data['web_whatsapp'] = $this->M_home->get_settingsValue('web_whatsapp');
        $data['web_facebook'] = $this->M_home->get_settingsValue('web_facebook');
        $data['web_instagram'] = $this->M_home->get_settingsValue('web_instagram');
        $data['web_twitter'] = $this->M_home->get_settingsValue('web_twitter');
        $data['web_youtube'] = $this->M_home->get_settingsValue('web_youtube');

		$this->load->view('home/not_found', $data);
	}

	public function privacy()
	{
		$this->templatefront->view('home/privacy');
	}
}
