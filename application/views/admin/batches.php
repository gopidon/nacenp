<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>Batches</h2>
    </div>
    <div style="margin-top: 10px">
        <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
        <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <button class="btn btn-primary" data-backdrop='false' data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add New Batch</button>
        <br>
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="batchTable">
            <thead>
            <tr>
                <th>S.No</th>
                <th>Batch Name</th>
                <th>Batch Year</th>
                <th>Batch Number</th>
                <th>Batch Size</th>
                <th style="text-align: center">Delete</th>
            </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
    </div>
    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Batch</h4>
                </div>
                <div class="modal-body">
                    <span class="help-block">* indicates required field.</span>
                    <form role="form" id="addBatchForm" method="get" action="admin/batch/addBatch">
                        <div class="form-group" id='divBatchName'>
                            <label for="batchName">Batch Name *</label>
                            <input type="text" class="form-control" id="batchName" name="batchName" placeholder="Batch Name" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="form-group" id='divBatchYear'>
                            <label for="batchYear">Batch Year *</label>
                            <input type="number" class="form-control" id="batchYear" name="batchYear" minlength="4" placeholder="Batch Year" required="required">
                            <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                        </div>

                        <div class="form-group" id='divBatchNum'>
                            <label for="batchNum">Batch Number *</label>
                            <input type="number" class="form-control" id="batchNum" name="batchNum" placeholder="Batch Number" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <div class="form-group" id='divBatchSize'>
                            <label for="batchSize">Batch Size *</label>
                            <input type="number" class="form-control" id="batchSize" name="batchSize" placeholder="Batch Size" required="required">
                            <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                        </div>
                        <button type="submit" id="addBatchSubmit" class="btn btn-primary">Submit</button>
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
                    <h4 class="modal-title">Delete the Batch?</h4>
                </div>
                <div class="modal-body">
                    <label id='delBatchName'>Are you sure you want to delete</label>
                    <input type="hidden" id="dBatchId"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id='deleteBatchBtn'>Yes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/admin/batches.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>