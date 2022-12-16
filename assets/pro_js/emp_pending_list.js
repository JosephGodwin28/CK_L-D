$(document).ready(function () {

    emp_list_pending();
    
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


function emp_list_pending() {
    var example = $('#child-table').DataTable({
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
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "bDestroy": true,
        "autoWidth": false,
        // "searching": false,

        'ajax': {
            'url': BASE_URL + 'EmpController/get_trainee_pending_list',
            'data': function (data) {
                 // console.log(data)


            }
        },
        createdRow: function (row, data, dataIndex) {
            $( row ).find('td:eq(0)').attr('data-label', 'Key ID ');
            $( row ).find('td:eq(1)').attr('data-label', 'Trainee Name');
            $( row ).find('td:eq(2)').attr('data-label', 'Designation');
            $( row ).find('td:eq(3)').attr('data-label', 'Batch Code');
            $( row ).find('td:eq(4)').attr('data-label', 'Assigned Date');
            $( row ).find('td:eq(5)').attr('data-label', 'Number ');
            $( row ).find('td:eq(6)').attr('data-label', 'Gender');
            $( row ).find('td:eq(7)').attr('data-label', 'DoB');
            $( row ).find('td:eq(8)').attr('data-label', 'created_on');

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
            { "data": "designation" },
            { "data": "batch_code" },
            { "data": "assignedDate" },
            { "data": "number" },
            { "data": "gender" },
            { "data": "emp_dob" },
            { "data": "created_on" },
            { "data": "action" },
          

        ],
        "order": [
            [1, 'asc']
        ]
    });

    // Add event listener for opening and closing details
    $('#child-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = example.row( tr );
        var nester_tbl_id = row.data().auto_id;

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child(format(row.data())).show();
            // format_new(row.child,nester_tbl_id);
            tr.addClass('shown');
        }
    } );
}
function get_action_pop(){
    $('#adt_details_modal').modal('hide');
}

function get_trainee_pop(table_row_trainee_code){
    // alert(table_row_trainee_code);

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/get_row_trainee_list',
        data: {
            "table_row_trainee_code": table_row_trainee_code,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data[0].created_by)
            // if (data.length != 0) {
                var html = '';

                var assignedDate = moment(data[0].assignedDate).format('DD-MM-YYYY');

                for(let i = 0; i < data.length; i++)
                {

                html +='<tr>';
                // html +='<td data-label="Parameter">Trainee Name</td>';
                html +='<td data-label="Slab">Day - '+data[i].training_day+'</td>';
                html +='<td data-label="Slab">'+data[i].batch_code+'</td>';
                html +='<td data-label="Slab">'+data[i].trainee_code+'</td>';
                html +='<td data-label="Slab">'+assignedDate+'</td>';
                html +='<td data-label="Slab">'+data[i].name_trainee+'</td>';
                html +='<td data-label="Slab">'+data[i].progress_trend+'</td>';
                html +='<td data-label="Slab">'+data[i].attendance+'</td>';
                html +='<td data-label="Slab">'+data[i].average_score+'</td>';
                html +='<td data-label="Slab">'+data[i].punctuality+'</td>';
                html +='<td data-label="Slab">'+data[i].completion_assignment+'</td>';
                html +='<td data-label="Slab">'+data[i].participation_act+'</td>';
                html +='<td data-label="Slab">'+data[i].understanding_content+'</td>';
                html +='<td data-label="Slab">'+data[i].communication+'</td>';
                html +='<td data-label="Slab">'+data[i].confidence+'</td>';
                html +='<td data-label="Slab">'+data[i].asking_questions+'</td>';
                html +='<td data-label="Slab">'+data[i].remarks+'</td>';

                html +='</tr>';

                $('#adt_tb_body').html(html);
                $("#adt_details_modal").modal('show');
                // $('#adt_details_modal_btn').click();

                }

            // }
        }
    });

}

