$(document).ready(function () {

   
});

function get_attrition_trainee_list(str){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'FeedbackController/get_feedback_trainee_list/'+str,
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {
                console.log(data.length);
                var html ='<option value="">Select</option>';
                for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i]['trainee_code'] + '">' + data[i]['trainee_name'] + '</option>';
                }
                $('#emp_code').html(html);
            }
        }
    });
}



$('#formfeedback').submit(function(e) {
    //$("#submit").attr("disabled", true);
    var formData = new FormData(this);
         //console.log(formData);
    e.preventDefault();
       $.ajax({  
            url:BASE_URL + 'FeedbackController/form_store_feedback', 
            method:"POST",  
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",

            success:function(data) {
                if(data.logstatus =='success'){
                
                    feedback_add_success();

                    setTimeout(
                        function() {
                            window.location = BASE_URL + data.url;

                        }, 2000);

                }else{
                    //$("#submit").attr("disabled", false);
                    //attrition_add_failed();
                   
                }

                
            }  
        }); 
    
});






// end select all



