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
        // $this->check_msg();
        $data['title'] = 'Register';
        $data['content'] = 'user/register';
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function register_user()
    {
        $user = array(
            'username' => $this->input->post('user_name'),
            'password' => $this->input->post('user_password'),
            'role' => "collector"
        );

        if (strlen($user['username']) > 3) {
            if (strlen($user['password']) > 3) {

                $user['password'] = md5($user['password']); // md5 hash of password
                $name_check = $this->user_model->name_check($user['username']); // check if the name is already taken by another user

                if ($name_check) {
                    $this->user_model->register_user($user);
                    $this->session->set_flashdata('success_msg', 'Registered successfully. You can login to your account.');
                    redirect(base_url('user/login_view'));
                } else {
                    $this->session->set_flashdata('error_msg', 'This username is already taken by another user.');
                    redirect(base_url('user'));
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Password length must be greater than 3 characters.');
                redirect(base_url('user'));
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Username length must be greater than 3 characters.');
            redirect(base_url('user'));
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
            $this->session->set_userdata('user_role', $data['users'][0]['role']);
            $this->load->view('user/profile.php', $data);
        } else {
            $this->session->set_flashdata('error_msg', 'Wrong combination of username and password. Please retry.');
            redirect(base_url('user/login_view'));
        }
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success_msg', 'You have been disconnected successfully.');
        redirect(base_url('user/login_view'), 'refresh');
    }
}
