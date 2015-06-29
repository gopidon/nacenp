/**
 * Created by gopi on 3/22/15.
 */
$(document).ready(function(){


    var csrfTokenName = $("#csrfTokenName").val()
    var csrfTokenVal = $("#csrfTokenVal").val();
    var announcementId = $("#id").val();

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#drop-zone", {
        url: "admin/announcement/addAttachments",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here to upload",
        dictRemoveFile: "Remove",
        dictCancelUpload: "Cancel upload",
        dictCancelUploadConfirmation: "Cancel upload?",
        sending: function(file, xhr, formData) {
            formData.append(csrfTokenName, csrfTokenVal);
            formData.append("announcementId", announcementId);
        },
        init: function() {




            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                //window.location = "admin/announcement/announcements";
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }
    });

    $('#updateAnnouncementForm').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/announcement/updateAnnouncement',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    myDropzone.processQueue();
                    window.location = "admin/announcement/announcements";
                }


            });
        }
    });

    $(document).on("click", ".removeAttachmentLnk", function(e) {
        e.preventDefault();
        var annId = $(this).data('annid');
        var fileId = $(this).data('fileid');
        var fileName = $(this).data('filename');

        $("#dFileId").val(fileId);
        var label = $('#delFileName');
        label.text('Are u sure u want to delete ' + fileName +'?');
        $('#dModal').modal(
            {
                backdrop:false
            }
        );
        $('#dModal').modal('show');

    });

    $('#deleteAttachmentBtn').click(
        function(e)
        {
            var data={};
            data[$("#csrfTokenName").val()]=$("#csrfTokenVal").val();
            $.ajax({
                type: "POST",
                url: 'admin/announcement/removeAttachment?fileId='+$('#dFileId').val(),
                data: data,
                cache: false,
                success: function(data)
                {
                    if(data == -1){
                        $('#delAttachmentErrorAlert').show();
                    }
                    else{
                        var sel = "#attachments li#"+data;
                        $(sel).remove();
                    }

                },
                error: function(error){
                    $(".errorMessage").html(error.responseText);
                    $('#delAttachmentErrorAlert').show();
                }
            });
            //window.location = a;
            $('#dModal').modal( "hide" );

        }
    );


});

