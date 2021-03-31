<?php
class Game_model extends CI_Model {
  
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
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'guid' => $this->input->post('guid'),
            'titre' => $this->input->post('titre'),
            'sortie' => $this->input->post('sortie'),
            'description' => $this->input->post('description'),
            'couverture' => $this->input->post('couverture')
        );
        if (empty($id)) {
            return $this->db->insert('games', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('games', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('games');
    }
}