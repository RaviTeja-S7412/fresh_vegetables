<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Vendors extends CI_Controller {
	
public function __construct(){
			
	parent::__construct();
	
	$this->secure->loginCheck();
	
}

public function createVendor(){

	$this->load->view("vendors/createVendor");

}

public function index(){

	$data["agents"] = $this->db->query("select * from tbl_vendors where deleted=0 order by id desc")->result();
	$this->load->view("vendors/allVendors",$data);
}

public function updateVendor($id){

	$data["u"] = $this->db->get_where("tbl_vendors",array("id"=>$id,"deleted"=>0))->row();
	$this->load->view("vendors/createVendor",$data);
}
	
	
public function userstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('user_status'=>$status);
		
		$this->db->set($data);
		$this->db->where("userid",$id);
		$d=$this->db->update("shreeja_users");
		
		if($d){
			if($status==0){
				echo 1;
				//echo $this->alert->pnotify("Success","Successfully News Enabled","success");
			}else{
				echo 0;
				//echo $this->alert->pnotify("Success","Successfully News Disabled","success");	
			}

		}else{
			if($status==1){
				echo 2;
				echo $this->alert->pnotify("Error","Error Occured While Enabling News","error");
			}else{
				echo 3;
				echo $this->alert->pnotify("Error","Error Occured While Disabling News","error");
			}	
		}
		
}  		
	

public function insertAgent(){

	$data = $this->input->post();
	$u = $this->db->insert("tbl_vendors",$data);
	
	if($u){

		$this->alert->pnotify("success","Vendor Successfully Created","success");
		redirect("vendors/createVendor");

	}else{

		$this->alert->pnotify("error","Error Occured","error");
		redirect("vendors/createVendor");
	}
	
}

public function updateAgent(){

	$aid = $this->input->post("id",true);

	$data = $this->input->post();

	$this->db->set($data);
	$this->db->where("id",$aid);
	$u = $this->db->update("tbl_vendors");


	if($u){
		
		
			$this->alert->pnotify("success","Vendor Updated Successfully","success");
		
			redirect("vendors");
		
	}else{
			
			$this->alert->pnotify("error","Error Occured","error");
			redirect("vendors/updateVendor/".$aid);
	}
}


public function deleteUser($id){

	$du = $this->db->delete("tbl_vendors",array("id"=>$id));
	if($du){
		$this->alert->pnotify("success","Vendor Deleted Successfully","success");
			redirect("vendors");
		}else{
			
			$this->alert->pnotify("error","Error Occured","error");
			redirect("vendors");
		}
}


public function user_access(){

	$this->load->view("users/useraccess");
}
	
	
public function getAreas(){
		
		$id=$this->input->get("id",true);
		
		$d=$this->products_model->getProduct($id);
	
		echo '<option value="">Select Quantity</option>';
	
		foreach($qty->quantity as $q){
			
			echo '<option value="'.$q.'">'.$q.'</option>';
		}
		
}	

}