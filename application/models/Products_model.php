<?php

defined("BASEPATH") OR exit("No direct script access allow");


class Products_model extends CI_Model{

	public function allProducts(){
		
		$this->admin->getDb();
		return $this->db->query("select * from tbl_products where deleted=0 order by id desc")->result();
		
	}
	
	public function allConsumerproducts(){
		
		$this->admin->getDb();
		return 	$this->db->query("select * from tbl_products where deleted=0 and assigned_to='consumers' order by id desc")->result();
		
	}
	
	public function getProduct($id){
		
		$this->admin->getDb();
		return $this->db->get_where("tbl_products",array("deleted"=>0,"id"=>$id))->row();
		
	}
	
	public function productDiscountprice($pid){
		
		$this->admin->getDb();
		$pdate = date("m/d/Y");
		
		$products = $this->db->get_where("tbl_products",array("status"=>"Active","deleted"=>0,"id"=>$pid,"assigned_to"=>"agents"))->row();
		
		$cat = json_decode($products->product_quantity);	
							
		$pm = $this->db->query("select * from tbl_price_management where product_id = '$pid' AND  '$pdate' BETWEEN  startdate AND enddate and deleted=0 and status='Active'")->row();
							
		$discPm = json_decode(isset($pm->price_management) ? $pm->price_management : "");
						
		$disType = isset($discPm->discount_type) ? $discPm->discount_type : "";
						
		$disPrice = isset($discPm->price) ? $discPm->price : "";
		
		if($pm){
								
			if(count($disPrice) >= 1){
									
				if($disPrice[0] != ""){
										
					 	if($disType == "percent"){
											
								$pe = $disPrice[0]/100*$cat->price[0];	
											
								$data = $cat->price[0]-$pe;
		
						}else{
											
							$data = $disPrice[0];
						
						}
						
				}else{
						
					$data = $cat->price[0];
								  
				}			
									
			}else{
						
				$data = $cat->price[0];
								  
			}
			
		}else{
								
			$data = $cat->price[0];
		
		}
		
		return($data);
		
	}
	
	public function updateproductStock($uid){
		
		$cartdata = $this->db->where("userid",$uid)->get("tbl_cart")->result();
		
		$poid = $this->admin->generatePoid();
		
		if(count($cartdata) > 0){
			
			$exCat = [];
			foreach($cartdata as $exc){
				
				$exCat[] = $exc->product_cat;
				
			}
			
			
			foreach($cartdata as $c){
				
				$pdata = $this->db->get_where("tbl_products",array("id"=>$c->product_id))->row();
				
				$pcategories = json_decode($pdata->product_quantity);
				
				$quantity = [];
				$price = [];
				$sp = [];
				$lcp = [];
				$pis = [];
				
				foreach($pcategories->quantity as $key => $pcat){
					
					if($pcat == $c->product_cat){
						
						$pqty = $pcategories->pis[$key] - $c->qty;
						
						
						$quantity[] = $pcat;
						$price[] = $pcategories->price[$key];
						$sp[] = $pcategories->sp[$key];
						$lcp[] = $pcategories->lcp[$key];
						$pis[] = $pqty;
						
						if($pqty <= $pdata->msl){
							
				// raise purchase order
							
							$podata = array("po_id"=>$poid,"vendor_id"=>$pdata->vendor,"status"=>"Draft","placedDate"=>date("Y-m-d"));
							
							$poChk = $this->db->get_where("tbl_purchase_orders",array("vendor_id"=>$pdata->vendor,"status"=>"Draft"));
							
				// Existing purchase order
							
							
							if($poChk->num_rows() == 1){
								
								$ppData = $poChk->row();

								$popdata = array("po_id"=>$ppData->po_id,"product_id"=>$c->product_id,"product_name"=>$pdata->product_name,"product_category"=>$c->product_cat);

								
								$popChk = $this->db->get_where("tbl_purchase_order_products",$popdata)->num_rows();
								
								if($popChk == 1){
									
								}else{
									
									$popdata["qty"] = $pdata->msl;
									$popdata["previous_price"] = $pcategories->lcp[$key];
									$popdata["ask_price"] = $pcategories->lcp[$key];
									
									$this->db->insert("tbl_purchase_order_products",$popdata);
									
								}
							
				// newly add po				
								
							}else{
								
								$po = $this->db->insert("tbl_purchase_orders",$podata);
								
								if($po){
									
									$popdata = array("po_id"=>$poid,"product_id"=>$c->product_id,"product_name"=>$pdata->product_name,"product_category"=>$c->product_cat);
									
									$popdata["qty"] = $pdata->msl;
									$popdata["previous_price"] = $pcategories->lcp[$key];
									$popdata["ask_price"] = $pcategories->lcp[$key];
									
									$this->db->insert("tbl_purchase_order_products",$popdata);
									
								}
								
							}
							
						}
					}else{
						
						$quantity[] = $pcat;
						$price[] = $pcategories->price[$key];
						$sp[] = $pcategories->sp[$key];
						$lcp[] = $pcategories->lcp[$key];
						$pis[] = $pcategories->pis[$key];

					}
					
				}

				$pquantity = array("quantity"=>$quantity,"price"=>$price,"sp"=>$sp,"lcp"=>$lcp,"pis"=>$pis);
				
				$this->db->where("id",$c->product_id)->update("tbl_products",array("product_quantity"=>json_encode($pquantity)));
				
				
			}
			
		}
		
	}
	
}