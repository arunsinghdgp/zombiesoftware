<?php

class Workflow extends CI_Controller {

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
			//print_r($this->data['useraccess']);
		}

       }

        public function index()
        {

            $this->load->view('view_header');
            $this->db->select('m.*,o.organisation_name,u.user_name');
            $this->db->from('tbl_messages m');
            $this->db->join('tbl_user u','u.user_id=m.user_id');
            $this->db->join('tbl_organisation o','o.organisation_id=u.user_organisation');
            //$this->db->join('tbl_users_messages_mapped um','um.user_id=u.user_id');
            //$this->db->where('um.cc_type','to');
            $this->db->order_by('m.message_id','DESC');
            $info['mail']=$this->db->get()->result_array();
            $this->load->view('view_inbox',$info);
        }

		    public function compose()
        {
            $this->load->view('view_header');
            if($this->input->post('sendbtn')){
                $countAttachment=count($_FILES['attachment']['name']);
                $info['subject']=$this->input->post('subject');
                $info['mailtype']=$this->input->post('mailtype');
                $info['body']=$this->input->post('message');
                $info['mail_counter']=1;
                $info['user_id']=$this->session->userdata('user_id');
                $info['action_required']=$this->input->post('action_required');
                $info['action_date']=date("Y-m-d",strtotime($this->input->post('response_date')));
                $info['division']=implode(",",$this->input->post('division'));
                $info['discipline']=implode(",",$this->input->post('discipline'));
                $info['area']=$this->input->post('subject');
                $info['sub_area']=implode(",",$this->input->post('subarea'));

                $info['cc_user_count']=count($this->input->post('cccuser'));
                $info['bcc_user_count']=count($this->input->post('bccuser'));
                $info['to_user_count']=count($this->input->post('tocuser'));
                $info['attachment_count']=$countAttachment;
                $this->db->insert('tbl_messages',$info);
                $messageId=$this->db->insert_id();

                $toUser=$this->input->post('touser');

                $toUserArray=array('message_id'=>$messageId,'user_id'=>$toUser,'cc_type'=>'to');
                $this->db->insert('tbl_users_messages_mapped',$toUserArray);
                $ccUser=$this->input->post('ccuser');
                foreach($ccUser as $c){
                  $ccUserArray=array('message_id'=>$messageId,'user_id'=>$c,'cc_type'=>'cc');
                  $this->db->insert('tbl_users_messages_mapped',$ccUserArray);
                }
                $bccUser=$this->input->post('bccuser');
                foreach($bccUser as $b){
                  $bccUserArray=array('message_id'=>$messageId,'user_id'=>$b,'cc_type'=>'bcc');
                  $this->db->insert('tbl_users_messages_mapped',$bccUserArray);
                }



                $uploadDir="uploads/mail/";
                for($i = 0; $i < $countAttachment; $i++){
    							if($_FILES['attachment']['name'][$i]){
                    $fname=time().$_FILES['attachment']['name'][$i];
                    move_uploaded_file($_FILES['attachment']['tmp_name'][$i],$uploadDir.$fname);
                  $attachmentArray=array('message_id'=>$messageId,'attachment_name'=>$fname);
                  $this->db->insert('tbl_message_attachment',$attachmentArray);
                }
              }
              redirect(base_url().'workflow');

            }
			      $this->load->view('view_compose',$data);
        }

        public function reply($mailId='')
        {
          $this->load->view('view_header');
          $this->db->select('*');
          $this->db->from('tbl_messages');
          $this->db->where('message_id',$mailId);
          $info['mail']=$this->db->get()->result_array();
          $this->db->select('u.user_name,u.user_email');
          $this->db->from('tbl_users_messages_mapped m');
          $this->db->join('tbl_user u','u.user_id=m.user_id');
          $this->db->where('m.message_id',$mailId);
          $this->db->where('m.cc_type','to');
          $info['tousers']=$this->db->get()->result_array();

          $this->db->select('u.user_name,u.user_email');
          $this->db->from('tbl_users_messages_mapped m');
          $this->db->join('tbl_user u','u.user_id=m.user_id');
          $this->db->where('m.message_id',$mailId);
          $this->db->where('m.cc_type','cc');
          $info['ccusers']=$this->db->get()->result_array();

          $this->db->select('u.user_name,u.user_email');
          $this->db->from('tbl_messages m');
          $this->db->join('tbl_user u','u.user_id=m.user_id');
          $this->db->where('m.message_id',$mailId);

          $info['fromuser']=$this->db->get()->result_array();


            $this->load->view('view_reply',$info);
        }

        public function detail($id)
        {
            $this->load->view('view_header');
            $this->db->select('*');
            $this->db->from('tbl_messages');
            $this->db->where('message_id',$id);
            $info['mail']=$this->db->get()->result_array();
            $this->db->select('u.user_name,u.user_email');
            $this->db->from('tbl_users_messages_mapped m');
            $this->db->join('tbl_user u','u.user_id=m.user_id');
            $this->db->where('m.message_id',$id);
            $this->db->where('m.cc_type','to');
            $info['tousers']=$this->db->get()->result_array();

            $this->db->select('u.user_name,u.user_email');
            $this->db->from('tbl_users_messages_mapped m');
            $this->db->join('tbl_user u','u.user_id=m.user_id');
            $this->db->where('m.message_id',$id);
            $this->db->where('m.cc_type','cc');
            $info['ccusers']=$this->db->get()->result_array();

            $this->db->select('u.user_name,u.user_email');
            $this->db->from('tbl_messages m');
            $this->db->join('tbl_user u','u.user_id=m.user_id');
            $this->db->where('m.message_id',$id);

            $info['fromuser']=$this->db->get()->result_array();



            $this->db->select('*');
            $this->db->from('tbl_message_attachment');
            $this->db->where('message_id',$id);
            $info['attachment_list']=$this->db->get()->result_array();
            $this->load->view('view_mail_detail',$info);
        }

}
?>
