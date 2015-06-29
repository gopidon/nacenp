<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

<div class="container">
    <div id = "successMsg" class="alert alert-success" style="">
        <i class="fa fa-thumbs-o-up"></i> <strong>Success!</strong> Your feedback has been recorded.
    </div>
</div>

<?php $this->load->view("util/footer");?>

</body>
</html>