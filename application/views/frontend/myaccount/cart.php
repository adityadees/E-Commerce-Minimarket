
<!--header area start-->

<!--breadcrumbs area start-->
<div class="breadcrumbs_area contact_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="index.html"><i class="fa fa-home"></i></a>
                        <span><i class="fa fa-angle-right"></i></span>
                        <span> Shopping Cart</span>
                    </div>
                    <div class="breadcrumb_title">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<!--shopping cart area end -->
<div class="shopping_cart_details">
    <div class="container">
       <form action="#"> 
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <form action="<?php echo base_url()?>frontendc/update_cart" method="POST">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_quantity">Bonus Qty</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total=0;
                                    $ship=5000;

                                    foreach($getCartData as $i):
                                      if($i['keranjang_qty']>1){
                                        $bonus=($i['keranjang_qty']/2);

                                    }else {
                                        $bonus=0;
                                    }
                                    $pharga=$i['produk_harga']*$i['keranjang_qty'];
                                    $subtotal=$i['produk_harga']*$i['keranjang_qty'];
                                    $total +=$subtotal;
                                    ?>
                                    <tr>
                                       <td class="product_thumb"><a href="#"><img src="<?php echo base_url();?>assets/images/<?= $i['produk_gambar'];?>" alt=""></a></td>
                                       <td class="product_name"><a href="#"><?= $i['produk_nama']; ?></a></td>
                                       <td class="product-price"> <?= "Rp. ".number_format($i['produk_harga']); ?></td>
                                       <td class="product_quantity"><input min="0" max="100" value="<?= $i['keranjang_qty']; ?>" type="number" name="qtybutton"></td>
                                       <td class="product_total"><?= floor($bonus);?></td>
                                       <td class="product_total">   <?= "Rp. ".number_format($pharga); ?></td>
                                       <td class="product_remove"><a href="#"  data-target="#delCart<?= $i['keranjang_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i></a></td>
                                   </tr>
                               <?php endforeach; ?>


                           </tbody>
                       </table>  
                   </div>  
                   <div class="table_cart_button">
                    <button type="submit">update cart</button>
                </div> 
            </form>
        </div>
    </div>
</div>
<!--coupon code area start-->
<div class="coupon_code_area">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="coupon_code coupon">
                <h3>Coupon</h3>
                <div class="coupon_code_inner">
                    <p>Enter your coupon code if you have one.</p>                                
                    <input placeholder="Coupon code" type="text">
                    <button type="submit">Apply coupon</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="coupon_code">
                <h3>Cart Totals</h3>
                <div class="cart_total_amount">
                   <div class="cart_subtotal">
                       <p class="subtotal">Subtotal</p>
                       <p class="cart_amount"> <?= "Rp. ".number_format($total); ?></p>
                   </div>
                   <div class="flat_rate ">
                       <div class="shipping_flat_rate">
                        <p class="subtotal">Pengiriman</p>
                        <p class="cart_amount"><?= "Rp. ".number_format($ship); ?></p>
                    </div>
                    <a href="#">Calculate shipping</a>
                </div>

                <div class="cart_subtotal order">
                   <p class="order_total">Total</p>
                   <p class="order_amount"><?= "Rp. ".number_format($total+$ship); ?></p>
               </div>
               <div class="cart_to_checkout">
                   <a href="#">Proceed to Checkout</a>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
<!--coupon code area end-->
</form> 
</div>
</div>
<!-- accont area end -->
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