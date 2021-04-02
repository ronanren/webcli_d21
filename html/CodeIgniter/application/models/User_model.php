<?php
class User_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register_user($user)
    {
        $this->db->insert('users', $user);
    }

    public function login_user($name, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $name);
        $this->db->where('password', $pass);

        if ($query = $this->db->get())
            return $query->result_array();
        else
            return false;
    }

    public function name_check($name)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $name);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return false;
        else
            return true;
    }

    public function user_ban($id)
    {
        $this->db->where('id', $id);
        $this->db->update('role', "banned");
    }

    public function user_unban($id)
    {
        $this->db->where('id', $id);
        $this->db->update('role', "collector");
    }

    public function user_grantAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->update('role', "admin");
    }

    public function user_delete($id)
    {
        $this->db->query("DELETE FROM users WHERE id = $id");
    }
}
