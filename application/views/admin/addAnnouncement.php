<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <link href="bower_components/dropzone/dist/min/dropzone.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div id="resetPwdSuccessAlert" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong>Password reset.
    </div>
    <div id="resetPwdErrorAlert" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Password cannot be reset. <span class="errorMessage"></span>
    </div>
    <div class="page-header">
        <h2>Add Announcement</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" class="dropzone" id="add-announcement-form" method="get" action="admin/announcement/addAnnouncement">
                <div class="form-group" id='divBatch'>
                    <label for="batch">Batch *</label>
                    <select id='batch' name="batch">
                        <?php
                        foreach($query as $row) {
                            $defBatchId = $this->session->userdata('user_def_batch_id');
                            if($defBatchId != $row->batch_id)
                            {
                                print("<option value=" . $row->batch_id . ">" . $row->batch_name . "</option>");
                            }
                            else{
                                print("<option value=" . $row->batch_id . " selected>" . $row->batch_name . "</option>");
                            }

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" id='divTitle'>
                    <label for="title">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group" id='divMsg'>
                    <label for="message">Message *</label>
                    <textarea class="form-control" rows="10" id="message" name="message" placeholder="Enter Message" required="required"></textarea>
                    <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                </div>
                <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="text" class="form-control nacenpDatePicker" id="date" name="date" placeholder="" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>

                <div id="drop-zone" class="dz-message well">
                    <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
                    <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    To attach files, drop files here or simply click here!
                </div>


                <button type="submit" id="addAnnouncementSubmit" class="btn btn-primary">Submit</button>


            </form>




        </div>

        <br>

    </div>



</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="bower_components/dropzone/dist/min/dropzone.min.js"></script>
<script src="scripts/admin/addannouncement.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>