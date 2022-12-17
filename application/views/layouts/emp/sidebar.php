<!doctype html>
<html lang="en" class="light-theme">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--plugins-->
    <link href="<?php echo asset_url();?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="<?php echo asset_url();?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>/css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>/css/style.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="<?php echo asset_url();?>/css/dark-theme.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>/css/header-colors.css" rel="stylesheet" />

    <title>SYN-UI - Bootstrap Admin Template</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar wrapper-->
        <div class="mini-sidebar-wrapper">
           <div class="mini-sidebar-header">
              <img src="<?php echo asset_url();?>/images/logo-icon-2.png" alt="" class="logo-icon">
           </div>
           <div class="mini-sidebar-navigation d-flex align-items-center justify-content-center">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#dashboard"><ion-icon name="home-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Trainee">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#Trainee"><ion-icon name="briefcase-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Today Report">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#todayreport"><ion-icon name="bag-handle-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Remark">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#remark"><ion-icon name="gift-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Forms">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#forms"><ion-icon name="newspaper-sharp"></ion-icon></a>
              </li>
              <!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Tables">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#tables"><ion-icon name="server-sharp"></ion-icon></a>
              </li> -->
              <!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Components">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#components"><ion-icon name="gift-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Forms">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#forms"><ion-icon name="newspaper-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Tables">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#tables"><ion-icon name="server-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Authentication">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#authentication"><ion-icon name="lock-closed-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Icons">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#icons"><ion-icon name="leaf-sharp"></ion-icon></a>
              </li> -->
              <!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Charts">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#charts"><ion-icon name="bar-chart-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Maps">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#maps"><ion-icon name="map-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Pages">
                <a href="javascript:;" class="nav-link" data-bs-toggle="pill" data-bs-target="#pages"><ion-icon name="copy-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Invoice">
                <a href="pages-invoices.html" class="nav-link"><ion-icon name="receipt-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="To Do">
                <a href="pages-to-do.html" class="nav-link"><ion-icon name="shield-checkmark-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Profile">
                <a href="pages-user-profile.html" class="nav-link"><ion-icon name="person-circle-sharp"></ion-icon></a>
              </li>
              <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Edit Profile">
                <a href="pages-edit-profile.html" class="nav-link"><ion-icon name="create-sharp"></ion-icon></a>
              </li> -->
            </ul>
            </div>
            <div class="toggle-menu-wrapper">
               <div class="toggle-menu-button">
                <ion-icon name="chevron-back-sharp"></ion-icon>      
               </div>
            </div>
         </div>

         <!--start submenu wrapper-->
         <div class="sidebar-submenu-wrapper">
          <div class="tab-content">
            <div class="tab-pane fade" id="dashboard">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Dashboards</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="<?php echo base_url();?>EmpController/emp_dashboard" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Default</a>
                <!-- <a href="index2.html" class="list-group-item d-flex align-items-center"><ion-icon name="bar-chart-outline"></ion-icon>Analytics</a>
                <a href="index3.html" class="list-group-item d-flex align-items-center"><ion-icon name="bag-check-outline"></ion-icon>eCommerce</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="Trainee">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Trainee</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="<?php echo base_url();?>EmpController/emp_form_table" class="list-group-item d-flex align-items-center"><ion-icon name="print-outline"></ion-icon>Add Trainee</a>
                <!-- <a href="widgets-data-widgets.html" class="list-group-item d-flex align-items-center"><ion-icon name="pie-chart-outline"></ion-icon>Data Widgets</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="todayreport">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Report</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="<?php echo base_url();?>EmpController/emp_progress_list" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Trainning Progress Report</a>
                <a href="<?php echo base_url();?>EmpController/emp_pending_list" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Trainning Pending Report</a>
                <a href="<?php echo base_url();?>EmpController/emp_completed_list" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Trainning Completed Report</a>
                <!-- <a href="" class="list-group-item d-flex align-items-center"><ion-icon name="list-outline"></ion-icon>Product List</a> -->
                <!-- <a href="ecommerce-shop-grid-view-top-filter.html" class="list-group-item d-flex align-items-center"><ion-icon name="filter-outline"></ion-icon> Product Top Filters</a>
                <a href="ecommerce-product-details.html" class="list-group-item d-flex align-items-center"><ion-icon name="information-circle-outline"></ion-icon>Product Details</a>
                <a href="ecommerce-product-comparison.html" class="list-group-item d-flex align-items-center"><ion-icon name="compass-outline"></ion-icon>Product Comparison</a>
                <a href="ecommerce-shop-cart.html" class="list-group-item d-flex align-items-center"><ion-icon name="bag-handle-outline"></ion-icon>Shoping Cart</a>
                <a href="ecommerce-checkout-details.html" class="list-group-item d-flex align-items-center"><ion-icon name="card-outline"></ion-icon>Checkout</a>
                <a href="ecommerce-checkout-shipping.html" class="list-group-item d-flex align-items-center"><ion-icon name="shield-checkmark-outline"></ion-icon>Shipping</a>
                <a href="ecommerce-checkout-payment.html" class="list-group-item d-flex align-items-center"><ion-icon name="gift-outline"></ion-icon>Payment</a>
                <a href="ecommerce-checkout-review.html" class="list-group-item d-flex align-items-center"><ion-icon name="receipt-outline"></ion-icon>Review Cart</a>
                <a href="ecommerce-checkout-complete.html" class="list-group-item d-flex align-items-center"><ion-icon name="shield-checkmark-outline"></ion-icon>Order Complete</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="forms">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Forms</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="<?php echo base_url();?>EmpController/performance_list" class="list-group-item d-flex align-items-center"><ion-icon name="document-outline"></ion-icon>Assessment Mark</a>
                <a href="<?php echo base_url();?>EmpController/performance_report_list" class="list-group-item d-flex align-items-center"><ion-icon name="clipboard-outline"></ion-icon>Assessment Report</a>
                <!-- <a href="form-layouts.html" class="list-group-item d-flex align-items-center"><ion-icon name="paper-plane-outline"></ion-icon>Form Layouts</a>
                <a href="form-validations.html" class="list-group-item d-flex align-items-center"><ion-icon name="aperture-outline"></ion-icon>Form Validations</a>
                <a href="form-file-upload.html" class="list-group-item d-flex align-items-center"><ion-icon name="cloud-upload-outline"></ion-icon>File Upload</a>
                <a href="form-date-time-pickes.html" class="list-group-item d-flex align-items-center"><ion-icon name="calendar-outline"></ion-icon>Date Pickers</a>
                <a href="form-select2.html" class="list-group-item d-flex align-items-center"><ion-icon name="easel-outline"></ion-icon>Select2</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="remark">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Remark employee</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="<?php echo base_url();?>EmpController/emp_remark" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Remark Page</a>
                <a href="<?php echo base_url();?>EmpController/report_remark_list" class="list-group-item d-flex align-items-center"><ion-icon name="grid-outline"></ion-icon>Report Page</a>
                <!-- <a href="index2.html" class="list-group-item d-flex align-items-center"><ion-icon name="bar-chart-outline"></ion-icon>Analytics</a>
                <a href="index3.html" class="list-group-item d-flex align-items-center"><ion-icon name="bag-check-outline"></ion-icon>eCommerce</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="tables">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Tables</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="table-basic-table.html" class="list-group-item d-flex align-items-center"><ion-icon name="file-tray-outline"></ion-icon>Assessment Report</a>
                <!-- <a href="table-advance-tables.html" class="list-group-item d-flex align-items-center"><ion-icon name="folder-open-outline"></ion-icon>Advance Tables</a> -->
                <!-- <a href="table-datatable.html" class="list-group-item d-flex align-items-center"><ion-icon name="funnel-outline"></ion-icon>Data Tables</a> -->
              </div>
            </div>
            <div class="tab-pane fade" id="components">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Components</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="component-alerts.html" class="list-group-item d-flex align-items-center"><ion-icon name="notifications-outline"></ion-icon>Alerts</a>
                <a href="component-accordions.html" class="list-group-item d-flex align-items-center"><ion-icon name="flask-outline"></ion-icon>Accordions</a>
                <a href="component-badges.html" class="list-group-item d-flex align-items-center"><ion-icon name="flame-outline"></ion-icon>Badges</a>
                <a href="component-buttons.html" class="list-group-item d-flex align-items-center"><ion-icon name="bulb-outline"></ion-icon>Buttons</a>
                <a href="component-cards.html" class="list-group-item d-flex align-items-center"><ion-icon name="albums-outline"></ion-icon>Cards</a>
                <a href="component-carousels.html" class="list-group-item d-flex align-items-center"><ion-icon name="bed-outline"></ion-icon>Carousels</a>
                <a href="component-list-groups.html" class="list-group-item d-flex align-items-center"><ion-icon name="code-slash-outline"></ion-icon>List Groups</a>
                <a href="component-media-object.html" class="list-group-item d-flex align-items-center"><ion-icon name="cash-outline"></ion-icon>Media Objects</a>
                <a href="component-modals.html" class="list-group-item d-flex align-items-center"><ion-icon name="videocam-outline"></ion-icon>Modals</a>
                <a href="component-navs-tabs.html" class="list-group-item d-flex align-items-center"><ion-icon name="diamond-outline"></ion-icon>Navs & Tabs</a>
                <a href="component-paginations.html" class="list-group-item d-flex align-items-center"><ion-icon name="newspaper-outline"></ion-icon>Pagination</a>
                <a href="component-popovers-tooltips.html" class="list-group-item d-flex align-items-center"><ion-icon name="bookmarks-outline"></ion-icon>Popovers & Tooltips</a>
                <a href="component-progress-bars.html" class="list-group-item d-flex align-items-center"><ion-icon name="battery-half-outline"></ion-icon>Progress</a>
                <a href="component-spinners.html" class="list-group-item d-flex align-items-center"><ion-icon name="planet-outline"></ion-icon>Spinners</a>
                <a href="component-notifications.html" class="list-group-item d-flex align-items-center"><ion-icon name="mic-circle-outline"></ion-icon>Notifications</a>
              </div>
            </div>
            
            <div class="tab-pane fade" id="tables">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Tables</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="table-basic-table.html" class="list-group-item d-flex align-items-center"><ion-icon name="file-tray-outline"></ion-icon>Basic Tables</a>
                <a href="table-advance-tables.html" class="list-group-item d-flex align-items-center"><ion-icon name="folder-open-outline"></ion-icon>Advance Tables</a>
                <a href="table-datatable.html" class="list-group-item d-flex align-items-center"><ion-icon name="funnel-outline"></ion-icon>Data Tables</a>
              </div>
            </div>
            <div class="tab-pane fade" id="authentication">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Authentication</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="authentication-sign-in-basic.html" class="list-group-item d-flex align-items-center"><ion-icon name="archive-outline"></ion-icon>Sign In Basic</a>
                <a href="authentication-sign-in-cover.html" class="list-group-item d-flex align-items-center"><ion-icon name="dice-outline"></ion-icon>Sign In Cover</a>
                <a href="authentication-sign-in-simple.html" class="list-group-item d-flex align-items-center"><ion-icon name="easel-outline"></ion-icon>Sign In Simple</a>
                <a href="authentication-sign-up-basic.html" class="list-group-item d-flex align-items-center"><ion-icon name="file-tray-outline"></ion-icon>Sign Up Basic</a>
                <a href="authentication-sign-up-cover.html" class="list-group-item d-flex align-items-center"><ion-icon name="folder-open-outline"></ion-icon>Sign Up Cover</a>
                <a href="authentication-sign-up-simple.html" class="list-group-item d-flex align-items-center"><ion-icon name="lock-closed-outline"></ion-icon>Sign Up Simple</a>
                <a href="authentication-reset-password-basic.html" class="list-group-item d-flex align-items-center"><ion-icon name="nutrition-outline"></ion-icon>Reset Password Basic</a>
                <a href="authentication-reset-password-cover.html" class="list-group-item d-flex align-items-center"><ion-icon name="trophy-outline"></ion-icon>Reset Password Cover</a>
                <a href="authentication-reset-password-simple.html" class="list-group-item d-flex align-items-center"><ion-icon name="nuclear-outline"></ion-icon>Reset Password Simple</a>
              </div>
            </div>
            <div class="tab-pane fade" id="icons">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Icons</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="icons-line-icons.html" class="list-group-item d-flex align-items-center"><ion-icon name="cafe-outline"></ion-icon>Line Icons</a>
                <a href="icons-boxicons.html" class="list-group-item d-flex align-items-center"><ion-icon name="checkbox-outline"></ion-icon>Boxicons</a>
                <a href="icons-feather-icons.html" class="list-group-item d-flex align-items-center"><ion-icon name="clipboard-outline"></ion-icon>Feather Icons</a>
              </div>
            </div>
            <div class="tab-pane fade" id="charts">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Charts</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="charts-chartjs.html" class="list-group-item d-flex align-items-center"><ion-icon name="stats-chart-outline"></ion-icon>Chart JS</a>
                <a href="charts-apex-chart.html" class="list-group-item d-flex align-items-center"><ion-icon name="watch-outline"></ion-icon>Apex Chart</a>
                <a href="charts-peity.html" class="list-group-item d-flex align-items-center"><ion-icon name="pie-chart-outline"></ion-icon>Peity Charts</a>
                <a href="charts-other.html" class="list-group-item d-flex align-items-center"><ion-icon name="trophy-outline"></ion-icon>Other Charts</a>
              </div>
            </div>
            <div class="tab-pane fade" id="maps">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Maps</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="map-google-maps.html" class="list-group-item d-flex align-items-center"><ion-icon name="navigate-outline"></ion-icon>Google Map</a>
                <a href="map-vector-maps.html" class="list-group-item d-flex align-items-center"><ion-icon name="map-outline"></ion-icon>Vector Map</a>
              </div>
            </div>
            <div class="tab-pane fade" id="pages">
              <div class="list-group list-group-flush">
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-0">Pages</h5>
                  </div>
                  <small class="mb-0">Some placeholder content</small>
                </div>
                <a href="pages-faq.html" class="list-group-item d-flex align-items-center"><ion-icon name="help-circle-outline"></ion-icon>FAQ</a>
                <a href="pages-pricing-tables.html" class="list-group-item d-flex align-items-center"><ion-icon name="card-outline"></ion-icon>Pricing</a>
                <a href="pages-errors-404-error.html" class="list-group-item d-flex align-items-center"><ion-icon name="bug-outline"></ion-icon>404 Error</a>
                <a href="pages-errors-500-error.html" class="list-group-item d-flex align-items-center"><ion-icon name="extension-puzzle-outline"></ion-icon>500 Error</a>
                <a href="pages-errors-coming-soon.html" class="list-group-item d-flex align-items-center"><ion-icon name="alarm-outline"></ion-icon>Coming Soon</a>
                <a href="pages-starter-page.html" class="list-group-item d-flex align-items-center"><ion-icon name="document-outline"></ion-icon>Blank Page</a>
              </div>
            </div>
          </div>
        </div><!--end submenu wrapper-->
        <!--end sidebar wrapper-->


        <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->


         <!--start overlay-->
          <div class="overlay"></div>
         <!--end overlay-->

     </div>
  <!--end wrapper-->


    <!-- JS Files-->
    <script src="<?php echo asset_url();?>/js/jquery.min.js"></script>
    <!-- <script src="<?php echo base_url();?>/assets/js/bootstrap.bundle.min.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="<?php echo asset_url();?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo asset_url();?>/plugins/chartjs/chart.min.js"></script>
    <script src="<?php echo asset_url();?>/js/index.js"></script>
    <!-- Main JS-->
    <script src="<?php echo asset_url();?>/js/main.js"></script>


  </body>
</html>