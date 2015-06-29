<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">

    <div id="calendar">

    </div>


    <div class="modal fade" id='vModal'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Class Details</h4>
                </div>
                <div class="modal-body">
                    <label id='title' style="display: block"></label>
                    <label id='speaker' style="display: block"></label>
                    <label id='timings' style="display: block"></label>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="scripts/ot/calendar.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>