<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="<?= base_url();?>">Home</a></li>
                <li class="active">Product Details </li>
            </ul>
        </div>
    </div>
</div>
<form action="<?= base_url();?>frontendc/addtocart" method="post">
    <div class="product-details pt-75 pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-img">
                        <img class="zoompro" src="<?= base_url().'assets/images/'.$produk['produk_gambar'];?>" data-zoom-image="<?= base_url().'assets/images/'.$produk['produk_gambar'];?>" alt="zoom"/>
                        <span class="gpanel" id="m2">-15%</span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h4><?= $produk['produk_nama']; ?></h4>
                        <div class="rating-review">
                            <div class="pro-dec-rating">
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline theme-star"></i>
                                <i class="ion-android-star-outline"></i>
                            </div>
                            <div class="pro-dec-review">
                                <ul>
                                    <li>32 Reviews </li>
                                    <li> Add Your Reviews</li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-price-wrapper">
                            <span class="gpanel" id="m1"><?= "Rp. ".number_format($produk['produk_harga']); ?></span>
                            <span class="gpanel" id="m2"><?= "Rp. ".number_format($produk['produk_harga']-(($produk['produk_harga']*15)/100)); ?></span>
                            <span class="product-price-old gpanel" id="m2"><?= "Rp. ".number_format($produk['produk_harga']); ?></span>
                        </div>
                        <div class="in-stock">
                            <p><span></span></p>
                        </div>

                        <div class="quality-add-to-cart">
                            <div class="quality">
                                <label>Qty:</label>
                                <input  type="hidden" name="produk_kode" value="<?= $produk['produk_kode']; ?>">
                                <input class="cart-plus-minus-box" type="text" name="qty" value="1">
                            </div>
                            <div class="shop-list-cart-wishlist">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-handbag"></i> Add to Cart
                                </button>
                            </div>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Ukuran</label>
                                    <select class="select" name="ukuran" id="sectionChooser">
                                        <option value="m1">1 Papan</option>
                                        <option value="m2">2 Papan</option>
                                    </select>
                                </div>
                            </div>


                            <div class="pro-dec-social">
                                <ul>
                                    <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                                    <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                                    <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                                    <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details2">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $produk['produk_ket']; ?></p>
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="rattings-wrapper">
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>tayeb rayed</h3>
                                    <span>12:24</span>
                                    <span>9 March 2018</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                        </div>
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <i class="ion-star theme-color"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="ratting-author f-right">
                                    <h3>farhana shuvo</h3>
                                    <span>12:24</span>
                                    <span>9 March 2018</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                        </div>
                    </div>
                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                            <form action="#">
                                <div class="star-box">
                                    <h2>Rating:</h2>
                                    <div class="ratting-star">
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star theme-color"></i>
                                        <i class="ion-star"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Email" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style form-submit">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <input type="submit" value="add review">
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
<div class="product-area pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img alt="" src="assets/img/product/product-5.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="icon-heart"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="icon-handbag"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="icon-magnifier-add"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-center">
                    <h4>
                        <a href="product-details.html">Dutchman's Breeches </a>
                    </h4>
                    <div class="product-price-wrapper">
                        <span>$100.00</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/jquery-1.12.0.min.js"></script>

<script type="text/javascript">
    $('#sectionChooser').change(function(){
        var myID = $(this).val();
        $('.gpanel').each(function(){
            myID === $(this).attr('id') ? $(this).show() : $(this).hide();
        });
    });
</script>
