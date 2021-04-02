<?php
class Collection_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }

    public function get_collection_by_id($user_id)
    {
        $query = $this->db->get_where('collection', array('user' => $user_id));
        return $query->result_array();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'user_id' => $this->input->post('user_id'),
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