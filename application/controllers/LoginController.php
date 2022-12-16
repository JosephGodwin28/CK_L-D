<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        
        //load the Login Model
        $this->load->model('LoginModel', 'lmodel');

    }

public function signin(){
    $this->load->view('signin');    
    }

    public function doLogin() {
        // echo"asdasdasdas";
        $empid = $this->input->post('empid');
        $password = md5($this->input->post('password'));
        $data = array(
            'empid' => $empid,
            'password' => $password,
            'status' => "1"
        );

        $check_login = $this->lmodel->checkLogin($data);
         // echo "<pre>";print_r($check_login);
        if ($check_login) {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('emp_id', $check_login['emp_id']);
            $this->session->set_userdata('username', $check_login['username']);
            $this->session->set_userdata('status', $check_login['status']);
            $this->session->set_userdata('role', $check_login['role']);

            if($this->session->role =='admin'){

                $result = array(
                    "logstatus" => "success",
                    "url" => "AdminController/dashboard"
                );
                echo json_encode($result);

            }else if($this->session->role =='user'){
                $result = array(
                    "logstatus" => "success",
                    "url" => "EmpController/emp_dashboard"
                );
                echo json_encode($result);


            }
        }
        else {
                //if no then set the session 'logged_in' as false
                $this->session->set_userdata('logged_in', false);
                                
                $result = array(
                    "logstatus" => "failed"
                );
                echo json_encode($result);

        
            }
    }

    public function doSignup() {
        // echo"asdasdasdas";
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'status' => "1",
            'role'=>"user"
        );

        $signup_user = $this->lmodel->signUp('users',$data);
        // echo "<pre>";print_r($signup_user);die;
        if ($signup_user=="success") {

              $result = array(
                    "logstatus" => "success",
                    "url" => "signin"
                );
                echo json_encode($result);


        }
        else{
             $result = array(
                    "logstatus" => "failed",
                );
                echo json_encode($result);

        }
    }

    public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        
        redirect(logout_portal_base_url());
    }
}