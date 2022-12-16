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

    <!-- Notification -->
    <link rel="stylesheet" href="<?php echo asset_url();?>plugins/notifications/css/lobibox.min.css" />

    <title>Edit Trainee</title>
  </head>
  <body>
    

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
            <div class="row">
              <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">Create Trainee</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div class="p-4 border rounded">
                      <form class="row g-3 needs-validation" id="userFormEdit" action="javascript:void(0)" method="POST"  autocomplete="off" novalidate>
                        <input type="hidden" name="edit_row_id" id="edit_row_id">
                        
                          <input type="hidden" class="form-control" id="created_by" name="created_by" value=<?php echo $this->session->userdata('username'); ?>>
                          <!-- <input type="hidden" class="form-control" id="location" name="location" value=<?php echo $this->session->userdata('username'); ?>> -->
                        <div class="col-md-4 position-relative">
                          <label for="location" class="form-label">Location</label>
                          <input type="text" class="form-control" id="location" name="location" required>
                         <!--  <div class="valid-tooltip">
                            Select Location
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="emp_code" class="form-label">Emp. Code of Trainee</label>
                          <input type="text" class="form-control" readonly id="emp_code" name="emp_code" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="name_trainee" class="form-label">Name of Trainee</label>
                          <input type="text" class="form-control" id="name_trainee" name="name_trainee" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="designation" class="form-label">Designation</label>
                          <input type="text" class="form-control" id="designation" name="designation" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="pro_sbu" class="form-label">Process/SBU</label>
                          <input type="text" class="form-control" id="pro_sbu" name="pro_sbu" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="number" class="form-label">Contact Number</label>
                          <input type="text" class="form-control" maxlength="10" onkeypress="return isNumber(event)"  id="number" name="number" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="emp_emailid" class="form-label">Email ID</label>
                          <input type="email" class="form-control" id="emp_emailid" name="emp_emailid" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div> 
                        <div class="col-md-4 position-relative">
                          <label for="join_date" class="form-label">Date of Joining (DD-MM-YY) </label>
                          <input type="date" class="form-control" id="join_date" name="join_date" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div> 
                         <div class="col-md-3 position-relative">
                          <label for="gender" class="form-label">Gender</label>
                          <select class="form-select" name="gender" id="gender" required>
                            <option selected disabled>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                          </select>
                          <!-- <div class="invalid-tooltip">
                            Please select a valid state.
                          </div> -->
                        </div>
                         <div class="col-md-4 position-relative">
                          <label for="emp_dob" class="form-label">Date of Birth (DD-MM-YY) </label>
                          <input type="date" class="form-control" id="emp_dob" name="emp_dob" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>  
                         <div class="col-md-4 position-relative">
                          <label for="emp_alt_num" class="form-label">Alt Cont No</label>
                          <input type="text" class="form-control" onkeypress="return isNumber(event)" maxlength="10" id="emp_alt_num" name="emp_alt_num" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>  
                         <div class="col-md-4 position-relative">
                          <label for="relation" class="form-label">Relation</label>
                          <input type="text" class="form-control" id="relation" name="relation" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>  
                        <div class="col-md-4 position-relative">
                          <label for="p_address" class="form-label">Permanent address</label>
                          <textarea  type="text" class="form-control" id="p_address" name="p_address" required></textarea>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="l_address" class="form-label">Local address</label>
                          <textarea type="text" class="form-control" id="l_address" name="l_address" required></textarea>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="qualification" class="form-label">Qualification</label>
                          <input type="text" class="form-control" id="qualification" name="qualification" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="experience" class="form-label">Experience Status</label>
                          <input type="text" class="form-control" id="experience" name="experience" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="supervisor_name" class="form-label">Supervisor</label>
                            <select class="form-select" name="supervisor_name" id="supervisor_name"required>
                            <option selected disabled></option>
                            </select>
                            <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                       
                        <div class="col-md-3 position-relative">
                          <label for="trainee_sta" class="form-label">Trainee Working Status</label>
                          <select class="form-select" name="trainee_sta" id="trainee_sta" required>
                            <option selected disabled></option>
                            <option value="Work From Home">Work From Home</option>
                            <option value="Work From Site">Work From Site</option>
                          </select>
                          <!-- <div class="invalid-tooltip">
                            Please select a valid state.
                          </div> -->
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="c_devices" class="form-label">Connecting Devices</label>
                          <input type="text" class="form-control" id="c_devices" name="c_devices" required>
                          <!-- <div class="valid-tooltip">
                            Looks good!
                          </div> -->
                        </div>
                        <div class="col-12">
                          <center>
                            <button class="btn btn-success px-5 rounded-0" type="submit" id="btnSubmit">Update</button>
                            <button class="btn btn-danger px-5 rounded-0" onclick="window.location.href='<?php echo base_url();?>EmpController/emp_form_table'" type="button">Cancel</button>
                          </center>
                        </div>
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
    
    <!-- login function js -->
    <script src="<?php echo asset_url();?>pro_js/emp_edit_form.js"></script>

    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>

    <!-- validation -->
    <script src="<?php echo asset_url();?>js/jquery.validate.js"></script>


    <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>";</script>

    <script type="text/javascript">

      /*validate*/
      $("#userFormEdit").validate();
      /*only number*/
      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
          }
          return true;
      }
      /*only letters*/
      $(document).ready(function(){
          $("#name_trainee").keydown(function(event){
              var inputValue = event.which;
              if(!(inputValue >= 65 && inputValue <= 123) &&/*letters,white space,tab*/
               (inputValue != 32 && inputValue != 0) && 
               (inputValue != 48 && inputValue != 8)/*backspace*/
               && (inputValue != 9)/*tab*/) { 
                  event.preventDefault(); 
              }
          });
      });
    </script>

  </body>
</html>