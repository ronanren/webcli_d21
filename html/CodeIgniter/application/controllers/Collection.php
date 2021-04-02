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
        $data['games'] = $this->Collection_model->get_games_by_collection_id(1);
        $data['title'] = 'Collection';
        $data['content'] = 'collection/index';

        $this->load->vars($data);
        $this->load->view('template');
    }

    public function AddToCollection($idGame)
    {
        var_dump($idGame);
    }
}
