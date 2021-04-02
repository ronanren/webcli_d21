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
        $game = $this->Game_model->get_game_by_id($idGame);
        if ($this->Collection_model->get_association($idGame, $this->session->userdata("user_id"))) {
            $this->session->set_flashdata('error_msg', $game->titre . ' is already in your collection.');
            redirect(base_url('Games'));
        }

        $query = $this->Collection_model->get_games_by_user_id($this->session->userdata("user_id"));
        $nbrInCollection = sizeof($query);

        if ($nbrInCollection == 5) {
            $mostRecent = $this->Collection_model->get_most_recent();
            $mostRecentName = $this->Game_model->get_game_by_id($mostRecent->game_id);
            $this->Collection_model->delete($mostRecent->game_id);
        }

        $this->Collection_model->createOrUpdate($idGame);

        if ($nbrInCollection == 5)
            $this->session->set_flashdata('success_msg', $game->titre . ' added to your collection. You have 5 games, we deleted the last game of your collection (' . $mostRecentName->titre . ').');
        else
            $this->session->set_flashdata('success_msg', $game->titre . ' added to your collection.');
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
