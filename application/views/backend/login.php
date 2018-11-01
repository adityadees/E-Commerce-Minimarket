
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Login Admin</title>
  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/backend/images/logo/new.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/backend/images/logo/new.png">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/vendors/css/forms/icheck/custom.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/backend/css/pages/login-register.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets/assets/css/style.css">
</head>
<body class="vertical-layout vertical-menu 1-column bg-cyan bg-lighten-2  menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="<?php echo base_url();?>assets/backend/images/logo/new.png" width="132px" height="142" alt="branding logo">
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="<?php echo base_url();?>loginadmin/auth" method="POST" novalidate>
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg" id="user-name" name="user_username" placeholder="Your Username"
                        required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg" id="user-password" name="user_password" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i>
                        </div>
                      </fieldset>
                      <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="">
                    <p class="text-center m-0">&copy; 2018<br></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/backend/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
</body>
</html>