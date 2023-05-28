<?php admin_header(); 

$aid = $this->session->userdata("admin_id");
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                   <!--  <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div> -->
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
                <!-- Info box -->
                <!-- ============================================================== -->

                <div class="card-group">
                    <!-- Card -->
                    
                <? if($this->admin->get_agent_role()){ ?>    
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-danger">
                                        <i class="mdi mdi-account-multiple  text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Active Orders
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->query("select * from orders where assigned_to='$aid' and payment_status='Success' and order_status='Success' and delivery_status='Pending'")->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="mdi mdi-book-open-page-variant"></i>
                                    </span>
                                </div>
                                <div>
                                    Delivered Orders

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->query("select * from orders where assigned_to='$aid' and payment_status='Success' and order_status='Success' and delivery_status='Success'")->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <? }else{ ?>    
                    
                    
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="mdi mdi-account-multiple text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Users

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->get_where("shreeja_users",array("user_status"=>0))->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-warning">
                                        <i class="mdi mdi-account-multiple text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Agents
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->get_where("fdm_va_auths",array("status"=>"Active","deleted"=>0,"role"=>2))->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg btn-info">
                                        <i class="mdi mdi-book-open-page-variant"></i>
                                    </span>
                                </div>
                                <div>
                                    Delivered Orders

                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->query("select * from orders where order_status='Success' and delivery_status='Success'")->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="mdi mdi-account-multiple text-white"></i>
                                    </span>
                                </div>
                                <div>
                                    Total Orders
                                </div>
                                <div class="ml-auto">
                                    <h2 class="m-b-0 font-light"><?php echo $this->db->get_where("orders",array("order_status !="=>"Cancelled"))->num_rows(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Column -->

                <? } ?>

                </div>
                 <!-- column -->
                
                <!-- ============================================================== -->
                <!-- Sales Summery -->

                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Email campaign chart -->
               
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php admin_footer(); ?>

            <!-- End footer -->