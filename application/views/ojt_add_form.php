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

    <title>OJT TRACKER</title>
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
                <h6 class="mb-0 text-uppercase">Create OJT TRACKER</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div class="p-4 border rounded">
                        
                        <?php //echo form_open_multipart('index.php/OjtController/form_store_ojt_tracker', array('method' => 'post', 'id' => 'formojt','class' => 'needs-validation', 'autocomplete' => 'off','novalidate'=>'novalidate'));?>
                         <div class="row" style="padding: 10px;">
                            <div class="col-md-2">
                                <h6>Batch code</h6>
                                <select class="form-select form-select2 valid_frm" id="batch_code" name="batch_code" onchange="get_ojt_day_list(this.value)"  required>
                                    <option selected disabled></option>
                                    <?php
                                        for($i=0;$i<count($select_batchcode['batch_code']);$i++){
                                            echo '<option value="'.$select_batchcode['batch_code'][$i].'" '.$select_batchcode['valid_attr'][$i].'>'.$select_batchcode['batch_code'][$i].'</option>';   
                                        }
                                    ?>
                                  </select>
                            </div>
                            <div class="col-md-2">
                                <h6>Day</h6>
                                  <select class="form-select form-select1 valid_frm" name="day" id="day" onchange="return list_ojt(document.getElementById('batch_code').value);" required>
                                    <option selected disabled></option>
                                    <option value="1" id="day1" disabled>Day 1</option>
                                    <option value="2" id="day2" disabled>Day 2</option>
                                    <option value="3" id="day3" disabled>Day 3</option>
                                  </select>
                            </div>
                        </div>
                        <form class="needs-validation" id="formojt" action="javascript:void(0)" method="POST"  autocomplete="off" novalidate>
                        <input type="hidden" class="form-control" id="created_by" name="created_by" value=<?php echo $this->session->userdata('username'); ?>>
                  
                        <div class="card-body">
                        <div class="table-responsive">
                            <table id="child-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                       
                                        <th>Sno</th>
                                        <th>Batch Code</th>
                                        <th>Location</th>
                                        <th>Code Of Trainee</th>
                                        <th>Designation</th>
                                        <th>Join Date</th>
                                        <th>Trainer</th>
                                        <th>Training Covered /Clarifications</th>
                                        <th>TOTAL NO OF OUTLET VISITED / BILL CUTS</th>
                                        <th>TARGET ACHIEVED</th>
                                    </tr>
                                </thead>
                                 <tbody id="testingtable">
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <br>
                           
                            <button type="submit" class="btn btn-info" id="submit">Submit</button>
                        </div>
                    </div>
                    <?php 

                    //echo form_close(); ?>
                      </form>
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
    

    <script>

      // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'
    
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')
    
          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
    
            form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>

    <!-- Main JS-->
    <script src="<?php echo asset_url();?>js/main.js"></script>
    
   
    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>
     <!-- ojt function js -->
    <script src="<?php echo asset_url();?>pro_js/create_ojt_tracker.js"></script>

    <!-- validation -->
    <script src="<?php echo asset_url();?>js/jquery.validate.js"></script>

    <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>";</script>
    <script type="text/javascript">
      
      $("#formojt").validate();
    </script>



  </body>
</html>