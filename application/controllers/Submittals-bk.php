<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class submittals extends CI_Controller {
	 public function __construct()
       {
        parent::__construct();
        $this->load->helper('url');
	    $this->load->helper('html');
	    $this->load->database();
	    $this->load->library('form_validation');
	  	$this->load->library('email');
	  	$this->load->library('Session');
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
	  var_dump($data);
	  exit();
	  //$this->load->model('user');
	  for($j=1;$j<=$colCount;++$j){
		  $colName=$data->val(1,$j);
		  for($i=2;$i<=$rowCount;++$i){
			$temp[]=($data->val($i,$j)=='NA')?'':$data->val($i,$j);
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
		  print_r($temp);
		  unset($uniqueArray);
		  unset($temp);
		  $this->db->insert('dms_submittal_form_fields',$rowInfo);
       }
	}
		//redirect(base_url().'submittals/listsubmittalfields');
		print $this->db->last_query();
	}
	
	function listsubmittalfields(){
		$this->load->view('view_header');
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$info['fields']=$this->db->get()->result_array();
		$this->load->view('view_listsubmittalsfield',$info);
	}
	
	public function listsubmittal()
	{
		$this->load->view('view_header');
		$this->load->view('view_listsubmittal');
	}
	
	public function addsubmittal()
	{
		$this->load->view('view_header');
		$this->load->view('view_addsubmittal');
	}
	
	public function readspreadsheet(){
	 $this->load->library('Spreadsheet_Excel_Reader');
	   $uploads_dir = "uploads/";
	   $file = "1490272084TemplateMetadata-2.xls";
		  
	 $data = new Spreadsheet_Excel_Reader($uploads_dir.$file);
	  $rowCount=$data->rowcount($sheet_index=0);
      $colCount=$data->colcount($sheet_index=0);
	  
	  $arr = [];
	  for($i=2; $i<=$rowCount; $i++){
		  $arr1 = [];
		for($j=1; $j<=$colCount; $j++){
			$arr1[$data->val(1,$j)] = $data->val($i,$j); 
			/*if($j > 1){
				$str .= ",";
			}
			$str .= $data->val($i,$j);
			if($j == $colCount){
				$str .= "\n";
			}*/
		}
		$arr[] = $arr1;
	  }
	  echo "<pre>";
	  print_r($arr);
	  echo "</pre>";
	  
		/*$this->load->library('curl'); 
		$this->curl->simple_post('http://139.162.176.174:8983/solr/zombie/update', json_encode($arr), array("Content-Type" => "application/json")); 
		
		echo $this->curl->error_string;

		// Information
		print_r($this->curl->info); // array
		*/
			$ch = curl_init('http://139.162.176.174:8983/solr/zombie/update?commit=true');
			$jsonStr = json_encode($arr);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($jsonStr))
			);
			$result = curl_exec($ch);
			curl_close($ch);

			// get the result and parse to JSON
			$errStr = json_decode($result);
			if(isset($errStr)){ 
				echo $errStr;
			} 
			
			echo $jsonStr;
		/*if ( ! write_file('uploads/data.json', json_encode($arr)))
		{
				echo 'Unable to write the file';
		}
		else
		{
				echo 'File written!';
		}*/
	}
	
}
?>