<?php


class Templates
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function admin($content, $data = Null)
    {
        $this->ci->load->view('templates/v_templates_header');
        $this->ci->load->view('templates/v_templates_sidebar', $data);
        $this->ci->load->view($content, $data);
        $this->ci->load->view('templates/v_templates_footer');
        $this->ci->load->view('templates/v_templates_script', $data);
    }

    public function login($data = Null)
    {
        $this->ci->load->view('auth/v_login', $data);
    }
    
    public function signup($data = Null)
    {
        $this->ci->load->view('auth/v_signup', $data);
    }
}
