<?php 
if(isset($_SESSION['logged_in_user'])){
    $ses_user=$_SESSION['user_id'];
    $join='user';
    $where=[
        't1.user_id'=>$ses_user,
    ];

    $jtable=[
        'keranjang' => 'produk_kode',
        'produk' => 'produk_kode'
    ];
    $getcart = $this->Mymod->GetDataJoin($jtable,$where);

    $countcart=$getcart->num_rows();
    $getCartData=$getcart->result_array();
}else {}
?>

<header class="header-area">
    <div class="header-top"  style="background: #e83e8c;;">
        <div class="container">
            <div class="border-bottom-0">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="welcome-area">
                            <p>
                                <?php if($this->session->flashdata('cartsuccess')){ ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Sukses!</strong> <?php echo $this->session->flashdata('cartsuccess'); ?>
                                    </div>
                                <?php } else if($this->session->flashdata('successlogin')){?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Welcome !</strong> <?php echo $this->session->flashdata('successlogin'); ?>
                                    </div>
                                <?php } else if($this->session->flashdata('error')){?>
                                    <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php }?>

                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="account-curr-lang-wrap f-right" >
                            <ul>
                                <?php if(!isset($_SESSION['logged_in_user'])) {?>
                                    <li><a href="<?= base_url();?>Login"><span style="color:white;">Login</span></a></li>
                                    <li><a href="<?= base_url();?>Register"><span style="color:white;">Register</span></a></li>
                                <?php }else {?>

                                    <li class="top-hover"><a href="#">My Account <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="<?= base_url();?>myaccount">my account</a></li>
                                            <li><a href="<?= base_url();?>Logout">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom transparent-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="logo">
                        <a href="<?= base_url();?>">
                            <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/logo/logos.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-6">
                    <div class="header-bottom-right">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?= base_url();?>"> Home </a></li>
                                    <li><a href="<?= base_url();?>produk"> Produk </a></li>
                                    <li><a href="<?= base_url();?>contactus"> Contact us </a></li>
                                </ul>
                            </nav>
                        </div>

                        <?php if(isset($_SESSION['logged_in_user'])) {?>
                            <div class="header-cart">
                                <a href="#">
                                    <div class="cart-icon">
                                        <i class="ion-bag"></i>
                                        <span class="count-style"><?= $countcart;?></span>
                                    </div>
                                    <div class="cart-text">
                                        <span class="digit">My Cart</span>
                                        <span>

                                            <?php
                                            $total=0;
                                            foreach($getCartData as $gcart):
                                              if($gcart['keranjang_ukuran']=='m2'){
                                                $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*15/100))*$gcart['keranjang_qty'];
                                                $subdsc=(($gcart['produk_harga']*15)/100)*$gcart['keranjang_qty'];
                                                $subongkir=0*$gcart['keranjang_qty'];
                                            }else {
                                                $subongkir=10000*$gcart['keranjang_qty'];
                                                if($gcart['keranjang_qty']>=3){
                                                    $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*5/100))*$gcart['keranjang_qty'];
                                                    $subtqty=(($gcart['produk_harga']*5)/100)*$gcart['keranjang_qty'];
                                                }else{
                                                    $subtotal=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                                }

                                            }
                                            $total +=$subtotal;
                                            
                                        endforeach; ?>
                                        <?= "Rp. ".number_format($total);?>

                                    </span>
                                </div>
                            </a>
                            <div class="shopping-cart-content" style="overflow-y: scroll;max-width:400px;max-height:500px;">
                                <ul>
                                    <?php
                                    $total=0;
                                    $tsubdsc=0;
                                    $tnodsc=0;
                                    $tqty=0;
                                    $subtqty=0;
                                    $tongkir=0;
                                    foreach($getCartData as $gcart):
                                        if($gcart['keranjang_ukuran']=='m2'){
                                            $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*15/100))*$gcart['keranjang_qty'];
                                            $subdsc=(($gcart['produk_harga']*15)/100)*$gcart['keranjang_qty'];
                                            $subongkir=0*$gcart['keranjang_qty'];
                                        }else {
                                            $subongkir=10000*$gcart['keranjang_qty'];
                                            if($gcart['keranjang_qty']>=3){
                                                $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*5/100))*$gcart['keranjang_qty'];
                                                $subtqty=(($gcart['produk_harga']*5)/100)*$gcart['keranjang_qty'];
                                            }else{
                                                $subtotal=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                            }

                                        }
                                        $total +=$subtotal;
                                        @$tsubdsc +=$subdsc;
                                        $tnodsc +=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                        $tqty +=$subtqty;
                                        $tongkir +=$subongkir;
                                        ?>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-img">
                                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/<?= $gcart['produk_gambar'];?>" style="width: 82px;height: 82px;"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="#"><?= $gcart['produk_nama']; ?> </a></h4>
                                                <h6>Qty: <?= $gcart['keranjang_qty']; ?></h6>
                                                <h6>Ukuran: <?= $gcart['keranjang_ukuran']; ?></h6>
                                                <span><?= "Rp. ".number_format($subtotal); ?></span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#" data-target="#delCart<?= $gcart['keranjang_id']; ?>" data-toggle="modal"><i class="ion ion-close"></i></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>Total : <span class="shop-total"><?= "Rp. ".number_format($total);?></span></h4>
                                </div>
                                <div class="shopping-cart-btn">
                                    <a href="<?= base_url();?>cart">view cart</a>
                                    <a href="<?= base_url();?>checkout">checkout</a>
                                </div>
                            </div>
                        </div>
                    <?php } else {}?>

                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="mobile-menu">
                <nav id="mobile-menu-active">
                    <ul class="menu-overflow">
                        <li><a href="<?= base_url();?>"> Home </a></li>
                        <li><a href="<?= base_url();?>produk"> Produk </a></li>
                        <li><a href="<?= base_url();?>contactus"> Contact us </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</header>


<?php
if(isset($_SESSION['logged_in_user'])){

 foreach($getCartData as $gcart): ?>
    <div class="modal fade text-left" id="delCart<?= $gcart['keranjang_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url()?>frontendc/delete_cart" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="keranjang_id" value="<?php echo $gcart['keranjang_id'];?>">
                                    <label class="text-center">Anda yakin ingin menghapus produk <b><?php echo $gcart['produk_nama']; ?></b> ?</label>
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
    <?php endforeach; }?>