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

    <title>Creat Feedback</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       
<!--sidebar-wrapper-->
        <?php include('application/views/layouts/sidebar.php'); ?>

        <!--end sidebar-wrapper-->
        <!--header-->
        <?php include('application/views/layouts/topbar.php'); ?>

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">
            <div class="row">
              <div class="col-xl-12 mx-auto">
                <h6 class="mb-0 text-uppercase">ADD TRAINER FEEDBACK</h6>
                <hr/>
                <div class="card">
                  <div class="card-body">
                    <div class="p-4 border rounded">
                      <form class="row g-3 needs-validation" id="formfeedback" action="javascript:void(0)" method="POST"  autocomplete="off" novalidate>
                        
                          <input type="hidden" class="form-control" id="created_by" name="created_by" value=<?php echo $this->session->userdata('username'); ?>>
                        <div class="col-md-4 position-relative">
                          <label for="trainee_code" class="form-label">Batch code</label>
                           <select class="form-select form-select2 valid_frm" id="batch_code" name="batch_code" onchange="get_attrition_trainee_list(this.value)"  required>
                                    <option selected disabled></option>
                                    <?php
                                        foreach ($select_batchcode as $key => $value) {
                                            echo '<option value="'.$value.'" >'.$value.'</option>'; 
                                        }
                                    ?>
                                  </select>
                        </div>
                         <div class="col-md-4 position-relative">
                          <label for="Employee code" class="form-label">Employee code</label>
                            <select class="form-select"  id="emp_code" name="emp_code" required>
                            </select>
                        </div>
                         <div class="col-md-4 position-relative">
                          <label for="objectives" class="form-label">Objectives of training</label>
                          <input type="text" class="form-control" id="objectives" name="objectives" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="topics_covered" class="form-label">Topics covered</label>
                          <input type="text" class="form-control" id="topics_covered" name="topics_covered" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="opportunity" class="form-label">Opportunity for sufficient interaction</label>
                          <input type="text" class="form-control" id="opportunity" name="opportunity" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="training_rating" class="form-label">Training would be useful at my workplace</label>
                          <input type="text" class="form-control" id="training_rating" name="training_rating" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="time_trianing" class="form-label">Time provided for the training was sufficient</label>
                          <input type="text" class="form-control" id="time_trianing" name="time_trianing" required>
                        </div>  
                        <div class="col-md-4 position-relative">
                          <label for="training_material" class="form-label">Hand outs training material provided</label>
                           <input type="text" class="form-control" id="training_material" name="training_material" required>
                        </div>



                        <div class="col-md-4 position-relative">
                          <label for="knowledge_topic" class="form-label">The-facilitator-was-knowledgeable-about-the-topic</label>
                          <input type="text" class="form-control" id="knowledge_topic" name="knowledge_topic" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="participation" class="form-label">The-facilitator-encouraged-participation</label>
                          <input type="text" class="form-control" id="participation" name="participation" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="answered_questions" class="form-label">The-facilitator-answered-my-questions</label>
                           <input type="text" class="form-control" id="answered_questions" name="answered_questions" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="training_methods" class="form-label">The-facilitator-used-different-training-methods</label>
                          <input type="text" class="form-control" id="training_methods" name="training_methods" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="effective_training_program" class="form-label">The-facilitators-delivery-of-the-training-program-has-been-effective</label>
                          <input type="text" class="form-control" id="effective_training_program" name="effective_training_program" required>
                          
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="hands_experience" class="form-label">Given-enough-opportunity-for-hands-on-experience</label>
                            
                            <input type="text" class="form-control" id="hands_experience" name="hands_experience" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="call_recordings" class="form-label">Call-recordings-were-useful-to-understand-the-product--process</label>
                          <input type="text" class="form-control" id="call_recordings" name="call_recordings" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="overall_training" class="form-label">Overall-the-training-met-the-objectives</label>
                          <input type="text" class="form-control" id="overall_training" name="overall_training" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="key_learning" class="form-label">Key-learning-from-the-training-program-which-you-are-likely-to-practice--implement-them</label>
                          <input type="text" class="form-control" id="key_learning" name="key_learning" required>
                        </div>
                        <div class="col-md-4 position-relative">
                          <label for="new_learning" class="form-label">New-learning</label>
                          <input type="text" class="form-control" id="new_learning" name="new_learning" required>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="feedback" class="form-label">Any-other-feedback-on-facilitator</label>
                            <input type="text" class="form-control" id="feedback" name="feedback" required>
                        </div>
                         <div class="col-md-4 position-relative">
                          <label for="improve_program" class="form-label">How-to-improve-the-program</label>
                          <input type="text" class="form-control" id="improve_program" name="improve_program" required>
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
    <script src="<?php echo asset_url();?>pro_js/create_feedback.js"></script>

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