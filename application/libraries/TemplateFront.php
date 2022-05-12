<?php
class TemplateFront
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    function getSettingsValue($key){
        $query = $this->_ci->db->get_where('tb_settings', ['key' => $key]);
        return $query->row()->value;
    }

    function view($content, $data = null)
    {
        $data['web_title'] = $this->getSettingsValue('web_title');
        $data['web_desc'] = $this->getSettingsValue('web_desc');


        $this->_ci->load->view('template/frontend/header', $data);
        $this->_ci->load->view('template/alert', $data);
        $this->_ci->load->view('template/frontend/navbar', $data);
        $this->_ci->load->view($content, $data);
        $this->_ci->load->view('template/frontend/footer', $data);
    }
}
