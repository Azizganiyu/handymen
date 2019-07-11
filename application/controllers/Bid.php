<?php
class Bid extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form'));
        $this->load->model(array('users_model', 'post_model', 'bid_model'));
        if(!$this->session->logged_in || $this->session->logged_in == false)
        {
            header('location:'.base_url.'/index.php/users/login');
        }
    }


	public function index()
	{
        
    }
    
    function  place_bid($title = null)
    {
        $title = str_replace('_', " ", $title);
        
        if(isset($_POST['submit']))
        {
            $this->form_validation->set_rules('bid', 'Bid', 'required|trim|htmlspecialchars', array(
                'required' => 'Please state the reason why you should be hired'
            ));
        }
        
        if($this->form_validation->run() == FALSE)
        {
            $data['post_data'] = $this->post_model->get_single_post($title);
            $data['author_data'] = $this->users_model->get_user_data($data['post_data']['user_id']);
            $data['user_has_bidded'] = $this->bid_model->user_has_bidded($this->session->id, $data['post_data']['id']);
            $data['count_bids'] = $this->bid_model->count_bid($data['post_data']['id']);
            $data['page'] = 'place_bid';
            $data['title'] = site_title.' | Place bid';
            $this->load->view('template/header', $data);
            $this->load->view('bid');
            $this->load->view('template/footer');
        }
        else
        {
            $place_bid = $this->bid_model->add_bid($this->session->id, $_POST);
            $data['post_data'] = $this->post_model->get_single_post($title);
            $data['author_data'] = $this->users_model->get_user_data($data['post_data']['user_id']);
            $data['user_has_bidded'] = $this->bid_model->user_has_bidded($this->session->id, $data['post_data']['id']);
            $data['count_bids'] = $this->bid_model->count_bid($data['post_data']['id']);
            $data['page'] = 'place_bid';
            $data['title'] = site_title.' | Place bid';
            $this->load->view('template/header', $data);
            $this->load->view('bid');
            $this->load->view('template/footer'); 
        }
    }

} 