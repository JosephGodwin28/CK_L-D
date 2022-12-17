$(document).ready(function () {
    get_batch_no();
    datatable_onload();
    $("#level").prop('disabled', true);
    $("#attempt").prop('disabled', true);
});
function datatable_onload()
{
     $('#performance_table').DataTable({});
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

$('#attempt').on('change',function(){
    batchno();
})
$('#level').on('change',function(){
    batchno();
})
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
// $(document).on("change","#level",function(){
//     let value = $("#level").val();
//     if(value==="Final")
//     {
//         $("#status").removeClass("d-none");
//     }else{
//         $("#status").addClass("d-none");
//     }
// })
function batchno(){
    
    $('#level').prop('disabled',false);
    $('#attempt').prop('disabled',false);
    
    var batch_no =$("#batch_no").val();
    var level =$("#level").val();
    var attempt =$("#attempt").val();
    var example = $('#performance_table').DataTable({
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
            'url': BASE_URL + 'EmpController/get_perform_employee',
            "data": {
            "batch_no": batch_no,"level": level,"attempt": attempt,
        },
        "dataType": "json",
        },
        // createdRow: function (row, data, dataIndex) {
        //     $( row ).find('td:eq(0)').attr('data-label', 'Sno ');
        //     $( row ).find('td:eq(1)').attr('data-label', 'Batch Code');
        //     $( row ).find('td:eq(2)').attr('data-label', 'Trainee Code');
        //     $( row ).find('td:eq(3)').attr('data-label', 'Trainee Name');
        //     $( row ).find('td:eq(4)').attr('data-label', 'Location');
        //     $( row ).find('td:eq(5)').attr('data-label', 'Progress Trend');
        //     $( row ).find('td:eq(6)').attr('data-label', 'Join Date');
        //     $( row ).find('td:eq(7)').attr('data-label', 'Current Date');
        //     $( row ).find('td:eq(8)').attr('data-label', 'Designation');
        //     $( row ).find('td:eq(9)').attr('data-label', 'Process & SBU');
        //     $( row ).find('td:eq(10)').attr('data-label', 'Employee Code');
        //     $( row ).find('td:eq(11)').attr('data-label', 'Rag');
        //     $( row ).find('td:eq(12)').attr('data-label', 'Remarks');

        // },

        "columns": [
            { "data": "check_box_field" },
            {
                title: 'S.No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "trainee_code" },
            { "data": "name_trainee" },
            { "data": "mark" },
            { "data": "totalmark" },
            { "data": "percentage" },
            { "data": "status" },
           ],
        "order": [
            [1, 'asc']
        ]
       
    });
    if(level=="Final")
    {
        example.column( 7 ).visible( true );
    }else{
        example.column( 7 ).visible( false );
    }
}
    $('#performance_table').on('change', 'input[type="checkbox"]', function () {
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){ //if this item is unchecked
        // alert("no")
            $("#select_all").prop('checked', false); //change "select all" checked status to false
            $(this).closest("tr").find('select').attr("required", false);

        }else{
            // alert('ok')
        $(this).closest("tr").find('select').attr("required", true);

        }

        //check "select all" if all checkbox items are checked
        if ($('input[name="assign_chbox[]"]:checked').length == $('input[name="assign_chbox[]"]').length ){
            $("#select_all").prop('checked', true); //change "select all" checked status to true
        }
        //Check the required fields.
        $("#performance_table tbody>tr").each(function() { //get all rows in table
            var currow=$(this).closest('tr');
            if($(this).find("td:eq(0) [type='checkbox']").prop('checked'))
            {
                $(this).find("td:eq(4) [id='mark']").prop('required',true);
                $(this).find("td:eq(4) [id='mark']").prop('disabled',false);
                $(this).find("td:eq(5) [id='totalmark']").prop('required',true);
                $(this).find("td:eq(5) [id='totalmark']").prop('disabled',false);
                $(this).find("td:eq(7) [id='status']").prop('required',true);
                $(this).find("td:eq(7) [id='status']").prop('disabled',false);
            }else{
                $(this).find("td:eq(4) [id='mark']").prop('disabled',true);
                $(this).find("td:eq(5) [id='totalmark']").prop('disabled',true);
                $(this).find("td:eq(7) [id='status']").prop('disabled',true);
            }   
        });
    }); 
    // end select all

    $('#addperformance').submit(function(e) {
        var formData = new FormData(this);
        e.preventDefault();

        var check_box_len = $('input[name="assign_chbox[]"]:checked').length;
        if(check_box_len !=0){
            $('.confirm-modal').modal('show');
            $("#confirmSubmit").one('click', function() {
                // e.stopPropagation();
                $('.confirm-modal').modal('hide');
                $.ajax({  
                    url:BASE_URL + 'EmpController/add_emp_performance', 
                    method:"POST",  
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    dataType:"json",
                    
                    success:function(data) {
                        // alert(data.response)
                        if(data.response =='success'){
                            $("#assign_chbox").prop('checked', false); //change "select all" checked status to false
                            $("#batch_no").val('');
                            $("#level").val('');
                            $("#attempt").val('');
                            trainee_assigned();
                            setTimeout(
                                function() {
                                    location.reload();

                                }, 2000);
                        }
                        else{
                            trainee_assigned_faild();
                            setTimeout(
                                function() {
                                    location.reload();
                                }, 2000);
                        }
                    }  
                }); 
            });
                $("#confirmClose").on('click', function() {
                location.reload();

            });
            }
            else{
            // notify('Select checkbox to proceed further..!','top', 'center', 'fa fa-tick', 'warning', 'animated bounceIn', 'animated bounceOut');
            checkbox_faild();

        }
    });
    