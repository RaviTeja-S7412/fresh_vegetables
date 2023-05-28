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
                                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
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
                    	<i class="fa fa-user"></i> Update Product
                      </div>
                      <div class="col-md-2" style="text-align: right">
                       <a href="<?php echo base_url() ?>products">	
                    	<button class="btn btn-success waves-effect waves-light">All Products</button>
                       </a>	
                      </div>	
                   </div> 	
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() ?>products/products/updateProductdata" enctype="multipart/form-data">
                                <div class="card-body">
                                 <h4 class="card-title" style="margin-bottom: 10px" align="center">Product Details :</h4>                                     <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Name
                                                <div class="input-group m-t-10">
                                                    <input type="text" name="product_name" class="form-control" id="name" placeholder="Product Name" required="" value="<?php echo $p->product_name ?>">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product ID
                                                <div class="input-group m-t-10">
                                                    <input type="text" class="form-control" name="product_id" placeholder="Product ID" required="" value="<?php echo $p->product_id ?>">
                                                </div>

                                                </div>
                                            </div>
                                        </div>                                        
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Image
                                                <div class="input-group m-t-10">
                                                    <input type="file" class="form-control" name="pr_image" id="designation">
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
                                                    <input type="file" class="form-control" name="banner_image" id="designation">
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
							                                                   
                                                   		<option value="<?php echo $cc->id ?>" <?php echo ($cc->id == $p->product_category) ? "selected" : "" ?>><?php echo $cc->category_name ?></option> 
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
                                                    <input type="text" class="form-control" name="brandname" placeholder="Brand Name"  value="<?php echo $p->brandname ?>" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                         <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Product Description
                                                <div class="input-group m-t-10">
                                                    <textarea class="form-control" name="pr_desc" id="" rows="3" placeholder="Product Description" required><?php echo $p->description ?></textarea>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                Multiple Images
                                                <div class="input-group m-t-10">
                                                    <input type="file" class="form-control" name="files[]"  multiple="multiple">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12">
                                                HSN Code
                                                <div class="input-group m-t-10">
                                                    <input type="text" class="form-control" name="hsn_code" placeholder="HSN Code" id="designation" value="<?php echo $p->hsn_code ?>" required="">
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
                                                       <option value="5" <? echo ($p->tax_class == 0) ? 'selected' : '' ?> >0 %</option> 
                                                       <option value="5" <? echo ($p->tax_class == 5) ? 'selected' : '' ?> >5 %</option> 
                                                       <option value="12" <? echo ($p->tax_class == 12) ? 'selected' : '' ?>>12 %</option> 
                                                       <option value="18" <? echo ($p->tax_class == 18) ? 'selected' : '' ?>>18 %</option> 
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
							                                                   
                                                           <option value="<?php echo $v->id ?>" <? echo ($p->vendor == $v->id) ? 'selected' : '' ?>><?php echo $v->vendor_name  ?></option> 
                                                       
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
                                                    <input type="number" class="form-control" name="msl" id="email" placeholder="Minimum Stock Level" value="<?php echo $p->msl ?>" required="">
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
								  	</div>
                                  			
                                   
             <h4 class="card-title" style="margin-bottom: 10px" align="center">Quantity Details :</h4> 
                                   <hr>
            
          <?php 
                                            
            $categories = json_decode($p->product_quantity);
                
		
		  ?>												
														
         <div class="row">
             <div class="col-md-2">          
                        <div class="form-group">
                          <label class="control-label">Quantity</label>
                            <div class="row m-b-10 field_wrapper">
                            
                            <?php 
							$i=0;
                            if(count($categories->quantity)>=1){   
                                foreach ($categories->quantity as $qty) {
                                 
                            ?>  
                             
                              <div class="col-md-12" style="margin-bottom: 10px">
                        
                                <input type="text" name="category[]" class="form-control col-md-11" value="<?php echo $qty ?>" placeholder="Quantity" id="sh" required>
									
                             	 <?php  
								if($i==0){
									
								}else{  
							  ?>  
                            <p align="right" style="margin-top: -35px" id="rem<?php echo $i ?>" sap="rem1<?php echo $i ?>" lap="rem2<?php echo $i ?>" pis="rem3<?php echo $i ?>" class="remove_both">
                                <button class="btn btn-danger waves-effect waves-light" type="button" style="text-align: right"><i class="ti-close"></i>
                                </button>
                            </p>
                             <?php } ?>

                             
                              </div>
                              
                            <?php
							
							$i++;		
								}}
								?>	
                              
                          </div>
                          <small style="color: red; font-weight: bold">Note : Quantity should be as 1 KG or 500 gm etc</small><br>
                          
                          <button type="button" id="add_sheading" class="btn btn-info waves-effect waves-light" style="text-align: right">Add Quantity</button>
                          
                        </div>
          </div>      
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">MRP</label>
                          
                            <div class="row m-b-15 sub_points">
                          <?php
				 			$ii = 0;	
                            if(count($categories->price)>=1){   
                                foreach ($categories->price as $price) {
                                 
                            ?> 
                           
                              <div class="col-md-12" style="margin-bottom: 15px" id="rem1<?php echo $ii ?>">
                                <input type="text" name="price[]" class="form-control" value="<?php echo $price ?>" placeholder="Price" id="points" required>

                              </div>
                              
                            
                           <?php 
								$ii++;
								}} ?>
                            </div>
              
             </div>
                        	
          </div> 
          
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">Selling Price</label>
                          
                            <div class="row m-b-15 sap_points">
                          <?php
				 			$ii = 0;	
                            if(count($categories->sp)>=1){   
                                foreach ($categories->sp as $price) {
                                 
                            ?> 
                           
                              <div class="col-md-12" style="margin-bottom: 15px" id="rem<?php echo $ii ?>">
                                <input type="text" name="dprice[]" class="form-control" value="<?php echo $price ?>" placeholder="Price" id="dpoints" required>

                              </div>
                              
                            
                           <?php 
								$ii++;
								}} ?>
                            </div>
              
             </div>
                        	
          </div>
          
          <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">Landing Cost Price</label>
                          
                            <div class="row m-b-15 lc_points">
                          <?php
				 			$ii = 0;	
                            if(count($categories->lcp)>=1){   
                                foreach ($categories->lcp as $price) {
                                 
                            ?> 
                           
                              <div class="col-md-12" style="margin-bottom: 15px" id="rem2<?php echo $ii ?>">
                                <input type="text" name="lcprice[]" class="form-control" value="<?php echo $price ?>" placeholder="Price" id="lcpoints" required>

                              </div>
                              
                            
                           <?php 
								$ii++;
								}} ?>
                            </div>
              
             </div>
                        	
          </div> 
          
            <div class="col-md-2"> 
             <div class="form-group">
                          <label class="control-label">Products In Stock</label>
                          
                            <div class="row m-b-15 pis_points">
                          <?php
				 			$ii1 = 0;	 
							if(count($categories->lcp)>=1){	
                                foreach ($categories->pis as $pis) {
                                 
                            ?> 
                           
                              <div class="col-md-12" style="margin-bottom: 15px" id="rem3<?php echo $ii1 ?>">
                                <input type="text" name="pis[]" class="form-control" value="<?php echo $pis ?>" placeholder="Products In Stock" id="lcpoints" required>

                              </div>
                              
                            
                           <?php 
								$ii1++;
								}}else{
							?>	
								<div class="col-md-12" style="margin-bottom: 15px" id="rem30">
                                <input type="text" name="pis[]" class="form-control" value="5" placeholder="Products In Stock" id="lcpoints" required>

                              </div>
								
							<? } ?>
                            </div>
              
             </div>
                        	
          </div>                          
                                                                                     
      </div> 
                                    
									<div class="row">
                                       <div class="col-md-9 col-lg-9">
                                       	<input type="hidden" name="pid" value="<?php echo $p->id ?>">
                                       </div>
                                        <div class="col-sm-12 col-lg-3 col-md-3" align="right">
                                            <div class="form-group row">
                                                
                                                <div class="col-sm-12" style="margin-top: 20px;">
                                                
                                               <!--  <div class="input-group">
                                                    <div class="input-group-prepend"> -->
                                                    
								      <button type="submit" id="msubmit" class="btn btn-info waves-effect waves-light" style="width: 100%">Update</button>
                                                  
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
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>

            <!-- End footer -->


<script type="text/javascript">
	
$("#gst_charges_status").change(function(){
	
	
	var status = $("#gst_charges_status").val();
	
	if(status == "Active"){
		
		$("#gst_charges").show();
		
	}else{
		
		$("#gst_charges").hide();
		
	}
	
	
});		
	
		
$('#select2-customize-result').val(<?php echo($p->location) ?>);
$('#select2-customize-result').trigger('change');
	
	
$("#select2-customize-result").select2({
    placeholder: "Select City",
    allowClear: true,

});	 
	
$('#select2-with-tags').val(<?php echo($p->qty_type) ?>);
$('#select2-with-tags').trigger('change');	
 
$("#select2-with-tags").select2({
    tags: true
});		

function delDisc(id) {
Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this item!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected item has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>products/products/delPm/'+id,
        success: function(data) {
            location.reload();   
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected item is safe :)',
      'success',
      
    )
  }
})
    }  	
	
$(document).ready(function () {
    $('#checkBtn').click(function() {
      var checked = $("input[name='category[]']:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});	
	

 $(document).ready(function(){
	 
	 
		
  jQuery('#date-range').datepicker({
        toggleActive: true,
		minDate: 0,
		dateFormat: "dd-mm-yy",

 });
	 
	 
	 
	 

	
    $(".check").bootstrapSwitch({size : 'mini'});
    $('#zero_config').DataTable(); 

    
    $('#zero_config').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
          var nav_id = $(this).attr("nav_id"); 
		
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = "Active";
                    }else{
                        status = "Inactive";
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>products/products/discstatus",
                        data:{id:nav_id,status:status},
                        success:function (data){
                            location. reload(true);
                        }

                    });  
        });	 
	 
	 
	 
		
	  $('input[type="checkbox"]').click('.menu_icon',function(){
            if($(this).prop("checked") == true){
				
				var icon = $(this).attr("remove");
//				alert(icon);
				
				$("#"+icon).attr('required', 'required');
			
            }
            else if($(this).prop("checked") == false){

				var icon = $(this).attr("remove");
//				alert(icon+"1");
				$("#"+icon).val("");
				$("#"+icon).removeAttr('required', 'required');

            }
        });
    });			
</script>





 <script>
	 
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
	
	$(wrapper).on('click', '.remove_both', function(e){
		var id =$(this).attr('id');
		var sap =$(this).attr('sap');
		var lap =$(this).attr('lap');
		var pis =$(this).attr('pis');
		//alert(id);
		e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
		$("#"+id).remove();
		$("#"+sap).remove();
		$("#"+lap).remove();
		$("#"+pis).remove();
		//$("#rem1").remove();
        x--; //Decrement field counter
    });
	
	 
  });	
	 
	 
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('#add_nut'); //Add button selector
    var wrapper = $('.nut_wrapper'); //Input field wrapper
	var spoints = $('.sub_nut')

	
    var x = 1; //Initial field counter is 1
	var y = 1;
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div class="col-md-12"><input type="text" name="nname[]" class="form-control col-md-11" placeholder="name" required> <p class="sub_p_rem1'+x+'" id="remove_button1" align="right" style="margin-top: -35px"><button class="btn btn-danger waves-effect waves-light" type="button"><i class="ti-close"></i></button><br></p></div>'); //Add field html
			
			$(spoints).append('<div class="col-md-12 m-b-10 sub_p_rem1'+x+'"><input type="text" name="nvalue[]" class="form-control col-md-12" placeholder="value" required> </div>'); //Add field html
			
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
	
	$(wrapper).on('click', '.remove_both1', function(e){
		var id =$(this).attr('id');
		//alert(id);
		e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
		$("#"+id).remove();
		//$("#rem1").remove();
        x--; //Decrement field counter
    });
	
	 
  });	 

</script>          