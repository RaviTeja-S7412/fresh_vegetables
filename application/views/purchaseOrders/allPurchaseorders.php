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
                        <h4 class="page-title">Purchase Orders</h4>
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
                                    <li class="breadcrumb-item active" aria-current="page">Purchase Orders</li>
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
                               <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-rounded waves-effect waves-light" style="margin-bottom: 10px">Create Purchase Order</a>
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config">
                                     
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>PO ID</th>
                                                <th>Vendor Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
										   
 										   $pro = $this->db->order_by("id","desc")->get_where("tbl_purchase_orders",array("status"=>"Draft"))->result();
										  						
                                           foreach ($pro as $u) {  
										  	
											
											?> 
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><a href="<? echo base_url('purchaseorders/view/').$u->po_id ?>"><?php echo $u->po_id ?></a></td>
                                                <td style="padding: 0.5rem;"><?php echo $this->db->get_where("tbl_vendors",array("id"=>$u->vendor_id))->row()->vendor_name; ?>
                                                <td style="padding: 0.5rem;"><? echo $u->status ?></td>  
                                                <td>
                                                	
                                                	 <a href="#" name="delete" value="<?php echo $u->po_id ?>" id="<?php echo $u->po_id ?>" class="text-inverse sa-params"  onclick="archiveFunction(this.id)"><i class="ti-trash"></i></a>

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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Purchase Order</h4>
      </div>
      <div class="modal-body">
      	<form method="post" action="<? echo base_url('purchaseorders/createPo') ?>">
			<div class="form-group">
				<label>Vendor</label>
				<select class="form-control" name="vendor" required>

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
    		<div class="form-group">
    			<label>Purchase Order Date</label>
				<input type="date" class="form-control" name="podate" required>
			</div>
     	
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

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
  text: 'You will not be able to recover this selected purchase order!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected purchase order has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>purchaseorders/deletePo/'+id,
        success: function(data) {
            location.reload();   
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected purchase order is safe :)',
      'success',
      
    )
  }
})
    }
</script>

            <!-- End footer -->