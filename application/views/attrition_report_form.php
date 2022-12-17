<?php 
  if(empty($this->session->emp_id)){
    redirect(base_url().'logout');   
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--plugins-->
    <link href="<?php echo asset_url();?>plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="<?php echo asset_url();?>css/dark-theme.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>css/header-colors.css" rel="stylesheet" />

    <!-- Notification -->
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/notifications/css/lobibox.min.css" />

    <title>ATTRITION TRACKER</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       
<!--sidebar-wrapper-->
        <?php 

        include('application/views/layouts/sidebar.php'); ?>

        <!--end sidebar-wrapper-->
        <!--header-->
        <?php include('application/views/layouts/topbar.php'); ?>

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">
            <div class="row">
              <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Report ATTRITION TRACKER</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div class="p-4 border rounded">
                      <!--form class="row g-3 needs-validation" id="userFormCreat" action="javascript:void(0)" method="POST"  autocomplete="off" novalidate--
                      >  
                           <!--input type="hidden" class="form-control" id="location" name="location" value=<?php echo $this->session->userdata('username'); ?>-->
                        
                        <?php echo form_open_multipart('index.php/AttritionController/form_store_attrition_tracker', array('method' => 'post', 'id' => 'formattrition','class' => 'needs-validation', 'autocomplete' => 'off','novalidate'=>'novalidate'));?>
                        <input type="hidden" class="form-control" id="created_by" name="created_by" value=<?php echo $this->session->userdata('username'); ?>>
                        <div class="row" style="padding: 10px;">
                            <div class="col-md-2">
                                <h6>Batch code</h6>
                              <select class="form-select form-select2 valid_frm" id="batch_code" name="batch_code" aria-controls="child-table" onchange="return list_attrition(),get_attrition_trainee_list(this.value)">
                                      <option selected disabled></option>
                                      <?php
                                          foreach ($select_batchcode['batch_code'] as $key => $value) {
                                              echo '<option value="'.$value.'" >'.$value.'</option>';   
                                          }    
                                      ?>
                                    </select>
                              </div>
                             
                              <div class="col-md-2">
                                  <h6>Trainee code</h6>
                                  <select class="form-select form-select2 valid_frm" id="trainee_code" name="trainee_code" onchange="return list_attrition()"  >
                                      <option selected disabled></option>
                                      <?php
                                          foreach ($select_traineecode as $key => $value) {
                                            
                                              echo '<option value="'.$value.'" >'.$value.'</option>';   
                                          }
                                              
                                      ?>
                                    </select>
                              </div>
                           </div> 
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="child-table" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                       
                                        <th>Sno</th>
                                        <th>Batch Code</th>
                                        <th>Location</th>
                                        <th>Code Of Trainee</th>
                                        <th>Designation</th>
                                        <th>Join Date</th>
                                        <th>Trainer</th>
                                       <th>Training Stage -Stage  of Attrition</th>
                                        <th>Date of Attrition</th>
                                        <th>Mode of Attrition</th>
                                        <th>Attrition Category</th>
                                        <th>Detailed Reason</th>
                                    </tr>
                                </thead>
                                 <tbody id="testingtable">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php 

                    echo form_close(); ?>
                      <!--/form-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--end row-->


          </div>
          <!-- end page content-->
         </div><!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->

     </div>
  <!--end wrapper-->


  


    <!-- JS Files-->
    <script src="<?php echo asset_url();?>js/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="<?php echo asset_url();?>plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo asset_url();?>plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo asset_url();?>js/table-datatable.js"></script>
    

   

    <!-- Main JS-->
    <script src="<?php echo asset_url();?>js/main.js"></script>
    
   
    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>
     <!-- attrition function js -->
    <script src="<?php echo asset_url();?>pro_js/report_attrition_tracker.js"></script>

    <!-- validation -->
    <script src="<?php echo asset_url();?>js/jquery.validate.js"></script>

    <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>";</script>

    


  </body>
</html>