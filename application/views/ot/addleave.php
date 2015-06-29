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
        <h2>Apply New Leave</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" id="addLeaveForm" method="post" action="ot/addLeave">
                <div class="form-group" id='divLeaveType'>
                    <label for="leaveType">Leave Type *</label>
                    <select id='leaveType' name="leaveType">
                        <?php
                        foreach($leaveTypes as $row) {
                            print("<option value=" . $row->lookup_val . ">" . $row->lookup_display_val . "</option>");
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" id='divTitle'>
                    <label for="title">Subject *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Subject" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group" id='divMsg'>
                    <label for="message">Message *</label>
                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter Message" required="required"></textarea>
                    <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                </div>
                <div class="form-group" id='divDays'>
                    <label for="days">Number of Days *</label>
                    <input type="number" class="form-control" id="days" name="days" placeholder="Enter a number" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <div class="form-group" id="divDateRows">
                    <div class="row">
                        <div class="col-md-4">
                            <label>From *</label>
                            <input type="text" class="form-control nacenpDatePicker" name="fromDate[]" placeholder="" required="required">
                        </div>
                        <div class="col-md-4">
                            <label>To *</label>
                            <input type="text" class="form-control nacenpDatePicker" name="toDate[]" placeholder="" required="required">
                        </div>
                    </div>
                </div>
                <div>

                <div style="" class="form-group">        
                    <a id="addDateRow" name="addDateRow" class="btn btn-default" href="">Add</a>
                    <a id="removeDateRow" name="removeDateRow" class="btn btn-default" href="">Remove</a>
                </div>

                <div class="form-group">
                    <label for="prefix">Prefix holidays*</label>
                    <select id="prefix" name="prefix">
                        <option value="N">No</option>
                        <option value="Y">Yes</option>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>

                <div class="form-group">
                    <label for="suffix">Suffix holidays *</label>
                    <select id="suffix" name="suffix">
                        <option value="N">No</option>
                        <option value="Y">Yes</option>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>    
                  
                <div class="form-group">
                    <label for="stationLeave">Station Leave *</label>
                    <select id="stationLeave" name="stationLeave">
                        <option value="N">No</option>
                        <option value="Y">Yes</option>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <button style="float:right" type="submit" id="addLeaveSubmit" class="btn btn-primary">Submit Leave Application</button>
            </form>


            




        </div>

        <br>

    </div>



</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="scripts/ot/addLeave.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>