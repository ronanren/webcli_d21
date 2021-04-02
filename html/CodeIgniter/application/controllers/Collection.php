<?php
class Collection extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Collection_model');
        $this->load->model('Game_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
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
        $this->Collection_model->createOrUpdate($idGame);
        $game = $this->Game_model->get_game_by_id($idGame);
        $this->session->set_flashdata('success_msg', $game->titre . ' added to your collection.');
        redirect(base_url('Games'));
    }

    public function RemoveToCollection($idGame)
    {
        $this->Collection_model->delete($idGame);
        $game = $this->Game_model->get_game_by_id($idGame);
        $this->session->set_flashdata('success_msg', $game->titre . ' deleted to your collection.');
        redirect(base_url('Collection'));
    }
}
