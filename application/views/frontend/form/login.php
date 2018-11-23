<div class="breadcrumbs_area login_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="<?= base_url();?>"><i class="fa fa-home"></i></a>
                        <span><i class="fa fa-angle-right"></i></span>
                        <span> login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="account_area">
    <div class="container">
        <div class="row">
         <div class="col-lg-7 col-md-12 ml-auto mr-auto">
            <div class="account_form">
                <div class="login_title">
                    <h2>login</h2>
                </div>

                <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } else if($this->session->flashdata('error')){?>
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php }?>
                <div class="login_form login">
                    <form action="<?= base_url();?>login/auth" method="post">
                        <div class="login_input">
                            <label>Username<span>*</span></label>
                            <input type="text" name="username">
                        </div>
                        <div class="login_input">
                            <label>Passwords  <span>*</span></label>
                            <input type="password" name="password">
                        </div>
                        <div class="login_submit">
                            <button type="submit"><span>Login</span></button>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label>
                            <a href="#">Lost your password?</a>
                        </div>

                    </form>
                </div>
            </div>    
        </div>

    </div>
</div>
</div>

