<div class="breadcrumbs_area contact_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="index.html"><i class="fa fa-home"></i></a>
                        <span><i class="fa fa-angle-right"></i></span>
                        <span> my account</span>
                    </div>
                    <div class="breadcrumb_title">
                        <h2>my account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main_content_area my_account">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                            <li><a href="#downloads" data-toggle="tab" class="nav-link">Personal Information</a></li>
                            <li> <a href="#orders" data-toggle="tab" class="nav-link">My Orders</a></li>
                            <li> <a data-toggle="collapse" class="nav-link" data-parent="#faq" href="#shop-catigory-1">My Reviews <i class="ion-ios-arrow-down"></i></a>
                                <ul id="shop-catigory-1" class="panel-collapse collapse">
                                    <li><a href="#" class="nav-link">Reviews Product</a></li>
                                    <li><a href="#" class="nav-link">Testimoni</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                           <div class="ml-auto mr-auto col-lg-9">
                            <div class="checkout-wrapper">
                                <div id="faq" class="panel-group">

                                    <ul class="nav nav-pills nav-tabs nav-fill mb-3" id="pills-tab" role="tablist">
                                      <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#belumbayar" role="tab" aria-controls="pills-home" aria-selected="true">Belum Bayar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#belumdikirim" role="tab" aria-controls="pills-profile" aria-selected="false">Belum Dikirim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#belumditerima" role="tab" aria-controls="pills-contact" aria-selected="false">Belum Diterima</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#selesai" role="tab" aria-controls="pills-contact" aria-selected="false">Selesai</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#batal" role="tab" aria-controls="pills-contact" aria-selected="false">Batal</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                  <div class="tab-pane fade show active" id="belumbayar" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th class="text-center">Total Biaya</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($waiting as $i) : ?>
                                                <tr>
                                                    <td><?= $i['pemesanan_kode']; ?></td>
                                                    <td class="text-center"><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                                                    <td class="text-center"><?= date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
                                                    <td class="text-center">
                                                        <a href="" class="btn btn-primary text-white">Bayar</a>
                                                        <a href="" class="btn btn-danger text-white" data-target="#batalOrders<?= $i['pemesanan_kode']; ?>" data-toggle="modal">Batal</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="belumdikirim" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Total Biaya</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="belumditerima" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Total Biaya</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Total Biaya</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="pills-contact-tab">Batal</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="downloads">
                <div class="col-12 ">
                    <div class="product_details_tab_inner"> 
                        <div class="product_details_tab_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="nav-link active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Edit your account information</a>
                                </li>
                                <li>
                                   <a class="nav-link" data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Data sheet</a>
                               </li>
                           </ul>
                       </div> 
                       <div class="tab-content product_details_content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" >
                            <div class="product_d_tab_content">
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
                                            <div class="billing-btn"><br>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>    
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_tab_content">
                               <form method="POST" action="<?= base_url();?>frontendc/update_password">
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
                                            <div class="billing-btn"><br>
                                                <button type="submit" class="btn btn-primary">Continue</button>
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
    <div class="tab-pane" id="address">
     <p>The following addresses will be used on the checkout page by default.</p>
     <h4 class="billing-address">Billing address</h4>
     <a href="#" class="view">Edit</a>
     <p><strong>Bobby Jackson</strong></p>
     <address>
        House #15<br>
        Road #1<br>
        Block #C <br>
        Banasree <br>
        Dhaka <br>
        1212
    </address>
    <p>Bangladesh</p>   
</div>
<div class="tab-pane fade" id="account-details">
    <h3>Account details </h3>
    <div class="login">
        <div class="login_form_container">
            <div class="account_login_form">
                <form action="#">
                    <p>Already have an account? <a href="#">Log in instead!</a></p>
                    <div class="input-radio">
                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                    </div> <br>
                    <label>First Name</label>
                    <input type="text" name="first-name">
                    <label>Last Name</label>
                    <input type="text" name="last-name">
                    <label>Email</label>
                    <input type="text" name="email-name">
                    <label>Password</label>
                    <input type="password" name="user-password">
                    <label>Birthdate</label>
                    <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">
                    <span class="example">
                      (E.g.: 05/31/1970)
                  </span>
                  <br>
                  <span class="custom_checkbox">
                    <input type="checkbox" value="1" name="optin">
                    <label>Receive offers from our partners</label>
                </span>
                <br>
                <span class="custom_checkbox">
                    <input type="checkbox" value="1" name="newsletter">
                    <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                </span>
                <div class="save_button primary_btn default_button">
                    <a href="#">Save</a>
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
</div>          
</section>          

<?php foreach($waiting as $i): ?>
    <div class="modal fade text-left" id="batalOrders<?= $i['pemesanan_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url()?>frontendc/batal_pemesanan" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="pemesanan_kode" value="<?php echo $i['pemesanan_kode'];?>">
                                    <label class="text-center">Anda yakin ingin membatalkan pesanan <b><?php echo $i['pemesanan_kode']; ?></b> ?</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>