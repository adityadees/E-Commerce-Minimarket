<br>
<div class="breadcrumbs_area bread_about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="index.html"><i class="fa fa-home"></i></a>
                        <span><i class="fa fa-angle-right"></i></span>
                        <span> <a href="shop.html">product</a></span>

                        <span><i class="fa fa-angle-right"></i></span>
                        <span> Product Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
$tgl=date("Y-m-d h:i:s");
$jtable=[
    'promo' => 'produk_kode',
    'produk' => 'produk_kode'
];
$where=[
    't1.promo_start <='=>$tgl,
    't1.promo_end >'=>$tgl,
    't2.produk_kode'=>$prd_detail['produk_kode'],
];
$promo = $this->Mymod->GetDataJoin($jtable,$where);
$gprom = $promo->row_array();
$newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));

$glist = $this->Mymod->ViewDetail('list','list_id',$prd_detail['list_id']);
$gsubkat = $this->Mymod->ViewDetail('sub_kategori','sk_id',$glist['sk_id']);
$gkategori = $this->Mymod->ViewDetail('kategori','kategori_id',$gsubkat['kategori_id']);
?>


<div class="product_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="product_d_tab fix">  
                    <div class="tab-content product_d_content">
                        <div class="tab-pane fade show active" id="p_d_tab1" role="tabpanel" >
                            <div class="modal_tab_img">
                                <a href="#"><img src="<?= base_url().'assets/images/'.$prd_detail['produk_gambar'];?>" data-zoom-image="<?= base_url().'assets/images/'.$prd_detail['produk_gambar'];?>" alt=""></a>
                                <?php if($promo->row_array() > 0 ) {?>
                                    <div class="product_discount">
                                        <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                    </div>
                                <?php } else {} ?>
                                <div class="view_img">
                                    <a class="view_large_img" href="<?= base_url().'assets/images/'.$prd_detail['produk_gambar'];?>">View larger <i class="fa fa-search-plus"></i></a>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1><?= $prd_detail['produk_nama']; ?></h1>
                    <div class="product_reference">
                        <p>
                            Reference: 
                            <span><?= $gkategori['kategori_nama']; ?></span>
                            >  
                            <span><?= $gsubkat['sk_nama']; ?></span> 
                            > 
                            <span><?= $glist['list_nama']; ?></span> 
                        </p>
                    </div>
                    <div class="small_product_price mb-15">
                        <?php if($promo->row_array() > 0 ) {?>
                            <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                            <span class="old_price"> <?= "Rp. ".number_format($prd_detail['produk_harga']); ?> </span>
                        <?php } else { ?>

                            <span class="new_price"> <?= "Rp. ".number_format($prd_detail['produk_harga']); ?> </span>

                        <?php } ?>
                    </div>
                    <div class="product_d_quantity mb-20">


                        <form action="<?= base_url();?>frontendc/addtocart" method="POST" name="cartForm">
                            <input min="0" max="100" value="1" type="number" name="qty">
                            <?php if(isset($_SESSION['logged_in_user'])) {
                                ?>
                                <input type="hidden" name="produk_kode" value="<?= $prd_detail['produk_kode'];?>">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            <?php } else { ?>
                                <button type="submit" disabled="disabled"  class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                <span class="text-danger">*Anda harus login terlebih dahulu</span>
                                <?php 
                            } 
                            ?>
                        </form>

                    </div>
                    <div class="product_d_social mb-40">
                        <ul>
                            <li><a href="#"> <i class="fa fa-twitter"></i> Tweet </a></li>
                            <li><a href="#"> <i class="fa fa-facebook-f"></i>  Share  </a></li>
                            <li><a href="#"> <i class="fa fa-google-plus" aria-hidden="true"></i>Google+ </a></li>
                            <li><a href="#"> <i class="fa fa-pinterest"></i>  Pinterest </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="product__details_tab mb-40">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="product_details_tab_inner"> 
                    <div class="product_details_tab_button">    
                        <ul class="nav" role="tablist">
                            <li >
                                <a class="nav-link active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">More info</a>
                            </li>
                        </ul>
                    </div> 
                    <div class="tab-content product_details_content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" >
                            <div class="product_d_tab_content">


                                <?php 
                                $prparent = $this->Mymod->ViewDetail('produk','produk_kode',$prd_detail['produk_parent']);
                                if($prparent['produk_parent']=='null'){ ?>
                                    <p><?= $prd_detail['produk_ket']; ?></p>
                                <?php }
                                else {
                                    ?>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4 class="text-center" style="margin-bottom:10px"><b>Related Produk</b>
                                                <div style="padding-top:10px; border-bottom: 1px solid #c8d6e5;margin-bottom:10px;,padding-top:10px;"></div>
                                            </h4>
                                            <div class="single_product categorie">
                                                <div class="product_thumb ">
                                                  <a href="<?= base_url().'produk/detail/'.$prparent['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$prparent['produk_gambar'];?>" alt="" style="width: 300px; height:200px; "></a>
                                                  <?php if($promo->row_array() > 0 ) {?>
                                                    <div class="product_discount">
                                                        <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                                    </div>
                                                <?php } else {} ?>
                                                <div class="quick_view categorie_view">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box<?= $prparent['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                                </div>

                                            </div>
                                            <div class="product_content">
                                                <div class="small_product_name text-center">
                                                    <a title="<?= $prparent['produk_nama']; ?>" href="<?= base_url().'produk/detail/'.$prparent['produk_kode'];?>"><b> <?= $prparent['produk_nama']; ?> </b></a>
                                                </div>
                                                <div style="text-align: center;font-size: 17px;color:red;">
                                                    <b>
                                                        <?php if($promo->row_array() > 0 ) {?>
                                                            <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                                            <span class="old_price"> <?= "Rp. ".number_format($prparent['produk_harga']); ?> </span>
                                                        <?php } else { ?>

                                                            <span class="new_price"> <?= "Rp. ".number_format($prparent['produk_harga']); ?> </span>

                                                        <?php } ?>
                                                    </b>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-9">
                                        <p><?= $prd_detail['produk_ket']; ?></p>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>    
                    </div>
                </div>  

            </div>
        </div>   

    </div>
</div>
</div>


<!--product_details_single_product-->
<div class="product_details_s_product mb-40">
    <div class="container">
        <div class="product_details_s_product_inner">
            <div class="top_title p_details mb-10">
                <h2>Kategori produk yang berhubungan:</h2>
            </div>
            <div class="row">


                <div class="details_s_product_active owl-carousel">
                    <?php
                    $whr = [
                        'kategori.kategori_id' => $gkategori['kategori_id'],
                    ];
                    $related = $this->Mymod->related($whr)->result_array();
                    foreach ($related as  $arre) :

                        $jtable=[
                            'promo' => 'produk_kode',
                            'produk' => 'produk_kode'
                        ];
                        $where=[
                            't1.promo_start <='=>$tgl,
                            't1.promo_end >'=>$tgl,
                            't2.produk_kode'=>$arre['produk_kode'],
                        ];
                        $promo = $this->Mymod->GetDataJoin($jtable,$where);
                        $gprom = $promo->row_array();
                        $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
                        ?>
                        <div class="col-lg-4">
                            <div class="single_product categorie">
                                <div class="product_thumb">
                                  <a href="<?= base_url().'produk/detail/'.$arre['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$arre['produk_gambar'];?>" alt="" style="width: 300px; height:200px;"></a>
                                  <?php if($promo->row_array() > 0 ) {?>
                                    <div class="product_discount">
                                        <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                    </div>
                                <?php } else {} ?>
                                <div class="quick_view categorie_view">
                                    <a href="#" data-toggle="modal" data-target="#modal_box<?= $arre['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                </div>

                            </div>
                            <div class="product_content">
                                <div class="small_product_name">
                                  <a title="<?= $arre['produk_nama']; ?>" href="<?= base_url().'produk/detail/'.$arre['produk_kode'];?>"> <?= $arre['produk_nama']; ?> </a>
                              </div>
                              <div class="small_product_price">
                                <?php if($promo->row_array() > 0 ) {?>
                                    <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                    <span class="old_price"> <?= "Rp. ".number_format($arre['produk_harga']); ?> </span>
                                <?php } else { ?>

                                    <span class="new_price"> <?= "Rp. ".number_format($arre['produk_harga']); ?> </span>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>     
</div>
</div>

<div class="product_details_s_product mb-40">
    <div class="container">
        <div class="product_details_s_product_inner">
            <div class="top_title p_details mb-10">
                <h2>PRODUK SERUPA</h2>
            </div>
            <div class="single_product__wrapper">

                <div class="row">
                    <div class="details_s_product_active related_product owl-carousel">   
                        <?php
                        $whr = [
                            'list.list_id' => $glist['list_id'],
                        ];
                        $serupa = $this->Mymod->related($whr)->result_array();
                        foreach ($serupa as  $srp) :

                            $jtable=[
                                'promo' => 'produk_kode',
                                'produk' => 'produk_kode'
                            ];
                            $where=[
                                't1.promo_start <='=>$tgl,
                                't1.promo_end >'=>$tgl,
                                't2.produk_kode'=>$srp['produk_kode'],
                            ];
                            $promo = $this->Mymod->GetDataJoin($jtable,$where);
                            $gprom = $promo->row_array();
                            $newprc=($gprom['produk_harga']-(($gprom['produk_harga']*$gprom['promo_diskon'])/100));
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="single_product categorie">
                                    <div class="product_thumb">
                                        <a href="<?= base_url().'produk/detail/'.$srp['produk_kode'];?>"><img src="<?= base_url().'assets/images/'.$srp['produk_gambar'];?>" alt="" style="width: 300px; height:200px;"></a>
                                        <?php if($promo->row_array() > 0 ) {?>
                                            <div class="product_discount">
                                                <span>- <?= $gprom['promo_diskon']."%"; ?></span>
                                            </div>
                                        <?php } else {} ?>

                                        <div class="quick_view categorie_view">
                                            <a href="#" data-toggle="modal" data-target="#modal_box<?= $srp['produk_kode'];?>" title="Quick view"><i class="fa fa-search"></i></a>
                                        </div>

                                    </div>
                                    <div class="product_content">
                                        <div class="small_product_name">
                                          <a title="<?= $srp['produk_nama']; ?>" href="<?= base_url().'produk/detail/'.$srp['produk_kode'];?>"> <?= $srp['produk_nama']; ?> </a>
                                      </div>
                                      <div class="small_product_price">
                                        <?php if($promo->row_array() > 0 ) {?>
                                            <span class="new_price"> <?= "Rp. ".number_format($newprc); ?>  </span>
                                            <span class="old_price"> <?= "Rp. ".number_format($srp['produk_harga']); ?> </span>
                                        <?php } else { ?>

                                            <span class="new_price"> <?= "Rp. ".number_format($srp['produk_harga']); ?> </span>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>    
            </div>
        </div>
    </div>     
</div>
</div>


