<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set("max_execution_time", 0);
class submittals extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->database();
	    $this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('Session');
	  	$this->load->library('solrUtils', array("SolrUrlRoot"=>$this->config->item('solr_host_url')));

		$lang='english';
        $this->lang->load('common',$lang);
	   
        $this->load->library('pagination');
		if(!$this->session->userdata('user_id')){
			redirect(base_url().'users/login');
		}
    }
	
	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('view_submittalupload');
	}
	
	public function dashboard()
	{
		$this->load->view('view_header');
		$this->load->view('view_dashboard');
	}
	
	public function uploadsubmittal(){
		$this->load->dbforge();
		$this->load->library('Spreadsheet_Excel_Reader');
		$uploads_dir = "uploads/";
		$file=time().$_FILES['file']['name'];
		if(move_uploaded_file($_FILES['file']['tmp_name'],$uploads_dir.$file)){
			$data = new Spreadsheet_Excel_Reader($uploads_dir.$file);
			$rowCount=$data->rowcount($sheet_index=0);
			$colCount=$data->colcount($sheet_index=0);
			//$this->load->model('user');
			$documentData = array();
			for($j=1;$j<=$colCount;++$j){
				$colName=$data->val(1,$j);
				for($i=2;$i<=$rowCount;++$i){
					$documentData[$i-2][$colName] = ($data->val($i,$j)=='NA')?'':$data->val($i,$j);
					$temp[] = $documentData[$i-2][$colName];
				}
				$uniqueArray=array_unique($temp);
				if($rowCount/count($uniqueArray)>10){
				  $rowInfo=array('fieldname'=>str_replace(' ','_',strtolower(trim($colName))),'label'=>$colName,'type'=>'select','values'=>json_encode($uniqueArray));
				  $this->dbforge->add_field(array(
					'id' => array(
						'type' => 'INT',
						'constraint' => 5,
						'unsigned' => TRUE,
						'unique'   => TRUE,
						'auto_increment' => TRUE
					),
					$rowInfo['fieldname'] => array(
						'type' => 'VARCHAR',
						'constraint' => '100',
					),
					
				));

				//$this->dbforge->create_table('dms_'.$rowInfo['fieldname']);
				//$this->db->batch_insert('dms_'.$rowInfo['fieldname'],$uniqueArray);
			  
			  }else{
				  $rowInfo=array('fieldname'=>str_replace(' ','_',strtolower(trim($colName))),'label'=>$colName,'type'=>'text','values'=>'');
			  }
			  unset($uniqueArray);
			  unset($temp);
			  $this->db->insert('dms_submittal_form_fields',$rowInfo);
			}
			if(count($documentData) > 0){
				$this->sorlutils->insertDataInSolrCore($documentData);
			}
		}
		//redirect(base_url().'submittals/listsubmittalfields');
		print $this->db->last_query();
	}
	
	function listsubmittalfields(){
		$this->load->view('view_header');
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$this->db->order_by("field_order", "asc");
		$info['fields']=$this->db->get()->result_array();
		$this->load->view('view_listsubmittalsfield', $info);
	}

	public function listsubmittal()
	{
		$this->load->view('view_header');
		$data['searchFields'] = $this->getAllSearchableFields();
		$data['sortFields'] = $this->getAllSortableFields();
		$data['searchColumns'] = $this->getAllResultsColumn();
		

		$this->load->view('view_listsubmittal', $data);
	}

	private function getAllSearchableFields(){
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$this->db->order_by("field_order", "ASC");
		$this->db->order_by("create_date", "DESC");
		$this->db->order_by("modified_date", "DESC");
		$this->db->where('is_searchable', true);
		$data = $this->db->get()->result_array();
		foreach ($data as $key => $value) {
			if($value['type'] == 'select' || $value['type'] == 'multiselect'){
				$data[$key]["options"]=$this->fetchAllOptions();
			}
		}
		return $data;
	}

	private function fetchAllOptions($fieldId){
		$this->db->select('*');
		$this->db->from('dms_submittal_form_field_options');
		$this->db->where('field_id', $fieldId);
		return $this->db->get()->result_array();
	}

	private function getAllSortableFields(){
		$this->db->select(array("fieldname", "label", "type"));
		$this->db->from('dms_submittal_form_fields');
		$this->db->order_by("field_order", "ASC");
		$this->db->order_by("create_date", "DESC");
		$this->db->order_by("modified_date", "DESC");
		$this->db->where('is_sortable', true);

		return $this->db->get()->result_array();
	}

	private function getAllResultsColumn(){
		$this->db->select(array("fieldname", "label", "type"));
		$this->db->from('dms_submittal_form_fields');
		$this->db->order_by("field_order", "ASC");
		$this->db->order_by("create_date", "DESC");
		$this->db->order_by("modified_date", "DESC");
		$this->db->where('show_in_search_result', true);

		return $this->db->get()->result_array();
	}
	
	public function addsubmittal()
	{
		$this->load->view('view_header');
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$this->db->order_by("field_order", "asc");
		$info['fields']=$this->db->get()->result_array();
		foreach ($info['fields'] as $key => $value) {
			if($value['type'] == 'select' || $value['type'] == 'multiselect'){
				$this->db->select('*');
				$this->db->from('dms_submittal_form_field_options');
				$this->db->where('field_id', $value['id']);
				$info['fields'][$key]["options"]=$this->db->get()->result_array();
			}
		}
		$info['msg'] = $this->session->flashdata('flash_message');
		$this->load->view('view_addsubmittal', $info);
	}

	public function submitsubmital()
	{
		$formData = $_POST;
		// upload files
		if(isset($_FILES) && count($_FILES) > 0){
			$uploadedFileNames = $this->uploadSubmitalFiles($_FILES);
			$formData = array_merge($formData, $uploadedFileNames);
		}

		$out = $this->solrutils->insertDataInSolrCore($formData);
		if($out->responseHeader->status == 0){
			$this->session->set_flashdata('flash_message', array('type'=>'alert-success', 'msg'=>"Document added successfully"));
		}else{
			$this->session->set_flashdata('flash_message', array('type'=>'alert-danger', 'msg'=>"Something went wrong. Please try again!!"));
		}
		
		header("Location: /submittals/addsubmittal");
	}

	private function uploadSubmitalFiles($filesArray){
		$uploads_dir = "uploads/submitalFiles/";
		$fileNames = array();
		foreach($filesArray as $key=>$file){
			$fileNames[$key] = $uploads_dir.time().'_'.mt_rand().'_'.$file['name'];
			move_uploaded_file($file['tmp_name'], $fileNames[$key]);
		}
		return $fileNames;
	}
	
	
	public function testFileRead(){
		$this->load->library('Spreadsheet_Excel_Reader');
		$data = new Spreadsheet_Excel_Reader("uploads/1492199132Submittals.xls");
		//print_r($data);
		
		$rowCount=$data->rowcount($sheet_index=0);
		$colCount=$data->colcount($sheet_index=0);
		//$this->load->model('user');
		$documentData = array();
		for($j=1;$j<=$colCount;++$j){
			$colName=$data->val(1,$j);
			for($i=2;$i<=$rowCount;++$i){
				$documentData[$i-2][$colName] = ($data->val($i,$j)=='N/A')?'':(string)$data->val($i,$j);
				//$temp[] = $documentData[$i-2][$colName];
			}
		}
		$out = $this->solrutils->insertDataInSolrCore($documentData);
		var_dump($out);
	}
}
?>