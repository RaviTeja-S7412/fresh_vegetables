<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Purchaseorders extends CI_Controller {
	
public function __construct(){
			
	parent::__construct();
	
	$this->secure->loginCheck();
	
}

public function index(){

	$this->load->view("purchaseOrders/allPurchaseorders");

}

public function invoiceorders(){

	$this->load->view("purchaseOrders/allInvoiceorders");

}	
	
public function view($id){

	$data["total"] = $this->db->query("select SUM(ask_price*qty) as total from tbl_purchase_order_products where po_id='$id'")->row()->total;
	$data["data"] = $this->db->get_where("tbl_purchase_order_products",array("po_id"=>$id))->result();
	$data["vdata"] = $this->db->join("tbl_vendors","tbl_purchase_orders.vendor_id = tbl_vendors.id")->get_where("tbl_purchase_orders",array("po_id"=>$id))->row();
	
	$this->load->view("purchaseOrders/viewPurchaseorder",$data);
}

public function viewInvoice($id){

	$data["total"] = $this->db->query("select SUM(ask_price*qty) as total from tbl_purchase_order_products where po_id='$id'")->row()->total;
	$data["data"] = $this->db->get_where("tbl_purchase_order_products",array("po_id"=>$id))->result();
	$data["vdata"] = $this->db->join("tbl_vendors","tbl_purchase_orders.vendor_id = tbl_vendors.id")->get_where("tbl_purchase_orders",array("po_id"=>$id))->row();
	
	$data["podata"] = $this->db->get_where("tbl_purchase_orders",array("po_id"=>$id))->row();
	
	$this->load->view("purchaseOrders/viewInvoiceorder",$data);
}	
	
public function updatePo(){
	
	$aprice = $this->input->post("aprice");
	$qty = $this->input->post("qty");
	$pid = $this->input->post("pid");
	$poid = $this->input->post("poid");
	
	
	$product_id = $this->input->post("product_id");
	$product_category = $this->input->post("product_category");
	$mrp = $this->input->post("mrp");
	$usp = $this->input->post("sp");
	$tax_class = $this->input->post("tax_class");
	$hsn_code = $this->input->post("hsn_code");
	
	$discount = $this->input->post("discount");
	$comments = $this->input->post("comments");
	$invoice = $this->input->post("invoice");
	$invoicedate = $this->input->post("invoicedate");
	
	
	$ref = $this->input->post("ref");
	
	foreach($pid as $key => $pp){
		
		$data = array("qty"=>$qty[$key],"ask_price"=>$aprice[$key]);
		$this->db->where("id",$pp)->update("tbl_purchase_order_products",$data);
		
	}
	
	if($ref == "invoice"){
	
		$d = $this->db->where("po_id",$poid)->update("tbl_purchase_orders",array("status"=>"Completed","completedDate"=>$invoicedate,"discount"=>$discount,"comments"=>$comments,"invoice_number"=>$invoice));
		
		if($d){
			
			foreach($product_category as $fkey => $pc){
		
				$pdata = $this->db->select("id,product_quantity")->get_where("tbl_products",array("id"=>$product_id[$fkey]))->row();		

				$pcategories = json_decode($pdata->product_quantity);

				$quantity = [];
				$price = [];
				$sp = [];
				$lcp = [];
				$pis = [];

				foreach($pcategories->quantity as $key => $pcat){

					$msl = isset($pcategories->pis[$key]) ? $pcategories->pis[$key] : 2;

					if($pcat == $pc){

						$quantity[] = $pcat;
						$price[] = $mrp[$fkey];
						$sp[] = $usp[$fkey];
						$lcp[] = $aprice[$fkey];
						$pis[] = $msl + $qty[$fkey];

					}else{

						$quantity[] = $pcat;
						$price[] = $pcategories->price[$key];
						$sp[] = $pcategories->sp[$key];
						$lcp[] = $pcategories->lcp[$key];
						$pis[] = $msl;

					}

				}

				$pquantity = array("quantity"=>$quantity,"price"=>$price,"sp"=>$sp,"lcp"=>$lcp,"pis"=>$pis);

				$this->db->where("id",$product_id[$fkey])->update("tbl_products",array("product_quantity"=>json_encode($pquantity),"tax_class"=>$tax_class[$fkey],"hsn_code"=>$hsn_code[$fkey]));

			}
			
		}
		
	}else{
		
		$this->db->where("po_id",$poid)->update("tbl_purchase_orders",array("status"=>"Placed"));
	
	}
	
	
	if($ref == "invoice"){

		$this->alert->pnotify("success","Invoice Successfully Updated","success");
		
		redirect("purchaseorders/viewInvoice/".$poid);
		
	}else{
		$this->alert->pnotify("success","Purchase Order Successfully Placed","success");
		redirect("purchaseorders");
		
	}
	
}
	
public function addItem(){
	
	$item = $this->input->post("item");
	$qty = $this->input->post("qty");
	$variant = $this->input->post("variant");
	$askprice = $this->input->post("askprice");
	$poid = $this->input->post("po_id");
	
	$pname = $this->db->get_where("tbl_products",array("id"=>$item))->row()->product_name;
	
	$data = array("po_id"=>$poid,"qty"=>$qty,"ask_price"=>$askprice,"product_id"=>$item,"product_name"=>$pname,"product_category"=>$variant,"previous_price"=>0);
	
	
	$d = $this->db->insert("tbl_purchase_order_products",$data);
	
	if($d){
			
		$this->alert->pnotify("success","Item Successfully Added","success");
		redirect("purchaseorders/view/".$poid);

	}else{

		$this->alert->pnotify("error","Error Occured","error");
		redirect("purchaseorders/view/".$poid);
	}
}
	
public function delItem(){
	
	$id = $this->input->post("id");
	$pid = $this->input->post("pid");
	
	$d = $this->db->delete("tbl_purchase_order_products",array("id"=>$id));
	
	if($d){

		$total = $this->db->query("select SUM(ask_price*qty) as total from tbl_purchase_order_products where po_id='$pid'")->row()->total;
		$data = $this->db->get_where("tbl_purchase_order_products",array("po_id"=>$pid))->num_rows();
		
		echo json_encode(array("status"=>'success',"total"=>round($total,2),"count"=>$data));

		
	}else{
		
		echo 'fail';
		
	}
	
}
	
public function createPo(){
	
	$vname = $this->input->post("vendor");
	$podate = $this->input->post("podate");
	$poid = $this->admin->generatePoid();
	
	$d = $this->db->insert("tbl_purchase_orders",array("po_id"=>$poid,"vendor_id"=>$vname,"placedDate"=>date("Y-m-d",strtotime($podate))));
	
	if($d){
			
		$this->alert->pnotify("success","Purchase Order Successfully Created","success");
		redirect("purchaseorders");

	}else{

		$this->alert->pnotify("error","Error Occured","error");
		redirect("purchaseorders");
	}
	
}
	
public function deletePo($id){
	
	$d = $this->db->delete("tbl_purchase_orders",array("po_id"=>$id));
	
	if($d){
		
		$this->db->delete("tbl_purchase_order_products",array("po_id"=>$id));
		
		$this->alert->pnotify("success","Purchase Order Successfully Deleted","success");
		redirect("purchaseorders");

	}else{

		$this->alert->pnotify("error","Error Occured","error");
		redirect("purchaseorders");
	}
	
}	
//	
//public function filterOrders(){
//	
//	$poid = $this->input->post("poid");
//	
//	$data = $this->db->get_where("tbl_purchase_order_products",array("po_id"=>$poid))->result();
//	
//	$jsonData = array();
//	
//	$id = 1;
//	
//	foreach($data as $u){
//		
//
//		   $pdata = $this->db->get_where("tbl_products",array("id"=>$u->product_id))->row();
//											   
//		   $pcategories = json_decode($pdata->product_quantity);
//
//		   $mrp = "";
//		   $sp = "";
//		   $lcp = "";
//
//		   foreach($pcategories->quantity as $key => $pcat){
//
//				if($pcat == $u->product_category){
//
//					$mrp = $pcategories->price[$key];
//					$sp = $pcategories->sp[$key];
//					$lcp = $pcategories->lcp[$key];
//					
//				}
//
//		   }
//
//		   $taxclass = round($lcp * ($pdata->tax_class/100),2);
//			
//			$nData = array();
//			$nData["sno"] = $id;
//			$nData["product_id"] = $pdata->product_id;
//			$nData["name"] = $u->product_name." ".$u->product_category;
//			$nData["hsn_code"] = $pdata->hsn_code;
//			$nData["sp"] =  $sp;
//			$nData["ask_price"] = '<div class="form-group new"><input type="text" class="form-control" style="width: 80%" name="aprice[]" value="'.$u->ask_price .'"></div>';
//			$nData["mrp"] = $mrp;
//			$nData["qty"] =  '<div class="form-group new"><input type="number" class="form-control" style="width: 80%" name="qty[]" value="'.$u->qty .'"></div>';
//			$nData["taxclass"] =  $taxclass." Rs/-";
//			$nData["tax1"] =  round(($taxclass/2),2)." Rs/-";
//			$nData["tax2"] =  round(($taxclass/2),2)." Rs/-";
//			$nData["total"] =  '<input type="hidden" class="form-control" style="width: 80%" name="pid[]" value="'.$u->id.'">'.$u->ask_price * $u->qty.'';
//			$nData["action"] =  '<i class="fa fa-times delete" id="'.$u->id.'" style="color: red; cursor: pointer"></i>';
//			$jsonData[] = $nData;
//		
//		$id++;
//	}
//
//	$results = ["sEcho" => 1,"iTotalRecords" => count($jsonData),"iTotalDisplayRecords" => count($jsonData),"aaData" => $jsonData ];
//	echo json_encode($results);
//	
//}	
//	
	
	
public function filterOrders(){
	
	$poid = $this->input->post("poid");
	
	$data = $this->db->get_where("tbl_purchase_order_products",array("po_id"=>$poid))->result();
	
	$jsonData = "";
	
	$i = 0;
	
	foreach($data as $u){
		

		   $pdata = $this->db->get_where("tbl_products",array("id"=>$u->product_id))->row();
											   
		   $pcategories = json_decode($pdata->product_quantity);

		   $mrp = "";
		   $sp = "";
		   $lcp = "";

		   foreach($pcategories->quantity as $key => $pcat){

				if($pcat == $u->product_category){

					$mrp = $pcategories->price[$key];
					$sp = $pcategories->sp[$key];
					$lcp = $pcategories->lcp[$key];
					
				}

		   }

		   $taxclass = round($lcp * ($pdata->tax_class/100),2);
		
		   $jsonData .= '<tr class="delHide'.$u->id.'">
							<td style="padding: 0.5rem;">'.++$i.'</td>
							<td style="padding: 0.5rem;">'.$pdata->product_id.'</td>
							<td style="padding: 0.5rem;">'.$u->product_name." ".$u->product_category.'</td>
							<td style="padding: 0.5rem;">'.$pdata->hsn_code.'</td>
							<td style="padding: 0.5rem;">'.$sp.'</td>
							<td style="padding: 0.5rem;">

								<div class="form-group new">

									<input type="text" class="form-control" style="width: 80%" name="aprice[]" value="'.$u->ask_price.'">

								</div>

							</td>
							<td style="padding: 0.5rem;">

								<div>'.$mrp.'</div>

							</td>  
							<td style="padding: 0.5rem;">


								<div class="form-group new">

									<input type="text" class="form-control" style="width: 80%" name="qty[]" value="'.$u->qty.'">

								</div>
							</td>  

							<td style="padding: 0.5rem;">'.$pdata->tax_class." %".'</td>  
							<td style="padding: 0.5rem;">'.$taxclass." Rs/-".'</td>  
							<td style="padding: 0.5rem;">'.round(($taxclass/2),2)." Rs/-".'</td>  
							<td style="padding: 0.5rem;">'.round(($taxclass/2),2)." Rs/-".'</td>  

							<td style="padding: 0.5rem;">
							 <input type="hidden" class="form-control" style="width: 80%" name="pid[]" value="'.$u->id.'">
							 '.$u->ask_price * $u->qty.'</td>

							<td style="padding: 0.5rem;">

								<i class="fa fa-times delete" id="'.$u->id.'" style="color: red; cursor: pointer"></i>

							</td>     

						</tr>';
			
	}
	
	$total = $this->db->query("select SUM(ask_price*qty) as total from tbl_purchase_order_products where po_id='$poid'")->row()->total;

	echo json_encode(array("result"=>$jsonData,"total"=>round($total,2),"count"=>count($data)));
	
}	

public function moveInvoice($poid){
	
	$d = $this->db->where("po_id",$poid)->update("tbl_purchase_orders",array("status"=>"Draft"));
	
	if($d){
		
		$this->alert->pnotify("success","Invoice Order successfully moved to Purchase Orders","success");
		redirect("purchaseorders");

	}else{

		$this->alert->pnotify("error","Error Occured","error");
		redirect("purchaseorders");
	}
	
}	
	

}