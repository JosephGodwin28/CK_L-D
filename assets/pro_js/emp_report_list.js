$(document).ready(function () {
    var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
    var segment_array = segment_str.split('/');
    var last_segment = segment_array.pop();
    var current_rowid = last_segment;
    // alert(current_rowid)
    $('#batch_code').val(current_rowid);
    emp_report_list(current_rowid);
    check_repot_exists(current_rowid);
    next_date_report(current_rowid);
    //check_repot_date(current_rowid);
    
});



// for export all data
function newexportaction(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one('preXhr', function (e, s, data) {
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function (e, settings) {
            if (button[0].className.indexOf('buttons-copy') >= 0) {
                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-print') >= 0) {
                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
            }
            dt.one('preXhr', function (e, s, data) {
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });
            setTimeout(dt.ajax.reload, 0);
            return false;
        });
    });
    dt.ajax.reload();

}


function emp_report_list(current_rowid) {
     // alert(current_rowid)
    var example = $('#child-table-list').DataTable({
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        'lengthChange': true,
        "buttons": [
            {
                "extend": 'copy',
                "text": '<i class="fa fa-clipboard" ></i>  Copy',
                "titleAttr": 'Copy',
                "exportOptions": {
                    'columns': ':visible'
                },
                "action": newexportaction
            },
            {
                "extend": 'excel',
                "text": '<i class="fa fa-file-excel-o" ></i>  Excel',
                "titleAttr": 'Excel',
                "exportOptions": {
                    'columns': ':visible'
                },
                "action": newexportaction
            },
            {
                "extend": 'csv',
                "text": '<i class="fa fa-file-text" ></i>  CSV',
                "titleAttr": 'CSV',
                "exportOptions": {
                    'columns': ':visible'
                },
                "action": newexportaction
            },
            {
                "extend": 'pdf',
                "text": '<i class="fa fa-file-pdf-o" ></i>  PDF',
                "titleAttr": 'PDF',
                "exportOptions": {
                    'columns': ':visible'
                },
                "action": newexportaction
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print" ></i>  Print',
                "titleAttr": 'Print',
                "exportOptions": {
                    'columns': ':visible'
                },
                "action": newexportaction
            },
            {
                "extend": 'colvis',
                "text": '<i class="fa fa-eye" ></i>  Colvis',
                "titleAttr": 'Colvis',
                // "action": newexportaction
            },

        ],
        'dom': 'LBfrtip',
        "searching": false,
        "paging":   false,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
        "type": "POST",
        'ajax': {
            'url': BASE_URL + 'EmpController/get_trainee_report_list',
            "data": {
            "current_rowid": current_rowid,
        },
        "dataType": "json",
        },
        createdRow: function (row, data, dataIndex) {
            $( row ).find('td:eq(0)').attr('data-label', 'Key ID ');
            $( row ).find('td:eq(1)').attr('data-label', 'Trainee Name');
            $( row ).find('td:eq(2)').attr('data-label', 'Batch Code');
            $( row ).find('td:eq(3)').attr('data-label', 'Trainee Code');
            $( row ).find('td:eq(4)').attr('data-label', 'Attendance');
            $( row ).find('td:eq(5)').attr('data-label', 'Progress Trend');
            $( row ).find('td:eq(6)').attr('data-label', 'punctuality');
            $( row ).find('td:eq(7)').attr('data-label', 'Completion of Assignment');
            $( row ).find('td:eq(8)').attr('data-label', 'Participation in activities');
            $( row ).find('td:eq(9)').attr('data-label', 'Understanding of content');
            $( row ).find('td:eq(10)').attr('data-label', 'Communication');
            $( row ).find('td:eq(11)').attr('data-label', 'Confidence');
            $( row ).find('td:eq(12)').attr('data-label', 'Asking Questions');
            $( row ).find('td:eq(13)').attr('data-label', 'Average Score');
            // $( row ).find('td:eq(6)').attr('data-label', 'Last three days average');
            $( row ).find('td:eq(14)').attr('data-label', 'Remarks');

        },
        "columns": [
            // { "data": "check_box_field" },
            {
                title: 'S.No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "name_trainee" },
            { "data": "batch_code" },
            { "data": "trainee_code" },
            { "data": "attendance" },
            { "data": "progress_trend" },
            { "data": "punctuality" },
            { "data": "completion_assignment" },
            { "data": "participation_act" },
            { "data": "understanding_content" },
            { "data": "communication" },
            { "data": "confidence" },
            { "data": "asking_questions" },
            { "data": "average_score" },
            // { "data": "Last_three_days_ave" },
            { "data": "remarks" },
          

        ],
        "order": [
            [1, 'asc']
        ]
    });
}


function next_date_report(current_rowid) {
    // var formData = new FormData(this);
     // alert(current_rowid)
    $.ajax({
        type:"POST",  
        url:BASE_URL + 'EmpController/get_next_date_result', 
        data: {
            "current_rowid": current_rowid,
        },
        dataType:"json",
        success: function (data) {
             var assignedDate = data[0].assignedDate;
             var batch_code = data[0].batch_code;
             var createdBy_emp = data[0].createdBy_emp;
             var emp_code = data[0].emp_code;
             $('#assignedDate').val(assignedDate);
             $('#batch_code').val(batch_code);
             $('#createdBy_emp').val(createdBy_emp);
             $('#emp_code').val(emp_code);
            // console.log(data[0].assignedDate)
        }
    });
}

/*COUNT SHOW */
function check_repot_exists(current_rowid) {

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/check_repot_exists_list',
        data: {
            "current_rowid": current_rowid,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data)
             var u = data[0].allcount; 
                $('#daycount').val(u);//daycount
                $('#SubmitBtn').attr("disabled", true);
            var a =$("#next_date").val();
            if (a !="") {
                $('#SubmitBtn').attr("disabled", false);
            }
            else{
                 $('#SubmitBtn').attr("disabled", true);
            }

               
            /*else {
                $( "#next_date" ).change(function() {
                    var a =$("#next_date").val();
                    $('#SubmitBtn').attr("disabled", false);
                });
                $('#SubmitBtn').attr("disabled", true);
            } */       
        }
    });
}

/*button disabled*/ 
/*function check_repot_date(current_rowid) {

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/check_date_value',
        data: {
            "current_rowid": current_rowid,
        },
        dataType: "json",
        success: function (data) {
            //console.log(data)
             var u = data[0].allcount; 
            
            if (u >=1) {
                 $('#SubmitBtn').attr("disabled", true);
            }
            else{
                $('#SubmitBtn').attr("disabled", false);
            }
       
        }
    });
}*/


$('#reportAdd').submit(function(e) {
    var formData = new FormData(this);
    // console.log(formData);exit();
    $.ajax({  
        url:BASE_URL + 'EmpController/addReportForm', 
        method:"POST",  
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
    
        success:function(data) {

            if(data.response =='success'){
                
                $('.SubmitBtn').attr("disabled", false);
                $('#reset-btn').click();
                updated_toast();

                setTimeout(
                    function() {
                        window.location = BASE_URL + data.url;
                }, 1000);
                
            }
            else{
                trainee_failed_update();
                $('.SubmitBtn').attr("disabled", false);
                
            }
                    
        }  
    }); 

});