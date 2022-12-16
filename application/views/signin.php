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
    <!-- Notification -->
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/notifications/css/lobibox.min.css" />

    <title>SignIn</title>
  </head>
  <body class="bg-white">
    
 <!--start wrapper-->
    <div class="wrapper">
      <div class="">

        <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
           <div class="card shadow-none">
            <div class="card-body">
              <center>
                <img src="assets/images/ck_logo.png" alt="logo.png" style="width:50%">
              </center>
              <br>
              <div class="text-center">
                <h4>Sign In</h4>
                <p>Sign In to your account</p>
              </div>
              <form  id="loginForm" action="javascript:void(0)" method="POST"  autocomplete="off" class="form-body row g-3">
                <div class="col-12">
                  <label for="empid" class="form-label">Emp ID</label>
                  <input type="text" class="form-control" name="empid" id="empid">
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-12 col-lg-6">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">
                    <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                  </div>
                </div>
                <!-- <div class="col-12 col-lg-6 text-end">
                  <a href="authentication-reset-password-cover.html">Forgot Password?</a>
                </div> -->
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit"  id="btnSignin" class="btn btn-primary">Sign In</button>
                  </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                  <p class="mb-0">Don't have an account? <a href="<?php echo site_url('Signup');?>">Sign in</a></p>
                </div>
              </form>
            </div>
          </div>
         </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-absolute top-0 h-100 d-xl-block d-none login-cover-img">
            <div class="text-white p-5 w-100">
             
            </div>
          </div>
        </div>
      </div><!--end row-->
    </div>
     </div>
  <!--end wrapper-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>

    <?php include('application/views/layouts/common_script_links.php'); ?>

    <!-- login function js -->
    <script src="<?php echo asset_url();?>pro_js/login.js"></script>

    <script type="text/javascript">
      var BASE_URL = "<?php echo base_url();?>";
    </script>

  </body>
</html>