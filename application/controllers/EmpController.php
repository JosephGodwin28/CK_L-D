<?php	
defined('BASEPATH') OR exit('No direct script access allowed');	
class EmpController extends CI_Controller {
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

        $this->load->model('Emp_model', 'emodel');
        $this->load->model('common_model', 'cmodel');
        	
    }	
    
    public function emp_dashboard(){    
        $this->load->view('user/emp_dashboard'); 
    }
    public function emp_form_table(){    
        $this->load->view('user/emp_form_view'); 
    }  
    /*edit view*/
    public function emp_edit_form(){
        $this->load->view('user/emp_edit_form');
    } 
    /*Trainning Progress Report*/
    public function emp_progress(){
        $this->load->view('user/emp_progress_report');
    }
    /*Trainning Progress Report*/
    public function emp_progress_list(){
        $this->load->view('user/emp_progress_listing');
    }
    /*Trainning Completed Report*/
    public function emp_completed_list(){
        $this->load->view('user/emp_completed_listing');
    }
    /*Trainning Pending Report*/
    public function emp_pending_list(){
        $this->load->view('user/emp_pending_listing');
    } 
    /*Remark employee */
    public function emp_remark()
    {
        $this->load->view('remark_page');
    }
    /*Report Remark employee */
    public function report_remark_list()
    {
        $this->load->view('report_remark');
    }
    /*Assessment Report */
    public function performance_list()
    {
        $this->load->view('performance_list');
    }
    public function performance_report_list()
    {
        $this->load->view('performance_report_list');
    }
  

    public function get_trainee_list(){

        $postData = $this->input->post();
        $postData_where=$_SESSION['emp_id'];
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        // echo"test<pre>";print_r($postData_where);die;
        $get_funnel_keyforms_result = $this->emodel->verify_data_traineelist($postData,$postData_where);
        
        echo json_encode($get_funnel_keyforms_result);
    }

    public function get_trainee_completed_list(){

        $postData = $this->input->post();
        $postData_where=$_SESSION['emp_id'];
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        // echo"test<pre>";print_r($postData_where);die;
        $get_trainee_completed_list_result = $this->emodel->verify_data_trainee_completed_list($postData,$postData_where);
        
        echo json_encode($get_trainee_completed_list_result);
    }

    public function get_trainee_pending_list(){

        $postData = $this->input->post();
        $postData_where=$_SESSION['emp_id'];
        // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        // echo"test<pre>";print_r($postData_where);die;
        $get_trainee_pending_list_result = $this->emodel->verify_data_trainee_pending_list($postData,$postData_where);
        
        echo json_encode($get_trainee_pending_list_result);
    }

/*list report in batch group by */
    public function get_trainee_report_list(){

        $postData_where['batch_code'] = $this->input->post('current_rowid');
        $postData_where['trainee_code'] = $this->input->post('trainee_code');
         // echo"<pre>";print_r($postData_where);
        $current_date=date("Y-m-d");

        $postData = $this->input->post();
        $postData_where['emp_code']=$_SESSION['emp_id'];
        $postData_where['assignedDate']=$current_date;
        $get_funnel_keyforms_result = $this->emodel->report_trainee_listing($postData,$postData_where);
        // echo"<pre>";print_r($get_funnel_keyforms_result);die;
        echo json_encode($get_funnel_keyforms_result);
    }
    /*next date report */
    public function get_next_date_result(){
         // echo"<pre>";print_r($this->input->post('current_rowid'));die;

        $postData_where['batch_code'] = $this->input->post('current_rowid');
        $postData_where['emp_code']=$_SESSION['emp_id'];
        $get_funnel_keyforms_result = $this->emodel->report_date($postData_where);
        // echo"asdasd<pre>";print_r($get_funnel_keyforms_result);die;
        echo json_encode($get_funnel_keyforms_result);
    }

    /*current date listing*/
    public function get_current_date_list(){
            // echo"<pre>";print_r($this->input->post());die;

        /*$current_date=date("Y-m-d");
        if ($current_date == date("Y-m-d")) {
            $current_date=date("Y-m-d");
        }else{
            $test = $this->db->query("select (assignedDate) from trainee_daily_report where assignedDate='" . $current_date . "'");
            $current_date = $test->row();
            $current_date= json_decode( json_encode($current_date), true);
            $current_date=$current_date['assignedDate'];
         }*/

        $current_date=date("Y-m-d");
        $postData = $this->input->post();
        $postData_where['emp_code']=$_SESSION['emp_id'];
        $postData_where['assignedDate']=$current_date;
        $get_funnel_keyforms_result = $this->emodel->current_date_list($postData,$postData_where);
        
        echo json_encode($get_funnel_keyforms_result);
    }

    public function get_list_edit_trainee(){

        $where_cond['id'] = $this->input->post('table_row_id');

        $get_adtdetails_rs_result = $this->cmodel->verify_data('create_trainee',$where_cond);

        echo json_encode($get_adtdetails_rs_result);
    }

    public function get_row_trainee_list(){
         // print_r($this->input->post('table_row_trainee_code'));die;

        $where_cond['trainee_code'] = $this->input->post('table_row_trainee_code');

        $get_row_trainee_list_result = $this->cmodel->get_row_trainee_list_verify_data('create_trainee',$where_cond);

        echo json_encode($get_row_trainee_list_result);
    }

    public function get_user_edit_form(){
        
        $where_cond['id'] = $this->input->post('current_rowid');

        $get_rs_key_edit_form_result = $this->cmodel->verify_data('create_trainee',$where_cond);
        // print_r($this->db->last_query());die;
        echo json_encode($get_rs_key_edit_form_result);
    }

    public function check_repot_exists_list(){
        
        $where_cond['batch_code'] = $this->input->post('current_rowid');

        $all_count = $this->cmodel->verify_data_count('trainee_dup_record',$where_cond);
        // echo "string";print_r($all_count);die;
        echo json_encode($all_count);
    }

    /*dashboard trainee count*/
    public function check_trainee_count() {
          $trainee_count = $this->db->count_all("create_trainee");
          echo json_encode($trainee_count);
        }

    /*dashboard trainer count*/
    public function check_trainer_count() {
          $trainee_count = $this->db->count_all("trainer_name");
          // print_r($this->db->last_query());die;
          echo json_encode($trainee_count);
        }

    public function check_date_value(){
        
        $where_cond['batch_code'] = $this->input->post('current_rowid');
        $where_cond['assignedDate'] = date("Y-m-d") ;
        // echo "string";print_r($where_cond);die;
        $date_count = $this->cmodel->verify_date('trainee_dup_record',$where_cond);
        // print_r($this->db->last_query());die;
        echo json_encode($date_count);
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

       

        $editform_result = $this->cmodel->updates('create_trainee',$where_cond, 'id', $id);
        // print_r($editform_result);die;

        if($editform_result){
            $result = array(
                "response" => "success",
                "url" => "EmpController/emp_form_table"
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
                "url" => "EmpController/emp_edit_form"
            );
            echo json_encode($result);
        }
    }

    /*next date report add*/
   /* public function nextReportDate(){
       $day = $this->input->post('daycount');

        $where_cond['emp_code'] = $this->input->post('emp_code');
        $where_cond['assignedDate'] = $this->input->post('next_date');
        $where_cond['createdBy_emp'] = $_SESSION['emp_id'];
        $where_cond['batch_code'] = $this->input->post('batch_code');
       // echo"<pre>";print_r($where_cond['batch_code']);die;
        $where_cond['day_type'] =($day + '1');
        $where_cond['status'] ="pending";

        $editform_result = $this->cmodel->data_add('trainee_dup_record',$where_cond);

        if($editform_result){
            $result = array(
                "response" => "success",
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
            );
            echo json_encode($result);
        }
    }*/

    public function addReportForm(){
        /*if ($this->input->post('daycount') =='1') {
            $where_cond['training_day'] =$this->input->post('daycount');
        }else{
            $day = $this->input->post('daycount');
            $where_cond['training_day'] =($day);
        }*/
        
        // echo "<pre>";print_r($where_cond);die;
        $where_cond['training_day'] =$this->input->post('daycount');
        $where_cond['assignedDate'] = $this->input->post('assignedDate');
        $where_cond['batch_code'] = $this->input->post('batch_code');
        $where_cond['trainee_code'] = $this->input->post('trainee_code');
        $where_cond['created_by'] = $_SESSION['emp_id'];
        $where_cond['attendance'] = $this->input->post('attendance');
        $where_cond['progress_trend'] = $this->input->post('progress_trend');
        $where_cond['punctuality'] = $this->input->post('punctuality');
        $where_cond['completion_assignment'] = $this->input->post('completion_assignment');
        $where_cond['participation_act'] = $this->input->post('participation_act');
        $where_cond['understanding_content'] = $this->input->post('understanding_content');
        $where_cond['communication'] = $this->input->post('communication');
        $where_cond['confidence'] = $this->input->post('confidence');
        $where_cond['asking_questions'] = $this->input->post('asking_questions');
        $where_cond['average_score'] = $this->input->post('average_score');
        // $where_cond['Last_three_days_ave'] = $this->input->post('Last_three_days_ave');
        $where_cond['remarks'] = $this->input->post('remarks');

       // $test=$this->input->post('test');
        if ($this->input->post('training_status')=="") {
            $where_cond_1['status'] = 'pending';
        }else{
            $where_cond_1['status'] = 'completed';
        }

        // if ($this->input->post('training_status')>0) {
        //     $where_cond_1['status'] = 'pending';
        // }else{
        //     $where_cond_1['status'] = 'completed';
        // }

        $a= $this->input->post('batch_code');
        $where_cond_1['batch_code']=$a[0];
        $where_cond_1['day_type'] =$this->input->post('daycount');
        $where_cond_1['createdBy_emp'] = $_SESSION['emp_id'];
        $where_cond_1['emp_code'] = $_SESSION['emp_id'];
        $where_cond_1['assignedDate'] = $this->input->post('assignedDate');
        $editform_result = $this->cmodel->trainee_report_add('trainee_daily_report',$where_cond);
        $editform_result = $this->cmodel->trainee_report_add_dup('trainee_dup_record',$where_cond_1);

        if($editform_result){
            $result = array(
                "response" => "success",
                "url" => "EmpController/emp_progress_list"
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
                "url" => "EmpController/emp_progress"
            );
            echo json_encode($result);
        }
    }
    public function get_batch_no()
    {
        $batch_no_list = $this->cmodel->get_batch_no('create_trainee','batch_code','id');
        // print_r($this->db->last_query());die;
        echo json_encode($batch_no_list);
    }
    public function get_trainee_code()
    {
        $data['batch_code'] =$this->input->post('batch_no');
        // print_r($data);
        $trainee_code_list = $this->cmodel->get_trainee_code('create_trainee','trainee_code',$data);
        // print_r($this->db->last_query());die;
        echo json_encode($trainee_code_list);
    }
    public function get_emp_remark_list()
    {
    if($this->input->post('trainee_code')!=''){
        $postData=$this->input->post();
        $postData_where =$this->input->post('trainee_code');
        $get_emp_list = $this->emodel->get_emp_list($postData,$postData_where);
        // print_r($this->db->last_query());die;
        echo json_encode($get_emp_list);
    }
    }
    public function addRemark()
    {
        if($this->input->post('remarks')!='')
        {
        $data['batch_code'] =$this->input->post('batch_code');
        $data['trainee_code'] =$this->input->post('trainee_code');
        $data['rag'] =$this->input->post('rag');
        $data['remark'] =$this->input->post('remarks');
        // print_r($data);
        $trainee_code_list = $this->emodel->create_emp_remarks('table_emp_remark',$data);
        if($trainee_code_list=="success"){
            $result = array(
                "response" => "success",
                "url" => "EmpController/emp_remark"
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
                "url" => "EmpController/emp_remark"
            );
            echo json_encode($result);
        }
    }
    } 
    public function get_report_remark_list()
    {
        $postData=$this->input->post();
        $batch_no =$this->input->post('batch_no');
        // echo $batch_no;
        $trainee_code =$this->input->post('trainee_code');
        // echo $trainee_code;
        $get_emp_list = $this->emodel->get_report_remark_list($postData,$batch_no,$trainee_code);
        // print_r($this->db->last_query());die;
        // print_r($get_emp_list);die; 
        echo json_encode($get_emp_list);
    }
    public function get_perform_employee()
    {
        $postData = $this->input->post();
        $postData_where['batch_no'] =$this->input->post('batch_no');
        $postData_where['level'] =$this->input->post('level');
        $postData_where['attempt'] =$this->input->post('attempt');
        // print_r($batch_no);die;
        $get_perform_list = $this->emodel->get_perform_employee($postData,$postData_where);
        // print_r($this->db->last_query());die;
        // print_r($get_perform_list);die;
        echo json_encode($get_perform_list);

    }
    public function add_emp_performance()
    {
    	// echo "<pre>";print_r($this->input->post()); die;

        $postData['Batch_no']=$this->input->post('batch_no');
        $postData['Level']=$this->input->post('level');
        $postData['Attempt']=$this->input->post('attempt');
        $postData['assign_chbox']=$this->input->post('assign_chbox');
        $postData['mark']=$this->input->post('mark');
        $postData['tot_mark']=$this->input->post('tot_mark');
        $postData['status']=$this->input->post('status');
        $postData['percentage']=$this->input->post('percentage');
        // echo "<pre>";print_r($postData);
        $add_perform_mark = $this->emodel->add_perform_mark($postData);
        if($add_perform_mark=="success"){
            $result = array(
                "response" => "success",
            );
            echo json_encode($result);
        }
        else{
            $result = array(
                "response" => "failed",
            );
            echo json_encode($result);
        }
    }
    public function get_performance_report_list()
    {
        // print_r($this->input->post());
        $postData = $this->input->post();
        $postData_where['Batch_code']=$this->input->post('batch_no');
        $postData_where['Trainee_code']=$this->input->post('trainee_code');
        // print_r($postData);
        $get_report_list = $this->emodel->get_performance_report_list($postData,$postData_where);
        // print_r($this->db->last_query());die;
        // echo "<pre>";print_r($get_report_list);die;
        echo json_encode($get_report_list);


    }
    public function fetch_remark_details()
    {
        $postData_where['trainee_code'] = $this->input->post('trainee_code');
        $get_remark_details = $this->emodel->fetch_remark_details($postData_where);
        // print_r($get_remark_details);
        echo json_encode($get_remark_details);
    }
    public function update_remark()
    {
    //    echo "<pre>"; print_r($this->input->post());
       $postData['Rag']=$this->input->post('edit_rag');
       $postData['Remark']=$this->input->post('edit_remark');
       $postData_where['trainee_code']=$this->input->post('edit_trainee_code');
       $update_remark = $this->emodel->update_remark($postData,$postData_where);
       if($update_remark=="success"){
        $result = array(
            "response" => "success",
            "url" => "EmpController/report_remark_list"
        );
        echo json_encode($result);
    }
    else{
        $result = array(
            "response" => "failed",
            "url" => "EmpController/report_remark_list"
        );
        echo json_encode($result);
    }
    }
}
?>