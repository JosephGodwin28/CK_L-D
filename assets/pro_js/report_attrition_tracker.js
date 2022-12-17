$(document).ready(function () {
    list_attrition();
});



 function list_attrition() {
    var batch_code= $("#batch_code").val();
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
            'url': BASE_URL + 'AttritionController/get_report_attrition_list',
            'data' : {"batch_code" : batch_code, "trainee_code":trainee_code},
        },
        /*"training_stage" =>$record->table_attrition_training_stage,
                "attrition_date" => $record->table_attrition_attrition_date,
                "attrition_mode" => $record->table_attrition_attrition_mode,
                "attrition_category"=>  $record->table_attrition_attrition_category,
                "detailed_reason"=> $record->table_attrition_detailed_reason    */
        "columns": [
            
            { "data": "id"  ,"searchable": false},
            { "data": "batch_code" ,"searchable": true},
            { "data": "location" },
            { "data": "name_trainee" },
            { "data": "designation" },
            { "data": "join_date" },
            { "data": "trainer" },
            { "data": "training_stage" },
            { "data": "attrition_date" },
            { "data": "attrition_mode" },
            { "data": "attrition_category" },
            { "data": "detailed_reason" }

        ],  
    });    
}



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






// end select all



