<?php admin_header(); ?>

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php admin_sidebar() ?> 
       
       
<style type="text/css">
	.select2-container--default .select2-selection--multiple .select2-selection__choice{

		background-color: #4798e8;
	}					
</style>        
       
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <div class="d-flex no-block justify-content align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Client</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

          

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">
            <!-- ============================================================== -->
              <!-- Card -->
            <div class="card">
                <div class="card-header">
                   <div class="row">
                   	  <div class="col-md-10">
                    	<i class="fa fa-user"></i> Create Client
                      </div>
                      <div class="col-md-2" style="text-align: right">
                       <a href="<?php echo base_url() ?>agents/all-agents">	
                    	<button class="btn btn-success waves-effect waves-light">All Clients</button>
                       </a>	
                      </div>	
                   </div> 	
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>agents/insertAgent">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Employee User</h4> -->
                                    <div class="row">
                                       <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Client ID
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                                    <input type="text" name="agent_id" class="form-control" placeholder="Client ID" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Name
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                                    <input type="text" name="agent_name" class="form-control" id="name" placeholder="Name" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Email
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                                    <input type="email" class="form-control" name="agent_email" id="email" placeholder="Email" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Mobile Number
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="m-r-10 mdi mdi-cellphone"></i></span></div>
                                                    <input type="text" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile_number" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                      
                                         


                                    </div>

                                     <div class="row">
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                City
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-location-arrow"></i></span></div>

                                                   <select class="form-control" id="city" name="city" required>
                                                       <option value="">Select City</option>
                                                    <?php $rr = $this->db->get_where("tbl_locations",array("status"=>1,"deleted"=>0))->result(); 
                                                          foreach ($rr as $r) {
                                                               
                                                    ?>  
                                                    <option value="<?php echo $r->id ?>"><?php echo $r->location ?></option>
                                                   <?php } ?>
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Area
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-location-arrow"></i></span></div>

                                                   <select class="form-control" id="area" name="area" required>
                                                       <option value="">Select Area</option>
                                                    
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Password
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
                                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Status
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-info-circle"></i></span></div>
                                                    
                                                    <select class="form-control" id="user_status" name="status" required>
                                                       <option value="">Select Status</option>
                                                       <option value="Active">Active</option> 
                                                       <option value="Inactive">In Active</option>
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                         

                                    </div>    

									<div class="row">
                                            
                                          
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Address
                                                <div class="input-group">
<!--                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="m-r-10 mdi mdi-cellphone"></i></span></div>-->
                                                    <textarea class="form-control" placeholder="Address" name="address" required rows="3"></textarea>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-3 col-md-3" align="right">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12" style="margin-top: 20px;">
                                                
                                               <!--  <div class="input-group">
                                                    <div class="input-group-prepend"> -->

                                                    <button type="submit" class="btn btn-info waves-effect waves-light" style="width: 100%">Save</button>
                                                  
                                                <!--   </div>
                                                    
                                                    
                                                </div> -->

                                                </div>
                                            </div>
                                        </div>        

									</div>
									
												
																		


                                </div>
                              
                               
                               
                            </form>

                        

                </div>
            </div>

            <!-- End Card  -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>

            <!-- End footer -->

 <script>
	 
$('#agts').select2();	 
$('#salesemp').select2();	 
$('#tinch').select2({
	
//	placeholder : "Select Teritary Incharge"
	
});	 

//var agts = $('#agts').multiSelect(); 
//$('#salesemp').multiSelect(); 

	 
$("#role").change(function(){

	var role = $("#role").val();
	
	if(role == 7){
		
		$("#agents").show();
		$("#agts").attr("required","required");
		
		$("#salesemployees").hide();
		$("#salesemp").removeAttr("required","required");
		
		$("#tincharge").hide();
		$("#tinch").removeAttr("required","required");

		
	}else if(role == 12){

		$("#agents").show();
		$("#agts").attr("required","required");
		
		$("#salesemployees").show();
		$("#salesemp").attr("required","required");
		
		$("#tincharge").hide();
		$("#tinch").removeAttr("required","required");
		
//		return false;
		
	}else if(role == 11){
		

		$("#agents").show();
		$("#agts").attr("required","required");
		
		$("#salesemployees").show();
		$("#salesemp").attr("required","required");
		
		$("#tincharge").show();
		$("#tinch").attr("required","required");
		
//		return false;
		
	}else{
		
		$("#agents").hide();
		$("#agts").removeAttr("required","required");
		
		$("#salesemployees").hide();
		$("#salesemp").removeAttr("required","required");
		
		$("#tincharge").hide();
		$("#tinch").removeAttr("required","required");
		
//		return false;
	}
	
	
});
	 
	
$("#salesemp").change(function(){
	
	var selected=[];
	$('#salesemp :selected').each(function(){
		selected.push($(this).val());
	});
	

	$.ajax({
		url:"<?php echo base_url();?>ajax/getAgents",
		data:{id:selected},
		type:"GET",
//		dataType : "json",
		success:function(data){
			
			$('#agts').html(data);
//			$('#agts').val(data.ags).trigger('change');

//			console.log(data);
			
		},error:function(data){
			
//			console.log(data);
		}
	})
});
	 
	 
$("#tinch").change(function(){
	
	var selected=[];
	$('#tinch :selected').each(function(){
		selected.push($(this).val());
	});
	

	$.ajax({
		url:"<?php echo base_url();?>ajax/getSemployees",
		data:{id:selected},
		type:"GET",
//		dataType : "json",
		success:function(data){
			
			$('#salesemp').html(data);
//			$('#agts').val(data.ags).trigger('change');

//			console.log(data);
			
		},error:function(data){
			
//			console.log(data);
		}
	})
});		 
	 
$("#city").change(function(){


	var i=$("#city").val();

	$.ajax({
		url:"<?php echo base_url();?>ajax/getAreas",
		data:{id:i},
		type:"GET",
		success:function(data){

			$("#area").html(data);
		}
	})
});	
</script>          