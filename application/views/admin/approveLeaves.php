<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>Approve Leaves</h2>
    </div>
    <div class="container" style="margin-top: 10px">
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
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="approveLeaveTable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Applicant</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th style="text-align: center">View</th>
                </tr>
                </thead>
                <tbody>
                </tbody>

            </table>
        </div>

    </div>

</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/admin/approveLeaves.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>