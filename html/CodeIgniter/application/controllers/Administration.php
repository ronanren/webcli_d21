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
			if ($this->session->userdata("user_id") == null) {
				$this->session->set_flashdata('error_msg', 'You are not connected.');
				redirect(base_url('user/login_view'));
			}
			$data['users'] = $this->User_model->users_list();
			$data['title'] = 'Administration';
			$data['content'] = 'administration';
			$this->load->vars($data);
			$this->load->view('template');
		}
	}
