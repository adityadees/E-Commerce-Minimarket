        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?= base_url();?>">Home</a></li>
                        <li class="active"> Register </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-register-area pt-70 pb-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div class="login-form-container">

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
                                    <div class="login-register-form">
                                        <form action="<?= base_url();?>login/register" method="post">
                                            <input type="text" name="username" placeholder="Username">
                                            <input type="password" name="password" placeholder="Password">
                                            <input type="password" name="repassword" placeholder="Repassword">
                                            <input type="email" name="email" placeholder="Email">
                                            <input type="text" name="nama" placeholder="Nama">
                                            <input type="tel" name="tel" placeholder="Telepon">

                                            <div class="billing-select">
                                                <select name="jk">
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="billing-select">
                                                <input type="text" name="alamat" placeholder="Alamat">
                                            </div>
                                            <div class="button-box">
                                                <button type="submit"><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>