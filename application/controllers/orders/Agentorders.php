<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agentorders extends CI_Controller {
	
public function __construct(){
			
	parent::__construct();
	
	$this->secure->loginCheck();
	
}

public function myOrders(){


	$aid = $this->session->userdata("admin_id");
	$data["orders"] = $this->db->query("select * from agent_orders where deleted=0 order by id desc")->result();
	$this->load->view("orders/agentOrders/myOrders",$data);

}

public function depositOrders(){


	$aid = $this->session->userdata("admin_id");
	$data["orders"] = $this->db->query("select * from agent_orders where deleted=0 order by id desc")->result();
	$this->load->view("orders/agentOrders/depositOrders",$data);

}	
	
public function deletedOrders(){


	$aid = $this->session->userdata("admin_id");
	$data["orders"] = $this->db->query("select * from agent_orders where deleted=1 order by id desc")->result();
	$this->load->view("orders/agentOrders/deletedOrders",$data);

}	

public function updateHistory(){


	$aid = $this->session->userdata("admin_id");
	$data["orders"] = $this->db->query("select * from agent_order_update_history order by id desc")->result();
	$this->load->view("orders/agentOrders/updateHistory",$data);

}	
	
public function index(){

	$data["u"] = "";
	$this->load->view("orders/agentOrders/products");
}

public function updateOrder($oid){
	
	$data["u"] = $this->db->get_where("agent_orders",array("order_id"=>$oid))->row();
	$this->load->view("orders/agentOrders/products",$data);
}

public function filterOrders(){
	
	$sdate = $this->input->post("sdate");
	$edate = $this->input->post("edate");
	
	
	
	$data = $this->db->query("SELECT * FROM agent_orders where deleted=0 ORDER by id DESC")->result();
	
	$jsonData = array();
	
	$id = 1;
	
	foreach($data as $u){
		
	if(strtotime($u->delivery_date) >= strtotime($sdate) && (strtotime($u->delivery_date) <= strtotime($edate))){	
		
		$products = json_decode($u->product_id);	    	
		$aData = $this->db->get_where("fdm_va_auths",array("id"=>$u->agent_id))->row();
		
//		$product = [];
		
		foreach($products as $p){

			$product = $this->db->get_where("tbl_products",array("id"=>$p->productId,"deleted"=>0))->row()->product_id."<br>"; 

//		}
		
//		$category = [];
//		
//		foreach($products as $p){
//
			$category = $this->db->get_where("tbl_products",array("id"=>$p->productId,"deleted"=>0))->row()->product_name."<br>"; 
//
//		}
//		
//		$productQty = [];
//		
//		foreach($products as $qty){
//								
			$productQty = $p->productQty."<br>";
//
//		}
//		
//		$qtyType = [];
//		
//		foreach($products as $qty){
//								
			$qtyType = $p->qtyType."<br>";
//
//		}
		
		$nData = array();
		$nData["sno"] = $id;
		$nData["mobile_number"] = $aData->agent_id;
		$nData["name"] = $aData->name;
		$nData["product_id"] = $product;
		$nData["category"] =  $category;
		$nData["delivery_date"] = date("d.m.Y",strtotime($u->delivery_date));
		$nData["order_delivery_time"] = $u->order_delivery_time;
		$nData["productQty"] =  $productQty;
		$nData["qtyType"] =  $qtyType;
//		$nData["actions"] = '<a href="'.base_url().'orders/agent-order/updateOrder/'.$u->order_id.'" class="text-inverse p-r-10"><i class="fas fa-edit" style="color: black"></i></a>
//							<a href="'.base_url().'orders/agent-order/delOrder/'.$u->order_id.'" class="text-inverse p-r-10" onClick="return confirm("Are you sure want to cancel this order")"><i class="fas fa-trash" style="color: black"></i></a>';
		$jsonData[] = $nData;
		
		$id++;
	}
	}
	}
	
	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $jsonData ];
	echo json_encode($results);
	
}	
	

public function filterdepositOrders(){
	
	$sdate = $this->input->post("sdate");
	$edate = $this->input->post("edate");
	
	
	
	$data = $this->db->query("SELECT * FROM agent_orders where deleted=0 ORDER by id DESC")->result();
	
	$jsonData = array();
	
	$id = 1;
	
	foreach($data as $u){
		
	if(strtotime($u->delivery_date) >= strtotime($sdate) && (strtotime($u->delivery_date) <= strtotime($edate))){	
		
		$products = json_decode($u->product_id);	    	
		$aData = $this->db->get_where("fdm_va_auths",array("id"=>$u->agent_id))->row();
		
		
		$nData = array();
		$nData["sno"] = $id;
		$nData["mobile_number"] = $aData->agent_id;
		$nData["name"] = $aData->name;
		$nData["transaction_date"] = date("d.m.Y",strtotime($u->transaction_date));
		$nData["bank_name"] = $u->bank_name;
		$nData["transaction_number"] = $u->transaction_number;
		$nData["amount"] = $u->amount;
		$jsonData[] = $nData;
		
		$id++;
	}
	}
	
	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $jsonData ];
	echo json_encode($results);
	
}	
	
	
	
public function insertOrder(){

	$uid = $this->session->userdata("admin_id");
	$aid = $this->input->post("aid");
	$pid = $this->input->post("product_id",true);
	$oid = $this->admin->generateagentOrderId();
//	$price = $this->input->post("price",true);
	$category = $this->input->post("category",true);
	$deliveryDate = $this->input->post("deliveryDate",true);
	$deliveryTime = $this->input->post("deliveryTime",true);
	$txnAmount = $this->input->post("txnAmount",true);
	$txnID = $this->input->post("txnID",true);
	$txnDate = $this->input->post("txnDate",true);
	$bankname = $this->input->post("bank_name",true);
	$qty = $this->input->post("quantity",true);
	$qtyType = $this->input->post("qtyType",true);
	
	if(array_sum($qty) == 0){
		
		$this->alert->pnotify("error","Please enter quantity","error");
		redirect("orders/place-orders");
		
	}
	

//			$msg = '<html>
//			<head>
//
//			</head>
//			<body>
//			<table style="width:100%;border:3px solid #363636;border-bottom:0px;">
//				<tr style="background-color: #002F47;">
//					<td>
//					<center><img src="'.base_url().'assets/images/logo.jpg" width="40%"/></center>
//					</td>
//				</tr>
//				
//			
//			</table>
//			<br>
//			<table style="width:100%;border:3px solid #363636;border-top:0px;">
//			<thead>
//			 <tr>
//				<th>Emp ID</th>
//				<th>Username</th>
//				<th>Password</th>
//			 </tr>	
//			</thead>
//			<tbody>
//				<tr style="background-color: #D4D4D4">
//				 <td style="text-align:center">'.$eid.'</td>
//				 <td style="text-align:center">'.$email.'</td>
//				 <td style="text-align:center">'.$password.'</td>
//				</tr>
//			</tbody>
//			</table>
//			
//				
//				
//			
//			</body>
//			</html>';
	
	
	$config["upload_path"] = 'uploads/agentPayments/';
    $config["allowed_types"] = '*';
//	$config["encrypt_name"] = TRUE;   
   	$this->load->library('upload', $config);
	
		if($this->upload->do_upload('files')){

			$data1 = $this->upload->data();
			$paySlip = "uploads/agentPayments/".$data1["file_name"];

		}else{
			
			$paySlip = "";
			
		}
	
//	$quantity = array();
//	$product_id = array();
//	$cat = array();
//	
//	foreach($qty as $key => $val){
//		
//		if($val != 0){
//			
//			$quantity[] = $val;
//			$product_id[] =	$pid[$key];
//			$cat[] = $category[$key];
//			
//		}
//		
//		
//	}
	
	
	$data2 = array();
	
	for($i=0;$i<sizeof($pid);$i++) {
		
		
		if($qty[$i] != 0){
		
			$data2[$i] = array ('productId' => $pid[$i], 'category' => $category[$i], 'productQty' =>$qty[$i], 'qtyType' => $qtyType[$i]);
			
		}
	}
	
	
	
				
	$data = array(

			"order_id" => $oid,	
			"product_id" => json_encode($data2),
//			"category" => json_encode($cat),
//			"price" => $price,
			"bank_name" => $bankname,
			"delivery_date" => $deliveryDate,
			"agent_id" => $aid,
			"order_delivery_time" => $deliveryTime,
			"amount" => $txnAmount,
			"transaction_number" => $txnID,
			"transaction_document" => $paySlip,
			"transaction_date" => $txnDate,
			"created_by" => $uid

		);


	$u = $this->db->insert("agent_orders",$data);

	if($u){


//			$from = new SendGrid\Email("Freedom Bank", "info@freedombankva.com");
//			$subject = "Enquiry : Freedom Bank Admin Login Details";
//			$to = new SendGrid\Email("FBANK",$email);
//
//			$content = new SendGrid\Content("text/html",$msg);
//			$mail = new SendGrid\Mail($from, $subject, $to, $content);
//			$sg = new \SendGrid('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');
//			$response = $sg->client->mail()->send()->post($mail);	


		$this->alert->pnotify("success","Order Successfully Placed","success");
		redirect("orders/place-orders");

	}else{

			$this->alert->pnotify("error","Error Occured While placing order","error");
			redirect("orders/place-orders");
	}
}

public function editOrder(){

	$aid = $this->input->post("aid");
	$uid = $this->session->userdata("admin_id");
	$pid = $this->input->post("product_id",true);
	$oid = $this->input->post("order_id",true);
//	$price = $this->input->post("price",true);
	$deliveryDate = $this->input->post("deliveryDate",true);
	$deliveryTime = $this->input->post("deliveryTime",true);
	$txnAmount = $this->input->post("txnAmount",true);
	$txnID = $this->input->post("txnID",true);
	$bankname = $this->input->post("bank_name",true);
	$txnDate = $this->input->post("txnDate",true);
	$category = $this->input->post("category",true);
	$qty = $this->input->post("qty",true);
	$qtyType = $this->input->post("qtyType",true);
	
	

	$odata = $this->db->get_where("agent_orders",array("order_id"=>$oid,"deleted"=>0))->row();
	
//			$msg = '<html>
//			<head>
//
//			</head>
//			<body>
//			<table style="width:100%;border:3px solid #363636;border-bottom:0px;">
//				<tr style="background-color: #002F47;">
//					<td>
//					<center><img src="'.base_url().'assets/images/logo.jpg" width="40%"/></center>
//					</td>
//				</tr>
//				
//			
//			</table>
//			<br>
//			<table style="width:100%;border:3px solid #363636;border-top:0px;">
//			<thead>
//			 <tr>
//				<th>Emp ID</th>
//				<th>Username</th>
//				<th>Password</th>
//			 </tr>	
//			</thead>
//			<tbody>
//				<tr style="background-color: #D4D4D4">
//				 <td style="text-align:center">'.$eid.'</td>
//				 <td style="text-align:center">'.$email.'</td>
//				 <td style="text-align:center">'.$password.'</td>
//				</tr>
//			</tbody>
//			</table>
//			
//				
//				
//			
//			</body>
//			</html>';
	
	
  if($_FILES["files"]["name"] != '')
  {	
	$config["upload_path"] = 'uploads/agentPayments/';
    $config["allowed_types"] = '*';
//	$config["encrypt_name"] = TRUE;   
   	$this->load->library('upload', $config);
//	$this->upload->initialize($config);
   
	$this->upload->do_upload('files');

	$data1 = $this->upload->data();
	$paySlip = "uploads/agentPayments/".$data1["file_name"];
	  
	
   }else{

		$paySlip = $odata->transaction_document;

   }
	
	
	
	
	$data2 = array();
	
	
	for($i=0;$i<sizeof($pid);$i++) {
		
		
		if($qty[$i] != 0){
		
			$data2[$i] = array ('productId' => $pid[$i], 'category' => $category[$i], 'productQty' =>$qty[$i], 'qtyType' => $qtyType[$i]);			
		}
	}
	
	$data = array(

		"agent_id" => $aid,
		"product_id" => json_encode($data2),
//		"category" => $category,
//					"price" => $price,
		"bank_name" => $bankname,
		"delivery_date" => $deliveryDate,
		"order_delivery_time" => $deliveryTime,
		"amount" => $txnAmount,
		"transaction_number" => $txnID,
		"transaction_document" => $paySlip,
		"transaction_date" => $txnDate,
		"updated_by" => $uid

	);
	
			$this->db->set($data);
			$this->db->where("order_id",$oid);
			$u = $this->db->update("agent_orders");

			if($u){
		
//				
//			$from = new SendGrid\Email("Freedom Bank", "info@freedombankva.com");
//			$subject = "Enquiry : Freedom Bank Admin Login Details";
//			$to = new SendGrid\Email("FBANK",$email);
//
//			$content = new SendGrid\Content("text/html",$msg);
//			$mail = new SendGrid\Mail($from, $subject, $to, $content);
//			$sg = new \SendGrid('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');
//			$response = $sg->client->mail()->send()->post($mail);	

				
			
		$uoData = $this->db->get_where("agent_orders",array("order_id"=>$oid))->row();
	
		
		$exproducts = json_decode($odata->product_id);
		$upproducts = json_decode($uoData->product_id);
								 
		$desc = array();				
		
		foreach($exproducts as $key => $p){
			
			$pData = $this->db->get_where("tbl_products",array("id"=>$p->productId))->row();
			
			$uppro = $upproducts[$key];
			
			if($p->productQty != 0){
				
				if($p->productQty != $uppro->productQty){
			
					$desc[] = "Quantity has been changed from ".$p->productQty.$p->qtyType." to ".$uppro->productQty.$uppro->qtyType." for ".$pData->product_name;
					
				}
			
			}
			
		}
				
		if(strtotime($odata->delivery_date) != strtotime($uoData->delivery_date)){
			
			$desc[] = "Delivery date has been changed from ".date("d-M-y",strtotime($odata->delivery_date))." to ".date("d-M-y",strtotime($uoData->delivery_date))." for Order ID : ".$oid;
			
		}
				
		if($odata->order_delivery_time != $uoData->order_delivery_time){
			
			$desc[] = "Delivery time has been changed from ".$odata->order_delivery_time." to ".$uoData->order_delivery_time." for Order ID : ".$oid;
			
		}	
				
		if(count($desc) > 0){
			
			foreach($desc as $up){
				
				$data = array("agent_order_id"=>$oid,"description"=>$up,"updated_by"=>$uid,"agent_id"=>$aid);
				$this->db->insert("agent_order_update_history",$data);
			}
			
		}		
				
				$this->alert->pnotify("success","Order Successfully Updated","success");
				redirect("orders/agent-orders");

			}else{
					
					$this->alert->pnotify("error","Error Occured While updating order","error");
					redirect("orders/agent-order/updateOrder/".$oid);
			}
	
}


public function user_access(){

	$this->load->view("users/useraccess");
}
	
public function delOrder($oid){
	
	$d = $this->db->where("order_id",$oid)->update("agent_orders",array("deleted"=>1));
	
	if($d){
		
		$this->alert->pnotify("success","Order Successfully deleted","success");
		redirect("orders/agent-orders");

	}else{

		$this->alert->pnotify("error","Error Occured While deleting order","error");
		redirect("orders/agent-orders");
	}
}	
	
	
public function getAreas(){
		
		$id=$this->input->get("id",true);
		
		$d=$this->products_model->getProduct($id);
	
		echo '<option value="">Select Quantity</option>';
	
		foreach($qty->quantity as $q){
			
			echo '<option value="'.$q.'">'.$q.'</option>';
		}
		
}
	
	
// Deliverable quantity
	
public function deliverableQuantity()
	{
//		$data["doo"] = $this->db->query("select * from orders where order_status='Cancelled'")->result();
		$this->load->view('orders/agent/deliverableQuantity');
	}	
//	
//public function allProductquantity(){
//	
//	$uid = $this->session->userdata("admin_id");
//	
//	$orders = $this->db->query("select order_id,user_id,shipping_address,delivery_status,order_type,date_of_order,assigned_to,id,invoice_number,deliveryonce_date as deliverydate from orders where payment_status='Success' and order_status='Success' and assigned_to='$uid'  order by id desc")->result();
//		
//	$fsorders = $this->db->query("select order_id,user_id,product_id,qty,shipping_address,delivery_status,id,order_type,assigned_to,delivery_date as deliverydate,order_date as date_of_order from tbl_free_sample_orders where order_status='Success' and assigned_to='$uid' order by id desc")->result();
//		
//	$data = array_merge($orders,$fsorders);	
//	
//	$jsonData = array();
//	
//    $ddate = date("Y-m-d");
//	
//	$id = 1;
//	
//	foreach($data as $u){
//		
//	   $orderproducts = $this->db->get_where("order_products",array("order_id"=>$u->order_id))->result();	
//		
//	   $udata = $this->db->get_where("shreeja_users",array("userid"=>$u->user_id,"user_status"=>0))->row();	
//		
//	   if($u->order_type == "subscribe"){
//		
//		 $sdata = $this->db->query("select * from tbl_subscribed_deliveries where order_id='$u->order_id' and pause_status='Inactive' and delivery_date = '$ddate'")->result();
//		   
//		 foreach($sdata as $sd){
//			 
//
//		   foreach($orderproducts as $op1){
//			   
////			    $str = $op1->category;
////							
////				$qtyMea = preg_replace('!\d+!', '', $str);
////
////				$qM = str_replace(" ","",$qtyMea);
////
////
////				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
////
////
////				$lMint = $int * $op1->qty;
//
//		   
//			  $pdata1 = $this->db->get_where("tbl_products",array("id"=>$op1->product_id,"assigned_to"=>"consumers"))->row(); 
//			   
//		   		$nData1 = array();
//				$nData1["sno"] = $id;
//				$nData1["product_id"] = $op1->product_id;
//				$nData1["Item_Code"] = $pdata1->product_id;
//				$nData1["Item_name"] = $pdata1->product_name;
//				$nData1["Quantity"] = $op1->category;
//				$nData1["qty"] = $op1->qty;
////				$nData1["UOM"] =  $tQty;
//				$nData1["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
//				
//				$jsonData[] = $nData1;
//			   
//			  $id++; 
//		   }
//		 }
//	   }elseif($u->order_type == "deliveryonce"){
//		   
//		  if(strtotime(date("Y-m-d",strtotime($u->deliverydate))) == strtotime($ddate)){ 
//		   
//		   foreach($orderproducts as $op){
//			   
////			  $str = $op->category;
////							
////				$qtyMea = preg_replace('!\d+!', '', $str);
////
////				$qM = str_replace(" ","",$qtyMea);
////
////
////				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
////
////
////				$lMint = $int * $op->qty;
//
//			  $pdata = $this->db->get_where("tbl_products",array("id"=>$op->product_id,"assigned_to"=>"consumers"))->row(); 
//			   
//		   		$nData = array();
//				$nData["sno"] = $id;
//				$nData["product_id"] = $op->product_id;
//				$nData["Item_Code"] = $pdata->product_id;
//				$nData["Item_name"] = $pdata->product_name;
//				$nData["Quantity"] = $op->category;
//				$nData["qty"] = $op->qty;
////				$nData["UOM"] =  $tQty;
//				$nData["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
//				$jsonData[] = $nData;
//			   
//			   $id++;
//		   }
//			   
//		  }
//	}else{
//		   
////	  if(strtotime(date("Y-m-d",strtotime($u->deliverydate))) == strtotime($ddate)){ 
////   
////		  		$str = $u->qty;
////							
////				$qtyMea = preg_replace('!\d+!', '', $str);
////
////				$qM = str_replace(" ","",$qtyMea);
////
////
////				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
////
////
////				$lMint = $int * 1;
////
////		  
////		  $pdata = $this->db->get_where("tbl_products",array("id"=>$u->product_id,"assigned_to"=>"consumers"))->row(); 
////			   
////		   		$nData2 = array();
////				$nData2["sno"] = $id;
////				$nData2["product_id"] = $pdata->id;
////				$nData2["Item_Code"] = $pdata->product_id;
////				$nData2["Item_name"] = $pdata->product_name;
////				$nData2["Quantity"] = $lMint;
////				$nData2["qm"] = $qM;
////				$nData2["UOM"] =  "EA";
////				$nData2["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
////				
////				$jsonData[] = $nData2; 
////		   $id++;
////		   
////	   }
//	   }
//	
//	
//	
//	}
//	
//	
//	$oresult = array();
//	foreach($jsonData as $k => $v) {
//		$id = $v['product_id'];
//		$oresult[$id][] = $v['qty'];
//	}
//	
//	$result = array();
//	foreach($jsonData as $k => $v) {
//		$id = $v['product_id'];
//		$qmid = "qm".$v['product_id'];
//		$result[$qmid][] = $v['qm'];
//		$result[$id][] = $v['Quantity'];
//	}
//	
//	
//	echo '<pre>';
//	print_r($oresult);
//	exit();
//
//	$new = array();
//	
//	$id1 = 1;
//	
//	foreach($oresult as $key => $value) {
//		
//	  $pdata2 = $this->db->get_where("tbl_products",array("id"=>$key,"assigned_to"=>"consumers"))->row(); 
//
//		
//		$fqty = number_format(array_sum($value));
//
//		$tQty = round(str_replace(",",".",$fqty),2);
//		
//		
//		if($result["qm".$key][0] == "ML"){
//			
//			if(array_sum($value) >= 1000){
//				
//				$quantity = $tQty." L";
//				
//			}else{
//				
//				$quantity = $tQty." ML";
//				
//			}
//			
//		}else{
//			
//			if(array_sum($value) >= 1000){
//				
//				$quantity = $tQty." KG";
//				
//			}else{
//				
//				$quantity = $tQty." gm";
//				
//			}
//			
//		}
//		
//		
//		$new[] = array(
//				'sno' => $id1,
//				'Item_Code' => $pdata2->product_id, 
//				'Item_name' => $pdata2->product_name,
//				'Quantity' => $quantity,
//				'UOM' => 'EA',
//		);
//		$id1++;
//		
//	}
//	
//		
//	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $new ];
//	echo json_encode($results);	
//}	
//	
	
	
	
	
	
	
public function allProductquantity(){
	
$aid = $this->session->userdata("admin_id");
$date = $this->input->post("sdate");
//$shift = $this->input->post("shift");

 $products = $this->db->where(array("deleted"=>0,"status"=>"Active"))->get("tbl_products")->result_array();
 $i = 0;
 $data = [];
 foreach($products as $row1){

		$product_quantity = json_decode($row1['product_quantity']);
		$sap = $product_quantity->sap;

        foreach ($product_quantity->quantity as $key => $value) {
			
			$packets = $this->get_success_orders($row1['id'],$value,$aid);
			
			if($packets != 0){
			
				$new['sno'] = $i+1;
				$new['product_id'] = $row1['id'];
				$new['pname'] = $row1['product_name']." ".$value;
				$new['sap_code'] = $sap[$key];
				$new['packets'] = $packets;
				$new['uom'] = "EA";
				$data[$i] = $new;
				$i++;
			}
    	}

			
	       	
	   }
	$data_final = $this->final_consolidate($data);
	
	
	$results = ["sEcho" => 1,"iTotalRecords" => count($data_final),"iTotalDisplayRecords" => count($data_final),"aaData" => $data_final ];
	echo json_encode($results);	

	

//return array("status"=>true,"data"=>$data_final);
}	

public function get_success_orders($pid,$cat,$aid){
	
	$date = date("d-m-Y");
	
	$orders = $this->db->query("select * from orders where payment_status='Success' and order_status='Success' and assigned_to='$aid'")->result();

	
	$fsorders = $this->db->query("select * from tbl_free_sample_orders where order_status='Success' and product_id='$pid' and qty='$cat' and assigned_to='$aid'")->result();
	
	
	$pqty = [];
	foreach($orders as $o){
		
//		echo $o->deliveryonce_date;
			
			if($o->order_type == "deliveryonce"){
				if(strtotime($date) == strtotime($o->deliveryonce_date)){
					$opdata = $this->db->where(array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat))->get("order_products")->result();
					foreach($opdata as $op){
			
						$pqty[] = $op->qty;
						
					}

				}
				
			}elseif($o->order_type == "subscribe"){
				$sdata = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$o->order_id,"pause_status"=>"Inactive"))->result();
				
				$oop = $this->db->get_where("order_products",array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat,"orderRef"=>"offer"))->row();
					
				if(strtotime($date) == strtotime($o->sub_start_date)){
					$pqty[] = $oop->qty;
				}
				
				foreach($sdata as $sd){
					
					if(strtotime($date) == strtotime($sd->delivery_date)){
						
						$opdata1 = $this->db->get_where("order_products",array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat))->result();
					
					
						foreach($opdata1 as $op1){
							
							if($op1->orderRef != "offer"){ 
								$pqty[] = $op1->qty;
							}
							
						}
						
					}
					
				}
				//$pqty[] = $o;
				
			}
			
		}
	
		 foreach($fsorders as $fs){
			
			if(strtotime($date) == strtotime($fs->delivery_date)){
			
				  $pqty[] = 1;

			}
			
		}
	
		return array_sum($pqty);
}

	
	
	
public function filterProductquantity(){
	
$aid = $this->session->userdata("admin_id");
$date = $this->input->post("sdate");
$shift = $this->input->post("shift");

 $products = $this->db->where(array("deleted"=>0,"status"=>"Active"))->get("tbl_products")->result_array();
 $i = 0;
 $data = [];
 foreach($products as $row1){

		$product_quantity = json_decode($row1['product_quantity']);
		$sap = $product_quantity->sap;

        foreach ($product_quantity->quantity as $key => $value) {
			
			$packets = $this->getfiltered_success_orders($date,$shift,$row1['id'],$value,$aid);
			
			if($packets != 0){
			
				$new['sno'] = $i+1;
				$new['product_id'] = $row1['id'];
				$new['pname'] = $row1['product_name']." ".$value;
				$new['sap_code'] = $sap[$key];
				$new['packets'] = $packets;
				$new['uom'] = "EA";
				$data[$i] = $new;
				$i++;
			}
    	}

			
	       	
	   }
	$data_final = $this->final_consolidate($data);
	
	
	$results = ["sEcho" => 1,"iTotalRecords" => count($data_final),"iTotalDisplayRecords" => count($data_final),"aaData" => $data_final ];
	echo json_encode($results);	

	

//return array("status"=>true,"data"=>$data_final);
}	

public function getfiltered_success_orders($date,$shift,$pid,$cat,$aid){
	
//	$date = date("d-m-Y");
	
//	$orders = $this->db->query("select * from orders where payment_status='Success' and order_status='Success' and assigned_to='$aid' and deliveryShift='$shift'")->result();

	$this->db->select('*');
	$this->db->from('orders');
	$this->db->where("payment_status","Success");
	$this->db->where("order_status","Success");
	$this->db->where("assigned_to",$aid);
	
	if($shift != ""){
		
		$this->db->where("deliveryShift",$shift);
		
	}
	
	$resutset = $this->db->get();
	
	$orders = $resutset->result();		
	
	$this->db->select('*');
	$this->db->from('tbl_free_sample_orders');
	$this->db->where("order_status","Success");
	$this->db->where("product_id",$pid);
	$this->db->where("qty",$cat);
	$this->db->where("assigned_to",$aid);
	
	if($shift != ""){
		
		$this->db->where("deliveryShift",$shift);
		
	}
	
	$resutset1 = $this->db->get();
	
	$fsorders = $resutset1->result();
	
	
//	$fsorders = $this->db->query("select * from tbl_free_sample_orders where order_status='Success'")->result();
	$pqty = [];
	foreach($orders as $o){
		
//		echo $o->deliveryonce_date;
			
			if($o->order_type == "deliveryonce"){
				if(strtotime($date) == strtotime($o->deliveryonce_date)){
					$opdata = $this->db->where(array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat))->get("order_products")->result();
					foreach($opdata as $op){
			
						$pqty[] = $op->qty;
						
					}

				}
				
			}elseif($o->order_type == "subscribe"){
				$sdata = $this->db->get_where("tbl_subscribed_deliveries",array("order_id"=>$o->order_id,"pause_status"=>"Inactive"))->result();
				
				$oop = $this->db->get_where("order_products",array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat,"orderRef"=>"offer"))->row();
					
				if(strtotime($date) == strtotime($o->sub_start_date)){
					$pqty[] = $oop->qty;
				}
				
				foreach($sdata as $sd){
					
					if(strtotime($date) == strtotime($sd->delivery_date)){
						
						$opdata1 = $this->db->get_where("order_products",array("order_id"=>$o->order_id,"product_id"=>$pid,"category"=>$cat))->result();
					
					
						foreach($opdata1 as $op1){
							if($op1->orderRef != "offer"){ 
								$pqty[] = $op1->qty;
							}
						}
						
					}
					
				}
				//$pqty[] = $o;
				
			}
			
		}
		
		 foreach($fsorders as $fs){
			
			if(strtotime($date) == strtotime($fs->delivery_date)){
			
				  $pqty[] = 1;

			}
			
		}
		
		return array_sum($pqty);
}	
	
	
public function final_consolidate($data){
	$i = 0;
	$array = [];
	foreach ($data as $row) {
		if($row['sap_code']!=""){
			$array[]=$row;
		}else{

		}
		//$i++;
	}
	return $array;
}		
	
	
	
//
//public function filterProductquantity(){
//	
//	$uid = $this->session->userdata("admin_id");
//	$sdate = $this->input->post("sdate");
//	$edate = $this->input->post("edate");
//	$shift = $this->input->post("shift");
//	
////	$orders = $this->db->query("select order_id,user_id,shipping_address,delivery_status,order_type,date_of_order,assigned_to,id,invoice_number,deliveryonce_date as deliverydate from orders where payment_status='Success' and order_status='Success' order by id desc")->result();
//		
//	$this->db->select('order_id,user_id,shipping_address,delivery_status,order_type,deliveryShift,assigned_to,deliveryonce_date as deliverydate,date_of_order');
//	$this->db->from('orders');
//	$this->db->where("payment_status","Success");
//	$this->db->where("order_status","Success");
//	$this->db->where("assigned_to",$uid);
//	
//	if($shift != ""){
//		
//		$this->db->where("deliveryShift",$shift);
//		
//	}
//	
//	$resutset = $this->db->get();
//	
//	$orders = $resutset->result();		
//	$fsorders = $this->db->query("select order_id,user_id,product_id,qty,shipping_address,delivery_status,id,order_type,assigned_to,delivery_date as deliverydate,order_date as date_of_order from tbl_free_sample_orders where order_status='Success' and assigned_to='$uid' order by id desc")->result();
//		
//	$data = array_merge($orders,$fsorders);	
//	
//	$jsonData = array();
//	
//	$id = 1;
//	
//	foreach($data as $u){
//		
//	   $orderproducts = $this->db->get_where("order_products",array("order_id"=>$u->order_id))->result();	
//		
//	   $udata = $this->db->get_where("shreeja_users",array("userid"=>$u->user_id,"user_status"=>0))->row();	
//		
//	   if($u->order_type == "subscribe"){
//		   
//		 $stdate = date("Y-m-d",strtotime($sdate));
//		 $endate = date("Y-m-d",strtotime($edate));
//		   
//		 $sdata = $this->db->query("select * from tbl_subscribed_deliveries where order_id='$u->order_id' and pause_status='Inactive' and delivery_date between '$stdate' and '$endate'")->result();
//		   
//		 foreach($sdata as $sd){
//			 
//
//		   foreach($orderproducts as $op1){
//			   
//			    $str = $op1->category;
//							
//				$qtyMea = preg_replace('!\d+!', '', $str);
//
//				$qM = str_replace(" ","",$qtyMea);
//
//
//				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
//
//
//				$lMint = $int * $op1->qty;
//
//		   
//			  $pdata1 = $this->db->get_where("tbl_products",array("id"=>$op1->product_id,"assigned_to"=>"consumers"))->row(); 
//			   
//		   		$nData1 = array();
//				$nData1["sno"] = $id;
//				$nData1["product_id"] = $op1->product_id;
//				$nData1["Item_Code"] = $pdata1->product_id;
//				$nData1["Item_name"] = $pdata1->product_name;
//				$nData1["Quantity"] = $lMint;
//				$nData1["qm"] = $qM;
////				$nData1["UOM"] =  $tQty;
//				$nData1["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
//				
//				$jsonData[] = $nData1;
//			   
//			  $id++; 
//		   }
//		 }
//	   }elseif($u->order_type == "deliveryonce"){
//		   
//		  if(strtotime(date("Y-m-d",strtotime($u->deliverydate))) >= strtotime($sdate) && (strtotime(date("Y-m-d",strtotime($u->deliverydate))) <= strtotime($edate))){ 
//		   
//		   foreach($orderproducts as $op){
//			   
//$str = $op->category;
//							
//				$qtyMea = preg_replace('!\d+!', '', $str);
//
//				$qM = str_replace(" ","",$qtyMea);
//
//
//				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
//
//
//				$lMint = $int * $op->qty;
//
//			  $pdata = $this->db->get_where("tbl_products",array("id"=>$op->product_id,"assigned_to"=>"consumers"))->row(); 
//			   
//		   		$nData = array();
//				$nData["sno"] = $id;
//				$nData["product_id"] = $op->product_id;
//				$nData["Item_Code"] = $pdata->product_id;
//				$nData["Item_name"] = $pdata->product_name;
//				$nData["Quantity"] = $lMint;
//				$nData["qm"] = $qM;
////				$nData["UOM"] =  $tQty;
//				$nData["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
//				$jsonData[] = $nData;
//			   
//			   $id++;
//		   }
//		  }
//			
//	}else{
//		   
//		  if(strtotime(date("Y-m-d",strtotime($u->deliverydate))) >= strtotime($sdate) && (strtotime(date("Y-m-d",strtotime($u->deliverydate))) <= strtotime($edate))){ 
//		   
//		  		$str = $u->qty;
//							
//				$qtyMea = preg_replace('!\d+!', '', $str);
//
//				$qM = str_replace(" ","",$qtyMea);
//
//
//				$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
//
//
//				$lMint = $int * 1;
//
//		  
//		  $pdata = $this->db->get_where("tbl_products",array("id"=>$u->product_id,"assigned_to"=>"consumers"))->row(); 
//			   
//		   		$nData2 = array();
//				$nData2["sno"] = $id;
//				$nData2["product_id"] = $pdata->id;
//				$nData2["Item_Code"] = $pdata->product_id;
//				$nData2["Item_name"] = $pdata->product_name;
//				$nData2["Quantity"] = $lMint;
//				$nData2["qm"] = $qM;
//				$nData2["UOM"] =  "EA";
//				$nData2["deliveryDate"] = date("Y-m-d",strtotime($u->date_of_order));
//				
//				$jsonData[] = $nData2; 
//		   $id++;
//		   
//	   }
//	   
//	}
//	
//	
//	}
//	
//	$oresult = array();
//	foreach($jsonData as $k => $v) {
//		$id = $v['product_id'];
//		$oresult[$id][] = $v['Quantity'];
//	}
//	
//	$result = array();
//	foreach($jsonData as $k => $v) {
//		$id = $v['product_id'];
//		$qmid = "qm".$v['product_id'];
//		$result[$qmid][] = $v['qm'];
//		$result[$id][] = $v['Quantity'];
//	}
//	
////	echo '<pre>';
////	print_r($result);
////	exit();
//	
//
//	$new = array();
//	
//	$id1 = 1;
//	
//	foreach($oresult as $key => $value) {
//		
//	  $pdata2 = $this->db->get_where("tbl_products",array("id"=>$key,"assigned_to"=>"consumers"))->row(); 
//
//		
//		$fqty = number_format(array_sum($value));
//
//		$tQty = round(str_replace(",",".",$fqty),2);
//		
//		
//		if($result["qm".$key][0] == "ML"){
//			
//			if(array_sum($value) >= 1000){
//				
//				$quantity = $tQty." L";
//				
//			}else{
//				
//				$quantity = $tQty." ML";
//				
//			}
//			
//		}else{
//			
//			if(array_sum($value) >= 1000){
//				
//				$quantity = $tQty." KG";
//				
//			}else{
//				
//				$quantity = $tQty." gm";
//				
//			}
//			
//		}
//		
//		if($pdata2->product_id != ""){
//		
//			$new[] = array(
//					'sno' => $id1,
//					'Item_Code' => $pdata2->product_id, 
//					'Item_name' => $pdata2->product_name,
//					'Quantity' => $quantity,
//					'UOM' => 'EA',
//			);
//		}
//		
//		$id1++;
//		
//	}
//	
//	
//	
////	echo '<pre>';
////	
////	print_r($new);
////	
////	echo '</pre>';
////	
////	exit();
//	
//	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $new ];
//	echo json_encode($results);	
//}	
//	
	
}