<<<<<<< HEAD:html/CodeIgniter/application/controllers/Games.php
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
=======
<?php
class Games extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Game_model');
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

    public function create()
    {
        $data['title'] = 'Create Game';
        $this->load->view('games/create', $data);
    }

    public function edit($id)
    {
        $id = $this->uri->segment(3);
        $data = [];

        if (empty($id)) {
            show_404();
        } else {
            $data['game'] = $this->game_model->get_games_by_id($id);
            $this->load->view('games/edit', $data);
        }
    }

    public function store()
    {

        $this->form_validation->set_rules('guid', 'guid', 'required');
        $this->form_validation->set_rules('titre', 'title', 'required');
        $this->form_validation->set_rules('sortie', 'release date', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('couverture', 'cover', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() === FALSE) {
            if (empty($id)) {
                redirect(base_url('game/create'));
            } else {
                redirect(base_url('game/edit/' . $id));
            }
        } else {
            $data['game'] = $this->game_model->createOrUpdate();
            redirect(base_url('game'));
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $games = $this->game_model->delete($id);

        redirect(base_url('game'));
    }
}
>>>>>>> ae7edd635e16e264fa6275398119252ebdc5eec0:application/controllers/Games.php
