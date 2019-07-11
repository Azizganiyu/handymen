<?php
class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form'));
        $this->load->model(array('post_model'));
        if(!$this->session->logged_in || $this->session->logged_in == false)
        {
            header('location:'.base_url.'/index.php/users/login');
        }
    }


	public function index()
	{
        $this->form_validation->set_rules('post_title', 'Title', 'required|trim|htmlspecialchars|max_length[255]|is_unique[posts.job_title]', array(
            'is_unique' => '%s already exist!'
        ));
        $this->form_validation->set_rules('post_description', 'Description', 'required|trim|htmlspecialchars', array(
            'required' => '%s is not provided'
        ));
        $this->form_validation->set_rules('post_budget', 'Budget', 'required|numeric', array(
            'required' => '%s is not provided'
        ));
        
        //if form validation error, reload user post page
        if($this->form_validation->run() == FALSE)
        {
            if(isset($_POST['submit']))
            {
                $data['info'] = 'An Error occured!';
            }

            $data['page'] = 'post';
            $data['title'] = site_title.' | Create a post';
            $this->load->view('template/header', $data);
            $this->load->view('post');
            $this->load->view('template/footer');   
        }

        else
        {
            //method returns a  boolean value if data was succesfully inserted to database
            $new_post = $this->post_model->add_post($this->session->id, $_POST);

            //reload page with a success message if data was successfuy inserted
            if($new_post == True)
            {
                header('location:'.base_url.'/index.php/explore/');  
            }

            //else reload page with error if not successfully inserted in database
            else
            {
                echo 'Unable to create post at this moment, please try again later';
            }
        }

        
    }
    
} 