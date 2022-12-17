<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model{
	
	function feedback_add_form_batch_code(){
		$response = array();
		$this->db->select('distinct(batch_code)');
		$this->db->from('create_trainee');
		//$this->db->where('trainee_code NOT IN (SELECT table_attrition_trainee_code FROM table_attrition where table_attrition_batch_code="'.$batch_code.'")');
		$this->db->where('batch_code !=','');
		$query = $this -> db ->get()-> result_array();
		$feedback_batchcode=array();
		foreach($query as $keys=>$values){
			foreach($values as $key=>$value){
				$feedback_batchcode[]=$value;
			}
		}
		//echo '<pre>';print_r($feedback_batchcode);die;
		return $feedback_batchcode;
	}
	

	function get_table_feedback_traineelist($table,$b_code){
		$this->db->select('distinct(trainee_code),name_trainee');
		$this->db->where('batch_code',$b_code);
		$records = $this->db->get($table);
		$trainee_list=array();
		$i=0;
		foreach($records->result_array() as $keys=>$values){
				$trainee_list[$i]['trainee_code']=$values['trainee_code'];
				$trainee_list[$i]['trainee_name']=$values['name_trainee'];
				$i++;
		}
		return $trainee_list;
	}
	function form_store_feedback_tracker($postdata){


			


		$createdBy = $this->session->emp_id;
		
			$data = array(
                        'batch_code' => $postdata['batch_code'],
                        'emp_code' => $postdata['emp_code'],
                        'objectives' => $postdata['objectives'],
                        'topics_covered' => $postdata['topics_covered'],
                        'opportunity' => $postdata['opportunity'],
                        'training_rating' => $postdata['training_rating'],
                        'training_material' => $postdata['training_material'],
                        'knowledge_topic' => $postdata['knowledge_topic'],
                        'participation' => $postdata['participation'],
                        'answered_questions' => $postdata['answered_questions'],
                        'training_methods' => $postdata['training_methods'],



                        'effective_training_program' => $postdata['effective_training_program'],
                        'hands_experience' => $postdata['hands_experience'],
                        'call_recordings' => $postdata['call_recordings'],
                        'overall_training' => $postdata['overall_training'],
                        'key_learning' => $postdata['key_learning'],


                         'new_learning' => $postdata['new_learning'],
                        'feedback' => $postdata['feedback'],
                        'improve_program' => $postdata['improve_program'],
                        'created_by' => $createdBy,
                        'created_on' => date('Y-m-d'),
                       
                    );
			 $this->db->insert('table_feedback', $data);
		
		return 'success';
	}
	
	
	
	

}