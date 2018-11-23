
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Cart </li>
            </ul>
        </div>
    </div>
</div>
<div class="cart-main-area pt-60 pb-65">
    <div class="container">
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="<?php echo base_url()?>frontendc/update_cart" method="POST">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Diskon</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total=0;
                                $tsubdsc=0;
                                $tnodsc=0;
                                $tqty=0;
                                $subtqty=0;
                                $tongkir=0;
                                foreach($getCartData as $i):

                                    $subtotal=$i['produk_harga']*$i['keranjang_qty'];
                                    $total +=$subtotal;
                                    @$tsubdsc +=$subdsc;
                                    $tnodsc +=$i['produk_harga']*$i['keranjang_qty'];
                                    $tqty +=$subtqty;
                                    ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="<?php echo base_url();?>assets/images/<?= $i['produk_gambar'];?>"  style="width: 82px;height: 82px;" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#"><?= $i['produk_nama']; ?> </a></td>
                                        <td class="product-price-cart">
                                            <?php 

                                            $pharga=$i['produk_harga']*$i['keranjang_qty'];
                                            ?>
                                            <span class="amount">
                                                <?= "Rp. ".number_format($pharga); ?>
                                            </span>
                                            <?php
                                            ?>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="pro-dec-cart">
                                                <input class="cart-plus-minus-box" type="text" value="<?= $i['keranjang_qty']; ?>" name="qtybutton">
                                            </div>
                                        </td>
                                        <td>
                                            0
                                        </td>
                                        <td class="product-subtotal"><?= "Rp. ".number_format($subtotal);?></td>
                                        <td class="product-remove">
                                            <a href="#" data-target="#delCart<?= $i['keranjang_id']; ?>" data-toggle="modal"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="<?= base_url()?>produk">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    <a href="#">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            <h5>Total products <span><?= "Rp. ".number_format($tnodsc);?></span></h5>
                            <h5>Diskon <span><?= "Rp. ".@number_format($subdsc+$subtqty);?></span></h5>
                            <h5>Ongkir <span><?= "Rp. ".number_format($tongkir);?></span></h5>
                            <h4 class="grand-totall-title">Grand Total  <span><?= "Rp. ".number_format($total+$tongkir);?></span></h4>
                            <a href="<?= base_url();?>checkout">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach($getCartData as $gcart): ?>
    <div class="modal fade text-left" id="delCart<?= $gcart['keranjang_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
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
                                    <input type="hidden" name="keranjang_id" value="<?php echo $gcart['keranjang_id'];?>">
                                    <label class="text-center">Anda yakin ingin menghapus produk <b><?php echo $gcart['produk_nama']; ?></b> ?</label>
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
    <?php endforeach; ?>