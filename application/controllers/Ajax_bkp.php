<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->database();
	    $this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('Session');
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

	function editfield(){
		$fieldName=$this->input->post('argument');
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$this->db->where('fieldname',$fieldName);
		$data['result']=$this->db->get()->result_array();
		echo $this->load->view('ajax/editfield',$data,TRUE);
	}
	
	function submittaldetail(){
		$id=$this->input->post('id');
		$this->db->select('*');
		$this->db->from('tbl_submittal');
		$this->db->where('id',$id);
		$data['result']=$this->db->get()->result_array();
		echo $this->load->view('ajax/submittaldetail',$data,TRUE);
	}

	function updatefield(){
		$fieldName=$this->input->post('argument');
		$data=array('label'=>$this->input->post('label'),
		'type'=>$this->input->post('type'));

		$this->db->where('fieldname',$this->input->post('fieldkey'));
		$this->db->update('dms_submittal_form_fields',$data);
		$data['key']=$this->input->post('fieldkey');
		echo json_encode($data);
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

}
?>
