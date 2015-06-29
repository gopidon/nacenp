<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <link href="bower_components/dropzone/dist/min/dropzone.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div id="delAttachmentSuccessAlert" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong>Attachment deleted.
    </div>
    <div id="delAttachmentErrorAlert" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Couldn't delete the attachment. <span class="errorMessage"></span>
    </div>
    <div class="page-header">
        <h2>Update Announcement</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" class="dropzone" id="updateAnnouncementForm" method="post" action="admin/announcement/updateAnnouncement">
                <div class="form-group" id='divBatch'>
                    <label for="batch">Batch *</label>
                    <select id='batch' name="batch">
                        <?php
                        $batchId = $announcement->first_row()->announcement_batch_id;
                        foreach($query as $row) {
                            if($row->batch_id == $batchId){
                                print("<option selected value=" . $row->batch_id . ">" . $row->batch_name . "</option>");
                            }
                            else{
                                print("<option value=" . $row->batch_id . ">" . $row->batch_name . "</option>");
                            }

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" id='divTitle'>
                    <label for="title">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $announcement->first_row()->announcement_title ?>" placeholder="Enter title" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $announcement->first_row()->announcement_id ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group" id='divMsg'>
                    <label for="message">Message *</label>
                    <textarea class="form-control"  placeholder="Enter message" rows="10" id="message" name="message" required="required"><?php echo $announcement->first_row()->announcement_msg ?></textarea>
                    <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                </div>
                <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="text" value="<?php echo $announcement->first_row()->announcement_date ?>" class="form-control nacenpDatePicker" id="date" name="date" placeholder="" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>

                <div id="drop-zone" class="dz-message well">
                    <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
                    <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    To attach files, drop files here or simply click here!
                </div>
                <div id="attachments">
                    <ul>
                        <?php
                        foreach($attachments as $row){
                            print('<li id="'.$row->file_id.'"><a target="_blank" href="'.$row->file_path.'/'.$row->file_name.'">'.$row->file_name.'</a><a class="removeAttachmentLnk" href="" data-fileid="'.$row->file_id.'" data-annid="'.$row->file_type_id.'" data-fileName="'.$row->file_name.'"> <i class="fa fa-remove fa-lg"></i></a></li>');
                        }


                        ?>
                    </ul>
                </div>


                <button type="submit" id="updateAnnouncementSubmit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <br>

    </div>



</div>

<div class="modal fade" id='dModal'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Delete the attachment?</h4>
            </div>
            <div class="modal-body">
                <label id='delFileName'>Are you sure you want to delete</label>
                <input type="hidden" id="dFileId"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id='deleteAttachmentBtn'>Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="bower_components/dropzone/dist/min/dropzone.min.js"></script>
<script src="scripts/admin/updateannouncement.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>