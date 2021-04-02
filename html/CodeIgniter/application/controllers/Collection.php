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
        if ($this->session->userdata("user_id") == null) {
            $this->session->set_flashdata('error_msg', 'You are not connected.');
            redirect(base_url('user/login_view'));
        }
        $data['games'] = $this->Collection_model->get_games_by_user_id($this->session->userdata("user_id"));
        $data['title'] = 'Collection';
        $data['content'] = 'collection/index';

        $this->load->vars($data);
        $this->load->view('template');
    }

    public function AddToCollection($idGame)
    {
        if ($this->session->userdata("user_id") == null) {
            $this->session->set_flashdata('error_msg', 'You are not connected.');
            redirect(base_url('user/login_view'));
        }

        $result = $this->Collection_model->createOrUpdate($idGame);
        $game = $this->Game_model->get_game_by_id($idGame);

        if ($result) {
            $this->session->set_flashdata('success_msg', $game->titre . ' added to your collection.');
        } else {
            $this->session->set_flashdata('error_msg', $game->titre . ' is already in your collection.');
        }
        redirect(base_url('Games'));
    }

    public function RemoveToCollection($idGame)
    {
        if ($this->session->userdata("user_id") == null) {
            $this->session->set_flashdata('error_msg', 'You are not connected.');
            redirect(base_url('user/login_view'));
        }
        $this->Collection_model->delete($idGame);
        $game = $this->Game_model->get_game_by_id($idGame);
        $this->session->set_flashdata('success_msg', $game->titre . ' deleted to your collection.');
        redirect(base_url('Collection'));
    }
}
