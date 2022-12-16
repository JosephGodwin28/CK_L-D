<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--plugins-->
    <link href="<?php echo asset_url();?>plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo asset_url();?>css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="<?php echo asset_url();?>css/dark-theme.css" rel="stylesheet" />
    <link href="<?php echo asset_url();?>css/header-colors.css" rel="stylesheet" />

    <title>L&D</title>
  </head>
 
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
      <!--sidebar-wrapper-->
        <?php include('application/views/layouts/emp/sidebar.php'); ?>

        <!--end sidebar-wrapper-->
        <!--header-->
        <?php include('application/views/layouts/topbar.php'); ?>

        <!--end header-->
        <!--page-wrapper-->

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->


          <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3">
            <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="widget-icon-2 bg-gradient-danger text-white">
                      <ion-icon name="card-sharp"></ion-icon>
                    </div>
                    <div class="fs-5 ms-auto"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                  </div>
                  <h5 class="my-3">Trainer Count</h5>
                  <div class="progress mt-1 my-progress" style="height: 5px;">
                    <div class="progress-bar bg-gradient-danger trainer_count" role="progressbar" style="width: 10%"></div>
                  </div>
                  <!-- <input type="text" name="trainer_count" id="trainer_count"> -->
                  <p class="mb-0 mt-2" id="trainer_count"></p>
                </div>
              </div>
             </div>
             <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="widget-icon-2 bg-gradient-purple text-white">
                      <ion-icon name="people-sharp"></ion-icon>
                    </div>
                    <div class="fs-5 ms-auto"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                  </div>
                  <h5 class="my-3">Trainee Count</h5>
                  <div class="progress mt-1" style="height: 5px;">
                    <div class="progress-bar bg-gradient-purple" role="progressbar" style="width: 10%"></div>
                  </div>
                  <!-- <input type="text" name="trainee_count" id="trainee_count"> -->
                  <p class="mb-0 mt-2" id="trainee_count"><span class="float-end text-success">+8.5%</span></p>
                </div>
              </div>
             </div>
             <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="widget-icon-2 bg-gradient-success text-white">
                      <ion-icon name="wallet-sharp"></ion-icon>
                    </div>
                    <div class="fs-5 ms-auto"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                  </div>
                  <h5 class="my-3">Total Income</h5>
                  <div class="progress mt-1" style="height: 5px;">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%"></div>
                  </div>
                  <p class="mb-0 mt-2">$58,653,24<span class="float-end text-success">+5.9%</span></p>
                </div>
              </div>
             </div>
             
             <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="widget-icon-2 bg-gradient-branding text-white">
                      <ion-icon name="pie-chart-sharp"></ion-icon>
                    </div>
                    <div class="fs-5 ms-auto"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                  </div>
                  <h5 class="my-3">Bounce Rate</h5>
                  <div class="progress mt-1" style="height: 5px;">
                    <div class="progress-bar bg-gradient-branding" role="progressbar" style="width: 65%"></div>
                  </div>
                  <p class="mb-0 mt-2">24.3%<span class="float-end text-danger">-5.6%</span></p>
                </div>
              </div>
             </div>
             <div class="col">
              <div class="card radius-10">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="widget-icon-2 bg-gradient-warning text-white">
                      <ion-icon name="logo-facebook" role="img" class="md hydrated" aria-label="logo facebook"></ion-icon>
                    </div>
                    <div class="fs-5 ms-auto"><ion-icon name="ellipsis-horizontal-sharp"></ion-icon></div>
                  </div>
                  <h5 class="my-3">Followers</h5>
                  <div class="progress mt-1" style="height: 5px;">
                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 65%"></div>
                  </div>
                  <p class="mb-0 mt-2">1,328<span class="float-end text-success">+7.6%</span></p>
                </div>
              </div>
             </div>
            </div>

            <div class="card radius-10 overflow-hidden w-100">
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Monthly Orders</h6>
                  <div class="dropdown options ms-auto">
                    <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                    </div>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
                <div class="chart-container1">
                  <canvas id="chart1"></canvas>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-12 col-xl-6">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <h6 class="mb-0">Top Categories</h6>
                      <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                          <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                      <div class="col-lg-7 col-xl-7 col-xxl-8">
                        <div class="chart-container6">
                           <div class="piechart-legend">
                              <h2 class="mb-1">68%</h2>
                              <h6 class="mb-0">Total Sales</h6>
                           </div>
                          <canvas id="chart2"></canvas>
                        </div>
                      </div>
                      <div class="col-lg-5 col-xl-5 col-xxl-4">
                        <div class="">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0 d-flex align-items-center gap-2">
                              <ion-icon name="ellipse-sharp" class="text-info"></ion-icon><span>Electronics</span>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center gap-2">
                              <ion-icon name="ellipse-sharp" class="text-danger"></ion-icon><span>Furniture</span>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center gap-2">
                              <ion-icon name="ellipse-sharp" class="text-success"></ion-icon><span>Fashion</span>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center gap-2">
                              <ion-icon name="ellipse-sharp" class="text-primary"></ion-icon><span>Accessories</span>
                            </li>
                            <li class="list-group-item border-0 d-flex align-items-center gap-2">
                              <ion-icon name="ellipse-sharp" class="text-warning"></ion-icon><span>Mobiles</span>
                            </li>
                          </ul>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
               <div class="col-12 col-lg-12 col-xl-6">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <h6 class="mb-0">Customers</h6>
                      <div class="dropdown options ms-auto">
                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                          <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                        </div>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                          <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                      <div class="col-lg-7 col-xl-7 col-xxl-7">
                        <div class="chart-container6">
                           <div class="piechart-legend">
                              <h2 class="mb-1">48K</h2>
                              <h6 class="mb-0">Customers</h6>
                           </div>
                          <canvas id="chart3"></canvas>
                        </div>
                      </div>
                      <div class="col-lg-5 col-xl-5 col-xxl-5">
                        <div class="">
                          <div class="d-flex align-items-start gap-2 mb-3">
                            <div><ion-icon name="ellipse-sharp" class="text-info"></ion-icon></div>
                            <div>
                              <p class="mb-1">Current Customers</p>
                              <p class="mb-0 h5">66%</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-start gap-2 mb-3">
                            <div><ion-icon name="ellipse-sharp" class="text-danger"></ion-icon></div>
                            <div>
                              <p class="mb-1">New Customers</p>
                              <p class="mb-0 h5">48%</p>
                            </div>
                          </div>
                          <div class="d-flex align-items-start gap-2">
                            <div><ion-icon name="ellipse-sharp" class="text-success"></ion-icon></div>
                            <div>
                              <p class="mb-1">Retargeted Customers</p>
                              <p class="mb-0 h5">25%</p>
                            </div>
                          </div>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
            </div><!--end row-->

          </div>
          <!-- end page content-->
         </div>
         <!--end page content wrapper-->

        <!--footer -->
        <?php include('application/views/layouts/footer.php'); ?>
        <!-- end footer -->

         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->
  
         <!--start switcher-->
         <div class="switcher-body">
          <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><ion-icon name="color-palette-sharp" class="me-0"></ion-icon></button>
          <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
            <div class="offcanvas-header border-bottom">
              <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
              <h6 class="mb-0">Theme Variation</h6>
              <hr>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" checked>
                <label class="form-check-label" for="LightTheme">Light</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
                <label class="form-check-label" for="DarkTheme">Dark</label>
              </div>
              <hr/>
              <h6 class="mb-0">Header Colors</h6>
              <hr/>
              <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                  <div class="col">
                    <div class="indigator headercolor1" id="headercolor1"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor2" id="headercolor2"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor3" id="headercolor3"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor4" id="headercolor4"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor5" id="headercolor5"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor6" id="headercolor6"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor7" id="headercolor7"></div>
                  </div>
                  <div class="col">
                    <div class="indigator headercolor8" id="headercolor8"></div>
                  </div>
                </div>
              </div>
              <hr/>
              <h6 class="mb-0">Sidebar Colors</h6>
              <hr/>
              <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                  <div class="col">
                    <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                  </div>
                  <div class="col">
                    <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
         <!--end switcher-->

<!-- black screen background -->
         <!--start overlay-->
          <!-- <div class="overlay"></div> -->
         <!--end overlay-->

     </div>
  <!--end wrapper-->


    <!-- base Url -->
    <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>";</script>
    <!-- JS Files-->
    <script src="<?php echo asset_url();?>js/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="<?php echo asset_url();?>plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo asset_url();?>plugins/chartjs/chart.min.js"></script>
    <script src="<?php echo asset_url();?>js/index3.js"></script>
    <!-- Main JS-->
    <script src="<?php echo asset_url();?>js/main.js"></script>
     <!--dashboard js -->
    <script src="<?php echo asset_url();?>pro_js/dashboard_fun.js"></script>


  </body>
</html>