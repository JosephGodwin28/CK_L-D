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

    <title>Creat Trainee</title>
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
                <h6 class="mb-0 text-uppercase">Add remark</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div class="p-4 border rounded">
                      <form class="row g-3 needs-validation" id="create_remark_form" action="javascript:void(0)" method="POST"  autocomplete="off" novalidate>
                        
                          <input type="hidden" class="form-control" id="created_by" name="created_by" value=<?php echo $this->session->userdata('username'); ?>>
                          <!-- <input type="hidden" class="form-control" id="location" name="location" value=<?php echo $this->session->userdata('username'); ?>> -->
                        <div class="col-md-4 offset-md-4">
                          <label for="batch_no" class="form-label">Batch No</label>
                          <select class="form-select" name="batch_no" id="batch_no" onchange="batchno();" class="form-control single-select" required>
                            <option value=""></option>
                          </select>
                         <!--  <div class="valid-tooltip">
                            Select Location
                          </div> -->
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <label for="trainee_code" class="form-label">Emp No</label>
                          <select class="form-select" name="trainee_code" id="trainee_code" class="form-control single-select" required>
                            <option value=""></option>
                          </select>
                         <!--  <div class="valid-tooltip">
                            Select Location
                          </div> -->
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <label for="rag" class="form-label">Rag</label>
                          <input type="text" class="form-control" id="rag" name="rag" required>
                         <!--  <div class="valid-tooltip">
                            Select Location
                          </div> -->
                        </div>
                        <div class="col-md-4 offset-md-4">
                          <label for="remark" class="form-label">Remark</label>
                          <input type="text" class="form-control" id="remark" name="remark" required>
                         <!--  <div class="valid-tooltip">
                            Select Location
                          </div> -->
                        </div>
                        
                        <div class="col-12">
                          <center>
                          <button class="btn btn-primary" type="submit" id="btnSubmit">Submit form</button>
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
    <script src="<?php echo asset_url();?>pro_js/remark.js"></script>

    <!--notification js -->
    <script src="<?php echo asset_url();?>plugins/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notifications.min.js"></script>
    <script src="<?php echo asset_url();?>plugins/notifications/js/notification-custom-script.js"></script>
    <!-- validation -->
    <script src="<?php echo asset_url();?>js/jquery.validate.js"></script>

    <script type="text/javascript"> var BASE_URL = "<?php echo base_url();?>";</script>

    <script type="text/javascript">

      $("#userFormCreat").validate();

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

      

      //Display Only Date till today // 
      var dtToday = new Date();
      var month = dtToday.getMonth() + 1;     
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('#emp_dob').attr('max', maxDate);
    
    
    
    </script>

  </body>
</html>