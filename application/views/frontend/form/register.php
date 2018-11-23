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
                    <h2>Register</h2>
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
                <div class="login_form form_register">
                    <form action="<?= base_url();?>login/register" method="post">
                        <div class="login_input">
                            <label>Username<span>*</span></label>
                            <input type="text" name="username">
                        </div>
                        <div class="login_input">
                            <label>Passwords  <span>*</span></label>
                            <input type="password" name="password">
                        </div>
                        <div class="login_input">
                            <label>Re-Password  <span>*</span></label>
                            <input type="password" name="repassword">
                        </div>
                        <div class="login_input">
                            <label>Email  <span>*</span></label>
                            <input type="email" name="email">
                        </div>
                        <div class="login_input">
                            <label>Nama  <span>*</span></label>
                            <input type="text" name="nama">
                        </div>
                        <div class="login_input">
                            <label>Telepon  <span>*</span></label>
                            <input type="tel" name="tel">
                        </div>
                        <div class="login_input">
                            <label>Jenis Kelamin  <span>*</span></label><br>
                            <select name="jk" class="form-control">
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="login_input"><br><br>
                            <label>Alamat  <span>*</span></label>
                            <textarea name="alamat"></textarea>
                        </div>
                        <div class="login_submit">
                            <button type="submit"><span>Register</span></button>
                        </div>

                    </form>
                </div>
            </div>    
        </div>

    </div>
</div>
</div>

