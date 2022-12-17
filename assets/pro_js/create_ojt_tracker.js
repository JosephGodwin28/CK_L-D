$(document).ready(function () {

    list_ojt_onload();
   
   $("#submit").hide();
});

function get_ojt_day_list(str){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'OjtController/get_ojt_day_list/'+str,
        data: {},
        dataType: "json",
        success: function (data) {
            document.getElementById("day1").disabled = true; 
            document.getElementById("day2").disabled = true; 
            document.getElementById("day3").disabled = true;
            if (data.length != 0) { 
                for (let index = 0; index < 1; index++) {
                         $("#day"+ data[index]).removeAttr('disabled');
                }
            }
        }
    });
}

function list_ojt_onload() {
    var example = $('#child-table').DataTable({
    });
}
function list_ojt(str) {
    var batch_code= $("#batch_code").val();
    var day=$("#day").val();
    //alert(day);
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
            'url': BASE_URL + 'OjtController/get_ojt_list/'+str,
            'data' : {"batch_code" : batch_code, "day":day},
        },

        "columns": [
            
            { "data": "id" },
            { "data": "batch_code" },
            { "data": "location" },
            { "data": "name_trainee" },
            { "data": "designation" },
            { "data": "join_date" },
            { "data": "trainer" },
            { "data": "training_covered" },
            { "data": "total_no_outlet_visit" },
            { "data": "target_achieved" }

        ],
        "order": [
            [1, 'asc']
        ]

    });
       
}

$('#formojt').submit(function(e) {
    //$("#submit").attr("disabled", true);
    var batch_code= $("#batch_code").val();
    var day=$("#day").val();
    var formData = new FormData(this);
    e.preventDefault();
       $.ajax({  
            url:BASE_URL + 'OjtController/form_store_ojt_tracker/'+day, 
            method:"POST",  
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",
            success:function(data) {
                if(data.logstatus =='success'){
                    ojt_add_success();
                    setTimeout(
                        function() {
                            window.location = BASE_URL + data.url;

                        }, 2000);

                }else{
                    $("#submit").attr("disabled", false);
                    //ojt_add_failed();                   
                }
                
            }  
        }); 
});





// end select all



