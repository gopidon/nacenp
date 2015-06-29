$(document).ready(function(){

    var csrfData={};
    csrfData[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();



    $('#batchId').change(function(e)
    {
        oTable.fnDraw();

    });

    var oTable = $('#leaveTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'ot/fetchLeavesData',
        "fnServerParams": function ( aoData ) {

        },
        "iDisplayLength": 10,
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aaSorting": [[0, 'asc']],
        "aoColumns": [
            { "sName": "s_no", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "leave_title", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "leave_type", "bVisible": true, "bSearchable": false, "bSortable": false },
            /*{ "sName": "leave_from", "sClass":"", "bVisible": true, "bSearchable": false, "bSortable": true,
                "mRender": function(data,type,row)
                {
                    var date = new Date(row[3]);
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();

                    var javascriptDate = month + '/' + day + '/' + year; // Modify as you need
                    //console.log(javascriptDate);
                    return javascriptDate;

                }
            },
            { "sName": "leave_to", "sClass":"", "bVisible": true, "bSearchable": false, "bSortable": true,
                "mRender": function(data,type,row)
                {
                    var date = new Date(row[4]);
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();

                    var javascriptDate = month + '/' + day + '/' + year; // Modify as you need
                    //console.log(javascriptDate);
                    return javascriptDate;

                }
            },*/
            { "sName": "leave_status", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "updatelnk","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    if(row[3] == 'Pending Approval'){
                        return "<a id='updatelnk' class='updatelnk' data-title = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='ot/showUpdateLeave?id=" + row['DT_RowId'] + "'><i class='fa fa-edit fa-lg'></i></a>";
                    }
                    else{
                        return "";
                    }
                    
                    //return "Hello"
                }



            },
            { "sName": "viewlnk","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='viewlnk' class='viewlnk' data-title = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='ot/showViewLeave?id=" + row['DT_RowId'] + "'><i class='fa fa-hand-o-right fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ]


    }); // End Data table def



    $('#addSessionForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/session/addSession',
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
        var sessionId = $(this).data('id');
        var sessionName = $(this).data('name');
        $("#dSessionId").val(sessionId);
        var label = $('#delSessionName');
        label.text('Are u sure u want to delete the session:' + sessionName +'?');
        $('#dModal').modal(
            {
                backdrop:false
            }
        );
        $('#dModal').modal('show');

    });

    $('#deleteSessionBtn').click(
        function(e)
        {
            $.ajax({
                type: "POST",
                data: csrfData,
                url: 'admin/session/deleteSession?id='+$('#dSessionId').val(),
                cache: false,
                success: function(data)
                {
                    var sel = "#sessionTable tbody tr#"+data;
                    $(sel).remove();
                }
            });
            //window.location = a;
            $('#dModal').modal( "hide" );

        }
    );

    





});

