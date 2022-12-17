<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class OjtController extends CI_Controller {
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
        $this->load->model('Ojt_model'); 
        	
    }	
    
    public function ojt_form_add(){
        $getojtB_code= $this->Ojt_model->ojt_form_batch_code();
        $data['select_batchcode'] = $getojtB_code;
        $data['title'] = 'OJT TRACK MEMBERS';   
        $this->load->view('ojt_add_form',$data); 

    }
    public function form_view_ojt_tracker(){  
        $b_code=$this->input->post('trainee_code');
        $day=$this->input->post('day');
        $getojt= $this->Ojt_model->ojt_form_emp($b_code);
        $data['members'] = $getojt;
        $data['title'] = 'OJT TRACK MEMBERS';   
       $this->load->view('ojt_add_form',$data); 
    }
    public function form_store_ojt_tracker($day){  
        
            if ( count(array_filter($this->input->post('training_covered')))==count($this->input->post('training_covered')) && count(array_filter($this->input->post('total_outlet')))==count($this->input->post('total_outlet')) && count(array_filter($this->input->post('target_achieved')))==count($this->input->post('target_achieved')) ) {
                    
                    $name_list_result = $this->Ojt_model->form_store_ojt_tracker($this->input->post(),$day); 
       
                    if ($name_list_result=="success") {

                          $result = array(
                                "logstatus" => "success" ,
                                "url" =>"OjtController/ojt_form_add"
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
       
        //redirect(base_url().'OjtController/ojt_form_add'); 
    }
     public function get_ojt_list($b_code){
        $postData = $this->input->post();
        $get_funnel_keyforms_result = $this->Ojt_model->verify_data_ojtlist($b_code,$postData);
        echo json_encode($get_funnel_keyforms_result);
    }
     public function get_ojt_day_list($b_code){
        $days_list_result = $this->Ojt_model->get_table_ojt_daylist('table_ojt',$b_code);
        echo json_encode($days_list_result);
    }
    

    //# OJT Tracker Report Functions
    function ojt_form_report(){
        $getojtB_code= $this->Ojt_model->ojt_form_batch_code();
        $getojtT_code= $this->Ojt_model->get_report_table_ojt_traineelist();
        $data['select_batchcode'] = $getojtB_code;
        $data['select_traineecode'] = $getojtT_code;
        $data['title'] = 'OJT TRACK MEMBERS';   
        $this->load->view('ojt_report_form',$data);
    }
    public function get_report_ojt_list(){
        $postData = $this->input->post();
        //echo "<pre>";print_r($postData = $this->input->post());die;
        $get_funnel_keyforms_result = $this->Ojt_model->verify_data_report_ojtlist($postData);
        echo json_encode($get_funnel_keyforms_result);
    }
    public function get_report_ojt_day_list($b_code){
        $days_list_result = $this->Ojt_model->get_report_table_ojt_daylist('table_ojt',$b_code);
        echo json_encode($days_list_result);
    }
    public function get_report_ojt_list_onchange_batch_code($b_code){
        $postData = $this->input->post();
        $get_funnel_keyforms_result = $this->Ojt_model->verify_data_report_ojtlist_onchange_batch_code($postData,$b_code);
        echo json_encode($get_funnel_keyforms_result);
    }
    public function get_ojt_trainee_list($b_code){
        $days_list_result = $this->Ojt_model->get_table_ojt_traineelist('create_trainee',$b_code);
        echo json_encode($days_list_result);
    }


}
?>