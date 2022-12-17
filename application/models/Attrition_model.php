<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attrition_model extends CI_Model{

	
	function attrition_form_emp($b_code){
		$response = array();
        //# Total number of records without filtering
		$this->db->select('*');
		$this->db->where('create_trainee.batch_code',$b_code);
		$this->db->from('create_trainee');
		$query = $this -> db ->get()-> result_array();
		return $query;
	}
	function attrition_add_form_batch_code(){
		$response = array();
        //# Total number of records without filtering
		//$query =$this->db->query("select DISTINCT(create_trainee.batch_code) from create_trainee  where 1 ");
		//$query = $query->result_array();
		

		$this->db->select('trainee_code');
		//$this->db->where('create_trainee.batch_code',$b_code);
		$this->db->from('create_trainee');
		$this->db->group_by('trainee_code');
		$query = $this -> db ->get()-> result_array();
		
		//print_r($query);
		//die;

		$this->db->select('batch_code');
		$this->db->from('create_trainee');
		
		$this->db->where('trainee_code NOT IN (SELECT table_attrition_trainee_code FROM table_attrition where table_attrition_batch_code="'.$batch_code.'")');
		$this->db->limit($rowperpage, $start);


		$query_attrition =$this->db->query("select DISTINCT(table_attrition.table_attrition_batch_code) from table_attrition where 1");
		$query_attrition = $query_attrition->result_array();
		
		foreach($query_attrition as $keys=>$values){
			foreach($values as $key=>$value){
				$attrition_batchcode[]=$value;
			}
		}
		foreach($query as $keys1=>$values1){
			foreach($values1 as $key1=>$value1){
				if( !empty($attrition_batchcode) && (in_array($value1,$attrition_batchcode))){
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
	function attrition_form_batch_code(){
		$response = array();
        //# Total number of records without filtering
		$query =$this->db->query("select DISTINCT(create_trainee.batch_code) from create_trainee where create_trainee.batch_code!='' ");
		$query = $query->result_array();
		$query_attrition =$this->db->query("select DISTINCT(table_attrition.table_attrition_batch_code) from table_attrition where 1");
		$query_attrition = $query_attrition->result_array();
		
		foreach($query_attrition as $keys=>$values){
			foreach($values as $key=>$value){
				$attrition_batchcode[]=$value;
			}
		}
		foreach($query as $keys1=>$values1){
			foreach($values1 as $key1=>$value1){
				if( !empty($attrition_batchcode) && (in_array($value1,$attrition_batchcode))){
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
	function verify_data_attritionlist($postData){
		$batch_code=$postData['batch_code'];
		$trainee_code=$postData['trainee_code'];
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
			$search_arr[] = " (table_attrition_batch_code like '%" . $searchValue . "%' or 
			table_attrition_location like '%" . $searchValue . "%' or 
			table_attrition_trainee_code like '%" . $searchValue . "%' or 
			table_attrition_designation like '%" . $searchValue . "%' or 
			table_attrition_join_date like '%" . $searchValue . "%' or 
			table_attrition_training_stage like '%" . $searchValue . "%' or 
			table_attrition_attrition_date like '%" . $searchValue . "%' or 
			table_attrition_attrition_mode like '%" . $searchValue . "%' or 
			table_attrition_attrition_category like '%" . $searchValue . "%' or 
			table_attrition_detailed_reason like '%" . $searchValue . "%'

			) ";
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
		if($batch_code!='') $this->db->where('batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('trainee_code',$trainee_code);
		$records = $this->db->get()->result();
		
		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('create_trainee');
		$this->db->join('table_attrition','table_attrition.table_attrition_trainee_code=create_trainee.trainee_code','left');
		if($batch_code!='') $this->db->where('batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('trainee_code',$trainee_code);
		if ($searchQuery != '') $this->db->where($searchQuery);
		//$this->db->where('trainee_code NOT IN (SELECT table_attrition_trainee_code FROM table_attrition where table_attrition_batch_code="'.$batch_code.'")');
		$this->db->limit($rowperpage, $start);
		

		$records1 = $this->db->get()->result();
		//echo '<pre>';print_r($records1);die;		
		//echo '<pre>';                  // to preserve formatting
		//die($this->db->last_query()); 

		//#Get Trainer name
		$data = array();
		$i=1;
		foreach ($records1 as $record) {
			//echo '<pre>';print_r($record);die;
			$this->db->select('trainer_name');
			$this->db->from('trainer_name');
			$this->db->where('emp_code',$record->emp_code);
			$gettrainer_name = $this->db->get()->result();
			if(!empty($record->table_attrition_training_stage)){
				$data[] = array(
					"id" => $i,
					"batch_code" => $record->batch_code,
					"location" => $record->location,
					"name_trainee" => $record->trainee_code,
				
					"designation" => $record->designation,

					"join_date" => $record->join_date,
					"trainer" => $gettrainer_name[0]->trainer_name,
					"training_stage" => $record->table_attrition_training_stage,
					"attrition_date" => $record->table_attrition_attrition_date,
					"attrition_mode"=>$record->table_attrition_attrition_mode,
					"attrition_category"=>$record->table_attrition_attrition_category,
					"detailed_reason"=>$record->table_attrition_detailed_reason
				);
			}else{
					$data[] = array(
						"id" => $i,
						"batch_code" => '<input type="hidden"  id="batch_code" name="batch_code[]" value="'.$record->batch_code.'" />'.$record->batch_code,
						"location" => '<input type="hidden"  id="location" name="location[]" value="'.$record->location.'" />'.$record->location,
						"name_trainee" => '<input type="hidden"  id="trainee_code" name="trainee_code[]" value="'.$record->trainee_code.'" />'.$record->trainee_code,
				
						"designation" => '<input type="hidden"  id="designation" name="designation[]" value="'.$record->designation.'" />'.$record->designation,

						"join_date" => '<input type="hidden"  id="join_date" name="join_date[]" value="'.$record->join_date.'">'.$record->join_date,
						"trainer" => '<input type="hidden"  id="emp_code" name="emp_code[]" value="'.$record->emp_code.'" />'.$gettrainer_name[0]->trainer_name,
						"training_stage" => '

								<select class="form-select" name="training_stage[]" id="training_stage"  required>
                                    <option selected disabled></option>
                                    <option value="vt">VT</option>
                                    <option value="ct">CT</option>
                                    <option value="ojt">OJT</option>
                                  </select>


						',
						"attrition_date" => '<input type="date" class="form-control" id="attrition_date" name="attrition_date[]" required />',
						"attrition_mode"=>'
							<select class="form-select" name="attrition_mode[]" id="attrition_mode"  required>
	                            <option selected disabled></option>
	                            <option value="resigned">Resigned</option>
	                            <option value="absconded">Absconded</option>
	                            <option value="terminated">Terminated</option>
	                          </select>

						',
						"attrition_category"=>'
							<select class="form-select" name="attrition_category[]" id="attrition_category"  required>
	                            <option selected disabled></option>
	                            <option value="behavioural issue">Behavioural Issue</option>
	                            <option value="absent for more than two days">Absent for more than two days</option>
	                            <option value="health issue">Health Issue</option>
	                            <option value="further education">Further Education</option>
	                            <option value="family reason">Family Reason</option>
	                            <option value="shift issue">Shift Issue</option>
	                            <option value="personal reason">Personal Reason</option>
	                            <option value="termination">Termination</option>
	                            <option value="certification failure">Certification Failure</option>
	                            <option value="better opportunity">Better Opportunity</option>
	                            <option value="salary issue">Salary Issue</option>
	                          </select>

						',
						"detailed_reason"=>'
							<select class="form-select" name="detailed_reason[]" id="detailed_reason"  required>
	                            <option selected disabled></option>
	                            <option value="1" id="1" > 1</option>
	                            <option value="2" id="2" > 2</option>
	                            <option value="3" id="3" > 3</option>
	                          </select>

						'
				);
				}

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

	function get_table_attrition_traineelist($table,$b_code){
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
	function form_store_attrition_tracker($postdata){
		$createdBy = $this->session->emp_id;
		for($i=0;$i<count($postdata['batch_code']);$i++){
			$data = array(
                        'table_attrition_batch_code' => $postdata['batch_code'][$i],
                        'table_attrition_location' => $postdata['location'][$i],
                        'table_attrition_trainee_code' => $postdata['trainee_code'][$i],
                        'table_attrition_designation' => $postdata['designation'][$i],
                        'table_attrition_join_date' => $postdata['join_date'][$i],
                        'table_attrition_trainer_code' => $postdata['emp_code'][$i],
                        'table_attrition_training_stage' => $postdata['training_stage'][$i],
                        'table_attrition_attrition_date' => date("d-m-y",strtotime($postdata['attrition_date'][$i])),
                        'table_attrition_attrition_mode' => $postdata['attrition_mode'][$i],
                        'table_attrition_attrition_category' => $postdata['attrition_category'][$i],
                        'table_attrition_detailed_reason' => $postdata['detailed_reason'][$i],
                        'table_attrition_created_by' => $createdBy,
                        'table_attrition_created_on' => date('Y-m-d'),
                       
                    );
			 $this->db->insert('table_attrition', $data);
		}
		return 'success';
	}
	function verify_data_report_attritionlist($postData){
		$batch_code=$postData['batch_code'];
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
			$search_arr[] = " (table_attrition_batch_code like '%" . $searchValue . "%' or 
			table_attrition_location like '%" . $searchValue . "%' or 
			table_attrition_trainee_code like '%" . $searchValue . "%' or 
			table_attrition_designation like '%" . $searchValue . "%' or 
			table_attrition_join_date like '%" . $searchValue . "%' or 
			table_attrition_training_stage like '%" . $searchValue . "%' or 
			table_attrition_attrition_date like '%" . $searchValue . "%' or 
			table_attrition_attrition_mode like '%" . $searchValue . "%' or 
			table_attrition_attrition_category like '%" . $searchValue . "%' or 
			table_attrition_detailed_reason like '%" . $searchValue . "%'

			) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}



        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('table_attrition');

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('table_attrition');
		
		if($batch_code!='') $this->db->where('table_attrition_batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('table_attrition_trainee_code',$trainee_code);
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('table_attrition');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		//$this->db->order_by('id', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		if($batch_code!='') $this->db->where('table_attrition_batch_code',$batch_code);
		if($trainee_code!='') $this->db->where('table_attrition_trainee_code',$trainee_code);
		
		$records1 = $this->db->get()->result();



		
		

		//#Get Trainer name
		$data = array();
		$i=1;
		foreach ($records1 as $record) {
			$this->db->select('trainer_name');
			$this->db->from('trainer_name');
			$this->db->where('emp_code',$record->table_attrition_trainer_code);
			$gettrainer_name = $this->db->get()->result();
			$data[] = array(
				"id" => $i,
				"batch_code" => $record->table_attrition_batch_code,
				"location" => $record->table_attrition_location,
				"name_trainee" => $record->table_attrition_trainee_code,
				"designation" => $record->table_attrition_designation,
				"join_date" => $record->table_attrition_join_date,
				"trainer" => $gettrainer_name[0]->trainer_name,
				"training_stage" =>$record->table_attrition_training_stage,
				"attrition_date" => $record->table_attrition_attrition_date,
				"attrition_mode" => $record->table_attrition_attrition_mode,
				"attrition_category"=>	$record->table_attrition_attrition_category,
				"detailed_reason"=>	$record->table_attrition_detailed_reason	

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
	
	function get_report_table_attrition_traineelist(){
		$this->db->select('distinct(trainee_code)');
		//$this->db->where('table_attrition_batch_code',$b_code);
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