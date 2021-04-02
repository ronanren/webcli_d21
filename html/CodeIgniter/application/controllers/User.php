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
            if ($data['users'][0]['role'] === 'banned') {
                $this->session->set_flashdata('error_msg', 'You are not allowed to login because you account is banned.');
                redirect(base_url('user/login_view'));
            } else {
                $this->session->set_userdata('user_id', $data['users'][0]['id']);
                $this->session->set_userdata('user_name', $data['users'][0]['username']);
                $this->session->set_userdata('user_role', $data['users'][0]['role']);

                redirect(base_url("games"));
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Wrong combination of username and password. Please retry.');
            redirect(base_url('user/login_view'));
        }
    }

    public function profile()
    {
        if ($this->session->userdata("user_id") == null) {
            $this->session->set_flashdata('error_msg', 'You are not connected.');
            redirect(base_url('user/login_view'));
        }
        $data['title'] = 'Profile';
        $data['content'] = 'user/profile';
        $this->load->vars($data);
        $this->load->view('template');
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success_msg', 'You have been disconnected successfully.');
        redirect(base_url('user/login_view'));
    }

    public function user_ban($id)
    {
        $user = $this->user_model->get_user_by_id($id);
        $this->user_model->user_ban($id);
        $this->session->set_flashdata('success_msg', $user->username . ' has been banned successfully.');
        redirect(base_url('administration'));
    }

    public function user_unban($id)
    {
        $user = $this->user_model->get_user_by_id($id);
        $this->user_model->user_unban($id);
        $this->session->set_flashdata('success_msg', $user->username . ' has been unbanned successfully.');
        redirect(base_url('administration'));
    }

    public function user_grant_admin($id)
    {
        $user = $this->user_model->get_user_by_id($id);
        $this->user_model->user_grant_admin($id);
        $this->session->set_flashdata('success_msg', $user->username . ' has been granted admin access successfully.');
        redirect(base_url('administration'));
    }

    public function user_ungrant_admin($id)
    {
        $user = $this->user_model->get_user_by_id($id);
        $this->user_model->user_ungrant_admin($id);
        $this->session->set_flashdata('success_msg', $user->username . ' has been ungranted admin access successfully.');
        redirect(base_url('administration'));
    }

    public function user_delete($id)
    {
        $user = $this->user_model->get_user_by_id($id);
        $this->user_model->user_delete($id);
        $this->session->set_flashdata('success_msg', $user->username . ' has been deleted successfully.');
        redirect(base_url('administration'));
    }
}
