<?php 

/**
 * User Model Class
 * 
 * This class manages all user data
 * 
 */
class Users_model extends CI_Model
{
    /**
     * Class constructor
     *
     * Loads the database
     * 
     */
    public function __construct()
    {
        $this->load->database();
    }

    //---------------------------------------------------------------------------

    /**
     * Method to verify or validate user before login
     * 
     * returns user data if user verified  or a boolean value of false
     * 
     */
    public function validate_user($data)
    {
        $sql = "select * from users WHERE user_name = ? OR email = ?";
        $query = $this->db->query($sql, array($data['id'], $data['id']));
        $result = $query->row_array();

        //if user exist verify password
        if(isset($result))
        {
            //verify password against user password input
            if(password_verify($data['password'], $result['password']))
            {
                return $result;
            }
            else
            {
                return False;
            }

        }
        else
        {
            return False;
        }
    }

    //----------------------------------------------------------------------------------------

    /**
     * Method to register user
     * 
     * Inserts user primary info into database
     * 
     * @param array $data user data/input
     * 
     * returns a boolean value if data inserted
     */
    public function register_user($data)
    {
        $values = array(
            'user_name' => $data['name'],
            'display_name' => $data['name'],
            'email' =>  $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'image_url' =>  base_url.'/images/user.png'
        );
        $insert = $this->db->insert('users', $values);
        if($insert)
        {
            return True;
        }
        else
        {
            return False;
        }
    }

    //-------------------------------------------------------------------------------------

    /**
     * Method to get a user information
     * 
     * @param int $id user ID
     * 
     * returns user data on success or a boolean value of false
     * 
     */
    public function get_user_data($id)
    {
        $sql = "select * from users WHERE ID = ?";
        $query = $this->db->query($sql, array($id));
        $data = $query->row_array();
        if(isset($data))
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function get_user_specific_data($id, $specific)
    {
        $sql = "select * from users WHERE id = ?";
        $query = $this->db->query($sql, array($id));
        $data = $query->row_array();
        if(isset($data))
        {
            return $data[$specific];
        }
        else
        {
            return false;
        }
    }

    //---------------------------------------------------------------------------------------------

    /**
     * Method to validate change of email
     * 
     * verifies no other user uses the email
     * 
     * @param string $email new email
     * @param int $id user id
     * 
     * returns boolean values
     * 
     */
    public function validate_change_email($email, $id)
    {
        $sql = "select email from users WHERE id != ? AND email = ?";
        $query = $this->db->query($sql, array($id, $email));
        $result = $query->row_array();  
        if(isset($result))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //--------------------------------------------------------------------------------------------
    
    /**
     * Method to update user record with new details
     * 
     * @param array $data new user data to be updated
     * @param int $id user record that should be updated
     * 
     * returns boolean values on success(true) and on fail(false)
     * 
     */
    public function update_user($data, $id)
    {

        $update = array(
            'display_name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'profession' => $data['profession']
        );

        $this->db->where('ID', $id);
        $query = $this->db->update('users', $update);
        if($query)
        {
            return True;
        }
        else
        {
            return False;
        }

    }

    //---------------------------------------------------------------------------------------------

    public function update_dp($id, $url)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('users', array('image_url' => $url));
        if($query)
        {
            return True;
        }
        else
        {
            return False;
        }

    }

}