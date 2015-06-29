/**
 * Created by gopi on 3/22/15.
 */
$(document).ready(function(){

    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    var javascriptDate = month + '/' + day + '/' + year;
    $("#date").val(javascriptDate);


    var csrfTokenName = $("#csrfTokenName").val()
    var csrfTokenVal = $("#csrfTokenVal").val();
    var announcementId = -1;

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


           // First change the button to actually tell Dropzone to process the queue.
            /*this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
             // Make sure that the form isn't actually being sent.
             e.preventDefault();
             e.stopPropagation();
             var title = $("#title").val();
             var msg = $("#message").val();
             var date = $("#date").val();
             $.ajax({
             url: 'admin/announcement/addAnnouncement',
             type: 'POST',
             data: $("#add-announcement-form").serialize(),
             success: function(response) {
             console.log(response);
             myDropzone.processQueue();

             }


             });


             });*/

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

    $('#add-announcement-form').validate({

        //validation rules here

        submitHandler: function(form) {
            $.ajax({
                url: 'admin/announcement/addAnnouncement',
                type: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    announcementId = response;
                    myDropzone.processQueue();
                    window.location = "admin/announcement/announcements";
                }


            });
        }
    });

    //$("#drop-zone").dropzone({ url: "admin/announcement/addAttachments" });



    /*Dropzone.options.dropZone = { // The camelized version of the ID of the form element

        // The configuration we've talked about above
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                var title = $("#title").val();
                var msg = $("#message").val();
                var date = $("#date").val();
                $.ajax({
                    url: 'admin/announcement/addAnnouncement',
                    type: 'POST',
                    data: $("#add-announcement-form").serialize(),
                    success: function(response) {
                        console.log(response);
                        myDropzone.processQueue();

                    }


                });


            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });
            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
                window.location = "admin/announcement/announcements";
            });
            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }

    }*/
});

