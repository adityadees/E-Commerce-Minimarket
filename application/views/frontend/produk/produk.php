    <div class="breadcrumb-area gray-bg">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?= base_url();?>">Home</a></li>
                    <li class="active">Produk </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-page-area pt-75 pb-75">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="banner-area pb-30">
                        <a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jpg"></a>
                    </div>
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                            </ul>
                            <p>Showing 1 - 20 of 30 results  </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-shorting shorting-style">
                                <label>View:</label>
                                <select>
                                    <option value=""> 20</option>
                                    <option value=""> 23</option>
                                    <option value=""> 30</option>
                                </select>
                            </div>
                            <div class="product-show shorting-style">
                                <label>Sort by:</label>
                                <select>
                                    <option value="">Default</option>
                                    <option value=""> Name</option>
                                    <option value=""> price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid-list-product-wrapper">
                        <div class="product-grid product-view pb-20">
                            <div class="row">

                                <?php foreach ($produk as $prod) :?>
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="<?= base_url();?>produk/detail/<?= $prod['produk_kode'];?>" >
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
                                                    <a href="<?= base_url().'produk/detail/'.$prod['produk_kode'];?>"><?= $prod['produk_nama']; ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                                </div>
                                            </div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="product-details.html"><?= $prod['produk_nama']; ?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?= "Rp. ".number_format($prod['produk_harga']); ?></span>
                                                </div>
                                                <p><?= $prod['produk_ket']; ?></p>
                                                <div class="shop-list-cart-wishlist">
                                                    <a href="#" title="Add To Cart"><i class="icon-handbag"></i></a>
                                                    <a href="#" data-target="#modalProd<?= $prod['produk_kode']; ?>" data-toggle="modal" title="Quick View">
                                                        <i class="icon-magnifier-add"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="pagination-total-pages">
                            <div class="pagination-style">
                                <ul>
                                    <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                                </ul>
                            </div>
                            <div class="total-pages">
                                <p>Showing 1 - 20 of 30 results  </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    </div>
                </div>
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
