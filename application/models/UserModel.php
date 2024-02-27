<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {  

    public function insertuser($data){

        $userData = array(
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT), 
            'email'    => $data['email']
           
        );
           // Insert user data into the database
           $this->db->insert('users', $userData);

           // Check if the user was successfully inserted
           return $this->db->affected_rows() > 0;
       }
   
    } 

   
