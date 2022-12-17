<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class FeedbackController extends CI_Controller {
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
        $this->load->model('Feedback_model'); 
        	
    }	
    
    public function feedback_add_form(){
        $getattritionB_code= $this->Feedback_model->feedback_add_form_batch_code();
        //$getattritionT_code= $this->Feedback_model->get_report_table_attrition_traineelist();
        $data['select_batchcode'] = $getattritionB_code;
        //$data['select_traineecode'] = $getattritionT_code;
        $data['title'] = 'TRAINER FEEDBACK';   
        $this->load->view('feedback_add_form',$data); 

    }


    public function form_store_feedback(){  
        //echo '<pre>';print_r($this->input->post());die;
        if ( count(array_filter($this->input->post()))==count($this->input->post())  ) {
                $name_list_result = $this->Feedback_model->form_store_feedback_tracker($this->input->post()); 
                if ($name_list_result=="success") {
                      $result = array(
                            "logstatus" => "success" ,
                            "url" =>"FeedbackController/feedback_add_form"
                        );
                        echo json_encode($result);

                }
                else{
                     $result = array(
                            "logstatus" => "failed",
                        );
                        echo json_encode($result);

                }
          }else{
              $result = array(
                            "logstatus" => "failed",
                        );
                echo json_encode($result);
          }      
    }
    public function get_feedback_trainee_list($b_code){
        $days_list_result = $this->Feedback_model->get_table_feedback_traineelist('create_trainee',$b_code);
        echo json_encode($days_list_result);
    }
    

    //# ATTRITION Tracker Report Functions
    public function attrition_form_report(){
        $getattritionB_code= $this->Attrition_model->attrition_form_batch_code();
        $getattritionT_code= $this->Attrition_model->get_report_table_attrition_traineelist();
        $data['select_batchcode'] = $getattritionB_code;
        $data['select_traineecode'] = $getattritionT_code;
        $data['title'] = 'ATTRITION TRACK MEMBERS';   
        $this->load->view('attrition_report_form',$data);
    }
    public function get_report_attrition_list(){
        $postData = $this->input->post();
        //echo "<pre>";print_r($postData = $this->input->post());die;
        $get_funnel_keyforms_result = $this->Attrition_model->verify_data_report_attritionlist($postData);
        echo json_encode($get_funnel_keyforms_result);
    }
    
    public function get_report_attrition_list_onchange_batch_code($b_code){
        $postData = $this->input->post();
        $get_funnel_keyforms_result = $this->Attrition_model->verify_data_report_attritionlist_onchange_batch_code($postData,$b_code);
        echo json_encode($get_funnel_keyforms_result);
    }


}
?>