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

	function get_emp_list($postData,$postData_where)
	{
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
        $this->db->from('create_trainee as ct');
        $this->db->join('table_emp_remark as ter','ct.batch_code=ter.batch_code');
        $this->db->where('ter.trainee_code',$postData_where);
		$this->db->where('ct.trainee_code',$postData_where);
		$records=$this->db->get()->result();
		$totalRecords = count($records);

        //# Total number of record with filtering
		$this->db->select('*');
        $this->db->from('create_trainee as ct');
        $this->db->join('table_emp_remark as ter','ct.batch_code=ter.batch_code');
        $this->db->where('ter.trainee_code',$postData_where);
		$this->db->where('ct.trainee_code',$postData_where);
		$records=$this->db->get()->result();
		$totalRecordwithFilter = count($records);

        //# Fetch records
		$this->db->select('*');
        $this->db->from('create_trainee as ct');
        $this->db->join('table_emp_remark as ter','ct.batch_code=ter.batch_code');
        $this->db->where('ter.trainee_code',$postData_where);
		$this->db->where('ct.trainee_code',$postData_where);

		$records=$this->db->get()->result();

		if($records!=NULL)
		{
		$i=1;
		$data = array();

		foreach ($records as $record) {
			// echo "<pre>";print_r($record->batch_code);die;	
			$batch_code=$record->batch_code."<input id='batch_code' name='batch_code' type='hidden' value='".$record->batch_code."'>";
			$trainee_code=$record->trainee_code."<input id='trainee_code' name='trainee_code' type='hidden' value='".$record->trainee_code."'>";
			$name_trainee=$record->name_trainee."<input id='name_trainee' name='name_trainee' type='hidden' value='".$record->name_trainee."'>";
			$location=$record->location."<input id='location' name='location' type='hidden' value='".$record->location."'>";
			$join_date=$record->join_date."<input id='join_date' name='join_date' type='hidden' value='".$record->join_date."'>";
			$current_date=date('d-m-Y')."<input id='current_date' name='current_date' type='hidden' value='".date('d-m-Y')."'>";
			$designation=$record->designation."<input id='designation' name='designation' type='hidden' value='".$record->designation."'>";
			$pro_sbu=$record->pro_sbu."<input id='pro_sbu' name='pro_sbu' type='hidden' value='".$record->pro_sbu."'>";
			$emp_code=$record->emp_code."<input id='emp_code' name='emp_code' type='hidden' value='".$record->emp_code."'>";
			if($record->Rag!=''){
			$rag = $record->Rag;
			}else{
			$rag = "<select name='rag' class='form-control form-select' id='rag' required >
						<option value=''>Select</option>
						<option value='Amber'>Amber</option>
						<option value='Green'>Green</option>
						<option value='Red'>Red</option>
					</select>";
			}
			if($record->Remark!=''){
			$remarks = $record->Remark;
			}else{
			$remarks = '<input type="text"class="form-control" id="remarks" name="remarks" value="'.$record->Remark.'" required></input>';
			}
			$data[] = array(
				"id" => $i,
				"batch_code" => $batch_code,
				"trainee_code" => $trainee_code,
				"name_trainee" => $name_trainee,
				"location"=> $location,
				"join_date"=> $join_date,
				"current_date"=> $current_date,
				"designation"=> $designation,
				"pro_sbu"=> $pro_sbu,
				"emp_code"=> $emp_code,
				"rag"=> $rag,
				"remarks"=> $remarks,
			);
			$i++;
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
		}else
		{
			$this->db->select('*');
			$this->db->where('trainee_code',$postData_where);
			$records=$this->db->get('create_trainee')->result();
			$totalRecords = count($records);
			$totalRecordwithFilter = count($records);
			$i=1;
			$data = array();

			foreach ($records as $record) {
				// echo "<pre>";print_r($record->batch_code);die;	
				$batch_code=$record->batch_code."<input id='batch_code' name='batch_code' type='hidden' value='".$record->batch_code."'>";
				$trainee_code=$record->trainee_code."<input id='trainee_code' name='trainee_code' type='hidden' value='".$record->trainee_code."'>";
				$name_trainee=$record->name_trainee."<input id='name_trainee' name='name_trainee' type='hidden' value='".$record->name_trainee."'>";
				$location=$record->location."<input id='location' name='location' type='hidden' value='".$record->location."'>";
				$join_date=$record->join_date."<input id='join_date' name='join_date' type='hidden' value='".$record->join_date."'>";
				$current_date=date('d-m-Y')."<input id='current_date' name='current_date' type='hidden' value='".date('d-m-Y')."'>";
				$designation=$record->designation."<input id='designation' name='designation' type='hidden' value='".$record->designation."'>";
				$pro_sbu=$record->pro_sbu."<input id='pro_sbu' name='pro_sbu' type='hidden' value='".$record->pro_sbu."'>";
				$emp_code=$record->emp_code."<input id='emp_code' name='emp_code' type='hidden' value='".$record->emp_code."'>";
				$rag = '<select name="rag" class="form-control form-select" id="rag" required >
							<option value="">Select</option>
							<option value="Amber">Amber</option>
							<option value="Green">Green</option>
							<option value="Red">Red</option>
						</select>';
				$remarks = '<input type="text"class="form-control" id="remarks" name="remarks" required></input>';
				
				$data[] = array(
					"id" => $i,
					"batch_code" => $batch_code,
					"trainee_code" => $trainee_code,
					"name_trainee" => $name_trainee,
					"location"=> $location,
					"join_date"=> $join_date,
					"current_date"=> $current_date,
					"designation"=> $designation,
					"pro_sbu"=> $pro_sbu,
					"emp_code"=> $emp_code,
					"rag"=> $rag,
					"remarks"=> $remarks,
				);
				$i++;
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
	}
	function create_emp_remarks($table,$data)
	{
		$this->db->insert($table,$data);
		$message = "success";
		return $message;
	}
	function get_report_remark_list($postData,$batch_no,$trainee_code)
	{
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
				$search_arr[] = " (name_trainee like '%" . $searchValue . "%') ";
			}

			if (count($search_arr) > 0) {
				$searchQuery = implode(" and ", $search_arr);
			}
			$this->db->select('*');
			$this->db->from('create_trainee as ct');
			$this->db->join('table_emp_remark as ter','ct.trainee_code=ter.trainee_code');
			if ($searchQuery != '') $this->db->where($searchQuery);
			$records = $this->db->get()->result();
			$totalRecordwithFilter = count($records);

		//# Fetch records
			$this->db->select('*');
			$this->db->from('create_trainee as ct');
			$this->db->join('table_emp_remark as ter','ct.trainee_code=ter.trainee_code');
			if ($searchQuery != '') $this->db->where($searchQuery);		
				
			if($batch_no!='') $this->db->where('ter.batch_code',$batch_no);
			if($batch_no!='') $this->db->where('ct.batch_code',$batch_no);
			if($trainee_code!='') $this->db->where('ter.trainee_code',$trainee_code);
			if($trainee_code!='') $this->db->where('ct.trainee_code',$trainee_code);
			// $this->db->limit($rowperpage, $start);
			// print_r($this->db->last_query());die;
			$records=$this->db->get()->result();
			$totalRecords = count($records);

				$data = array();

				foreach ($records as $record) {
					// echo "<pre>";print_r($record->batch_code);die;	
					$batch_code=$record->batch_code."<input id='batch_code' name='batch_code' type='hidden' value='".$record->batch_code."'>";
					$trainee_code=$record->trainee_code."<input id='trainee_code' name='trainee_code' type='hidden' value='".$record->trainee_code."'>";
					$name_trainee=$record->name_trainee."<input id='name_trainee' name='name_trainee' type='hidden' value='".$record->name_trainee."'>";
					$location=$record->location."<input id='location' name='location' type='hidden' value='".$record->location."'>";
					$join_date=$record->join_date."<input id='join_date' name='join_date' type='hidden' value='".$record->join_date."'>";
					$current_date=date('d-m-Y')."<input id='current_date' name='current_date' type='hidden' value='".date('d-m-Y')."'>";
					$designation=$record->designation."<input id='designation' name='designation' type='hidden' value='".$record->designation."'>";
					$pro_sbu=$record->pro_sbu."<input id='pro_sbu' name='pro_sbu' type='hidden' value='".$record->pro_sbu."'>";
					$emp_code=$record->emp_code."<input id='emp_code' name='emp_code' type='hidden' value='".$record->emp_code."'>";
					$rag = $record->Rag;
					$remarks = $record->Remark;
					$action = '<button onclick="edit_remark_pop('."'".$record->trainee_code."'".','."'".$record->batch_code."'".');" class="btn  btn-sm btn-info dt-btn-st" id="adtbtn"><i class="bx bx-pencil"></i></button>';

					$data[] = array(
						"batch_code" => $batch_code,
						"trainee_code" => $trainee_code,
						"name_trainee" => $name_trainee,
						"location"=> $location,
						"join_date"=> $join_date,
						"current_date"=> $current_date,
						"designation"=> $designation,
						"pro_sbu"=> $pro_sbu,
						"emp_code"=> $emp_code,
						"rag"=> $rag,
						"remarks"=> $remarks,
						"action"=>$action,
					);
				}
				// echo "<pre>";print_r($data);die;
				// # Response
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $totalRecords,
				"iTotalDisplayRecords" => $totalRecordwithFilter,
				"aaData" => $data
			);
			return $response;
	}
	function update_remark($postData,$postData_where)
	{
		$this->db->where($postData_where);
		$this->db->set($postData);
		$this->db->update('table_emp_remark');
		$message = "success";
		return $message;
		
	}
	function fetch_remark_details($postData_where)
	{
		$this->db->select('*');
		$this->db->from('table_emp_remark');
		$this->db->where('trainee_code',$postData_where['trainee_code']);
		$data = $this->db->get()->row();
		return $data;
	}
	function get_perform_employee($postData,$postData_where)
	{
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%') ";
		}
		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}
		//# Total number of records without filtering
			$this->db->select('*');
			$this->db->from('create_trainee');
			if($postData_where!='') $this->db->where('batch_code',$postData_where['batch_no']);

			$records = $this->db->get()->result();
			$totalRecords = count($records);
			
		//# Total number of record with filtering
			$this->db->select('*');
			$this->db->from('create_trainee');
			if ($searchQuery != '') $this->db->where($searchQuery);
			if($postData_where!='') $this->db->where('batch_code',$postData_where['batch_no']);

			$records = $this->db->get()->result();
			$totalRecordwithFilter = count($records);

		//# Fetch records
			// $this->db->select('*');
			// $this->db->from('create_trainee');
			if(!empty($postData_where['batch_no']&&$postData_where['level']&&$postData_where['attempt']))
			{
				$this->db->select('*');
				$this->db->from('create_trainee as ct');
				$this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
				$this->db->where('ct.batch_code',$postData_where['batch_no']);
				$this->db->where('a_c.Levels',$postData_where['level']); 
				
				if($postData_where['attempt']=='A4')
				{ 
					$this->db->where('a_c.Attempts','A3'); 
					$this->db->where('a_c.Percentage<80');
					$records = $this->db->get()->result();
					$data=array();
					foreach($records as $record)
					{
						$this->db->select('*');
						$this->db->from('create_trainee as ct');
						$this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
						$this->db->where('ct.batch_code',$postData_where['batch_no']);
						$this->db->where('a_c.Levels',$postData_where['level']); 
						$this->db->where('a_c.trainee_code',$record->trainee_code);
						$this->db->where('a_c.Attempts','A4');
						$value = $this->db->get()->result();
						if(!empty($value))
						{
							foreach($value as $val)
							{
								$trainee_code=$val->trainee_code."<input id='trainee_code' type='hidden' value='".$val->trainee_code."'>";
								$name_trainee=$val->name_trainee."<input id='name_trainee' type='hidden' value='".$val->name_trainee."'>";
								$mark=$val->Mark;
								$totalmark=$val->Total_mark;
								$percentage=$val->Percentage;
								$sts=$val->Status;
								$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$val->trainee_code.'" class="checkbox testclass" />';
								$data[] = array(
									"trainee_code" => $trainee_code,
									"name_trainee" => $name_trainee,  
									"totalmark" => $totalmark,
									"mark" => $mark,
									"status" => $sts,
									"percentage" => $percentage,
									"check_box_field" => $check_box_field,
								);
							}
							
						}else
						{
							// echo "<pre>";print_r($record);die;
							$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
							$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
							if($record->Percentage<'80'&&($postData_where['attempt']=='A4'))
							{
								$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
								$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
								$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
								$empty="";
									$Attrited="";
									$Certification_failed="";
									$Terminated="";
									$Moved_to_Business="";
								if($record->Status=="")
								{
									$empty= 'selected';
								}elseif($record->Status=="Attrited")
								{
									$Attrited= 'selected';
								}elseif($record->Status=="Certification failed")
								{
									$Certification_failed= 'selected';
								}elseif($record->Status=="Terminated")
								{
									$Terminated= 'selected';
								}elseif($record->Status=="Moved to Business")
								{
									$Moved_to_Business= 'selected';
								}else{
									
								}
								$sts  = "<select name='status[]' class='form-control form-select' id='status' disabled >";
								$sts .=	"<option value=''".$empty.">Select</option>";
								$sts .=	"<option value='Attrited' ".$Attrited.">Attrited</option>";
								$sts .=	"<option value='Certification failed' ".$Certification_failed.">Certification failed</option>";
								$sts .=	"<option value='Terminated' ".$Terminated.">Terminated</option>";
								$sts .=	"<option value='Moved to Business' ".$Moved_to_Business.">Moved to Business</option>";
								$sts .=	"</select>";
							}else{
								$mark=$record->Mark;
								$totalmark=$record->Total_mark;
								$percentage=$record->Percentage;
								$sts=$record->Status;
							}
							
							$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
							$data[] = array(
								"trainee_code" => $trainee_code,
								"name_trainee" => $name_trainee,  
								"totalmark" => $totalmark,
								"mark" => $mark,
								"status" => $sts,
								"percentage" => $percentage,
								"check_box_field" => $check_box_field,
							);
						}
					}
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
				}
				elseif($postData_where['attempt']=='A3')
				{
					$this->db->where('a_c.Attempts','A2'); 
					$this->db->where('a_c.Percentage<80');
					$records = $this->db->get()->result();
					$data=array();
					foreach($records as $record)
					{
						$this->db->select('*');
						$this->db->from('create_trainee as ct');
						$this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
						$this->db->where('ct.batch_code',$postData_where['batch_no']);
						$this->db->where('a_c.Levels',$postData_where['level']); 
						$this->db->where('a_c.trainee_code',$record->trainee_code);
						$this->db->where('a_c.Attempts','A3');
						$value = $this->db->get()->result();
						if(!empty($value))
						{
							
							foreach($value as $val)
							{
								$trainee_code=$val->trainee_code."<input id='trainee_code' type='hidden' value='".$val->trainee_code."'>";
								$name_trainee=$val->name_trainee."<input id='name_trainee' type='hidden' value='".$val->name_trainee."'>";
								$mark=$val->Mark;
								$totalmark=$val->Total_mark;
								$percentage=$val->Percentage;
								$sts=$val->Status;
								$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$val->trainee_code.'" class="checkbox testclass" />';
								$data[] = array(
									"trainee_code" => $trainee_code,
									"name_trainee" => $name_trainee,  
									"totalmark" => $totalmark,
									"mark" => $mark,
									"status" => $sts,
									"percentage" => $percentage,
									"check_box_field" => $check_box_field,
								);
							}
							
						}else
						{
							// echo "<pre>";print_r($record);die;
							$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
							$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
							if($record->Percentage<'80'&&($postData_where['attempt']=='A3'))
							{
								$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
								$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
								$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
								$empty="";
									$Attrited="";
									$Certification_failed="";
									$Terminated="";
									$Moved_to_Business="";
								if($record->Status=="")
								{
									$empty= 'selected';
								}elseif($record->Status=="Attrited")
								{
									$Attrited= 'selected';
								}elseif($record->Status=="Certification failed")
								{
									$Certification_failed= 'selected';
								}elseif($record->Status=="Terminated")
								{
									$Terminated= 'selected';
								}elseif($record->Status=="Moved to Business")
								{
									$Moved_to_Business= 'selected';
								}else{
									
								}
								$sts  = "<select name='status[]' class='form-control form-select' id='status' disabled >";
								$sts .=	"<option value=''".$empty.">Select</option>";
								$sts .=	"<option value='Attrited' ".$Attrited.">Attrited</option>";
								$sts .=	"<option value='Certification failed' ".$Certification_failed.">Certification failed</option>";
								$sts .=	"<option value='Terminated' ".$Terminated.">Terminated</option>";
								$sts .=	"<option value='Moved to Business' ".$Moved_to_Business.">Moved to Business</option>";
								$sts .=	"</select>";
							}else{
								$mark=$record->Mark;
								$totalmark=$record->Total_mark;
								$percentage=$record->Percentage;
								$sts=$record->Status;
							}
							
							$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
							$data[] = array(
								"trainee_code" => $trainee_code,
								"name_trainee" => $name_trainee,  
								"totalmark" => $totalmark,
								"mark" => $mark,
								"status" => $sts,
								"percentage" => $percentage,
								"check_box_field" => $check_box_field,
							);
						}
					}
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
				}
				elseif($postData_where['attempt']=='A2')
				{
					$this->db->where('a_c.Attempts','A1'); 
					$this->db->where('a_c.Percentage<80');
					$records = $this->db->get()->result();
					$data=array();
					foreach($records as $record)
					{
						$this->db->select('*');
						$this->db->from('create_trainee as ct');
						$this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
						$this->db->where('ct.batch_code',$postData_where['batch_no']);
						$this->db->where('a_c.Levels',$postData_where['level']); 
						$this->db->where('a_c.trainee_code',$record->trainee_code);
						$this->db->where('a_c.Attempts','A2');
						$value = $this->db->get()->result();
						if(!empty($value))
						{
							
							foreach($value as $val)
							{
								$trainee_code=$val->trainee_code."<input id='trainee_code' type='hidden' value='".$val->trainee_code."'>";
								$name_trainee=$val->name_trainee."<input id='name_trainee' type='hidden' value='".$val->name_trainee."'>";
								$mark=$val->Mark;
								$totalmark=$val->Total_mark;
								$percentage=$val->Percentage;
								$sts=$val->Status;
								$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$val->trainee_code.'" class="checkbox testclass" />';
								$data[] = array(
									"trainee_code" => $trainee_code,
									"name_trainee" => $name_trainee,  
									"totalmark" => $totalmark,
									"mark" => $mark,
									"status" => $sts,
									"percentage" => $percentage,
									"check_box_field" => $check_box_field,
								);
							}
							
						}else
						{
							// echo "<pre>";print_r($record);die;
							$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
							$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
							if($record->Percentage<'80'&&($postData_where['attempt']=='A2'))
							{
								$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
								$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
								$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
									$empty="";
									$Attrited="";
									$Certification_failed="";
									$Terminated="";
									$Moved_to_Business="";
								if($record->Status=="")
								{
									$empty= 'selected';
								}elseif($record->Status=="Attrited")
								{
									$Attrited= 'selected';
								}elseif($record->Status=="Certification failed")
								{
									$Certification_failed= 'selected';
								}elseif($record->Status=="Terminated")
								{
									$Terminated= 'selected';
								}elseif($record->Status=="Moved to Business")
								{
									$Moved_to_Business= 'selected';
								}else{
									
								}
								$sts  = "<select name='status[]' class='form-control form-select' id='status' disabled >";
								$sts .=	"<option value=''".$empty.">Select</option>";
								$sts .=	"<option value='Attrited' ".$Attrited.">Attrited</option>";
								$sts .=	"<option value='Certification failed' ".$Certification_failed.">Certification failed</option>";
								$sts .=	"<option value='Terminated' ".$Terminated.">Terminated</option>";
								$sts .=	"<option value='Moved to Business' ".$Moved_to_Business.">Moved to Business</option>";
								$sts .=	"</select>";
							}else{
								$mark=$record->Mark;
								$totalmark=$record->Total_mark;
								$percentage=$record->Percentage;
								$sts=$record->Status;
							}
							
							$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
							$data[] = array(
								"trainee_code" => $trainee_code,
								"name_trainee" => $name_trainee,  
								"totalmark" => $totalmark,
								"mark" => $mark,
								"status" => $sts,
								"percentage" => $percentage,
								"check_box_field" => $check_box_field,
							);
						}
					}
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
				}
				elseif($postData_where['attempt']=='A1')
				{
					$this->db->where('a_c.Attempts','A1'); 
					$records = $this->db->get()->result();
					$data=array();
					// echo "<pre>";print_r($records);die;
					if(!empty($records))
					{
						foreach($records as $record)
						{
							$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
							$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
							$mark=$record->Mark;
							$totalmark=$record->Total_mark;
							$percentage=$record->Percentage;
							$sts=$record->Status;
							$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
							$data[] = array(
								"trainee_code" => $trainee_code,
								"name_trainee" => $name_trainee,  
								"totalmark" => $totalmark,
								"mark" => $mark,
								"status" => $sts,
								"percentage" => $percentage,
								"check_box_field" => $check_box_field,
							);
						}
						if(count($records)!=$totalRecords)
						{
							$t="";
							foreach ($records as $record) {
								$t.=$record->trainee_code.',';
							}
							$arr=explode(',',$t);
							// print_r($arr);
							$arr1=array_pop($arr);
							// print_r($arr);
							$arr2=implode(',',$arr);
							// print_r($arr2);die;
	
							$this->db->select('*');
							$this->db->from('create_trainee');
							$this->db->where('batch_code',$postData_where['batch_no']);
							$this->db->where_not_in('trainee_code',$arr);
							$rec = $this->db->get()->result();
							foreach($rec as $record)
							{
								$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
								$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
								$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
								$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
								$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
								$sts = "<select name='status[]' class='form-control form-select' id='status' disabled >
											<option value=''>Select</option>
											<option value='Attrited'>Attrited</option>
											<option value='Certification failed'>Certification failed</option>
											<option value='Terminated'>Terminated</option>
											<option value='Moved to Business'>Moved to Business</option>
										</select>";
								$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
								$data[] = array(
									"trainee_code" => $trainee_code,
									"name_trainee" => $name_trainee,
									"totalmark" => $totalmark,
									"mark" => $mark,
									"status" => $sts,
									"percentage" => $percentage,
									"check_box_field" => $check_box_field,
									
								);
							}
						}
						// echo '<pre>';print_r($data);
						// # Response
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
					}else{
						$this->db->select('*');
						$this->db->from('create_trainee as ct');
						// $this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
						$this->db->where('ct.batch_code',$postData_where['batch_no']);
						$records = $this->db->get()->result();
						// echo '<pre>';print_r($records);
						// print_r($this->db->last_query());die;
						$data= array();
						foreach($records as $record)
						{
							$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
							$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
							$totalmark="<input class='form-control tm' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
							$mark='<input type="text"class="form-control common" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
							$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
							$sts = "<select name='status[]' class='form-control form-select' id='status' disabled >
										<option value=''>Select</option>
										<option value='Attrited'>Attrited</option>
										<option value='Certification failed'>Certification failed</option>
										<option value='Terminated'>Terminated</option>
										<option value='Moved to Business'>Moved to Business</option>
									</select>";
							$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
							$data[] = array(
								"trainee_code" => $trainee_code,
								"name_trainee" => $name_trainee,
								"totalmark" => $totalmark,
								"mark" => $mark,
								"status" => $sts,
								"percentage" => $percentage,
								"check_box_field" => $check_box_field,
							);	
						}
						// # Response
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
					}
					
				}
				// print_r($this->db->last_query());die;
			}
			elseif(!empty($postData_where['batch_no']&&$postData_where['level'])) 
			{
				$this->db->select('*');
				$this->db->from('create_trainee as ct');
				$this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
				$this->db->where('ct.batch_code',$postData_where['batch_no']);
				$this->db->where('a_c.Levels',$postData_where['level']); 
				$records = $this->db->get()->result();
				$data=array();
				if(!empty($records)){
				foreach($records as $record)
				{
					$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
					$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
					$mark=$record->Mark;
					$totalmark=$record->Total_mark;
					$percentage=$record->Percentage;
					$sts=$record->Status;
					$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
					$data[] = array(
						"trainee_code" => $trainee_code,
						"name_trainee" => $name_trainee,
						"totalmark" => $totalmark,
						"mark" => $mark,
						"percentage" => $percentage,
						"status" => $sts,
						"check_box_field" => $check_box_field,
						
					);
				}
				if(count($records)!=$totalRecords)
				{
					$t="";
					foreach ($records as $record) {
						$t.=$record->trainee_code.',';
					}
					$arr=explode(',',$t);
					// print_r($arr);
					$arr1=array_pop($arr);
					// print_r($arr);
					$arr2=implode(',',$arr);
					// print_r($arr2);die;

					$this->db->select('*');
					$this->db->from('create_trainee');
					$this->db->where('batch_code',$postData_where['batch_no']);
					$this->db->where_not_in('trainee_code',$arr);
					$rec = $this->db->get()->result();
					foreach($rec as $record)
					{
						$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
						$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
						$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
						$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
						$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
						$sts = "<select name='status[]' class='form-control form-select' id='status' disabled >
									<option value=''>Select</option>
									<option value='Attrited'>Attrited</option>
									<option value='Certification failed'>Certification failed</option>
									<option value='Terminated'>Terminated</option>
									<option value='Moved to Business'>Moved to Business</option>
								</select>";
						$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
						$data[] = array(
							"trainee_code" => $trainee_code,
							"name_trainee" => $name_trainee,
							"totalmark" => $totalmark,
							"mark" => $mark,
							"percentage" => $percentage,
							"status" => $sts,
							"check_box_field" => $check_box_field,
							
						);
					}
				}
				// echo '<pre>';print_r($data);
				// # Response
				$response = array(
					"draw" => intval($draw),
					"iTotalRecords" => $totalRecords,
					"iTotalDisplayRecords" => $totalRecordwithFilter,
					"aaData" => $data
				);
				return $response;
				}else{
					$this->db->select('*');
					$this->db->from('create_trainee as ct');
					// $this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
					$this->db->where('ct.batch_code',$postData_where['batch_no']);
					$records = $this->db->get()->result();
					// echo '<pre>';print_r($records);
					// print_r($this->db->last_query());die;
					$data= array();
					foreach($records as $record)
					{
						$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
						$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
						$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
						$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
						$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
						$sts = "<select name='status[]' class='form-control form-select' id='status' disabled >
									<option value=''>Select</option>
									<option value='Attrited'>Attrited</option>
									<option value='Certification failed'>Certification failed</option>
									<option value='Terminated'>Terminated</option>
									<option value='Moved to Business'>Moved to Business</option>
								</select>";
						$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
						$data[] = array(
							"trainee_code" => $trainee_code,
							"name_trainee" => $name_trainee,
							"totalmark" => $totalmark,
							"mark" => $mark,
							"status" => $sts,
							"percentage" => $percentage,
							"check_box_field" => $check_box_field,
						);	
					}
						$response = array(
							"draw" => intval($draw),
							"iTotalRecords" => $totalRecords,
							"iTotalDisplayRecords" => $totalRecordwithFilter,
							"aaData" => $data
						);
						return $response;
				}
			}
			elseif($postData_where['batch_no']!='')
			{
				$this->db->select('*');
				$this->db->from('create_trainee as ct');
				// $this->db->join('assessment_and_certificate as a_c','ct.trainee_code = a_c.trainee_code','left');
				$this->db->where('ct.batch_code',$postData_where['batch_no']);
				$records = $this->db->get()->result();
				// echo '<pre>';print_r($records);
				// print_r($this->db->last_query());die;
				$data= array();
				foreach($records as $record)
				{
					$trainee_code=$record->trainee_code."<input id='trainee_code' type='hidden' value='".$record->trainee_code."'>";
					$name_trainee=$record->name_trainee."<input id='name_trainee' type='hidden' value='".$record->name_trainee."'>";
					$totalmark="<input class='form-control tm tv' name='tot_mark[]' id='totalmark' onkeypress='return isNumber(event)' type='text' disabled>";
					$mark='<input type="text"class="form-control common tv" id="mark" name="mark[]" onkeypress="return isNumber(event)" disabled></input>';
					$percentage='<input type="text"class="form-control" id="percentage" name="percentage[]" onkeypress="return isNumber(event)" readonly></input>';
					$sts = "<select name='status[]' class='form-control form-select' id='status' disabled >
								<option value=''>Select</option>
								<option value='Attrited'>Attrited</option>
								<option value='Certification failed'>Certification failed</option>
								<option value='Terminated'>Terminated</option>
								<option value='Moved to Business'>Moved to Business</option>
							</select>";
					$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->trainee_code.'" class="checkbox testclass" />';
					$data[] = array(
						"trainee_code" => $trainee_code,
						"name_trainee" => $name_trainee,
						"totalmark" => $totalmark,
						"mark" => $mark,
						"status" => $sts,
						"percentage" => $percentage,
						"check_box_field" => $check_box_field,
					);	
				}
				// # Response
				$response = array(
					"draw" => intval($draw),
					"iTotalRecords" => $totalRecords,
					"iTotalDisplayRecords" => $totalRecordwithFilter,
					"aaData" => $data
				);
				return $response;
			}
	}
	function add_perform_mark($postData)
	{
		$this->db->select('*');
		$this->db->from('assessment_and_certificate');
		$this->db->where('Batch_code',$postData['Batch_no']);
		$this->db->where_in('Trainee_code',$postData['assign_chbox']);
		$this->db->where('Levels',$postData['Level']);
		$this->db->where('Attempts',$postData['Attempt']);
		$records=$this->db->get()->result();
		// echo "<pre>";print_r($records);die;
		if(empty($records)){
			$count=count($postData['assign_chbox']);
			$Batch_no = $postData['Batch_no'];
			$Level = $postData['Level'];
			$Attempt = $postData['Attempt'];
			$createdBy_emp = $_SESSION['emp_id'];
			$createdon = date('Y-m-d H:i:s');
			for($i=0;$i<$count;$i++)
			{
				// echo "<pre>";print_r($data['assign_chbox'][$i]);
			if($postData['status']!=""){
				$data1 = array(
					'Batch_code'=>$Batch_no,
					'Trainee_code'=>$postData['assign_chbox'][$i],
					'Levels'=>$Level,
					'Attempts'=>$Attempt,
					'Mark'=>$postData['mark'][$i],
					'Percentage'=>$postData['percentage'][$i],
					'Total_Mark'=>$postData['tot_mark'][$i],
					'Status'=>$postData['status'][$i],
					'Created_by'=>$createdBy_emp,
					'Created_on'=>$createdon
				);
				$res=$this->db->insert('assessment_and_certificate',$data1);
			}else{
				$data1 = array(
					'Batch_code'=>$Batch_no,
					'Trainee_code'=>$postData['assign_chbox'][$i],
					'Levels'=>$Level,
					'Attempts'=>$Attempt,
					'Mark'=>$postData['mark'][$i],
					'Percentage'=>$postData['percentage'][$i],
					'Total_Mark'=>$postData['tot_mark'][$i],
					'Created_by'=>$createdBy_emp,
					'Created_on'=>$createdon
				);
				$res=$this->db->insert('assessment_and_certificate',$data1);
			}
				
			}
			$message = "success";
			return $message;
		}else{
			$message = "failed";
			return $message;
		}
		
	}
	function get_performance_report_list($postData,$postData_where)
	{
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
			$search_arr[] = " (name_trainee like '%" . $searchValue . "%') ";
		}

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
		}
		//# Total number of records without filtering
			$this->db->select('*');
			$this->db->from('assessment_and_certificate');
			if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A1');}
			if($postData_where['Batch_code']!='') {$this->db->where('Batch_code',$postData_where['Batch_code']);}
			if($postData_where['Trainee_code']!='') {$this->db->where('Trainee_code',$postData_where['Trainee_code']);}

			$records = $this->db->get()->result();
			$totalRecords = count($records);

		//# Total number of record with filtering
			$this->db->select('*');
			$this->db->from('assessment_and_certificate');
			if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A1');}
			if($postData_where['Batch_code']!='') {$this->db->where('Batch_code',$postData_where['Batch_code']);}
			if($postData_where['Trainee_code']!='') {$this->db->where('Trainee_code',$postData_where['Trainee_code']);}
			if ($searchQuery != '') $this->db->where($searchQuery);

			$records = $this->db->get()->result();
			$totalRecordwithFilter = count($records);
		// #Fetch Data
			$this->db->select('*');
			$this->db->from('assessment_and_certificate');
			if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A1');}
			if($postData_where['Batch_code']!='') {$this->db->where('Batch_code',$postData_where['Batch_code']);}
			if($postData_where['Trainee_code']!='') {$this->db->where('Trainee_code',$postData_where['Trainee_code']);}

			$records=$this->db->get()->result();
			$data = array();
			foreach ($records as $record) {
				// echo "<pre>";print_r($record);
				$batch_code=$record->Batch_code;
				$trainee_code=$record->Trainee_code;
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A2');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$attempt2 = '';
					$percentage2 = '';
				}else{
				foreach($d as $d1)
				{
					$attempt2 = $d1->Mark;
					$percentage2 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A3');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$attempt3 = '';
					$percentage3 = '';
				}else{
				foreach($d as $d1)
				{
					$attempt3 = $d1->Mark;
					$percentage3 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L1')) {$this->db->where('Attempts','A4');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$attempt4 = '';
					$percentage4 = '';
				}else{
				foreach($d as $d1)
				{
					$attempt4 = $d1->Mark;
					$percentage4 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L2')) {$this->db->where('Attempts','A1');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L2_attempt1 = '';
					$L2_percentage1 = '';
				}else{
				foreach($d as $d1)
				{
					$L2_attempt1 = $d1->Mark;
					$L2_percentage1 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L2')) {$this->db->where('Attempts','A2');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L2_attempt2 = '';
					$L2_percentage2 = '';
				}else{
				foreach($d as $d1)
				{
					$L2_attempt2 = $d1->Mark;
					$L2_percentage2 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L2')) {$this->db->where('Attempts','A3');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L2_attempt3 = '';
					$L2_percentage3 = '';
				}else{
				foreach($d as $d1)
				{
					$L2_attempt3 = $d1->Mark;
					$L2_percentage3 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L2')) {$this->db->where('Attempts','A4');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L2_attempt4 = '';
					$L2_percentage4 = '';
				}else{
				foreach($d as $d1)
				{
					$L2_attempt4 = $d1->Mark;
					$L2_percentage4 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L3')) {$this->db->where('Attempts','A1');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L3_attempt1 = '';
					$L3_percentage1 = '';
				}else{
				foreach($d as $d1)
				{
					$L3_attempt1 = $d1->Mark;
					$L3_percentage1 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L3')) {$this->db->where('Attempts','A2');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L3_attempt2 = '';
					$L3_percentage2 = '';
				}else{
				foreach($d as $d1)
				{
					$L3_attempt2 = $d1->Mark;
					$L3_percentage2 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L3')) {$this->db->where('Attempts','A3');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L3_attempt3 = '';
					$L3_percentage3 = '';
				}else{
				foreach($d as $d1)
				{
					$L3_attempt3 = $d1->Mark;
					$L3_percentage3 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L3')) {$this->db->where('Attempts','A4');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L3_attempt4 = '';
					$L3_percentage4 = '';
				}else{
				foreach($d as $d1)
				{
					$L3_attempt4 = $d1->Mark;
					$L3_percentage4 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L4')) {$this->db->where('Attempts','A1');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L4_attempt1 = '';
					$L4_percentage1 = '';
				}else{
				foreach($d as $d1)
				{
					$L4_attempt1 = $d1->Mark;
					$L4_percentage1 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L4')) {$this->db->where('Attempts','A2');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L4_attempt2 = '';
					$L4_percentage2 = '';
				}else{
				foreach($d as $d1)
				{
					$L4_attempt2 = $d1->Mark;
					$L4_percentage2 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L4')) {$this->db->where('Attempts','A3');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L4_attempt3 = '';
					$L4_percentage3 = '';
				}else{
				foreach($d as $d1)
				{
					$L4_attempt3 = $d1->Mark;
					$L4_percentage3 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code);
				if($this->db->where('Levels','L4')) {$this->db->where('Attempts','A4');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$L4_attempt4 = '';
					$L4_percentage4 = '';
				}else{
				foreach($d as $d1)
				{
					$L4_attempt4 = $d1->Mark;
					$L4_percentage4 = $d1->Percentage;
				}}
				$this->db->select('Mark,Percentage,Status');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code)->limit(1)->order_by('Id',"DESC");
				if($this->db->where('Levels','Final')) {$this->db->where('Attempts','A1');}
				$d=$this->db->get()->result();
				// echo"<pre>";print_r($d);
				if(empty($d))
				{
					$Final_attempt1 = '';
					$Final_percentage1 = '';
					$Final_status1 = '';
				}else{
				foreach($d as $d1)
				{
					$Final_attempt1 = $d1->Mark;
					$Final_percentage1 = $d1->Percentage;
					$Final_status1 = $d1->Status;
				}}
				$this->db->select('Mark,Percentage,Status');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code)->limit(1)->order_by('Id',"DESC");
				if($this->db->where('Levels','Final')) {$this->db->where('Attempts','A2');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$Final_attempt2 = '';
					$Final_percentage2 = '';
					$Final_status2 = '';
				}else{
				foreach($d as $d1)
				{
					$Final_attempt2 = $d1->Mark;
					$Final_percentage2 = $d1->Percentage;
					$Final_status2 = $d1->Status;
				}}
				$this->db->select('Mark,Percentage,Status');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code)->limit(1)->order_by('Id',"DESC");
				if($this->db->where('Levels','Final')) {$this->db->where('Attempts','A3');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$Final_attempt3 = '';
					$Final_percentage3 = '';
					$Final_status3 = '';
				}else{
				foreach($d as $d1)
				{
					$Final_attempt3 = $d1->Mark;
					$Final_percentage3 = $d1->Percentage;
					$Final_status3 = $d1->Status;
				}}
				$this->db->select('Mark,Percentage,Status');
				$this->db->from('assessment_and_certificate');
				$this->db->where('Batch_code',$batch_code);
				$this->db->where('Trainee_code',$trainee_code)->limit(1)->order_by('Id',"DESC");
				if($this->db->where('Levels','Final')) {$this->db->where('Attempts','A4');}
				$d=$this->db->get()->result();
				if(empty($d))
				{
					$Final_attempt4 = '';
					$Final_percentage4 = '';
					$Final_status4 = '';
				}else{
				foreach($d as $d1)
				{
					$Final_attempt4 = $d1->Mark;
					$Final_percentage4 = $d1->Percentage;
					$Final_status4 = $d1->Status;
				}}

				$attempt1=$record->Mark;
				$percentage1=$record->Percentage;
				if(!empty($Final_status4))
				{
					$end_status = $Final_status4;
				}elseif(!empty($Final_status3))
				{
					$end_status = $Final_status3;
				}elseif(!empty($Final_status2))
				{
					$end_status = $Final_status2;
				}else{
					$end_status = $Final_status1;
				}
				$L1finalpercentage=max($percentage1,$percentage2,$percentage3,$percentage4);
				$L2finalpercentage=max($L2_percentage1,$L2_percentage2,$L2_percentage3,$L2_percentage4);
				$L3finalpercentage=max($L3_percentage1,$L3_percentage2,$L3_percentage3,$L3_percentage4);
				$L4finalpercentage=max($L4_percentage1,$L4_percentage2,$L4_percentage3,$L4_percentage4);
				$Final_Final_percentage=max($Final_percentage1,$Final_percentage2,$Final_percentage3,$Final_percentage4);
			
				$data[] = array(
					"batch_code" => $batch_code,
					"trainee_code" => $trainee_code,
					"attempt1"=> $attempt1,
					"attempt2"=> $attempt2,
					"attempt3"=> $attempt3,
					"attempt4"=> $attempt4,
					"percentage1"=> $percentage1,
					"percentage2"=> $percentage2,
					"percentage3"=> $percentage3,
					"percentage4"=> $percentage4,
					"L1finalpercentage"=>$L1finalpercentage,
					"L2_attempt1"=> $L2_attempt1,
					"L2_attempt2"=> $L2_attempt2,
					"L2_attempt3"=> $L2_attempt3,
					"L2_attempt4"=> $L2_attempt4,
					"L2_percentage1"=> $L2_percentage1,
					"L2_percentage2"=> $L2_percentage2,
					"L2_percentage3"=> $L2_percentage3,
					"L2_percentage4"=> $L2_percentage4,
					"L2finalpercentage"=>$L2finalpercentage,
					"L3_attempt1"=> $L3_attempt1,
					"L3_attempt2"=> $L3_attempt2,
					"L3_attempt3"=> $L3_attempt3,
					"L3_attempt4"=> $L3_attempt4,
					"L3_percentage1"=> $L3_percentage1,
					"L3_percentage2"=> $L3_percentage2,
					"L3_percentage3"=> $L3_percentage3,
					"L3_percentage4"=> $L3_percentage4,
					"L3finalpercentage"=>$L3finalpercentage,
					"L4_attempt1"=> $L4_attempt1,
					"L4_attempt2"=> $L4_attempt2,
					"L4_attempt3"=> $L4_attempt3,
					"L4_attempt4"=> $L4_attempt4,
					"L4_percentage1"=> $L4_percentage1,
					"L4_percentage2"=> $L4_percentage2,
					"L4_percentage3"=> $L4_percentage3,
					"L4_percentage4"=> $L4_percentage4,
					"L4finalpercentage"=>$L4finalpercentage,
					"Final_attempt1"=>$Final_attempt1,
					"Final_attempt2"=>$Final_attempt2,
					"Final_attempt3"=>$Final_attempt3,
					"Final_attempt4"=>$Final_attempt4,
					"Final_percentage1"=>$Final_percentage1,
					"Final_percentage2"=>$Final_percentage2,
					"Final_percentage3"=>$Final_percentage3,
					"Final_percentage4"=>$Final_percentage4,
					"end_status" => $end_status,
					"Final_Final_percentage"=>$Final_Final_percentage,
					
				);
			}
			// echo "<pre>";print_r($data);die;
			// # Response
			$response = array(
				"draw" => intval($draw),
				"iTotalRecords" => $totalRecords,
				"iTotalDisplayRecords" => $totalRecordwithFilter,
				"aaData" => $data
			);
			return $response;
	}

}