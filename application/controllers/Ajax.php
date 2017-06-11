<?php
error_reporting(E_ALL);
ini_set("display_errors", "on");
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->library('solrUtils', array("SolrUrlRoot"=>$this->config->item('solr_host_url')));
    }

	function addeditfield(){
		$postData=$this->input->post();
		$data['result'] = array();
		if(isset($postData['argument']) && $postData['argument']!=0){
			$this->db->select('*');
			$this->db->from('dms_submittal_form_fields');
			$this->db->where('id', $postData['argument']);
			$data['result']=$this->db->get()->result_array();
			foreach ($data['result'] as $key => $value) {
				if($value['type'] == 'select' || $value['type'] == 'multiselect'){
					$this->db->select('*');
					$this->db->from('dms_submittal_form_field_options');
					$this->db->where('field_id', $postData['argument']);
					$data['result'][$key]["options"]=$this->db->get()->result_array();
				}
			}
		}
		echo $this->load->view('ajax/addeditfield', $data,TRUE);
	}
	
	function updatefield(){
		$postData = $this->input->post();
		//print_r($postData);exit;
		$data = array(
			'fieldname'=> $postData['fieldname'],
			'label'=> $postData['label'],
			'type' => $postData['type'],
			'use_in_submittal' => isset($postData['use_in_submittal'])?true:false,
			'show_in_search_result' => isset($postData['show_in_search_result'])?true:false,
			'is_mandatory' => isset($postData['is_mandatory'])?true:false,
			'is_searchable' => isset($postData['is_searchable'])?true:false,
			'is_sortable' => isset($postData['is_sortable'])?true:false,
			'field_order' => isset($postData['field_order']) ? $postData['field_order'] : 0
		);

		if(isset($postData['id']) && $postData['id'] > 0){
			$this->db->where('id', $postData['id']);
			$this->db->update('dms_submittal_form_fields',$data);
			$rowId = $postData['id'];
			// No need to update solr schema as field name and type update is not allowed.
		}else{
			$this->db->set('create_date', 'NOW()', FALSE);
			$this->db->insert('dms_submittal_form_fields',$data);
			$rowId = $this->db->insert_id();

			// Add schema field in solr
			$schemaAddData = array(
									"name" => $data['fieldname'],
									"type"=>"string",
									"stored"=>true,
									"indexed"=>true
								);
			if($postData['type'] == 'multiselect'){
				$schemaAddData["multiValued"] = true;
			}

			$this->solrutils->addSchemaField($schemaAddData);
		}


		// Delete Old Options
		$this->db->where('field_id', $rowId);
		$this->db->delete('dms_submittal_form_field_options');

		if($postData['type'] == "select" || $postData['type'] == "multiselect"){
			
  			// Insert new options
  			$optionsArr = array();
  			for($i=0, $l=count($postData['options']); $i<$l; $i++){
  				$optionsArr[] = array(
  									'field_id'		=> $rowId,
  									'option_value'	=> $postData['options'][$i],
  									'option_label'	=> $postData['options'][$i]
  								);
  			}
  			$this->db->insert_batch('dms_submittal_form_field_options', $optionsArr);
		}

		echo json_encode($data);
	}
	
	function deletefield(){
		$postData=$this->input->post();
		$result = array();
		if(isset($postData['argument']) && $postData['argument']!=0){
			$this->db->select(array('fieldname','type'));
			$this->db->from('dms_submittal_form_fields');
			$this->db->where('id', $postData['argument']);
			$result=$this->db->get()->result();
			if(count($result)>0){
				foreach($result as $row=>$value){
					// Delete field from solr schema
					$this->solrutils->deleteSchemaField($value->fieldname);

					// Delete Field options
					if($value->type == 'select' || $value->type == 'multiselect'){
						$this->db->delete('dms_submittal_form_field_options', array('field_id' => $postData['argument']));
					}
				}
			}
			$this->db->delete('dms_submittal_form_fields', array('id' => $postData['argument']));
			
		}
		echo json_encode(array('success'=>true));
	}

	function getCityListByCountryId(){

		$fieldName=$this->input->post('country');
		$this->db->select('Name');
		$this->db->from('tbl_city');
		$this->db->where('CountryCode',$fieldName);
		$result=$this->db->get()->result_array();
		echo json_encode($result);
	}

	function getOrganisationDivision(){
		$organisation=$this->input->post('organisation');
		$this->db->select('id,division_name');
		$this->db->from('tbl_organisation_division');
		$this->db->where('organisation_id',$organisation);
		$result=$this->db->get()->result_array();
		echo json_encode($result);
	}

	

	function submittaldetail(){
		$id=$this->input->post('id');
		$this->db->select('*');
		$this->db->from('tbl_submittal');
		$this->db->where('id',$id);
		$data['result']=$this->db->get()->result_array();
		echo $this->load->view('ajax/submittaldetail',$data,TRUE);
	}

	

	function assignresourcetouser(){
				$group_resource=$this->input->post('info');
				$action=$this->input->post('action');
				$info=explode("_",$group_resource);
				$data['resource_id']=$info[1];
				$data['group_id']=$info[0];
				$return=array();
				if($action=='insert'){
					$this->db->insert('tbl_group_resource_access',$data);
					$return['msg']='Access granted succesfully';
				}
				else if($action=='delete'){
					foreach($data as $dKey=>$dValue){
						$this->db->where($dKey,$dValue);
					}
					$this->db->delete('tbl_group_resource_access');
					$return['msg']='Access revoked succesfully';
				}
				echo json_encode($return);

	}

	function getUserList(){

		$query=trim($this->input->get('q'));
		$this->db->select("user_id as id,concat(u.user_first_name,' ',u.user_last_name,' - ',o.organisation_name) as name,user_email",FALSE);
		$this->db->from('tbl_user u');
		$this->db->join('tbl_organisation o','o.organisation_id=u.user_organisation');
		$this->db->like('u.user_first_name',$query);
		$this->db->or_like('u.user_last_name',$query);
		$result=$this->db->get()->result_array();
		
		echo json_encode($result);
	}

	
	
}
?>