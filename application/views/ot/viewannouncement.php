<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">


        <div class="row">
                <div class="" id='divMsg'>
                    <h3><?php echo $announcement->first_row()->announcement_title ?></h3>
                    <p class="well" id="message" name="message">
                        <?php echo $announcement->first_row()->announcement_msg ?>
                    </p>
                </div>

        </div>
        <div class="row">
            <ul>
            <?php
                foreach($attachments as $row){
                    print('<li><a target="_blank" href="'.$row->file_path.'/'.$row->file_name.'">'.$row->file_name.'</a></li>');
                }


            ?>
            </ul>
        </div>

        <br>




</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<?php $this->load->view("util/footer");?>

</body>
</html>