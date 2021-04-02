<?php
class Collection_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_games_by_user_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('collection');
        $this->db->where('user_id', $user_id);
        $this->db->join('games', 'games.id = collection.game_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function createOrUpdate($idGame)
    {
        $user_id = $this->session->userdata("user_id");
        $this->load->helper('url');
        $id = $this->input->post('id');

        $data = array(
            'user_id' => $user_id,
            'game_id' => $idGame
        );

        if ($this->get_association($idGame, $user_id)) {
            return false;
        }

        if (empty($id)) {
            return $this->db->insert('collection', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('collection', $data);
        }
    }

    public function delete($id)
    {
        $user_id = $this->session->userdata("user_id");
        $this->db->where(array('game_id' => $id, 'user_id' => $user_id));
        return $this->db->delete('collection');
    }

    public function get_association($game_id, $user_id)
    {
        $query = $this->db->get_where('collection', ['game_id' => $game_id, 'user_id' => $user_id]);
        return $query->row();
    }

    public function get_most_recent()
    {
        $user_id = $this->session->userdata("user_id");
        $query = $this->db->query('SELECT * FROM collection WHERE user_id = ' . $user_id . ' ORDER BY id desc limit 1');
        return $query->row();
    }
}
