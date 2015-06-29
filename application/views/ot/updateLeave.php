<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>Update Leave</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" id="updateLeaveForm" method="post" action="ot/updateLeave">
                <div class="form-group" id='divBatch'>
                    <label for="leaveType">Leave Type *</label>
                    <select id='leaveType' name="leaveType">
                        <?php
                        $leaveType = $leave->first_row()->leave_type;
                        foreach($leaveTypes as $row) {

                            if($row->lookup_val == $leaveType){
                                print("<option selected value=" . $row->lookup_val . ">" . $row->lookup_display_val . "</option>");
                            }
                            else{
                                print("<option value=" . $row->lookup_val . ">" . $row->lookup_display_val . "</option>");
                            }

                        }
                        ?>
                    </select>
                </div>

                <div class="form-group" id='divTitle'>
                    <label for="title">Subject *</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $leave->first_row()->leave_title ?>" placeholder="Subject" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $leave->first_row()->leave_id ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group" id='divMsg'>
                    <label for="message">Message *</label>
                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Enter Message" required="required"><?php echo $leave->first_row()->leave_message ?></textarea>
                    <!-- <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>-->
                </div>
                 <div class="form-group" id='divDays'>
                    <label for="days">Number of Days *</label>
                    <input type="number" class="form-control" id="days" name="days" value="<?php echo $leave->first_row()->days ?>" placeholder="Enter a number" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <div class="form-group" id="divDateRows">
                    <?php
                        
                        foreach ($leaveItems as $key=>$item ) {
                           
                                
                                print('<div class="row">');
                                    print('<div class="col-md-4">');
                                        print('<label >From *</label>');
                                        print('<input type="text" class="form-control nacenpDatePicker"  name="fromDate[]" value="'.$item->leave_from .'" placeholder="" required="required">');
                                    print('</div>');
                                    print('<div class="col-md-4">');
                                        print('<label >To *</label>');
                                        print('<input type="text" class="form-control nacenpDatePicker"  name="toDate[]" value="'.$item->leave_to.'" placeholder="" required="required">');
                                    print('</div>');
                                print('</div>');
                                print('<br>');
                                
                        }
                
                    ?>
                </div>
                <div class="form-group">        
                    <a id="addDateRow" name="addDateRow" class="btn btn-default" href="">Add</a>
                    <a id="removeDateRow" name="removeDateRow" class="btn btn-default" href="">Remove</a>
                </div>    
                
                <div class="form-group">
                    <label for="prefix">Prefix holidays *</label>
                    <select id="prefix" name="prefix">
                        <?php
                            $prefix = $leave->first_row()->prefix;
                            if($prefix == "N"){
                                print("<option selected value='N'>No</option>");
                                print("<option value='Y'>Yes</option>");
                            }
                            else{
                                print("<option value='N'>No</option>");
                                print("<option selected value='Y'>Yes</option>");
                            }
                        ?>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>


                <div class="form-group">
                    <label for="suffix">Suffix holidays *</label>
                    <select id="suffix" name="suffix">
                        <?php
                            $suffix = $leave->first_row()->suffix;
                            if($suffix == "N"){
                                print("<option selected value='N'>No</option>");
                                print("<option value='Y'>Yes</option>");
                            }
                            else{
                                print("<option value='N'>No</option>");
                                print("<option selected value='Y'>Yes</option>");
                            }
                        ?>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>

                <div class="form-group">
                    <label for="stationLeave">Station Leave *</label>
                    <select id="stationLeave" name="stationLeave">
                        <?php
                            $stationLeave = $leave->first_row()->station_leave;
                            if($stationLeave == "N"){
                                print("<option selected value='N'>No</option>");
                                print("<option value='Y'>Yes</option>");
                            }
                            else{
                                print("<option value='N'>No</option>");
                                print("<option selected value='Y'>Yes</option>");
                            }
                        ?>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>


                <button type="submit" style="float:right" id="updateLeaveSubmit" class="btn btn-primary">Update Leave Application</button>
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
<script src="scripts/ot/updateLeave.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>