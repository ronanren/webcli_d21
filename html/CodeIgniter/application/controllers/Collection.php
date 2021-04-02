<?php
class Collection extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Collection_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['collection'] = $this->Game_model->get_collection_by_id(1);
        $data['title'] = 'Collection';
        $data['content'] = 'games/list';
        
        $this->load->vars($data);
        $this->load->view('template');
    }
}
