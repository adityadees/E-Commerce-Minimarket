        <div class="product-area pt-40 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Featured Products</h3>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div id="tab1" class="tab-pane active">
                        <div class="featured-product-active owl-carousel product-nav">
                            <?php foreach ($produk as $prod) : ?>
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="<?= base_url().'produk/detail/'.$prod['produk_kode']; ?>">
                                            <img alt="" src="<?= base_url().'assets/images/'.$prod['produk_gambar'];?>">
                                        </a>
                                        <div class="product-action">
                                            <a class="action-compare" href="#" data-target="#modalProd<?= $prod['produk_kode']; ?>" data-toggle="modal" title="Quick View">
                                                <i class="icon-magnifier-add"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content text-center">
                                        <h4>
                                            <a href="<?= base_url().'produk/detail/'.$prod['produk_kode']; ?>"><?= $prod['produk_nama']; ?></a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials-area bg-img pt-120 pb-115" style="background-image:url(<?= base_url();?>assets/images/bg-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto col-12">
                        <div class="testimonial-active owl-carousel">
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/testi.png">
                                </div>
                                <p>When a beautiful design is combined with powerful technology,<br> it truly is an artwork. I love how my website operates and looks with this theme. <br>Thank you for the awesome product. </p>
                                <h4>Samia Robiul</h4>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/testi.png">
                                </div>
                                <p>“ Lorem ipsum dolor sit, con adipisicing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <br>exercitati ullamco laboris  ” </p>
                                <h4> Tayeb Rayed</h4>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/testi.png">
                                </div>
                                <p>When a beautiful design is combined with powerful ,<br> technology it truly is an artwork. I love how my website operates and looks with this  <br>theme. Thank you for the awesome product. </p>
                                <h4>Hamim Ahamed</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="best-selling-product pt-70 pb-75 gray-bg">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-gray">Best Selling Products</h3>
                    </div>
                </div>
                <div class="best-selling-wrap">
                    <div class="best-selling-active owl-carousel product-nav">
                        <div class="single-best-selling">
                            <div class="row">
                                <div class="col-lg-6 col-xl-5 col-md-6">
                                    <div class="single-best-img">
                                        <img class="tilter" src="<?php echo base_url();?>assets/frontend/assets/img/banner/deal-1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7 col-md-6">
                                    <div class="deals-content text-center deal-mrg">
                                        <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/deals-2.png">
                                        <h2>Hot Deal ! Sale Up To <span>20% Off</span></h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <div class="timer timer-style">
                                            <div data-countdown="2018/09/01"></div>
                                        </div>
                                        <div class="deals-btn">
                                            <a href="#">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-best-selling">
                            <div class="row">
                                <div class="col-lg-6 col-xl-5 col-md-6">
                                    <div class="single-best-img">
                                        <img class="tilter" src="<?php echo base_url();?>assets/frontend/assets/img/banner/deal-1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7 col-md-6">
                                    <div class="deals-content text-center deal-mrg">
                                        <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/deals-2.png">
                                        <h2>Hot Deal ! Sale Up To <span>20% Off</span></h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                                        <div class="timer timer-style">
                                            <div data-countdown="2018/09/01"></div>
                                        </div>
                                        <div class="deals-btn">
                                            <a href="#">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pt-70 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Hot Flower</h3>
                    </div>
                </div>
                <div class="featured-product-active hot-flower owl-carousel product-nav">
                    <?php foreach ($produk as $prod) : ?>
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="<?= base_url().'produk/detail/'.$prod['produk_kode']; ?>">
                                    <img alt="" src="<?= base_url().'assets/images/'.$prod['produk_gambar'];?>">
                                </a>
                                <div class="product-action">
                                    <a class="action-compare" href="#" data-target="#modalProd<?= $prod['produk_kode']; ?>" data-toggle="modal" title="Quick View">
                                        <i class="icon-magnifier-add"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h4>
                                    <a href="<?= base_url().'produk/detail/'.$prod['produk_kode']; ?>"><?= $prod['produk_nama']; ?></a>
                                </h4>
                                <div class="product-price-wrapper">
                                    <span><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        

        <?php foreach($produk as $prod) : ?>
            <div class="modal fade" id="modalProd<?= $prod['produk_kode']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url();?>frontendc/addtocart" method="POST" name="cartForm">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <span class="gpanel btn btn-primary" id="m2">-15%</span>
                                        <div class="tab-content">
                                            <div id="pro-1" class="tab-pane fade show active">
                                                <img src="<?= base_url().'assets/images/'.$prod['produk_gambar']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="modal-pro-content">
                                            <h3><?= $prod['produk_nama']; ?></h3>
                                            <input type="hidden" name="produk_kode" value="<?= $prod['produk_kode'];?>">
                                            <div class="product-price-wrapper">
                                                <span class="gpanel" id="m1"><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                                <span class="gpanel" id="m2"><?= "Rp. ".number_format($prod['produk_harga']-(($prod['produk_harga']*15)/100)); ?></span>
                                                <span class="product-price-old gpanel" id="m2"><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                            </div>
                                            <p><?= $prod['produk_ket']; ?></p>    
                                            <div class="quick-view-select">
                                                <div class="select-option-part">
                                                    <label>Ukuran</label>
                                                    <select class="select sectionChooser" name="ukuran" data-id="<?= $prod['produk_kode']; ?>" id="sectionChooser<?= $prod['produk_kode']; ?>">
                                                        <option value="m1">1 Papan</option>
                                                        <option value="m2">2 Papan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                                                </div>
                                                <button type="submit" >Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

<script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/jquery-1.12.0.min.js"></script>
        
        <script type="text/javascript">
          $('.select').change(function() {
              var myID = $(this).val();
              var dataID = $(this).attr('data-id');
              $('#modalProd'+dataID+' .gpanel').each(function() {
                 (myID === $(this).attr('id')) ? $(this).show() : $(this).hide();
             });
          });
      </script>