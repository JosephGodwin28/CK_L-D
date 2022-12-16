<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_model extends CI_Model{

	function verify_data_traineelist($postData,$postData_where){
		// echo "<pre>";print_r($postData);
		// echo "<pre>";print_r($postData_where);die;
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%' or 
			name_trainee like '%" . $searchValue . "%' ) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
        $this->db->where('emp_code',$postData_where);

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
        $this->db->where('emp_code',$postData_where);
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
  		$this->db->where('emp_code',$postData_where);

		if ($searchQuery != '') $this->db->where($searchQuery);
		$this->db->order_by('id', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// echo"";print_r($this->db->last_query());die;

		$data = array();

		foreach ($records as $record) {
			// echo "<pre>";print_r($record);
			$timedate1 = strtotime(date("Y-m-d", strtotime($record->created_on)));
			$created_on = date("d-m-Y", $timedate1);

			$action_url2 = base_url()."EmpController/emp_edit_form/".$record->id;

			
			$action = '<button onclick="get_trainee_pop('."'".$record->id."'".');" class="btn  btn-sm btn-info dt-btn-st" id="adtbtn"><i class="bx bx-comment-dots"></i></button>';
			
			$action .= ' <a http-equiv = "refresh" href="'.$action_url2.'" target="_blank"><button  type="button" class="btn btn-sm btn-dark dt-btn-st" id="editBtn"><i class="bx bx-pencil"></i></button></a>';
            
			$data[] = array(
				"id" => $record->id,
				"name_trainee" => $record->name_trainee,
				"designation" => $record->designation,
				"batch_code" => $record->batch_code,
				"assignedDate" => $record->assignedDate,
				"number" => $record->number,
				"gender" => $record->gender,
				"emp_dob" => $record->emp_dob,
				"created_on" => $created_on,
				"action"=>$action,
				"created_by" => $record->created_by
				// "check_box_field" =>$check_box_field

			);
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		// echo "<pre>";print_r($response);die;
		return $response;
	}


	function report_trainee_listing($postData,$postData_where){
		// echo "<pre>";print_r($postData_where);die;
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%' or 
			name_trainee like '%" . $searchValue . "%' ) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
         $this->db->where('emp_code',$postData_where['emp_code']);
        // $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('batch_code',$postData_where['batch_code']);

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
         $this->db->where('emp_code',$postData_where['emp_code']);
        // $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('batch_code',$postData_where['batch_code']);
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
  		 $this->db->where('emp_code',$postData_where['emp_code']);
        // $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('batch_code',$postData_where['batch_code']);

		if ($searchQuery != '') $this->db->where($searchQuery);
		$this->db->order_by('id', 'desc');  // or desc

		// $this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// print_r($this->db->last_query());die;

		$data = array();

		foreach ($records as $record) {
			// echo "<pre>";print_r($record);die;
			$timedate1 = strtotime(date("Y-m-d", strtotime($record->created_on)));
			$created_on = date("d-m-Y", $timedate1);

			$batch_code=$record->batch_code."<input id='batch_code' name='batch_code[]' type='hidden' value='".$record->batch_code."'>";
			$assignedDate=$record->assignedDate."<input id='assignedDate' name='assignedDate[]' type='hidden' value='".$record->assignedDate."'>";
			$trainee_code="<input id='trainee_code' name='trainee_code[]' type='hidden' value='".$record->trainee_code."'>";
			// echo "<pre>";print_r($id);die;
			$attendance = '<select name="attendance[]" class="form-select" id="attendance" required >
						    <option value="">Select</option>
						    <option value="P">Present</option>
						    <option value="AB">Absent</option>
						    <option value="OFF">Weekly OFF</option>
						  </select>';
			$progress_trend = '<input type="text" class="form-control " id="progress_trend" name="progress_trend[]" ></input>';
			
			$punctuality = '<input type="text"  min="10" class="form-control common" maxlength="2" id="punctuality" name="punctuality[]" onkeypress="return isNumber(event)" required></input>';

			$completion_assignment = '<input type="text" maxlength="2" class="form-control common" id="completion_assignment" name="completion_assignment[]" onkeypress="return isNumber(event)" required></input>';

			$participation_act = '<input type="text" maxlength="2" class="form-control common" id="participation_act" name="participation_act[]" onkeypress="return isNumber(event)" required></input>';

			$understanding_content = '<input type="text" maxlength="2" class="form-control common" id="understanding_content" name="understanding_content[]" onkeypress="return isNumber(event)" required></input>';

			$communication = '<input type="text" maxlength="2" class="form-control common"id="communication" name="communication[]" onkeypress="return isNumber(event)" required></input>';

			$confidence = '<input type="text" maxlength="2" class="form-control common"id="confidence" name="confidence[]" onkeypress="return isNumber(event)" required></input>';

			$asking_questions = '<input type="text" maxlength="2" class="form-control common" id="asking_questions" name="asking_questions[]" onkeypress="return isNumber(event)" required></input>';

			$average_score = '<input type="text" class="form-control" id="average_score" name="average_score[]" readonly></input>';
			// $Last_three_days_ave= '<input type="text" class="form-control" id="Last_three_days_ave" name="Last_three_days_ave[]" ></input>';
			$remarks = '<input type="text"class="form-control" id="remarks" name="remarks[]"></input>';
            
            $name_trainee = $trainee_code.$record->name_trainee;

			$data[] = array(
				"id" => $record->id,
				"trainee_code"=>$record->trainee_code,
				"name_trainee" => $name_trainee,
				"batch_code" => $batch_code,
				"assignedDate" => $assignedDate,
				"attendance" => $attendance,
				"progress_trend"=> $progress_trend,
				"punctuality"=> $punctuality,
				"completion_assignment"=> $completion_assignment,
				"participation_act"=> $participation_act,
				"understanding_content"=> $understanding_content,
				"communication"=> $communication,
				"confidence"=> $confidence,
				"asking_questions"=> $asking_questions,
				"average_score"=> $average_score,
				// "Last_three_days_ave"=> $Last_three_days_ave,
				"remarks"=> $remarks,

			);
		}
		// echo "<pre>";print_r($data);die;

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		return $response;
	}
	/*date report*/
	function report_date($postData_where){
		// echo "<pre>";print_r($postData_where);die;

        //# Total number of records without filtering
		$this->db->select('*');
		$this->db->from('trainee_dup_record');
         $this->db->where('emp_code',$postData_where['emp_code']);
        $this->db->where('batch_code',$postData_where['batch_code']);

		$records = $this->db->get()->result();
		// print_r($this->db->last_query());die;
		$data = array();

		foreach ($records as $record) {
			// $a=$record->trainer_name;
			$status="<input id='status' name='status' type='hidden' value='".$record->status."'>";
			$emp_code="<input id='emp_code' name='emp_code' type='hidden' value='".$record->emp_code."'>";
			$batch_code=$record->batch_code;
			$assignedDate=$record->assignedDate."<input id='assignedDate' name='assignedDate' type='hidden' value='".$record->assignedDate."'>";
			$createdBy_emp=$record->createdBy_emp."<input id='createdBy_emp' name='createdBy_emp' type='hidden' value='".$record->createdBy_emp."'>";
			$day_type=$record->day_type."<input id='day_type' name='day_type' type='hidden' value='".$record->day_type."'>";
            
            // $name_trainee = $emp_code.$record->name_trainee;

			$data[] = array(
				"id" => $record->id,
				// "trainer_name" =>$trainer_name,
				"emp_code"=>$record->emp_code,
				"batch_code" => $batch_code,
				"assignedDate" => $assignedDate,
				"createdBy_emp" => $createdBy_emp,
				"day_type" => $day_type,

			);
		}
		// echo "<pre>";print_r($data);die;
		return $data;
	}

	function current_date_list($postData,$postData_where){
		// echo "<pre>";print_r($postData_where);die;
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
			name_trainee like '%" . $searchValue . "%' ) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('trainee_dup_record');
        $this->db->where('emp_code',$postData_where['emp_code']);
        $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('status','pending');

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('trainee_dup_record');
        $this->db->where('emp_code',$postData_where['emp_code']);
        $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('status','pending');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('trainee_dup_record');
  		$this->db->where('emp_code',$postData_where['emp_code']);
        $this->db->where('assignedDate',$postData_where['assignedDate']);
        $this->db->where('status','pending');

		if ($searchQuery != '') $this->db->where($searchQuery);
		$this->db->group_by('batch_code', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// print_r($this->db->last_query());die;

		$data = array();

		foreach ($records as $record) {
			$current_date=date("Y-m-d");
			// echo "<pre>";print_r($current_date);die;

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->assignedDate)));
			$assignedDate = date("d-m-Y", $timedate1);

			$action_url2 = base_url()."EmpController/emp_progress/".$record->batch_code;

			$this->db->select('count(*) as report_count');
			$this->db->from('trainee_daily_report');
			$this->db->where('created_on', $current_date);
			$results = $this->db->get()->result();
			// echo '<pre>';print_r($this->db->last_query());die();
			
			if($results[0]->report_count == 0){
				$action = '<a http-equiv = "refresh" href="'.$action_url2.'"><button  type="button" class="btn btn-sm btn-dark dt-btn-st" id="editBtn"><i class="bx bx-pencil"></i></button></a>';
			}
			else{
				$action = '';
			}
            
			$data[] = array(
				"id" => $record->id,				
				"batch_code" => $record->batch_code,
				"assignedDate" => $assignedDate,
				"action"=>$action,
			);
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		// echo "<pre>";print_r($response);die;
		return $response;
	}

	function verify_data_trainee_completed_list($postData,$postData_where){
		// echo "<pre>";print_r($postData_where);die;
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%' or 
			designation like '%" . $searchValue . "%' ) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('*');
		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','completed');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');

		$records = $this->db->get()->result();

		$totalRecords = count($records);

        //# Total number of record with filtering
		$this->db->select('*');
		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','completed');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = count($records);

        //# Fetch records
		$this->db->select('*');
  		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','completed');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');

		if ($searchQuery != '') $this->db->where($searchQuery);
		

		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// print_r($this->db->last_query());die;

		$data = array();

		foreach ($records as $record) {
			// echo "<pre>";print_r($record);die;

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->emp_dob)));
			$emp_dob = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->assignedDate)));
			$assignedDate = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->created_on)));
			$created_on = date("d-m-Y", $timedate1);
			
			$action = '<button onclick="get_trainee_pop('."'".$record->trainee_code."'".');" class="btn  btn-sm btn-info dt-btn-st" id="adtbtn"><i class="bx bx-comment-dots"></i></button>';
            
			$data[] = array(
				"id" => $record->id,
				"name_trainee" => $record->name_trainee,
				"designation" => $record->designation,
				"batch_code" => $record->batch_code,
				"assignedDate" => $assignedDate,
				"number" => $record->number,
				"gender" => $record->gender,
				"emp_dob" => $emp_dob,
				"created_on" => $created_on,
				"action"=>$action,
				"created_by" => $record->created_by
			);
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		// echo "<pre>";print_r($response);die;
		return $response;
	}

	function verify_data_trainee_pending_list($postData,$postData_where){
		// echo "<pre>";print_r($postData_where);die;
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%' or 
			designation like '%" . $searchValue . "%' ) ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}

        //# Total number of records without filtering
		$this->db->select('*');
		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','pending');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');

		$records = $this->db->get()->result();
		$totalRecords = count($records);
		// $totalRecords = $records[0]->allcount;
		// echo '<pre>';print_r($this->db->last_query());
		// echo '<pre>';print_r($totalRecords);die();

        //# Total number of record with filtering
		$this->db->select('*');
		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','pending');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = count($records);
		// echo '<pre>';print_r($totalRecordwithFilter);die();
		// echo '<pre>';print_r($this->db->last_query());

        //# Fetch records
		$this->db->select('*');
		$this->db->where('tdr.emp_code',$postData_where);
  		$this->db->where('tdr.status','pending');
  		$this->db->where('tdr.createdBy_emp!=','admin01');
		$this->db->from('trainee_dup_record as tdr');
		$this->db->join('create_trainee as ct','ct.batch_code=tdr.batch_code');
		$this->db->group_by('ct.name_trainee');
		$this->db->group_by('tdr.batch_code');

		if ($searchQuery != '') $this->db->where($searchQuery);		

		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// echo '<pre>';print_r($this->db->last_query());die();

		$data = array();

		foreach ($records as $record) {
			// echo "<pre>";print_r($record);die;

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->assignedDate)));
			$assignedDate = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->emp_dob)));
			$emp_dob = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->created_on)));
			$created_on = date("d-m-Y", $timedate1);
			
			$action = '<button onclick="get_trainee_pop('."'".$record->trainee_code."'".');" class="btn  btn-sm btn-info dt-btn-st" id="adtbtn"><i class="bx bx-comment-dots"></i></button>';
            
			$data[] = array(
				"id" => $record->id,
				"name_trainee" => $record->name_trainee,
				"designation" => $record->designation,
				"batch_code" => $record->batch_code,
				"assignedDate" => $assignedDate,
				"number" => $record->number,
				"gender" => $record->gender,
				"emp_dob" => $emp_dob,
				"created_on" => $created_on,
				"action"=>$action,
				"created_by" => $record->created_by
			);
		}

        //# Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
		// echo "<pre>";print_r($response);die;
		return $response;
	}

	

}