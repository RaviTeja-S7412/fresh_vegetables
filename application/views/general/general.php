<?php 
admin_header(); 
$this->admin->getClientDB();
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">       
       
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php admin_sidebar();  ?> 



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
                        <h4 class="page-title">General</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url() ?>dashboard">Dashboard </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">General</li>
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


<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Nav Pills Tabs</h4> -->
                                <ul class="nav nav-pills m-b-30">

                                <?php if($soc || $loc || $areas || $slider){ ?>
                                    <li class=" nav-item"> <a href="#navpills-1" class="nav-link" data-toggle="tab" aria-expanded="false">Logo</a> </li>
                                <?php }else{ ?>    
                                    <li class=" nav-item"> <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Logo</a> </li>
                                <?php } ?>    
                                   
                                    <li class="nav-item"> <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Contact</a> </li>
                                
                                <?php if($loc){ ?>        
                                    <li class="nav-item"> <a href="#navpills-4" class="nav-link active" data-toggle="tab" aria-expanded="true">Cities</a> </li>
                                <?php }else{ ?>
                                    <li class="nav-item"> <a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Cities</a> </li>
                                <?php } ?>
                                    
                                
                                <?php if($areas){ ?>        
                                    <li class="nav-item"> <a href="#navpills-6" class="nav-link active" data-toggle="tab" aria-expanded="true">Areas</a> </li>
                                <?php }else{ ?>
                                    <li class="nav-item"> <a href="#navpills-6" class="nav-link" data-toggle="tab" aria-expanded="true">Areas</a> </li>
                                <?php } ?>            
                                                                    
                                    
                                <?php if($soc){ ?>        
                                    <li class="nav-item"> <a href="#navpills-5" class="nav-link active" data-toggle="tab" aria-expanded="true">Social Networking</a> </li>
                                <?php }else{ ?>
                                    <li class="nav-item"> <a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="true">Social Links</a> </li>
                                <?php } ?>
                                  
								<?php if($slider){ ?>
                                    <li class="nav-item"> <a href="#navpills-11" class="nav-link active" data-toggle="tab" aria-expanded="true">Banners</a> </li>
                                           
                                <?php }else{  ?>                           
                                    <li class="nav-item"> <a href="#navpills-11" class="nav-link" data-toggle="tab" aria-expanded="true">Banners</a> </li>
                                <?php } ?>
                                                                  
                                   
                                    <li class="nav-item"> <a href="#navpills-15" class="nav-link" data-toggle="tab" aria-expanded="true">Settings</a> </li>
                                          
                                </ul>
                                <div class="tab-content br-n pn">
                    <?php if($soc || $loc || $areas ||$slider){ ?>
                     
                        <div id="navpills-1" class="tab-pane">
                    
                    <?php }else{ ?>

    	<div id="navpills-1" class="tab-pane active">

                    <?php } ?>
                         <div id="load"></div>


                        <div class="card">
                            
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Logo</h4> -->
                                </div>
                                
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            
                                        <div class="col-md-6">
                                        <form action="<?php echo base_url() ?>general/insertHeaderLogo" method="post" enctype="multipart/form-data">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Header Logo</label>
                                                    <input type="file" class="form-control" required="" name="logo" id="logo1">
                                                <small style="color: red">Note: Please select 450px * 80px Image</small> 
                                                </div>
                                                
                                        <div class="container" id="">
                                            <img id="display" src="<?php echo base_url().$this->admin->getheaderLogo() ?>" alt="logo" style="width: 50%;">

                                        </div> 

                                            <!-- <div class="col-md-3"> -->
                                                <div class="form-actions">
                                                    <br>
                                                        <div class="card-body" style="padding-top: 10px">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                            <!-- <button type="reset" class="btn btn-dark">Cancel</button> -->
                                                        </div>
                                                </div>
                                            <!-- </div> -->

                                          </form>
                                        </div>
                                          
                                      
                                       
                                    </div>   
                                   
                                </div>
                           
    	                        
				</div>
			</div>
		</div>
      <div id="navpills-2" class="tab-pane">
      
                       
                                        
                                                         
                                                                          
                                                                                                            
      </div>
        <div id="navpills-3" class="tab-pane">
          <div class="col-md-6">      
            <div class="card-body">
<!--                                <div class="card-body">-->
                                    <h4 class="card-title">Contact</h4>
<!--                                </div>-->
                              <div class="form-body">
                                <form action="<?php echo base_url() ?>general/updateContact" method="post">
                                    <div class="card-body">
                                           
                                        <div class="row">   
                                            <div class="col-md-12">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Company Name</label>
                                                    <input type="text" class="form-control" required="" name="cname" required="" value="<?php echo $c->company_name ?>" placeholder="Company Name">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Email</label>
                                                    <input type="email" class="form-control" required="" name="email" required="" value="<?php echo $c->email ?>" placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Mobile</label>
                                                    <input type="tel" class="form-control" required="" name="mobile" required="" value="<?php echo $c->mobile ?>" placeholder="Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Address</label>
                                                    <textarea class="form-control" name="address" required rows="3" placeholder="Address"><?php echo $c->address ?></textarea>

                                                </div>
                                            </div>    
                                            <div class="col-md-6">
                                                <div class="form-actions">
                                                    <br>
                                                        <div class="card-body">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                            <!-- <button type="reset" class="btn btn-dark">Cancel</button> -->
                                                        </div>
                                                </div>
                                            </div>    
                                        <input type="hidden" name="c_id" value="<?php echo $c->id ?>"> 
                                        </div>
                                       
                                   
                                </div>
                            </form>
                            
                           </div>
                         </div>  
                     </div>
                 </div>
                    
                    
                    
<!--         Location Starts           -->
                    
                    
					<?php if($loc){ ?>
                     
                        <div id="navpills-4" class="tab-pane active">
                    
                    <?php }else{ ?>

                        <div id="navpills-4" class="tab-pane">

                    <?php } ?>

                   		<div class="row">
                            <div class="col-md-4">
                            <?php if($loc){ ?>

                                 <form method="post" action="<?php echo base_url() ?>general/editLocation" enctype="multipart/form-data">

                                                <label>Location:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="location" required="" value="<?php echo $loc->location ?>" placeholder="Location">
                                                    
                                                </div>
         
<!--
                                               <label>Delivery Charges:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" name="deliveryCharges" required="" value="<?php //echo $loc->deliveryCharges ?>" placeholder="Location">
                                                    
                                                </div>
                                               <label>Cut off Charges:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" name="cutoffCharges" required="" value="<?php //echo $loc->cutoffCharges ?>" placeholder="Location">
                                                    
                                                </div>
-->
                                               
                                                <label>Location Image:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="file" class="form-control" name="image" placeholder="Location">
                                                    
                                                </div>
                                        
                                        <input type="hidden" name="loc_id" value="<?php echo $loc->id ?>">        
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right" style="margin-top: 5px">Update</button>
                                </form>




                            <?php }else{ ?>    
                                <form method="post" action="<?php echo base_url() ?>general/insertLocation" enctype="multipart/form-data">

                                                <label>Location:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="location" required="" placeholder="Location">
                                                    
                                                </div>
                                                
<!--
                                                <label>Delivery Charges:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" name="deliveryCharges" required="" placeholder="Delivery Charges">
                                                    
                                                </div>
                                                
                                                <label>Cut off Charges:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" name="cutoffCharges" required="" placeholder="Cut off charges">
                                                    
                                                </div>
-->

                                                <label>Location Image:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="file" class="form-control" name="image" placeholder="Location" required>
                                                    
                                                </div>
                                               
                                                
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Submit</button>
                                </form>

                            <?php } ?>    

                                           
                                            </div>
                                              
                      <div class="col-md-8">
                                              
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                                <h3 class="card-title">Locations</h3>
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config1">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Image</th>
<!--                                                <th>Deliver charges</th>-->
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
                                      $loc = $this->db->query("select * from tbl_locations where deleted=0 order by id desc")->result();
                                           if(count($loc) > 0){
                                           foreach ($loc as $u) {  ?> 
                                           <?php if($u->deleted==0){ ?>
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->location ?></td>
                                                <td style="padding: 0.5rem;"><img src="<?php echo base_url().$u->image ?>" style="width: 30%"></td>
<!--                                                <td style="padding: 0.5rem;"><i class="fa fa-rupee"></i> <?php echo $u->deliveryCharges ?></td>-->
                                                
                                                <td style="padding: 0.5rem;">
                                                   
                                                <?php if($u->status==1){ ?>
                                               <div class="switch">
                                                   <input type="checkbox" data-on-color="info" loc_id="<?php echo $u->id ?>" name="location1" data-off-color="success" checked>
                                               </div>
                                                   <?php  }elseif($u->status==0){ ?>
                                                <div class="switch">
                                                    <input type="checkbox" loc_id="<?php echo $u->id ?>" data-on-color="info" name="location1" data-off-color="success">
                                                   <?php } ?>
                                                </div>    
                                                </td>
                                                <td style="padding: 0.5rem;">
            <a href="<?php echo base_url() ?>general/update-location/<?php echo $u->id ?>" class="text-inverse p-r-10"><i class="ti-marker-alt"></i></a>
           
             <a href="#" name="delete" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>" class="text-inverse sa-params"  onclick="delLocation(this.id)"><i class="ti-trash"></i></a>                                      

                                                </td>
                                                  
                                            </tr>
                                        <?php } ?>
                                     <?php  
                                     
                                       }} ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                      </div>
                     </div>
                   </div> 
                   	
                   
                   
                    </div>
                    
<!--       Location Ends             -->

                    
<!--         Areas Starts           -->
                    
                    
					<?php if($areas){ ?>
                     
                        <div id="navpills-6" class="tab-pane active">
                    
                    <?php }else{ ?>

                        <div id="navpills-6" class="tab-pane">

                    <?php } ?>

                   		<div class="row">
                            <div class="col-md-4">
                            <?php if($areas){ ?>

                                 <form method="post" action="<?php echo base_url() ?>general/editArea" enctype="multipart/form-data">
												
                                               <label>City: </label>
                                               <div class="form-group">
                                               	
                                               	<select class="form-control" name="location" required>
                                               		<option value="">Select City</option>
                                               		
                                               		<?php
														$locations = $this->db->get_where("tbl_locations",array("deleted"=>0))->result();
											 
											 			foreach($locations as $ll){
													?>			
													<option value="<?php echo $ll->id ?>" <?php echo ($areas->city_id == $ll->id) ? "selected" : "" ?>><?php echo $ll->location ?></option>
													<?php } ?>	
                                               	</select>
                                               	
                                               </div>
                                               
                                               
                                                <label>Area:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="area" required="" value="<?php echo $areas->area_name ?>" placeholder="Area">
                                                    
                                                </div>
         
                                        
                                        <input type="hidden" name="area_id" value="<?php echo $areas->id ?>">        
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right" style="margin-top: 5px">Update</button>
                                </form>




                            <?php }else{ ?>    
                                <form method="post" action="<?php echo base_url() ?>general/insertArea">

                                               
                                               <label>City: </label>
                                               <div class="form-group">
                                               	
                                               	<select class="form-control" name="location" required>
                                               		<option value="">Select City</option>
                                               		
                                               		<?php
														$locations = $this->db->get_where("tbl_locations",array("deleted"=>0))->result();
											 
											 			foreach($locations as $ll){
													?>			
													<option value="<?php echo $ll->id ?>"><?php echo $ll->location ?></option>
													<?php } ?>	
                                               	</select>
                                               	
                                               </div>
                                               
                                                <label>Area:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="area" required="" placeholder="Area">
                                                    
                                                </div>

                                               
                                                
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Submit</button>
                                </form>

                            <?php } ?>    

                                           
                                            </div>
                                              
                      <div class="col-md-8">
                                              
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                                <h3 class="card-title">Areas</h3>
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config2">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>City Name</th>
                                                <th>Area Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
                                      $are = $this->db->query("select * from tbl_areas where deleted=0 order by id desc")->result();
                                           if(count($are) > 0){
                                           foreach ($are as $u) {  ?> 
                                           <?php if($u->deleted==0){ ?>
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $this->db->get_where("tbl_locations",array("id"=>$u->city_id))->row()->location ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->area_name ?></td>
                                                <td style="padding: 0.5rem;">
                                                   
                                                <?php if($u->status=="Active"){ ?>
                                               <div class="switch">
                                                   <input type="checkbox" data-on-color="info" area_id="<?php echo $u->id ?>" name="area1" data-off-color="success" checked>
                                               </div>
                                                   <?php  }elseif($u->status=="Inactive"){ ?>
                                                <div class="switch">
                                                    <input type="checkbox" area_id="<?php echo $u->id ?>" data-on-color="info" name="area1" data-off-color="success">
                                                   <?php } ?>
                                                </div>    
                                                </td>
                                                <td style="padding: 0.5rem;">
            <a href="<?php echo base_url() ?>general/update-area/<?php echo $u->id ?>" class="text-inverse p-r-10"><i class="ti-marker-alt"></i></a>
           
             <a href="#" name="delete" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>" class="text-inverse sa-params"  onclick="delArea(this.id)"><i class="ti-trash"></i></a>                                      

                                                </td>
                                                  
                                            </tr>
                                        <?php } ?>
                                     <?php  
                                     
                                       }} ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                      </div>
                     </div>
                   </div> 
                   	
                   
                   
                    </div>
                    
<!--       Areas Ends             -->
                                       
                                       
                                       
                                       
                                       
                                        
                                                            
                                                                                
                    <?php if($soc){ ?>
                     
                        <div id="navpills-5" class="tab-pane active">
                    
                    <?php }else{ ?>

                        <div id="navpills-5" class="tab-pane">

                    <?php } ?>
                          <div class="row">
                            <div class="col-md-4">
                            <?php if($soc){ ?>

                                 <form method="post" action="<?php echo base_url() ?>general/editSocialnetwork" enctype="multipart/form-data">

                                                <label>Title:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="title" required="" value="<?php echo $soc->title ?>" placeholder="Title">
                                                    
                                                </div>

                                               
                                                <label>Link:</label>
                                                 <div class="form-group">
                                                    <input type="text" class="form-control" name="link" placeholder="Eg: http://www.facebook.com/" value="<?php echo $soc->link ?>" required="">
                                                 </div>
                                                 
                                                <label>Icon:</label>
                                                <div class="form-group">
                                                    
                                        <input type="text" class="form-control"  name="icon" value="<?php echo $soc->icon ?>">
<!--                                        <small style="color: red">Note: Please select 35px * 35px Image</small>           -->
                                                </div>
                                        <div>
<!--	                                        <img src="<?php //echo base_url().$soc->icon ?>" id="icondisplay">-->
	                                        <span class="<?php echo $soc->icon ?> fa-3x"></span>
	                                    </div>         
                                        
                                        <input type="hidden" name="soc_id" value="<?php echo $soc->id ?>">        
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right" style="margin-top: 5px">Update</button>
                                </form>




                            <?php }else{ ?>    
                                <form method="post" action="<?php echo base_url() ?>general/insertSocial" enctype="multipart/form-data">

                                                <label>Title:</label>
                                                <div class="form-group">
                                                    
                                                    <input type="text" class="form-control" name="title" required="" placeholder="Title">
                                                    
                                                </div>

                                               
                                                <label>Link:</label>
                                                 <div class="form-group">
                                                    <input type="text" class="form-control" name="link" placeholder="Eg: http://www.facebook.com/" required="">
                                                 </div>
                                                 
                                                <label>Icon:</label>
                                                <div class="form-group">
                                                    
                                        <input type="text" class="form-control" id="icon" name="icon" required="" placeholder="Eg: fa fa-icon">
<!--                                        <small style="color: red">Note: Please select 35px * 35px Image</small>           -->
                                                </div>
                                                
                                  

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Submit</button>
                                </form>

                            <?php } ?>    

                                           
                                            </div>
                                              
                      <div class="col-md-8">
                                              
                        <div class="card" style="border: 0px">
                            <div class="card-body">
                                <h3 class="card-title">Social Networking</h3>
                                <div class="table-responsive">
                                    <table class="table product-overview table-striped" id="zero_config">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Title</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           $i = 0;
                                      $soc = $this->db->query("select * from fdm_va_social_networking where deleted=0 order by id desc")->result();
                                           if($soc){
                                           foreach ($soc as $u) {  ?> 
                                           <?php if($u->deleted==0){ ?>
                                            <tr>
                                                <td style="padding: 0.5rem;"><?php echo ++$i ?></td>
                                                <td style="padding: 0.5rem;"><?php echo $u->title ?></td>
                                                <td style="padding: 0.5rem;">
<!--                                                    <img src="<?php //echo base_url().$u->icon ?>" style="width: 35px; height: 35px">-->
                                                <span class="<?php echo $u->icon ?> fa-3x"></span>
                                                </td>
                                                <td style="padding: 0.5rem;">
                                                   
                                                <?php if($u->status=="Active"){ ?>
                                               <div class="switch">
                                                   <input type="checkbox" data-on-color="info" soc_id="<?php echo $u->id ?>" name="social" data-off-color="success" checked>
                                               </div>
                                                   <?php  }elseif($u->status=="Inactive"){ ?>
                                                <div class="switch">
                                                    <input type="checkbox" soc_id="<?php echo $u->id ?>" data-on-color="info" name="social" data-off-color="success">
                                                   <?php } ?>
                                                </div>    
                                                </td>
                                                <td style="padding: 0.5rem;">
            <a href="<?php echo base_url() ?>general/update-social-site/<?php echo $u->id ?>" class="text-inverse p-r-10"><i class="ti-marker-alt"></i></a>
           
             <a href="#" name="delete" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>" class="text-inverse sa-params"  onclick="delSocialsite(this.id)"><i class="ti-trash"></i></a>                                      

                                                </td>
                                                  
                                            </tr>
                                        <?php } ?>
                                     <?php  
                                     
                                       }} ?> 
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                      </div>
                     </div>
                   </div> 
                  </div>      
<!-- End Social Networking       -->
                
                
<!--   Start Welcome Banner             -->
                
         			


                    <div id="navpills-15" class="tab-pane">

                   		<div class="row">
                            <div class="col-md-4">
                                <form method="post" action="<?php echo base_url() ?>general/updateReferalbonus" enctype="multipart/form-data">
  
									<div class="form-group">
									<label>Referal Bonus:</label>

										<input type="number" class="form-control" name="referalbonus" value="<? echo $this->admin->get_option("reward_points") ?>" required="" placeholder="Referal Bonus">

									</div>
                                  
                                    <div class="form-group">
									<label>Minimun Referal Bonus Amount:</label>

										<input type="number" class="form-control" name="min_referal_reward_amount" value="<? echo $this->admin->get_option("min_referal_reward_amount") ?>" required="" placeholder="Minimun Referal Bonus Amount">

									</div>
                                   
                                    <div class="form-group">
									<label>Minimum Purchase Amount:</label>

										<input type="number" class="form-control" name="min_purchase_amount" value="<? echo $this->admin->get_option("min_purchase_amount") ?>" required="" placeholder="Minimum Purchase Amount">

									</div>
                                   
                                    <div class="form-group">
									<label>Delivery Charges:</label>

										<input type="number" class="form-control" name="delivery_charges" value="<? echo $this->admin->get_option("delivery_charges") ?>" required="" placeholder="Delivery Charges">

									</div>
                                   
                                    <div class="form-group">
									<label>Carry bag Charges:</label>

										<input type="number" class="form-control" name="carry_bag" value="<? echo $this->admin->get_option("carry_bag") ?>" required="" placeholder="Carry bag Charges">

									</div>

                                   <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary pull-right">Submit</button>
                                </form>

                            
                                           
                            </div>
                                              
                      
                   </div> 
                   	
                   
                   
                    </div>
                    
<!--       Location Ends             -->

		
		
<!--	Banners	-->
		
			
			<?php if($slider){ ?>

				<div id="navpills-11" class="tab-pane active">

			<?php }else{ ?>

				<div id="navpills-11" class="tab-pane">

			<?php } ?>       
	  <!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->

		<div class="row">

			 <div class="col-md-5">

				 <?php 

					if($slider){

				 ?>


				   <form method="post" action="<?php echo base_url() ?>general/updateSlider" enctype="multipart/form-data">

						<div class="form-group">
						  <label>Select Banner</label>

						  <input type="file" class="form-control" name="banner_image">
<!--						  <small style="color: red">Note: Please select 2400px * 580px Image</small> -->
						</div>

<!--
						<div class="form-group has-danger">
						   <label class="control-label">Description</label>

						   <textarea name="description" id="summernote1" class="form-control" required><?php //echo $slider->description ?></textarea>
						</div>
-->

						
					   <div class="col-md-2">
						<input type="hidden" name="bid" value="<?php echo $slider->id ?>">               
						<button class="btn waves-effect waves-light btn-rounded btn-primary" type="submit" id="bsubmit">Update</button>

					   </div>

				 </form> 

				 <?php }else{ ?>


				  <form method="post" action="<?php echo base_url() ?>general/insertSlider" enctype="multipart/form-data">

						<div class="form-group">
						  <label>Select Banner</label>

						  <input type="file" class="form-control" name="banner_image" required>
<!--						  <small style="color: red">Note: Please select 2400px * 580px Image</small> -->
						</div>

<!--
						<div class="form-group has-danger">
						   <label class="control-label">Description</label>

						   <textarea name="description" id="summernote1" class="form-control" required></textarea>
						</div>
-->

               

					   <div class="col-md-2">

						<button class="btn waves-effect waves-light btn-rounded btn-primary" type="submit" id="bsubmit">Submit</button>

					   </div>

				 </form>  

			   <?php } ?>                                                                                                      

			 </div>


			   <div class="col-md-7">

				  <div class="card" style="border:0px">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table product-overview table-striped" id="zero_config11">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								   <?php 
								   $i = 0;
								$opt = $this->db->query("select * from fdm_va_home_slider_images order by id desc")->result();       	
								   foreach ($opt as $u) {  ?> 
								   <?php if($u->deleted==0){ ?>
									<tr>
										<td style="vertical-align: middle;"><?php echo ++$i ?></td>
										<td style="vertical-align: middle;">
											<img src="<?php echo base_url().$u->images ?>" alt="banner image" style="height: 150px; width: 200px" class="img-responsive">
										</td>
<!--
										<td style="padding: 0.5rem;"><?php //echo $u->link ?></td>
										<td style="padding: 0.5rem;"><?php 
//											   		switch($u->target){
//                                                      case "_top":
//                                                        echo "Top";
//                                                      break;  
//                                                      case "_self":
//                                                        echo "Self";
//                                                      break;  
//                                                      case '_parent':
//                                                        echo "Parent";
//                                                      break;  
//                                                      case '_blank':
//                                                      echo "Blank";   
//                                                      break;
//                                                      default:
//                                                      echo "Blank";
//                                                      break;
//                                                    }      


										?></td>
-->
										<td style="vertical-align: middle;">

										   <?php if($u->status=="Active"){ ?>
									   <div class="switch">
										   <input type="checkbox" data-on-color="info" img_id="<?php echo $u->id ?>" name="switch" data-off-color="success" class="check2" checked>
									   </div>
										   <?php  }elseif($u->status=="Inactive"){ ?>
										<div class="switch">
											<input type="checkbox" img_id="<?php echo $u->id ?>" data-on-color="info" name="switch" data-off-color="success" class="check2">
										   <?php } ?> 
										</div>    
										</td>
										<td style="vertical-align: middle; padding: 0px">

											<a href="<?php echo base_url() ?>general/update-slider/<?php echo $u->id ?>" class="text-inverse p-r-10"><i class="ti-marker-alt"></i>
											</a>
											<a href="#" name="delete" value="<?php echo $u->id ?>" id="<?php echo $u->id ?>" class="text-inverse sa-params"  onclick="delImg(this.id)"><i class="ti-trash"></i></a>

										</td>

									</tr>
								<?php } ?>
							 <?php  

							   } ?> 

								</tbody>
							</table>
						</div>
					</div>
				</div>
									</div>

								</div>
						</div> 


			
<!--   End Welcome Banner             -->
               
               
                                          
                                    
                                                  
                              
                
                
       </div>  


</div>
</div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                   
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

<script>
	
$('#zero_config11').DataTable(); 

    
$('#zero_config11').on('switchChange.bootstrapSwitch','input[name="switch"]', function (e, state) {
          var img_id = $(this).attr("img_id"); 
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = "Active";
                    }else{
                        status = "Inactive";
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>general/bannerStatus",
                        data:{id:img_id,status:status},
                        success:function (data){
                              if(data==1){
                                Swal(
                                  'Success!',
                                  'Banner Image Successfully Enabled.',
                                  'success'
                                )
                            }else{
                                Swal(
                                  'Success!',
                                  'Banner Image Successfully Disabled.',
                                  'success'
                                )
                            }
                        },
						error: function(data){
							if(data==2){
							   Swal(
                                  'Error',
                                  'Error Occured While Enabling.',
                                  'error'
                                )
                            }else{
                                Swal(
                                  'Error',
                                  'Error Occured While Disabled.',
                                  'error'
                                )
                            }
						}

                    });  
        });
	
function delImg(id) {
       Swal({
  title: 'Are you sure?',
  text: 'Selected Image Will Be Permanently Deleted!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, Delete it!',
  cancelButtonText: 'No, Leave it'
}).then((result) => {
  if (result.value) {

    
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>general/delImg',
        success: function(data) {
          console.log(data);
          if(data==1){
            Swal(
              'Deleted!',
              'Your Selected Image has been Successfully Deleted.',
              'success'
            )
            setTimeout(function(){ location.reload(); }, 2000);

            console.log(data);
            return false;
           }
           if(data==0){
            Swal(
              'Error!',
              'Error Occured While Deleting File.',
              'error'
            )
            console.log(data);
            return false;
           } 
               
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal(
      'Cancelled',
      'Your Selected Image Is Not Deleted :)',
      'error'
    )
  }
})
    }    
	
	
$('#zero_config').DataTable(); 

 function socialUrl(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#icondisplay').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#icon").change(function() {
  socialUrl(this);
});


// Social network starts

function socialFunction(id) {
  
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>general/editSocial/'+id,
        success: function(data) {
            //location.reload();  
         // window.location = "<?php //echo base_url() ?>pages/news-and-community/<?php //echo $pid ?>"
            console.log(data);
        }
    });
 
  } 


$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
$('#zero_config').on('switchChange.bootstrapSwitch','input[name="social"]', function (e, state) {
        
          var soc_id = $(this).attr("soc_id"); 
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = "Active";
                    }else{
                        status = "Inactive";
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>general/socialsitestatus",
                        data:{id:soc_id,status:status},
                        success:function (data){
                            
                            //location.reload();
                            if(data==1){
                                Swal(
                                  'Success!',
                                  'Social Site Successfully Enabled.',
                                  'success'
                                )
                            }else{
                                Swal(
                                  'Success!',
                                  'Social Site Successfully Disabled.',
                                  'success'
                                )
                            }
                        }


                    });  
        });

function delSocialsite(id) {
       Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this imaginary file!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected Social Site has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>general/delSocialsite/'+id,
        success: function(data) {
            location.reload();  
 
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    
    Swal(
      'Cancelled',
      'Your Selected Social Site is safe :)',
      'error',
      
    )
  }
})
}      


//social network ends


// Location starts
 
$('#zero_config1').dataTable();

$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
      $('#zero_config1').on('switchChange.bootstrapSwitch','input[name="location1"]', function (e, state) {
        
          var loc_id = $(this).attr("loc_id"); 
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = 1;
                    }else{
                        status = 0;
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>general/Locationstatus",
                        data:{id:loc_id,status:status},
                        success:function (data){
                            
                            //location.reload();
                            if(data==1){
                                Swal(
                                  'Success!',
                                  'Location Successfully Enabled.',
                                  'success'
                                )
                            }else{
                                Swal(
                                  'Success!',
                                  'Location Successfully Disabled.',
                                  'success'
                                )
                            }
                        }


                    });  
        });

function delLocation(id) {
       Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this location!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected Location has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>general/delLocation/'+id,
        success: function(data) {
            location.reload();  
 
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    
    Swal(
      'Cancelled',
      'Your Selected Location is safe :)',
      'error',
      
    )
  }
})
}      


//Location ends
	
	

	
// Area starts
 
$('#zero_config2').dataTable();

$("input[type='checkbox']").bootstrapSwitch({size : 'mini'});
      $('#zero_config2').on('switchChange.bootstrapSwitch','input[name="area1"]', function (e, state) {
        
          var loc_id = $(this).attr("area_id"); 
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = "Active";
                    }else{
                        status = "Inactive";
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>general/areastatus",
                        data:{id:loc_id,status:status},
                        success:function (data){
                            
                            //location.reload();
                            if(data==1){
                                Swal(
                                  'Success!',
                                  'Area Successfully Enabled.',
                                  'success'
                                )
                            }else{
                                Swal(
                                  'Success!',
                                  'Area Successfully Disabled.',
                                  'success'
                                )
                            }
                        }


                    });  
        });

function delArea(id) {
       Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this area!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it'
}).then((result) => {
  if (result.value) {

    Swal(
      'Deleted!',
      'Your Selected Area has been deleted.',
      'success'
    )
    $.ajax({
        method: 'POST',
        data: {'id' : id },
        url: '<?php echo base_url() ?>general/delArea/'+id,
        success: function(data) {
            location.reload();  
 
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    
    Swal(
      'Cancelled',
      'Your Selected Area is safe :)',
      'error',
      
    )
  }
})
}      


//Area ends
	
	
	
	
	
	
	

// Logo

 function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#display').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#logo1").change(function() {
  readURL(this);
});

 function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#display1').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#logo2").change(function() {
  readURL1(this);
});
	
	
function delCharges(id) {
       Swal({
  title: 'Are you sure?',
  text: 'You will not be able to recover this imaginary file!',
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
        url: '<?php echo base_url() ?>general/delCharges/'+id,
        success: function(data) {
            location.reload();  
 
        }
    });
 
  } else if (result.dismiss === Swal.DismissReason.cancel) {
    
    Swal(
      'Cancelled',
      'Your Selected item is safe :)',
      'error',
      
    )
  }
})
}      
$('#zero_config5').dataTable();
  $('#zero_config5').on('switchChange.bootstrapSwitch','input[name="charges"]', function (e, state) {
        
          var soc_id = $(this).attr("soc_id"); 
                    var status;
                  
                    if ($(this).is(":checked")){
                        status = "Active";
                    }else{
                        status = "Inactive";
                    }
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url();?>general/chargestatus",
                        data:{id:soc_id,status:status},
                        success:function (data){
                            
                            //location.reload();
                            if(data==1){
                                Swal(
                                  'Success!',
                                  'Successfully Enabled.',
                                  'success'
                                )
                            }else{
                                Swal(
                                  'Success!',
                                  'Successfully Disabled.',
                                  'success'
                                )
                            }
                        }


                    });  
        });

	
	

</script>


           

           
           
<!-- End footer -->