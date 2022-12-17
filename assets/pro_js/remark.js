$(document).ready(function () {
    $('#remarkbtn').addClass('d-none');
    get_batch_no();
    report_remark()
    datatable_onload();
});
function datatable_onload()
{
     $('#remark_table').DataTable({});
}
function get_batch_no(){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/get_batch_no',
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {

                var html ='<option value="">Select</option>';

                for (let index = 0; index < data.length; index++) {
                        html += '<option value="' + data[index].batch_code  + '">' + data[index].batch_code + '</option>';
                }
                $('#batch_no').html(html);
            }
        }
    });
}
function batchno(){
    // alert('hii');
    $('#trainee_code').val('');
    var selectBox =$("#batch_no").val();
    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/get_trainee_code',
        data: {batch_no:selectBox},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {

                var html ='<option value="">Select</option>';

                for (let index = 0; index < data.length; index++) {
                        html += '<option value="' + data[index].trainee_code  + '">' + data[index].name_trainee + '</option>';
                }

                $('#trainee_code').html(html);
            }
        }
    });
    report_remark();
  }
  
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

$('#trainee_code').change(function(){
    var trainee_code=$('#trainee_code').val();
    remark_list();
    report_remark();
    $('#remarkbtn').removeClass('d-none');
    // $('#SubmitBtn').show();
});
function remark_list() {
    var trainee_code=$('#trainee_code').val();
    var example = $('#remark_table').DataTable({
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
            'url': BASE_URL + 'EmpController/get_emp_remark_list',
            "data": {
            "trainee_code": trainee_code,
        },
        "dataType": "json",
        },
        createdRow: function (row, data, dataIndex) {
            $( row ).find('td:eq(0)').attr('data-label', 'Sno ');
            $( row ).find('td:eq(1)').attr('data-label', 'Batch Code');
            $( row ).find('td:eq(2)').attr('data-label', 'Trainee Code');
            $( row ).find('td:eq(3)').attr('data-label', 'Trainee Name');
            $( row ).find('td:eq(4)').attr('data-label', 'Location');
            $( row ).find('td:eq(5)').attr('data-label', 'Progress Trend');
            $( row ).find('td:eq(6)').attr('data-label', 'Join Date');
            $( row ).find('td:eq(7)').attr('data-label', 'Current Date');
            $( row ).find('td:eq(8)').attr('data-label', 'Designation');
            $( row ).find('td:eq(9)').attr('data-label', 'Process & SBU');
            $( row ).find('td:eq(10)').attr('data-label', 'Employee Code');
            $( row ).find('td:eq(11)').attr('data-label', 'Rag');
            $( row ).find('td:eq(12)').attr('data-label', 'Remarks');

        },
        "columns": [
            { "data": "id" },
            { "data": "batch_code" },
            { "data": "trainee_code" },
            { "data": "name_trainee" },
            { "data": "location" },
            { "data": "join_date" },
            { "data": "current_date" },
            { "data": "designation" },
            { "data": "pro_sbu" },
            { "data": "emp_code" },
            { "data": "rag" },
            { "data": "remarks" },
        ],
        "order": [
            [1, 'asc']
        ]
    });
}
$('#addRemark').submit(function(e) {
    var formData = new FormData(this);
    // console.log(formData);exit();
    $.ajax({  
        url:BASE_URL + 'EmpController/addRemark', 
        method:"POST",  
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
    
        success:function(data) {

            if(data.response =='success'){
                
                // $('.SubmitBtn').attr("disabled", false);
                // $('#reset-btn').click();
                updated_toast();

                setTimeout(
                    function() {
                        window.location = BASE_URL + data.url;
                }, 1000);
                
            }
            else{
                trainee_failed_update();
                // $('.SubmitBtn').attr("disabled", false);
                
            }
                    
        }  
    }); 

});
function report_remark() 
{
    var batch_no=$('#batch_no').val();
    var trainee_code=$('#trainee_code').val();
     // alert(current_rowid);
    var example = $('#report_remark_table').DataTable({
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
        "searching": true,
        "paging":   false,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
        "type": "POST",
        'ajax': {
            'url': BASE_URL + 'EmpController/get_report_remark_list',
            "data": {
            "trainee_code": trainee_code,"batch_no": batch_no
        },
        "dataType": "json",
        },
        createdRow: function (row, data, dataIndex) {
            $( row ).find('td:eq(0)').attr('data-label', 'Sno ');
            $( row ).find('td:eq(1)').attr('data-label', 'Batch Code');
            $( row ).find('td:eq(2)').attr('data-label', 'Trainee Code');
            $( row ).find('td:eq(3)').attr('data-label', 'Trainee Name');
            $( row ).find('td:eq(4)').attr('data-label', 'Location');
            $( row ).find('td:eq(5)').attr('data-label', 'Progress Trend');
            $( row ).find('td:eq(6)').attr('data-label', 'Join Date');
            $( row ).find('td:eq(7)').attr('data-label', 'Current Date');
            $( row ).find('td:eq(8)').attr('data-label', 'Designation');
            $( row ).find('td:eq(9)').attr('data-label', 'Process & SBU');
            $( row ).find('td:eq(10)').attr('data-label', 'Employee Code');
            $( row ).find('td:eq(11)').attr('data-label', 'Rag');
            $( row ).find('td:eq(12)').attr('data-label', 'Remarks');

        },
        "columns": [
            {
                title: 'S.No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "batch_code" },
            { "data": "trainee_code" },
            { "data": "name_trainee" },
            { "data": "location" },
            { "data": "join_date" },
            { "data": "current_date" },
            { "data": "designation" },
            { "data": "pro_sbu" },
            { "data": "emp_code" },
            { "data": "rag" },
            { "data": "remarks" },
            { "data": "action" }
        ],
        "order": [
            [1, 'asc']
        ]
    });
}
function edit_remark_pop(trainee_code,batch_code)
{
    $('#edit_trainee_code').val(trainee_code);
    $('#edit_batch_code').val(batch_code);
    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/fetch_remark_details',
        data: {
            "trainee_code": trainee_code,
        },
        dataType: "json",
        success: function (data) {
            // alert(data);
            var remark=data['Rag'];
            $('#default').prop('selected', remark == "Default");
            $('#amber').prop('selected', remark == "Amber");
            $('#green').prop('selected', remark == "Green");
            $('#red').prop('selected', remark == "Red");
            $('#edit_remark').val(data['Remark']);
        }
    })
    // $("#remark_modal").modal({backdrop: 'static', keyboard: false});
    $("#remark_modal").modal("show");
}

function get_action_pop(){
    $('#remark_modal').modal('hide');
}
$("#update_remark").click(function() {

   var formdatas = $('#update_remark_form').serialize();
//    alert(a);

    $.ajax({  
        url:BASE_URL + 'EmpController/update_remark', 
        method:"POST",  
        data:formdatas,
        dataType:"json",
        success:function(data) {
            // alert(data);
            if(data.response =='success'){
                updated_toast();
                setTimeout(
                    function() {
                        window.location = BASE_URL + data.url;
                }, 1000);
                
            }
            else{
                trainee_failed_update();                
            }
                    
        }  
    }); 

});
