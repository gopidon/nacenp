$(document).ready(function(){

$('#approveLeaveSubmit').click(
        
        function(e)
        {
            var data={};
            data['comments']=$("#comments").val();
            $.ajax({
                type: "GET",
                url: 'admin/leaves/changeLeaveStatus?id='+$('#id').val()+'&status=A',
                cache: false,
                data: data,
                success: function(data)
                {
                    window.location='admin/leaves/showApproveLeaves'
                }
            });
        

        }
    );

    $('#rejectLeaveSubmit').click(
        
        function(e)
        {
            var data={};
            data['comments']=$("#comments").val();
            $.ajax({
                type: "GET",
                url: 'admin/leaves/changeLeaveStatus?id='+$('#id').val()+'&status=R',
                cache: false,
                data: data,
                success: function(data)
                {
                    window.location='admin/leaves/showApproveLeaves'
                }
            });
        

        }
    );
});