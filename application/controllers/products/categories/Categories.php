<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends CI_Controller {
public function __construct(){
			
	parent::__construct();
	$this->secure->loginCheck();


}
public function index(){
	
	$this->load->view("products/categories/categories");

}

public function editCategory($id){
	
	$data["cat"] = $this->db->get_where("tbl_categories",array("id"=>$id))->row();
	$this->load->view("products/categories/categories",$data);

}
public function insertCategory(){
	
	$cname = $this->input->post("cat_name");
	$bname = $this->input->post("brand");
	
	$cchk = $this->db->get_where("tbl_categories",array("category_name"=>$cname))->num_rows();
	
	if($cchk == 1){
		
		$this->alert->pnotify("error","Category Already Exists","error");
		
		redirect("products/categories");
		
	}
	
	$config['upload_path']          = 'uploads/categories/';
    $config['allowed_types']        = 'jpg|jpeg';
//    $config['encrypt_name']             = TRUE;
	$config['overwrite'] = TRUE;
	
	
    $this->load->library('upload', $config);
		
	$this->upload->do_upload("cat_img");
		
	$d=$this->upload->data();
		
	$pr_image='uploads/categories/'.$d['file_name'];

	
	$data = array("category_name" => $cname, "image" => $pr_image,"brand_name"=>$bname, "created_date" => date("Y-m-d H:i:s"));

	$c = $this->db->insert("tbl_categories",$data);
	
	if($c){
			
			$this->alert->pnotify("success","Category Created Successfully","success");
			redirect("products/categories");
			
	}else{

			$this->alert->pnotify("error","Error Occured Please Try Again","error");
			redirect("products/categories");
	}
	
	
}


public function updateCategory(){
	
	$id = $this->input->post("cid");
	$cname = $this->input->post("cat_name");
	$bname = $this->input->post("brand");
	
	$da = $this->db->get_where("tbl_categories",array("id"=>$id,"deleted"=>0))->row();
	
	$nchk = $this->db->get_where("tbl_categories",array("category_name"=>$cname,"id"=>$id,"deleted"=>0))->row();

	
	if($_FILES['cat_img']['size']!='0'){

	
		$config['upload_path']          = 'uploads/categories/';
		$config['allowed_types']        = 'png|jpg|jpeg';
		//    $config['encrypt_name']             = TRUE;
		$config['overwrite'] = TRUE;
		
        $this->load->library("upload", $config);
		$this->upload->do_upload("cat_img");

		$d=$this->upload->data();

		$pr_image='uploads/categories/'.$d['file_name'];
		
		
	}else{
		
		$pr_image = $da->image;
		
	}
	
	
	if($nchk->category_name==$cname){

		$data = array("category_name" => $cname,"brand_name"=>$bname,"image"=>$pr_image);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_categories");
		
		 $this->alert->pnotify("success","Category Updated Successfully","success");
		 redirect("products/categories");
		
		

	}else{
		$nchk1 = $this->db->get_where("tbl_categories",array("category_name"=>$cname,"deleted"=>0))->num_rows();	
		if($nchk1>=1){
			$this->alert->pnotify("error","Category Already Exists","error");
			redirect("products/edit-category/".$id);
		}else{	
		$data = array("category_name" => $cname,"brand_name"=>$bname,"image"=>$pr_image);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $c = $this->db->update("tbl_categories");
			
		 $this->alert->pnotify("success","Category Updated Successfully","success");
		 redirect("products/categories");
			
			
		}
	}
	
	
	if($c){
			
			$this->alert->pnotify("success","Category Updated Successfully","success");
			redirect("products/categories");
			
	}else{

			$this->alert->pnotify("error","Error Occured Please Try Again","error");
			redirect("products/categories");
	}
	
	
}	
	

	

public function delCat($id){
	
	$c = $this->db->delete("tbl_categories",array("id"=>$id));

	if($c){
			
			$this->alert->pnotify("success","Category deleted Successfully","success");
			redirect("products/categories");
			
	}else{

			$this->alert->pnotify("error","Error Occured Please Try Again","error");
			redirect("products/categories");
	}
}	





}
