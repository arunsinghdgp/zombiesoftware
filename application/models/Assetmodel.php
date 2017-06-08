<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assetmodel extends CI_Model {

    function __construct() {

		parent::__construct();
		  $this->load->database();
    }

    function saveRecord($entity,$data,$update=''){
        $this->db->insert($entity,$data);
    }

    function listRecord($entity,$condition='',$limit=''){
        $this->db->select('*');
        $this->db->from($entity);
        if(count(@$condition)>0){
            foreach(@$condition as $key=>$value)
              $this->db->where($key,$value);
        }
        if($limit){
            $this->db->limit($limit);
        }

        return $this->db->get()->result_array();
    }

    function listRecordWithParam($param){
        if(isset($param['fields']))
			$this->db->select($param['fields']);
		else
			$this->db->select('*');

		$this->db->from($param['entity']);
        if(is_array($param['condition'])){
		foreach($param['condition'] as $key=>$value)
             $this->db->where($key,$value);
		}
        if($param['limit'])
          $this->db->limit($param['limit']);
         if($param['groupby']){
          foreach($param['groupby'] as $ovalue){
               $this->db->group_by($ovalue);
          }

        }
		if($param['order_by'])
          $this->db->order_by($param['order_by'],'DESC');

	   if($param['orderby']){
          foreach($param['orderby'] as $okey=>$ovalue){
               $this->db->order_by($okey,$ovalue);
          }

        }



       return $this->db->get()->result_array();

    }

    function listRoleResource(){
		$this->db->select('r.*,rr.resource_name');
		$this->db->from('tbl_role_group r');
		$this->db->join('tbl_role_resource rr','rr.role_id=r.id');
		$this->db->order_by('group_role_name');
		return $this->db->get()->result_array();
	}



}
?>
