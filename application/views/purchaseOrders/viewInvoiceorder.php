<?php $this->admin->getClientDB();
admin_header(); 
$poid = $this->uri->segment(3);
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
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
   <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-4 align-self-center">
                        <h4 class="page-title">PURCHASE ORDER : <? echo $poid." <br>(".$vdata->vendor_name.")" ?></h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                    <div class="col-3" align="center"><a href="<? echo base_url('Purchaseorders/moveInvoice/').$poid ?>" class="btn btn-primary btn-rounded waves-effect waves-light" style="color: white">Move Invoice to Purchase Order</a></div>
                    
                    <div class="col-5 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url() ?>purchaseorders/invoiceOrders">Invoice Orders</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Invoice Order</li>
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
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                                  



                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card" style="border:0px">
                           
                        <form method="post" action="<? echo base_url('purchaseorders/updatePo') ?>"> 

                            <input type="hidden" name="poid" value="<? echo $poid ?>">
			                <input type="hidden" name="ref" value="invoice">

                            <div class="card addItem" style="padding: 10px;display: block">
							   <h4 class="page-title">Comments</h4>

							   <div class="row">
							   
								   <div class="col-md-3">
								   	
									   <div class="form-group">
									   	
									   		<label>Discount</label>
									   		<input type="text" class="form-control" name="discount" value="<? echo isset($podata->discount) ? $podata->discount : ""; ?>">
									   			
									   </div>
								   	
								   </div>
								   
								   <div class="col-md-3">
								   	
									   <div class="form-group">
									   	
									   		<label>Comments</label>
										   <textarea class="form-control" name="comments" rows="4"><? echo isset($podata->comments) ? $podata->comments : ""; ?></textarea>
									   			
									   </div>
								   	
								   </div>
								   
								   <div class="col-md-3">
								   	
									   <div class="form-group">
									   	
									   		<label>Invoice Number</label>
									   		<input type="text" class="form-control" name="invoice" value="<? echo isset($podata->invoice_number) ? $podata->invoice_number : ""; ?>">
									   			
									   </div>
								   	
								   </div>
								   
								   <div class="col-md-3">
								   	
									   <div class="form-group">
									   	
									   		<label>Invoice Date</label>
									   		<input type="date" class="form-control" name="invoicedate" value="<? echo isset($podata->completedDate) ? $podata->completedDate : ""; ?>">
									   			
									   </div>
								   	
								   </div>
								   
							   </div>
							   </div>	
                           
                           
                            <div class="card-body">
                            
                            	<div class="row">
                            		<div class="col-md-6">
                            			
										<div class="row">
											
											<div class="col-md-4">
												
												<p style=" font-size: 20px" class="total"><strong style="font-weight: 600">Total</strong> : <span class="badge badge-primary" style="border-radius: 5px"><i class="fa fa-rupee-sign"> <? 
													$discount = ($podata->discount != "") ? $podata->discount : 0;
													echo $total - $discount ?></i></span></p>
												
											</div>
											
											<div class="col-md-4">
												
												<p style=" font-size: 20px" class="count"><strong style="font-weight: 600">Products</strong> : <span class="badge badge-info" style="border-radius: 5px"><? echo count($data) ?></span></p>
												
											</div>
											
										</div>
                            			
                            		</div>
                            		<div class="col-md-6" align="right">
                            			
                            			<button type="button" class="btn btn-info btn-rounded waves-effect waves-light editpo" style="margin-bottom: 10px">Edit</button>
                            			
                            			<button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light savepo" style="margin-bottom: 10px; display: none">Update</button>
                            			
                            			<a href="<? echo base_url('purchaseorders/invoiceOrders') ?>" class="btn btn-info btn-rounded waves-effect waves-light backpo" style="margin-bottom: 10px; display: none">Back</a>
                            			
                            			<button type="button" class="btn btn-primary btn-rounded waves-effect waves-light saveprint" style="margin-bottom: 10px; display:none">Print</button>
                            			
                            		</div>
                            	</div>
                            	
                            	
							   
							   
                            
<!--                               -->
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="">
                                     
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>HSN Code</th>
                                                <th>Selling Price (Old)</th>
                                                <th>Landing Price</th>
                                                <th>Quantity</th>
                                                <th>MRP</th>
                                                <th>Selling Price</th>
                                                <th>Tax %</th>
                                                <th>Tax Class</th>
                                                <th>CGST</th>
                                                <th>SGST</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
										   
                                           foreach ($data as $u) { 
											   
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

											?> 
                                            <tr class="delHide<? echo $u->id ?>">
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $pdata->product_id ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->product_name." ".$u->product_category ?></td>
                                                
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $pdata->hsn_code ?></div>
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="hsn_code[]" value="<? echo $pdata->hsn_code ?>">
                                                		
                                                	</div>
                                                
                                                </td>
                                                
                                                <td style="padding: 0.5rem;"><?php echo $u->previous_price; ?>
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $u->ask_price ?></div>
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="aprice[]" value="<? echo $u->ask_price ?>">
                                                		
                                                	</div>
                                                
                                                </td>  
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $u->qty ?></div>
                                                
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="qty[]" value="<? echo $u->qty ?>">
                                                		
                                                	</div>
                                                </td> 
                                                
                                                
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $mrp ?></div>
                                                
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="mrp[]" value="<? echo $mrp ?>">
                                                		
                                                	</div>
                                                </td> 
                                                  
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $sp ?></div>
                                                
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="sp[]" value="<? echo $sp ?>">
                                                		
                                                	</div>
                                                </td> 
                                                
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div class="old"><? echo $pdata->tax_class ?></div>
                                                
                                                	<div class="form-group new" style="display: none">
                                                		
                                                		<input type="text" class="form-control" style="width: 80%" name="tax_class[]" value="<? echo $pdata->tax_class ?>">
                                                		
                                                	</div>
                                                </td>        
                                                <td style="padding: 0.5rem;"><? echo $taxclass." Rs/-" ?></td>  
                                                <td style="padding: 0.5rem;"><? echo round(($taxclass/2),2)." Rs/-" ?></td>  
                                                <td style="padding: 0.5rem;"><? echo round(($taxclass/2),2)." Rs/-" ?></td>  

                                                <td style="padding: 0.5rem;">
                                                 <input type="hidden" class="form-control" style="width: 80%" name="pid[]" value="<? echo $u->id ?>">
                                                 <? echo $u->ask_price * $u->qty ?></td>
                                                 
												<td style="padding: 0.5rem;">
													                
												    <input type="hidden" name="product_id[]" value="<? echo $u->product_id ?>">
												    <input type="hidden" name="product_category[]" value="<? echo $u->product_category ?>">

													<i class="fa fa-times delete" id="<? echo $u->id ?>" style="color: red; display: none; cursor: pointer"></i>
													
												</td>     
                                                  
                                            </tr>
                                     <?php  
                                    
                                       } ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
                
                </form>
                
                
                
<!--       print start         -->
                
                
                <div class="row" id="print" style="display: none">
                	
					<div class="col-md-3"></div>
                	<div class="col-md-6" align="center"><h3 class="page-title">Purchase Order - <? echo $poid ?></h3></div>
					<div class="col-md-3"></div> 
               	    
                    <div class="col-md-12">
                      <hr style="color: black; height: 2px">
					</div>  
                                         
                    <div class="col-md-4">
                    	
                    	<p>
                    		
                    		<strong style="font-weight: 600">Dailycart retail : DAILYKART RETAIL</strong><br><br>


							Address : 8-5-1/5<br>
									 Teachers Colony<br>
 Mahabub nagar<br>
 Mahabub Nagar <br>
Telangana <br>
INDIA <br>
509001 <br>
Email : Dailykartretail@gmail.com <br>
Phone :<br>
TIN   :None
                    		
                    	</p>
                    	
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-12">
                      <hr style="color: black; height: 2px">
					</div>
                        	               	               	      	               	               	
                    <div class="col-md-4">
                    	
                    	<p>
                    		
                    		<strong style="font-weight: 600">Vendor Name : <? echo $vdata->vendor_name ?></strong><br><br>


							Phone number : <? echo $vdata->mobile_number ?> <br>
							Email : <? echo $vdata->email ?> 
                    		
                    	</p>
                    	
                    </div>
                    <div class="col-md-8"></div>    	               	               	      	               	               	  
                    <div class="col-md-12">
                      <hr style="color: black; height: 2px">
					</div>
               		<div class="col-md-12" style="margin-bottom: 10px">
                      Items
					</div> 
                              <div class="table-responsive col-md-12">
                                    <table class="table product-overview table-striped" id="">
                                     
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>HSN Code</th>
                                                <th>Selling Price (Old)</th>
                                                <th>Landing Price</th>
                                                <th>Quantity</th>
                                                <th>MRP</th>
                                                <th>Selling Price</th>
                                                <th>Tax %</th>
                                                <th>Tax Class</th>
                                                <th>CGST</th>
                                                <th>SGST</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
										   
                                           foreach ($data as $u) {  
										  	
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
											?> 
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $pdata->product_id ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->product_name." ".$u->product_category ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $pdata->hsn_code; ?>
                                                <td style="padding: 0.5rem;"><?php echo $u->previous_price; ?>
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div><? echo $u->ask_price ?></div>
                                                
                                                </td>  
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div><? echo $u->qty ?></div>
                                                
                                                </td> 
                                                
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div><? echo $mrp ?></div>
                                                
                                                </td> 
                                                  
                                                <td style="padding: 0.5rem;">
                                                
                                                	<div><? echo $sp ?></div>
                                                
                                                </td>      
                                                
                                                 <td style="padding: 0.5rem;">
                                                
                                                	<div><? echo $pdata->tax_class ?></div>
                                                
                                                </td>   
                                                <td style="padding: 0.5rem;"><? echo $taxclass." Rs/-" ?></td>  
                                                <td style="padding: 0.5rem;"><? echo round(($taxclass/2),2)." Rs/-" ?></td>  
                                                <td style="padding: 0.5rem;"><? echo round(($taxclass/2),2)." Rs/-" ?></td>  
   
                                                <td style="padding: 0.5rem;"><? echo $u->ask_price * $u->qty ?></td>
                                                  
                                            </tr>
                                     <?php  
                                    
                                       } ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
   	               	               	      	               	               	
                </div>
                
                
                
<!--      print ends          -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
          
			</div>
    	</div>               



            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>

<script> 
	
		$(document).on("click",".delete",function(){
		
			var id = $(this).attr("id");
			
			/*table
			.row( $(this).parents('tr') )
			.remove()
			.draw();*/

			$.ajax({

				type : "post",
				url : "<? echo base_url('Purchaseorders/delItem') ?>",
				data : {id:id,pid:'<? echo $poid ?>'},
				dataType : 'json',
				success : function(data){
					console.log(data);

					if(data.status == "success"){
						
						$('.total').html('<strong style="font-weight: 600">Total</strong> : <span class="badge badge-primary" style="border-radius: 5px"><i class="fa fa-rupee-sign"> '+data.total+'</i></span>');
						$('.count').html('<strong style="font-weight: 600">Products</strong> : <span class="badge badge-info" style="border-radius: 5px"><i class="fa fa-rupee-sign"> '+data.count+'</i></span>');

	//					$('#zero_config > tbody  > tr').each(function() {
	//						if ($(this).find('td:first').text().indexOf('.') >= 0) {
	//						  $(this).hide();
	//						} else {
	//						  $(this).show();
	//						}
	//					});
						
						$(".delHide"+id).hide();
					}

				}

			});
		
		});
	
	
	
	$(".saveprint").click(function() { 
		var divContents = document.getElementById("print").innerHTML; 
		var a = window.open('', '', 'height=500, width=500'); 
		a.document.write(divContents); 
		a.document.close(); 
		a.print(); 
	}); 
</script> 

<script>
		
	
	
$("#item").change(function(){
	
	var id = $(this).val();
	$.ajax({
		
		type : "get",
		url : "<? echo base_url('ajax/getProductquantity') ?>",
		data : {id:id},
		success : function(data){
			
			$("#variant").html(data);
			
		},
		error : function(data){
			
			
		}
		
	});	
})

	$(".editpo").click(function(){
		
		$(".old").hide();
		$(".editpo").hide();
		
		$(".new").show();
		$(".savepo").show();
		$(".backpo").show();
		$(".addItem").show();
		$(".saveprint").show();
		$(".delete").show();
		
	})

	
    $("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
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
                        url:"<?php echo base_url();?>products/products/productstatus",
                        data:{id:nav_id,status:status},
                        success:function (data){
                            location. reload(true);
                        }

                    });  
        });



</script>
<script type="text/javascript">

$(".menu_icon").on("change",function(){

  var menu_id = $(this).attr("menu_id");
  $("#menu_icon").val(menu_id);


});

$(".main_icon").on("change",function(){

  var main_id = $(this).attr("main_id");
  $("#main_icon").val(main_id);


});



function archiveFunction(id) {
       Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this selected product!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected product has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>products/products/delProduct/'+id,
        success: function(data) {
            location.reload();   
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected product is safe :)',
      'success',
      
    )
  }
})
    }
</script>

            <!-- End footer -->