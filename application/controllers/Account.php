<?php
class Account extends CI_Controller {

    public $user_data;

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form'));
        $this->load->model(array('users_model', 'post_model','bid_model'));
        if(!$this->session->logged_in || $this->session->logged_in == false)
        {
            header('location:'.base_url.'/index.php/users/login');
        }
        $this->user_data = $this->users_model->get_user_data($this->session->id);

    }



    public function index()
    {
        $data['details'] = $this->user_data;
        $data['posts'] = $this->post_model->get_user_post($this->session->id);
        $data['page'] = 'account';
        $data['title'] = site_title.' | '.$this->user_data['display_name'];
        $this->load->view('template/header', $data);
        $this->load->view('account_header');
        $this->load->view('account_post');
        $this->load->view('template/footer');
    }

    public function view($post_id)
    {
        $data['post_id'] = $post_id;
        $data['details'] = $this->user_data;
        $data['bids'] = $this->bid_model->get_post_bids($post_id);
        $data['page'] = 'account';
        $data['title'] = site_title.' | '.$this->user_data['display_name'];
        $this->load->view('template/header', $data);
        $this->load->view('account_header');
        $this->load->view('account_post_bids');
        $this->load->view('template/footer');

        
    }

    public function update()
    {
        
        //validate user inputs when updating profile
        $this->form_validation->set_rules('name', 'First Name', 'required|trim|htmlspecialchars|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|htmlspecialchars|callback_validate_change_email['.$this->session->id.']');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|htmlspecialchars|max_length[20]|numeric');
        $this->form_validation->set_rules('address', 'Address', 'trim|htmlspecialchars|max_length[255]');
        $this->form_validation->set_rules('profession', 'Profession', 'trim|htmlspecialchars|max_length[255]');

        //if validation error reload page and display error
        if($this->form_validation->run() == False)
        {
            //set data['info'] only if the user try to update and there was error
            if(isset($_POST['submit']))
            {
                $data['info'] = 'Update Error! <br> Please check fields for corrections';
            }
            $data['details'] = $this->user_data;
            $data['page'] = 'account';
            $data['title'] = site_title.' | '.$this->user_data['display_name'];
            $this->load->view('template/header', $data);
            $this->load->view('account_header');
            $this->load->view('account_update');
            $this->load->view('template/footer');
        }

        //else update user records on the database
        else
        {
            //update_user method returns a boolean value
            $update_user = $this->users_model->update_user($_POST, $this->session->id); 

            //if record is updated get the latest update and dispay to user
            if ($update_user != False)
            {
                //update $data with new database data
                $data['details'] = $this->users_model->get_user_data($this->session->id);
                $data['page'] = 'account';
                $data['title'] = site_title.' | '.$this->user_data['display_name'];
                $this->load->view('template/header', $data);
                $this->load->view('account_header');
                $this->load->view('account_update');
                $this->load->view('template/footer');
            }
        
        }
    }

    public function validate_change_email($email, $id)
    {
        //verify no other user is using the email
        $verify_email_change = $this->users_model->validate_change_email($email, $id);

        //if the email exist somewhere else, set error message for form_validation and return false
        if($verify_email_change == false)
        {
            $this->form_validation->set_message('validate_change_email', 'Email already exists');
            return false;
        }
        else
        {
            return true;
        }
    }
        
} 