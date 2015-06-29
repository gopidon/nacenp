<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("util/commoncss");?>
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" style="margin-top:0px" href="#"><img height="30" width="30" src="images/cbec.jpg"/></a>
          <a class="navbar-brand">NACEN Officer Trainee Portal</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


    <div class="container" style="padding-top: 150px">
      <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <form id="loginForm" name="loginForm" class="well" method='post' action='admin/user/validateUser'>
        <h3 class="form-signin-heading">Please sign in</h3>
        <div class="margin-bottom">
        <div class="input-group margin-bottom-sm">
          <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
          <input type="text" id="userName" name="userName" class="form-control" placeholder="login name">
        </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
         <input type="password" id="password" name="password" class="form-control" placeholder="password">
        </div>
        <br>
        <button class="btn btn-large btn-primary" type="submit"><i class="fa fa-user fa-fw"></i> Sign in</button>
        </div>
      </form>
      </div>
      <div class="col-md-4"></div>
     </div>
  </div>
  
      
   

  <?php $this->load->view("util/commonscripts");?>
  <script src="scripts/cryptojs/rollups/sha1.js"></script>
  <script src="scripts/security/login.js"></script>
  <?php $this->load->view("util/footer");?>  
    
  </body>
</html>
