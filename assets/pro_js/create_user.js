$(document).ready(function () {
    get_supervisor_name_list();
});

function get_supervisor_name_list(){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'AdminController/get_supervisor_name_list',
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {

                var html ='<option value="">Select</option>';

                for (let index = 0; index < data.length; index++) {
                        html += '<option value="' + data[index].id + '">' + data[index].supervisor_name + '</option>';
                }

                $('#supervisor_name').html(html);
            }
        }
    });
}
   

$('#userFormCreat').submit(function(e) {
    

    $("#btnSignup").attr("disabled", true);
    $("#btnSignup").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
    
    var formData = new FormData(this);
        // console.log(formData);

     // $('select#supervisor_name').change(function() {
        /*var supervisor_name = $('#supervisor_name').find('option:selected').text();
         formData.append('batch_code',supervisor_name);*/



    e.preventDefault();

       $.ajax({  
            url:BASE_URL + 'AdminController/userCreate', 
            method:"POST",  
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",

            success:function(data) {
                // alert(data.logstatus)
                if(data.logstatus =='success'){
                
                    trainee_success();

                    setTimeout(
                        function() {
                            window.location = BASE_URL + data.url;

                        }, 2000);

                }else{
                    $("#btnSignup").attr("disabled", false);
                    $("#btnSignup").text('Log In');

                    signup_failed();
                   
                }
                
            }  
        }); 
     // });
    
});

