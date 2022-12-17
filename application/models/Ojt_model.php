<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ojt_model extends CI_Model{

	
	function ojt_form_emp($b_code){
		$response = array();
        //# Total number of records without filtering
		$this->db->select('*');
		$this->db->where('create_trainee.batch_code',$b_code);
		$this->db->from('create_trainee');
		$query = $this -> db ->get()-> result_array();
		return $query;
	}
	function ojt_form_batch_code(){
		$response = array();
        //# Total number of records without filtering
		$query =$this->db->query("select DISTINCT(create_trainee.batch_code) from create_trainee where create_trainee.batch_code!='' ");
		$query = $query->result_array();
		$query_ojt =$this->db->query("select DISTINCT(table_ojt.table_ojt_batch_code) from table_ojt where table_ojt.table_ojt_day_status =3");
		$query_ojt = $query_ojt->result_array();
		foreach($query_ojt as $keys=>$values){
			foreach($values as $key=>$value){
				$ojt_batchcode[]=$value;
			}
		}
		foreach($query as $keys1=>$values1){
			foreach($values1 as $key1=>$value1){

				if(!empty($ojt_batchcode) && (in_array($value1,$ojt_batchcode))){
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
	function verify_data_ojtlist($b_code,$postData){
		$response = array();
        //# Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value
        
		//# Search
		$search_arr = array();
		$searchQuery = "";

		if ($searchValue != '') {
			$search_arr[] = " (batch_code like '%" . $searchValue . "%' or 
			location like '%" . $searchValue . "%' or 
			trainee_code like '%" . $searchValue . "%' or 
			join_date like '%" . $searchValue . "%') ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('create_trainee');
	
		if ($searchQuery != '') $this->db->where($searchQuery);
		//$this->db->order_by('id', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		$this->db->where('batch_code',$b_code);
		$records1 = $this->db->get()->result();
		

		//#Get Trainer name
		$data = array();
		$i=1;
		foreach ($records1 as $record) {
			$this->db->select('trainer_name');
			$this->db->from('trainer_name');
			$this->db->where('emp_code',$record->emp_code);
			$gettrainer_name = $this->db->get()->result();

			$data[] = array(
				"id" => $i,
				"batch_code" => '<input type="hidden"  id="batch_code" name="batch_code[]" value="'.$record->batch_code.'">'.$record->batch_code,
				"location" => '<input type="hidden"  id="location" name="location[]" value="'.$record->location.'">'.$record->location,
				"name_trainee" => '<input type="hidden"  id="trainee_code" name="trainee_code[]" value="'.$record->trainee_code.'">'.$record->trainee_code,
				
				"designation" => '<input type="hidden"  id="designation" name="designation[]" value="'.$record->designation.'">'.$record->designation,

				"join_date" => '<input type="hidden"  id="join_date" name="join_date[]" value="'.$record->join_date.'">'.$record->join_date,
				"trainer" => '<input type="hidden"  id="emp_code" name="emp_code[]" value="'.$record->emp_code.'">'.$gettrainer_name[0]->trainer_name,
				"training_covered" => '<input type="text" class="form-control" id="training_covered" name="training_covered[]" required>',
				"total_no_outlet_visit" => '<input type="text" class="form-control" id="total_outlet" name="total_outlet[]" required>',
				"target_achieved"=>'<input type="text" class="form-control" id="total_achieved" name="target_achieved[]" required>'		

			); 
			$i++;
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		return $response;
	}

	function get_table_ojt_daylist($table,$b_code){
		$this->db->select('distinct(table_ojt_day_status)');
		$this->db->where('table_ojt_batch_code',$b_code);
		$records = $this->db->get($table);
		$days=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$days[]=$value;
				
			}
		}
		$days_waiting=array();
		(!in_array(1,$days))?$days_waiting[]=1:'';
		(!in_array(2,$days))?$days_waiting[]=2:'';
		(!in_array(3,$days))?$days_waiting[]=3:'';
		return $days_waiting;
	}
	function form_store_ojt_tracker($postdata,$day){
		$createdBy = $this->session->emp_id;
		for($i=0;$i<count($postdata['batch_code']);$i++){
			$data = array(
                        'table_ojt_batch_code' => $postdata['batch_code'][$i],
                        'table_ojt_location' => $postdata['location'][$i],
                        'table_ojt_trainee_code' => $postdata['trainee_code'][$i],
                        'table_ojt_designation' => $postdata['designation'][$i],
                        'table_ojt_join_date' => $postdata['join_date'][$i],
                        'table_ojt_trainer_code' => $postdata['emp_code'][$i],
                        'table_ojt_day_status' => $day,
                        'table_ojt_training_covered' => $postdata['training_covered'][$i],
                        'table_ojt_total_outlet' => $postdata['total_outlet'][$i],
                        'table_ojt_target_achieved' => $postdata['target_achieved'][$i],
                        'table_ojt_created_by' => $createdBy,
                        'table_ojt_created_on' => date('Y-m-d'),
                       
                    );
			 $this->db->insert('table_ojt', $data);
		}
		return 'success';
	}
	function verify_data_report_ojtlist($postData){
		$batch_code=$postData['batch_code'];
		$day=$postData['day'];
		$trainee_code=$postData['trainee_code'];




		// echo "<pre>";print_r($postData);die;
		$response = array();
        //# Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value
        
		//# Search
		$search_arr = array();
		$searchQuery = "";
		
		if ($searchValue != '') {
			$search_arr[] = " (table_ojt_batch_code like '%" . $searchValue . "%' or 
			table_ojt_location like '%" . $searchValue . "%' or 
			table_ojt_trainee_code like '%" . $searchValue . "%' or 
			table_ojt_designation like '%" . $searchValue . "%' or 
			table_ojt_join_date like '%" . $searchValue . "%' or 
			table_ojt_day_status like '%" . $searchValue . "%' or 
			table_ojt_training_covered like '%" . $searchValue . "%' or 
			table_ojt_total_outlet like '%" . $searchValue . "%' or 
			table_ojt_target_achieved like '%" . $searchValue . "%' 
			) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}



        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('table_ojt');

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('table_ojt');
		
		if($batch_code!='') $this->db->where('table_ojt_batch_code',$batch_code);
		if($day!='') $this->db->where('table_ojt_day_status',$day);
		if($trainee_code!='') $this->db->where('table_ojt_trainee_code',$trainee_code);
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('table_ojt');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		//$this->db->order_by('id', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		if($batch_code!='') $this->db->where('table_ojt_batch_code',$batch_code);
		if($day!='') $this->db->where('table_ojt_day_status',$day);
		if($trainee_code!='') $this->db->where('table_ojt_trainee_code',$trainee_code);
		
		$records1 = $this->db->get()->result();
		

		//#Get Trainer name
		$data = array();
		$i=1;
		foreach ($records1 as $record) {
			$this->db->select('trainer_name');
			$this->db->from('trainer_name');
			$this->db->where('emp_code',$record->table_ojt_trainer_code);
			$gettrainer_name = $this->db->get()->result();
			//(`table_ojt_id`, `table_ojt_batch_code`, `table_ojt_location`, `table_ojt_trainee_code`, `table_ojt_designation`, `table_ojt_join_date`, `table_ojt_trainer_code`, `table_ojt_day_status`, `table_ojt_training_covered`, `table_ojt_total_outlet`, `table_ojt_target_achieved`, `table_ojt_created_by`, `table_ojt_created_on`) 
			$data[] = array(
				"id" => $i,
				"batch_code" => $record->table_ojt_batch_code,
				"location" => $record->table_ojt_location,
				"name_trainee" => $record->table_ojt_trainee_code,
				"designation" => $record->table_ojt_designation,
				"join_date" => $record->table_ojt_join_date,
				"trainer" => $gettrainer_name[0]->trainer_name,
				"day" => 'Day '.$record->table_ojt_day_status,
				"training_covered" => $record->table_ojt_training_covered,
				"total_no_outlet_visit" => $record->table_ojt_total_outlet,
				"target_achieved"=>	$record->table_ojt_target_achieved	

			); 
			$i++;
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		return $response;

	}
	function get_report_table_ojt_daylist($table,$b_code){
		$this->db->select('distinct(table_ojt_day_status)');
		$this->db->where('table_ojt_batch_code',$b_code);
		$records = $this->db->get($table);
		$days=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$days[]=$value;	
			}
		}
		return $days;
	}
	function get_report_table_ojt_traineelist(){
		$this->db->select('distinct(trainee_code)');
		//$this->db->where('table_ojt_batch_code',$b_code);
		$records = $this->db->get('create_trainee');
		$trainee_codes=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$trainee_codes[]=$value;	
			}
		}
		return $trainee_codes;

	}
	function get_table_ojt_traineelist($table,$b_code){
		$this->db->select('distinct(trainee_code)');
		$this->db->where('batch_code',$b_code);
		$records = $this->db->get($table);
		$trainee_list=array();
		foreach($records->result_array() as $keys=>$values){
			foreach($values as $key=>$value){
				$trainee_list[]=$value;
				
			}
		}
		
		return $trainee_list;
	}
	

}