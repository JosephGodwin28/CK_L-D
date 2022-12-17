<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model{

	function attendance_form_batch_code(){
		$response = array();
        //# Total number of records without filtering
		$query =$this->db->query("select DISTINCT(create_trainee.batch_code) from create_trainee  where create_trainee.batch_code!='' ");
		$query = $query->result_array();
		$query_attendance =$this->db->query("select DISTINCT(trainee_dup_record.batch_code) from trainee_dup_record where 1");
		$query_attendance = $query_attendance->result_array();
		
		foreach($query_attendance as $keys=>$values){
			foreach($values as $key=>$value){
				$attendance_batchcode[]=$value;
			}
		}
		foreach($query as $keys1=>$values1){
			foreach($values1 as $key1=>$value1){
				if( !empty($attendance_batchcode) && (in_array($value1,$attendance_batchcode))){
					$batchcode_list['batch_code'][]=$value1;
					$batchcode_list['valid_attr'][]='disabled';
				}else{
					$batchcode_list['batch_code'][]=$value1;
					$batchcode_list['valid_attr'][]='';
				}
				
			}
		}
		return $batchcode_list;
	}
	function verify_data_report_attendancelist($postData){
		$batch_code=$postData['batch_code'];
		$trainee_code=$postData['trainee_code'];
		
        
		$this->db->select('*','distinct(trainee_code)');
		$this->db->from('trainee_daily_report');
		if($batch_code!='') $this->db->where('batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('trainee_code',$trainee_code);
		$this->db->group_by('trainee_code');
		$records1 = $this->db->get()->result();

		//#Get Trainer name
		$data = array();
		$i=1;
		$j=0;

		
	
   		$dataTable_dynamic['columns'] = array(array("Sno"),array("Location"),array("Batch Code"),array("Trainee Code"),array("Trainee Name"),array("Designation"));



   			 //# Fetch records
		$this->db->select('distinct(training_day)');
		$this->db->from('trainee_daily_report');
		
		if($batch_code!='') $this->db->where('batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('trainee_code',$trainee_code);
		$days_records = $this->db->get()->result();
		foreach($days_records as $key=>$values){
			$dataTable_dynamic['columns'][]= array("day ".$values->training_day);
		}
		
		foreach ($records1 as $record) {
			$this->db->select('*');
			$this->db->from('create_trainee');
			$this->db->where('trainee_code',$record->trainee_code);
			$getEmpDetails = $this->db->get()->result();
			
			$dataTable_dynamic['data'][$j] = array(
				 $i,
				 $getEmpDetails[0]->location,
				 $record->batch_code,
				 $record->trainee_code,
				 $getEmpDetails[0]->name_trainee,
				 $getEmpDetails[0]->designation,
			);
			foreach($days_records as $key=>$values){
				$this->db->select('attendance');
				$this->db->from('trainee_daily_report');
				$this->db->where('trainee_code',$record->trainee_code);
				$this->db->where('training_day',$values->training_day);
				$getDaysDetails = $this->db->get()->result();
				array_push($dataTable_dynamic['data'][$j],$getDaysDetails[0]->attendance);
			}
			$i++;
			$j++;
		}

		
		return $dataTable_dynamic;
	}
	
	function get_report_table_attendance_traineelist(){
		$this->db->select('distinct(trainee_code)');
		//$this->db->where('batch_code',$b_code);
		$records = $this->db->get('create_trainee');
		$trainee_codes=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$trainee_codes[]=$value;	
			}
		}
		return $trainee_codes;

	}
	function get_report_table_attendance_traineelist_batch($table,$b_code){
		$this->db->select('distinct(trainee_code)');
		$this->db->where('batch_code',$b_code);
		$records = $this->db->get('create_trainee');
		$trainee_codes=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$trainee_codes[]=$value;	
			}
		}
		return $trainee_codes;
	}
	
	

}