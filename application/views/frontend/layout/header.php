<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GANTRI SHOP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontend/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/bundle.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/plugins.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/responsive.css">
    <script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>


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

    <!-- Add your site or application content here -->
    <!--header area start-->
    <div class="header_area ">

        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="top_left_sidebar">
                            <div class="contact_link">
                                <span>Call us toll free : <strong>(+1)866-540-3229</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header_right_info text-right">
                            <ul>
                                <?php if(!isset($_SESSION['logged_in_user'])) {?>
                                    <li class="log_in"><a href="<?= base_url();?>Login"><i class="fa fa-lock" aria-hidden="true"></i> Log in  </a></li>
                                    <li class="link_checkout"><a href="<?= base_url();?>Register"><i class="fa fa-check" aria-hidden="true"></i> Register </a></li>
                                <?php }else {?>
                                    <li class="my_account"><a href="<?= base_url();?>myaccount"><i class="fa fa-user" aria-hidden="true"></i> My account</a></li>
                                    <li class="my_account"><a href="<?= base_url();?>Logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel-->
        <div class="header_middle sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="<?= base_url();?>"><img src="<?php echo base_url();?>assets/frontend/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="search_form">
                            <form action="#">
                                <input placeholder="Enter your search..." type="text">
                                <div class="select_categories">
                                    <select name="select" id="categorie">
                                        <option selected value="0">All Categories</option>
                                        <?php 
                                        foreach ($kategori as $kat): ?>
                                            <option value="<?= $kat['kategori_id']; ?>"><?= $kat['kategori_nama']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="header_widget about_widget text-right">
                            <ul>
                                <?php if(isset($_SESSION['logged_in_user'])) {?>

                                    <li class="shopping_cart"><a href="#" title="View my shopping cart"><i class="fa fa-shopping-bag"></i></a> 
                                        <span class="cart__quantity"><?= $countcart;?></span>
                                        <div class="mini_cart cart_left">

                                         <?php 
                                         $total=0;
                                         foreach($getCartData as $cartdata):
                                            if($cartdata['keranjang_qty']>1){
                                                $bonus=($cartdata['keranjang_qty']/2);

                                            }else {
                                                $bonus=0;
                                            }
                                            $subtotal=$cartdata['produk_harga']*$cartdata['keranjang_qty'];
                                            $total +=$subtotal;

                                            ?>
                                            <div class="cart_item">
                                               <div class="cart_img">
                                                   <a href="#"><img src="<?php echo base_url();?>assets/images/<?= $cartdata['produk_gambar'];?>" alt=""></a>
                                               </div>
                                               <div class="cart_info">
                                                <a href="#"><?= $cartdata['produk_nama']; ?></a>
                                                <span class="cart_price"><?= "Rp. ".number_format($cartdata['produk_harga']); ?></span>
                                                <span class="quantity">Qty: <?= $cartdata['keranjang_qty'];?></span><br>
                                                <span class="quantity">Bonus: <?= floor($bonus);?></span>
                                            </div>
                                            <div class="cart_remove">
                                                <a title="Remove this item" href="#" data-target="#delCart<?= $cartdata['keranjang_id']; ?>" data-toggle="modal"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                    <div class="cart_price_line">
                                        <span> Total </span>
                                        <span class="prices">  <?= "Rp. ".number_format($total); ?> </span>
                                    </div>
                                    <div class="cart_button pt-20">
                                        <a href="<?= base_url();?>cart"> View Cart</a>
                                    </div>
                                    <div class="cart_button pt-20">
                                        <a href="<?= base_url();?>checkout"> Check out</a>
                                    </div>
                                </div>                                                                                                                                                               
                            </li>
                        <?php } else {}?>

                    </ul>
                    <!--mini cart-->

                </div>

            </div>
        </div>
    </div>
</div> 
<!--header bottom start--> 
<div class="header_bottom sticky-header">
   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="main_menu_inner">

               </div>
           </div>
       </div>
   </div> 
</div>  
</div>
<!--header area end-->


<?php
if(isset($_SESSION['logged_in_user'])){

    foreach($getCartData as $cartdata): ?>
        <div class="modal fade text-left" id="delCart<?= $cartdata['keranjang_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
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
                                        <input type="hidden" name="keranjang_id" value="<?php echo $cartdata['keranjang_id'];?>">
                                        <label class="text-center">Anda yakin ingin menghapus produk <b><?php echo $cartdata['produk_nama']; ?></b> ?</label>
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