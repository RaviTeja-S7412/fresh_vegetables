<?php admin_header(); 

$udata = $this->db->get_where("shreeja_users",array("userid"=>$doo->user_id,"user_status"=>0))->row();

$orderProducts = $this->db->get_where("order_products",array("order_id"=>$doo->order_id))->result();
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
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">
<!--
                          <a href="<?php echo base_url() ?>users/create-user">	
							<button class="btn btn-success waves-effect waves-light">Create User</button>
						  </a>	
-->
                        </h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>orders/active-orders">Orders</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">View Order</li>
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
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                       
                       <h4 class="card-title">User Information</h4>
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo base_url() ?>assets/images/users/1.jpg" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $udata->user_name ?></h4>
                                    <h6 class="card-subtitle"><?php echo $udata->user_email ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <?php echo $udata->user_mobile ?>
                                    </div>
                                </center>
                            </div>
						</div>
                  
<!--                  		<div class="row">-->
                  		
<!--                       <h5 class="card-title" style="margin-top: 50px">Update Delivery Status</h5>-->
<!--
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                  		
								<form method="post" action="<?php echo base_url("agent-orders/updateDeliverystatus") ?>">

									<div class="form-group">

										<select class="form-control" name="deliveryStatus" id="dstatus" required>

											<option value="">Select Delivery Status</option>
											<option value="Pending">Pending</option>
											<option value="Success">Success</option>
											<option value="Cancelled">Cancelled</option>
											<option value="other">Other</option>

										</select>

									</div>

									<div class="form-group" id="ostatus" style="display: none">

										<input type="text" name="ostatus" placeholder="Delivery Status" class="form-control">

									</div>

									<div class="form-group">
                                           
                                       <input type="hidden" name="order_id" value="<?php echo $doo->order_id ?>">                  
                                       <button type="submit" class="btn btn-success" style="margin-top: 5px; width: 50%">Update</button>
										
									</div>
								</form>	
                 		   </div>
                   		  </div>
-->
                  		</div>
<!--                   </div>-->
                   
                   <div class="col-lg-9 col-xlg-3 col-md-7" id="print">
                  	 
                   <h4 class="card-title">Order Information</h4>
                   <div align="right">
                                
                        <button class="btn btn-primary" onClick="printdiv('print');" style="margin-bottom:10px">Print</button>
                        
                    </div>
                   	 <div class="card">
                        <div class="card-body">
                                
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="170px">Order ID</td>
                                        <td class="font-medium"><?php echo $doo->order_id ?></td>
                                    </tr>
                                    <tr>
                                        <td>Customer Name</td>
                                        <td class="font-medium"><?php echo $udata->user_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number</td>
                                        <td class="font-medium"><?php echo $udata->user_mobile ?></td>
                                    </tr>
                                    <tr>
                                        <td>Product Info</td>
                                        <td class="font-medium">
                                        
                                        	<table>
                                        		<thead>
												  <tr>
													<th>Product ID</th>
													<th>Name</th>
													<th>MRP</th>
													<th>Price</th>
													<th>Quantity</th>
													<th>Total</th>
												  </tr>
												</thead>
											  	<tbody>  
											  	
											  	<?php
												foreach($orderProducts as $pn){
													
													$pd = $this->db->get_where("tbl_products",array("id"=>$pn->product_id))->row();
							
												?>
											  	
												  <tr>
													<td><? echo $pd->product_id ?></td>
													<td><? echo $pd->product_name." (".$pn->category.")" ?></td>
													<td><? echo $pn->mrp; ?></td>
													<td><? echo $pn->price; ?></td>
													<td><? echo $pn->qty; ?></td>
													<td><? echo $pn->price * $pn->qty; ?></td>
												  </tr>
												  
												<? } ?>  
												</tbody>  
											</table>

                                        		
                                        	
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Discount Amount</td>
                                        <td class="font-medium"><?php echo $doo->discount_amount." Rs/-" ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Delivery Charges</td>
                                        <td class="font-medium"><?php echo $doo->deliveryCharges." Rs/-" ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Carry Bag Charges</td>
                                        <td class="font-medium"><?php echo $doo->carry_bag_charges." Rs/-" ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Saved Rupees</td>
                                        <td class="font-medium"><?php echo ($doo->savedonthisorder != "") ? $doo->savedonthisorder." Rs/-" : '' ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Total Amount</td>
                                        <td class="font-medium"><?php echo $doo->total_amount." Rs/-" ?></td>
                                    </tr>
                                    
<!--
                                    <tr>
                                        <td>Transaction ID</td>
                                        <td class="font-medium"><?php echo $doo->txn_id ?></td>
                                    </tr>
-->
                                    
                                    <tr>
                                        <td>Delivery Date</td>
                                        <td class="font-medium"><?php echo date("d-M-y",strtotime($doo->deliveryonce_date)) ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td>Delivery Address</td>
                                        <td class="font-medium"><?php echo nl2br($doo->shipping_address) ?></td>
                                    </tr>                                    
<!--
                                    <tr>
                                        <td>Payment Status</td>
                                        <td class="font-medium"><span class="badge badge-success"><?php echo $doo->payment_status ?></span></td>
                                    </tr>
-->
                                    <tr>
                                        <td>Delivery Status</td>
                                        <td class="font-medium">
                                        	<?php  
											   		if($doo->delivery_status == "Success"){
														
														echo '<span class="badge badge-success" style="color:white">Success</span>';
													}elseif($doo->delivery_status == "Pending"){
														
														echo '<span class="badge badge-warning" style="color:white">Pending</span>';
													}elseif($doo->delivery_status == "Cancelled"){
														echo '<span class="badge badge-danger" style="color:white">Cancelled</span>';
													}else{
														
														echo $doo->delivery_status;
													}    ?>
                                        	
                                        </td>
                                    </tr>                                                                        
                                    
                                </tbody>
                            </table>
                            
                            
                           
                        </div>
                    </div>
				  </div>	
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>





            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>

<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>


<script type="text/javascript">
$("#zero_config").dataTable();

$("#dstatus").change(function(){
	
	var dstatus = $("#dstatus").val();
	
	if(dstatus == "other"){
		
		$("#ostatus").show();
		
	}else{
		
		$("#ostatus").hide();
		
	}
	
});
	
	
</script>
            
            

          
            
            

            <!-- End footer -->