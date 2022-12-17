<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class AttendanceController extends CI_Controller {
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
        $this->load->model('Attendance_model'); 
    }	
    
    //# Attendance Report Functions
    public function attendance_form_report(){
        $getattendanceB_code= $this->Attendance_model->attendance_form_batch_code();
        $getattendanceT_code= $this->Attendance_model->get_report_table_attendance_traineelist();
        $data['select_batchcode'] = $getattendanceB_code;
        $data['select_traineecode'] = $getattendanceT_code;
        $data['title'] = 'Attendance Report';   
        $this->load->view('user/attendance_report_form',$data);
    }
    public function get_report_attendance_list(){
        $postData = $this->input->post();
        //echo "<pre>";print_r($postData = $this->input->post());die;
        $get_funnel_keyforms_result = $this->Attendance_model->verify_data_report_attendancelist($postData);
        echo json_encode($get_funnel_keyforms_result);
    }
    
    public function get_report_attendance_list_onchange_batch_code($b_code){
        $postData = $this->input->post();
        $get_funnel_keyforms_result = $this->Attendance_model->verify_data_report_attendancelist_onchange_batch_code($postData,$b_code);
        echo json_encode($get_funnel_keyforms_result);
    }
    public function get_attendance_trainee_list($b_code){
        $days_list_result = $this->Attendance_model->get_report_table_attendance_traineelist_batch('create_trainee',$b_code);
        echo json_encode($days_list_result);
    }


}
?>