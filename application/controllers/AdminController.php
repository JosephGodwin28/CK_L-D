<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class AdminController extends CI_Controller {
	public function __construct()	
    {	
        parent::__construct();	
        $this->load->helper(array(	
            'form',	
            'html',	
            'file',	
            'url'	
        ));	
        $this->load->library('session');	
        $this->load->library('form_validation');	
        $this->load->library('javascript');	
        $this->load->library('email');

        $this->load->model('Common_model', 'cmodel');
        	
    }	
    
	public function dashboard(){	
		$this->load->view('dashboard');	
	}	
     public function user_form_table(){    
        $this->load->view('user_form_table'); 
    } 
    public function create_user_form(){    
        $this->load->view('create_user_form'); 
    }  
    /*edit view*/
    public function edit_user_form(){
        $this->load->view('edit_user_form');
    } 

    /*supervisor name list*/
    public function get_supervisor_name_list(){

        // $where_cond['rs_key_name !='] = '';
        $name_list_result = $this->cmodel->get_table_list('supervisor_name','supervisor_name','id');
        // print_r($this->db->last_query());die;
        echo json_encode($name_list_result);
    }
    /*trainer name list*/
    public function get_trainer_name_list(){

        // $where_cond['rs_key_name !='] = '';
        $name_list_result = $this->cmodel->get_table_list('trainer_name','trainer_name','id');
        // print_r($this->db->last_query());die;
        echo json_encode($name_list_result);
    }

     
    /*user create in admin side*/
    public function userCreate() {

    // echo '<pre>' . print_r($_SESSION, TRUE) ;
        $emp_id= $_SESSION['emp_id'];
        $location = $this->input->post('location');
        $trainee_code = $this->input->post('trainee_code');
        $emp_code = $this->input->post('emp_code');
        $name_trainee = $this->input->post('name_trainee');
        $designation = $this->input->post('designation');
        $pro_sbu = $this->input->post('pro_sbu');
        $number = $this->input->post('number');
        $emp_emailid = $this->input->post('emp_emailid');
        $join_date = $this->input->post('join_date');
        $gender = $this->input->post('gender');
        $emp_dob = $this->input->post('emp_dob');
        $emp_alt_num = $this->input->post('emp_alt_num');
        $relation = $this->input->post('relation');
        $created_by = $this->input->post('created_by');
        $p_address = $this->input->post('p_address');
        $l_address = $this->input->post('l_address');
        $qualification = $this->input->post('qualification');
        $experience = $this->input->post('experience');
        $supervisor_name = $this->input->post('supervisor_name');
        $trainee_sta = $this->input->post('trainee_sta');
        $c_devices = $this->input->post('c_devices');
        /*batch code */
            /*$code = strtoupper($this->input->post('batch_code'));
            $p = "VT".(substr($code,0,3));
        $batch_code=$p.(date("dmy"));*/

        $data = array(
            'createdBy_emp'=>$emp_id,
            'location' => $location,
            'trainee_code' => $trainee_code,
            'name_trainee' => $name_trainee,
            'designation' => $designation,
            'pro_sbu' => $pro_sbu,
            'number' => $number,
            'emp_emailid' => $emp_emailid,
            'join_date' => $join_date,
            'gender' => $gender,
            'emp_dob' => $emp_dob,
            'emp_alt_num' => $emp_alt_num,
            'relation' => $relation,
            'created_by' => $created_by,
            'p_address' => $p_address,
            'l_address' => $l_address,
            'qualification' => $qualification,
            'experience' => $experience,
            'supervisor_name' => $supervisor_name,
            'trainee_sta' => $trainee_sta,
            'c_devices' => $c_devices,
            // 'batch_code' => $batch_code,

        );

        // echo "<pre>";print_r($data);die;
        $signup_user = $this->cmodel->data_add('create_trainee',$data);
        if ($signup_user=="success") {

              $result = array(
                    "logstatus" => "success" ,
                    "url" =>"AdminController/user_form_table"
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


    public function get_trainee_list(){

        $postData = $this->input->post();
        // echo"list<pre>";print_r($postData);die;
        $get_funnel_keyforms_result = $this->cmodel->verify_data_traineelist($postData);
        
        echo json_encode($get_funnel_keyforms_result);
    }

    public function get_list_edit_trainee(){

        $where_cond['id'] = $this->input->post('table_row_id');

        $get_adtdetails_rs_result = $this->cmodel->verify_data('create_trainee',$where_cond);
        // echo "<pre>";print_r($get_adtdetails_rs_result);die;
        echo json_encode($get_adtdetails_rs_result);
    }

    public function get_user_edit_form(){
        
        $where_cond['id'] = $this->input->post('current_rowid');

        $get_rs_key_edit_form_result = $this->cmodel->verify_data('create_trainee',$where_cond);
        // print_r($this->db->last_query());die;
        echo json_encode($get_rs_key_edit_form_result);
    }

    public function editUserForm(){
        
        $id = $this->input->post('edit_row_id');

// echo "string";print_r($where_cond);die;
        $where_cond['location'] = $this->input->post('location');
        $where_cond['emp_code'] = $this->input->post('emp_code');
        $where_cond['name_trainee'] = $this->input->post('name_trainee');
        $where_cond['designation'] = $this->input->post('designation');
        $where_cond['pro_sbu'] = $this->input->post('pro_sbu');
        $where_cond['number'] = $this->input->post('number');
        $where_cond['emp_emailid'] = $this->input->post('emp_emailid');
        $where_cond['join_date'] = $this->input->post('join_date');
        $where_cond['gender'] = $this->input->post('gender');
        $where_cond['emp_dob'] = $this->input->post('emp_dob');
        $where_cond['emp_alt_num'] = $this->input->post('emp_alt_num');
        $where_cond['relation'] = $this->input->post('relation');
        $where_cond['p_address'] = $this->input->post('p_address');
        $where_cond['l_address'] = $this->input->post('l_address');
        $where_cond['qualification'] = $this->input->post('qualification');
        $where_cond['experience'] = $this->input->post('experience');
        $where_cond['supervisor_name'] = $this->input->post('supervisor_name');
        $where_cond['trainee_sta'] = $this->input->post('trainee_sta');
        $where_cond['c_devices'] = $this->input->post('c_devices');

       

        $editform_result = $this->cmodel->updates('create_trainee',$where_cond, 'id', $id);
        // print_r($editform_result);die;

        if($editform_result){
            $result = array(
                "response" => "success",
                "url" => "AdminController/user_form_table"
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
                "url" => "AdminController/edit_user_form"
            );
            echo json_encode($result);
        }
    }


    public function assignEmp(){
        
        $createdBy = $this->session->emp_id;
        /*batch code */
        $code = strtoupper($this->input->post('batch_code'));
        $p = "VT".(substr($code,0,3));
        $date=$this->input->post('date_emp');
        $datea=date('dmy',strtotime($date));
        $batch_code=$p.($datea);
        // echo"<pre>";print_r($this->input->post('trainer_name'));die;

            $form_data[] = array(
                'emp_code' => $this->input->post('trainer_name'),
                'id' => $this->input->post('test'),
                'assignedDate' =>$this->input->post('date_emp'),
                'createdBy_emp' => $createdBy,
                'batch_code' => $batch_code,
            );
        $val = $this->cmodel->assignEmp($form_data);
        // echo"<asdasd>";print_r($val);die;
        if ($val) {
            $result = array(
                "message" => "success"
            );
        } else {
            $result = array(
                "message" => "failed"
            );
            echo json_encode($result);
        }
    echo json_encode($result);
      
    }


}
?>