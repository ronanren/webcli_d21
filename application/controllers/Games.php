<?php
class Games extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Game_model');
        $this->load->model('Collection_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['games'] = $this->Game_model->games_list();
        $data['title'] = 'Games List';
        $data['content'] = 'games/list';

        $this->load->vars($data);
        $this->load->view('template');
    }

    public function details($game_id)
    {
        $user_id = $this->session->userdata("user_id");
        $data['game'] = $this->Game_model->get_game_by_id($game_id);

        if (!$user_id) {
            $data['added'] = false;
        } else {
            $data['added'] = $this->Collection_model->get_association($game_id, $user_id) ? true : false;
        }
        $data['title'] = $data['game']->titre;
        $data['content'] = 'games/details';

        $this->load->vars($data);
        $this->load->view('template');
    }
}
