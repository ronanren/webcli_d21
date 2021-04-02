<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Register';
        $data['content'] = 'user/register';
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function register_user()
    {
        $user = array(
            'username' => $this->input->post('user_name'),
            'password' => md5($this->input->post('user_password'))
        );

        $name_check = $this->user_model->name_check($user['username']);

        if ($name_check) {
            $this->user_model->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully. You can login to your account.');
            redirect('user/login_view');
        } else {
            $this->session->set_flashdata('error_msg', 'This username is already taken by another user.');
            redirect('user');
        }
    }

    public function login_view()
    {
        $data['title'] = 'Login';
        $data['content'] = 'user/login';
        $this->load->vars($data);
        $this->load->view('template');
    }

    function login_user()
    {
        $user_login = array(
            'username' => $this->input->post('user_name'),
            'password' => md5($this->input->post('user_password'))
        );

        $data['users'] = $this->user_model->login_user($user_login['username'], $user_login['password']);

        if ($data['users']) {
            $this->session->set_userdata('user_id', $data['users'][0]['id']);
            $this->session->set_userdata('user_name', $data['users'][0]['username']);
            $this->load->view('user/profile.php', $data);
        } else {
            $this->session->set_flashdata('error_msg', 'Wrong combination of username and password. Please retry.');
            redirect('user/login_view');
        }
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }
}
