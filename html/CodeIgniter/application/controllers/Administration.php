 <?php
	class Administration extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->load->helper('url_helper');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
		}

		public function index()
		{
			$data['users'] = $this->User_model->users_list();
			$data['title'] = 'Administration';
			$data['content'] = 'Administration/administration';

			$this->load->vars($data);
			$this->load->view('template');
		}
	}
