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
                                    <li class="breadcrumb-item active" aria-current="page">All Active Orders</li>
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
                    <div class="col-lg-12">
                       

                       <div class="row">   
						  <div class="col-md-5">   
							<div class="form-group">
								<label>Select Start & End Date :</label>
								<div class="input-daterange input-group" id="date-range">
									<input type="text" class="form-control" name="startDate" id="sdate" placeholder="Start Date" autocomplete="off"  required>
									<div class="input-group-append">
										<span class="input-group-text bg-info b-0 text-white">TO</span>
									</div>
									<input type="text" class="form-control" name="endDate" id="edate" placeholder="End Date" autocomplete="off" required/>
								</div>
							</div>
						  </div>
						 	
				      
					      <div class="col-md-3">
					      	
					      	<button id="filter" type="button" class="btn btn-info waves-effect waves-light m-t-30">Submit</button>
					      	
					      </div> 
						      
					   </div>

                       
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                                <div class="table-responsive zero_config">
                                    <table class="table product-overview table-striped" id="zero_config">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Order ID</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                            	<th>Product ID</th>
												<th>Product Name</th>
												<th>Brand Name</th>
												<th>Quantity</th>
												<th>Price</th>
                                                <th>Delivery Address</th>
                                                <th>Delivery Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 1;

//											$cdate = date("H");
//	
//											if($cdate >= 18){
//
//												$days = 2;
//											}else{
//												$days = 1;
//
//											}

								   $date = date("Y-m-d",strtotime("+1 day"));

								   foreach ($doo as $u) {
									 		  
										   $udata = $this->db->get_where("shreeja_users",array("userid"=>$u->user_id,"user_status"=>0))->row();	
										   
                                            $orderProducts = $this->db->get_where("order_products",array("order_id"=>$u->order_id))->result();
											foreach($orderProducts as $pn){
													
													$pd = $this->db->get_where("tbl_products",array("id"=>$pn->product_id))->row();
								
                                           ?> 

                                            <tr>
                                            
                                                <td style="padding: 0.5rem;"><?php echo $i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->order_id ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $udata->user_name ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $udata->user_mobile ?></td>
                                            	<td><? echo $pd->product_id ?></td>
    											<td><? echo $pd->product_name." (".$pn->category.")" ?></td>
    											<td><? echo $pd->brandname ?></td>
    											<td><? echo $pn->qty; ?></td>
    											<td><? echo $pn->price; ?></td>
                                                <td style="padding: 0.5rem;"><?php echo nl2br($u->shipping_address) ?></td>
                                                <td style="padding: 0.5rem;"><?php echo date("d-M-Y",strtotime($u->deliverydate)) ?></td>
                                               

                                            </tr>
                                            
                                            
                                            
                                            
                                     <?php  
                                     
                                    $i++;
                                       }}
                                     ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                <div class="table-responsive zero_config1" style="display: none">
                                    <table class="table product-overview table-striped" id="zero_config1">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Order ID</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                            	<th>Product ID</th>
												<th>Product Name</th>
												<th>Quantity</th>
												<th>Price</th>
                                                <th>Delivery Address</th>
                                                <th>Delivery Date</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>
                                
                                
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
<script type="text/javascript">
	
$("#zero_config").on("click",".getOid",function(){
	
	$("#myModal").modal("show");
	
	var oid = $(this).attr("id");
	
	$(".ordid").val(oid);
	
});	
	
 jQuery('#date-range').datepicker({
        toggleActive: true,
		minDate: 0,
		dateFormat: "dd-mm-yy",

 });
	
$("#filter").click(function(){
	
	$(".zero_config").hide();
	$(".zero_config1").show();

	var sdate = $("#sdate").val();
	var edate = $("#edate").val();
	
	var table = $('#zero_config1').dataTable({
         "bProcessing": true,
         "ajax": {
			"url": "<?php echo base_url("orders/Activeorders/filterallActiveorders") ?>",
			"type": "POST",
			"data" : {sdate : sdate, edate : edate},
// 			"success" : function(data){
				
// 				console.log(data);
				
// 			},
// 			"error" : function(data){
				
// 				console.log(data);
				
// 			} 
  		  },
         "aoColumns": [
			 
               { mData: 'sno' } ,
               { mData: 'Order_ID' },
               { mData: 'Name' },
               { mData: 'Mobile' },
               { mData: 'product_id' },
               { mData: 'product_name' },
               { mData: 'qty' },
               { mData: 'price' },
               { mData: 'Address' },
               { mData: 'deliverydate' },

             ],
          "aaSorting": [[ 0, "asc" ]],
          "bLengthChange": true,
          "pageLength":10,
		  "destroy" : 'true',
		  "dom": 'Bfrtip',
		  "buttons": [
			 'csv', 'excel', 'pdf'
		  ]	
      });
	
})	
	
	
	
$('#zero_config').DataTable({
    dom: 'Bfrtip',
    buttons: [
         'csv', 'excel', 'pdf'
    ],
	order : ["0","asc"]
});	
	

	
	$("#zero_config").on("click",".selectbtn",function(){
		var val = [];
        $('.selectbtn:checked').each(function(i){
          val[i] = {order_id:$(this).attr('order_id')};
        });
        var count = val.length;
       
        if(count > 0){
			$(".assign_agent").show();
		}else{
			$(".assign_agent").hide();
		}
	});
	
	$("#zero_config1").on("click",".selectbtn",function(){
		var val = [];
        $('.selectbtn:checked').each(function(i){
          val[i] = {order_id:$(this).attr('order_id')};
        });
        var count = val.length;
       
        if(count > 0){
			$(".assign_agent").show();
		}else{
			$(".assign_agent").hide();
		}
	});
	
	
	$("#assign").on("click",function(){
		var val = [];
        $('.selectbtn:checked').each(function(i){
          val[i] = {order_id:$(this).attr('order_id')};
        });
		
		var agent = $("#agent").val();
		
		if(agent == ""){
            swal("Error", "Select Agent", "error")
			return false;
		}
		
         $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>orders/Activeorders/assignOrders",
          //data:{category_id:category_id,question_id:question_id,course_id:course_id},
          data:{orderids:JSON.stringify(val),agent:agent},
          success:function(d){
                console.log(d);
                location.reload();
          
           },error:function(d){
			   console.log(d);
		   }
        });

	});	
	
</script>

            <!-- End footer -->