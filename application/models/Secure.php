<?php
defined("BASEPATH") OR exit("NO direct script access allow");


class Secure extends CI_Model{
	
	
	
	public function __construct(){
		
		
		
		parent::__construct();
		
	
		
	}
	
	
	public function encrypt($data){
		
			$key="bjvd!@#$%^&*13248*/-/*vjvdf";
			$hmac_key = "kbdkh2365765243";

	
		$e = $this->encryption->initialize(
        array(
                'cipher' => 'blowfish',
                'mode' => 'cbc',
                'key' => $key,
                'hmac_digest' => 'sha256',
				'hmac_key' => $hmac_key
        )
		);
		
		$s=$this->encryption->encrypt($data);	
		
		
		if($s){
		
			return $s;		
			
		}else{
			
			return false;		
		
		}
	}
	
	
	public function encryptWithKey($data,$key){
		
		$this->encryption->initialize(
        array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => $key
        )
		);
		
		$s=$this->encryption->encrypt($data);	
		
		
		if($s){
		
		return $s;		
			
		}else{
			
		return false;		
		
		}
	}
	
	public function decrypt($data){
		
			$key="bjvd!@#$%^&*13248*/-/*vjvdf";
			$hmac_key = "kbdkh2365765243";

		$d =$this->encryption->initialize(
        array(
                'cipher' => 'blowfish',
                'mode' => 'cdc',
                'key' => $key,
                'hmac_digest' => 'sha256',
				'hmac_key' => $hmac_key
        )
);
		$s=$this->encryption->decrypt($data);	
		if($s){
		
			return $s;		
			
		}else{
			
			return false;		
		
		}
	}
	
	
	public function loginCheck(){
		
		$id = $this->session->userdata("admin_id");

		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";		
		$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$route = str_replace(base_url(),"",$url);			
			
		if($id){
			
			$this->admin->getDb();
			$db = $this->db->get_where("fdm_va_auths",["id"=>$id])->row()->client_database;
			$this->db->db_select("$db");
			
		}else{
			
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Login To Access Admin</div>';	
			$this->session->set_flashdata("fmsg",$msg);
			redirect("login");

			
		}
		
		
	}
	
	
}