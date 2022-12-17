$(document).ready(function () {
    get_batch_no();
    datatable_onload();
    performance_report();
    $('#assignSubmit').addClass('d-none');

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

function batchno(){
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
                performance_report();
            }
        }
    });
  }
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
    performance_report();
    $('#assignSubmit').removeClass('d-none');
    // $('#SubmitBtn').show();
});
function performance_report() {
    var trainee_code=$('#trainee_code').val();
    var batch_no =$("#batch_no").val();
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
        // "paging":   false,
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
        "type": "POST",
        'ajax': {
            'url': BASE_URL + 'EmpController/get_performance_report_list',
            "data": {
            "trainee_code": trainee_code,
            "batch_no": batch_no,
        },
        "dataType": "json",
        },
        // createdRow: function (row, data, dataIndex) {
        //     $( row ).find('td:eq(0)').attr('data-label', 'Sno ');
        //     $( row ).find('td:eq(1)').attr('data-label', 'Batch Code');
        //     $( row ).find('td:eq(2)').attr('data-label', 'Trainee Code');
        //     $( row ).find('td:eq(3)').attr('data-label', 'L1 Attempt 1');
        //     $( row ).find('td:eq(4)').attr('data-label', 'L1 Percentage 1');
        //     $( row ).find('td:eq(5)').attr('data-label', 'L1 Attempt 2');
        //     $( row ).find('td:eq(6)').attr('data-label', 'L1 Percentage 2');
        //     $( row ).find('td:eq(7)').attr('data-label', 'Final Percentage');
        //     $( row ).find('td:eq(8)').attr('data-label', 'L2 Attempt 1');
        //     $( row ).find('td:eq(9)').attr('data-label', 'L2 Percentage 1');
        //     $( row ).find('td:eq(10)').attr('data-label', 'L2 Attempt 2');
        //     $( row ).find('td:eq(11)').attr('data-label', 'L2 Percentage 2');
        //     $( row ).find('td:eq(12)').attr('data-label', 'Final Percentage');
        //     $( row ).find('td:eq(8)').attr('data-label', 'Final Attempt 1');
        //     $( row ).find('td:eq(9)').attr('data-label', 'Final Percentage 1');
        //     $( row ).find('td:eq(10)').attr('data-label', 'Final Attempt 2');
        //     $( row ).find('td:eq(11)').attr('data-label', 'Final Percentage 2');
        //     $( row ).find('td:eq(12)').attr('data-label', 'Final_Final Percentage');

        // },

        "columns": [
            {
                title: 'S.No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "batch_code"},
            { "data": "trainee_code"},
            { "data": "attempt1"},
            { "data": "percentage1",
                render:function(data,type,meta,row){
                    let color ='green';
                    if(data< 80)
                    {
                        color='red';
                    }
                    return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "attempt2"},
            { "data": "percentage2",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "attempt3"},
            { "data": "percentage3",
                render:function(data,type,meta,row){
                    let color ='green';
                    if(data< 80)
                    {
                        color='red';
                    }
                    return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "attempt4"},
            { "data": "percentage4",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"L1finalpercentage"},
            { "data": "L2_attempt1" },
            { "data": "L2_percentage1",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L2_attempt2" },
            { "data": "L2_percentage2",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L2_attempt3"},
            { "data": "L2_percentage3",
                render:function(data,type,meta,row){
                    let color ='green';
                    if(data< 80)
                    {
                        color='red';
                    }
                    return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L2_attempt4"},
            { "data": "L2_percentage4",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"L2finalpercentage"},
            { "data": "L3_attempt1" },
            { "data": "L3_percentage1",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L3_attempt2" },
            { "data": "L3_percentage2",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L3_attempt3"},
            { "data": "L3_percentage3",
                render:function(data,type,meta,row){
                    let color ='green';
                    if(data< 80)
                    {
                        color='red';
                    }
                    return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L3_attempt4"},
            { "data": "L3_percentage4",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"L3finalpercentage"},
            { "data": "L4_attempt1" },
            { "data": "L4_percentage1",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L4_attempt2" },
            { "data": "L4_percentage2",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L4_attempt3"},
            { "data": "L4_percentage3",
                render:function(data,type,meta,row){
                    let color ='green';
                    if(data< 80)
                    {
                        color='red';
                    }
                    return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            { "data": "L4_attempt4"},
            { "data": "L4_percentage4",
                render:function(data,type,meta,row){
                let color ='green';
                if(data< 80)
                {
                    color='red';
                }
                return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"L4finalpercentage"},
            // { "data": "L5_attempt1" },
            // { "data": "L5_percentage1",
            //     render:function(data,type,meta,row){
            //     let color ='green';
            //     if(data< 80)
            //     {
            //         color='red';
            //     }
            //     return '<span style="color:' + color + '">' + data + '</span>';
            // }  },
            // { "data": "L5_attempt2" },
            // { "data": "L5_percentage2",
            //     render:function(data,type,meta,row){
            //     let color ='green';
            //     if(data< 80)
            //     {
            //         color='red';
            //     }
            //     return '<span style="color:' + color + '">' + data + '</span>';
            // }  },
            // { "data": "L6_attempt1" },
            // { "data": "L6_percentage1",
            //     render:function(data,type,meta,row){
            //     let color ='green';
            //     if(data< 80)
            //     {
            //         color='red';
            //     }
            //     return '<span style="color:' + color + '">' + data + '</span>';
            // }  },
            // { "data": "L6_attempt2" },
            // { "data": "L6_percentage2",
            //     render:function(data,type,meta,row){
            //     let color ='green';
            //     if(data< 80)
            //     {
            //         color='red';
            //     }
            //     return '<span style="color:' + color + '">' + data + '</span>';
            // }  },
            {"data":"Final_attempt1"},
            {"data":"Final_percentage1",
            render:function(data,type,meta,row){
            let color ='green';
            if(data< 80)
            {
                color='red';
            }
            return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"Final_attempt2"},
            {"data":"Final_percentage2",
            render:function(data,type,meta,row){
            let color ='green';
            if(data< 80)
            {
                color='red';
            }
            return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"Final_attempt3"},
            {"data":"Final_percentage3",
            render:function(data,type,meta,row){
            let color ='green';
            if(data< 80)
            {
                color='red';
            }
            return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"Final_attempt4"},
            {"data":"Final_percentage4",
            render:function(data,type,meta,row){
            let color ='green';
            if(data< 80)
            {
                color='red';
            }
            return '<span style="color:' + color + '">' + data + '</span>';
            }  },
            {"data":"Final_Final_percentage"},
            {"data":"end_status"},
        ],
        "order": [
            [1, 'asc']
        ]
    });
}