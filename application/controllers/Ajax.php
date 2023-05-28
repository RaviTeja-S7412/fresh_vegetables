<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

public function __construct(){
			
	parent::__construct();
		
	$this->secure->loginCheck();
}
	
public function getAreas(){
		
		$id=$this->input->get("id",true);
		
		$d=$this->db->get_where("tbl_areas",array("status"=>"Active","deleted"=>0,"city_id"=>$id))->result();
	
		echo '<option value="">Select Area</option>';
	
		foreach($d as $a){
			
			echo '<option value="'.$a->id.'">'.$a->area_name.'</option>';
		}
		
}
	
public function getProductquantity(){
		
		$id=$this->input->get("id",true);
		
		$d=$this->db->get_where("tbl_products",array("deleted"=>0,"id"=>$id))->row();
		
		$qty = json_decode($d->product_quantity);
	
		echo '<option value="">Select Variant</option>';
	
		foreach($qty->quantity as $q){
			
			echo '<option value="'.$q.'">'.$q.'</option>';
		}
		
}	

public function getProductprice(){
		
		$id=$this->input->get("pid",true);
		$variant=$this->input->get("variant",true);
		
		$d=$this->db->get_where("tbl_products",array("deleted"=>0,"id"=>$id))->row();
		
		$qty = json_decode($d->product_quantity);
	
//		echo '<option value="">Select Quantity</option>';
	
		foreach($qty->quantity as $k => $q){
			
			if($q == $variant){
				
				$price = $qty->lcp[$k];
				
			}
			
		}
		
		echo $price;
	
}	
	
	
public function getCategoryprice(){
	
	$pid = $this->input->post("pid");
	$cid = $this->input->post("cid");
				
	$pdate = date("m/d/Y");
						
	$pcat = $this->db->get_where("tbl_products",array("id"=>$pid,"status"=>"Active","deleted"=>0,"assigned_to"=>"agents"))->row()->product_quantity;
	
	$pm = $this->db->query("select * from tbl_price_management where product_id = '$pid' AND  '$pdate' BETWEEN  startdate AND enddate")->row();

	$extCat = json_decode($pcat);
	
	
	if($pm){
	
		$discPm = json_decode(isset($pm->price_management) ? $pm->price_management : "");

		$disType = isset($discPm->discount_type) ? $discPm->discount_type : "";

		$disQty = isset($discPm->quantity) ? $discPm->quantity : "";

		$disPrice = isset($discPm->price) ? $discPm->price : "";

		if(count($disQty) > 0){

			foreach($disQty as $key => $qty){

				if($cid == $qty){

					if($disPrice[$key] != ""){
					
						if($disType == "percent"){
							
							$pe = $disPrice[$key]/100*$extCat->price[$key];	
											
							$disp = $extCat->price[$key]-$pe;
							
			echo json_encode(array("dis_type"=>"percent","price"=>$disp,"percentage"=>$disPrice[$key],"extprice"=>$extCat->price[$key]));		
						
						}else{
							
							$disp = $disPrice[$key];
							
							$ddPrice = $extCat->price[$key] - $disp;
							echo json_encode(array("dis_type"=>"rs","price"=>$disp,"disPrice"=>$ddPrice,"extprice"=>$extCat->price[$key]));							
						}
					
					}else{
						
						
						$ep = $extCat->price[$key];
						echo json_encode(array("dis_type"=>"ext","price"=>$ep));	
						
					}
				}

			}
		}
	}else{
		
		foreach($extCat->quantity as $key => $qty){
		
		if($cid == $qty){
			
				$ep = $extCat->price[$key];
				echo json_encode(array("dis_type"=>"ext","price"=>$ep));	
			}
		}
		
	}
  }
	
	
	
}