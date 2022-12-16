

$('#signupForm').submit(function(e) {

    $("#btnSignup").attr("disabled", true);
    $("#btnSignup").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
    
    var formData = new FormData(this);
    e.preventDefault();

       $.ajax({  
            url:BASE_URL + 'LoginController/doSignup', 
            method:"POST",  
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",

            success:function(data) {
                // alert(data.logstatus)
                if(data.logstatus =='success'){
                

                    signup_success();

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
    
    
});

