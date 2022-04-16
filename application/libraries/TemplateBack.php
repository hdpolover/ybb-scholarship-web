<?php
class TemplateBack
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    function countScholar(){
        $query = $this->_ci->db->get_where('tb_scholarship', ['status !=' => 2]);
        return $query->num_rows();
    }

    function view($content, $data = null)
    {
        $data['countScholar'] = $this->countScholar();

        $this->_ci->load->view('template/backend/header', $data);
        $this->_ci->load->view('template/alert', $data);
        $this->_ci->load->view('template/backend/navbar', $data);
        $this->_ci->load->view('template/backend/sidebar', $data);
        $this->_ci->load->view($content, $data);
        $this->_ci->load->view('template/backend/footer', $data);
    }
}
