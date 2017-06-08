<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class users extends CI_Controller {
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

		if($this->session->userdata('user_id') && $this->session->userdata('user_id')!=123){
			$this->db->select('r.resource_name');
			$this->db->from('tbl_resource r');
			$this->db->join('tbl_user_resource_access ta','ta.resource_id=r.id');
			$this->db->where('ta.user_id',$this->session->userdata('user_id'));
			$this->data['useraccess']=array_column($this->db->get()->result_array(),'resource_name');
			$this->session->set_userdata('access',$this->data['useraccess']);
			print_r($this->data['useraccess']);
		}

       }


	public function index()
	{

		$this->load->view('view_login');

	}

	public function login()
	{
		$data['error']='';
		if($this->input->post('loginbtn')){
			$userid=$this->input->post('userid');
			$password=$this->input->post('password');
			if($userid=='admin' && $userid=='admin'){
				$this->session->set_userdata('user_id',123);
				$this->session->set_userdata('user_type','admin');
				redirect(base_url().'submittals');
			}
			else if($this->loginCheck($userid,$password)){
				redirect(base_url().'users/user_dashboard');
			}
			else{
				$data['error']='Error in username/password';
			}
		}

		$this->load->view('view_login',$data);
	}

	function loginCheck($userid,$password){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('user_email',$userid);
		$this->db->where('user_password',md5($password));
	    $result=$this->db->get()->result_array();
		if(count($result)>0){
			$this->session->set_userdata('user_id',$result[0]['user_id']);

			$this->session->set_userdata('user_type','user');
			return true;
		}else{
			return false;
		}
	}

	function listuser(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_user';
		$info['users']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listuser',$info);
	}

	function adduser(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_organisation';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$info['organisation_list']=$this->assetmodel->listRecordWithParam($param);
		$info['msg']='';
		if($this->input->post('saveUser')){
			$data=array(
				'user_name'=>trim($this->input->post('username')),
				'user_email'=>trim($this->input->post('useremail')),
				'user_loginid'=>trim($this->input->post('userid')),
				'user_password'=>md5(trim($this->input->post('userpassword'))),
				'user_contact'=>trim($this->input->post('usercontact')),
				'user_designation'=>trim($this->input->post('userdesignation')),
				'user_organisation'=>trim($this->input->post('userorganisation')),
				'user_division'=>trim($this->input->post('userdivision')),

				'created_on'=>date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_user',$data);
			$info['msg']='User added succefully';
			$subject='Account Creation';
			$params['html']=$this->load->view('email/account_creation',$data,TRUE);
			$params['to']=$data['user_email'];
			$params['name']=$data['user_name'];
			$params['subject']=$subject;
			$this->sendGridEmail($params);
		}
		$this->load->view('view_adduser',$info);
	}

	function listorganisation(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_organisation';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$data['organisation_list']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listorganisation',$data);
	}

	function addorganisation(){
		$this->load->view('view_header');
		$info['msg']='';
		if($this->input->post('saveOrganisation')){
			$data=array(
				'organisation_name'=>trim($this->input->post('organisationname')),
				'organisation_contact'=>trim($this->input->post('organisationcontact')),
				'organisation_loginid'=>trim($this->input->post('organisationid')),
				'organisation_password'=>md5(trim($this->input->post('organisation_password'))),
				'organisation_address'=>trim($this->input->post('organisationaddress')),
				'trading_name'=>trim($this->input->post('trading_name')),
				'organisation_abbreviation'=>trim($this->input->post('organisation_abbreviation')),
				'organisation_registrationnumber'=>trim($this->input->post('organisation_registrationnumber')),
				'organisation_email'=>trim($this->input->post('organisationemail')),
				'organisation_website'=>trim($this->input->post('organisation_website')),
				'organisation_postal_country'=>trim($this->input->post('organisation_postal_country')),
				'organisation_postal_city'=>trim($this->input->post('organisation_postal_city')),
				'organisation_postal_address'=>trim($this->input->post('organisation_postal_address')),
				'organisation_postal_pincode'=>trim($this->input->post('organisation_postal_pincode')),
				'status'=>trim($this->input->post('status')),
				'created_on'=>date('Y-m-d H:i:s')
			);
			if($this->input->post('differentdelivery')==1){
				$data['organisation_delivery_country']=trim($this->input->post('organisation_delivery_country'));
				$data['organisation_delivery_city']=trim($this->input->post('organisation_delivery_city'));
				$data['organisation_delivery_address']=trim($this->input->post('organisation_delivery_address'));
				$data['organisation_delivery_pincode']=trim($this->input->post('organisation_delivery_pincode'));
			}else{
				$data['organisation_delivery_country']=trim($this->input->post('organisation_postal_country'));
				$data['organisation_delivery_city']=trim($this->input->post('organisation_postal_city'));
				$data['organisation_delivery_address']=trim($this->input->post('organisation_postal_address'));
				$data['organisation_delivery_pincode']=trim($this->input->post('organisation_postal_pincode'));
			}
			if($_FILES['organisation_logo']['name']){
				$uploadDir='uploads/organisation/logo/';
				$fName=$_FILES['organisation_logo']['name'];
				$ext = pathinfo($fName, PATHINFO_EXTENSION);
				$fileName=time().'_'.rand(1,99999).'.'.$ext;
				move_uploaded_file($_FILES['organisation_logo']['tmp_name'],$uploadDir.$fileName);
				$data['organisation_logo']=$fileName;
			}

			$this->db->insert('tbl_organisation',$data);
			$info['msg']='Organisation added succefully';
			$organisationId=$this->db->insert_id();
			$divisionArray=$this->input->post('division');
			$divsions=array();
			if(count($divisionArray)>0){
				foreach($divisionArray as $d){
					if(!in_array($d,$divsions) && trim($d)!=''){
						$dArray=array('division_name'=>$d,'organisation_id'=>$organisationId,'active'=>1);
						$this->db->insert('tbl_organisation_division',$dArray);
					}
					$divsions[]=$d;
				}
				$this->db->insert('tbl_organisation_division',$dArray);
			}

			$info['msg']='Organisation added succefully';
		}
		$this->load->model('assetmodel');
		$param['entity']='tbl_country';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$info['countryList']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_addorganisation',$info);
	}

	function editorganisation($id){
		$this->load->view('view_header');

		if($this->input->post('updateOrganisation')){
			$data=array(

				'organisation_contact'=>trim($this->input->post('organisationcontact')),
				'organisation_loginid'=>trim($this->input->post('organisationid')),

				'organisation_address'=>trim($this->input->post('organisationaddress')),

				'organisation_abbreviation'=>trim($this->input->post('organisation_abbreviation')),
				'organisation_registrationnumber'=>trim($this->input->post('organisation_registrationnumber')),
				'organisation_email'=>trim($this->input->post('organisationemail')),
				'organisation_website'=>trim($this->input->post('organisation_website')),
				'organisation_postal_country'=>trim($this->input->post('organisation_postal_country')),
				'organisation_postal_city'=>trim($this->input->post('organisation_postal_city')),
				'organisation_postal_address'=>trim($this->input->post('organisation_postal_address')),
				'organisation_postal_pincode'=>trim($this->input->post('organisation_postal_pincode')),
				'status'=>trim($this->input->post('status'))
			);
			$data['organisation_delivery_country']=trim($this->input->post('organisation_delivery_country'));
			$data['organisation_delivery_city']=trim($this->input->post('organisation_delivery_city'));
			$data['organisation_delivery_address']=trim($this->input->post('organisation_delivery_address'));
			$data['organisation_delivery_pincode']=trim($this->input->post('organisation_delivery_pincode'));

			if($_FILES['organisation_logo']['name']){
				$uploadDir='uploads/organisation/logo/';
				$fName=$_FILES['organisation_logo']['name'];
				$ext = pathinfo($fName, PATHINFO_EXTENSION);
				$fileName=time().'_'.rand(1,99999).'.'.$ext;
				move_uploaded_file($_FILES['organisation_logo']['tmp_name'],$uploadDir.$fileName);
				$data['organisation_logo']=$fileName;
			}

			$this->db->where('organisation_id',$id);
			$this->db->update('tbl_organisation',$data);

			if($this->input->post('updateOrganisation')){
					$this->db->where('organisation_id',$id);
					$this->db->delete('tbl_organisation_division');
					$divisionArray=$this->input->post('division');
					if(count($divisionArray)>0){
						foreach($divisionArray as $d){
							if(!in_array($d,$divsions) && trim($d)!=''){
								$dArray=array('division_name'=>$d,'organisation_id'=>$id,'active'=>1);
								$this->db->insert('tbl_organisation_division',$dArray);
							}
							$divsions[]=$d;
						}
						$this->db->insert('tbl_organisation_division',$dArray);
					}
			}

		}


		$this->load->model('assetmodel');
		$param1['entity']='tbl_country';
		$data['countryList']=$this->assetmodel->listRecordWithParam($param1);

		$param['entity']='tbl_organisation';
		$param['condition']=array('organisation_id'=>$id);
		$data['organisation']=$this->assetmodel->listRecordWithParam($param);

		$param2['entity']='tbl_city';
		$param2['condition']=array('CountryCode'=>$data['organisation'][0]['organisation_postal_country']);
		$data['cityPostal']=$this->assetmodel->listRecordWithParam($param2);

		$param3['entity']='tbl_organisation_division';
		$param3['condition']=array('organisation_id'=>$id);
		$data['division']=$this->assetmodel->listRecordWithParam($param3);

		$param3['entity']='tbl_city';
		$param3['condition']=array('CountryCode'=>$data['organisation'][0]['organisation_delivery_country']);
		$data['cityDelivery']=$this->assetmodel->listRecordWithParam($param3);
		$this->load->view('view_editorganisation',$data);
	}

	function listcontractor(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_organisation';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$data['organisation_list']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listcontractor',$data);
	}

	function addcontractor(){
		$this->load->view('view_header');
		$info['msg']='';

		$this->load->view('view_addcontractor',$info);
	}

	function logout(){
		redirect(base_url().'users/login');
	}



	function settings(){
		$this->load->view('view_header');
		$this->load->view('view_settings',$info);
	}

	function addproject(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$info['msg']='';
		if($this->input->post('saveProject')){
			$data=array(
				'project_name'=>trim($this->input->post('project_name')),
				'project_short_name'=>trim($this->input->post('project_short_name')),
				'project_code'=>trim($this->input->post('project_code')),
				'project_type'=>trim($this->input->post('project_type')),
				'register_type'=>trim($this->input->post('register_type')),
				'access_level'=>trim($this->input->post('access_level')),
				'organisation_access_level'=>trim($this->input->post('organisation_access_level')),
				'project_contact'=>trim($this->input->post('project_contact')),
				'project_fax'=>trim($this->input->post('project_fax')),
				'project_country'=>trim($this->input->post('project_country')),
				'project_city'=>trim($this->input->post('project_city')),
				'project_information'=>trim($this->input->post('project_information')),
				'project_value'=>trim($this->input->post('project_value')),
				'project_start_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('project_start_date'))),
				'project_estimated_completion_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('project_estimated_completion_date'))),
				'created_on'=>date('Y-m-d H:i:s')

			);
			$this->db->insert('tbl_project',$data);

		}

		$param['entity']='tbl_country';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$info['countryList']=$this->assetmodel->listRecordWithParam($param);


		$this->load->view('view_addproject',$info);
	}

	function editproject($id){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$info['msg']='';
		if($this->input->post('updateProject')){
			$data=array(
				'project_short_name'=>trim($this->input->post('project_short_name')),
				'project_code'=>trim($this->input->post('project_code')),
				'project_type'=>trim($this->input->post('project_type')),
				'register_type'=>trim($this->input->post('register_type')),
				'access_level'=>trim($this->input->post('access_level')),
				'organisation_access_level'=>trim($this->input->post('organisation_access_level')),
				'project_contact'=>trim($this->input->post('project_contact')),
				'project_fax'=>trim($this->input->post('project_fax')),
				'project_country'=>trim($this->input->post('project_country')),
				'project_city'=>trim($this->input->post('project_city')),
				'project_information'=>trim($this->input->post('project_information')),
				'project_value'=>trim($this->input->post('project_value')),
				'project_start_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('project_start_date'))),
				'project_estimated_completion_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('project_estimated_completion_date')))
				);
			$this->db->where('project_id',$id);
			$this->db->update('tbl_project',$data);

		}

		$param['entity']='tbl_country';
		//$param['orderby']=array('organisation_name'=>'ASC');
		$info['countryList']=$this->assetmodel->listRecordWithParam($param);

		$param2['entity']='tbl_project';
		$param2['condition']=array('project_id'=>$id);
		$info['project']=$this->assetmodel->listRecordWithParam($param2);

		$param3['entity']='tbl_city';
		$param3['condition']=array('CountryCode'=>$info['project'][0]['project_country']);
		$info['cityList']=$this->assetmodel->listRecordWithParam($param3);
		$this->load->view('view_editproject',$info);
	}

	function listproject(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_project';
		$data['project']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listproject',$data);
	}

	function listgroup(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$data['group']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listgroup',$data);
	}

	function addgroup(){
		$this->load->view('view_header');
		$info['msg']='';
		if($this->input->post('saveGroup')){
			$data=array(
				'group_name'=>trim($this->input->post('group_name')),
			);
			$this->db->insert('tbl_group',$data);
			$info['msg']='Group added succefully';
		}
		$this->load->view('view_addgroup',$info);
	}

	function listrolegroup(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_role_group';
		$data['group']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listrolegroup',$data);
	}

	function addrolegroup(){
		$this->load->view('view_header');
		$info['msg']='';
		if($this->input->post('saveRoleGroup')){
			$data=array(
				'group_role_name'=>trim($this->input->post('group_role_name')),
			);
			$this->db->insert('tbl_role_group',$data);
			$info['msg']='Group role added succefully';
		}
		$this->load->view('view_addrolegroup',$info);
	}

	function listroleresource(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_role_resource';
		$data['group']=$this->assetmodel->listRecordWithParam($param);
		$this->load->view('view_listroleresource',$data);
	}

	function addroleresource(){
		$this->load->view('view_header');
		$info['msg']='';
		$param['entity']='tbl_role_group';
		$this->load->model('assetmodel');
		$info['role']=$this->assetmodel->listRecordWithParam($param);
		if($this->input->post('saveResource')){
			$data=array(
				'resource_name'=>trim($this->input->post('resource_name')),
				'role_id'=>trim($this->input->post('role_id'))
			);
			$this->db->insert('tbl_role_resource',$data);
			$info['msg']='Resource added succefully';
		}
		$this->load->view('view_addroleresource',$info);
	}

	function group_access(){
		$this->load->view('view_header');
		$info['msg']='';
		$this->load->view('view_header');
		$this->db->select('*');
		$this->db->from('dms_submittal_form_fields');
		$info['fields']=$this->db->get()->result_array();
		$this->load->view('view_group_access',$info);
	}

	function assigngroupaccess(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$info['group']=$this->assetmodel->listRecordWithParam($param);
		$info['resource']=$this->assetmodel->listRoleResource();
		$this->load->view('view_assign_group_access',$info);
	}

	function dashboard(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$info['group']=$this->assetmodel->listRecordWithParam($param);
		$info['resource']=$this->assetmodel->listRoleResource();
		$this->load->view('view_dashboard',$info);
	}

	function user_dashboard(){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$info['group']=$this->assetmodel->listRecordWithParam($param);
		$info['resource']=$this->assetmodel->listRoleResource();
		$this->load->view('view_user_dashboard',$info);
	}

	function assignaccess($resource=''){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$info['group']=$this->assetmodel->listRecordWithParam($param);
		if($resource=='user_organisation'){
			$param1['entity']='tbl_resource';
			$param1['condition']=array('resource_group'=>'USER_ORGANISATION');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='project'){
			$param1['entity']='tbl_resource';
			$param1['condition']=array('resource_group'=>'PROJECT');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='submittal'){
			$param1['entity']='tbl_resource';
			$param1['condition']=array('resource_group'=>'SUBMITTAL');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}

		$this->load->view('view_assign_access',$info);
	}

	function projectrolesetting($resource=''){
		$this->load->view('view_header');
		$this->load->model('assetmodel');
		$param['entity']='tbl_group';
		$info['group']=$this->assetmodel->listRecordWithParam($param);
		if($resource=='user_organisation'){
			$param1['entity']='tbl_project_role';
			$param1['condition']=array('resource_group'=>'USER_ORGANISATION');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='project'){
			$param1['entity']='tbl_project_role';
			$param1['condition']=array('resource_group'=>'PROJECT');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='submittalsearch'){
			$param1['entity']='tbl_project_role';
			$param1['condition']=array('resource_group'=>'SUBMITTAL_SEARCH');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='documentfield'){
			$param1['entity']='tbl_project_role';
			$param1['condition']=array('resource_group'=>'DOCUMENT_FIELD');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		else if($resource=='documentstatus'){
			$param1['entity']='tbl_project_role';
			$param1['condition']=array('resource_group'=>'DOCUMENT_STATUS');
			$info['resource']=$this->assetmodel->listRecordWithParam($param1);
		}
		
		$this->load->view('view_projectrolesetting',$info);
	}


	function sendGridEmail($params){
		$url = 'https://api.sendgrid.com/';
		$user = 'conferroheritae';
		$pass = 'Test123@#';

		$paramArray=array('api_user'=>$user,'to'=>$params['to'],'subject'=>$params['subject'],'html'=>$params['html'],'api_key'=>$pass,'from'=>'no-reply@justbid.net');
		$request =  $url.'api/mail.send.json';
		$session = curl_init($request);
		curl_setopt ($session, CURLOPT_POST, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $paramArray);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $paramArray);
		$response = curl_exec($session);
		curl_close($session);
	}



}
?>
