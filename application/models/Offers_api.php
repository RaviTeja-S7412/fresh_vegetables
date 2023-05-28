<?php

defined("BASEPATH") OR exit("No direct script access allow");


class Offers_api extends CI_Model{
	
	
	
	public function __construct(){
		
		parent::__construct();

		
	}
	
	
	public function check_value_offer_on_this_day($type,$dtype,$total,$uid){
	    
	     $chkOffext = $this->db->get_where("orders",array("user_id"=>$uid,"hasOffer"=>"Active","payment_status"=>"Success"))->num_rows();	
	    
	    if($chkOffext != 0){
	        
	        return array("status"=>false,"offer"=>[]);
	        
	    }
	    
	    $date = date("m/d/Y", strtotime("now"));
	    $query = $this->db->query("SELECT * FROM tbl_product_offers WHERE '$date' between from_date AND to_date AND offerType='$type' AND orderType='$dtype' and status='Active' order by cartValue DESC");
	    if($query->num_rows() > 0){
	        
	         if($query->num_rows() ==1){
                    $row  = $query->row_array();
                    $value =  $row['cartValue'];
                       
                    if($total >=$value){
                            $productid = $row['outputProduct'];
                             return array("status"=>true,"offer"=>$productid);
                           // return array("status"=>true,"offer"=>$this->get_product($productid));
                    }
	         }else{
	             
	             foreach($query->result_array() as $row2){
	                 
	                if($total >=$row2['cartValue']){
                            $productid = $row2['outputProduct'];
                            return array("status"=>true,"offer"=>$productid);
                            //return array("status"=>true,"offer"=>$this->get_product($productid));
                    }  
	             }
	         }
	    }else{
	        return array("status"=>false,"offer"=>"");
	    }
	   
	}
	
	    
	public function value_offer_notification($type,$total,$uid){
	    
	    
	    $chkOffext = $this->db->get_where("orders",array("user_id"=>$uid,"hasOffer"=>"Active","payment_status"=>"Success"))->num_rows();	
	    
	    if($chkOffext != 0){
	        
	        return array("status"=>false,"offer"=>[]);
	        
	    }
	    
	    $date = date("m/d/Y", strtotime("now"));
	    $query = $this->db->query("SELECT * FROM tbl_product_offers WHERE '$date' between from_date AND to_date AND offerType='$type' and orderType='deliveryonce' and  status='Active' order by cartValue DESC");
	    $squery = $this->db->query("SELECT * FROM tbl_product_offers WHERE '$date' between from_date AND to_date AND offerType='$type' and orderType='subscribe' and  status='Active' order by cartValue DESC");
	   // return $query->result();
	    $data=[];
	    $i=0;
	    if($query->num_rows() > 0 || $squery->num_rows() > 0){
	        
	         $row  = $query->row_array();
             $value =  $row['cartValue'];
	        
	       // return $total;
	       // if($query->num_rows() ==1){
                   
                       
        //             if($total >=$value){
        //                     $productid = $row['outputProduct'];
        //                     	$query1 = $this->db->where(array("id"=>$productid))->get("tbl_products")->row_array();
        //             	    	$data['Text'] ="One offer added to your cart". $query1['product_name'];
        //             	    	$data['type'] =$row['orderType'];
        //             			$data['product_image'] = $query1['product_image'];
        //             		    $data['product_banner'] = $query1['product_banner_image'];
		                      
        //                       return array("status"=>true,"offer"=>$data);
        //             }
	       //  else{
	             
	             foreach($query->result_array() as $row2){
	                 
	                if($total >=$row2['cartValue']){
                            $productid = $row2['outputProduct'];
                            	$query2 = $this->db->where(array("id"=>$productid))->get("tbl_products")->row_array();
                    	    	$data1['Text'] ="One offer added to your cart ". $query2['product_name'];
                    	    	$data1['type'] =$row2['orderType'];
                    			$data1['product_image'] = $query2['product_image'];
                    		    $data1['product_banner'] = $query2['product_banner_image'];
                    		    $data[$i] = $data1;
                    		    $i++;
                            // return array("status"=>true,"offer"=>$data);
                            //return array("status"=>true,"offer"=>$this->get_product($productid));
                        break;    
                    }  
    	         }
	       // }
	        
// subscribe

	       // if($squery->num_rows() ==1){
                    $row  = $squery->row_array();
                    $value =  $row['cartValue'];
                       
            //         if(($total*30) >=$value){
            //                 $productid = $row['outputProduct'];
            //                 	$query1 = $this->db->where(array("id"=>$productid))->get("tbl_products")->row_array();
            //         	    	$data['Text'] ="One offer added to your cart". $query1['product_name'];
            //         	    	$data['type'] =$row['orderType'];
            //         			$data['product_image'] = $query1['product_image'];
            //         		    $data['product_banner'] = $query1['product_banner_image'];
		
            //                 //  return array("status"=>true,"offer"=>$data);
            //         }
	           // else{
	             
	             foreach($squery->result_array() as $row2){
	                 
	                if(($total*30) >=$row2['cartValue']){
                            $productid = $row2['outputProduct'];
                            	$query2 = $this->db->where(array("id"=>$productid))->get("tbl_products")->row_array();
                    	    	$data1['Text'] ="One offer added to your cart ". $query2['product_name'];
                    	    	$data1['type'] =$row2['orderType'];
                    			$data1['product_image'] = $query2['product_image'];
                    		    $data1['product_banner'] = $query2['product_banner_image'];
                    		    $data[$i] = $data1;
                    		    $i++;
                            // return array("status"=>true,"offer"=>$data);
                            //return array("status"=>true,"offer"=>$this->get_product($productid));
                        break;    
                    }  
    	         }
	       // }
	        
	        
	         return array("status"=>true,"offer"=>$data);
	    } else{
	       return array("status"=>false,"offer"=>[]);  
	    } 
	}
	
	
	public function get_product($pid){
	    
		$query = $this->db->where(array("id"=>$pid))->get("tbl_products")->row_array();
		$data['product_name'] = $query['product_name'];
		$data['description'] = $query['description'];
		$data['product_image'] = $query['product_image'];
		$data['product_banner'] = $query['product_banner_image'];
		return $data;
	}

    
}