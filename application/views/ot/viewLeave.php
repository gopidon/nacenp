<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <link href="bower_components/dropzone/dist/min/dropzone.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>View Leave</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
                <div class="" id='divUser'>
                    <label for="user">Applicant</label>
                    <input readonly type="text" class="form-control" id="user" name="user" value="<?php echo $leave->first_row()->user_display_name ?>">
                </div>
                <br>
                <div class="" id='divStatus'>
                    <label for="status">Status</label>
                    <input readonly type="text" class="form-control" id="status" name="status" value="<?php echo $leave->first_row()->leaveStatus ?>">
                </div>
                <br>
                <div class="" id='divLeaveType'>
                    <label for="leaveType">Leave Type</label>
                    <input readonly type="text" class="form-control" id="leaveType" name="leaveType" value="<?php echo $leave->first_row()->type ?>">
                </div>
                <br>
                <div class="" id='divTitle'>
                    <label for="title">Subject *</label>
                    <input readonly type="text" class="form-control" id="title" name="title" value="<?php echo $leave->first_row()->leave_title ?>">
                </div>
                <br>
                <input type="hidden" name="id" id="id" value="<?php echo $leave->first_row()->leave_id ?>">
                <div class="" id='divMsg'>
                    <label for="message">Message *</label>
                    <textarea readonly class="form-control" rows="5" id="message" name="message"><?php echo $leave->first_row()->leave_message ?></textarea>

                </div>
                <br>
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
                                        print('<input readonly type="text" class="form-control"  name="fromDate[]" value="'.$item->leave_from .'" placeholder="" required="required">');
                                    print('</div>');
                                    print('<div class="col-md-4">');
                                        print('<label >To *</label>');
                                        print('<input readonly type="text" class="form-control"  name="toDate[]" value="'.$item->leave_to.'" placeholder="" required="required">');
                                    print('</div>');
                                print('</div>');
                                print('<br>');
                                
                        }
                
                    ?>
                </div>
                <br>
                <div class="">
                    <label for="prefix">Prefix holidays *</label>
                    <input readonly type="text" class="form-control" id="prefix" name="prefix" value="<?php echo $leave->first_row()->prefixRead ?>">

                </div>
                <br>
                <div class="">
                    <label for="suffix">Suffix holidays *</label>
                    <input readonly type="text" class="form-control" id="suffix" name="suffix" value="<?php echo $leave->first_row()->suffixRead ?>">

                </div>
                <br>
                <div class="">
                    <label for="stationLeave">Station Leave *</label>
                    <input readonly type="text" class="form-control" id="stationLeave" name="stationLeave" value="<?php echo $leave->first_row()->stationLeave ?>">

                </div>
                <br>
                <?php if ($this->session->userdata('user_access') == 'A'): ?>
                    <div class="">
                        <label for="comments">Approver Comments *</label>
                        <textarea type="text" class="form-control" rows="5" id="comments" name="comments"><?php echo $leave->first_row()->approver_comments ?></textarea>

                    </div>
                <?php else:  ?>
                    <div class="">
                        <label for="comments">Approver Comments *</label>
                        <textarea readonly type="text" class="form-control" rows="5" id="comments" name="comments"><?php echo $leave->first_row()->approver_comments ?></textarea>
                    </div>
                <?php endif ?>
                <br>
                <?php if ($this->session->userdata('user_access') == 'A'): ?>

                    <button type="submit" id="approveLeaveSubmit" class="btn btn-primary"><i class="fa fa-thumbs-up fa-lg"></i> Approve</button>
                    <button type="submit" id="rejectLeaveSubmit" class="btn btn-danger"><i class="fa fa-thumbs-down fa-lg"></i> Reject</button>
                <?php endif ?>

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
<script src="scripts/ot/viewLeave.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>