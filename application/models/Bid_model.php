<?php

class Bid_model extends CI_Model
{
    
    public function __construct()
    {
        $this->load->database();
    }

    public function add_bid($user_id, $data)
    {
        $values = array(
            'user_id' => $user_id,
            'post_id' => $data['post_id'],
            'bid' =>  $data['bid'],
        );
        $insert = $this->db->insert('bids', $values);
        if($insert)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

    public function user_has_bidded($user_id, $post_id)
    {
        $this->db->where(array('user_id' => $user_id, 'post_id' => $post_id));
        $query = $this->db->get('bids');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;

        }
    }

    public function count_bid($post_id)
    {
        $this->db->where(array('post_id' => $post_id));
        return $this->db->count_all_results('bids');
    }

    public function get_post_bids($post_id)
    {
        $this->db->where(array('post_id' => $post_id));
        $query = $this->db->get('bids');
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
            return $result;
        }
        else
        {
            return false;

        }
    }
}