<div class="banner_slide_show mb-40">
    <div class="banner_slider">
        <div class="slider_active owl-carousel">
            <?php foreach ($slider as $slide) :?>
                <div class="single_slider single_slider_three" style="background-image: url(<?= base_url()?>assets/images/<?= $slide['slider_gambar']; ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6 col-md-7 offset-md-5">
                                <div class="slider_content slider_c_four">
                                    <h1><?= $slide['slider_judul']; ?> </h1>
                                    <p><?= $slide['slider_ket']; ?></p>
                                </div>
                            </div>  
                        </div>
                    </div>   
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<div class="shipping_area mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single_shipping">
                    <div class="shippin_icone">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>Free shipping on orders over $100</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_shipping">
                    <div class="shippin_icone">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>30-day returns money back guarantee</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single_shipping box3">
                    <div class="shippin_icone">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <div class="shipping_content">
                        <h3>24/7 online support consultations</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="categorir_banner_four mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="categorie_banner_title">
                    <h2>shop by categories</h2>
                </div>
            </div>
            <div class="categorie_banner_active owl-carousel">
                <?php foreach ($kategori as $i) : ?>
                    <div class="col-lg-2">
                        <div class="single_banner_categorie">
                            <div class="categorie_thumb">
                                <a href="#"><img src="<?php echo base_url();?>assets/images/<?= $i['kategori_gambar']; ?>" alt="" ></a>
                                <div class="categorie_number">
                                    <span>(12) products</span>
                                </div>
                            </div>
                            <div class="categorie_name">
                                <a href="#"><?= $i['kategori_nama']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> 
        </div>
    </div>
</div>


<div class="product_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="product_inner">
                    <div class="top_title">
                        <h2> hot deals</h2>
                    </div>
                    <div class="row">

                        <div class="product_active owl-carousel">
                            <?php 
                            foreach ($promo as $prom ):
                                $tgl=date("Y-m-d h:i:s");
                                if($prom['promo_start']<$tgl){
                                    $newprc=($prom['produk_harga']-(($prom['produk_harga']*$prom['promo_diskon'])/100));
                                    ?>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a href="<?= base_url();?>produk/detail/<?= $prom['produk_kode']; ?>"><img src="<?php echo base_url();?>assets/images/<?= $prom['produk_gambar']; ?>" alt=""></a>
                                                <div class="product_discount">
                                                    <span><?= "-".$prom['promo_diskon']."%";?></span>
                                                </div>
                                                <div class="quick_view categorie_view">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box<?= $prom['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                                </div>

                                            </div>
                                            <div class="product_content">
                                                <div class="product_timing">
                                                    <div data-countdown="<?= $prom['promo_end'];?>"></div>
                                                </div>
                                                <div class="small_product_name">
                                                    <a title="<?= $prom['produk_nama']; ?>" href="<?= base_url();?>produk/detail/<?= $prom['produk_kode']; ?>"><?= $prom['produk_nama'];?></a>
                                                </div>
                                                <div class="small_product_price">
                                                    <span class="new_price"><?= "Rp. ".number_format($newprc);?> </span>
                                                    <span class="old_price">  <?= "Rp. ".number_format($prom['produk_harga']);?>  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="product_banner fix">
                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner fix">
                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner fix">
                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_banner b_three fix">
                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner4.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>                              
    </div> 

    <div class="featured_area mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="featured_produt feature_p_four mb-40">    
                        <div class="top_title">
                            <h2> Bestseller</h2>
                        </div>
                        <div class="f_active_four owl-carousel">
                            <div class="single_featured">
                                <div class="single_product single_p_four">
                                    <div class="product_thumb">
                                        <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/product/product20.jpg" alt=""></a>
                                        <div class="product_discount">
                                            <span>New</span>
                                        </div>
                                        <div class="product_action">
                                            <ul>
                                                <li><a href="#" title=" Add to Wishlist "><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#" title=" Add to Compare "><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="quick_view">
                                            <a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-search"></i></a>
                                        </div>

                                    </div>
                                    <div class="product_content">
                                        <div class="samll_product_ratting">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="small_product_name">
                                            <a title="Printed Summer Dress" href="single-product.html">Aliquam furniture</a>
                                        </div>
                                        <div class="small_product_price">
                                            <span class="new_price"> $140.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_featured">
                                <div class="single_product single_p_four">
                                    <div class="product_thumb">
                                        <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/product/product21.jpg" alt=""></a>
                                        <div class="product_discount">
                                            <span>New</span>
                                        </div>
                                        <div class="product_action">
                                            <ul>
                                                <li><a href="#" title=" Add to Wishlist "><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#" title=" Add to Compare "><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="quick_view">
                                            <a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-search"></i></a>
                                        </div>

                                    </div>
                                    <div class="product_content">
                                        <div class="samll_product_ratting">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="small_product_name">
                                            <a title="Printed Summer Dress" href="single-product.html">Aliquam lobortis</a>
                                        </div>
                                        <div class="small_product_price">
                                            <span class="new_price"> $140.00 </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="single_featured">
                                <div class="single_product single_p_four">
                                    <div class="product_thumb">
                                        <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/product/product22.jpg" alt=""></a>
                                        <div class="product_discount">
                                            <span>New</span>
                                        </div>
                                        <div class="product_action">
                                            <ul>
                                                <li><a href="#" title=" Add to Wishlist "><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#" title=" Add to Compare "><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="quick_view">
                                            <a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-search"></i></a>
                                        </div>

                                    </div>
                                    <div class="product_content">
                                        <div class="samll_product_ratting">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="small_product_name">
                                            <a title="Printed Summer Dress" href="single-product.html">hanbag elit</a>
                                        </div>
                                        <div class="small_product_price">
                                            <span class="new_price"> $130.00 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_featured">
                                <div class="single_product single_p_four">
                                    <div class="product_thumb">
                                        <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/product/product26.jpg" alt=""></a>
                                        <div class="product_discount">
                                            <span>New</span>
                                        </div>
                                        <div class="product_action">
                                            <ul>
                                                <li><a href="#" title=" Add to Wishlist "><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#" title=" Add to Compare "><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="quick_view">
                                            <a href="#" data-toggle="modal" data-target="#modal_box" title="Quick view"><i class="fa fa-search"></i></a>
                                        </div>

                                    </div>
                                    <div class="product_content">
                                        <div class="samll_product_ratting">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="small_product_name">
                                            <a title="Printed Summer Dress" href="single-product.html">Aliquam lobortis</a>
                                        </div>
                                        <div class="small_product_price">
                                            <span class="new_price"> $140.00 </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>    
                </div>


                <div class="col-lg-3 col-md-3 ">

                    <div class="brand_logo brand_logo_two">  
                        <div class="top_title mb-10">
                            <h2> logo brands</h2>
                        </div>
                        <div class="brand_active_two active_four owl-carousel">
                            <div class="single_brand_item single_i_four">
                                <div class="brand_itens_inner">
                                    <div class="single_brand single_b_four">
                                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand1.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_itens_inner">
                                    <div class="single_brand single_b_four">
                                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand1.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="brand_itens_inner">
                                    <div class="single_brand single_b_four">
                                        <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand1.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

         <!--    <div class="col-lg-6">
                <div class="featured_produt feature_p_four mb-40">    
                    <div class="top_title">
                        <h2> shop by <?= $shoprand['kategori_nama']; ?></h2>
                    </div>
                    <div class="f_active_four owl-carousel">

                     <?php 
                     $where = [
                        'kategori_id'=>$shoprand['kategori_id'],
                    ];
                    $get_subkat=$this->db->get_where('sub_kategori',$where)->result_array();

                    foreach ($get_subkat as $gsubkat) :
                        ?>
                        <?php 
                        $where = [
                            'sk_id'=>$gsubkat['sk_id'],
                        ];
                        $get_sublist=$this->db->get_where('list',$where)->result_array();

                        foreach ($get_sublist as $glist) :
                            ?>
                            <?php 
                            $where = [
                                'list_id'=>$glist['list_id']
                            ];
                            $get_prod=$this->db->get_where('produk',$where)->result_array();

                            foreach ($get_prod as $gprod) :
                                ?>
                                <div class="single_featured">
                                    <div class="product_thumb">
                                        <a href="<?= base_url();?>produk/detail/<?= $gprod['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$gprod['produk_gambar'];?>" alt="" width="200px" height="200px"></a>
                                        <div class="product_discount">
                                            <span>New</span>
                                        </div>
                                        <div class="product_action">
                                            <ul>
                                               <?php if(isset($_SESSION['logged_in_user'])) {
                                                ?>
                                                <li><button class="btn  btn-primary" type="submit"><i class="fa fa-shopping-cart"></i></button></li>

                                            <?php  } else {} ?>
                                        </ul>
                                    </div>
                                    <div class="quick_view">
                                        <a href="#" data-toggle="modal" data-target="#modal_box<?= $gprod['produk_kode']; ?>" title="Quick view"><i class="fa fa-search"></i></a>
                                    </div>

                                </div>
                                <div class="product_content">
                                    <div class="small_product_name">
                                        <a title="Printed Summer Dress" href="<?= base_url();?>produk/detail/<?= $gprod['produk_kode'];?>"><?= $gprod['produk_nama']; ?>
                                    </div>
                                    <div class="small_product_price">
                                        <span class="new_price"><?= "Rp. ".number_format($gprod['produk_harga']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>    
    </div> -->


</div>
</div>
</div>


<div class="static_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_static mb-30">
                    <div class="icone_static">
                        <i class="fa fa-coffee"></i>
                    </div>
                    <div class="content_static">
                        <h4>Free Delivery</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_static mb-30">
                    <div class="icone_static">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="content_static">
                        <h4>Big Saving</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_static mb-30">
                    <div class="icone_static">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="content_static">
                        <h4>Gift Vouchers</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_static">
                    <div class="icone_static">
                        <i class="fa fa-codepen"></i>
                    </div>
                    <div class="content_static">
                        <h4>Easy return</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_static">
                    <div class="icone_static">
                        <i class="fa fa-cut"></i>
                    </div>
                    <div class="content_static">
                        <h4>Save 20% When You</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_static">
                    <div class="icone_static">
                        <i class="fa fa-diamond"></i>
                    </div>
                    <div class="content_static">
                        <h4>Free Delivery Worldwide</h4>
                        <p>All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

