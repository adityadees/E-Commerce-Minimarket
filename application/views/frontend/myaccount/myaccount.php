
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
                        </ul>
                    </div>    
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Dashboard </h3>
                            <?php if($belumbayar->num_rows()>0){ ?>
                                <div class="alert alert-danger" role="alert">
                                    Anda memiliki
                                    <span class="alert-link text-success">  
                                        <?php 
                                        echo $belumbayar->num_rows();
                                        ?> 
                                    </span>
                                    pesanan yang belum di bayar! <a href="<?= base_url();?>upload/pembayaran" class="alert-link text-primary">Bayar sekarang</a>
                                </div>
                            <?php } else {} ?>

                            <?php if($belumdikirim->num_rows()>0){ ?>
                                <div class="alert alert-info" role="alert">
                                    Anda memiliki 
                                    <span class="alert-link text-success">  
                                        <?php 
                                        echo $belumdikirim->num_rows();
                                        ?> 
                                    </span>
                                    pesanan yang belum di dikirim.
                                </div>
                            <?php } else {} ?>
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
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#selesai" role="tab" aria-controls="pills-contact" aria-selected="false">Selesai</a>
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
                                            <?php 
                                            if(isset($belumbayar)){
                                                foreach ($belumbayar->result_array() as $i) : ?>
                                                    <tr>
                                                        <td><a href="<?= base_url();?>invoice/cetak/<?= $i['pemesanan_kode']; ?>" target="_blank"><?= $i['pemesanan_kode']; ?></a></td>
                                                        <td class="text-center"><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                                                        <td class="text-center"><?= date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
                                                        <td class="text-center">
                                                            <a href="" class="btn btn-primary text-white">Bayar</a>
                                                            <a href="" class="btn btn-danger text-white" data-target="#batalOrders<?= $i['pemesanan_kode']; ?>" data-toggle="modal">Batal</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; } else {}?>
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
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php 
                                              if(isset($belumdikirim)){
                                                foreach ($belumdikirim->result_array() as $i) : ?>
                                                    <tr>
                                                        <td><a href="<?= base_url();?>invoice/cetak/<?= $i['pemesanan_kode']; ?>" target="_blank"><?= $i['pemesanan_kode']; ?></a></td>
                                                        <td><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                                                        <td><?= date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
                                                        <td><?php if($i['pembayaran_status']=='pending') {echo "
                                                        <span class='text-warning'>Waiting</span>";} else if($i['pembayaran_status']=='belumbayar'){echo "<span class='text-danger'>Belum Bayar</span>";} else {echo "<span class='text-primary'>Delivery</span>";}?></td>
                                                    </tr>
                                                <?php endforeach; } else {}?>
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
                                              <?php 
                                              if(isset($selesai)){
                                                foreach ($selesai->result_array() as $i) : ?>
                                                    <tr>
                                                        <td><a href="<?= base_url();?>invoice/cetak/<?= $i['pemesanan_kode']; ?>" target="_blank"><?= $i['pemesanan_kode']; ?></a></td>
                                                        <td><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                                                        <td><?= date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
                                                    </tr>
                                                <?php endforeach; } else {}?>
                                            </tbody>
                                        </table>
                                    </div>
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
                                       <a class="nav-link" data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Password</a>
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
    </div>
</div>
</div>
</div>
</div>          
</section>          

<?php foreach($belumbayar->result_array() as $i): ?>
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