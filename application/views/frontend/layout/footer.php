  
<!--newsletter area start-->
<div class="newsletter_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6">
                <div class="footer_logo">
                    <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/logo/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="social_icone">
                    <ul>
                        <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="feed"><i class="fa fa-feed"></i></a></li>
                        <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="newslatter_inner fix">
                    <h4>send Newsletters</h4>
                    <form action="#">
                        <input placeholder="enter your email" type="text">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--newsletter area end-->

<!--footer area start-->
<div class="footer_area">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single_footer">
                        <h4>store information</h4>
                        
                        <ul>
                            <li><i class="fa fa-home"></i>KPRI GUKA SMK N 3 PALEMBANG <br>JL SRIJAYA NEGARA BUKIT BESAR
                         </li>
                         <li><i class="fa fa-phone"></i> (+62) 858-883–43527</li>
                         <li><a href="#"><i class="fa fa-envelope-square"></i> demo@posthemes.com</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single_footer">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-circle"></i> Our Blog</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> About Our Shop</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Secure Shopping</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Delivery infomation</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Store Locations</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single_footer">
                    <h4>My account</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-circle"></i> My orders</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> About Us</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Contact</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Shopping cart</a></li>
                        <li><a href="#"><i class="fa fa-circle"></i> Checkout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single_footer">
                    <h4>instagram</h4>
                    <div class="instagram_img">
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram1.jpg" alt=""></a>
                        </div>
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram2.jpg" alt=""></a>
                        </div>
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram3.jpg" alt=""></a>
                        </div>
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram4.jpg" alt=""></a>
                        </div>
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram5.jpg" alt=""></a>
                        </div>
                        <div class="single_instagram_img">
                            <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/instagram/instagram6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="footer_tags">

                <a href="#" title="More about Accessories"> Accessories </a>
                
            </div>
        </div>
    </div>

    <div class="copyright_area">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="widget_copyright">
                    <p>copyright &copy; 2018 . all right reserved</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="payment">
                    <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/visha/payment.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--footer area end-->
<!--footer area end-->

<?php if(isset($produk)){
   $tgl=date("Y-m-d h:i:s");
   foreach($produk as $i) :
       $jtable=[
        'promo' => 'produk_kode',
        'produk' => 'produk_kode'
    ];
    $where=[
        't1.promo_start <='=>$tgl,
        't1.promo_end >'=>$tgl,
        't2.produk_kode'=>$i['produk_kode'],
    ];
    $promo = $this->Mymod->GetDataJoin($jtable,$where);
    $gprom = $promo->row_array();
    $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
    ?> 

    <div class="modal fade" id="modal_box<?= $i['produk_kode']; ?>" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">  
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="<?= base_url().'assets/images/'.$i['produk_gambar'];?>" alt=""></a>    
                                            <?php if($promo->row_array() > 0 ) {?>
                                                <div class="product_discount">
                                                    <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                                </div>
                                            <?php } else {} ?>
                                        </div>
                                    </div>
                                </div>   
                            </div>  
                        </div> 
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2><?= $i['produk_nama']; ?></h2> 
                                </div>
                                <div class="modal_price mb-10">

                                    <?php 
                                    if($promo->row_array() > 0 ) {?>
                                        <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                        <span class="old_price"> <?= "Rp. ".number_format($i['produk_harga']); ?> </span>
                                    <?php } else { ?>

                                        <span class="new_price"> <?= "Rp. ".number_format($i['produk_harga']); ?> </span>   
                                    <?php }?> 
                                </div>
                                <div class="modal_add_to_cart mb-15">



                                    <form action="<?= base_url();?>frontendc/addtocart" method="POST" name="cartForm">
                                        <input min="1" max="100" value="1" type="number">
                                        <?php if(isset($_SESSION['logged_in_user'])) {
                                            ?>
                                            <input type="hidden" name="produk_kode" value="<?= $i['produk_kode'];?>">
                                            <button type="submit" class="btn btn-primary">add to cart</button>
                                        <?php } else { ?>
                                            <button type="submit" disabled="disabled"  class="btn btn-primary">add to cart</button>
                                            <span class="text-danger">*Anda harus login terlebih dahulu</span>
                                            <?php 
                                        } 
                                        ?>

                                    </form>
                                </div>   
                                <div class="modal_description mb-15">
                                    <p><?= readmore($i['produk_ket']); ?></p>
                                </div> 
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>    
                                </div>      
                            </div>    
                        </div>    
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div> 
<?php endforeach; } else {}?>



<script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/plugins.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/main.js"></script>
</body>

</html>
