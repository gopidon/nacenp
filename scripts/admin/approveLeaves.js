$(document).ready(function(){

    var csrfData={};
    csrfData[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();



    $('#batchId').change(function(e)
    {
        oTable.fnDraw();

    });

    var oTable = $('#approveLeaveTable').dataTable({
        "sDom": "<'row'<'col-xs-6'r><'col-xs-6'T>><'row'<'col-xs-6'l><'col-xs-6'f>>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oTableTools": {
            "sSwfPath": "scripts/TableTools/media/swf/copy_csv_xls_pdf.swf"
        },
        "bProcessing": true,
        "bServerSide": true,
        "sServerMethod": "GET",
        "sAjaxSource": 'admin/leaves/fetchLeavesData',
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
            { "sName": "user_name", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "leave_title", "bVisible": true, "bSearchable": true, "bSortable": false },
            { "sName": "leave_type", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "days", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "leave_status", "bVisible": true, "bSearchable": false, "bSortable": false },
            { "sName": "viewlnk","sClass":"nacenpTextAlignCenter","bSearchable": false,"bSortable": false,

                "mRender": function (data,type,row) {
                    return "<a id='viewlnk' class='viewlnk' data-title = '"+html_escape(row[1])+"' data-id = '"+ row['DT_RowId'] +"' href='ot/showViewLeave?id=" + row['DT_RowId'] + "'><i class='fa fa-hand-o-right fa-lg'></i></a>";
                    //return "Hello"
                }



            }

        ]


    }); // End Data table def



    
    

    
    





});

