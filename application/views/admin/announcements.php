<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
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
        <h2>Announcements</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <a class="btn btn-primary" href="admin/announcement/showAddAnnouncement"><i class="fa fa-plus"></i> Add Announcement</a>
        </div>
        <br>
        <div class="row">
            <label for="batchId">Choose Batch: </label>
            <select id='batchId'>
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

        <br>
        <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="announcementTable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Batch</th>
                    <th>Date</th>
                    <th>By</th>
                    <th>Updated</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>

    </div>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Single User</h4>
                </div>
                <div class="modal-body">
                    <span class="help-block">* indicates required field.</span>
                    <form role="form" id="addUserForm" method="get" action="admin/announcement/addSingleUser">
                        <div class="form-group" id='divUserName'>
                            <label for="userName">User Name *</label>
                            <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group" id='divUserDisplayName'>
                            <label for="userDisplayName">User Display Name *</label>
                            <input type="text" class="form-control" id="userDisplayName" name="userDisplayName" placeholder="User Display Name" required="required">
                            <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                        </div>
                        <div class="form-group" id='divUserAccess'>
                            <label for="userAccess">User Access *</label>
                            <select id="userAccess" name="userAccess">
                                <option value='R'>Regular</option>
                                <option value='A'>Admin</option>
                            </select>
                        </div>
                        <div class="form-group" id='divUserBatch'>
                            <label for="userBatch">User Batch *</label>
                            <select id='userBatch' name="userBatch">
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
                        <button type="submit" id="addUserSubmit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id='dModal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Delete the Announcement?</h4>
                </div>
                <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
                <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <label id='delTitle'>Are you sure you want to delete</label>
                    <input type="hidden" id="dAnnouncementId"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id='deleteAnnouncementBtn'>Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id='rModal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Reset Password?</h4>
                </div>
                <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
                <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <label id='rUserName'>Are you sure you want to reset</label>
                    <input type="hidden" id="rUserId"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id='resetUserPasswdBtn'>Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/admin/announcements.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>