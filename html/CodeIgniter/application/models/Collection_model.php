<?php
class Collection_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_games_by_collection_id($user_id)
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
        $this->db->where(array('game_id' => $id, 'user_id' => 1));
        return $this->db->delete('collection');
    }

    public function get_association($game_id, $user_id)
    {
        $query = $this->db->get_where('collection', ['game_id' => $game_id, 'user_id' => $user_id]);
        return $query->row();
    }
}
