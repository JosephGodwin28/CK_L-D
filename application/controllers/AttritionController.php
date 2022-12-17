<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class AttritionController extends CI_Controller {
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
        $this->load->model('Attrition_model'); 
        	
    }	
    
    public function attrition_form_add(){
        $getattritionB_code= $this->Attrition_model->attrition_form_batch_code();
        $getattritionT_code= $this->Attrition_model->get_report_table_attrition_traineelist();
        $data['select_batchcode'] = $getattritionB_code;
        $data['select_traineecode'] = $getattritionT_code;
        $data['title'] = 'Attrition TRACK MEMBERS';   
        $this->load->view('attrition_add_form',$data); 

    }

    public function form_view_attrition_tracker(){  
        $b_code=$this->input->post('trainee_code');
        $day=$this->input->post('day');
        $getattrition= $this->attrition_model->attrition_form_emp($b_code);
        $data['members'] = $getattrition;
        $data['title'] = 'ATTRITION TRACK MEMBERS';   
       $this->load->view('attrition_add_form',$data); 
    }
    public function form_store_attrition_tracker(){  
        //echo '<pre>';print_r($this->input->post());die;
        if ( count(array_filter($this->input->post('training_stage')))==count($this->input->post('training_stage')) && count(array_filter($this->input->post('attrition_date')))==count($this->input->post('attrition_date')) && count(array_filter($this->input->post('attrition_mode')))==count($this->input->post('attrition_mode'))  && count(array_filter($this->input->post('attrition_category')))==count($this->input->post('attrition_category')) && count(array_filter($this->input->post('detailed_reason')))==count($this->input->post('detailed_reason')) ) {
                $name_list_result = $this->Attrition_model->form_store_attrition_tracker($this->input->post()); 
                if ($name_list_result=="success") {
                      $result = array(
                            "logstatus" => "success" ,
                            "url" =>"AttritionController/attrition_form_add"
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
    public function get_attrition_list(){
        $postData = $this->input->post();

        $get_funnel_keyforms_result = $this->Attrition_model->verify_data_attritionlist($postData);
        echo json_encode($get_funnel_keyforms_result);
    }
    public function get_attrition_trainee_list($b_code){
        $days_list_result = $this->Attrition_model->get_table_attrition_traineelist('create_trainee',$b_code);
        echo json_encode($days_list_result);
    }

    //# ATTRITION Tracker Report Functions
    function attrition_form_report(){
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