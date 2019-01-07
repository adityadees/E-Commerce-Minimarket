<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>GANTRI SHOP</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/frontend/assets/img/favicon.png">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/bundle.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/plugins.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/frontend/assets/css/responsive.css">
  <script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
  <?php 

  function readmore($string){
   $string = substr($string, 0, 300); 
   $string = $string . "..."; 
   return $string; 
 }


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
   $kategori = $this->Mymod->ViewData('kategori');
   $getcart = $this->Mymod->GetDataJoin($jtable,$where);

   $countcart=$getcart->num_rows();
   $getCartData=$getcart->result_array();
 }else {}


 ?>

 <!--header area start-->
 <div class="header_area">

  <!--header top start-->
  <div class="header_top top_three">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="top_left_sidebar">
            <div class="contact_link link_three">
              <span>Call us toll free : <strong>(0711) 351816</strong></span>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="header_right_info right_info_three text-right">
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
  <div class="header_middle middle_three">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 ">
          <div class="logo">
            <a href="<?= base_url();?>"><img src="<?php echo base_url();?>assets/frontend/assets/img/logo/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="main_menu_inner menu_inner_three">
            <div class="main_menu menu_three  d-none d-lg-block text-center">
              <nav>
                <ul>
                  <li><a href="<?= base_url()?>">Home</a></li>
                  <li><a href="<?= base_url();?>produk">Produk</a></li>
                  <li><a href="<?= base_url();?>aboutus">About Us</a></li>
                  <li><a href="<?= base_url();?>contactus">Contact Us</a></li>
                </ul>
              </nav>
            </div>

            <div class="mobile-menu mobaile_menu_three d-lg-none">
              <nav>
               <ul>
                <li><a href="index-2.html">Home</a></li>
                <li><a href="index-2.html">Produk</a></li>
                <li><a href="index-2.html">About Us</a></li>
                <li><a href="index-2.html">Contact Us</a></li>
              </ul>
            </nav>
          </div>
        </div> 
      </div>
      <div class="col-lg-2">
        <div class="header_widget widget_three about_widget text-right">
          <ul>
           <?php if(isset($_SESSION['logged_in_user'])) {?>

            <li class="shopping_cart"><a href="#" title="View my shopping cart"><i class="fa fa-shopping-bag"></i></a> 
              <span class="cart__quantity"><?= $countcart;?></span>
              <div class="mini_cart cart_left">

                <?php
                $total=0;
                $ship=5000;
                $ptotal=0;
                $subtotal=0;
                $tgl=date('Y-m-d H:i:s');
                foreach($getCartData as $i):
                  if($i['keranjang_qty']>1 && $i['produk_up']=='yes'){
                    $bonus=($i['keranjang_qty']/2);

                  }else {
                    $bonus=0;
                  }
                  $data = [
                    'produk_kode' => $i['produk_kode'],
                    'promo_start <='=>$tgl,
                    'promo_end >'=>$tgl,
                  ];
                  $cek = $this->Mymod->CekDataRows('promo',$data);

                  if($cek->num_rows()>0){
                    $je=$cek->row_array();
                    $newprc=($i['produk_harga']-(($i['produk_harga']*$je['promo_diskon'])/100));
                    $ptotal=$newprc*$i['keranjang_qty'];
                  } else {
                    $ptotal=$i['produk_harga']*$i['keranjang_qty'];
                  }

                  $total +=$ptotal;
                  ?>
                  <div class="cart_item">
                   <div class="cart_img">
                     <a href="#"><img src="<?php echo base_url();?>assets/images/<?= $i['produk_gambar'];?>" alt=""></a>
                   </div>
                   <div class="cart_info">
                    <a href="#"><?= $i['produk_nama']; ?></a>
                    <?php
                    if($cek->num_rows()>0){ ?>
                      <span class="old_price">  <s><?= "Rp. ".number_format($i['produk_harga']);?></s>  </span><br>
                      <span class="cart_price"><?= "Rp. ".number_format($newprc);?> </span>

                    <?php   } else { ?>
                      <span class="cart_price"><?= "Rp. ".number_format($i['produk_harga']);?> </span>
                    <?php }?>
                    <span class="quantity">Qty: <?= $i['keranjang_qty'];?></span><br>
                    <span class="quantity">Bonus:    
                      <?= floor($bonus);
                      if($i['produk_up']=='yes'){ ?>

                        <sup title="Dapatkan bonus 1 produk setiap pembelian kelipatan 2">[*]</sup>

                        <?php } ?></span>
                      </div>
                      <div class="cart_remove">
                        <a title="Remove this item" href="#" data-target="#delCart<?= $i['keranjang_id']; ?>" data-toggle="modal"><i class="fa fa-times-circle"></i></a>
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

<div class="header_bottom bottom_three">
 <div class="container">
   <div class="row">
    <div class="col-lg-3 col-md-5">
      <div class="categories_menu categorie__three">
        <div class="categories_title ca_title_two">
          <h2 class="categori_toggle"><img src="<?php echo base_url();?>assets/frontend/assets/img/logo/categorie.png" alt=""> All categories</h2>
        </div>
        <div class="categories_menu_inner categorie_inner_three">
          <ul>
            <?php 
            foreach ($kategori as $kat): 
              $where=[
                't1.kategori_id'=>$kat['kategori_id'],
              ];
              $jtable=[
                'kategori' => 'kategori_id',
                'sub_kategori' => 'kategori_id',
              ];
              $cek = $this->Mymod->GetDataJoin($jtable,$where);

              if ($cek->num_rows()>0){ ?>


                <li><a href="#"><i class="fa fa-caret-right"></i> <?= $kat['kategori_nama']; ?> <i class="fa fa-angle-right"></i></a>
                  <ul class="categories_mega_menu">
                    <?php 
                    $table='sub_kategori';
                    $where=[
                      'kategori_id'=>$kat['kategori_id'],
                    ];
                    $gsubkat=$this->Mymod->ViewDataWhere($table,$where); 
                    foreach ($gsubkat as $subkat):
                      ?>
                      <li><a href="<?= base_url();?>produk/subkat/<?= $subkat['sk_id'];?>"><?= $subkat['sk_nama'];?></a>
                        <div class="categorie_sub_menu">
                          <ul>
                            <?php 
                            $table='list';
                            $where=[
                              'sk_id'=>$subkat['sk_id'],
                            ];
                            $glist=$this->Mymod->ViewDataWhere($table,$where); 
                            foreach ($glist as $list):
                              ?>
                              <li><a href="<?= base_url();?>produk/list/<?= $list['list_id'];?>"><?= $list['list_nama'];?></a></li>
                            <?php endforeach; ?>

                          </ul>
                        </div> 
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </li>

              <?php } else { ?> 

               <li><a href="#"><i class="fa fa-caret-right"></i> <?= $kat['kategori_nama']; ?></a></li> 

             <?php }endforeach; ?>
             <li id="cat_toggle" class="has-sub"></li>
           </ul>
         </div>
       </div> 
     </div>
     <div class="col-lg-9 col-md-7">
      <div class="search_form form_four">
        <form action="#">
          <input placeholder="Enter your search..." type="text">
          <div class="select_categories select_three">
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
</div>
</div> 
</div>  
</div>



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