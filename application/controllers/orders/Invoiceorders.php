<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoiceorders extends CI_Controller {

public function __construct(){
			
	parent::__construct();
	
    date_default_timezone_set('Asia/Kolkata');
 		
//	$this->secure->loginCheck();
}
	
	
public function index()
	{
		
		$this->load->view('orders/admin/invoiceOrders');
	}
	
	
public function generateInvoice($oid){
		
		$data["o"] = $this->db->get_where("orders",array("order_id"=>$oid,"payment_status"=>"Success"))->row();
		$this->load->view('orders/invoice',$data);		
		
	}	
	
	
public function allOrders(){
	
	$orders = $this->db->query("select order_id,user_id,shipping_address,delivery_status,order_type,order_status,date_of_order,deliveryShift,assigned_to,sub_start_date,sub_end_date,id,deliveryonce_date as deliverydate from orders where payment_status='Success' and order_status != 'Pending' order by id desc")->result();
		
	$fsorders = $this->db->query("select order_id,user_id,shipping_address,delivery_status,id,order_type,order_status,deliveryShift,assigned_to,delivery_date as deliverydate,order_date as date_of_order from tbl_free_sample_orders order by id desc")->result();
		
	$data = array_merge($orders,$fsorders);	
	
	$jsonData = array();
	
	$id = 1;
	
	foreach($data as $u){
		
	   $udata = $this->db->get_where("shreeja_users",array("userid"=>$u->user_id,"user_status"=>0))->row();
		
	   $ucity = $this->db->get_where("tbl_locations",array("id"=>$udata->user_location,"deleted"=>0,"status"=>1))->row()->location;
	   $uarea = $this->db->get_where("tbl_areas",array("id"=>$udata->user_area,"status"=>"Active","deleted"=>0))->row()->area_name;

	   $area = isset($uarea) ? $uarea : $udata->areanotlisted;
				
		
	   if($u->assigned_to != ""){

			$aname = $this->db->get_where("fdm_va_auths",array("role"=>2,"deleted"=>0,"id"=>$u->assigned_to))->row()->name; 

		}else{

			$aname = "Not Assigned";
		}	
		
		
	   if($u->order_type == "subscribe"){
		   
//		 $sdata = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$u->order_id,"pause_status"=>"Inactive"))->result();
//		   
//		 foreach($sdata as $sd){
			 

		    if($u->delivery_status == "Success"){
														
				$sstatus = '<span class="badge badge-success" style="color:white">Success</span>';
			}elseif($u->delivery_status == "Pending"){

				$sstatus = '<span class="badge badge-warning" style="color:white">Pending</span>';
			}else{
				$sstatus = $u->delivery_status;
			}
		   
		    if($u->order_status == "Success"){
														
				$ostatus = '<span class="badge badge-success" style="color:white">Success</span>';
			}elseif($u->order_status == "Pending"){
				$ostatus = '<span class="badge badge-warning" style="color:white">Pending</span>';
			}elseif($u->order_status == "Cancelled"){
				$ostatus = '<span class="badge badge-danger" style="color:white">Cancelled</span>';
			}else{
				$ostatus = $u->order_status;
			}

				$nData1 = array();
				$nData1["sno"] = $id;
				$nData1["Date"] = date("Y-m-d",strtotime($u->date_of_order));
				$nData1["Order_ID"] = $u->order_id;
				$nData1["Name"] = $udata->user_name;
				$nData1["Mobile"] =  $udata->user_mobile;
				$nData1["Address"] = nl2br($u->shipping_address);
				$nData1["cAddress"] = $udata->house_no."<br>".$udata->landmark."<br>".$udata->user_current_address."<br>".$area."<br>".$ucity;
				$nData1["Delivery_Date"] = date("d-M-Y",strtotime($u->sub_start_date))." <br> ".date("d-M-Y",strtotime($u->sub_end_date));
				$nData1["Type_of_Order"] =  $u->order_type;
				$nData1["shift"] =  $u->deliveryShift;
				$nData1["Assigned_To"] =  $aname;
				$nData1["Status"] = $sstatus;
				$nData1["oStatus"] = $ostatus;
				$nData1["action"] = '<a href='.base_url()."orders/consumer-orders/invoice/".$u->order_id.' class="btn btn-success btn-xs btn-rounded" target="_blank"><i class="fa fa-download"></i></a>
				<span><a href='.base_url()."orders/Invoiceorders/updateSubscribe/".$u->order_id.' class="btn btn-info btn-xs btn-rounded" target="_blank"><i class="fa fa-edit"></i></a></span>';
				$jsonData[] = $nData1;

				$id++;
			 
			 
//		 }  
		   
		   
	   }else{
		    
		
		    if($u->delivery_status == "Success"){
														
				$status = '<span class="badge badge-success" style="color:white">Success</span>';
			}elseif($u->delivery_status == "Pending"){

				$status = '<span class="badge badge-warning" style="color:white">Pending</span>';
			}else{
				$status = $u->delivery_status;
			}
		   
		   if($u->order_status == "Success"){
														
				$ostatus = '<span class="badge badge-success" style="color:white">Success</span>';
			}elseif($u->order_status == "Pending"){
				$ostatus = '<span class="badge badge-warning" style="color:white">Pending</span>';
			}elseif($u->order_status == "Cancelled"){
				$ostatus = '<span class="badge badge-danger" style="color:white">Cancelled</span>';
			}else{
				$ostatus = $u->order_status;
			}
		   
		    $cancel = ($u->order_status == "Cancelled") ? "" : '<a href='.base_url()."orders/Invoiceorders/cancelOrder/".$u->order_id.' class="btn btn-danger btn-xs btn-rounded" onclick="return confirm('."'Are you sure want to cancel the order'".')"><i class="fa fa-times"></i></a>';
		   
		    $updateStatus = ($u->order_status == "Cancelled") ? "" : '<a href="javascrip:void(0)" class="btn btn-info btn-xs btn-rounded getOid" orderType="'.$u->order_type.'" id="'.$u->order_id.'"><i class="fa fa-edit"></i></a>';
		   
			$nData = array();
			$nData["sno"] = $id;
			$nData["Date"] = date("Y-m-d",strtotime($u->date_of_order));
			$nData["Order_ID"] = $u->order_id;
			$nData["Name"] = $udata->user_name;
			$nData["Mobile"] =  $udata->user_mobile;
			$nData["Address"] = nl2br($u->shipping_address);
			$nData["cAddress"] = $udata->house_no."<br>".$udata->landmark."<br>".$udata->user_current_address."<br>".$area."<br>".$ucity;
			$nData["Delivery_Date"] = date("Y-m-d",strtotime($u->deliverydate));
			$nData["Type_of_Order"] =  $u->order_type;
			$nData["shift"] =  $u->deliveryShift;
			$nData["Assigned_To"] =  $aname;
			$nData["Status"] = $status;
			$nData["oStatus"] = $ostatus;
			$nData["action"] = '<a href='.base_url()."orders/consumer-orders/invoice/".$u->order_id.' class="btn btn-success btn-xs btn-rounded" target="_blank"><i class="fa fa-download"></i></a>'.$updateStatus.$cancel;
			$jsonData[] = $nData;

			$id++;
	}}
	
	
//	echo '<pre>';
//	
//	print_r($jsonData);
//	
//	echo '</pre>';
		
	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $jsonData ];
	echo json_encode($results);
	
}	
	
	
public function cancelOrder($id){
	
	$cdate = $this->input->post("cDate");
	$odata = $this->db->get_where("orders",array("order_id"=>$id))->row();	
	
	if($odata){
	
		if($cdate != ""){

			$cadate = $cdate;

		}else{

			$cadate = date("d-m-Y H:i:s");

		}


		$data = array("order_status"=>"Cancelled","cancelledDate"=>$cadate);

		$this->db->set($data);
		$this->db->where("order_id",$id);
		$c = $this->db->update("orders");

		if($c){


			if($odata->order_type == "subscribe"){

				 $begin = new DateTime( $cadate );
				 $end   = new DateTime( $odata->sub_end_date );

					for($i = $begin; $i <= $end; $i->modify('+1 day')){

						$ddate = $i->format("Y-m-d");

						$this->db->where(array("order_id"=>$id,"delivery_date"=>$ddate))->update("tbl_subscribed_deliveries",array("deliver_status"=>"Cancelled"));

					}

			 }
			
			$nudata = $this->db->get_where("shreeja_users",array("userid"=>$odata->user_id))->row();
			
			
					$nmsg = "Dear $nudata->user_name your order id:$id of order has been cancelled.";
					
					$udata = array(

						"user_id" => $odata->user_id,
						"message" => $nmsg,
						"title" => "Order Cancelled",
//						"imageUrl" => base_url().$u->image,

					);

					$this->db->insert("tbl_user_notifications",$udata);
					
					
					
					$nmessage = array(
						"title" =>"Order Cancelled",
						"message" => $nmsg,
						"redirect_to" => "order_placed",
					);
					
					$this->admin->firebase_notification_subscribe($nudata->firebase_token,$nmessage);

			$this->alert->pnotify("success","Order cancelled successfully","success");
			redirect("orders/invoice-orders");

		}else{

			$this->alert->pnotify("error","Error occured please try again","error");
			redirect("orders/invoice-orders");
		}

	}else{
		
		$cadate = date("d-m-Y H:i:s");

		$data = array("order_status"=>"Cancelled","cancelledDate"=>$cadate);

		$this->db->set($data);
		$this->db->where("order_id",$id);
		$c = $this->db->update("tbl_free_sample_orders");

		if($c){

				$fsuid = $this->db->get_where("tbl_free_sample_orders",array("order_id"=>$id))->row()->user_id;	
				$nudata = $this->db->get_where("shreeja_users",array("userid"=>$fsuid))->row();
			
				$nmsg = "Dear $nudata->user_name your order id:$id of order has been cancelled.";
					
				$udata = array(

					"user_id" => $fsuid,
					"message" => $nmsg,
					"title" => "Order Cancelled",
//						"imageUrl" => base_url().$u->image,

				);

				$this->db->insert("tbl_user_notifications",$udata);



				$nmessage = array(
					"title" =>"Order Cancelled",
					"message" => $nmsg,
					"redirect_to" => "order_placed",
				);

				$this->admin->firebase_notification_subscribe($nudata->firebase_token,$nmessage);
			
			$this->alert->pnotify("success","Order cancelled successfully","success");
			redirect("orders/invoice-orders");

		}else{

			$this->alert->pnotify("error","Error occured please try again","error");
			redirect("orders/invoice-orders");
			
		}

		
	}
	
}
	
	
public function updateSubscribe($id){
	
	$data["doo"] = $this->db->query("select * from orders where payment_status='Success' and order_type='subscribe' and order_id = '$id' order by id desc")->row();
	$data["soo"] = $this->db->query("select * from tbl_subscribed_deliveries where order_id='$id' order by delivery_date asc")->result();
	$this->load->view('orders/admin/viewSubscribedorders',$data);
	
}
	
	

public function pauseSubscribtion(){
	
	$oid = $this->input->post("oid");
	$id = $this->input->post("id");
	$status = $this->input->post("status",true);
	$uid = $this->db->get_where("orders",array("order_id"=>$oid))->row()->user_id;

	
	$data=array('pause_status'=>$status,"deliver_status"=>"Pending");
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_subscribed_deliveries");
		
		if($d){
			
		$ords = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$oid,"user_id"=>$uid))->result();
			
			
			if($status=="Active"){
				
				$edate = end($ords)->delivery_date;
				$edate = strtotime($edate);
				$date = strtotime("+1 day", $edate);
				
				$endDate = date('Y-m-d', $date);

				$data = array("delivery_date"=>$endDate,"order_id"=>$oid,"user_id"=>$uid);

				$d = $this->db->insert("tbl_subscribed_deliveries",$data);
				
				if($d){
					
					$data = array("sub_end_date"=>$endDate);
					
					$this->db->set($data);
					$this->db->where("order_id",$oid);
					$this->db->update("orders");
					echo 1;
					
				}
				
			}else{
				
				
				$edate = end($ords)->delivery_date;
				$d = $this->db->delete("tbl_subscribed_deliveries",array("order_id"=>$oid,"user_id"=>$uid,"delivery_date"=>$edate));
				
				if($d){
					
					$upords = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$oid,"user_id"=>$uid))->result();
					
					$update = end($upords)->delivery_date;

					$data = array("sub_end_date"=>$update);
					
					$this->db->set($data);
					$this->db->where("order_id",$oid);
					$this->db->update("orders");
					
					echo 0;
				
				}
				
			}

		}else{
			if($status=="Active"){
				echo $this->alert->pnotify("Error","Error Occured While Enabling Navbar Menu","error");
			}else{
				echo $this->alert->pnotify("Error","Error Occured While Disabling Navbar Menu","error");
			}	
		}
	
	$data = array(
	
	
	);
	
	
}	
	
public function refundAmount(){
	
	$data["doo"] = $this->db->query("select * from orders where order_status='Cancelled' and payment_status='Success'")->result();
	$this->load->view('orders/admin/refundAmount',$data);
	
}	

public function filterRefundamount(){
	
	$sdate = $this->input->post("sdate");
	$edate = $this->input->post("edate");
	
	$orders = $this->db->query("select * from orders where order_status='Cancelled' and payment_status='Success'")->result();
	
	$id = 1;
	
	foreach($orders as $u){
		
   	  if(strtotime(date("Y-m-d",strtotime($u->cancelledDate))) >= strtotime($sdate) && (strtotime(date("Y-m-d",strtotime($u->cancelledDate))) <= strtotime($edate))){			
		
		
	   $udata = $this->db->get_where("shreeja_users",array("userid"=>$u->user_id,"user_status"=>0))->row();	
		
	   if($u->order_type == "subscribe"){
	   
	   	   $totalCount = 30;
						   
		   $subdelOrders = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$u->order_id,"deliver_status !="=>"Cancelled","pause_status"=>'Inactive'))->num_rows();
		   
//		   $subdelOrders = $this->db->query("select * from tbl_subscribed_deliveries where (order_id='$u->order_id' and deliver_status='Success') or (order_id='$u->order_id' and pause_status='Active')")->num_rows();

		   $subTotalamount = $u->total_amount;

		   $rAmount = $subTotalamount/$totalCount * $subdelOrders;

		   $refundAmount = $subTotalamount - $rAmount;

	   
	   }else{
		   
		   $refundAmount = $u->total_amount;
		   
	   }
		   
		   		$nData1 = array();
				$nData1["sno"] = $id;
				$nData1["user_name"] = $udata->user_name;
				$nData1["user_mobile"] = $udata->user_mobile;
				$nData1["order_type"] = $u->order_type;
				$nData1["shipping_address"] = nl2br($u->shipping_address);
				$nData1["order_id"] =  $u->order_id;
				$nData1["invoice_number"] = $u->invoice_number;
				$nData1["cancelledDate"] = date("d-m-Y",strtotime($u->cancelledDate));
				$nData1["total_amount"] = "&#8377; ".$u->total_amount;
				$nData1["refundAmount"] = "&#8377; ".$refundAmount;
				$jsonData[] = $nData1;
			   
			  $id++; 
		   }
	
	
	}
	
	
//	echo '<pre>';
//	
//	print_r($jsonData);
//	
//	echo '</pre>';
		
	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $jsonData ];
	echo json_encode($results);
	
}
	
public function updateDeliverystatus(){

	$aid = $this->session->userdata("admin_id");
	$oid = $this->input->post("oid");	
	$dstatus = $this->input->post("deliveryStatus");
	$oType = $this->input->post("orderType");
	

	$data = array("delivery_status"=>$dstatus);
	
	if($oType == "deliveryonce"){

		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$u = $this->db->update("orders");
	
	}elseif($oType == "freesample"){
		
		$this->db->set($data);
		$this->db->where("order_id",$oid);
		$u = $this->db->update("tbl_free_sample_orders");
		
	}
	
	if($u){

			$this->alert->pnotify("success","Delivery status updated successfully.","success");
			redirect("orders/invoice-orders");
	}else{

			$this->alert->pnotify("error","Error Occured please try again.","error");
			redirect("orders/invoice-orders");
	}
	
}	

public function updatesubDeliverystatus(){

	$aid = $this->session->userdata("admin_id");
	$oid = $this->input->post("oid");	
	$dstatus = $this->input->post("deliveryStatus");
	$orderDate = $this->input->post("orderDate");
	

	$data = array("deliver_status"=>$dstatus);
	

		$this->db->set($data);
		$this->db->where(array("order_id"=>$oid,"delivery_date"=>$orderDate));
		$u = $this->db->update("tbl_subscribed_deliveries");
	
	
	if($u){

			$this->alert->pnotify("success","Delivery status updated successfully.","success");
			redirect("orders/Invoiceorders/updateSubscribe/".$oid);
	}else{

			$this->alert->pnotify("error","Error Occured please try again.","error");
			redirect("orders/Invoiceorders/updateSubscribe/".$oid);
	}
	
}	
	
}


