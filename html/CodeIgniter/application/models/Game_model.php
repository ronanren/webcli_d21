<?php
class Game_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function games_list()
    {
        $query = $this->db->get('games');
        return $query->result_array();
    }

    public function get_game_by_id($id)
    {
        $query = $this->db->get_where('games', array('id' => $id));
        return $query->row();
    }
}
