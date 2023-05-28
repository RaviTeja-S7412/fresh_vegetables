<?php

defined("BASEPATH") OR exit("No direct script access allow");


class Admin extends CI_Model{
	
	
	
	public function __construct(){
		
		parent::__construct();
		
		
	}
	
	public function getDb(){
		
		$this->db->db_select("vratha");
		
	}
	
	public function getClientDB(){
		
		$db = $this->get_admin("client_database");
		$this->db->db_select("$db");
		
	}
	
	public function generatefsOrderId(){
		
		$result = $this->db->query('SELECT MAX(id) as Invoice from orders')->row(); 
		
		if(isset($result->Invoice)){
			
			$invoice = "ORDFS1930000".$result->Invoice;
			
		}else{
			
			$invoice = "ORDFS19300000";
			
		}
		
		
		return $invoice;
	}

		public function insertoption($option_name,$option_value){
		
		
		$on=$this->db->get_where("fdm_va_options",array('option_name'=>$option_name));
		
		$os=$on->num_rows();
		
		if($os=='0'){
			
			$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$oss=$this->db->insert("fdm_va_options",$data);
			
			
			
			
			
		}
		
		if($os='1'){
			
				$data=array("option_name"=>$option_name,
					   "option_value"=>$option_value);
			
			$oss=$this->db->set($data);
			
			$oss=$this->db->where("option_name",$option_name);
			
			$oss=$this->db->update("fdm_va_options");
			
			
			
		
		}		
		
		
		
		
	}
	
	
	public function get_option($option_name){
		
		
		$db = $this->get_admin("client_database");
		$this->db->db_select("$db");
		
		$option=$this->db->get_where("fdm_va_options",array("option_name"=>$option_name));
		$o=$option->row();
		if($o){
		
		return $o->option_value;	
		}else{
			$oo='0';
		return $oo;
		}
	}

	public function generatePoid(){
		
		
		$i='1';
		
		do{
			
			$id="PO".random_string("numeric",10);
			
			$chk=$this->db->get_where("tbl_purchase_orders",array('po_id'=>$id))->num_rows();
			
			if($chk>0){
				$i='1';
				
			}else{
				$i='10';
			}
			
			
		}while($i<5);
		
		return $id;
	}


	public function generateOtp(){
		
		
		$i='1';
		
		do{
			
			$id=random_string("numeric",8);
			
			$chk=$this->db->get_where("fdm_va_otp",array('otp'=>$id))->num_rows();
			
			if($chk>0){
				$i='1';
				
			}else{
				$i='10';
			}
			
			
		}while($i<5);
		
		return $id;
	}

	public function get_admin($value=""){

		$this->getDb();
		return $this->db->get_where("fdm_va_auths",array("id"=>$this->session->userdata("admin_id")))->row()->$value;


	}

	public function get_role(){
		return $this->db->get_where("fdm_va_roles")->result();
	}

	public function get_user($value=""){

		return $this->db->get_where("fdm_va_users",array("id"=>$this->session->userdata("user_id")))->row()->$value;
	}

	public function get_agent_role(){
		$rr = $this->db->get_where("fdm_va_auths",array("id"=>$this->session->userdata("admin_id"),"role"=>2))->row();
        return $rr;
	}

	public function get_admin_role(){

		return $this->db->get_where("fdm_va_auths",array("id"=>$this->session->userdata("admin_id"),"role"=>1))->row();
	}
	public function get_editor_role(){

		return $this->db->get_where("fdm_va_auths",array("id"=>$this->session->userdata("admin_id"),"role"=>3))->row();
	}

	public function get_module($id){
		$umr = $this->db->get_where("fdm_va_admin_role_access",array("user_id"=>$id))->result_array();
		//print_r($umr);
		$kk = array();
		foreach ($umr as $key) {
		$kk[] =  $key["module_id"];

		}
		return $kk;

	}

	public function getUrlmodule($uid,$mid){

		$mod = $this->db->get_where("fdm_va_admin_role_access",array("user_id"=>$uid,"module_id"=>$mid))->row();
		return $mod;

	}

	public function getheaderLogo(){
		$this->getClientDB();
		return $this->db->query("select * from fdm_va_general_logo where deleted=0 and logo_type='Header' order by id desc")->row()->logo;
	}

	public function getfooterLogo(){

		return $this->db->query("select * from fdm_va_general_logo where deleted=0 and logo_type='Footer' order by id desc")->row()->logo;
	}

	function seo_friendly_url($string){
	    $string = str_replace(array('[\', \']'), '', $string);
	    $string = preg_replace('/\[.*\]/U', '', $string);
	    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
	    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
	    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
	    return strtolower(trim($string, '-'));
	}
	
	
	public function info($column=""){
		
		return $this->db->get_where("fdm_va_general_contact")->row()->$column;
		
	}
	
			/*
	*Generate Order ID
	*
	*/
	public function generateOrderId(){
		
		$this->getClientDB();
		$result = $this->db->query('SELECT id from orders order by id desc')->row(); 
		
		if(isset($result->id)){
			
			$c = $result->id + 1;
			$invoice = "ORD2030000".$c;
			
		}else{
			
			$invoice = "ORD20300000";
			
		}
		
		return $invoice;
	
	}
	
	public function generateagentOrderId(){
			$i='1';
		
		do{
			
			$id="AO".random_string("numeric",8);
			
			$chk=$this->db->get_where("agent_orders",array('order_id'=>$id))->num_rows();
			
			if($chk>0){
				$i='1';
				
			}else{
				$i='10';
			}
			
			
		}while($i<5);
		
		return $id;
	}
	

	public function getNumberinwords($number){
$decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ?  ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' paise' : '';
    return ($Rupees ? $Rupees . 'rupees ' : '') . $paise;

		
	}
	
	function firebase_notification($tokens,$message){
	
		$url = "https://fcm.googleapis.com/fcm/send";
		$fields = array(

			"registration_ids" => $tokens,
			"data" => $message
		);

		$api_key = 'AIzaSyABEV50DH36ld7571iFcAeIubsmsDprsV4';
		
		$headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );


		$ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $url);
		   curl_setopt($ch, CURLOPT_POST, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		   $result = curl_exec($ch);           
		   if ($result === FALSE) {
			   die('Curl failed: ' . curl_error($ch));
		   }
		   curl_close($ch);
		   return $result;
	}

	function firebase_notification_subscribe($tokens,$message){
	
		$url = "https://fcm.googleapis.com/fcm/send";
		$fields = array(

			"to" => $tokens,
			"data" => $message
		);

		$api_key = 'AIzaSyABEV50DH36ld7571iFcAeIubsmsDprsV4';
		
		$headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );

		$ch = curl_init();
		   curl_setopt($ch, CURLOPT_URL, $url);
		   curl_setopt($ch, CURLOPT_POST, true);
		   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		   $result = curl_exec($ch);           
		   if ($result === FALSE) {
			   die('Curl failed: ' . curl_error($ch));
		   }
		   curl_close($ch);
		   return $result;
	}
	
	
	
}