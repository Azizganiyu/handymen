<?php
class Explore extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form'));
        $this->load->model(array('post_model','users_model','bid_model'));
    }


	public function index()
	{
        $data['posts'] = $this->post_model->get_all_post();
        $data['page'] = 'explore';
        $data['title'] = site_title.' | Explorer';
        $this->load->view('template/header', $data);
        $this->load->view('explore');
        $this->load->view('template/footer');
    }

    public function filter($cat)
    {
        $data['posts'] = $this->post_model->get_cat_post($cat);
        $data['cat'] = $cat;
        $data['page'] = 'explore';
        $data['title'] = site_title.' | Explorer';
        $this->load->view('template/header', $data);
        $this->load->view('explore');
        $this->load->view('template/footer');
    }
    
} 