<?php

class LoginModel extends CI_Model {

    public function checkLogin($data) {
        
        // echo "<pre>";print_r($data);die;
        //query the table 'users' and get the result count
        $this->db->select("*");
        $this->db->where('emp_id', $data['empid']);
        $this->db->where('password', $data['password']);
        // print_r($this->db->last_query());
        $query = $this->db->get('users')->row_array();
        return $query;
    }

   public function signUp($table, $val)
    {
        $this->db->insert($table, $val);
        // echo "<pre>";print_r($this->db->last_query());die;
        $message = "success";
        return $message;
    }
    
}