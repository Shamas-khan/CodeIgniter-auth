<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {  
        public function __construct() {
        parent::__construct();
        $this->load->database(); 
         }

        public function insertuser($data){

            $userData = array(
            'username' => $data['username'],
            'email'    => $data['email'], 
            'password' => password_hash($data['password'], PASSWORD_BCRYPT)
           
            );
           // Insert user data into the database
           $this->db->insert('users', $userData);

           // Check if the user was successfully inserted
           return $this->db->affected_rows() > 0;
       }

       public function isEmailRegistered($email)
        {
                $this->db->where('email', $email);
                
                $query = $this->db->get('users');

                return $query->num_rows() > 0;
        }
   
} 

   
