$(document).ready(function () {

    emp_list_trainee();
    
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


function emp_list_trainee() {
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

        'ajax': {
            'url': BASE_URL + 'EmpController/get_trainee_list',
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

function get_trainee_pop(table_row_id){
    // alert(table_row_id);

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/get_list_edit_trainee',
        data: {
            "table_row_id": table_row_id,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data[0].created_by)
            if (data.length != 0) {
                var join_date = moment(data[0].join_date).format('DD-MM-YYYY');
                var emp_dob = moment(data[0].emp_dob).format('DD-MM-YYYY');
                var created_on = moment(data[0].created_on).format('DD-MM-YYYY');
                //alert(curr_month);

                var html = '';

                 html +='<tr>';
                html +='<td data-label="Parameter">Trainee Name</td>';
                html +='<td data-label="Slab">'+data[0].name_trainee+'</td>';
                // html +='<td data-label="Points">'+data[0].c_market_fb_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Gender</td>';
                html +='<td data-label="Slab">'+data[0].gender+'</td>';
                // html +='<td data-label="Points">'+data[0].c_delivery_vehicle_point+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Designation</td>';
                html +='<td data-label="Slab">'+data[0].designation+'</td>';
                // html +='<td data-label="Points">'+data[0].c_retail_serviced_point+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Code of Trainee</td>';
                html +='<td data-label="Slab">'+data[0].emp_code+'</td>';
                // html +='<td data-label="Points">'+data[0].c_computer_point+'</td>';
                html +='</tr>';


                html +='<tr>';
                html +='<td data-label="Parameter">Joining Date</td>';
                html +='<td data-label="Slab">'+join_date+'</td>';
                // html +='<td data-label="Points">'+data[0].c_fut_inverstment_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Date of Birth</td>';
                html +='<td data-label="Slab">'+emp_dob+'</td>';
                // html +='<td data-label="Points">'+data[0].c_printer_point+'</td>';
                html +='</tr>';


                html +='<tr>';
                html +='<td data-label="Parameter">Mobile Number</td>';
                html +='<td data-label="Slab">'+data[0].number+'</td>';
                // html +='<td data-label="Points">'+data[0].c_market_fb_point+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Email Id</td>';
                html +='<td data-label="Slab">'+data[0].emp_emailid+'</td>';
                // html +='<td data-label="Points">'+data[0].c_internet_point  +'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Alt Cont No</td>';
                html +='<td data-label="Slab">'+data[0].emp_alt_num+'</td>';
                // html +='<td data-label="Points">'+data[0].c_godown_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Location</td>';
                html +='<td data-label="Slab">'+data[0].location+'</td>';
                // html +='<td data-label="Points">'+data[0].c_prop_invol_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Process/SBU</td>';
                html +='<td data-label="Slab">'+data[0].pro_sbu+'</td>';
                // html +='<td data-label="Points">'+data[0].c_market_fb_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Created By</td>';
                html +='<td data-label="Slab">'+data[0].created_by+'</td>';
                // html +='<td data-label="Points">'+data[0].c_age_of_org_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Created On</td>';
                html +='<td data-label="Slab">'+created_on+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Permanent address</td>';
                html +='<td data-label="Slab">'+data[0].p_address+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Local address</td>';
                html +='<td data-label="Slab">'+data[0].l_address+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Qualification</td>';
                html +='<td data-label="Slab">'+data[0].qualification+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Experience Status</td>';
                html +='<td data-label="Slab">'+data[0].experience+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';


                $('#adt_tb_body').html(html);
                $("#adt_details_modal").modal('show');
                // $('#adt_details_modal_btn').click();

            }
        }
    });

}

