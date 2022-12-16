$(document).ready(function () {

   check_dsh_trainee_count();
   check_dsh_trainer_count();  
});


/*Trainee count dsh */
function check_dsh_trainee_count() {

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/check_trainee_count',
        dataType: "json",
        success: function (data) {
            // console.log(data)
               $('#trainee_count').text(data);
            }
        });
    }

/*Trainer count dsh */
function check_dsh_trainer_count() {

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/check_trainer_count',
        dataType: "json",
        success: function (data) {
            // console.log(data)
               $('#trainer_count').text(data);
            }
        });
    }