<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agents extends CI_Controller {
	
public function __construct(){
			
	parent::__construct();
	
	$this->secure->loginCheck();
	
}
	
	public function test(){
		
/*
		$this->load->dbforge();
		if ($this->dbforge->create_database('my_db'))
		{
			
		   $this->db->db_select("my_db");
		
		   $output = '';
		   $count = 0;
		   $file_data = file(base_url()."assets/db/vratha.sql");
		   foreach($file_data as $row)
		   {
			$start_character = substr(trim($row), 0, 2);
			if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
			{
			 $output = $output . $row;
			 $end_character = substr(trim($row), -1, 1);
			 if($end_character == ';')
			 {
			  if(!$this->db->query($output))
			  {
			   $count++;
			  }
			  $output = '';
			 }
			}
		   }	
			
		}
*/
		
	}

public function createAgent(){

	$this->load->view("agents/createAgent");

}

public function index(){

	$data["agents"] = $this->db->query("select * from fdm_va_auths where deleted=0 order by id desc")->result();
	$this->load->view("agents/allAgents",$data);
}

public function editAgent($id){

	$data["u"] = $this->db->get_where("fdm_va_auths",array("id"=>$id,"deleted"=>0))->row();
	$this->load->view("agents/editAgent",$data);
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

	$name = $this->input->post("agent_name",true);
	$aid = $this->input->post("agent_id",true);
	$email = $this->input->post("agent_email",true);
	$mobile = $this->input->post("mobile_number",true);
	$password = $this->input->post("password",true);
	$status = $this->input->post("status",true);
	$city = $this->input->post("city",true);
	$area = $this->input->post("area",true);
	$address = $this->input->post("address",true);
	$route = $this->input->post("route",true);
	$role = $this->input->post("role",true);
	
	$epass = $this->secure->encrypt($password);

	$chk = $this->db->get_where("fdm_va_auths",array("email"=>$email,"deleted"=>0))->num_rows();
	if($chk>=1){

			$this->alert->pnotify("error","Email Already Registered","error");
			redirect("agents/create-agent");
	}
	$chk1 = $this->db->get_where("fdm_va_auths",array("mobile_number"=>$mobile,"deleted"=>0))->num_rows();
	if($chk1>=1){

			
			$this->alert->pnotify("error","Mobile Number Already Registered","error");
			redirect("agents/create-agent");
	}
	
	$aChk = $this->db->get_where("fdm_va_auths",array("agent_id"=>$aid,"deleted"=>0))->num_rows();
	if($aChk>=1){

			
			$this->alert->pnotify("error","Agent ID Already Exists","error");
			redirect("agents/create-agent");
	}
	
	$db = "vratha_".$aid;
	
				$data = array(

				"agent_id" => $aid,	
				"name" => $name,
				"email" => $email,
				"role" => 2,
				"mobile_number" => $mobile,
				"password" => $epass,
				"status" => $status,
				"city" => $city,
				"area" => $area,
				"address" => $address,
				"registered_date" => date("Y-m-d H:i:s"),
				"client_database" => $db

			);

			$u = $this->db->insert("fdm_va_auths",$data);
			$uid = $this->db->insert_id();
	
			if($u){
		
				$this->load->dbforge();
				if ($this->dbforge->create_database("$db"))
				{

				   $this->db->db_select("$db");

				   $output = '';
				   $count = 0;
				   $file_data = file(base_url()."assets/db/vratha.sql");
				   foreach($file_data as $row)
				   {
					$start_character = substr(trim($row), 0, 2);
					if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
					{
					 $output = $output . $row;
					 $end_character = substr(trim($row), -1, 1);
					 if($end_character == ';')
					 {
					  if(!$this->db->query($output))
					  {
					   $count++;
					  }
					  $output = '';
					 }
					}
				   }
					
					$data = array("email"=>$email,"mobile"=>$mobile,"address"=>$address,"company_name"=>$name);
					$c = $this->db->insert("fdm_va_general_contact");

				}

				$this->db->db_select("vratha");
				
				$this->alert->pnotify("success","Agent Successfully Registered","success");
				redirect("agents/create-agent");

			}else{
					
					$this->alert->pnotify("error","Error Occured While Registering Agent","error");
					redirect("agents/create-agent");
			}
	
}

public function updateAgent(){

	$aid = $this->input->post("agent_id",true);
	$name = $this->input->post("agent_name",true);
	$email = $this->input->post("agent_email",true);
	$mobile = $this->input->post("mobile_number",true);
	$password = $this->input->post("password",true);
	$status = $this->input->post("status",true);
	$city = $this->input->post("city",true);
	$area = $this->input->post("area",true);
	$address = $this->input->post("address",true);
	$date = date("Y-m-d H:i:s");
	$id = $this->input->post("id",true);
	
	$route = $this->input->post("route",true);
	$role = $this->input->post("role",true);
	
	$agents = $this->input->post("agents",true);
	$salesemployees = $this->input->post("salesemployees",true);
	$tincharge = $this->input->post("tincharge",true);
	
	$epass = $this->secure->encrypt($password);

$echk = $this->db->get_where("fdm_va_auths",array("email"=>$email,"id"=>$id))->row()->email;

	if($echk==$email){

		$data = array("email" => $email);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");

	}else{
		$echk1 = $this->db->get_where("fdm_va_auths",array("email"=>$email,"deleted"=>0))->num_rows();	
		if($echk1>=1){
			$this->alert->pnotify("error","Email Already Registered","error");
			redirect("agents/update-agent/".$id);
		}else{	
		$data = array("email" => $email);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");
		}
	}
$mchk = $this->db->get_where("fdm_va_auths",array("mobile_number"=>$mobile,"id"=>$id))->row()->mobile_number;

	if($mchk==$mobile){

		$data = array("mobile_number" => $mobile);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");

	}else{
		$mchk1 = $this->db->get_where("fdm_va_auths",array("mobile_number"=>$mobile,"deleted"=>0))->num_rows();	
		if($mchk1>=1){
			$this->alert->pnotify("error","Mobile Number Already Registered","error");
			redirect("agents/update-agent/".$id);

		}else{	
		$data = array("mobile_number" => $mobile);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");
		}
	}

$achk = $this->db->get_where("fdm_va_auths",array("agent_id"=>$aid,"id"=>$id))->row()->agent_id;

	if($achk==$aid){

		$data = array("agent_id" => $aid);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");

	}else{
		$achk1 = $this->db->get_where("fdm_va_auths",array("agent_id"=>$aid,"deleted"=>0))->num_rows();	
		if($achk1>=1){
			$this->alert->pnotify("error","Agent ID Already Exists","error");
			redirect("agents/update-agent/".$id);

		}else{	
		$data = array("agent_id" => $aid);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("fdm_va_auths");
		}
	}	
	

	$data = array(
			"name" => $name,
			"password" => $epass,
			"status" => $status,
			"city" => $city,
			"area" => $area,
			"address" => $address,
			"role" => 2
	);

		 $this->db->set($data);
		 $this->db->where("id",$id);
	$u = $this->db->update("fdm_va_auths");


	if($u){
		
		
			$this->alert->pnotify("success","Agent Details Updated Successfully","success");
		
			redirect("agents/all-agents");
		
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Agent","error");
			redirect("agents/update-agent/".$id);
	}
}


public function deleteUser($id){

	$u = $this->db->get_where("fdm_va_auths",array("id"=>$id))->row();
	$data = array("deleted"=>1,"status"=>"Inactive");
	$this->db->set($data);
	$this->db->where("id",$id);
	$du = $this->db->update("fdm_va_auths");
	if($du){
		$this->alert->pnotify("success","User Details Deleted Successfully","success");
			redirect("users/all-users");
		}else{
			
			$this->alert->pnotify("error","Error Occured While Deleting User","error");
			redirect("users/all-users");
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