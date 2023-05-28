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
                        <h4 class="page-title">Invoice Orders</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Invoice Orders</li>
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
                            <div class="card-body">
<!--                               <a href="<?php echo base_url("products/create-product") ?>" class="btn btn-info btn-rounded waves-effect waves-light" style="margin-bottom: 10px">Create Product</a>-->
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config">
                                     
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>PO ID</th>
                                                <th>Vendor Name</th>
                                                <th>PO Created Date</th>
                                                <th>Invoice Date</th>
                                                <th>Invoice Number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
										   
 										   $pro = $this->db->order_by("id","desc")->get_where("tbl_purchase_orders",array("status !="=>"Draft"))->result();
										  						
                                           foreach ($pro as $u) {  
										  	
											?> 
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><a href="<? echo base_url('purchaseorders/viewInvoice/').$u->po_id ?>"><?php echo $u->po_id ?></a></td>
                                                <td style="padding: 0.5rem;"><?php echo $this->db->get_where("tbl_vendors",array("id"=>$u->vendor_id))->row()->vendor_name; ?>
                                                <td style="padding: 0.5rem;"><? echo isset($u->placedDate) ? date("d-M-Y",strtotime($u->placedDate)) : ""; ?></td>  
                                                <td style="padding: 0.5rem;"><? echo isset($u->completedDate) ? date("d-M-Y",strtotime($u->completedDate)) : ""; ?></td>  
                                                <td style="padding: 0.5rem;"><? echo isset($u->invoice_number) ? $u->invoice_number : ""; ?></td>  
                                                <td style="padding: 0.5rem;"><? echo $u->status ?></td>  
                                                  
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