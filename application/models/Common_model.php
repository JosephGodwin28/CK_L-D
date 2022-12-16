<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model{
    
	public function data_add($table, $val){
		// echo "as<pre>";print_r($val);die;
		$this->db->insert($table, $val);
		// echo "<pre>";print_r($this->db->last_query());die;
		$message = "success";
		return $message;
	}

	function verify_data_traineelist($postData){
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
  //       $this->db->where('a.created_by',$postData_where);

		$records = $this->db->get()->result();

		$totalRecords = $records[0]->allcount;

        //# Total number of record with filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
  //       $this->db->where('a.created_by',$postData_where);
		
		if ($searchQuery != '') $this->db->where($searchQuery);
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

        //# Fetch records
		$this->db->select('*');
		$this->db->from('create_trainee');
		// $this->db->join('rs_keyperformance_name as kn','a.key_name=kn.id');
  //       $this->db->where('a.created_by',$postData_where);

		if ($searchQuery != '') $this->db->where($searchQuery);
		$this->db->order_by('id', 'desc');  // or desc

		$this->db->limit($rowperpage, $start);
		$records = $this->db->get()->result();
		// print_r($this->db->last_query());die;

		$data = array();

		foreach ($records as $record) {
		// echo "<pre>";print_r($record);die;
			$timedate1 = strtotime(date("Y-m-d", strtotime($record->created_on)));
			$created_on = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->emp_dob)));
			$emp_dob = date("d-m-Y", $timedate1);

			$timedate1 = strtotime(date("Y-m-d", strtotime($record->assignedDate)));
			$assignedDate = date("d-m-Y", $timedate1);
            
            $action_url2 = base_url()."AdminController/edit_user_form/".$record->id;
			
			$action = '<button onclick="get_trainee_pop('."'".$record->id."'".');" class="btn  btn-sm btn-info dt-btn-st" id="adtbtn"><i class="bx bx-comment-dots"></i></button>';
			
			$action .= ' <a http-equiv = "refresh" href="'.$action_url2.'" target="_blank"><button  type="button" class="btn btn-sm btn-dark dt-btn-st" id="editBtn"><i class="bx bx-pencil"></i></button></a>';

			if($record->batch_code == ''){
			$check_box_field = '<input type="checkbox" name="assign_chbox[]" id="assign_chbox[]" value="'.$record->id.'" class="checkbox testclass" />';
			}else{
				$check_box_field = '';
			}


			// $as = moment($record->assignedDate).format("YYYY/MM/DD");
			// echo "<pre>";print_r($as);
			
			$data[] = array(
				"id" => $record->id,
				"name_trainee" => $record->name_trainee,
				"batch_code" => $record->batch_code,
				"designation" => $record->designation,
				"number" => $record->number,
				"gender" => $record->gender,
				"emp_dob" => $emp_dob,
				"created_on" => $created_on,
				"action"=>$action,
				"assignedDate" => $assignedDate,
				/**/
				"check_box_field" =>$check_box_field

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

	function get_table_list($table,$group_by,$order_by){

		// $this->db->where($where);
		$this->db->order_by($order_by, 'asc');  // or desc
		$this->db->group_by($group_by);
		$records = $this->db->get($table);
		return $records->result();
		
	}

	/*select for popup*/
	function verify_data($table,$where){
		$this->db->select('*');
		$this->db->where($where);
		$records = $this->db->get($table);
		// echo "<pre>";print_r($this->db->last_query());die;
		return $records->result();
	}
	/*select for count based*/
	function verify_data_count($table,$where){
		$this->db->select('count(*) as allcount');
		$this->db->where($where);
		// $this->db->group_by();
		$records = $this->db->get($table);
		// echo "<pre>";print_r($this->db->last_query());die;
		return $records->result();
	}

	/*select for Completed popup*/
	function get_row_trainee_list_verify_data($table,$where){
		// $trainee_code = $where['trainee_code'];
		// echo "<pre>";print_r($where);die;
		$id= $where['trainee_code'];

		$this->db->select('*');
		$this->db->from('create_trainee as ct');
		$this->db->join('trainee_daily_report as tdr','ct.trainee_code=tdr.trainee_code');
		$this->db->where('ct.trainee_code',$id);
		$records = $this->db->get()->result();
		//echo "<pre>";print_r($this->db->last_query());die;
		return $records;
	}

	/*select for count based*/
	function verify_date($table,$where){
		$this->db->select('count(*) as allcount');
		$this->db->where($where);
		// $this->db->group_by();
		$records = $this->db->get($table);
		// echo "<pre>";print_r($this->db->last_query());die;
		return $records->result();
	}

	/*update*/
    public function updates($table, $data, $col, $id){
        $this->db->where($col, $id);
        $this->db->update($table, $data);
         // print_r($this->db->last_query());die;
        $message = "success";
        return $message?true:false;
    }

    function assignEmp($form_data){
    	//echo "<pre>";print_r($form_data); die;

    	$id= explode(',',$form_data[0]['id']);
    	foreach ($form_data as $info_data){
		        $data = array(
		                'emp_code' => $info_data['emp_code'],
		                'assignedDate' => $info_data['assignedDate'],
		                'createdBy_emp' => $info_data['createdBy_emp'],
		                'batch_code' => $info_data['batch_code'],
		            );
	    }      
	    foreach($id as $value){      
            $this->db->where('id', $value);
        	$this->db->update('create_trainee', $data);
        }

        foreach ($form_data as $info_data){
		        $data = array(
		                'emp_code' => $info_data['emp_code'],
		                'assignedDate' => $info_data['assignedDate'],
		                'createdBy_emp' => $info_data['createdBy_emp'],
		                'batch_code' => $info_data['batch_code'],
		            );
	    }      
	    
        	$this->db->insert('trainee_dup_record', $data);

        	// print_r($this->db->last_query());
        if ($this->db->affected_rows() > 0)
        {
            $message = "success";
			return $message;
        }else{
	        $message = "failed";
			return $message;
		}
    }

/*normal submit for trainee report*/
    function trainee_report_add($table, $value){
			// echo"as<pre>";print_r($value);die;
		$emp_id_size = count($value['batch_code']);
		for($x=1; $x <= $emp_id_size; $x++){
			$emp_id[$x] = $value['created_by'];
		}

		$size = count($value['trainee_code']);
		for($l=1; $l <= $size; $l++){
			$emp[$l] = $value['training_day'];
		}

		$date_size = count($value['trainee_code']);
		for($k=1; $k <= $date_size; $k++){
			$assignedDate[$k] = $value['assignedDate'];
		}
			// echo"<pre>";print_r($assignedDate);die;
		
		 $data = array(
                        'assignedDate' => $assignedDate,
                        'batch_code' => $value['batch_code'],
                        'training_day' => $emp,
                        'trainee_code' => $value['trainee_code'],
                        'created_by' => $emp_id,
                        'attendance' => $value['attendance'],
                        'progress_trend' => $value['progress_trend'],
                        // 'Last_three_days_ave' => $value['Last_three_days_ave'],
                        'average_score' => $value['average_score'],
                        'punctuality' => $value['punctuality'],
                        'completion_assignment' => $value['completion_assignment'],
                        'participation_act' => $value['participation_act'],
                        'understanding_content' => $value['understanding_content'],
                        'communication' => $value['communication'],
                        'confidence' => $value['confidence'],
                        'asking_questions' => $value['asking_questions'],
                        'remarks' => $value['remarks'],
                    );

		 // echo'last data <pre>';print_r($data);die;
		foreach($data as $key=>$val) {
		    $i = 0;
		    foreach($val as $k=>$v) {
		        $ins_data[$i][$key] = $v;
		        $i++;
		    }
		
		}
		foreach($ins_data as $insert) {
			$this->db->insert($table, $insert);
		}
		// print_r($this->db->last_query());die;
		$message = "success";
		return $message;
	}

	 function trainee_report_add_dup($table, $val){
	 	$batch_code = $val['batch_code'];
		$this->db->insert($table, $val);

		
		if ($this->db->affected_rows() > 0)
        {
			$this->db->set("status", $val['status']);
			$this->db->where('batch_code', $batch_code);
			// $this->db->where('day_type', '>0');
	        $this->db->update($table);
    	}
		// echo '<pre>';print_r($this->db->last_query());die();


		$message = "success";
		return $message;
	}


}