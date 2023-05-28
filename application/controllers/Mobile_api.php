<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Mobile_api extends REST_Controller 
{
 public function __construct() 
       {
        parent::__construct();
       
           $this->load->helper(array('form', 'url','date'));
		   $this->load->database();
		   $this->load->model('user_model');
		    $this->load->model('offers_api');
		   date_default_timezone_set('Asia/Kolkata');
	    }

	public function switchDatabase($cdb){
		
		$this->db->db_select("$cdb");
		
	}
	
	public function pbanner_post(){
	
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->offer_banners();
// 		$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	
	public function consolidation_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$aid = $this->input->post('userid');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$data = $this->user_model->consolidation_data($aid,$date,$shift);
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	
	 public function deliveredorders_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
		$data = $this->user_model->delivered_orders($this->input->post('userid'));
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function pdqty_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->allProductquantity($this->input->post('userid'));
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function filterpdqty_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->filterProductquantity($this->input->post());
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	    
    public function subscribestatusupdate_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->sstatus_update($this->input->post());
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
      
     public function viewindent_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
	
		$data = $this->user_model->indent_view($this->input->post());
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function indentupdate_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->indent_update($this->input->post());
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
    public function myindents_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->my_indents($this->input->post());
		//$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function cancleindent_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->cancle_indent($this->input->post());
		
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
    public function logo_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = base_url().$this->db->get_where("fdm_va_general_logo",array("logo_type"=>"Header"))->row()->logo;
		$this->response($data, REST_Controller::HTTP_OK); exit();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function indentorder_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
        $data = $this->user_model->indent_order($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	
	public function step1_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		
		$data = $this->user_model->insert_number($num);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function passwordotp_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		$data = $this->user_model->forgot_otp($num);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function check_forgototp_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		$otp = $this->input->post("otp");

		$data = $this->
		user_model->checkforgot_otp($num,$otp);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	
	public function login_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		$pass = $this->input->post("password");
		$data = $this->user_model->do_login($num,$pass);
		if($data['status'])
		{
			$this->response($data, REST_Controller::HTTP_OK);
		}else
		{
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}
	public function agentlogin_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		$pass = $this->input->post("password");
		$data = $this->user_model->agent_login($num,$pass);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
    
    
    public function resendotp_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
        $num = $this->input->post("mobile");
        $data = $this->user_model->resend_otp($num);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
    }
	public function checkotp_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$num = $this->input->post("mobile");
		$otp = $this->input->post("otp");

		$data = $this->
		user_model->check_otp($num,$otp);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
	}
	

	public function shreejalocations_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$data = $this->user_model->shreeja_locations();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}

	public function locationupdate_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$userid = $this->input->post("userid");
		$locid = $this->input->post("location");
		$data = $this->user_model->location_update($userid,$locid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}

	public function personaldataupdate_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);		

		$data = $this->
		user_model->personal_update($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function passwordupdate_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);		

		$data = $this->
		user_model->password_update($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}

	public function userdata_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$userid = $this->input->post("userid");
		$data = $this->user_model->get_user($userid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function shreeja_areas_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$lid = $this->input->post("location");
		$data = $this->user_model->areas($lid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}

	public function products_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$lid = $this->input->post("cid");
		$uid = $this->input->post("userid");
		$data = $this->user_model->all_products($lid,$uid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function filterproducts_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$lid = $this->input->post("location");
		$uid = $this->input->post("userid");
		$key = $this->input->post("search");
		$data = $this->user_model->filter_products($lid,$uid,$key);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
    
    public function product_view_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$pid = $this->input->post("productid");
		$data = $this->user_model->product_view($pid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
    
    public function sproduct_view_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
        $id = $this->input->post("id");
		$data = $this->user_model->sample_product_view($id);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
        
    }
	public function freesample_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$lid = $this->input->post("location");
		$data = $this->user_model->free_sample($lid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	public function order_freesample_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $id = $this->input->post("id");
	     $uid = $this->input->post("userid");
	  $ddate = $this->input->post("delivery_date");
	  $address = $this->input->post("shipping_address"); 
	  $shift = $this->input->post("shift");
	    $data = $this->user_model->insertSampleOrder($uid,$ddate,$address,$id,$shift);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function orderproduct_post(){
	    
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $data = $this->user_model->order_product($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	public function paymentstatus_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $data = $this->user_model->order_status();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	
	public function pauseorder_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $data = $this->user_model->pausesubscribtion($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	public function myorders_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $uid = $this->input->post("userid");
	    $data = $this->user_model->my_orders($uid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	
	public function mypayments_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $uid = $this->input->post("userid");
	    $data = $this->user_model->my_payments($uid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	
	public function subscribeproduct_details_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $uid = $this->input->post("userid");
	    $oid = $this->input->post("orderid");
	    $data = $this->user_model->subscribe_dates($uid,$oid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}
			
			
	}
	

	public function addtocart_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    header('Content-type: application/json');
	    $uid = $this->input->post('userid');
	    $object = $this->input->post('object');
	    
	      $data = $this->user_model->add_cart($object,$uid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function getcart_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	      $data = $this->user_model->get_cart($userid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function updatecart_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	      $data = $this->user_model->update_cart($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function emptycart_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	      $data = $this->user_model->empty_cart($userid);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function offers_post(){
	
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->my_offers();
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function agentorders_post(){

		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	     $date = ($this->input->post('date'))?$this->input->post('date'):"";
	      $data = $this->user_model->active_agent_list($userid, $date);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function filteractive_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	     $date = ($this->input->post('date'))?$this->input->post('date'):"";
	      $data = $this->user_model->filter_active_orders($userid, $date);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	public function filterdelivered_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	    $userid = $this->input->post('userid');
	     $date = ($this->input->post('date'))?$this->input->post('date'):"";
	      $data = $this->user_model->filter_delivered_orders($userid, $date);
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	
	}
	
	public function agentdeliveryonce_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->deliveryonce_orders($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
    public function agentfreesample_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->freesample_orders($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
	 
    public function agentsubscribeorders_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->agent_subscribed_orders($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }   
    public function checkpromocode_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->checkPromo($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
	
	 public function viewagentorder_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->viewagent_order($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
     public function viewagentfreesample_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->viewagent_freesample($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
	 public function agentprofile_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->agent_profile($this->input->post('userid'));
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
     public function agentprofileupdate_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->agent_profile_update($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
     public function agentpasswordupdate_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->agent_password_update($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
    public function agentdeliverystatus_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->updateDeliverystatus($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
    public function cancleorder_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
	      $data = $this->user_model->cancle_order($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
     public function getgst_post(){
       
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
	      $data = $this->user_model->get_gst($this->input->post());
		if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
    }
    
    
    
     public function generateInvoice_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		 
		$oid = $this->input->get('orderid');
	     $od = $this->db->get_where("orders",array("order_id"=>$oid,"payment_status"=>"Success"))->num_rows();
	     $fod = $this->db->get_where("tbl_free_sample_orders",array("order_id"=>$oid))->row();
	     if($od > 0){
	         $mydata =  $this->db->get_where("orders",array("order_id"=>$oid,"payment_status"=>"Success"))->row();
	     }else{
	         $mydata = $fod;
	     }
		$dd["o"] = $mydata;
		$data =  $this->load->view('paytm/invoice',$dd);	
	    $this->response($data, REST_Controller::HTTP_OK); exit();
	     //$this->response($data, REST_Controller::HTTP_OK); 
	    	if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
	}
    
    public function agentproducts_post(){
	
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$location = $this->input->post('location');
	     $data = $this->user_model->agent_products($location);
	    	if($data['status'])
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}else
			{
				$this->response($data, REST_Controller::HTTP_OK);
			}	 
	}
	
	public function userNotifications_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$uid = $this->input->post("uid");
		
		$data = $this->db->order_by("id","desc")->get_where("tbl_user_notifications",array("user_id"=>$uid))->result_array();
		
		if(count($data) > 0)
		{
			$ndata = array("status"=>true, "data"=>$data);
			$this->response($ndata, REST_Controller::HTTP_OK);
		}else
		{
			$ndata = array("status"=>false, "data"=>"");
			$this->response($ndata, REST_Controller::HTTP_OK);
		}
		
		
	}
	
	public function renewSubscription_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$oid = $this->input->post("order_id");
		$uid = $this->input->post("user_id");
		
		$ordChk = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid,"is_renew"=>"Inactive"))->num_rows();
		
		
		if($ordChk == 1){
			
			$odata = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid,"is_renew"=>"Inactive"))->row();
			$opdata = $this->db->get_where("order_products",array("order_id"=>$oid))->result();
			
			if(count($opdata) > 0){
				
				$this->db->where("userid",$uid)->delete("tbl_cart");
	    
				foreach($opdata as $op){
				    
				    if($op->orderRef != "offer"){
					
    					$data = array("userid"=>$uid, "product_id"=>$op->product_id,"product_cat"=>$op->category,"qty"=>$op->qty,"price"=>$op->price);  
    	        
    					$d = $this->db->insert("tbl_cart",$data);
	        
				    }
				}
				
				
				if($d){
					$ndata = array("status"=>true, "msg"=>"successfully added to cart");
					$this->response($ndata, REST_Controller::HTTP_OK);
				}else
				{
					$ndata = array("status"=>false, "data"=>"error occured");
					$this->response($ndata, REST_Controller::HTTP_OK);
				}
			}else{
			    
			    $ndata = array("status"=>false, "data"=>"error occured");
					$this->response($ndata, REST_Controller::HTTP_OK);
			}
			
		}else{
			
			$ndata = array("status"=>false, "msg"=>"Already renewed");
			$this->response($ndata, REST_Controller::HTTP_OK);
			
		}
		
		
	}
	
	public function notification_icon_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$ndata = array("status"=>true, "icon"=>base_url()."assets/icon.ico");
		$this->response($ndata, REST_Controller::HTTP_OK);
		
	}
	
	public function allCategories_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$uid = $this->input->post("userid");
		$data = $this->user_model->all_categories($uid);
		if($data['status'])
		{
			$this->response($data, REST_Controller::HTTP_OK);
		}else
		{
			$this->response($data, REST_Controller::HTTP_OK);
		}
	}
	
	public function repeatorder_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$oid = $this->input->post("order_id");
		$uid = $this->input->post("user_id");
		
		$ordChk = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid))->num_rows();
		
		if($ordChk == 1){
			
			$odata = $this->db->get_where("orders",array("order_id"=>$oid,"user_id"=>$uid))->row();
			$opdata = $this->db->get_where("order_products",array("order_id"=>$oid))->result();
			
			if(count($opdata) > 0){
				
				$this->db->where("userid",$uid)->delete("tbl_cart");
	    
				foreach($opdata as $op){
				        
					$pdata = json_decode($this->db->get_where("tbl_products",array("id"=>$op->product_id))->row()->product_quantity);

					$price = "";

					foreach($pdata->quantity as $k => $qty){

						if($qty == $op->category){

							$price = $pdata->sp[$k];

						}

					}
					
					$data = array("userid"=>$uid, "product_id"=>$op->product_id,"product_cat"=>$op->category,"qty"=>$op->qty,"price"=>$price);  

					$d = $this->db->insert("tbl_cart",$data);
	        
				}
				
				
				if($d){
					$ndata = array("status"=>true, "msg"=>"successfully added to cart");
					$this->response($ndata, REST_Controller::HTTP_OK);
				}else
				{
					$ndata = array("status"=>false, "data"=>"error occured");
					$this->response($ndata, REST_Controller::HTTP_OK);
				}
			}else{
			    
			    $ndata = array("status"=>false, "data"=>"error occured");
					$this->response($ndata, REST_Controller::HTTP_OK);
			}
			
		}else{
			
			$ndata = array("status"=>false, "msg"=>"Already renewed");
			$this->response($ndata, REST_Controller::HTTP_OK);
			
		}
		
	}
	
	public function addtowishlist_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$uid = $this->input->post("user_id");
		$pid = $this->input->post("product_id");
		
		if($pid){
			
			$d = $this->db->insert("tbl_wishlist",array("user_id"=>$uid,"product_id"=>$pid));
			
			if($d){
				$ndata = array("status"=>true, "msg"=>"successfully added to wishlist");
				$this->response($ndata, REST_Controller::HTTP_OK);
			}else
			{
				$ndata = array("status"=>false, "data"=>"error occured");
				$this->response($ndata, REST_Controller::HTTP_OK);
			}
			
		}
		
	}
	
	public function removewishlist_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$uid = $this->input->post("user_id");
		$pid = $this->input->post("product_id");
		
		if($pid){
			
			$d = $this->db->delete("tbl_wishlist",array("user_id"=>$uid,"product_id"=>$pid));
			
			if($d){
				$ndata = array("status"=>true, "msg"=>"successfully removed from wishlist");
				$this->response($ndata, REST_Controller::HTTP_OK);
			}else
			{
				$ndata = array("status"=>false, "data"=>"error occured");
				$this->response($ndata, REST_Controller::HTTP_OK);
			}
			
		}
		
	}
	
	public function wishlist_post(){
		
		$cdb = $this->input->post("client_database");
		$this->switchDatabase($cdb);
		
		$uid = $this->input->post("user_id");
		if($uid){
			
			$data = $this->db->get_where("tbl_wishlist",array("user_id"=>$uid))->result_array();
			
			if($data){
				
				$pdata = [];
				
				foreach($data as $pp){
					
					$pd = $this->db->get_where("tbl_products",array("id"=>$pp["product_id"]))->row_array();
					
//					$data = [];
					if($this->user_model->get_quantity($pp["product_id"],$uid) != null){
					
						$pd['product_price'] = $this->user_model->get_quantity($pp["product_id"],$uid);
                        $pd['is_wishlist'] = true;
						$pdata[] = $pd;
						
					}
				}
				
				$ndata = array("status"=>true, "data"=>$pdata);
				$this->response($ndata, REST_Controller::HTTP_OK);
			}else
			{
				$ndata = array("status"=>false, "data"=>"error occured");
				$this->response($ndata, REST_Controller::HTTP_OK);
			}
			
		}
		
	}
	
}