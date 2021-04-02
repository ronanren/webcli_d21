<?php
class Collection_model extends CI_Model {
  
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
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'user_id' => 1,
            'game_id' => $this->input->post('game_id')
        );

        if (empty($id)) {
            return $this->db->insert('collection', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('collection', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('collection');
    }
}