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
        <h2>Preferences</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" id="updatePrefsForm" method="post" action="admin/prefs/updatePrefs">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group" id='divBatch'>
                    <label for="batch">Default Batch *</label>
                    <select id='defBatchId' name="defBatchId">
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





                <button type="submit" id="updatePrefsSubmit" class="btn btn-primary">Submit</button>


            </form>




        </div>

        <br>

    </div>



</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/admin/prefs.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>