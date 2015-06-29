<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>Class Sessions</h2>
    </div>
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
            <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <button class="btn btn-primary" data-backdrop='false' data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Session</button>
        </div>
        <br>
        <div class="row">
            <label for="batchId">Choose Batch: </label>
            <select id='batchId'>
                <?php
                foreach($batches as $row) {
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
        <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="sessionTable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Speaker</th>
                    <th>Batch</th>
                    <th style="text-align: center">Delete</th>
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
                    <h4 class="modal-title">Add New Session</h4>
                </div>
                <div class="modal-body">
                    <span class="help-block">* indicates required field.</span>
                    <form role="form" id="addSessionForm" method="get" action="admin/session/addSession">
                        <div class="form-group" id='divUserBatch'>
                            <label for="batchId">Batch *</label>
                            <select id='batchId' name="batchId">
                                <?php
                                foreach($batches as $row) {
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
                        <div class="form-group" id='divSessionName'>
                            <label for="sessionName">Session Name *</label>
                            <input type="text" class="form-control" id="sessionName" name="sessionName" placeholder="Session Name" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group" id='divSessionSpeaker'>
                            <label for="sessionSpeaker">Session Speaker *</label>
                            <input type="text" class="form-control" id="sessionSpeaker" name="sessionSpeaker" placeholder="Session Speaker" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>

                        <div class="form-group">
                            <label for="sessionDate">Session Date *</label>
                            <input type="text" class="form-control nacenpDatePicker" id="sessionDate" name="sessionDate" placeholder="" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="sessionFrom">Session From *</label>
                                <input type="text" class="form-control nacenpTimePicker" id="sessionFrom" name="sessionFrom" required="required">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sessionTo">Session To *</label>
                                <input type="text" class="form-control nacenpTimePicker" id="sessionTo" name="sessionTo" required="required">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="sessionNum">Session Number *</label>
                            <select id="sessionNum" name="sessionNum">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div> -->
                        <button type="submit" id="addSessionSubmit" class="btn btn-primary">Submit</button>
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
                    <h4 class="modal-title">Delete the class session?</h4>
                </div>
                <div class="modal-body">
                    <label id='delSessionName'>Are you sure you want to delete</label>
                    <input type="hidden" id="dSessionId"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id='deleteSessionBtn'>Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/admin/sessions.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>