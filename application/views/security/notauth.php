<html>
    <head>
        <base href="<?php echo $this->config->item('base_url') ?>" />
        <?php $this->load->view("util/commoncss.php"); ?>
    </head>
    <body>
    <div class="access-denied jumbotron">
        <h2>Access Denied</h2>
        <p>You can't get here! Please <a href="admin/user/login">sign in</a></p>
    </div>

    </body>
</html>