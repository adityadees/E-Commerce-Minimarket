        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Account </li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="checkout-area pb-55 pt-75">
            <div class="container">
                <div class="row">


                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">My Account</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <li><a href="<?= base_url();?>myaccount">Dashboard</a></li>
                                        <li><a href="<?= base_url();?>myprofil">Personal Information</a></li>
                                        <li><a href="<?= base_url();?>myorders">My Orders</a></li>
                                        <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">My Reviews <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-1" class="panel-collapse collapse">
                                                <li><a href="#">Reviews Product</a></li>
                                                <li><a href="#">Testimoni</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <form method="POST" action="<?= base_url();?>frontendc/update_user">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h4>My Account Information</h4>
                                                        <h5>Your Personal Details</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Username</label>
                                                                <input type="text" value="<?= $user['user_username'];?>" readonly>
                                                                <span class="text-danger"> * Username tidak dapat diganti</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" name="user_nama" value="<?= $user['user_nama']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Telephone</label>
                                                                <input type="text" name="user_tel" value="<?= $user['user_tel']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Email</label>
                                                                <input type="email" name="user_email" value="<?= $user['user_email']; ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Alamat</label>
                                                                <input type="text" name="user_alamat" value="<?= $user['user_alamat']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <form method="POST" action="<?= base_url();?>frontendc/update_password">
                                        <div id="my-account-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="billing-information-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h4>Change Password</h4>
                                                        <h5>Your Password</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Password</label>
                                                                <input type="password" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Password Confirm</label>
                                                                <input type="password" name="repassword">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
