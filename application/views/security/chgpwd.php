<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
</head>
<body>

<?php $this->load->view("util/navbar.php"); ?>


<div class="container" style="padding-top: 150px">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form id="chgPwdForm" name="chgPwdForm" class="well" method='post' action='admin/user/changePasswd'>
                <h3 class="form-signin-heading">Change password!</h3>
                <div class="margin-bottom">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" id="oldPasswd" name="oldPasswd" class="form-control" placeholder="Old Password">
                    </div>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input type="password" id="newPasswd" name="newPasswd" class="form-control" placeholder="New Password">
                    </div>
                    <br>
                    <button class="btn btn-large btn-primary" type="submit"><i class="fa fa-user fa-fw"></i> Change</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>




<?php $this->load->view("util/commonscripts");?>
<script src="scripts/cryptojs/rollups/sha1.js"></script>
<script src="scripts/security/chgpwd.js"></script>
<?php $this->load->view("util/footer");?>

</body>
</html>