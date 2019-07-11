<?php

class Post_model extends CI_Model
{
    
    public function __construct()
    {
        $this->load->database();
    }

    public function add_post($id, $data)
    {
        $values = array(
            'user_id' => $id,
            'job_title' => $data['post_title'],
            'job_description' =>  $data['post_description'],
            'job_category' => $data['post_cat'],
            'budget' =>  $data['post_budget']
        );
        $insert = $this->db->insert('posts', $values);
        if($insert)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

    public function get_all_post()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');
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

    public function get_user_post($id)
    {
        $this->db->where(array('user_id' => $id));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');
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

    public function get_single_post($title)
    {
        $this->db->where(array('job_title' => $title));
        $query = $this->db->get('posts');
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
            return $result;
        }
        else
        {
            return false;

        }
    }

    public function get_single_post_by_id($id)
    {
        $this->db->where(array('id' => $id));
        $query = $this->db->get('posts');
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
            return $result;
        }
        else
        {
            return false;

        }
    }

    public function get_cat_post($cat)
    {
        $this->db->where(array('job_category' => $cat));
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('posts');
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