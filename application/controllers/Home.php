<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->templatefront->view('home/home');
	}

	public function aboutUs()
	{
		$this->templatefront->view('home/about');
	}

	public function faq()
	{
		$this->templatefront->view('home/faq');
	}

	public function otherPrograms()
	{
		$this->templatefront->view('home/other_programs');
	}

	public function contribute()
	{
		$this->templatefront->view('home/contribute');
	}

	public function notFound()
	{
		$this->load->view('home/not_found');
	}
}
