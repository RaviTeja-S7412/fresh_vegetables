<?php admin_header(); 

$id = $this->uri->segment(3);
?>

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
                                    <li class="breadcrumb-item active" aria-current="page"><? echo ($id != "") ? "Update" : "Create" ?> Vendor</li>
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
                    	<i class="fa fa-user"></i> <? echo ($id != "") ? "Update" : "Create" ?> Vendor
                      </div>
                      <div class="col-md-2" style="text-align: right">
                       <a href="<?php echo base_url() ?>vendors">	
                    	<button class="btn btn-success waves-effect waves-light">All Vendors</button>
                       </a>	
                      </div>	
                   </div> 	
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>vendors/<? echo ($id != "") ? "updateAgent" : "insertAgent" ?>">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Employee User</h4> -->
                                    <div class="row">
                                       <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Vendor Name
                                                <div class="input-group">
                                                    <input type="text" name="vendor_name" value="<? echo isset($u->vendor_name) ? $u->vendor_name : "" ?>" class="form-control" placeholder="Vendor Name" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                GSTIN Number
                                                <div class="input-group">
                                                    <input type="text" name="gstin_number" value="<? echo isset($u->gstin_number) ? $u->gstin_number : "" ?>" class="form-control" id="name" placeholder="Vendor GSTIN Number" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Mobile Number
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<? echo isset($u->mobile_number) ? $u->mobile_number : "" ?>" id="mobile" placeholder="Mobile Number" name="mobile_number" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                      <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Alternate Mobile Number
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<? echo isset($u->alternate_number) ? $u->alternate_number : "" ?>" id="mobile" placeholder="Alternate Mobile Number" name="alternate_number">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Email
                                                <div class="input-group">
                                                    <input type="email" class="form-control" id="mobile" value="<? echo isset($u->email) ? $u->email : "" ?>" placeholder="email" name="email" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Bank Account Number
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mobile" value="<? echo isset($u->bank_account_number) ? $u->bank_account_number : "" ?>" placeholder="Vendor Bank Account Number" name="bank_account_number" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Branch
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mobile" value="<? echo isset($u->bank_branch) ? $u->bank_branch : "" ?>" placeholder="Branch" name="bank_branch" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                IFSC Code
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="mobile" value="<? echo isset($u->bank_ifsc) ? $u->bank_ifsc : "" ?>" placeholder="IFSC Code" name="bank_ifsc" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Address
                                                <div class="input-group">
<!--                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="m-r-10 mdi mdi-cellphone"></i></span></div>-->
                                                    <textarea class="form-control" placeholder="Address" name="address" required rows="3"> <? echo isset($u->address) ? $u->address : "" ?></textarea>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
<!--
                                        <div class="col-sm-12 col-lg-3 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Status
                                                <div class="input-group">
													<? $status = isset($u->status) ? $u->status : "" ?>		                                                    
                                                    <select class="form-control" id="user_status" name="status" required>
                                                       <option value="">Select Status</option>
                                                       <option value="Active" <? echo ($status == "Active") ? 'selected': '' ?> >Active</option> 
                                                       <option value="Inactive" <? echo ($status == "Inactive") ? 'selected': '' ?>>In Active</option>
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
-->
                                        
									</div>  
									<div class="row">
                                            
                                          
                                        
                                        <div class="col-sm-12 col-lg-3 col-md-3" align="right">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12" style="margin-top: 20px;">
                                                
                                               <!--  <div class="input-group">
                                                    <div class="input-group-prepend"> -->
                                                    <? if($id != ""){ ?>
                                                    
													 	<input type="hidden" name="id" value="<? echo $id ?>">
                                                   
                                                    <? } ?>
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