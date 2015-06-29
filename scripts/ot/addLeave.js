$(document).ready(function(){

    function toggleRemoveDateRowLink(){
        if($('#divDateRows').children().length <= 1){
                $('#removeDateRow').hide();
            }
            else{
                $('#removeDateRow').show();
            }
    }

    toggleRemoveDateRowLink()

    $('#addLeaveForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'ot/addLeave',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    window.location = "ot/leaves";
                }


            });
        }
    });

    $(document).on("click", "#addDateRow", function(e) {
            e.preventDefault();

            var elem = '<div class="row">'+
                            '<div class="col-md-4">'+
                                '<label>From *</label>'+
                                '<input type="text" class="form-control nacenpDatePicker"  name="fromDate[]" placeholder="" required="required">'+
                            '</div>'+
                            '<div class="col-md-4">'+
                                '<label for="toDate">To *</label>'+
                                '<input type="text" class="form-control nacenpDatePicker"  name="toDate[]" placeholder="" required="required">'+
                            '</div>'+
                        '</div>';
            $('#divDateRows').append('<br>');        
            $('#divDateRows').append(elem);
            $('.nacenpDatePicker').datepicker(
            {   
                dateFormat: "mm/dd/yy"


            }

        );
            toggleRemoveDateRowLink()
    });    


    $(document).on("click", "#removeDateRow", function(e) {
            e.preventDefault();
            $('#divDateRows br:last').remove();  
            $('#divDateRows .row:last').remove();

            toggleRemoveDateRowLink();
            
    });    





});

