$(document).ready(function () {

    list_attrition_onload();
   
   $("#submit").hide();
});

function get_attrition_trainee_list(str){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'AttritionController/get_attrition_trainee_list/'+str,
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {
                console.log(data);
                var html ='<option value="">Select</option>';

                for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i] + '">' + data[i] + '</option>';
                }

                $('#trainee_code').html(html);
            }
        }
    });
}

function list_attrition_onload() {
    var example = $('#child-table').DataTable({
    });
}
function list_attrition() {
     var batch_code= $("#batch_code").val();
    var trainee_code=$("#trainee_code").val();
    $('#child-table').DataTable().destroy();
    $("#submit").show();
    var example = $('#child-table').DataTable({
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        'lengthChange': true,
        'dom': 'LBfrtip',
        "bFilter": false,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
       'ajax': {
            'url': BASE_URL + 'AttritionController/get_attrition_list',
            'data' : {"batch_code" : batch_code, "trainee_code":trainee_code},
        },

       
        "columns": [
            
            { data: "id" },
            { data: "batch_code" },
            { data: "location" },
            { data: "name_trainee" },
            { data: "designation" },
            { data: "join_date" },
            { data: "trainer" },     
            { data: "training_stage" },
            { data: "attrition_date" },
            { data: "attrition_mode" },
            { data: "attrition_category" },
            { data: "detailed_reason" }

        ],
        "order": [
            [1, 'asc']
        ]
    });
}

$('#formattrition').submit(function(e) {
    //$("#submit").attr("disabled", true);
    var formData = new FormData(this);
         //console.log(formData);
    e.preventDefault();
       $.ajax({  
            url:BASE_URL + 'AttritionController/form_store_attrition_tracker', 
            method:"POST",  
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",

            success:function(data) {
                if(data.logstatus =='success'){
                
                    attrition_add_success();

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



