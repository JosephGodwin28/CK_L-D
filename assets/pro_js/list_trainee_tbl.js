$(document).ready(function () {

    list_trainee();
    get_traineer_name_list();
    
});

function get_traineer_name_list(){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'AdminController/get_trainer_name_list',
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {

                var html ='<option value="">Select</option>';

                for (let index = 0; index < data.length; index++) {
                        html += '<option value="' + data[index].emp_code + '">' + data[index].trainer_name + '</option>';
                }

                $('#trainer_name').html(html);
            }
        }
    });
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



$("#btnClear").on('click',function (){
    
    $("#trainer_name").val("");
    $("#date_emp").val("");
    // getEmployee();

});

function list_trainee() {
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
            'url': BASE_URL + 'AdminController/get_trainee_list',
            'data': function (data) {
                 // console.log(data)

            }
        },
        createdRow: function (row, data, dataIndex) {
            $( row ).find('td:eq(0)').attr('data-label', 'S-All');
            $( row ).find('td:eq(1)').attr('data-label', '#');
            $( row ).find('td:eq(2)').attr('data-label', 'Key ID ');
            $( row ).find('td:eq(3)').attr('data-label', 'Trainee Name');
            $( row ).find('td:eq(4)').attr('data-label', 'Batch Code');
            $( row ).find('td:eq(5)').attr('data-label', 'Designation');
            $( row ).find('td:eq(6)').attr('data-label', 'Number');
            $( row ).find('td:eq(7)').attr('data-label', 'Gender');
            $( row ).find('td:eq(8)').attr('data-label', 'DoB');
            $( row ).find('td:eq(9)').attr('data-label', 'assignedDate');
            $( row ).find('td:eq(10)').attr('data-label', 'Action');

        },
        "columns": [
            { "data": "check_box_field" },
            {
                title: 'S.No',
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "name_trainee" },
            { "data": "batch_code" },
            { "data": "designation" },
            { "data": "number" },
            { "data": "gender" },
            { "data": "emp_dob" },
            { "data": "assignedDate" },
            // { "data": "score" },
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


function get_trainee_pop(table_row_id){
    // alert(table_row_id);

    $.ajax({
        type: "POST",
        url: BASE_URL + 'AdminController/get_list_edit_trainee',
        data: {
            "table_row_id": table_row_id,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data)
            if (data.length != 0) {

                var html = '';
                var join_date = moment(data[0].join_date).format('DD-MM-YYYY');
                var emp_dob = moment(data[0].emp_dob).format('DD-MM-YYYY');
                var created_on = moment(data[0].created_on).format('DD-MM-YYYY');

                 html +='<tr>';
                html +='<td data-label="Parameter">Trainee Name</td>';
                html +='<td data-label="Slab">'+data[0].name_trainee+'</td>';
                // html +='<td data-label="Points">'+data[0].c_market_fb_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Gender</td>';
                html +='<td data-label="Slab">'+data[0].gender+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Designation</td>';
                html +='<td data-label="Slab">'+data[0].designation+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Code of Trainee</td>';
                html +='<td data-label="Slab">'+data[0].emp_code+'</td>';
                html +='</tr>';


                html +='<tr>';
                html +='<td data-label="Parameter">Joining Date</td>';
                html +='<td data-label="Slab">'+join_date+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Date of Birth</td>';
                html +='<td data-label="Slab">'+emp_dob+'</td>';
                html +='</tr>';


                html +='<tr>';
                html +='<td data-label="Parameter">Mobile Number</td>';
                html +='<td data-label="Slab">'+data[0].number+'</td>';
                html +='</tr>';

                 html +='<tr>';
                html +='<td data-label="Parameter">Email Id</td>';
                html +='<td data-label="Slab">'+data[0].emp_emailid+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Batch Code</td>';
                html +='<td data-label="Slab">'+data[0].batch_code+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Alt Cont No</td>';
                html +='<td data-label="Slab">'+data[0].emp_alt_num+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Location</td>';
                html +='<td data-label="Slab">'+data[0].location+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Process/SBU</td>';
                html +='<td data-label="Slab">'+data[0].pro_sbu+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Created By</td>';
                html +='<td data-label="Slab">'+data[0].created_by+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Created On</td>';
                html +='<td data-label="Slab">'+created_on+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Permanent address</td>';
                html +='<td data-label="Slab">'+data[0].p_address+'</td>';
                //html +='<td data-label="Points">'+data[0].c_comp_handled_point+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Local address</td>';
                html +='<td data-label="Slab">'+data[0].l_address+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Qualification</td>';
                html +='<td data-label="Slab">'+data[0].qualification+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Experience Status</td>';
                html +='<td data-label="Slab">'+data[0].experience+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Supervisor Name</td>';
                html +='<td data-label="Slab">'+data[0].supervisor_name+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Trainee Working Status</td>';
                html +='<td data-label="Slab">'+data[0].trainee_sta+'</td>';
                html +='</tr>';

                html +='<tr>';
                html +='<td data-label="Parameter">Connecting Devices</td>';
                html +='<td data-label="Slab">'+data[0].c_devices+'</td>';
                html +='</tr>';


                $('#adt_tb_body').html(html);
                $("#adt_details_modal").modal('show');
                // $('#adt_details_modal_btn').click();

            }
        }
    });

}
function get_action_pop(){
    $('#adt_details_modal').modal('hide');
}


$('#child-table').on('change', 'input[type="checkbox"]', function () {
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
});
// end select all


$('#assignSubmit').submit(function(e) {
     var check=[];
    var formData = new FormData(this);
    e.preventDefault();

    var check_box_len = $('input[name="assign_chbox[]"]:checked').length;
       $("#child-table tbody>tr").each(function() { //get all rows in table
           var currow=$(this).closest('tr');
           if($(this).find("td:eq(0) [type='checkbox']").prop('checked'))
           {
           var col1=$(this).find("td:eq(0) [type='checkbox']").val()
             check.push(col1);
           }       
        });
    formData.append('test',check);

    var trainer_name = $('#trainer_name').find('option:selected').text();
    // alert(trainer_name)
    formData.append('batch_code',trainer_name);

  // console.log(check);
    if(check_box_len !=0){
        $('.confirm-modal').modal('show');
        $("#confirmSubmit").one('click', function() {
            // e.stopPropagation();
            $('.confirm-modal').modal('hide');
            $.ajax({  
                url:BASE_URL + 'AdminController/assignEmp', 
                method:"POST",  
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType:"json",
                
                success:function(data) {
                    // alert(data.message)
                    if(data.message =='success'){
                        $("#assign_chbox").prop('checked', false); //change "select all" checked status to false
                        $("#trainer_name").val('');
                        $("#date_emp").val('');
                        trainee_assigned();
                        setTimeout(
                            function() {
                                location.reload();

                            }, 2000);
                    }
                    else{
                        // notify('Request Failed..! Try Again..!','top', 'right', 'fa fa-tick', 'warning', 'animated bounceIn', 'animated bounceOut');
                        trainee_assigned_faild();
                        list_trainee();
                        
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
// notification 
function notify(message, from, align, icon, type, animIn, animOut){
    $.growl({
        icon: icon,
        title: ' ',
        message: message,
        url: ''
    },{
        element: 'body',
        type: type,
        allow_dismiss: true,
        placement: {
            from: from,
            align: align
        },
        offset: {
            x: 30,
            y: 30
        },
        spacing: 10,
        z_index: 999999,
        delay: 2500,
        timer: 1000,
        url_target: '_blank',
        mouse_over: false,
        animate: {
            enter: animIn,
            exit: animOut
        },
        icon_type: 'class',
        template: '<div data-growl="container" class="alert" role="alert">' +
        '<button type="button" class="close" data-growl="dismiss">' +
        '<span aria-hidden="true">&times;</span>' +
        '<span class="sr-only">Close</span>' +
        '</button>' +
        '<span data-growl="icon"></span>' +
        '<span data-growl="title"></span>' +
        '<span data-growl="message"></span>' +
        '<a href="#" data-growl="url"></a>' +
        '</div>'
    });
};

