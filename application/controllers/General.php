<?php
class General extends CI_Controller {

public function __construct(){
			
	parent::__construct();		
	$this->secure->loginCheck();
	
}

public function general(){

	$this->admin->getClientDB();
	$data["c"] = $this->db->query("select * from fdm_va_general_contact where deleted=0 and status='Active'")->row();
	$data['soc'] = "";
	$data['loc'] = "";
	$data['areas'] = "";
	$data['slider'] = "";
	$this->load->view("general/general",$data);

}




public function insertHeaderLogo(){

	  $logo = $this->db->get_where("fdm_va_general_logo",array("id"=>1,"logo_type"=>"Header"))->row();					

	  if($_FILES['logo']['size']!='0'){
			//profile pic uploading
		  		$config['upload_path']          = "uploads/general/logo/header/";
                $config['allowed_types']        = '*';
//                $config['encrypt_name']             = TRUE;
//			    $config['max_width']            = 450;
//				$config['max_height']           = 80;		
        $this->load->library('upload', $config);
		
		$dd=$this->upload->do_upload("logo");
		
			if($dd){  
				$d=$this->upload->data();

				$nimage = "uploads/general/logo/header/".$d['file_name'];

				unlink($logo->logo);
			}else{
				
				echo $this->upload->display_errors();
				
				exit();
				
//				$this->alert->pnotify("error","Please Select Valid Image Format Or Dimensions","error");
//				redirect("general");
			}
		}else{
			
			
			$nimage=$logo->logo;
			
		}				


				$data = array("logo"=>$nimage,"date"=>date("Y-m-d H:i:s"));

				$this->db->set($data);
				$this->db->where("id",1);
				$l = $this->db->update("fdm_va_general_logo");
	if($l){

			$this->alert->pnotify("success","Header Logo Successfully Updated","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Header Logo","error");
			redirect("general");
	}

}



public function updateContact(){
	$id = $this->input->post("c_id",true);
	$name = $this->input->post("cname");
	$email = $this->input->post("email",true);
	$mobile = $this->input->post("mobile",true);
	$address = $this->input->post("address",true);
	$date = date("Y-m-d H:i:s");

	$data = array("email"=>$email,"mobile"=>$mobile,"address"=>$address,"company_name"=>$name);
		 $this->db->set($data);
		 $this->db->where("id",$id);
	$c = $this->db->update("fdm_va_general_contact");
	if($c){
			$this->alert->pnotify("success","Contact Successfully Updated","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Contact","error");
			redirect("general");
	}

}


// Social Networking

public function insertSocial(){

	$title = $this->input->post("title",true);
	$link = $this->input->post("link");
	$icon = $this->input->post("icon");
	
	
	$schk = $this->db->get_where("fdm_va_social_networking",array("title"=>$title))->num_rows();
	
	if($schk == 1){
		
		$this->alert->pnotify("error","$title Already Exists","error");
		
		redirect("general");
		
	}	
	

//	  	$config['upload_path']          = "uploads/general/social_networking/";
//        $config['allowed_types']        = 'gif|jpg|png|jpeg';
//        $config['encrypt_name']             = TRUE;
//        $config['max_width']            = 35;
//        $config['max_height']           = 35;
//		
//        $this->load->library('upload', $config);
//		
//		if($this->upload->do_upload("icon")){
//		
//		$d=$this->upload->data();
//		
// 			$icon = "uploads/general/social_networking/".$d['file_name'];
// 		
// 		}else{
//
// 			$this->alert->pnotify("error","Please Select Valid Image","error");
//			redirect("general");
//
// 		}

 	$data = array(
 		
 		"title" => $title,
 		"link" => $link,
 		"icon" => $icon,
 		"created_date" => date("Y-m-d"),
 		"created_by" => $this->session->userdata("admin_id"),

 	);	

 	$sn = $this->db->insert("fdm_va_social_networking",$data);

 	if($sn){

 			$this->alert->pnotify("success","Social Site Successfully Added","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Adding Social Site","error");
			redirect("general");
	}
}


public function updateSocial($id){
	$data["c"] = $this->db->query("select * from fdm_va_general_contact where deleted=0 and status='Active'")->row();
	$data['soc'] = $this->db->query("select * from fdm_va_social_networking where deleted=0 and id=$id")->row();
	$data['loc'] = '';
	$data['areas'] = "";
	$data['slider'] = "";
	$this->load->view("general/general",$data);

}

public function editSocialnetwork(){

	$id = $this->input->post("soc_id");
	$title = $this->input->post("title",true);
	$link = $this->input->post("link");
	$icon = $this->input->post("icon");

	$schk = $this->db->get_where("fdm_va_social_networking",array("title"=>$title,"id"=>$id))->row()->title;

	if($schk==$title){

		$data = array("title" => $title);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("fdm_va_social_networking");
		
		
	}else{
		$nchk1 = $this->db->get_where("fdm_va_social_networking",array("title"=>$title,"deleted"=>0))->num_rows();	
		if($nchk1>=1){
			$this->alert->pnotify("error","$title Already Exists","error");
			redirect("general/update-social-site/".$id);
		}else{	
		$data = array("title" => $title);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("fdm_va_social_networking");
			
			
		}
	}
	
	

	$sn = $this->db->get_where("fdm_va_social_networking",array("id"=>$id))->row();

//	if($_FILES['icon']['size']!='0'){
//	  	$config['upload_path']          = "uploads/general/social_networking/";
//        $config['allowed_types']        = 'gif|jpg|png|jpeg';
//        $config['encrypt_name']             = TRUE;
//        $config['max_width']            = 35;
//        $config['max_height']           = 35;
//		
//        $this->load->library('upload', $config);
//		
//		if($this->upload->do_upload("icon")){
//		
//		$d=$this->upload->data();
//		
// 		$icon = "uploads/general/social_networking/".$d['file_name'];
// 	
// 		unlink($sn->icon);
// 		}else{
//
// 			$this->alert->pnotify("error","Please Select Valid Image","error");
//			redirect("general/update-social-site/".$id);
//
// 		}
//
// 	}else{
// 		$icon = $sn->icon;
// 	}	

 	$data = array(
 		
 		"link" => $link,
 		"icon" => $icon,
 		"updated_date" => date("Y-m-d"),
 		"updated_by" => $this->session->userdata("admin_id"),

 	);	
 		$this->db->set($data);
 		$this->db->where("id",$id);
 		$sn = $this->db->update("fdm_va_social_networking");

 	if($sn){

 			$this->alert->pnotify("success","Social Site Successfully Updated","success");
			redirect("general/update-social-site/".$id);
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Social Site","error");
			redirect("general/update-social-site/".$id);
	}
}

public function socialsitestatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("fdm_va_social_networking");
		
		if($d){
			if($status=="Active"){
				echo 1;
				//echo $this->alert->pnotify("Success","Successfully Social Site Enabled","success");
			}else{
				echo 0;
				//echo $this->alert->pnotify("Success","Successfully Social Site Disabled","success");	
			}

		}else{
			if($status=="Inactive"){
				echo 2;
				//echo $this->alert->pnotify("Error","Error Occured While Enabling Social Site","error");
			}else{
				echo 3;
				//echo $this->alert->pnotify("Error","Error Occured While Disabling Social Site","error");
			}	
		}
		
		
	}
	
	

public function delSocialsite($id){


	$data = array("deleted"=>1,"status"=>"Inactive");
	$this->db->set($data);
	$this->db->where("id",$id);
	$dd = $this->db->update("fdm_va_social_networking");

	if($dd){
	  $this->alert->pnotify("success","Social Site Successfully Deleted","success");
		//redirect("pages/news-and-community/".$pid);
      }else{
      	$this->alert->pnotify("error","Error Occured While Deleting Social Site","error");
		//redirect("pages/news-and-community/".$pid);
      }

}
	
// Social Networking Ends	

	

// Location

public function insertLocation(){

	$loc_name = $this->input->post("location",true);
//	$dCharges = $this->input->post("deliveryCharges",true);
//	$cutCharges = $this->input->post("cutoffCharges",true);
	
	$lchk = $this->db->get_where("tbl_locations",array("location"=>$loc_name))->num_rows();
	
	if($lchk == 1){
		
		$this->alert->pnotify("error","Location Already Exists","error");
		
		redirect("general");
		
	}
	
	
	  	$config['upload_path']          = "uploads/general/locations/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_width']            = 500;
        $config['max_height']           = 500;
		
        $this->load->library('upload', $config);
		
		if($this->upload->do_upload("image")){
		
		$d=$this->upload->data();
		
 			$icon = "uploads/general/locations/".$d['file_name'];
 		
 		}else{

 			$this->alert->pnotify("error","Please Select Valid Image","error");
			redirect("general");

 		}
	
	
 	$data = array(
 		
 		"location" => $loc_name,
 		"created_date" => date("Y-m-d"),
		"image" => $icon,
//		"deliveryCharges" => $dCharges,
//		"cutoffCharges" => $cutCharges
 
 	);	

 	$sn = $this->db->insert("tbl_locations",$data);

 	if($sn){

 			$this->alert->pnotify("success","Location Successfully Added","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Adding Location","error");
			redirect("general");
	}
}


public function updateLocation($id){
	$data["c"] = $this->db->query("select * from fdm_va_general_contact where deleted=0 and status='Active'")->row();
	$data['soc'] = '';
	$data['loc'] = $this->db->query("select * from tbl_locations where deleted=0 and id=$id")->row();;
	$data['areas'] = "";
	$data['slider'] = "";
	$this->load->view("general/general",$data);

}

public function editLocation(){

	$id = $this->input->post("loc_id");
	$loc_name = $this->input->post("location",true);
//	$dCharges = $this->input->post("deliveryCharges",true);
//	$cutCharges = $this->input->post("cutoffCharges",true);

	$schk = $this->db->get_where("tbl_locations",array("location" => $loc_name,"id"=>$id))->row();

	if($schk->location==$loc_name){

		$data = array("location" => $loc_name);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_locations");
		
		
	}else{
		$nchk1 = $this->db->get_where("tbl_locations",array("location"=>$loc_name,"deleted"=>0))->num_rows();	
		if($nchk1>=1){
			$this->alert->pnotify("error","$loc_name Already Exists","error");
			redirect("general/update-location/".$id);
		}else{	
		$data = array("location" => $loc_name);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_locations");
			
			
		}
	}
	
		if($_FILES['image']['size']!='0'){
	  	$config['upload_path']          = "uploads/general/locations/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_width']            = 500;
        $config['max_height']           = 500;
		
        $this->load->library('upload', $config);
		
		if($this->upload->do_upload("image")){
		
		$d=$this->upload->data();
		
 		$icon = "uploads/general/locations/".$d['file_name'];
 	
 		unlink($schk->image);
 		}else{

 			$this->alert->pnotify("error","Please Select Valid Image","error");
			redirect("general/update-location/".$id);

 		}

 	}else{
 		$icon = $schk->image;
 	}	

	
		 $data = array("image" => $icon/*,"deliveryCharges" => $dCharges,"cutoffCharges" => $cutCharges*/);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_locations");

 	if($c){

 			$this->alert->pnotify("success","Location Successfully Updated","success");
			redirect("general/update-location/".$id);
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Location","error");
			redirect("general/update-location/".$id);
	}
}

public function Locationstatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_locations");
		
		if($d){
			if($status==1){
				echo 1;
				//echo $this->alert->pnotify("Success","Successfully Social Site Enabled","success");
			}else{
				echo 0;
				//echo $this->alert->pnotify("Success","Successfully Social Site Disabled","success");	
			}

		}else{
			if($status==0){
				echo 2;
				//echo $this->alert->pnotify("Error","Error Occured While Enabling Social Site","error");
			}else{
				echo 3;
				//echo $this->alert->pnotify("Error","Error Occured While Disabling Social Site","error");
			}	
		}
		
		
	}
	
	

public function delLocation($id){


	$data = array("deleted"=>1,"status"=>0);
	$this->db->set($data);
	$this->db->where("id",$id);
	$dd = $this->db->update("tbl_locations");

	if($dd){
	  $this->alert->pnotify("success","Location Successfully Deleted","success");
		//redirect("pages/news-and-community/".$pid);
      }else{
      	$this->alert->pnotify("error","Error Occured While Deleting Location","error");
		//redirect("pages/news-and-community/".$pid);
      }

}
	
// Location Ends	

	

	
// areas

public function insertArea(){

	$loc_name = $this->input->post("location",true);
	$area = $this->input->post("area",true);
	
//	$lchk = $this->db->get_where("tbl_locations",array("location"=>$loc_name))->num_rows();
//	
//	if($lchk == 1){
//		
//		$this->alert->pnotify("error","Location Already Exists","error");
//		
//		redirect("general");
//		
//	}
	
 	$data = array(
 		
 		"city_id" => $loc_name,
		"area_name" => $area
 
 	);	

 	$sn = $this->db->insert("tbl_areas",$data);

 	if($sn){

 			$this->alert->pnotify("success","Area Successfully Added","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Adding Area","error");
			redirect("general");
	}
}


public function updateArea($id){
	$data["c"] = $this->db->query("select * from fdm_va_general_contact where deleted=0 and status='Active'")->row();
	$data['soc'] = '';
	$data['areas'] = $this->db->query("select * from tbl_areas where deleted=0 and id=$id")->row();
	$data['loc'] = "";
	$data['slider'] = "";
	
	$this->load->view("general/general",$data);

}

public function editArea(){

	$id = $this->input->post("area_id");
	$loc_name = $this->input->post("location",true);
	$area = $this->input->post("area",true);
	
//	$schk = $this->db->get_where("tbl_locations",array("location" => $loc_name,"id"=>$id))->row();
//
//	if($schk->location==$loc_name){
//
//		$data = array("location" => $loc_name);
//
//		 $this->db->set($data);
//		 $this->db->where("id",$id);
//		 $c = $this->db->update("tbl_locations");
//		
//		
//	}else{
//		$nchk1 = $this->db->get_where("tbl_locations",array("location"=>$loc_name,"deleted"=>0))->num_rows();	
//		if($nchk1>=1){
//			$this->alert->pnotify("error","$loc_name Already Exists","error");
//			redirect("general/update-location/".$id);
//		}else{	
//		$data = array("location" => $loc_name);
//
//		 $this->db->set($data);
//		 $this->db->where("id",$id);
//		 $c = $this->db->update("tbl_locations");
//			
//			
//		}
//	}
//	
		 $data = array(
 		
			"city_id" => $loc_name,
			"area_name" => $area

		);	

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_areas");

 	if($c){

 			$this->alert->pnotify("success","Area Successfully Updated","success");
			redirect("general/update-area/".$id);
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Area","error");
			redirect("general/update-area/".$id);
	}
}

public function areastatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_areas");
		
		if($d){
			if($status=="Active"){
				echo 1;
				//echo $this->alert->pnotify("Success","Successfully Social Site Enabled","success");
			}else{
				echo 0;
				//echo $this->alert->pnotify("Success","Successfully Social Site Disabled","success");	
			}

		}else{
			if($status=="Inactive"){
				echo 2;
				//echo $this->alert->pnotify("Error","Error Occured While Enabling Social Site","error");
			}else{
				echo 3;
				//echo $this->alert->pnotify("Error","Error Occured While Disabling Social Site","error");
			}	
		}
		
		
	}

public function delArea($id){


	$data = array("deleted"=>1,"status"=>0);
	$this->db->set($data);
	$this->db->where("id",$id);
	$dd = $this->db->update("tbl_areas");

	if($dd){
	  $this->alert->pnotify("success","area Successfully Deleted","success");
		//redirect("pages/news-and-community/".$pid);
      }else{
      	$this->alert->pnotify("error","Error Occured While Deleting area","error");
		//redirect("pages/news-and-community/".$pid);
      }

}
	
// areas Ends		
	


// charges starts
	

public function insertCharges(){

	$loc_name = $this->input->post("location",true);
	$dCharges = $this->input->post("deliveryCharges",true);
	$cCharges = $this->input->post("cutoffCharges",true);
	$mCharges = $this->input->post("minCharges",true);
	$chargeType = $this->input->post("chargeType",true);
	$orderType = $this->input->post("orderType",true);

	if($chargeType == "deliveryCharges"){
		
		$delCharges = $dCharges;
		$coffCharges = $cCharges;
		$minCharges = "";
		
	}else{
		
		$delCharges = "";
		$coffCharges = "";
		$minCharges = $mCharges;
		
	}
	
	$cChk = $this->db->get_where("tbl_charges",array("deliveryType"=>$orderType,"city_id"=>$loc_name))->num_rows();
	
	if($cChk == 1){
		
		$this->alert->pnotify("error","Already added","error");
		redirect("general");
		
	}
	
	
 	$data = array(
 		
 		"city_id" => $loc_name,
 		"chargeType" => $chargeType,
		"deliveryType" => $orderType,
		"deliveryCharges" => $delCharges,
		"cutoffCharges" => $coffCharges,
		"minimumCharges" => $minCharges
 
 	);	

 	$sn = $this->db->insert("tbl_charges",$data);

 	if($sn){

 			$this->alert->pnotify("success","Successfully Added","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Adding","error");
			redirect("general");
	}
}
public function updateCharges(){

	$id = $this->input->post("c_id",true);
	$loc_name = $this->input->post("location",true);
	$dCharges = $this->input->post("deliveryCharges",true);
	$cCharges = $this->input->post("cutoffCharges",true);
	$mCharges = $this->input->post("minCharges",true);
	$chargeType = $this->input->post("chargeType",true);
	$orderType = $this->input->post("orderType",true);

	if($chargeType == "deliveryCharges"){
		
		$delCharges = $dCharges;
		$coffCharges = $cCharges;
		$minCharges = "";
		
	}else{
		
		$delCharges = "";
		$coffCharges = "";
		$minCharges = $mCharges;
		
	}
	
	$cChk = $this->db->get_where("tbl_charges",array("deliveryType"=>$orderType,"city_id"=>$loc_name,"id !="=>$id))->num_rows();
	
	if($cChk == 1){
		
		$this->alert->pnotify("error","Already added","error");
		redirect("general");
		
	}
	
 	$data = array(
 		
 		"city_id" => $loc_name,
 		"chargeType" => $chargeType,
		"deliveryType" => $orderType,
		"deliveryCharges" => $delCharges,
		"cutoffCharges" => $coffCharges,
		"minimumCharges" => $minCharges
 
 	);	

 	$sn = $this->db->where("id",$id)->update("tbl_charges",$data);

 	if($sn){

 			$this->alert->pnotify("success","Successfully Updated","success");
			redirect("general");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating","error");
			redirect("general");
	}
}
	
	
public function delCharges($id){


	$dd = $this->db->delete("tbl_charges",array("id"=>$id));

	if($dd){
	  $this->alert->pnotify("success","Successfully Deleted","success");
		//redirect("pages/news-and-community/".$pid);
      }else{
      	$this->alert->pnotify("error","Error Occured While Deleting","error");
		//redirect("pages/news-and-community/".$pid);
      }

}	
	
	
	public function chargestatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_charges");
		
		if($d){
			if($status=="Active"){
				echo 1;
				//echo $this->alert->pnotify("Success","Successfully Social Site Enabled","success");
			}else{
				echo 0;
				//echo $this->alert->pnotify("Success","Successfully Social Site Disabled","success");	
			}

		}else{
			if($status=="Inactive"){
				echo 2;
				//echo $this->alert->pnotify("Error","Error Occured While Enabling Social Site","error");
			}else{
				echo 3;
				//echo $this->alert->pnotify("Error","Error Occured While Disabling Social Site","error");
			}	
		}
		
		
	}	
	
	
// banner
	

public function insertSlider(){
	
	$uid = $this->session->userdata("admin_id");
	$date = date("Y-m-d");

	    if($_FILES['banner_image']['size']!='0'){
			//profile pic uploading
		  		$config['upload_path']          = "uploads/home_slider_images/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
//                $config['encrypt_name']         = TRUE;
//				$config['max_width']            = 2400;
//				$config['max_height']           = 580;
//			    $config['min_width']            = 1420;
//				$config['min_height']           = 280;	
			
                $this->load->library('upload', $config);
		
		$dd=$this->upload->do_upload("banner_image");
			if($dd){
				
				$d = $this->upload->data();
				$bimage = 'uploads/home_slider_images/'.$d['file_name'];

			}else{
				$this->alert->pnotify("error","Please Select Valid Image","error");
				redirect("general");
			}
		}
		$data = array(

			"images" => $bimage,
			"created_by" => $uid,
			"created_date" => $date	

		);

		$banner = $this->db->insert("fdm_va_home_slider_images",$data);

	  if($banner){
        $this->alert->pnotify("success","Banner Image Successfully Added","success");
		redirect("general");
      }else{
      	$this->alert->pnotify("error","Error Occured While Adding Banner Image","error");
		redirect("general");
      }
}

	
public function editSlider($id){
	
	$data["c"] = $this->db->query("select * from fdm_va_general_contact where deleted=0 and status='Active'")->row();
	$data['soc'] = '';
	$data['areas'] ='';
	$data['loc'] = "";
	$data['slider'] = $this->db->query("select * from fdm_va_home_slider_images where deleted=0 and id=$id")->row();
	$this->load->view("general/general",$data);

}	
	
	
public function updateSlider(){
	
	$bid = $this->input->post("bid");
	$uid = $this->session->userdata("admin_id");
	$date = date("Y-m-d");

	$bi = $this->db->get_where("fdm_va_home_slider_images",array("id"=>$bid))->row();

		
	 if($_FILES['banner_image']['size']!='0'){
			//profile pic uploading
		  		$config['upload_path']          = "uploads/home_slider_images/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
//                $config['encrypt_name']         = TRUE;
//				$config['max_width']            = 2400;
//				$config['max_height']           = 580;
//			    $config['min_width']            = 1420;
//				$config['min_height']           = 280;	
			
                $this->load->library('upload', $config);
		
		$dd=$this->upload->do_upload("banner_image");
			if($dd){
				
				$d = $this->upload->data();

				$bimage = 'uploads/home_slider_images/'.$d['file_name'];

				unlink($bi->images);
				
				
			}else{
				$this->alert->pnotify("error","Please Select Valid Image","error");
				redirect("general/update-slider/".$bid);
			}
		}else{
			
			
			$bimage=$bi->images;
			
		}

		$data = array(

			"images" => $bimage,
			"updated_by" => $uid,
			"updated_date" => $date		

		);

		$this->db->set($data);
		$this->db->where("id",$bid);
		$banner = $this->db->update("fdm_va_home_slider_images");

	  if($banner){
        $this->alert->pnotify("success","Banner Image Successfully Updated","success");
		redirect("general");
      }else{
      	$this->alert->pnotify("error","Error Occured While Updating Banner Image","error");
		redirect("general");
      }
}
		
public function bannerStatus(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("fdm_va_home_slider_images");
		
		if($d){
			if($status=="Active"){
				echo 1;
			}else{
				echo 0;	
			}

		}else{
			if($status=="Active"){
				echo 2;
			}else{
				echo 0;
			}	
		}
		
		
	}	
	
	
public function delImg(){

	$url = $_SERVER["HTTP_HOST"];
	$id = $this->input->post_get("id",true);

	$di = $this->db->get_where("fdm_va_home_slider_images",array("id"=>$id))->row();
	if($di->images){

		// $link = $url."/"freedom_bank/$di->images"";
		$del = unlink($di->images);
		
		if($del){
			$d = $this->db->delete("fdm_va_home_slider_images",array("id"=>$id));
			if($d){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

}
	
public function updateReferalbonus(){
	
	$bonus = $this->input->post("referalbonus");
	$min_referal_reward_amount = $this->input->post("min_referal_reward_amount");
	$min_purchase_amount = $this->input->post("min_purchase_amount");
	$delivery_charges = $this->input->post("delivery_charges");
	$carry_bag = $this->input->post("carry_bag");
	
	$d = $this->db->where("option_name","reward_points")->update("fdm_va_options",array("option_value"=>$bonus));
	$d = $this->db->where("option_name","min_referal_reward_amount")->update("fdm_va_options",array("option_value"=>$min_referal_reward_amount));
	$d = $this->db->where("option_name","min_purchase_amount")->update("fdm_va_options",array("option_value"=>$min_purchase_amount));
	$d = $this->db->where("option_name","delivery_charges")->update("fdm_va_options",array("option_value"=>$delivery_charges));
	$d = $this->db->where("option_name","carry_bag")->update("fdm_va_options",array("option_value"=>$carry_bag));
	
	if($d){
		
		$this->alert->pnotify("success","Successfully Updated","success");
		redirect("general");
    }else{
      	$this->alert->pnotify("error","Error Occured","error");
		redirect("general");
    }

}	
	

}

