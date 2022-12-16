
$(document).ready(function () {
    get_supervisor_name_list();

    var segment_str = window.location.pathname; // return segment1/segment2/segment3/segment4
    var segment_array = segment_str.split('/');
    var last_segment = segment_array.pop();
    var current_rowid = last_segment;

    get_user_edit_form(current_rowid);
});
function get_supervisor_name_list(){
        $.ajax({
        type: "POST",
        url: BASE_URL + 'AdminController/get_supervisor_name_list',
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length != 0) {

                var html ='<option value="">Select</option>';

                for (let index = 0; index < data.length; index++) {
                        html += '<option value="' + data[index].id + '">' + data[index].supervisor_name + '</option>';
                }

                $('#supervisor_name').html(html);
            }
        }
    });
}

function get_user_edit_form(current_rowid){

    $.ajax({
        type: "POST",
        url: BASE_URL + 'EmpController/get_user_edit_form',
        data: {
            "current_rowid": current_rowid,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data[0].id)
            if (data.length != 0) {
               $('#edit_row_id').val(data[0].id);
                $("#location").val(data[0].location);
                $("#emp_code").val(data[0].emp_code);
                $("#name_trainee").val(data[0].name_trainee);
                $("#designation").val(data[0].designation);
                $("#pro_sbu").val(data[0].pro_sbu);
                $("#number").val(data[0].number);
                $("#emp_emailid").val(data[0].emp_emailid);
                $("#join_date").val(data[0].join_date);
                $("#gender").val(data[0].gender);
                $("#emp_dob").val(data[0].emp_dob);
                $("#emp_alt_num").val(data[0].emp_alt_num);
                $("#relation").val(data[0].relation);
                $("#p_address").val(data[0].p_address);
                $("#l_address").val(data[0].l_address);
                $("#qualification").val(data[0].qualification);
                $("#experience").val(data[0].experience);
                $("#supervisor_name").val(data[0].supervisor_name);
                $("#trainee_sta").val(data[0].trainee_sta);
                $("#c_devices").val(data[0].c_devices);
            }
        }
    });
}

$('#userFormEdit').submit(function(e) {
    var formData = new FormData(this);
    $.ajax({  
        url:BASE_URL + 'EmpController/editUserForm', 
        method:"POST",  
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        dataType:"json",
    
        success:function(data) {

            if(data.response =='success'){
                
                $('.btnSubmit').attr("disabled", false);
                $('#reset-btn').click();
                updated_toast();

                setTimeout(
                    function() {
                        window.location = BASE_URL + data.url;
                }, 1000);

                
            }
            else{
                trainee_failed_update();
                $('.btnSubmit').attr("disabled", false);
                
            }
                    
        }  
    }); 

});