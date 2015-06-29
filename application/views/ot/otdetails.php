<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <?php $this->load->view("util/commoncss.php"); ?>
    <link href="bower_components/dropzone/dist/min/dropzone.min.css" type="text/css" rel="stylesheet" />
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
        <h2>My Details</h2>
        <hr>
    </div>
    <div class="container" style="margin-top: 10px">

        <div class="row">
            <form role="form" id="updateUserForm" method="post" action="admin/user/updateUserDetails">
                <div class="form-group" id='divDisplayName'>
                    <label for="displayName">Display Name *</label>
                    <input type="text" class="form-control" id="displayName" value="<?php echo $userDetails->first_row()->user_display_name ?>" name="displayName" placeholder="Display Name" required="required">
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <select id="sex" name="sex">
            
                        <?php
                            $sex = $userDetails->first_row()->user_sex;
                            if($sex == "M"){
                                print("<option value=''>Choose</option>");
                                print("<option selected value='M'>Male</option>");
                                print("<option value='F'>Female</option>");
                            }
                            else if($sex == "F"){
                                print("<option value=''>Choose</option>");
                                print("<option value='M'>Male</option>");
                                print("<option selected value='F'>Female</option>");
                            }
                            else{
                                print("<option selected value=''>Choose</option>");
                                print("<option value='M'>Male</option>");
                                print("<option value='F'>Female</option>");
                            }
                        ?>
                    </select>
                    <div id='name_error' class='error' style='display:none'><span style='color:red'>Error</span></div>
                </div>
                <div class="form-group" id='divContact'>
                    <label for="contact">Contact #</label>
                    <input type="text" class="form-control" id="contact" value="<?php echo $userDetails->first_row()->user_contact ?>" name="contact" placeholder="Contact Number">
                </div>
                <div class="form-group" id='divEContact'>
                    <label for="econtact">Emergency Contact #</label>
                    <input type="text" class="form-control" id="econtact" value="<?php echo $userDetails->first_row()->user_emergency_contact ?>" name="econtact" placeholder="Emergency Contact Number">
                </div>

                <div class="form-group" id='divAddress'>
                    <label for="address">Address </label>
                    <textarea class="form-control" rows="5" id="address"  name="address" placeholder="Enter address"><?php echo $userDetails->first_row()->user_address ?></textarea>
                    
                </div>

                <div class="form-group" id='divEAddress'>
                    <label for="eaddress">Emergency Address </label>
                    <textarea class="form-control" rows="5" id="eaddress"  name="eaddress" placeholder="Enter emergency contact address"><?php echo $userDetails->first_row()->user_emergency_address ?></textarea>
                    
                </div>
            
                
                <button type="submit" id="updateUserSubmit" class="btn btn-primary">Submit</button>
            </form>




        </div>

        <br>

    </div>



</div>
<?php $this->load->view("util/commonscripts.php"); ?>
<?php $this->load->view("util/footer");?>

</body>
</html>