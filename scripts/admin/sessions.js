$(document).ready(function(){

    var csrfData={};
    csrfData[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();

    var batchData={};
    $('#batchId option').each (function(name, val){
        batchData[$(this).val()] = $(this).text();
    });


    $('#batchId').change(function(e)
    {
        oTable.fnDraw();

    });



    var oTable = $('#sessionTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'admin/session/fetchClassSessionData',
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
            { "sName": "session_name", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "session_date", "sClass":"", "bVisible": true, "bSearchable": true, "bSortable": true,
                "mRender": function(data,type,row)
                {
                    var date = new Date(row[2]);
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();

                    var javascriptDate = month + '/' + day + '/' + year; // Modify as you need
                    //console.log(javascriptDate);
                    return javascriptDate;

                }
            },
            { "sName": "session_from", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "session_to", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "session_speaker", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "session_batch_id", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "deletelnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='deletelnk' class='deletelnk' data-speaker = '"+html_escape(row[5])+"' data-name = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/deleteSession?id=" + row['DT_RowId'] + "'><i class='fa fa-trash fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ]


    }); // End Data table def

    oTable.makeEditable({
            sUpdateURL: 'admin/session/updateSession',
            oUpdateParameters: csrfData,
            aoColumns: [
                null,
                {},

                {
                    "type"      : "datepicker",
                    "dateFormat": "mm/dd/yyyy",
                    "tooltip"   : "Click to edit..."

                },
                {
                  "type": 'time',
                    submit    : 'OK',
                    tooltip   : "Click to edit..."
                },
                {
                    "type": 'time',
                    submit    : 'OK',
                    tooltip   : "Click to edit..."
                },
                {

                },
                {
                    'type': 'select',
                    'tooltip': 'Click to select..',
                    'onblur': 'submit',
                    'data': batchData,
                    'event': 'click'
                }






            ]

        }
    );

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






