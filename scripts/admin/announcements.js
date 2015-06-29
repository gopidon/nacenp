$(document).ready(function(){

    $('.alert .close').on('click', function(e) {
        $(this).parent().hide();
    });

    $('#batchId').change(function(e)
    {
        oTable.fnDraw();

    });



    var oTable = $('#announcementTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'admin/announcement/fetchAnnouncementData',
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
            { "sName": "announcement_title", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "announcement_message", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "announcement_batch_id", "bVisible": false, "sClass":"nacenpTextAlignCenter", "bSearchable": true, "bSortable": false

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
            { "sName": "announcement_date", "bVisible": true, "bSearchable": true, "bSortable": true,

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
            },
            { "sName": "last_updated_by", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "last_updated_date", "bVisible": false, "bSearchable": true, "bSortable": false,

                "mRender": function(data,type,row)
                {
                    var date = new Date(row[6]);
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();

                    var javascriptDate = month + '/' + day + '/' + year; // Modify as you need
                    //console.log(javascriptDate);
                    return javascriptDate;

                }

            },
            { "sName": "updatelnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='updatelnk' class='updatelnk' data-title = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/announcement/showUpdateAnnouncement?id=" + row['DT_RowId'] + "'><i class='fa fa-edit fa-lg'></i></a>";
                    //return "Hello"
                }



            },
            { "sName": "deletelnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='deletelnk' class='deletelnk' data-title = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/announcement/deleteAnnouncement?id=" + row['DT_RowId'] + "'><i class='fa fa-trash fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ],
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            /* Append the grade to the default row class name */


        }


    }); // End Data table def




    $('#updateAnnouncementForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/announcement/updateAnnouncement',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    window.location = "admin/announcement/announcements";
                }


            });
        }
    });

    $(document).on("click", ".deletelnk", function(e) {
        e.preventDefault();
        var title = $(this).data('title');
        var id = $(this).data('id');
        $("#dAnnouncementId").val(id);
        var label = $('#delTitle');
        label.text('Are u sure u want to delete the announcement: ' + title +'?');
        $('#dModal').modal(
            {
                backdrop:false
            }
        );
        $('#dModal').modal('show');

    });

    $(document).on("click", ".updatelnk2", function(e) {
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

    $('#deleteAnnouncementBtn').click(
        function(e)
        {
            var data={};
            data[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();
            $.ajax({
                type: "POST",
                url: 'admin/announcement/deleteAnnouncement?id='+$('#dAnnouncementId').val(),
                data: data,
                cache: false,
                success: function(data)
                {
                    var sel = "#announcementTable tbody tr#"+data;
                    $(sel).remove();
                }
            });
            //window.location = a;
            $('#dModal').modal( "hide" );

        }
    );









});

