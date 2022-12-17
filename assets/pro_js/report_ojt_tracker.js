$(document).ready(function () {
    list_ojt();
});
 function list_ojt() {
    var batch_code= $("#batch_code").val();
    var day= $("#day").val();
    var trainee_code=$("#trainee_code").val();

    var example = $('#child-table').DataTable({
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        'lengthChange': true,
        'dom': 'LBfrtip',
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
        search: {
                return: true,
        },
        'ajax': {
            'url': BASE_URL + 'OjtController/get_report_ojt_list',
            'data' : {"batch_code" : batch_code, "day" :day, "trainee_code":trainee_code},
        },
        "columns": [
            
            { "data": "id"  ,"searchable": false},
            { "data": "batch_code" ,"searchable": true},
            { "data": "location" },
            { "data": "name_trainee" },
            { "data": "designation" },
            { "data": "join_date" },
            { "data": "trainer" },
            { "data": "day" },
            { "data": "training_covered" },
            { "data": "total_no_outlet_visit" },
            { "data": "target_achieved" }

        ],  
    });    
}

function get_ojt_day_list(str){
    $.ajax({
        type: "POST",
        url: BASE_URL + 'OjtController/get_report_ojt_day_list/'+str,
        data: {},
        dataType: "json",
        success: function (data) {
                document.getElementById("day1").disabled = true; 
                document.getElementById("day2").disabled = true; 
                document.getElementById("day3").disabled = true; 
            if (data.length != 0) {
                for (let index = 0; index < 3; index++) {
                         $("#day"+ data[index]).removeAttr('disabled');
                }
            }
        }
    });
}
function get_ojt_trainee_list(str){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'OjtController/get_ojt_trainee_list/'+str,
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








// end select all



