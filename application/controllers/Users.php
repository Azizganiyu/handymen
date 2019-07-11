<?php
class Users extends CI_Controller {

    

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form'));
        $this->load->model(array('users_model'));
    }


	public function index()
	{
        
    }
    public function login()
    {
        
        $data['page'] = 'login';
        $data['title'] = site_title.' | Login';
        $this->load->view('template/header', $data);
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function register()
    {
        $data['page'] = 'register';
        $data['title'] = site_title.' | Register';
        $this->load->view('template/header', $data);
        $this->load->view('register');
        $this->load->view('template/footer');
    }

    public function reg_user()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|htmlspecialchars|max_length[20]|is_unique[users.user_name]', array(
            'is_unique' => '%s already exist!'
        ));
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|htmlspecialchars|is_unique[users.email]', array(
            'is_unique' => '%s already exist'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|htmlspecialchars|min_length[8]', array(
            'required' => '%s is not provided'
        ));
        $this->form_validation->set_rules('password-conf', 'Password Confirmation', 'required|matches[password]', array(
            'required' => '%s is not provided'
        ));
        $this->form_validation->set_rules('terms', 'Terms of service', 'required', array(
            'required' => 'Please agree on the %s'
        ));

        //if form validation error, reload user registeration page
        if($this->form_validation->run() == FALSE)
        {
             echo validation_errors();   
        }

        //else send form datas to method register_user in users model class for insertion into database
        else
        {
            //method returns a  boolean value if data was succesfully inserted to database
            $new_user = $this->users_model->register_user($_POST);

            //reload page with a success message if data was successfuy inserted
            if($new_user == True)
            {
                echo 'Success';
            }

            //else reload page with error if not successfully inserted in database
            else
            {
                echo 'Unable to register user at this moment, please try again later';
            }
        }

    }

    public function log_user()
    {
        //validate user input from the login form
        $this->form_validation->set_rules('id', 'Username or Email', 'required|trim|htmlspecialchars', array(
            'required' => '%s is not provided'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|htmlspecialchars', array(
            'required' => '%s is not provided'
        ));

        //if form validation error or input error, redisplay the login page with errors
        if($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }

        //if there is no error from form validation, send user input(provided login credential)  to user model class for validation or verification
        else
        {
            //send posted data to validate_user method in users_model,
            // returns user data if credentials match
            //or a boolean value of false if credentials doesnt match after verification
            $login_user = $this->users_model->validate_user($_POST);

            //if credentials provided match
            if(is_array($login_user))
            {
                //set session datas for for user
                $user_data = array(
                    'id' => $login_user['id'],
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                echo "Success";
            }

            //if the provided user credentials does not match, reload the login page with error notice
            else
            {
                echo  'Wrong login details';
            }
        }
    }

    public function logout()
    {
        //verify user is currently logged in before attempting to logout
        if(!$this->session->logged_in || $this->session->logged_in == false)
        {
            //if not logged in redirect to login page
            header('location:'.base_url.'/index.php/users/login');
        }
        else
        {
            //set session data logged_in to false
            $this->session->set_userdata('logged_in', false);
            header('location:'.base_url.'/index.php/users/login');
        }
    }

    public function update_dp()
    {
        //Upload configuration and setting
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['max_filename']         = 0;

        //load the upload library with the configuration passes
        $this->load->library('upload', $config);

            //try uploading file, if error display error msg to user
            if ( ! $this->upload->do_upload('user_dp'))
            {
                $data['title'] = 'Upload error!';
                $data['error'] = array('error' => $this->upload->display_errors());
                $this->load->view('upload_info', $data);
            }

            //if upload success, process the file and store data in database
            else
            {
                
                $data = array('upload_data' => $this->upload->data()); //array of uploaded file data


                foreach($data as $details)
                {

                    //define upload path for files
                    $path = base_url.'/images/'.$details['file_name'];
                    
                }
                //send array of returned data to database method
                $this->users_model->update_dp($this->session->id, $path);

            }
    }
} 