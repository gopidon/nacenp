<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>My Leaves</h2>
    </div>
    <div class="container" style="margin-top: 10px">
        <div class="row">
            <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
            <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <a href="ot/showAddLeave" class="btn btn-primary"><i class="fa fa-plus"></i> Apply Leave</a>
        </div>
        <br>
        <div class="row">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="leaveTable">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Update</th>
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
<script src="scripts/ot/leaves.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>