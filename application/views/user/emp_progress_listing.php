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
                <button type="button" class="btn btn-primary modal_trigger_btn" data-toggle="modal" data-target="#adt_details_modal" id="adt_details_modal_btn">Basic  Modal</button>
                    <div class="modal fade" id="adt_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Trainee Details</h5>
                                    <!-- <button type="button" class="close" onclick="get_action_pop();" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered" id="adt_tb">
                                        <thead>

                                            <tr>
                                                <th>Title</th>
                                                <th> Details </th>
                                                <!-- <th>Points</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="adt_tb_body">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger px-5 rounded-0" onclick="get_action_pop();">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <?php //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';?>
                        <input type="hidden" name="emp_id" id="emp_id">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="child-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Batch Code</th>
                                        <th>Today Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="testingtable">
                                </tbody>
                            </table>
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
    <script src="<?php echo asset_url();?>pro_js/display_report_list.js"></script>

    <!-- notification js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/notification/notification.js"></script>
<script type="text/javascript"></script>
  </body>
</html>