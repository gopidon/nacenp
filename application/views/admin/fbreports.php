<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <style>
        @media print {
            #content #relevance #presentation  {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div class="page-header">
        <h2>Feedback Report</h2>
        <hr>
    </div>
    <div style="margin-top: 10px">
        <div class="row">
            <input type="hidden" id="csrfTokenName" value="<?php echo $this->security->get_csrf_token_name(); ?>">
            <input type="hidden" id="csrfTokenVal" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="col-md-4">
                <label for="batchId">Batch *: </label>
                <select id='batchId' required>
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
            <div class="col-md-4">
                <label for="sessionId">Class session *: </label>
                <select id='sessionId' name="sessionId" required>
                    <option value="-1" selected>Select</option>
                    <?php
                    foreach($sessions as $row) {
                        print("<option value=" . $row->session_id . ">" . $row->session_name . "</option>");
                    }
                    ?>
                </select>
            </div>

        </div>
        <br>
        <h3>A. Duration of the programme</h3>
        <div class="row" style="margin-top:20px">

                <div id="durationChart" style="width: 400px; height: 400px; margin-left:30px" class='col-md-4 well'>
                    <div id='durationLoading' style='display:none'>
                        <img src='images/loading.gif'/>
                    </div>
                </div>


        </div>
        <h3>B. Evaluation of the training programme</h3>
        <div class="row" style="margin-top:20px">


                <div id="content" class='col-md-5 well'>
                    <div>
                        <strong>Content</strong>
                    </div>
                    <div id="contentChart" style="width: 400px; height: 400px;" >
                        <div id='contentLoading' style='display:none'>
                            <img src='images/loading.gif'/>
                        </div>

                    </div>
                </div>
                <div id="presentation" style="margin-left:10px" class='col-md-5 well'>
                    <div>
                        <strong>Presentation</strong>
                    </div>
                    <div id="presChart" style="width: 400px; height: 400px;" >
                        <div id='presLoading' style='display:none'>
                            <img src='images/loading.gif'/>
                        </div>
                    </div>
                </div>
                <div  id="relevance" class='col-md-5 well'>
                    <div>
                        <strong>Relevance</strong>
                    </div>
                    <div id="relChart" style="width: 400px; height: 400px;">
                        <div id='relLoading' style='display:none'>
                            <img src='images/loading.gif'/>
                        </div>
                    </div>
                </div>




        </div>

        <h3>C. Overall assessment and usefulness</h3>
        <div class="row" style="margin-top:20px">


            <div id="class" class='col-md-5 well'>
                <div>
                    <strong>Class Sessions</strong>
                </div>
                <div id="classChart" style="width: 400px; height: 400px;" >
                    <div id='classLoading' style='display:none'>
                        <img src='images/loading.gif'/>
                    </div>

                </div>
            </div>
            <div id="reading" style="margin-left:10px" class='col-md-5 well'>
                <div>
                    <strong>Reading Materials</strong>
                </div>
                <div id="readingChart" style="width: 400px; height: 400px;" >
                    <div id='readingLoading' style='display:none'>
                        <img src='images/loading.gif'/>
                    </div>
                </div>
            </div>
            <div  id="interactive" class='col-md-5 well'>
                <div>
                    <strong>Interactive Sessions</strong>
                </div>
                <div id="interactiveChart" style="width: 400px; height: 400px;">
                    <div id='interactiveLoading' style='display:none'>
                        <img src='images/loading.gif'/>
                    </div>
                </div>
            </div>
            <div  id="visual" style="margin-left:10px" class='col-md-5 well'>
                <div>
                    <strong>Visual Aids</strong>
                </div>
                <div id="visualChart" style="width: 400px; height: 400px;">
                    <div id='visualLoading' style='display:none'>
                        <img src='images/loading.gif'/>
                    </div>
                </div>
            </div>




        </div>
        <h3>Comments<h3>
        <hr>    
        <div id="comments" class="row" style="margin-top:20px">

        </div>       
        <h3>Defaulters</h3>
        <hr>
        <div id="defaulters" class="row" style="margin-top:20px">

        </div>    

    </div>

</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<!--[if lte IE 8]><script type="text/javascript" language="javascript" src="scripts/flot2/excanvas.min.js"></script><![endif]-->

<script type="text/javascript" language="javascript" src="scripts/flot2/jquery.flot.min.js"></script>
<script type="text/javascript" language="javascript" src="scripts/flot2/jquery.flot.time.min.js"></script>
<script type="text/javascript" language="javascript" src="scripts/flot2/jquery.flot.pie.min.js"></script>

<script src="scripts/admin/fbreports.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>