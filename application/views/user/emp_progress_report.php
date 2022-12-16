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
    <!-- for view -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/list_trainee.css">

    <!-- Notification -->
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/notifications/css/lobibox.min.css" />

    <title>Trainee Listing</title>
  </head>
  <body>
    <style type="text/css">
        .btn-sm{
            padding: 0.15rem 0.2rem !important;
        }
        .badge{
        padding: 0.45em 0.7em !important;
    }
    @media only screen and (max-width: 600px) {

    .hide_td_title {
            display: none;
        }
    }
        .modal_trigger_btn{
        display: none;

    }
    </style>
    

 <!--start wrapper-->
    <div class="wrapper">
      
      <!--sidebar-wrapper-->
        <?php include('application/views/layouts/emp/sidebar.php'); ?>

        <!--end sidebar-wrapper-->
        <!--header-->
        <?php include('application/views/layouts/topbar.php'); ?>
        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--end breadcrumb-->
          <h6 class="mb-0 text-uppercase">Trainee Listing</h6>
                <hr/>
                  <br>
                <div class="card">
                    <br>
                        
                        <!-- <input type="hidden" name="emp_id" id="emp_id"> -->
                    <div class="card-body">
                        <div class="table-responsive">
                          <form action="javascript:void(0)" method="POST" id="reportAdd">
                            <input type="hidden" name="assignedDate" id="assignedDate">
                            <input type="hidden" name="batch_code" id="batch_code">
                            <input type="hidden" name="createdBy_emp" id="createdBy_emp">
                            <input type="hidden" name="emp_code" id="emp_code">
                               
                                    <div>
                                  <label style="width: 10%; margin-left: 90%;">Report Day</label>
                                      <input type="text" style="width: 10%; margin-left: 90%;" readonly class="form-control" name="daycount" id="daycount">
                                </div><br>
                                <!-- <button class="btn btn-success" style=" margin-left: 90%;" type="submit" id="SubmitDate">Submit</button> -->
                          <!-- </form> -->
                            <!-- <form action="javascript:void(0)" method="POST" id="reportAdd"> -->
                            <table id="child-table-list" class="table table-striped table-bordered" style="width:100%; ">
                                <thead>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Sno</th>
                                        <th>Trainee Name</th>
                                        <th>Batch Code</th>
                                        <th>Trainee Code</th>
                                        <th>Attendance</th>
                                        <th>Progress trend</th>
                                        <th>Punctuality</th>
                                        <th>Completion of Assignment</th>
                                        <th>Participation in activities</th>
                                        <th>Understanding of content</th>
                                        <th>Communication</th>
                                        <th>Confidence</th>
                                        <th>Asking Questions</th>
                                        <th>Average Score</th>
                                        <!-- <th>Last three days average</th> -->
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <center>
                                <label >Next Training Date</label>
                                  <input type="date" style="width: 20%;" class="form-control" name="assignedDate" id="assignedDate" required><br>
                                      <label><input class="form-check-input" type="checkbox" id="training_status" name="training_status"> Training Completed </label><br>
                                <button class="btn btn-success" type="submit" id="SubmitBtn" value="submit">Submit</button>
                            </center>
                            </form>
                        </div>
                    </div>
            </div>
      </div>
    <!-- end page content-->
    </div>
     </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script type="text/javascript">
      var BASE_URL = "<?php echo base_url();?>";
    </script>

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

    <!-- data for table -->
    <script src="<?php echo asset_url();?>pro_js/emp_report_list.js"></script>

    <!-- notification js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/notification/notification.js"></script>

    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>
    <script type="text/javascript">

        /*calculation for trainee score*/
      $(document).on('keyup','input.common',function(){

              $common = $(this).parents('tr').find('.common');
              $expenseTotal = $(this).parents('tr').find('#average_score');
              let tot_val =0;
              $.each($common,function(index,object){
                if($(object).val()!=''){
                tot_val = tot_val + parseInt($(object).val());
                }
              })
             $expenseTotal.val((tot_val/7).toFixed(2));
            });


            /*only number*/
      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57)){
              return false;
          }
          return true;
      }

    </script>
  </body>
</html>