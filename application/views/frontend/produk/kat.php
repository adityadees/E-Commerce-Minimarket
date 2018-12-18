
<br>
<div class="categorie_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="sidebar_categorie_area">

                    <div class="product_banner product_banner_shop fix mb-30">
                        <a href="#"><img src="assets/img/banner/banner1.jpg" alt=""></a>
                    </div>
                    <div class="top_sellers top_seller_two featured mb-40">
                        <div class="top_title">
                            <h2> Bestseller</h2>
                        </div>
                        <div class="small_product_active owl-carousel">
                            <div class="small_product_item">
                              <?php 
                              $tgl=date("Y-m-d h:i:s");
                              foreach($best as $i): 
                                $gtable='produk';
                                $gwhere='produk_kode';
                                $gdata=$i['produk_kode'];

                                $gc= $this->Mymod->ViewDetail($gtable,$gwhere,$gdata);

                                $jtable=[
                                    'promo' => 'produk_kode',
                                    'produk' => 'produk_kode'
                                ];
                                $where=[
                                    't1.promo_start <='=>$tgl,
                                    't1.promo_end >'=>$tgl,
                                    't2.produk_kode'=>$gc['produk_kode'],
                                ];
                                $promo = $this->Mymod->GetDataJoin($jtable,$where);
                                $gprom = $promo->row_array();
                                $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
                                ?>
                                <div class="small_product">
                                    <div class="small_product_thumb">
                                      <a href="<?= base_url();?>produk/detail/<?= $gc['produk_kode']; ?>"><img src="<?php echo base_url();?>assets/images/<?= $gc['produk_gambar']; ?>" alt=""></a>
                                      <?php if($promo->row_array() > 0 ) {?>
                                        <div class="product_discount">
                                            <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                        </div>
                                    <?php } else {} ?>
                                    <div class="quick_view categorie_view">
                                        <a href="#" data-toggle="modal" data-target="#modal_box<?= $gc['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="small_product_content">
                                 <div class="small_product_name">
                                    <a title="<?= $gc['produk_nama']; ?>" href="<?= base_url();?>produk/detail/<?= $gc['produk_kode']; ?>"><?= $gc['produk_nama'];?></a>
                                </div>
                                <div class="small_product_price">
                                   <?php if($promo->row_array() > 0 ) {?>
                                    <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                    <span class="old_price"> <?= "Rp. ".number_format($gc['produk_harga']); ?> </span>
                                <?php } else { ?>

                                    <span class="new_price"> <?= "Rp. ".number_format($gc['produk_harga']); ?> </span>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>
</div>
<div class="col-lg-9 col-md-8">
    <div class="categorie_d_right">
        <div class="categorie_product_toolbar mb-30">
            <div class="categorie_product_button">
                <ul class="nav" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large" aria-selected="true"><i class="fa fa-th-large"></i></a>
                    </li>
                    <li>
                        <a  data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade  show active" id="large" role="tabpanel">
                <div class="row cate_tab_product">
                    <?php 
                    $tgl=date("Y-m-d h:i:s");
                    foreach ($nprd as $prod) :

                        $jtable=[
                            'promo' => 'produk_kode',
                            'produk' => 'produk_kode'
                        ];
                        $where=[
                            't1.promo_start <='=>$tgl,
                            't1.promo_end >'=>$tgl,
                            't2.produk_kode'=>$prod['produk_kode'],
                        ];
                        $promo = $this->Mymod->GetDataJoin($jtable,$where);
                        $gprom = $promo->row_array();
                        $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
                        ?>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single_product categorie">
                                <div class="product_thumb">
                                  <a href="<?= base_url().'produk/detail/'.$prod['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$prod['produk_gambar'];?>" alt="" style="width: 300px; height:300px;"></a>
                                  <?php if($promo->row_array() > 0 ) {?>
                                    <div class="product_discount">
                                        <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                    </div>
                                <?php } else {} ?>

                                <div class="quick_view categorie_view">
                                    <a href="#" data-toggle="modal" data-target="#modal_box<?= $prod['produk_kode']; ?>" title="Quick view"><i class="fa fa-search"></i></a>
                                </div>

                            </div>
                            <div class="product_content">
                                <div class="small_product_name">
                                    <a title="<?= $prod['produk_nama']; ?>" href="<?= base_url().'produk/detail/'.$prod['produk_kode'];?>"> <?= $prod['produk_nama']; ?> </a>
                                </div>
                                <div class="small_product_price">
                                 <?php if($promo->row_array() > 0 ) {?>
                                    <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                    <span class="old_price"> <?= "Rp. ".number_format($prod['produk_harga']); ?> </span>
                                <?php } else { ?>

                                    <span class="new_price"> <?= "Rp. ".number_format($prod['produk_harga']); ?> </span>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>  
    </div>
    <div class="tab-pane fade" id="list" role="tabpanel">
        <?php 
        $tgl=date("Y-m-d h:i:s");
        foreach ($produk as $prod) :

            $jtable=[
                'promo' => 'produk_kode',
                'produk' => 'produk_kode'
            ];
            $where=[
                't1.promo_start <='=>$tgl,
                't1.promo_end >'=>$tgl,
                't2.produk_kode'=>$prod['produk_kode'],
            ];
            $promo = $this->Mymod->GetDataJoin($jtable,$where);
            $gprom = $promo->row_array();
            $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
            ?>

            <div class="single_product categorie">   
                <div class="row cate_tab_product">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product_thumb">
                            <a href="<?= base_url().'produk/detail/'.$prod['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$prod['produk_gambar'];?>" alt="" style="width: 300px; height:300px;"></a>
                            <?php if($promo->row_array() > 0 ) {?>
                                <div class="product_discount">
                                    <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                </div>
                            <?php } else {} ?>
                            <div class="quick_view categorie_view">
                                <a href="#" data-toggle="modal" data-target="#modal_box<?= $prod['produk_kode']; ?>" title="Quick view"><i class="fa fa-search"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6">
                        <div class="product_content">
                            <div class="small_product_name categorie_name">
                                <a title="<?= $prod['produk_nama']; ?>" href="<?= base_url().'produk/detail/'.$prod['produk_kode'];?>"> <?= $prod['produk_nama']; ?> </a>
                            </div>
                            <div class="small_product_price categorie_prie mb-10">
                                <?php if($promo->row_array() > 0 ) {?>
                                    <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                    <span class="old_price"> <?= "Rp. ".number_format($prod['produk_harga']); ?> </span>
                                <?php } else { ?>

                                    <span class="new_price"> <?= "Rp. ".number_format($prod['produk_harga']); ?> </span>

                                <?php } ?>

                            </div>
                            <div class="single__product_drsc">
                                <p><?= readmore($prod['produk_ket']); ?></p>
                            </div>
                                          <!--   <div class="product_action action_categorie mb-10">
                                                <ul>
                                                    <li><a href="#" title=" Add to cart "></a></li>
                                                </ul>
                                            </div> -->
                                            <div class="product_in_stock">

                                                <form action="<?= base_url();?>frontendc/addtocart" method="POST" name="cartForm">
                                                    <?php if(isset($_SESSION['logged_in_user'])) {
                                                        ?> 
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="produk_kode" value="<?= $prod['produk_kode'];?>">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                    <?php } else { ?>
                                                        <button type="submit" disabled="disabled"  class="btn btn-primary"><i class="fa fa-shopping-cart"></i> dd to cart</button>
                                                        <span class="text-danger">*Anda harus login terlebih dahulu</span>
                                                        <?php 
                                                    } 
                                                    ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                        <?php endforeach; ?>

                        
                    </div>
                </div>
     <!--            
                <div class="page_numbers_toolbar">
                    <ul>
                        <li><a class="current_page" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a class="next_page" href="#">next</a></li>
                    </ul>
                </div> -->
                
            </div>
        </div>
    </div>
</div>
</div>
<br>