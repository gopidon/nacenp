$(document).ready(function(){

    var csrfData={};
    csrfData[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();

    var oTable = $('#batchTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'admin/batch/fetchClassBatchData',
        "iDisplayLength": 10,
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "aaSorting": [[0, 'asc']],
        "aoColumns": [
            { "sName": "s_no", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "batch_name", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "batch_year", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "batch_num", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "batch_size", "bVisible": true, "bSearchable": true, "bSortable": true },
            { "sName": "deletelnks","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='deletelnk' class='deletelnk' data-name = '"+html_escape(row[1])+"' data-year = '"+html_escape(row[2])+"' data-id = '"+ row['DT_RowId'] +"' href='admin/batch/deleteBatch?id=" + row['DT_RowId'] + "'><i class='fa fa-trash fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ]


    }); // End Data table def

    oTable.makeEditable({
            sUpdateURL: 'admin/batch/updateBatch',
            oUpdateParameters: csrfData,
            aoColumns: [
                null,
                {},

                {

                },
                {

                },
                {

                }






            ]

        }
    );

    $('#addBatchForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/batch/addBatch',
                //data: {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
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
        var batchId = $(this).data('id');
        var batchName = $(this).data('name');
        $("#dBatchId").val(batchId);
        var label = $('#delBatchName');
        label.text('Are u sure u want to delete the batch:' + batchName +'?');
        $('#dModal').modal(
            {
                backdrop:false
            }
        );
        $('#dModal').modal('show');

    });

    $('#deleteBatchBtn').click(
        function(e)
        {
            $.ajax({
                type: "POST",
                url: 'admin/batch/deleteBatch?id='+$('#dBatchId').val(),
                data: csrfData,
                cache: false,
                success: function(data)
                {
                    var sel = "#batchTable tbody tr#"+data;
                    $(sel).remove();
                }
            });
            $('#dModal').modal( "hide" );

        }
    );





});

