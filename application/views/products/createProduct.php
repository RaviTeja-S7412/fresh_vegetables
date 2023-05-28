<?php $this->admin->getClientDB();
admin_header(); ?>

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
                                    <li class="breadcrumb-item active" aria-current="page">Create Product</li>
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
                    	<i class="fa fa-user"></i> Create Product
                      </div>
                      <div class="col-md-2" style="text-align: right">
                       <a href="<?php echo base_url() ?>products">	
                    	<button class="btn btn-success waves-effect waves-light">All Products</button>
                       </a>	
                      </div>	
                   </div> 	
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>products/products/insertProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                 <h4 class="card-title" style="margin-bottom: 10px" align="center">Product Details :</h4> 
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Name
                                                <div class="input-group m-t-10">
                                                    <input type="text" name="product_name" class="form-control" id="name" placeholder="Product Name" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product ID
                                                <div class="input-group m-t-10">
                                                    <input type="text" class="form-control" name="product_id" placeholder="Product ID" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Image
                                                <div class="input-group m-t-10">
                                                    <input type="file" class="form-control" name="pr_image" id="designation" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
								
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                City
                                                <div class="input-group m-t-10">
                                                    <select class="select2 form-control" name="location[]" multiple="" id="select2-customize-result" style="width: 100%;" required>
														<option value="">Select City</option>
													<?php
														$loc = $this->db->query("select * from tbl_locations where deleted=0 order by id desc")->result();

														if(count($loc) > 0){
															
														foreach($loc as $l){	
													?>	
							                       
                                                           <option value="<?php echo $l->id ?>"><?php echo $l->location ?></option> 

													<?php }} ?>	
													
													</select>   
                                                </div>

                                                </div>
                                            </div>
                                        </div>
									      
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Banner Image
                                                <div class="input-group m-t-10">
                                                    <input type="file" class="form-control" name="banner_image" id="designation" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div> 
                                                             
                                                                       
                                       <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Category
                                                <div class="input-group m-t-10">
                                                    <select class="form-control" id="" name="product_category" required>
                                                       <option value="">Select Category</option>
                                                    <?php
														$cat = $this->db->query("select * from tbl_categories where deleted=0 order by id desc")->result();

														if(count($cat) > 0){
															
														foreach($cat as $cc){	
														?>	
							                                                   
                                                           <option value="<?php echo $cc->id ?>"><?php echo $cc->category_name  ?></option> 
                                                       
													<?php }} ?>	
                                                   
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>                                                    
                                              
                                          <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Brand Name
                                                <div class="input-group m-t-10">
                                                    <input type="text" class="form-control" name="brandname" placeholder="Brand Name" id="designation" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>                                         
                                                                                                                 
                                                                                  
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Description
                                                <div class="input-group m-t-10">
                                                    <textarea class="form-control" name="pr_desc" id="" rows="3" placeholder="Product Description" required></textarea>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Multiple Images
                                                <div class="input-group m-t-10">
                                                    <input type="file" class="form-control" name="files[]"  multiple="multiple" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                HSN Code
                                                <div class="input-group m-t-10">
                                                    <input type="text" class="form-control" name="hsn_code" placeholder="HSN Code" id="designation" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                                                   
                                       <div class="col-sm-12 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Tax Class
                                                <div class="input-group m-t-10">
                                                    <select class="form-control" id="" name="tax_class" required>
                                                       <option value="">Select Tax Class</option>
                                                       <option value="0">0 %</option> 
                                                       <option value="5">5 %</option> 
                                                       <option value="12">12 %</option> 
                                                       <option value="18">18 %</option> 
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Vendor
                                                <div class="input-group m-t-10">
                                                    <select class="form-control" id="" name="vendor" required>
                                                       <option value="">Select Vendor</option>
                                                    <?php
														$vendor = $this->db->query("select * from tbl_vendors where deleted=0 order by id desc")->result();

														if(count($vendor) > 0){
															
														foreach($vendor as $v){	
														?>	
							                                                   
                                                           <option value="<?php echo $v->id ?>"><?php echo $v->vendor_name  ?></option> 
                                                       
													<?php }} ?>	
                                                   
                                                    </select>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                MSL
                                                <div class="input-group m-t-10">
                                                    <input type="number" class="form-control" name="msl" id="email" placeholder="Minimum Stock Level " required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>

                                        
										
                                  	</div>	
                                   

             <h4 class="card-title" style="margin-bottom: 10px" align="center">Quantity Details :</h4> 
									
              <hr>
                                   
                                   
       <div class="row">
                                                 	
                                   	
                                   	
             <div class="col-md-2">          
                        <div class="form-group">
                          <label class="control-label">Quantity</label>
                            <div class="row m-b-15 field_wrapper">
                              <div class="col-md-12" style="margin-bottom: 10px">
                        
                                <input type="text" name="category[]" class="form-control" placeholder="Quantity" id="sh" required>

                              </div>
                              
                          </div>
                          <small style="color: red; font-weight: bold">Note : Quantity should be as 1 KG or 500 gm etc </small><br>
                          <button type="button" id="add_sheading" class="btn btn-info waves-effect waves-light" style="text-align: right">Add Quantity</button>
                          
                        </div>
          </div>
          
          
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">MRP</label>
                            <div class="row m-b-15 sub_points">
                              <div class="col-md-12" style="margin-bottom: 10px">
                                <input type="text" name="price[]" class="form-control" placeholder="Price" id="points" required>

                              </div>
                              
                            </div>
             </div>
                        	
          </div>
          
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">Selling Price</label>
                            <div class="row m-b-15 sap_points">
                              <div class="col-md-12" style="margin-bottom: 10px">
                                <input type="text" name="dprice[]" class="form-control" placeholder="Price" id="dpoints" required>

                              </div>
                              
                            </div>
             </div>
                        	
          </div>
          
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">Landing Cost Price</label>
                            <div class="row m-b-15 lc_points">
                              <div class="col-md-12" style="margin-bottom: 10px">
                                <input type="text" name="lcprice[]" class="form-control" placeholder="Price" id="lcpoints" required>

                              </div>
                              
                            </div>
             </div>
                        	
          </div>
                                     
          <div class="col-md-2"> 
             <div class="form-group">
			    <label class="control-label">Products In Stock</label>
				<div class="row m-b-15 pis_points">
				  <div class="col-md-12" style="margin-bottom: 10px">
					<input type="number" name="pis[]" class="form-control" placeholder="Products In Stock" value="5" id="pispoints" required>

				  </div>

				</div>
             </div>
                        	
          </div>                           
                                      
      </div> 
                
                                   
                                    
									<div class="row">
                                       <div class="col-md-9 col-lg-9">
                                       	
                                       </div>
                                        <div class="col-sm-12 col-lg-3 col-md-3" align="right">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12" style="margin-top: 20px;">
                                                
                                               <!--  <div class="input-group">
                                                    <div class="input-group-prepend"> -->

                                                    <button type="submit" id="msubmit" class="btn btn-info waves-effect waves-light" style="width: 100%">Save</button>
                                                  
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
	 
// Single Select Placeholder
$("#select2-customize-result").select2({
    placeholder: "Select City",
    allowClear: true
});	 
	 
$("#select2-with-tags").select2({
    tags: true
});	 
	 
// Quantity Info	 
	 
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_sheading'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
	var spoints = $('.sub_points')
	var sapoints = $('.sap_points')
	var lcpoints = $('.lc_points')
	var pispoints = $('.pis_points')

	
    var x = 1; //Initial field counter is 1
	var y = 1;
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div class="col-md-12"><input type="text" name="category[]" class="form-control col-md-11" placeholder="Quantity" required> <p class="sub_p_rem'+x+'" id="remove_button" align="right" style="margin-top: -35px"><button class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i></button><br></p></div>'); //Add field html
			
			$(spoints).append('<div class="col-md-12 m-b-10 sub_p_rem'+x+'"><input type="text" name="price[]" class="form-control col-md-12" placeholder="Price" required> </div>'); //Add field html
			$(sapoints).append('<div class="col-md-12 m-b-10 sub_p_rem'+x+'"><input type="text" name="dprice[]" class="form-control col-md-12" placeholder="Price" required> </div>'); //Add field html
			$(lcpoints).append('<div class="col-md-12 m-b-10 sub_p_rem'+x+'"><input type="text" name="lcprice[]" class="form-control col-md-12" placeholder="Price" required> </div>'); //Add field html
			$(pispoints).append('<div class="col-md-12 m-b-10 sub_p_rem'+x+'"><input type="number" value="5" name="pis[]" class="form-control col-md-12" placeholder="Products In Stock" required> </div>'); //Add field html
			
			y++;
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '#remove_button', function(e){
        e.preventDefault();
		var id =$(this).attr('class');
		$(this).parent('div').remove(); //Remove field html
		$('.'+id).remove();
        x--; //Decrement field counter
    });
	
	 
  });	

	 
// Nutrition Info
	 
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_nut'); //Add button selector
    var wrapper = $('.nut_wrapper'); //Input field wrapper
	var spoints = $('.sub_nuts')

	
    var x = 1; //Initial field counter is 1
	var y = 1;
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div class="col-md-12"><input type="text" name="nname[]" class="form-control col-md-11" placeholder="Name" required> <p class="sub_p_rem1'+x+'" id="remove_button1" align="right" style="margin-top: -35px"><button class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i></button><br></p></div>'); //Add field html
			
			$(spoints).append('<div class="col-md-12 m-b-10 sub_p_rem1'+x+'"><input type="text" name="nvalue[]" class="form-control col-md-12" placeholder="Value" required> </div>'); //Add field html
			
			y++;
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '#remove_button1', function(e){
        e.preventDefault();
		var id =$(this).attr('class');
		$(this).parent('div').remove(); //Remove field html
		$('.'+id).remove();
        x--; //Decrement field counter
    });
	
	 
  });	
	 
	 
</script>          