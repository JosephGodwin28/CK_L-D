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

    <title>Signup</title>
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
              <div class="text-center">
                <h4>Join us today</h4>
                <p>Enter your email and password to register</p>
              </div>
              <form class="form-body row g-3" id="signupForm" action="javascript:void(0)" method="post" autocomplete="off">
                <div class="col-12">
                  <label for="username" class="form-label">Name</label>
                  <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-12 col-lg-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree the Terms and Conditions
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit"  id="btnSignup" class="btn btn-warning">Sign Up</button>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="position-relative border-bottom my-3">
                     <div class="position-absolute seperator translate-middle-y">or continue with</div>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                      <a href="javascript:;" class=""><img src="<?php echo asset_url();?>images/icons/facebook.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="<?php echo asset_url();?>images/icons/apple-black-logo.png" alt=""></a>
                      <a href="javascript:;" class=""><img src="<?php echo asset_url();?>images/icons/google.png" alt=""></a>  
                  </div>
                </div>
                <div class="col-12 col-lg-12 text-center"> 
                  <p class="mb-0">Already have an account? <a href="<?php echo site_url('Signin');?>">Sign in</a></p>
                </div>
              </form>
            </div>
          </div>
         </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-absolute top-0 h-100 d-xl-block d-none register-cover-img">
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
    <script src="<?php echo asset_url();?>pro_js/signup.js"></script>

  </body>
</html>