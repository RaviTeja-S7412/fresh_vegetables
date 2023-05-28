<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {
public function __construct(){
			
	parent::__construct();
	$this->secure->loginCheck();
	
}
public function index(){
	
	$this->load->view("products/allProducts");

}
	
public function createProduct(){
	
	$this->load->view("products/createProduct");
	
}	

	
public function updateProduct($id){

	$data["p"] = $this->products_model->getProduct($id);

	$this->load->view("products/updateProduct",$data);

}	


public function insertProduct(){
	
	$product_name = $this->input->post("product_name");
	$pro_in_stk = $this->input->post("pro_in_stk");
	$link = $this->input->post("link");
	$target = $this->input->post("target");
	$pr_desc = $this->input->post("pr_desc");
	$category = $this->input->post("category");
	$price = $this->input->post("price");
	$dprice = $this->input->post("dprice");
	$lcprice = $this->input->post("lcprice");
	$pis = $this->input->post("pis");                            // products in stock
	
	$meta_title = $this->input->post("meta_title");
	$meta_keywords = $this->input->post("meta_keywords");
	$meta_desc = $this->input->post("meta_desc");	
	$loc = $this->input->post("location");
	$product_category = $this->input->post("product_category");
	$gst_charges_status = $this->input->post("gst_charges_status");
	$product_id = $this->input->post("product_id");
	$gst_charges = $this->input->post("gst_charges");
	$nname = $this->input->post("nname");
	$nvalue = $this->input->post("nvalue");
	$assigned_to = $this->input->post("assigned_to");
	$qtyType = $this->input->post("qtyType");
	$brandname = $this->input->post("brandname");

	$hsn_code = $this->input->post("hsn_code");
	$tax_class = $this->input->post("tax_class");
	$vendor = $this->input->post("vendor");
	$msl = $this->input->post("msl");
	
	
	$product_quantity = array("quantity"=>$category,"price"=>$price,"sp"=>$dprice,"lcp"=>$lcprice,"pis"=>$pis);
	
	
	$pidchk = $this->db->get_where("tbl_products",array("product_id"=>$product_id))->num_rows();
	
	if($pidchk == 1){
		
		$this->alert->pnotify("error","Product ID Already Exists","error");
		
		redirect("products/create-product");
		
	}
	
	
	$config['upload_path']          = 'uploads/products/';
    $config['allowed_types']        = '*';
//    $config['encrypt_name']             = TRUE;
	$config['overwrite'] = TRUE;
	
	
    $this->load->library('upload', $config);
		
	$this->upload->do_upload("pr_image");
		
	$d=$this->upload->data();
		
	$pr_image='uploads/products/'.$d['file_name'];

	
	$config1['upload_path']          = 'uploads/products/banners/';
    $config1['allowed_types']        = '*';
//    $config['encrypt_name']             = TRUE;
	$config1['overwrite'] = TRUE;
	
	
    $this->upload->initialize($config1);
		
	$this->upload->do_upload("banner_image");
		
	$d=$this->upload->data();
		
	$banner_image='uploads/products/banners/'.$d['file_name'];

	$multiImg = [];
	
	if($_FILES["files"]["name"] != '')
	  {
	   $output = '';
	   $config2["upload_path"] = 'uploads/products/multi/';
	   $config2["allowed_types"] = '*';

	   //$config["encrypt_name"] = TRUE;   
	   $this->upload->initialize($config2);
	   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
	   {
		$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
		$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
		$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
		$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
		$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
		if($this->upload->do_upload('file'))
		{
		 $data = $this->upload->data();
		 
			$multiImg[] = 'uploads/products/multi/'.$data["file_name"];

		}
	   }   
	  }

	
	$data = array(
	
		"product_name" => $product_name,
		"product_quantity" => json_encode($product_quantity),
		"description" => $pr_desc,
		"mImages" => json_encode($multiImg),
		"product_image" => $pr_image,
		"product_banner_image" => $banner_image,
		"location" => json_encode($loc),
		"created_date" => date("Y-m-d H:i:s"),
		"product_category" => $product_category,
		"product_id" => $product_id,
		"brandname" => $brandname,
		"hsn_code" => $hsn_code,
		"tax_class" => $tax_class,
		"vendor" => $vendor,
		"msl" => $msl,
	
	);
	
	
	$pi = $this->db->insert("tbl_products",$data);
	
	if($pi){
		
		$this->alert->pnotify("success","Product Added Successfully","success");
		
		redirect("products/create-product");
		
	}else{
		
		$this->alert->pnotify("error","Error Occured Please Try Again","error");
		
		redirect("products/create-product");
	
		
	}

	
}


public function updateProductdata(){
	
	$id = $this->input->post("pid");
	$product_name = $this->input->post("product_name");
	$pr_desc = $this->input->post("pr_desc");
	$category = $this->input->post("category");
	$price = $this->input->post("price");
	$loc = $this->input->post("location");
	$product_category = $this->input->post("product_category");
	$gst_charges_status = $this->input->post("gst_charges_status");
	$product_id = $this->input->post("product_id");
	$qtyType = $this->input->post("qtyType");
	$dprice = $this->input->post("dprice");
	$lcprice = $this->input->post("lcprice");
	$pis = $this->input->post("pis");                            // products in stock
	$brandname = $this->input->post("brandname");

	$nname = $this->input->post("nname");
	$nvalue = $this->input->post("nvalue");
	
	$hsn_code = $this->input->post("hsn_code");
	$tax_class = $this->input->post("tax_class");
	$vendor = $this->input->post("vendor");
	$msl = $this->input->post("msl");

	
	
	$product_quantity = array("quantity"=>$category,"price"=>$price,"sp"=>$dprice,"lcp"=>$lcprice,"pis"=>$pis);
	
//	$nutrition_info = array("name"=>$nname,"value"=>$nvalue);

	
	$pdata = $this->db->get_where("tbl_products",array("id"=>$id,"deleted"=>0))->row();
	

	$pidchk = $this->db->get_where("tbl_products",array("product_id"=>$product_id,"id !="=>$id))->num_rows();
	
	if($pidchk>=1){
			$this->alert->pnotify("error","Product ID Already Exists","error");
			redirect("products/edit-product/".$id);
		}	
	
	
	$this->load->library('upload');

	
	if($_FILES['pr_image']['size']!='0'){

	
		$config['upload_path']          = 'uploads/products/';
		$config['allowed_types']        = '*';
		//    $config['encrypt_name']             = TRUE;
		$config['overwrite'] = TRUE;
		
        $this->upload->initialize($config);
		$this->upload->do_upload("pr_image");

		$d=$this->upload->data();

		$pr_image='uploads/products/'.$d['file_name'];
		
		
	}else{
		
		$pr_image = $pdata->product_image;
		
	}
	
	if($_FILES['banner_image']['size']!='0'){
	
	$config1['upload_path']          = 'uploads/products/banners/';
    $config1['allowed_types']        = '*';
//    $config['encrypt_name']             = TRUE;
	$config1['overwrite'] = TRUE;
	
	
    $this->upload->initialize($config1);
		
	$this->upload->do_upload("banner_image");
		
	$d=$this->upload->data();
		
	$banner_image='uploads/products/banners/'.$d['file_name'];
	
	}else{
		
		$banner_image = $pdata->product_banner_image;
		
	}

	
	$multiImg = [];
	
	if(count($_FILES["files"]["name"]) > 1)
	  {
	   $output = '';
	   $config2["upload_path"] = 'uploads/products/multi/';
	   $config2["allowed_types"] = '*';

	   //$config["encrypt_name"] = TRUE;   
	   $this->upload->initialize($config2);
	   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
	   {
		$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
		$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
		$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
		$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
		$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
		if($this->upload->do_upload('file'))
		{
		 $data = $this->upload->data();
		 
			$multiImg[] = 'uploads/products/multi/'.$data["file_name"];

		}
	   }
		  
		   $multi =	"22".json_encode($multiImg); 
		  
	  }else{
		  
		   $multi = $pdata->mImages;
		  
	  }
	
	$data = array(
	
		"product_name" => $product_name,
		"product_quantity" => json_encode($product_quantity),
		"description" => $pr_desc,
		"mImages" => $multi,
		"product_image" => $pr_image,
		"product_banner_image" => $banner_image,
//		"products_in_stock" => $pro_in_stk,
		"location" => json_encode($loc),
		"created_date" => date("Y-m-d H:i:s"),

		"product_category" => $product_category,
		"product_id" => $product_id,
		"brandname" => $brandname,
		"hsn_code" => $hsn_code,
		"tax_class" => $tax_class,
		"vendor" => $vendor,
		"msl" => $msl,
		
		
	);
	
	
	$this->db->set($data);
	$this->db->where("id",$id);
	$pi = $this->db->update("tbl_products");
	
	if($pi){
		
		$this->alert->pnotify("success","Product Updated Successfully","success");
		
		redirect("products");
		
	}else{
		
		$this->alert->pnotify("error","Error Occured Please Try Again","error");
		
		redirect("products/edit-product/".$id);
	
		
	}
	
	
}	
	

	public function productstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_products");
		
		if($d){
			if($status=="Active"){
//				echo $this->alert->pnotify("Success","Successfully Product Enabled","success");
			}else{
//				echo $this->alert->pnotify("Success","Successfully Product Disabled","success");	
			}

		}else{
			if($status=="Active"){
//				echo $this->alert->pnotify("Error","Error Occured While Enabling Product","error");
			}else{
//				echo $this->alert->pnotify("Error","Error Occured While Disabling Product","error");
			}	
		}
		
	}
	
	
public function delProduct($id){

//	$data = array("deleted"=>1,"status"=>"Inactive");
//	$this->db->set($data);
//	$this->db->where("id",$id);
	$d = $this->db->delete("tbl_products",array("id"=>$id));

	if($d){
			$this->alert->pnotify("success","Product Successfully Deleted","success");
//			redirect("products");
	}else{

			$this->alert->pnotify("error","Error Occured While Deleting Product","error");
//			redirect("products");
	}
}

	
	
// Price Management	
	
	
public function priceManagement(){

	$did = $this->input->post("did");
	$pid = $this->input->post("pid");
	$sdate = $this->input->post("startDate");
	$edate = $this->input->post("endDate");	
	$ptype = $this->input->post("disType");	
		
	$category = $this->input->post("category");	
	$price = $this->input->post("price");	
	
	$dchk1 = $this->db->get_where("tbl_price_management",array("product_id"=>$pid))->result();
	
	$pchk = $this->db->get_where("tbl_products",array("id"=>$pid,"status"=>"Active","deleted"=>0))->row();

	
	if($pchk){
	
	$ecat = json_decode($pchk->product_quantity);

	$proChk = $this->db->get_where("tbl_price_management",array("product_id"=>$pid,"id"=>$did))->num_rows();
	
	if($proChk ==1){
			
		
		
			foreach($dchk1 as $dchk){
				
			 if($dchk->id != $did){	
	
				if(($sdate >= $dchk->startdate && $sdate <= $dchk->enddate || $edate >= $dchk->startdate && $edate <= $dchk->enddate)){

					$this->alert->pnotify("error","Please Select Valid Start & End Dates","error");
					redirect("products/edit-product/".$pid."/".$did);

				}
			 }
			}
		
		
			if($ptype == "percent"){

				foreach($price as $ep){

					if($ep >= 100){

						$this->alert->pnotify("error","Please Enter Valid Percentage","error");
						redirect("products/edit-product/".$pid."/".$did);

					}

				}
			}else{


				$exPrice = $ecat->price;

				foreach($price as $key => $ep){

					if($ep >= $exPrice[$key]){

						$this->alert->pnotify("error","Please Enter Valid Amount","error");
						redirect("products/edit-product/".$pid."/".$did);

					}

				}

			}	
			
			
			$pdata = array("quantity"=>$ecat->quantity,"price"=>$price,"discount_type"=>$ptype);
		
			$data = array("product_id"=>$pid,"price_management"=>json_encode($pdata),"startdate"=>$sdate,"enddate"=>$edate);
			
			$this->db->set($data);
			$this->db->where("id",$did);
			$pm = $this->db->update("tbl_price_management");
			
			if($pm){
				
				$this->alert->pnotify("success","Updated Successfully","success");
				redirect("products/edit-product/".$pid);
				
			}else{
				
				$this->alert->pnotify("error","Error Occured Please Try Again","error");
				redirect("products/edit-product/".$pid);
				
			}
			
		
	}else{
		
		foreach($dchk1 as $dchk){
	
			if(($sdate >= $dchk->startdate && $sdate <= $dchk->enddate || $edate >= $dchk->startdate && $edate <= $dchk->enddate)){

				$this->alert->pnotify("error","Please Select Valid Start & End Dates","error");
				redirect("products/edit-product/".$pid);

			}
		}
		
		
			if($ptype == "percent"){

				foreach($price as $ep){

					if($ep >= 100){

						$this->alert->pnotify("error","Please Enter Valid Percentage","error");
						redirect("products/edit-product/".$pid);

					}

				}
			}else{


				$exPrice = $ecat->price;
				
				
				foreach($price as $key => $ep){

					if($ep >= $exPrice[$key]){

						$this->alert->pnotify("error","Please Enter Valid Amount","error");
						redirect("products/edit-product/".$pid);

					}

				}

			}
		
		
		
		   $pdata = array("quantity"=>$ecat->quantity,"price"=>$price,"discount_type"=>$ptype);
		
		   $data = array("product_id"=>$pid,"price_management"=>json_encode($pdata),"startdate"=>$sdate,"enddate"=>$edate);
		
		   $pm = $this->db->insert("tbl_price_management",$data);
		
		   if($pm){
				
				$this->alert->pnotify("success","Successfully Added","success");
				redirect("products/edit-product/".$pid);
				
			}else{
				
				$this->alert->pnotify("error","Error Occured Please Try Again","error");
				redirect("products/edit-product/".$pid);
				
			}
			
	}
		
	}else{
		
			$this->alert->pnotify("error","Error Occured Product is in Inactive","error");
			redirect("products/edit-product/".$pid);
		
	}
	
	
}	



	public function discstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_price_management");
		
		if($d){
			if($status=="Active"){
				echo $this->alert->pnotify("Success","Successfully Discount Enabled","success");
			}else{
				echo $this->alert->pnotify("Success","Successfully Discount Disabled","success");	
			}

		}else{
			if($status=="Active"){
				echo $this->alert->pnotify("Error","Error Occured While Enabling Discount","error");
			}else{
				echo $this->alert->pnotify("Error","Error Occured While Disabling Discount","error");
			}	
		}
		
	}	
	

	
public function delPm($id){

//	$data = array("deleted"=>1,"status"=>"Inactive");
//	$this->db->set($data);
//	$this->db->where("id",$id);
	$d = $this->db->delete("tbl_price_management",array("id",$id));

	if($d){
			$this->alert->pnotify("success","Successfully Deleted","success");
//			redirect("products");
	}else{

			$this->alert->pnotify("error","Error Occured While Deleting","error");
//			redirect("products");
	}
}	
	

// Free Sample	
	
public function freeSampleproducts(){
	
	$this->load->view("products/sampleProducts");
	
}	
	
	
public function getProductquantity(){
		
		$id=$this->input->get("id",true);
		
		$d=$this->products_model->getProduct($id);
		
		$qty = json_decode($d->product_quantity);
	
		echo '<option value="">Select Quantity</option>';
	
		foreach($qty->quantity as $q){
			
			echo '<option value="'.$q.'">'.$q.'</option>';
		}
		
}
	
public function	insertSampleproduct(){
	
	$pid = $this->input->post("pid",true);
	$qty = $this->input->post("qty",true);
	
	$data = array("product_id"=>$pid,"qty"=>$qty);
	
	$d = $this->db->insert("tbl_sample_products",$data);
	
	if($d){
				
		$this->alert->pnotify("success","Successfully sample product added","success");
		redirect("products/free-sample-products");

	}else{

		$this->alert->pnotify("error","Error Occured Please Try Again","error");
		redirect("products/free-sample-products");

	}
	
}
	

public function	updateSampleproduct($id){
	
	$pid = $this->input->post("pid",true);
	$qty = $this->input->post("qty",true);
	
	$data = array("product_id"=>$pid,"qty"=>$qty);
	
	$this->db->set($data);
	$this->db->where("id",$id);
	$d = $this->db->update("tbl_sample_products");
	
	if($d){
				
		$this->alert->pnotify("success","Successfully sample product updated","success");
		redirect("products/free-sample-products");

	}else{

		$this->alert->pnotify("error","Error Occured Please Try Again","error");
		redirect("products/edit-sample-product/".$id);

	}
	
}
	
public function delSampleproduct($id){

	$d = $this->db->delete("tbl_sample_products",array("id"=>$id));

	if($d){
			$this->alert->pnotify("success","Sample product Successfully Deleted","success");
			redirect("products/free-sample-products");
	}else{

			$this->alert->pnotify("error","Error Occured While Deleting Sample product","error");
			redirect("products/free-sample-products");
	}
}	
	

}
