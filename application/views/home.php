<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view("util/commoncss.php"); ?>
        <link href="bower_components/introloader/dist/css/introLoader.min.css" rel="stylesheet">
    </head>
<body>

<?php $this->load->view("util/navbar.php"); ?>

    <div class="container">
        <div class="row">
            <div class="page-header">
                <h2>Notice Board</h2>
            </div>
        </div>
        <div class="row">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" id="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>
        <br>
        <div id="announcements" class="row">

        </div>
        <a class="load-more" href="">Load more</a>

        <div id="spinner" style="height:100px; width:100px;top:50%; left:50%;z-index: 100">

        </div>
    </div>


</div>
    <?php $this->load->view("util/commonscripts.php"); ?>
    <script src="scripts/home.js"></script>
    <script src="bower_components/introloader/dist/jquery.introLoader.pack.min.js"></script>
    <?php $this->load->view("util/footer");?>
   
</body>
</html>