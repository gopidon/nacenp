$(document).ready(function(){

    var csrfData={};
    csrfData[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();


    var batchData={};
    $('#batchId option').each (function(name, val){
       batchData[$(this).val()] = $(this).text();
    });



    $('.alert .close').on('click', function(e) {
        $(this).parent().hide();
    });

    $('#batchId').change(function(e)
    {
        oTable.fnDraw();

    });

    var oTable = $('#userTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'admin/user/fetchUserData',
        "fnServerParams": function ( aoData ) {
            aoData.push(
                { "name": "batchId","value":$('#batchId').val()}
            );
        },
        "iDisplayLength": 10,
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aaSorting": [[0, 'asc']],
        "aoColumns": [
            { "sName": "s_no", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "user_name", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "user_display_name", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "user_access", "bVisible": true, "sClass":"nacenpTextAlignCenter", "bSearchable": true, "bSortable": true

               /* "mRender": function(data,type,row)
                {
                    // This can be empty
                    var access = row[3];

                    if ("R" == access) {
                        return "Regular";
                    }
                    else if ("A" == access) {
                        return "Admin";
                    }

                }*/

            },
            { "sName": "user_batch_id", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "resetlnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='resetlnk' class='resetlnk' data-name = '"+html_escape(row[1])+"' data-display = '"+html_escape(row[2])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/user/resetPasswd?id=" + row['DT_RowId'] + "'><i class='fa fa-unlock-alt fa-lg'></i></a>";
                }



            },
            { "sName": "deletelnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='deletelnk' class='deletelnk' data-name = '"+html_escape(row[1])+"' data-display = '"+html_escape(row[2])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/user/deleteUser?id=" + row['DT_RowId'] + "'><i class='fa fa-trash fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            /* Append the grade to the default row class name */

            var access = aData[3];
            if ("R" == access) {
                $('td:eq(3)', nRow).html("Regular");
            }
            else if ("A" == access) {
                $('td:eq(3)', nRow).html("Admin");
            }
            //console.log(refType);

        }


    }); // End Data table def

    oTable.makeEditable({
            sUpdateURL: 'admin/user/updateUser',
            oUpdateParameters: csrfData,
            aoColumns: [
                null,
                {},
                {

                },
                {
                    'type': 'select',
                    'tooltip': 'Click to select..',
                    'onblur': 'submit',
                    'data': "{'R':'Regular','A':'Admin'}",
                    'event': 'click'
                },
                {
                    'type': 'select',
                    'tooltip': 'Click to select..',
                    'onblur': 'submit',
                    'data': batchData,
                    'event': 'click'
                },
                {},
                {}






            ]

        }
    );

    $('#addUserForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/user/addSingleUser',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    //alert(response);
                    oTable.fnDraw();
                    $('#addModal').modal('toggle');
                }


            });
        }
    });

    $(document).on("click", ".deletelnk", function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        $("#dUserId").val(userId);
        var label = $('#delUserName');
        label.text('Are u sure u want to delete the user: ' + userName +'?');
        $('#dModal').modal(
            {
                backdrop:false
            }
        );
        $('#dModal').modal('show');

    });

    $(document).on("click", ".resetlnk", function(e) {
        e.preventDefault();
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        $("#rUserId").val(userId);
        var label = $('#rUserName');
        label.text('Are u sure u want to reset the password for the user: ' + userName +'?');
        $('#rModal').modal(
            {
                backdrop:false
            }
        );
        $('#rModal').modal('show');

    });

    $('#deleteUserBtn').click(
        function(e)
        {
            var data={};
            data[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();
            $.ajax({
                type: "POST",
                url: 'admin/user/deleteUser?id='+$('#dUserId').val(),
                data: csrfData,
                cache: false,
                success: function(data)
                {
                    var sel = "#userTable tbody tr#"+data;
                    $(sel).remove();
                }
            });
            //window.location = a;
            $('#dModal').modal( "hide" );

        }
    );

    $('#resetUserPasswdBtn').click(
        function(e)
        {
            $.ajax({
                type: "POST",
                url: 'admin/user/resetPasswd?id='+$('#rUserId').val(),
                data: csrfData,
                cache: false,
                success: function(data)
                {
                    if(data){
                        $('#resetPwdSuccessAlert').show();
                    }
                    else{

                    }
                },
                error: function(error){
                    $(".errorMessage").html(error.responseText);
                    $('#resetPwdErrorAlert').show();
                }
            });
            $('#rModal').modal( "hide" );

        }
    );







});

