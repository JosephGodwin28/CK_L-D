$(document).ready(function () {
    list_attendance();
    list_attendance_onload();
});

function list_attendance_onload() {
 var example = $('#displayTable').DataTable();
}

 
   function list_attendance() {
          var batch_code= $("#batch_code").val();
          var trainee_code=$("#trainee_code").val();
              $.ajax({
                 type: "POST",
                  url: BASE_URL + 'AttendanceController/get_report_attendance_list',
                  data : {"batch_code" : batch_code, "trainee_code":trainee_code},
                  dataType: "json",
                  success: function(json) {
                    var tableHeaders;
                    $.each(json.columns, function(i, val){
                        if(!tableHeaders){
                             tableHeaders = "<th>" + val + "</th>";
                        }else{
                            tableHeaders+= "<th>" + val + "</th>";
                        }
                    });
                     
                    $("#tableDiv").empty();
                    $("#tableDiv").append('<table id="displayTable"  class="table table-striped table-bordered display" cellspacing="0" width="100%"><thead><tr>' + tableHeaders + '</tr></thead></table>');
                    //$("#tableDiv").find("table thead tr").append(tableHeaders);  
                      
                    $('#displayTable').dataTable(json);

                }
              });
           
      }



function get_attendance_trainee_list(str){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'AttendanceController/get_attendance_trainee_list/'+str,
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



