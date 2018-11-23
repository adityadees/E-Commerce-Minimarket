
<!--baner slide show-->
<div class="banner_slide_show mb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle"><img src="<?php echo base_url();?>assets/frontend/assets/img/logo/categorie.png" alt="">All categories</h2>
                    </div>
                    <div class="categories_menu_inner">
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
                                                <li><a href="#"><?= $subkat['sk_nama'];?></a>
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
                                                                <li><a href="#"><?= $list['list_nama'];?></a></li>
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

                             <li id="cat_toggle" class="has-sub"><a href="#"><i class="fa fa-caret-right"></i> More Categories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Computer - Laptop</a></li>
                                </ul>   
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <div class="banner_slider">
                    <div class="slider_active owl-carousel">

                     <?php foreach ($slider as $slide) :?>
                        <div class="single_slider" style="background-image: url(<?= base_url()?>assets/images/<?= $slide['slider_gambar']; ?>)">
                            <div class="row">
                                <div class="col-md-7 offset-md-2">
                                    <div class="slider_content">
                                        <h1><?= $slide['slider_judul']; ?> </h1>
                                        <div class="slider_desc">
                                            <p><?= $slide['slider_ket']; ?></p>
                                        </div>
                                        <div class="slider_button">
                                            <a href="#">shop it! </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="top_sellers">
                <div class="top_title">
                    <h2> Top sellers</h2>
                </div>
                <div class="small_product_active owl-carousel">
                    <div class="small_product_item">
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart13.jpg" alt=""></a>
                                <div class="product_discount">
                                    <span>-10%</span>
                                </div>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Printed Summer</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                    <span class="old_price">  $30.50  </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart1.jpg" alt=""></a>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Short T-shirt</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart2.jpg" alt=""></a>
                                <div class="product_discount">
                                    <span>-10%</span>
                                </div>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Printed Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                    <span class="old_price">  $30.50  </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart3.jpg" alt=""></a>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Summer Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="small_product_item">
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart4.jpg" alt=""></a>
                                <div class="product_discount">
                                    <span>-10%</span>
                                </div>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Printed  Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                    <span class="old_price">  $30.50  </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart10.jpg" alt=""></a>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Printed Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart8.jpg" alt=""></a>
                                <div class="product_discount">
                                    <span>-10%</span>
                                </div>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html"> Summer Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                    <span class="old_price">  $30.50  </span>
                                </div>
                            </div>
                        </div>
                        <div class="small_product">
                            <div class="small_product_thumb">
                                <a href="single-product.html"><img src="<?php echo base_url();?>assets/frontend/assets/img/cart/cart7.jpg" alt=""></a>
                            </div>
                            <div class="small_product_content">
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
                                    <a title="Printed Summer Dress" href="single-product.html">Printed  Dress</a>
                                </div>
                                <div class="small_product_price">
                                    <span class="new_price"> $27.00 </span>
                                    <span class="old_price">  $30.50  </span>
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
<!--baner slide end-->

<!--shipping area start-->
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
<!--shipping area end-->

<!--product area strt-->
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
                                    ?>
                                    <div class="col-lg-3">
                                     <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="single-product.html"><img src="<?php echo base_url();?>assets/images/<?= $prom['produk_gambar']; ?>" alt=""></a>
                                            <div class="product_discount">
                                                <span><?= "-".$prom['promo_diskon']."%";?></span>
                                            </div>
                                            <div class="product_action">
                                                <ul>
                                                    <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="quick_view">
                                                <a href="#" data-toggle="modal" data-target="#modal_box<?= $prom['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                            </div>

                                        </div>
                                        <div class="product_content">
                                            <div class="product_timing">
                                                <div data-countdown="<?= $prom['promo_end'];?>"></div>
                                            </div>
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
                                                <a title="Printed Summer Dress" href="single-product.html"><?= $prom['produk_nama'];?></a>
                                            </div>
                                            <div class="small_product_price">
                                                <span class="new_price"><?= "Rp. ".number_format($prom['produk_harga']-(($prom['produk_harga']*$prom['promo_diskon'])/100));?> </span>
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
<!--product area end-->

<!--banner area start-->
<div class="banner_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single_banner fix">
                    <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner2.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single_banner fix">
                    <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner3.jpg" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single_banner fix">
                    <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner4.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--banner area end-->

<!--home block section start-->
<div class="home_block_seciton">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">


                <div class="featured_left mb-40">   
                    <div class="top_title">
                        <h2> shop by <?= $shoprand['kategori_nama']; ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="hot_category" style="background-image: url(assets/img/banner/banner11.jpg)">
                                <h2>Hot Category</h2>
                                <ul>
                                    <?php 
                                    $where = [
                                        'kategori_id'=>$shoprand['kategori_id'],
                                    ];
                                    $get_subkat=$this->db->get_where('sub_kategori',$where)->result_array();

                                    foreach ($get_subkat as $gsubkat) :
                                        ?>
                                        <li><a href="#"><?= $gsubkat['sk_nama']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="featured_produt">
                                <div class="featured_active owl-carousel">

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
                                        <div class="single_featured">
                                           <?php 
                                           $where = [
                                            'list_id'=>$glist['list_id']
                                        ];
                                        $get_prod=$this->db->get_where('produk',$where)->result_array();

                                        foreach ($get_prod as $gprod) :
                                            ?>

                                            <div class="single_product">
                                                <div class="product_thumb">
                                                    <a href="<?= base_url();?>produk/detail/<?= $gprod['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$gprod['produk_gambar'];?>" alt="" width="200px" height="200px"></a>
                                                    <div class="product_discount">
                                                        <span>New</span>
                                                    </div>
                                                    <div class="product_action">
                                                        <ul>
                                                            <li><a href="#" title=" Add to cart "><i class="fa fa-shopping-cart"></i></a></li>
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

                                    </div>

                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="col-lg-3 col-md-4">

        <!--banner section start-->
        <div class="featured_banner mb-40">
            <div class="feature_banner_box fix">
                <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner6.jpg" alt=""></a>
            </div>
            <div class="feature_banner_box fix">
                <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner7.jpg" alt=""></a>
            </div>
            <div class="feature_banner_box fix">
                <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/banner/banner8.jpg" alt=""></a>
            </div>
        </div>
        <!--banner section end-->


    </div>
</div>
</div>    
</div>
<!--home block section end-->

<!--brand logo area start-->
<div class="brand_logo mb-40">
 <div class="container">
     <div class="row brand_padding">
         <div class="brand_active owl-carousel">
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand1.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand2.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand3.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand4.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand5.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand6.jpg" alt=""></a>
                 </div>
             </div>
             <div class="col-lg-2">
                 <div class="single_brand">
                     <a href="#"><img src="<?php echo base_url();?>assets/frontend/assets/img/brand/brand4.jpg" alt=""></a>
                 </div>
             </div>

         </div>
     </div>
 </div> 
</div>
<!--brand logo area end-->


<!--static area start-->
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
<!--static area end-->

